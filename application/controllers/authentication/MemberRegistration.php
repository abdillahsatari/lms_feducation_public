<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MemberRegistration extends CI_Controller {

	public function index() {

		$input = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('member_full_name', 'Nama Depan', 'trim|required');
		$this->form_validation->set_rules('member_email', 'Email', 'trim|required|valid_email|is_unique[member.member_email]',
										  array('is_unique'	=> 'Email sudah terdaftar!'));
		$this->form_validation->set_rules('member_password', 'Password', 'trim|required|min_length[6]',
			 							  array('min_length'=> 'Password terlalu pendek!.'));
		$this->form_validation->set_rules('retype_member_password', 'Konfirmasi Password', 'trim|required|matches[member_password]',
										  array('matches'   => 'Password tidak sama!'));

		if (!empty($input['referal_link'])){
			$this->form_validation->set_rules('referal_link', 'Referral Link', 'trim|callback_referralValidation');
		};

		if ($this->form_validation->run() == false){

			$data	= array("csrfName" 	=> $this->security->get_csrf_token_name(),
							"csrfToken"	=> $this->security->get_csrf_hash());
			$this->load->view('authentication/memberRegister', $data);

		} else {

			$uplineId	= "";

			if (!empty($input['referal_link'])){
				$referralCode	= array('member_referal_code' => $input['referal_link']);
				$referralOwner 	= $this->CrudModel->gw('member', $referralCode);
				$uplineId		= $referralOwner[0]->id;
			}

			$dataregister	= array('member_full_name'	=> $input['member_full_name'],
									'member_email'		=> $input['member_email'],
									'member_password'	=> password_hash($input['retype_member_password'], PASSWORD_BCRYPT));

			$memberId		= $this->CrudModel->i2('member', $dataregister);

			$getMemberCode	= generateReferralCode($memberId);
			$memberCreated	= date('Y-m-d H:i:s');
			$token 			= generateToken();
			$tokenCreated	= time();

			$dataToken		= array('member_id'	=> $memberId,
									'token'		=> $token,
									'created_at'=> $tokenCreated);

			$this->CrudModel->i('member_token', $dataToken);

			$dataSendEmail	= array('memberFullName'	=> $input['member_full_name'],
									'memberEmail'		=> $input['member_email'],
									'memberPassword'	=> $input['retype_member_password'],
									'memberToken'		=> $token,
									'emailType'			=> EmailType::NEW_MEMBER_REGISTRATION,
									'emailSubject'		=> SubjectEmailType::VERIFIKASI_EMAIL);

			$emailService = sendEmail($dataSendEmail);

			switch ($emailService['isDelivered']){
				case TRUE:
					$dataRegisterUpdate	= array('member_parent_id'				=> $uplineId ?: 1,
												'member_referal_code'			=> $getMemberCode,
												'member_is_email_regist_sent'	=> 1,
												'member_is_registered'			=> 1,
												'created_at'					=> $memberCreated);

					$whereId			= array('id' => $memberId);

					$this->CrudModel->u('member', $dataRegisterUpdate, $whereId);

					generalToaster("Pendaftaran Berhasil!","Silahkan cek email Anda dan segera melakukan verifikasi 1x24jam.", ToasterType::SUCCESS);

					break;
				case FALSE:

					$whereId	= array('id'	=> $memberId);
					$this->CrudModel->d('member', $whereId);

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

	public function memberVerify(){
		$memberEmail	= $this->input->get('email');
		$memberToken	= $this->input->get('token');
		$memberPassword	= $this->input->get('password');
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

				} else {

					$newToken		= generateToken();
					$tokenCreated	= time();
					$tokenId		= array('id'		=> $data->id);
					$dataToken		= array('member_id'	=> $data->member_id,
											'token'		=> $newToken,
											'created_at'=> $tokenCreated);

					$this->CrudModel->d('member_token', $tokenId);
					$this->CrudModel->i('member_token', $dataToken);

					$dataSendEmail	= array('memberFullName'	=> $data->member_full_name,
											'memberEmail'		=> $data->member_email,
											'memberPassword'	=> $memberPassword,
											'memberToken'		=> $newToken,
											'emailType'			=> EmailType::NEW_MEMBER_REGISTRATION,
											'emailSubject'		=> SubjectEmailType::VERIFIKASI_EMAIL);

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
			echo "email dan token tidak ditemukan";

			/**
			 * To Do
			 * Here Could Be an Issue
			 * Create New View to Handle Unauthorized Access or Email and Token Not Found
			 */
		}

		redirect("member/login");
	}
}
