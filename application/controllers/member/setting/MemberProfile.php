<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberProfile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {

		$content 	= '_memberLayouts/memberAccount/index';
		$idMember	= array('id' 			=> $this->session->userdata('member_id'));
		$data 		= array('session'     	=> SessionType::MEMBER,
							'csrfName'		=> $this->security->get_csrf_token_name(),
							'csrfToken'		=> $this->security->get_csrf_hash(),
							'dataMember'	=> $this->CrudModel->gw('member', $idMember),
							'content'		=> $content);

		$this->load->view('_memberLayouts/wrapper', $data);
	}

	public function update() {

		$input	= $this->input->post(NULL, TRUE);

		$data	= array("member_full_name"		=> $input["member_full_name"],
						"member_phone_number"	=> $input["member_phone_number"],
						"member_address"		=> $input["member_address"]);

		$where	= array("id" => $this->session->userdata("member_id"));

		$this->CrudModel->u("member", $data, $where);

		redirect("member/profile");

	}
}
