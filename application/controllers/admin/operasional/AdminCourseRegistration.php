<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCourseRegistration extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index(){
		$dataMember	= $this->CrudModel->gao("feducation_course_registration", "created_at DESC");
		$content 	= '_adminLayouts/adminCourseRegistration/index';
		$data 		= array('session'				=> SessionType::ADMIN,
							'dataCourseRegistration'=> $dataMember,
							'content'				=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function edit($id = NULL){
		$dataRegistration= current($this->CrudModel->gw("feducation_course_registration", array("id" => $id)));
		$parent			= current($this->CrudModel->gw("feducation_course_registration", array("id" => $dataRegistration->parent_id)));
		$content 		= '_adminLayouts/adminCourseRegistration/edit';
		$data 			= array('session'			=> SessionType::ADMIN,
								'dataRegistration'	=> $dataRegistration,
								'dataParent'		=> $parent,
								'content'			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$data 	= array("member_status" 	=> $input["member_status"],
						"payment_receipt"	=> $input["payment_receipt"],
						"updated_at"		=> date('Y-m-d H:i:s'),
						"updated_by"		=> $this->session->userdata('user_id'));

		$whereId	= array("id" => $input["registrarId"]);
		$this->CrudModel->u("feducation_course_registration", $data, $whereId);
		redirect('admin/course/registration');
	}
}
