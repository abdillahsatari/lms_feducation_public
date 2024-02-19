<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
	
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {

		$whereMemberIsActivated		= array("member_status" => "Terjadwal");
		$dataCountActivedMember		= $this->CrudModel->cw("feducation_course_registration", $whereMemberIsActivated);
		$dataCountRegisteredMember	= $this->CrudModel->cw("feducation_course_registration", "member_status IS NULL");

		$content 	= '_adminLayouts/dashboard/index';
		$data 		= array('session'						=> SessionType::ADMIN,
							'dataCountActiveMember'			=> $dataCountActivedMember,
							'dataCountRegisteredMember'		=> $dataCountRegisteredMember,
							'content'						=> $content );

		$this->load->view('_adminLayouts/wrapper', $data);
	}
}
