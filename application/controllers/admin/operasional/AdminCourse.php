<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminCourse extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('admin/login');
		}
	}

	public function index(){

		$content    			= '_adminLayouts/adminCourse/index';
		$dataActiveTypeId 		= $this->input->get('type');
		$dataTypeContent		= $this->CrudModel->gw("feducation_course_types", array("course_type_status" => "1"));
		$dataCourseActiveType	= $this->CrudModel->gw("feducation_course_types", array("id" => $dataActiveTypeId ?: "1"));
		$dataCourseCategories	= $this->CrudModel->ga("feducation_course_categories");
		
		$whereCourseTypeId		= $dataActiveTypeId ?: "1";
		
		$where					= array("course_type_id" => $dataActiveTypeId ?: "1");
		
		$query					= 'SELECT FC.*, FCC.id fcc_id, FCC.course_category_headline fcc_headline FROM feducation_courses FC
									JOIN feducation_course_categories FCC ON FC.course_category_id = FCC.id
									Where FC.course_type_id = "'.$whereCourseTypeId.'"'; 
		$dataCourse				= $this->CrudModel->q($query);

		$data       			= array('session'    			=> SessionType::ADMIN,
										"csrfName" 				=> $this->security->get_csrf_token_name(),
										"csrfToken"				=> $this->security->get_csrf_hash(),
										'dataActiveTypeId'		=> $dataActiveTypeId,
										'dataCourseActiveType' 	=> current($dataCourseActiveType),
										'dataTypeContent'		=> $dataTypeContent,
										'dataCourseCategories'	=> $dataCourseCategories,
										'dataCourse'			=> $dataCourse,
										'content'    			=> $content);

		if ($dataActiveTypeId && count($this->CrudModel->gw("feducation_course_types", array("id" => $dataActiveTypeId))) > 0 || !$dataActiveTypeId){
			$this->load->view('_adminLayouts/wrapper', $data);
		} else {
			$this->load->view('errors/html/error_404');
		}
	}

	public function create(){

		$content    			= '_adminLayouts/adminCourse/create';
		$dataCourseTypes		= $this->CrudModel->gw("feducation_course_types", array("course_type_status" => "1"));
		$dataCourseCategories	= $this->CrudModel->gw("feducation_course_categories", array("course_category_status" => "1"));
		$dataCourseTutors		= $this->CrudModel->ga("feducation_tutor");
		$data					= array('session'   			=> SessionType::ADMIN,
										"csrfName" 				=> $this->security->get_csrf_token_name(),
										"csrfToken"				=> $this->security->get_csrf_hash(),
										"dataCourseTypes"		=> $dataCourseTypes,
										"dataCourseCategories"	=> $dataCourseCategories,
										"dataCourseTutor"		=> $dataCourseTutors,
										'content'   			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save() {

		$input	= $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('course_headline', 'Judul Kelas', 'trim|required');
		$this->form_validation->set_rules('course_slug', 'Judul Kelas', 'trim|required');
		$this->form_validation->set_rules('course_description', 'Deskripsi Kelas', 'trim|required');
		$this->form_validation->set_rules('course_channel', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('course_price', 'Jadwal Kelas', 'trim|required');
		$this->form_validation->set_rules('course_thumbnail', 'Thumbnail Kelas', 'trim|required');
		$this->form_validation->set_rules('course_banner', 'Banner Kelas', 'trim|required');
		$this->form_validation->set_rules('course_tutor_id', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('course_category_id', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('course_type_id', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('course_total_duration', 'Total Durasi Pembelajaran', 'trim|required');
		$this->form_validation->set_rules('course_status', 'Status Kelas', 'trim|required');
		$this->form_validation->set_rules('is_on_schedule', 'On Schedule Status', 'trim|required');

		if($input["is_on_schedule"] == "1"){
			$this->form_validation->set_rules('course_start_date', 'Tgl Mulai Kelas', 'trim|required');
			$this->form_validation->set_rules('course_end_date', 'Tgl Berakhir Kelas', 'trim|required');
			$this->form_validation->set_rules('is_online_course', 'Kategori Perlaksanaan Kelas', 'trim|required');
		}

		if ($this->form_validation->run() == false){
			// var_dump(validation_errors());
			$this->create();
		} else {

			$dataMerge = array();

			$data		= array("course_headline"		=> $input["course_headline"],
								"course_slug"			=> $input["course_slug"],
								"course_description"	=> $input["course_description"],
								"course_channel"		=> $input["course_channel"],
								"course_price"			=> $input["course_price"],
								"course_thumbnail"		=> $input["course_thumbnail"],
								"course_banner"			=> $input["course_banner"],
								"course_tutor_id"		=> $input["course_tutor_id"],
								"course_category_id"	=> $input["course_category_id"],
								"course_type_id"		=> $input["course_type_id"],
								"course_total_duration"	=> $input["course_total_duration"],
								"course_status"			=> $input["course_status"],
								"is_on_schedule" 		=> $input["is_on_schedule"],
								"created_at"			=> date('Y-m-d H:i:s'),
								"created_by"			=> $this->session->userdata("user_id"));
			
			if($input["is_on_schedule"] == "1"){
				$dataOnSchedule = array("course_start_date" => $input["course_start_date"],
										"course_end_date"	=> $input["course_end_date"],
										"is_online_course"	=> $input["is_online_course"]);
				$dataMerge = array_merge($data, $dataOnSchedule);						
			}
			
			// var_dump();
			$this->CrudModel->i("feducation_courses", count($dataMerge) > 0 ? $dataMerge : $data);
			redirect('admin/courses?type='.$input["course_type_id"]);
		}

	}

	public function edit($id){

		$content    			= '_adminLayouts/adminCourse/edit';
		$dataCourseTypes		= $this->CrudModel->gw("feducation_course_types", array("course_type_status" => "1"));
		$dataCourseCategories	= $this->CrudModel->gw("feducation_course_categories", array("course_category_status" => "1"));
		$dataCourseTutors		= $this->CrudModel->ga("feducation_tutor");
		$where					= array("id" => $id);
		$dataCourse 			= $this->CrudModel->gw('feducation_courses', $where);
		
		$data					= array('session'   			=> SessionType::ADMIN,
										"csrfName" 				=> $this->security->get_csrf_token_name(),
										"csrfToken"				=> $this->security->get_csrf_hash(),
										"activeCourseId"		=> $id,
										"dataCourse"			=> current($dataCourse),
										"dataCourseTypes"		=> $dataCourseTypes,
										"dataCourseCategories"	=> $dataCourseCategories,
										"dataCourseTutor"		=> $dataCourseTutors,
										'content'   			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){
		$input	= $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('course_headline', 'Judul Kelas', 'trim|required');
		$this->form_validation->set_rules('course_slug', 'Judul Kelas', 'trim|required');
		$this->form_validation->set_rules('course_description', 'Deskripsi Kelas', 'trim|required');
		$this->form_validation->set_rules('course_channel', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('course_price', 'Jadwal Kelas', 'trim|required');
		$this->form_validation->set_rules('course_thumbnail', 'Thumbnail Kelas', 'trim|required');
		$this->form_validation->set_rules('course_banner', 'Banner Kelas', 'trim|required');
		$this->form_validation->set_rules('course_tutor_id', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('course_category_id', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('course_type_id', 'Kategori Kelas', 'trim|required');
		$this->form_validation->set_rules('course_total_duration', 'Total Durasi Pembelajaran', 'trim|required');
		$this->form_validation->set_rules('is_on_schedule', 'On Schedule Status', 'trim|required');

		if($input["is_on_schedule"] == "1"){
			$this->form_validation->set_rules('course_start_date', 'Tgl Mulai Kelas', 'trim|required');
			$this->form_validation->set_rules('course_end_date', 'Tgl Berakhir Kelas', 'trim|required');
			$this->form_validation->set_rules('is_online_course', 'Kategori Perlaksanaan Kelas', 'trim|required');
		}


		if ($this->form_validation->run() == false){

			$this->edit($input["feducation_course_id"]);

		} else {

			$dataMerge 		= array();

			$data		= array("course_headline"		=> $input["course_headline"],
								"course_slug"			=> $input["course_slug"],
								"course_description"	=> $input["course_description"],
								"course_channel"		=> $input["course_channel"],
								"course_price"			=> $input["course_price"],
								"course_thumbnail"		=> $input["course_thumbnail"],
								"course_banner"			=> $input["course_banner"],
								"course_tutor_id"		=> $input["course_tutor_id"],
								"course_category_id"	=> $input["course_category_id"],
								"course_type_id"		=> $input["course_type_id"],
								"course_total_duration"	=> $input["course_total_duration"],
								"course_status"			=> $input["course_status"],
								"is_on_schedule" 		=> $input["is_on_schedule"],
								"updated_at"			=> date('Y-m-d H:i:s'),
								"updated_by"			=> $this->session->userdata("user_id"));
			
			if($input["is_on_schedule"] == "1"){
				$dataOnSchedule = array("course_start_date" => $input["course_start_date"],
										"course_end_date"	=> $input["course_end_date"],
										"is_online_course"	=> $input["is_online_course"]);
				$dataMerge = array_merge($data, $dataOnSchedule);						
			}
			
			$whereCourseId 	= array("id" => $input["feducation_course_id"]);
			$this->CrudModel->u("feducation_courses", count($dataMerge) > 0 ? $dataMerge : $data, $whereCourseId);
			redirect('admin/courses?type='.$input["course_type_id"]);
		}

	}

	public function delete($id){

		$where 				= array("id" => $id);
		$getCourse 			= $this->CrudModel->gw('feducation_courses',  $where);
		$course				= current($getCourse);

		if($course->course_thumbnail != null){
			$thumbnail_file = './assets/resources/images/courses/thumbnails/'.$course->course_thumbnail;
			unlink($thumbnail_file);
		}

		if($course->course_banner != null){
			$banner_file = './assets/resources/images/courses/banners/'.$course->course_banner;
			unlink($banner_file);
		}

		$this->CrudModel->d('feducation_courses', $where);
		redirect('admin/courses?type='.$course->course_type_id);
	}
}
