<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFeedbacks extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {
		$dataMemberOn			= $this->CrudModel->ga("fast_response");
		$content 				= '_adminLayouts/adminFeedbacks/index';
		$data 					= array('session'		=> SessionType::ADMIN,
										'dataFeedbacks'	=> $dataMemberOn,
										'csrfName'		=> $this->security->get_csrf_token_name(),
										'csrfToken'		=> $this->security->get_csrf_hash(),
										'content'		=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('feedback_id', 'Item', 'trim|required');
		$this->form_validation->set_rules('fast_response_status', 'Status', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->index();
		} else{
			$data = array("status" 			=> $input["fast_response_status"],
							"updated_at"	=> date('Y-m-d H:i:s'),
							"updated_by"	=> $this->session->userdata("user_id"));

			$this->CrudModel->u("fast_response", $data, array("id" => $input["feedback_id"]));

			$this->index();
		}

	}
}
