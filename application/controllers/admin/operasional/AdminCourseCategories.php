<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCourseCategories extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {

		$content    			= '_adminLayouts/adminCourseCategories/index';
		$datacourse_categories 	= $this->CrudModel->gao('feducation_course_categories', 'created_at DESC');
		$data       			= array('session'    			=> SessionType::ADMIN,
										'csrfName'				=> $this->security->get_csrf_token_name(),
										'csrfToken'				=> $this->security->get_csrf_hash(),
										'dataCourseCategories'	=> $datacourse_categories,
										'content'    			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('course_category_headline', 'Judul Kategori', 'trim|required');
		$this->form_validation->set_rules('course_category_status', 'Status Kategori', 'trim|required');

		if ($this->form_validation->run() == false){
			redirect('admin/course/category');
		}else{
			$data 	= array("course_category_headline" => $input["course_category_headline"],
							"course_category_status"	=> $input["course_category_status"],
							"created_at"				=> date('Y-m-d H:i:s'),
							"created_by"				=> $this->session->userdata('user_id'));

			$this->CrudModel->i("feducation_course_categories", $data);
			redirect('admin/course/category');
		}
	}


	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('course_category_headline', 'Judul Kategori', 'trim|required');
		$this->form_validation->set_rules('course_category_status', 'Status Kategori', 'trim|required');
		$this->form_validation->set_rules('course_category_id', 'Artikel Kategori Id', 'trim|required');

		if ($this->form_validation->run() == false){
			redirect('admin/course/category');
		}else{
			$data 	= array("course_category_headline" => $input["course_category_headline"],
							"course_category_status"	=> $input["course_category_status"],
							"updated_at"				=> date('Y-m-d H:i:s'),
							"updated_by"				=> $this->session->userdata('user_id'));

			$where = array("id" => $input["course_category_id"]);

			$this->CrudModel->u("feducation_course_categories", $data, $where);
			redirect('admin/course/category');
		}
	}
}
