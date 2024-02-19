<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminIntern extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('admin/login');
		}
	}
	public function index(){
		$query 			= 'SELECT itn.*, FC.user_full_name FROM intern itn
							JOIN user FC ON itn.created_by = FC.id';
		$dataIntern		= $this->CrudModel->q($query);
		$content 		= '_adminLayouts/adminIntern/index';
		$data 			= array('session'		=> SessionType::ADMIN,
								'dataIntern'	=> $dataIntern,
								'content'		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function create(){
		$content 		= '_adminLayouts/adminIntern/create';
		$data 			= array('session'		=> SessionType::ADMIN,
								'content'		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('intern_name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('intern_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('intern_phone', 'No. Hp', 'trim|required');
		$this->form_validation->set_rules('intern_institution', 'tipe', 'trim|required');
		$this->form_validation->set_rules('intern_tutor', 'tipe', 'trim|required');
		$this->form_validation->set_rules('program_start_date', 'Tgl Mulai', 'trim|required');
		$this->form_validation->set_rules('program_end_date', 'Tgl Selesai', 'trim|required');
		$this->form_validation->set_rules('intern_facebook', 'Link Facebook', 'trim|required');
		$this->form_validation->set_rules('intern_instagram', 'Link Instagram', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		}else{
			$data 	= array("intern_name" 			=> $input["intern_name"],
							"intern_email"			=> $input["intern_email"],
							"intern_phone" 			=> $input["intern_phone"],
							"intern_institution"	=> $input["intern_institution"],
							"intern_tutor"			=> $input["intern_tutor"],
							"intern_image"			=> $input["intern_image"],
							"intern_facebook"		=> $input["intern_facebook"],
							"intern_twitter"		=> $input["intern_twitter"],
							"intern_instagram"		=> $input["intern_instagram"],
							"program_start_date"	=> $input["program_start_date"],
							"program_end_date"		=> $input["program_end_date"],
							"created_at"			=> date('Y-m-d H:i:s'),
							"created_by"			=> $this->session->userdata('user_id'));

			$this->CrudModel->i("intern", $data);
			redirect('admin/pr/intern/list');
		}
	}

	public function edit($id = NULL){
		$query 			= 'SELECT itn.*, FC.user_full_name FROM intern itn
							JOIN user FC ON itn.created_by = FC.id ';
//		$dataIntern		= $this->CrudModel->q($query);
		$dataIntern		= $this->CrudModel->gw("intern", array("id" => $id));
		$content 		= '_adminLayouts/adminIntern/edit';
		$data 			= array('session'		=> SessionType::ADMIN,
								'dataIntern'	=> current($dataIntern),
								'content'		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('intern_name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('intern_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('intern_phone', 'No. Hp', 'trim|required');
		$this->form_validation->set_rules('intern_institution', 'tipe', 'trim|required');
		$this->form_validation->set_rules('intern_tutor', 'tipe', 'trim|required');
		$this->form_validation->set_rules('program_start_date', 'Tgl Mulai', 'trim|required');
		$this->form_validation->set_rules('program_end_date', 'Tgl Selesai', 'trim|required');
		$this->form_validation->set_rules('intern_facebook', 'Link Facebook', 'trim|required');
		$this->form_validation->set_rules('intern_instagram', 'Link Instagram', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		}else{
			$data 	= array("intern_name" 			=> $input["intern_name"],
							"intern_email"			=> $input["intern_email"],
							"intern_phone" 			=> $input["intern_phone"],
							"intern_institution"	=> $input["intern_institution"],
							"intern_tutor"			=> $input["intern_tutor"],
							"intern_image"			=> $input["intern_image"] ?: $input["current_image"],
							"intern_facebook"		=> $input["intern_facebook"],
							"intern_twitter"		=> $input["intern_twitter"],
							"intern_instagram"		=> $input["intern_instagram"],
							"program_start_date"	=> $input["program_start_date"],
							"program_end_date"		=> $input["program_end_date"],
							"updated_at"			=> date('Y-m-d H:i:s'),
							"updated_by"			=> $this->session->userdata('user_id'));

			$whereId	= array("id" => $input["intern_id"]);
			$this->CrudModel->u("intern", $data, $whereId);
			redirect('admin/pr/intern/list');
		}
	}

	public function delete($id = NULL){
		$whereId 		= array("id" => $id);
		$dataIntern 	= $this->CrudModel->gw('intern',  $whereId);
		$collectIntern	= current($dataIntern);

		if($collectIntern->intern_image != null){
			$target_thumbnail 	= './assets/images/interns/'.$collectIntern->intern_image;
			unlink($target_thumbnail);
		}

		$this->CrudModel->d('intern', $whereId);
		redirect(site_url('admin/pr/intern/list') );
	}

	public function presensi(){
		$dataPresensi			= $this->CrudModel->gao("intern_presensi", "created_at DESC");
		$content 				= '_adminLayouts/adminInternPresensi/index';
		$data 					= array('session'		=> SessionType::ADMIN,
										'dataPresensi'	=> $dataPresensi,
										'content'		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

}
