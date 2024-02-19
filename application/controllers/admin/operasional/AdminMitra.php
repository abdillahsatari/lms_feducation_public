<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMitra extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {
		$dataMitra		= $this->CrudModel->gao("feducation_mitra", "created_at DESC");
		$content 		= '_adminLayouts/adminMitra/index';
		$data 			= array('session'		=> SessionType::ADMIN,
								'dataMitra'		=> $dataMitra,
								'content'		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	 public function create(){
		$content 	= '_adminLayouts/adminMitra/create';
		$data		= array('session' => SessionType::ADMIN,
					'csrfName'		=> $this->security->get_csrf_token_name(),
					'csrfToken'		=> $this->security->get_csrf_hash(),
					'content'		=> $content);

		 $this->load->view('_adminLayouts/wrapper', $data);
	 }

	 public function save(){
		 $input = $this->input->post(NULL, TRUE);
		 $this->form_validation->set_rules('mitra_name', 'Nama Perusahaan', 'trim|required');
		 $this->form_validation->set_rules('mitra_address', 'Alamat Perusahaan', 'trim|required');
		 $this->form_validation->set_rules('mitra_link', 'Link Perusahaan', 'trim|required');
		 $this->form_validation->set_rules('mitra_status', 'Status', 'trim|required');
		 $this->form_validation->set_rules('mitra_logo', 'Logo', 'trim|required');

		 if ($this->form_validation->run() == false){
			 $this->create();
		 }else{
			 $data 	= array("mitra_name" 			=> $input["mitra_name"],
							 "mitra_address"		=> $input["mitra_address"],
							 "mitra_link" 			=> $input["mitra_link"],
							 "mitra_status"			=> $input["mitra_status"],
							 "mitra_logo"			=> $input["mitra_logo"],
							 "created_at"			=> date('Y-m-d H:i:s'),
							 "created_by"			=> $this->session->userdata('user_id'));

			 $this->CrudModel->i("feducation_mitra", $data);
			 redirect('admin/pr/mitra/bisnis');
		 }
	 }

	 public function edit($id=NULL){
		 $whereId = array("id" => $id);
		 $dataMitra	= $this->CrudModel->gw("feducation_mitra", $whereId);
		 $content 	= '_adminLayouts/adminMitra/edit';
		 $data		= array('session' 	=> SessionType::ADMIN,
						 'dataMitra'	=> current($dataMitra),
						 'csrfName'		=> $this->security->get_csrf_token_name(),
						 'csrfToken'	=> $this->security->get_csrf_hash(),
						 'content'		=> $content);

		 $this->load->view('_adminLayouts/wrapper', $data);
	 }

	 public function update(){
		 $input = $this->input->post(NULL, TRUE);
		 $this->form_validation->set_rules('mitra_name', 'Nama Perusahaan', 'trim|required');
		 $this->form_validation->set_rules('mitra_address', 'Alamat Perusahaan', 'trim|required');
		 $this->form_validation->set_rules('mitra_link', 'Link Perusahaan', 'trim|required');
		 $this->form_validation->set_rules('mitra_status', 'Status', 'trim|required');
		 $this->form_validation->set_rules('mitra_logo', 'Logo', 'trim|required');

		 if ($this->form_validation->run() == false){
			 $this->edit();
		 }else{
			 $data 	= array("mitra_name" 			=> $input["mitra_name"],
							 "mitra_address"		=> $input["mitra_address"],
							 "mitra_link" 			=> $input["mitra_link"],
							 "mitra_status"			=> $input["mitra_status"],
							 "mitra_logo"			=> $input["mitra_logo"],
							 "updated_at"			=> date('Y-m-d H:i:s'),
							 "updated_by"			=> $this->session->userdata('user_id'));


			 $whereId	= array("id" => $input["mitra_id"]);
			 $this->CrudModel->u("feducation_mitra", $data, $whereId);
			 redirect('admin/pr/mitra/bisnis');
		 }
	 }
}
