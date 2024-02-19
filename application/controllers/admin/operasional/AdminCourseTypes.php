<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCourseTypes extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {

		$content    		= '_adminLayouts/adminCourseTypes/index';
		$dataCourseTypes    = $this->CrudModel->gao('feducation_course_types', 'created_at DESC');
		$data       		= array('session'    		=> SessionType::ADMIN,
                                    'csrfName'			=> $this->security->get_csrf_token_name(),
                                    'csrfToken'			=> $this->security->get_csrf_hash(),
                                    'dataCourseTypes'	=> $dataCourseTypes,
                                    'content'    		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('course_type_headline', 'Judul Tipe', 'trim|required');
		$this->form_validation->set_rules('course_type_status', 'Status Tipe', 'trim|required');
		$this->form_validation->set_rules('course_type_has_intake', 'Intake Status', 'trim|required');

		if ($this->form_validation->run() == false){
			redirect('admin/course/types');
		}else{
			$data 	= array("course_type_headline"  => $input["course_type_headline"],
							"course_type_status"	=> $input["course_type_status"],
							"course_type_has_intake"=> $input["course_type_has_intake"],
							"created_at"			=> date('Y-m-d H:i:s'),
							"created_by"			=> $this->session->userdata('user_id'));

			$this->CrudModel->i("feducation_course_types", $data);
			redirect('admin/course/types');
		}
	}


	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('course_type_headline', 'Judul Tipe', 'trim|required');
		$this->form_validation->set_rules('course_type_status', 'Status Tipe', 'trim|required');
		$this->form_validation->set_rules('course_type_has_schedule', 'Intake Status', 'trim|required');
		$this->form_validation->set_rules('course_type_id', 'Course Tipe Id', 'trim|required');

		if ($this->form_validation->run() == false){
			redirect('admin/course/types');
		}else{
			$data 	= array("course_type_headline"  	=> $input["course_type_headline"],
							"course_type_has_schedule"	=> $input["course_type_has_schedule"],
							"course_type_status"		=> $input["course_type_status"],
							"updated_at"				=> date('Y-m-d H:i:s'),
							"updated_by"				=> $this->session->userdata('user_id'));

			$where = array("id" => $input["course_type_id"]);

			$this->CrudModel->u("feducation_course_types", $data, $where);
			redirect('admin/course/types');
		}
	}
}
