<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMember extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index(){
		$dataMember	= $this->CrudModel->gao("member", "created_at DESC");
		$content 	= '_adminLayouts/member/index';
		$data 		= array('session'		=> SessionType::ADMIN,
							"csrfName" 		=> $this->security->get_csrf_token_name(),
							"csrfToken"		=> $this->security->get_csrf_hash(),
							'dataMember'	=> $dataMember,
							'content'		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function edit($id = NULL){
		$dataRegistration= current($this->CrudModel->gw("member", array("id" => $id)));
		$parent			= current($this->CrudModel->gw("member", array("id" => $dataRegistration->member_parent_id)));
		$content 		= '_adminLayouts/member/edit';
		$data 			= array('session'			=> SessionType::ADMIN,
								'dataMember'		=> $dataRegistration,
								'dataParentMember'	=> $parent,
								'content'			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$data 	= array("payment_receipt"		=> $input["payment_receipt"],
						"updated_at"			=> date('Y-m-d H:i:s'),
						"updated_by"			=> $this->session->userdata('user_id'));

		$whereId	= array("id" => $input["registrarId"]);
		$this->CrudModel->u("member", $data, $whereId);
		redirect('admin/member');
	}
}
