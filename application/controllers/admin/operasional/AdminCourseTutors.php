<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminCourseTutors extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('admin/login');
		}
	}
	public function index(){
		$query			= 'SELECT FT.*, FCC.course_category_headline, FCC.id fcc_id 
							FROM feducation_tutor FT
							join feducation_course_categories FCC ON FT.tutor_course_category_id = FCC.id'; 					
		$dataTutors		= $this->CrudModel->q($query);
		$content 		= '_adminLayouts/adminCourseTutors/index';
		$data 			= array('session'		=> SessionType::ADMIN,
								'dataTutors'	=> $dataTutors,
								'content'		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function create(){
		$content 				= '_adminLayouts/adminCourseTutors/create';
		$dataCourseCategories 	= $this->CrudModel->ga("feducation_course_categories"); 
		$data 					= array('session'				=> SessionType::ADMIN,
										'dataCourseCategories'	=> $dataCourseCategories,
										'content'				=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('tutor_name', 'Nama Tutor', 'trim|required');
		$this->form_validation->set_rules('tutor_email', 'Email Tutor', 'trim|required|valid_email');
		$this->form_validation->set_rules('tutor_phone_number', 'No. Hp Tutor', 'trim|required');
		$this->form_validation->set_rules('tutor_achievement', 'Achievement Tutor', 'trim|required');
		$this->form_validation->set_rules('tutor_course_category_id', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('tutor_overview', 'Deskripsi Tutor', 'trim|required');
		$this->form_validation->set_rules('tutor_linkedin', 'Url Linkedin', 'trim|required');
		$this->form_validation->set_rules('tutor_facebook', 'Url Facebook', 'trim|required');
		$this->form_validation->set_rules('tutor_instagram', 'Url Instagram', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		}else{
			$data 	= array("tutor_name" 				=> $input["tutor_name"],
							"tutor_email"				=> $input["tutor_email"],
							"tutor_phone_number" 		=> $input["tutor_phone_number"],
							"tutor_achievement"			=> $input["tutor_achievement"],
							"tutor_course_category_id"	=> $input["tutor_course_category_id"],
							"tutor_overview"			=> $input["tutor_overview"],
							"tutor_image"				=> $input["tutor_image"],
							"tutor_facebook"			=> $input["tutor_facebook"],
							"tutor_linkedin"			=> $input["tutor_linkedin"],
							"tutor_instagram"			=> $input["tutor_instagram"],
							"created_at"				=> date('Y-m-d H:i:s'),
							"created_by"				=> $this->session->userdata('user_id'));

			$this->CrudModel->i("feducation_tutor", $data);
			redirect('admin/course/tutor');
		}
	}

	public function edit($id = NULL){
		$dataTutor				= $this->CrudModel->gw("feducation_tutor", array("id" => $id));
		$dataCourseCategories 	= $this->CrudModel->ga("feducation_course_categories");
		$content 				= '_adminLayouts/adminCourseTutors/edit';
		$data 					= array('session'				=> SessionType::ADMIN,
										'dataTutor'				=> current($dataTutor),
										'dataCourseCategories'	=> $dataCourseCategories,
										'content'				=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('tutor_name', 'Nama Tutor', 'trim|required');
		$this->form_validation->set_rules('tutor_email', 'Email Tutor', 'trim|required|valid_email');
		$this->form_validation->set_rules('tutor_phone_number', 'No. Hp Tutor', 'trim|required');
		$this->form_validation->set_rules('tutor_achievement', 'Achievement Tutor', 'trim|required');
		$this->form_validation->set_rules('tutor_course_category_id', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('tutor_overview', 'Deskripsi Tutor', 'trim|required');
		$this->form_validation->set_rules('tutor_linkedin', 'Url Linkedin', 'trim|required');
		$this->form_validation->set_rules('tutor_facebook', 'Url Facebook', 'trim|required');
		$this->form_validation->set_rules('tutor_instagram', 'Url Instagram', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		}else{
			$data 	= array("tutor_name" 				=> $input["tutor_name"],
							"tutor_email"				=> $input["tutor_email"],
							"tutor_phone_number" 		=> $input["tutor_phone_number"],
							"tutor_achievement"			=> $input["tutor_achievement"],
							"tutor_course_category_id"	=> $input["tutor_course_category_id"],
							"tutor_overview"			=> $input["tutor_overview"],
							"tutor_image"				=> $input["tutor_image"],
							"tutor_facebook"			=> $input["tutor_facebook"],
							"tutor_linkedin"			=> $input["tutor_linkedin"],
							"tutor_instagram"			=> $input["tutor_instagram"],
							"updated_at"				=> date('Y-m-d H:i:s'),
							"updated_by"				=> $this->session->userdata('user_id'));

			$whereId	= array("id" => $input["tutor_id"]);
			$this->CrudModel->u("feducation_tutor", $data, $whereId);
			redirect('admin/course/tutor');
		}
	}

	public function delete($id = NULL){
		$whereId 		= array("id" => $id);
		$dataTutor 		= $this->CrudModel->gw('feducation_tutor',  $whereId);
		$collectIntern	= current($dataTutor);

		if($collectIntern->tutor_image != null){
			$target_thumbnail 	= './assets/images/tutors/'.$collectIntern->tutor_image;
			unlink($target_thumbnail);
		}

		$this->CrudModel->d('feducation_tutor', $whereId);
		redirect(site_url('admin/course/tutor'));
	}
}
