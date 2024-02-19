<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminCourseModul extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('admin/login');
		}
	}

	public function moduls($id, $any){
		// filter invalid id or course
		$query			= 'SELECT * FROM feducation_courses FC
							JOIN feducation_course_types FCT ON FC.course_type_id = FCT.id
							WHERE FCT.course_type_has_schedule = "FALSE" AND FC.id = "'.$id.'"';
		$dataCourses	= $this->CrudModel->q($query);

		if (count($dataCourses) > 0 ){

			$content    		= '_adminLayouts/adminCourseModul/index';
			$query				= 'SELECT FCM.*, FC.id fc_id, FC.course_headline fc_headline, FT.id ft_id, FT.tutor_name ft_name 
									FROM feducation_course_moduls FCM
									JOIN feducation_courses FC ON FCM.feducation_course_id = FC.id
									JOIN feducation_tutor FT ON FC.course_tutor_id = FT.id
									WHERE FCM.feducation_course_id = "'.$id.'"'; 

			$dataCourseModuls	= $this->CrudModel->q($query);
			
			$data					= array('session'   		=> SessionType::ADMIN,
											"csrfName" 			=> $this->security->get_csrf_token_name(),
											"csrfToken"			=> $this->security->get_csrf_hash(),
											"activeCourseId"	=> $id,
											"dataCourseModuls"	=> $dataCourseModuls,
											'content'   		=> $content);

				$this->load->view('_adminLayouts/wrapper', $data);
		} else {
			$this->load->view('errors/html/error_404');
		}
	}

	public function create($id){

		$content	= '_adminLayouts/adminCourseModul/create';
		$data		= array('session'   			=> SessionType::ADMIN,
							"csrfName" 				=> $this->security->get_csrf_token_name(),
							"csrfToken"				=> $this->security->get_csrf_hash(),
							"activeCourseId"		=> $id,
							'content'   			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save() {

		$input	= $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('course_modul_headline', 'Judul Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_description', 'Deskripsi Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_thumbnail', 'Thumbnail Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_video_url', 'Video Url Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_duration', 'Durasi Pembelajaran', 'trim|required');
		$this->form_validation->set_rules('course_modul_presentation', 'File Presentasi Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_status', 'Status Modul', 'trim|required');


		if ($this->form_validation->run() == false){

			$this->create($input["feducation_course_id"]);

		} else {
			$data		= array("feducation_course_id"		=> $input["feducation_course_id"],
								"course_modul_headline"		=> $input["course_modul_headline"],
								"course_modul_description"	=> $input["course_modul_description"],
								"course_modul_thumbnail"	=> $input["course_modul_thumbnail"],
								"course_modul_video_url"	=> $input["course_modul_video_url"],
								"course_modul_duration"		=> $input["course_modul_duration"],
								"course_modul_presentation"	=> $input["course_modul_presentation"],
								"course_modul_status"		=> $input["course_modul_status"],
								"created_at"				=> date('Y-m-d H:i:s'),
								"created_by"				=> $this->session->userdata("user_id"));
			
			$this->CrudModel->i("feducation_course_moduls", $data);
			redirect('admin/course/'.$input["feducation_course_id"]."/moduls");
		}
	}

	public function edit($courseId, $courseModulId){

		$content			= '_adminLayouts/adminCourseModul/edit';
		$dataCourseModul	= $this->CrudModel->gw("feducation_course_moduls", array("id" => $courseModulId));
		$data				= array('session'   			=> SessionType::ADMIN,
									"csrfName" 				=> $this->security->get_csrf_token_name(),
									"csrfToken"				=> $this->security->get_csrf_hash(),
									"activeCourseId"		=> $courseId,
									"activeCourseModulId"	=> $courseModulId,
									"dataCourseModul"		=> current($dataCourseModul),
									'content'   			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){

		$input	= $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('course_modul_headline', 'Judul Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_description', 'Deskripsi Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_thumbnail', 'Thumbnail Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_video_url', 'Video Url Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_duration', 'Durasi Pembelajaran', 'trim|required');
		$this->form_validation->set_rules('course_modul_presentation', 'File Presentasi Modul', 'trim|required');
		$this->form_validation->set_rules('course_modul_status', 'Status Modul', 'trim|required');


		if ($this->form_validation->run() == false){

			$this->edit($input["feducation_course_id"], $input["modul_id"]);

		} else {
			$data		= array("feducation_course_id"		=> $input["feducation_course_id"],
								"course_modul_headline"		=> $input["course_modul_headline"],
								"course_modul_description"	=> $input["course_modul_description"],
								"course_modul_thumbnail"	=> $input["course_modul_thumbnail"],
								"course_modul_video_url"	=> $input["course_modul_video_url"],
								"course_modul_duration"		=> $input["course_modul_duration"],
								"course_modul_presentation"	=> $input["course_modul_presentation"],
								"course_modul_status"		=> $input["course_modul_status"],
								"updated_at"				=> date('Y-m-d H:i:s'),
								"updated_by"				=> $this->session->userdata("user_id"));

			$whereCourseModulId = array("id" => $input["modul_id"]); 
			$this->CrudModel->u("feducation_course_moduls", $data, $whereCourseModulId);
			redirect('admin/course/'.$input["feducation_course_id"]."/moduls");
		}
	}

	public function delete($courseId, $courseModulId){

		$where 				= array("id" => $courseModulId);
		$getCourseModul 	= $this->CrudModel->gw('feducation_course_moduls',  $where);
		$courseModul		= current($getCourseModul);

		if($courseModul->course_modul_thumbnail != null){
			$thumbnail_file = './assets/images/courses/modul_thumbnails/'.$courseModul->course_modul_thumbnail;
			unlink($thumbnail_file);
		}

		if($courseModul->course_modul_presentation != null){
			$presentation_file = './assets/resources/courses/modul_presentation/'.$courseModul->course_modul_presentation;
			unlink($presentation_file);
		}

		$this->CrudModel->d('feducation_course_moduls', $where);
		redirect('admin/course/'.$courseId."/moduls");
	}
}
