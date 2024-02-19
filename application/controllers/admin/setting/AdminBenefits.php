<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminBenefits extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('admin/login');
		}
	}

	public function index(){
		$content		= '_adminLayouts/adminBenefits/index';
		$query			= 'SELECT FB.*, U.user_full_name as created_by FROM feducation_benefits FB
							JOIN user U ON  FB.created_by = U.id ORDER BY FB.status_is_active';
		$dataBenefits	= $this->CrudModel->q($query);

		$data 			= array('session'     		=> SessionType::ADMIN,
								'dataBenefits' 		=> $dataBenefits,
								'content'			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function create(){
		$content		= '_adminLayouts/adminBenefits/create';
		$data 			= array('session'     		=> SessionType::ADMIN,
								'csrfName'			=> $this->security->get_csrf_token_name(),
								'csrfToken'			=> $this->security->get_csrf_hash(),
								'content'			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save(){

		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('commission_percentage', 'Comission Percentage', 'trim|required');
		$this->form_validation->set_rules('royalty_percentage', 'Royalty Percentage', 'trim|required');
		$this->form_validation->set_rules('status_is_active', 'Status', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->create();
		} else {
			$data = array('commission_percentage'	=> $input['commission_percentage'],
						  'royalty_percentage' 		=> $input['royalty_percentage'],
						  'status_is_active'		=> $input['status_is_active'],
							'created_by'			=> $this->session->userdata("user_id"),
							'created_at'			=> date('Y-m-d H:i:s'));

			$this->CrudModel->i('feducation_benefits', $data);
			redirect('admin/benefits');
		}

	}

	public function edit($id){
		$content		= '_adminLayouts/adminBenefits/edit';
		$where			= array("id" => $id);
		$dataBenefits	= $this->CrudModel->gw("feducation_benefits", $where);
		$data 			= array('session'     		=> SessionType::ADMIN,
								'csrfName'			=> $this->security->get_csrf_token_name(),
								'csrfToken'			=> $this->security->get_csrf_hash(),
								'dataBenefits'		=> current($dataBenefits),
								'content'			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){

		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('commission_percentage', 'Comission Percentage', 'trim|required');
		$this->form_validation->set_rules('royalty_percentage', 'Royalty Percentage', 'trim|required');
		$this->form_validation->set_rules('status_is_active', 'Status', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->edit($input["benefits_id"]);
		} else {
			$data = array('commission_percentage' 	=> $input['commission_percentage'],
							'royalty_percentage' 	=> $input['royalty_percentage'],
							'status_is_active' 		=> $input['status_is_active'],
							'updated_by' 			=> $this->session->userdata("user_id"),
							'updated_at' 			=> date('Y-m-d H:i:s'));

			$where = array("id" => $input["benefits_id"]);
			$this->CrudModel->u('feducation_benefits', $data, $where);
			redirect('admin/benefits');
		}
	}

	public function delete($id){

		$where	= array("id" => $id);
		$this->CrudModel->d("feducation_benefits", $where);
		redirect("admin/benefits");

	}


}
