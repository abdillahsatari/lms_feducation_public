<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminFinance extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('admin/login');
		}
	}

	public function allCommission(){

		$content 		= '_adminLayouts/adminFinance/commission';
		$dataCommission	= $this->networktree->commission();
		$data 			= array('session'			=> SessionType::ADMIN,
								'content'			=> $content,
								'dataCommission' 	=> $dataCommission);

		$this->load->view('_adminLayouts/wrapper', $data);

	}

	public function allRoyalty() {

		$content 		= '_adminLayouts/adminFinance/royalty';
		$dataRoyalty	= $this->networktree->royalty();
		$data 			= array('session'			=> SessionType::ADMIN,
								'content'			=> $content,
								'dataRoyalty' 		=> $dataRoyalty);

		$this->load->view('_adminLayouts/wrapper', $data);

	}

	public function allWithdarwal() {

		$content 				= '_adminLayouts/adminFinance/withdrawal';
		$dataWithdrawal			= $this->networktree->withdrawal();
		$collectDataWithdrawal	= current($dataWithdrawal);

		switch ($collectDataWithdrawal->withdrawal_status){
			case MemberWdStatus::WD_NEW:
				$wdStatus = "Pengajuan Baru";
				break;
			case MemberWdStatus::WD_PROCESSED:
				$wdStatus = "On Progress";
				break;
			case MemberWdStatus::WD_FINISHED:
				$wdStatus = "Selesai";
				break;
			case MemberWdStatus::WD_REJECTED;
				$wdStatus = "Ditolak";
				break;
		}

		$data 			= array('session'			=> SessionType::ADMIN,
								'content'			=> $content,
								'statusWithdrawal'	=> $wdStatus,
								'dataWithdrawal' 	=> $dataWithdrawal);

		$this->load->view('_adminLayouts/wrapper', $data);

	}

	public function withdrawalEdit($id){

		$content 				= '_adminLayouts/adminFinance/withdrawalEdit';
		$dataWithdrawal			= $this->networktree->withdrawal($id);
		$getBenefits			= $this->networktree->benefits($id);
		$collectDataWithdrawal	= current($dataWithdrawal);
		$collectDataBenefits	= current($getBenefits);

		switch ($collectDataWithdrawal->withdrawal_status){
			case MemberWdStatus::REGISTERED:
				$wdStatus = "Menunggu Persetujuan";
				break;
			case MemberWdStatus::APPROVED:
				$wdStatus = "On Progress";
				break;
			case MemberWdStatus::DONE:
				$wdStatus = "Pengajuan Selesai";
				break;
			case MemberWdStatus::DECLINE;
				$wdStatus = "Pengajuan Ditolak";
				break;
		}

		$data 			= array('session'			=> SessionType::MEMBER,
								'csrfName' 			=> $this->security->get_csrf_token_name(),
								'csrfToken'			=> $this->security->get_csrf_hash(),
								'content'			=> $content,
								'statusWithdrawal'	=> $wdStatus,
								'memberBalance'		=> $collectDataBenefits->countBalance,
								'dataWithdrawal' 	=> $collectDataWithdrawal);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function withdrawalUpdate(){

		$input				= $this->input->post(NULL, TRUE);
		$date				= date('Y-m-d H:i:s');
		$whereWdId			= array("id" => $input["wd_id"]);
		$isValidForm		= FALSE;

		switch ($input["wd_status"]) {
			case MemberWdStatus::DECLINE:
				$this->form_validation->set_rules('wd_description', 'Deskripsi Penolakan', 'trim|required');
				if ($this->form_validation->run() == false){

					$isValidForm = FALSE;

				} else {
					$data	= array("wd_amount_of_wd" 	=> $input["wd_amount_of_wd"],
									"wd_status"			=> $input["wd_status"],
									"wd_description"	=> $input["wd_description"],
									"wd_verified_by"	=> $this->session->userdata("user_id"),
									"wd_date_verified"	=> $date,
									"updated_at"		=> $date);
					$isValidForm = TRUE;
				}
				break;
			case MemberWdStatus::DONE:
				$data	= array("wd_status"			=> $input["wd_status"],
								"wd_verified_by"	=> $this->session->userdata("user_id"),
								"wd_date_verified"	=> $date,
								"updated_at"		=> $date);
				$isValidForm = TRUE;
				break;
			default:
				$data	= array("wd_amount_of_wd" 	=> $input["wd_amount_of_wd"],
								"wd_status"			=> $input["wd_status"],
								"wd_verified_by"	=> $this->session->userdata("user_id"),
								"wd_date_verified"	=> $date,
								"updated_at"		=> $date);
				$isValidForm = TRUE;
				break;

		}

		if (!$isValidForm){
			$this->withdrawalEdit($input["wd_id"]);
		} else {
			$this->CrudModel->u("member_withdrawal", $data, $whereWdId);
			redirect("admin/withdrawal");
		}
	}
}
