<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberPassword extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED) {
			redirect('member/login');
		}
	}

	public function index() {

		$content 	= '_memberLayouts/memberPassword/index';
		$data 		= array('session'     	=> SessionType::MEMBER,
							'csrfName'			=> $this->security->get_csrf_token_name(),
							'csrfToken'			=> $this->security->get_csrf_hash(),
							'content'		=> $content);

		$this->load->view('_memberLayouts/wrapper', $data);
	}

	public function update() {

		$input 	= $this->input->post(NULL, TRUE);
		$where	= array('id' => $this->session->userdata("member_id"));
		$retypePassword	= $input['retype_password'];

		$data 	= array('member_password' 	=> password_hash($retypePassword, PASSWORD_BCRYPT));

		$this->CrudModel->u('member', $data, $where);

		redirect('member/password');

	}
}
