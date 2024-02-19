<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminLogin extends CI_Controller {

	function __construct() {
		parent::__construct();
//		$this->load->library('nativesession','nativesession');
		if($this->session->userdata('admin_authStatus') == AuthStatus::AUTHORIZED){
			redirect('admin');
		}

	}

	public function index() {
		$data	= array("session"	=> SessionType::ADMIN);
		$this->load->view('authentication/index', $data);
	}

	public function authentication(){
		$this->form_validation->set_rules('uid', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$suffix		= CredentialType::ADMIN;
		$input		= $this->input->post(NULL, TRUE);
		$email 		= $input['uid'];
		$password 	= $input['password'];

		$authService 	= authenticate($email, $password, $suffix);
		$dataMsgInfo	= $authService['message']['info'];
		$dataMsg		= $authService['message']['msg'];
		$dataMsgType	= $authService['message']['type'];

		generalToaster($dataMsgInfo, $dataMsg, $dataMsgType);

		if ($authService['status'] == AuthStatus::AUTHORIZED) {

			$this->session->set_userdata($authService['dataSession']);
//			$this->nativesession->set('statusLogin', 'loggedin');

			switch ($this->session->userdata["user_role_type"]){
				case UserRoleType::ADMIN:
					$dataRedirect = 'admin';
					break;
				case UserRoleType::PUBLIC_RELATIONS:
					$dataRedirect = 'admin/article';
					break;
			}
		} else {
			$dataRedirect ='admin/login';
		};

		redirect($dataRedirect);
	}
}
