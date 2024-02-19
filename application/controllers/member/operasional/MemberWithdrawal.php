<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberWithdrawal extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('member/login');
		}
	}

	public function index() {

		$content 				= '_memberLayouts/memberWithdrawal/index';
		$memberId				= $this->session->userdata("member_id");
		$whereId				= array("member_id" => $memberId);
		$dataBankTransfer 		= $this->CrudModel->gw("member_bank_account", $whereId);
		$dataWithdrawal			= $this->networktree->withdrawal($memberId);


		$data 	= array('session'			=> SessionType::MEMBER,
						'csrfName' 			=> $this->security->get_csrf_token_name(),
						'csrfToken'			=> $this->security->get_csrf_hash(),
						'content'			=> $content,
						'dataWithdrawal' 	=> $dataWithdrawal,
						'dataBankTransfer'	=> $dataBankTransfer);

		$this->load->view('_memberLayouts/wrapper', $data);
	}

	public function save(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('wd_member_bank_id', 'Payment Gateway', 'trim|required');
		$this->form_validation->set_rules('wd_amount_input', 'Jumlah WD', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		} else {
			$data = array(	'wd_member_id'		=> $this->session->userdata("member_id"),
							'wd_member_bank_id' => $input['wd_member_bank_id'],
							'wd_status'			=> MemberWdStatus::WD_NEW,
							'created_at'		=> date('Y-m-d H:i:s'),
							'wd_amount_input'	=> $input['wd_amount_input']);

			$this->CrudModel->i('member_withdrawal', $data);

			redirect('member/withdrawal');
		}
	}

}
