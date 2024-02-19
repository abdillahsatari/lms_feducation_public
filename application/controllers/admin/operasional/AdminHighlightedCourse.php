<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHighlightedCourse extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {
		$content    	= '_adminLayouts/adminHighlightedCourse/index';
		// $dataCourse		= $this->CrudModel->gwo("feducation_courses", 'course_order_number IS NOT NULL', 'course_order_number ASC');
		$query			= 'SELECT * FROM feducation_courses FC
							JOIN feducation_tutor FT ON FC.course_tutor_id = FT.id
							WHERE FC.course_order_number IS NOT NULL 
							ORDER BY FC.course_order_number ASC';
		$dataCourse		= $this->CrudModel->q($query);
		$data       	= array('session'    	=> SessionType::ADMIN,	
								'dataCourse'	=> $dataCourse,
								'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function create() {
		$content    = '_adminLayouts/adminHighlightedCourse/create';
		$where		= array("course_order_number" => null);
		$dataCourses= $this->CrudModel->gwo('feducation_courses', $where ,'created_at DESC');
		$data       = array('session'    	=> SessionType::ADMIN,
							"csrfName" 		=> $this->security->get_csrf_token_name(),
							"csrfToken"		=> $this->security->get_csrf_hash(),
							'coursesList'	=> $dataCourses,
							'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save() {
		$input	= $this->input->post(NULL, TRUE);
		$data	= array("course_order_number"	=> $input["course_order_number"]);

		$where	= array("id" => $input["course_id"]);
		$this->CrudModel->u("feducation_courses", $data, $where);
		redirect('admin/course/highlight');
	}

	public function edit($id) {
		$content    = '_adminLayouts/adminHighlightedCourse/edit';
		$where		= array("id" => $id);
		$dataCourses= $this->CrudModel->gw('feducation_courses', $where);
		$data       = array('session'    	=> SessionType::ADMIN,
							"csrfName" 		=> $this->security->get_csrf_token_name(),
							"csrfToken"		=> $this->security->get_csrf_hash(),
							'courseList'	=> current($dataCourses),
							'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);

	}

	public function update() {
		$input	= $this->input->post(NULL, TRUE);
		$data	= array("course_order_number"	=> $input["course_order_number"]);

		$where	= array("id" => $input["course_id"]);
		$this->CrudModel->u("feducation_courses", $data, $where);
		redirect('admin/course/highlight');
	}

	public function delete($id) {
		$data	= array("course_order_number"	=> null);

		$where	= array("id" => $id);
		$this->CrudModel->u("feducation_courses", $data, $where);
		redirect('admin/course/highlight');
	}

}
