<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUser extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {

		$content 	= '_adminLayouts/user/index';
		$data 		= array('session'	=> SessionType::ADMIN,
							'content'	=> 'under_constructions');

		$this->load->view('_adminLayouts/wrapper', $data);
	}
}
