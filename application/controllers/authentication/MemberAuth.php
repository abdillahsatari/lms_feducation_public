<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MemberAuth extends CI_Controller {

	public function login() {
		
		if ($this->session->userdata('member_authStatus') == AuthStatus::AUTHORIZED){
			redirect('member/dashboard');
		} else {
			$data	= array("session"	=> SessionType::MEMBER);
			$this->load->view('authentication/index', $data);
		}
	}

	public function authentication(){
		$input		= $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('uid', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->login();
		} else {
			$suffix		= CredentialType::MEMBER;
			$email		= $input['uid'];
			$password 	= $input['password'];

			$authService 	= authenticate($email, $password, $suffix);
			$dataMsgInfo	= $authService['message']['info'];
			$dataMsg		= $authService['message']['msg'];
			$dataMsgType	= $authService['message']['type'];

			generalToaster($dataMsgInfo, $dataMsg, $dataMsgType);

			switch($authService['status']){
				case AuthStatus::AUTHORIZED:
					$this->session->set_userdata($authService['dataSession']);
					$dataRedirect = 'member';
					break;
				case AuthStatus::UNAUTHORIZED:
					$dataRedirect ='member/login';
					break;
			}

			redirect($dataRedirect);
		}
	}

	public function register() {

		$input = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('member_full_name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('member_email', 'Email', 'trim|required|valid_email|is_unique[member.member_email]',
											array('is_unique'	=> 'Email Sudah Terdaftar!'));											
		$this->form_validation->set_rules('member_phone_number', 'No. Hp', 'trim|required|is_unique[member.member_phone_number]',
											array('is_unique'	=> 'No. Hp Sudah Terdaftar!.'));
		// $this->form_validation->set_rules('member_ktp_number', 'No. Hp', 'trim|required|is_unique[member_kyc_info.member_ktp_number]',
		// 									array('is_unique'	=> 'No. KTP Sudah Terdaftar!.'));

		if (!empty($input['referal_link'])){
			$this->form_validation->set_rules('referal_link', 'Referral Link', 'trim|callback_referralValidation');
		};

		if ($this->form_validation->run() == false){

			$data	= array("session"	=> SessionType::MEMBER,
				"csrfName" 	=> $this->security->get_csrf_token_name(),
				"csrfToken"	=> $this->security->get_csrf_hash());
			$this->load->view('authentication/memberRegister', $data);

		} else {

			$uplineId	= "";

			if (!empty($input['referal_link'])){
				$referralCode	= array('member_referal_code' => $input['referal_link']);
				$referralOwner 	= $this->CrudModel->gw('member', $referralCode);
				$uplineId		= $referralOwner[0]->id;
			}

			//price
			$price = 399000;
			$getPaymentLastCode	= generatePaymentLastCode();
			$totalPayment		= $price + $getPaymentLastCode;

			$dataregister	= array('member_full_name'			=> $input['member_full_name'],
									'member_email'				=> $input['member_email'],
									'member_phone_number'		=> $input['member_phone_number'],
									'member_parent_id'			=> $uplineId ?: 1,
									'course_price'				=> $price,
									'unique_code'				=> $getPaymentLastCode,
									'course_total_price'		=> $totalPayment);

			$memberId		= $this->CrudModel->i2('member', $dataregister);

			$getMemberCode				= generateReferralCode($memberId);
			$generatePassword			= generateAutomaticPassword();
			$generateTransactionCode	= generateAutomaticPassword();
			$setMemberPassword			= password_hash($generatePassword, PASSWORD_BCRYPT);
			$setMemberTransactionCode	= password_hash($generateTransactionCode, PASSWORD_BCRYPT);
			$memberCreated				= date('Y-m-d H:i:s');
			$token 						= generateToken();
			$tokenCreated				= time();

			$dataToken		= array('member_id'	=> $memberId,
									'token'		=> $token,
									'created_at'=> $tokenCreated);

			$tokenId 		= $this->CrudModel->i2('member_token', $dataToken);

			$dataSendEmail	= array('memberFullName'		=> $input['member_full_name'],
									'memberEmail'			=> $input['member_email'],
									'memberPhoneNumber'		=> $input['member_phone_number'],
									'coursePrice'			=> $price,
									'uniqueCode'			=> $getPaymentLastCode,
									'totalPayment'			=> $totalPayment,
									'memberToken'			=> $token,
									'emailType'				=> EmailType::REGISTERED_NEW_LMS_ACCOUNT,
									'emailSubject'			=> SubjectEmailType::REGISTERED_NEW_LMS_ACCOUNT);

			$emailService = sendEmail($dataSendEmail);

			switch ($emailService['isDelivered']){
				case TRUE:
					$dataRegisterUpdate	= array('member_referal_code'			=> $getMemberCode,
												'member_password'				=> $setMemberPassword,
												'member_transaction_code'		=> $setMemberTransactionCode,
												'member_is_email_regist_sent'	=> 1,
												'member_is_registered'			=> 1,
												'created_at'					=> $memberCreated);
					
					$whereId = array('id' => $memberId);
					$this->CrudModel->u('member', $dataRegisterUpdate, $whereId);
					generalToaster("Pendaftaran Berhasil!","Silahkan cek email Anda dan segera melakukan aktivasi pembukaan akun dalam 1x24jam.", ToasterType::SUCCESS);

					break;
				case FALSE:

					$whereId		= array('id'	=> $memberId);
					$whereTokenId	= array('id'	=> $tokenId);

					$this->CrudModel->d('member', $whereId);
					$this->CrudModel->d('member_token', $whereTokenId);

					generalToaster("Pendaftaran Gagal!", "Mohon Periksa Kembali Email Anda.", ToasterType::FAILED);
					break;
			};

			redirect('member/login');
		}
	}

	public function referralValidation($params = null) {
		$getAvailabelReferralCode = $this->CrudModel->gw('member', array('member_referal_code' => $params));
		if (count($getAvailabelReferralCode) > 0) {
			return TRUE;
		} else {
			$this->form_validation->set_message('referralValidation', '{field} tidak ditemukan.');
			return FALSE;
		}
	}

	public function verify(){
		$memberEmail			= $this->input->get('email');
		$memberToken			= $this->input->get('token');
		$memberPassword			= $this->input->get('password');
		// $memberPhone			= $this->input->get('phone_number');
		$memberTransactionCode	= $this->input->get('transaction_code');

		$query			= 'SELECT member_token.*, member.member_email, member.member_full_name, member.created_at as member_created_at FROM member
						   JOIN member_token ON member_token.member_id = member.id
						   WHERE member.member_email = "'.$memberEmail.'" AND member_token.token = "'.$memberToken.'"';
		$dataVerify		= $this->CrudModel->q($query);

		if (count($dataVerify) > 0) {
			foreach($dataVerify as $data){

				if (time() - $data->created_at < (60 * 60 * 24)) {
					$memberId			= array('id'	=> $data->member_id);
					$memberDataVerified	= array('member_is_verified'	=> true,
												'updated_at'			=> date('Y-m-d H:i:s'));

					$this->CrudModel->u('member', $memberDataVerified, $memberId);

					generalToaster("Selamat!", "Akun Anda Telah Berhasil di Verifikasi!.", ToasterType::SUCCESS);

					// add current member to all simpanan keanggotaan type
				} else {

					$newToken		= generateToken();
					$tokenCreated	= time();
					$tokenId		= array('id'		=> $data->id);
					$dataToken		= array('member_id'	=> $data->member_id,
											'token'		=> $newToken,
											'created_at'=> $tokenCreated);

					$this->CrudModel->i('member_token', $dataToken);
					$this->CrudModel->d('member_token', $tokenId);

					$dataSendEmail	= array('memberFullName'		=> $data->member_full_name,
											'emailRecipient'		=> $data->member_email,
											// 'memberPhoneNumber'		=> $memberPhone,
											'memberPassword'		=> $memberPassword,
											'memberTransactionCode'	=> $memberTransactionCode,
											'memberToken'			=> $newToken,
											'emailType'				=> EmailType::NEW_MEMBER_REGISTRATION,
											'emailSubject'			=> SubjectEmailType::VERIFIKASI_EMAIL);

					$emailService = sendEmail($dataSendEmail);

					switch ($emailService['isDelivered']){
						case TRUE:
							generalToaster("Verifikasi Berhasil!", "Selamat, Akun Anda Telah Terverifikasi", ToasterType::SUCCESS);
							break;
						case FALSE:
							generalToaster("Verifikasi Gagal!", "Email Verifikasi Baru Telah Terkirim ke Email Anda. Silahkan Melakukan Verifikasi Ulang", ToasterType::FAILED);
							break;
					};
				}
			}
		} else {
			// generalAllert("Verifikasi Gagal!", "Akun Belum Terdaftar", AllertType::FAILED);
			generalToaster("Verifikasi Gagal!", "Akun Belum Terdaftar", ToasterType::FAILED);
		}

		redirect("member/login");
	}

	public function memberForgotPassword() {

		$input = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false){

			$data	= array("csrfName" 	=> $this->security->get_csrf_token_name(),
							"csrfToken"	=> $this->security->get_csrf_hash());
			$this->load->view('authentication/memberForgotPassword', $data);

		} else {

			$where		= array("member_email"	=> $input["email"]);
			$dataMember	= $this->CrudModel->gw('member', $where);

			if (count($dataMember) > 0) {

				$member			= current($dataMember);
				$memberId		= $member->id;
				$genrateNewPass = random_string('alnum', 8);
				$dataUpdate 	= array('member_password'	=> password_hash($genrateNewPass, PASSWORD_BCRYPT),
							  			'updated_at '		=> date('Y-m-d H:i:s'));
				$where			= array('id' => $memberId);

				$this->CrudModel->u('member', $dataUpdate, $where);

				$token 			= generateToken();
				$tokenCreated	= time();

				$dataToken		= array('member_id'	=> $memberId,
										'token'		=> $token,
										'created_at'=> $tokenCreated);

				$this->CrudModel->i('member_token', $dataToken);

				$dataSendEmail	= array('memberFullName'	=> $member->member_full_name,
										'memberEmail'		=> $member->member_email,
										'memberPassword'	=> $genrateNewPass,
										'memberToken'		=> $token,
										'emailType'			=> EmailType::FORGOT_PASSWORD,
										'emailSubject'		=> SubjectEmailType::RESET_PASSWORD);

				$emailService = sendEmail($dataSendEmail);

				switch ($emailService['isDelivered']){
					case TRUE:
						generalToaster("Permintaan Berhasil!","Silahkan Cek Email Anda Untuk Menerima Password Baru.", ToasterType::SUCCESS);
						$dataRedirect = "member/login";
						break;
					case FALSE:
						generalToaster("Permintaan Gagal!", "Mohon Hubungi Layanan Support Kami Untuk Bantuan.", ToasterType::FAILED);
						$dataRedirect = "member/password/reset";
						break;
				};

			} else {
				generalToaster("Permintaan Gagal!", "Email Anda Belum Terdaftar!!.", ToasterType::FAILED);
				$dataRedirect = "member/password/reset";
			}

			redirect($dataRedirect);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('member/login');
	}

	function setNotificationOpened($id){

		if ($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		} else {
			$whereId 	= array("id" => $id);
			$dataStatus	= array("is_opened" => true);

			$dataNotif 	= current($this->CrudModel->gw("action_log", $whereId));
			$this->CrudModel->ud("action_log", $dataStatus, $whereId);

			redirect($dataNotif->reference_link);
		}
	}
}
