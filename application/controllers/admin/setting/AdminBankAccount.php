<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminBankAccount extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('admin/login');
		}
	}

	public function index() {

		$content		= '_adminLayouts/adminBankAccount/index';
		$dataBankAccount= $this->CrudModel->ga("feducation_bank_account");
		$data 			= array('session'     		=> SessionType::ADMIN,
								'dataBankAccount' 	=> $dataBankAccount,
								'content'			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function create() {

		$content		= '_adminLayouts/adminBankAccount/create';
		$data 			= array('session'     		=> SessionType::ADMIN,
								'csrfName'			=> $this->security->get_csrf_token_name(),
								'csrfToken'			=> $this->security->get_csrf_hash(),
								'content'			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);

	}

	public function save() {

		$input = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('nama_pemilik_account', 'Nama Pemilik Akun', 'trim|required');
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required');
		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required');
		$this->form_validation->set_rules('status_is_active', 'Status', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->create();
		} else {
			$data = array('nama_pemilik_account'	=> $input['nama_pemilik_account'],
						  'nama_bank' 				=> $input['nama_bank'],
						  'nomor_rekening'			=> $input['nomor_rekening'],
						  'status_is_active'		=> $input['status_is_active'],
						  'created_by'				=> $this->session->userdata("user_id"),
						  'created_at'				=> date('Y-m-d H:i:s'));

			$this->CrudModel->i('feducation_bank_account', $data);
			redirect('admin/bankAccount');
		}
	}

	public function edit($id) {

		$where			= array('id' => $id);
		$dataBankAccount= $this->CrudModel->gw("feducation_bank_account", $where);
		$content		= '_adminLayouts/adminBankAccount/edit';
		$data 			= array('session'     		=> SessionType::ADMIN,
								'dataBankAccount'	=> $dataBankAccount,
								'csrfName'			=> $this->security->get_csrf_token_name(),
								'csrfToken'			=> $this->security->get_csrf_hash(),
								'content'			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update() {

		$input = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('nama_pemilik_account', 'Nama Pemilik Akun', 'trim|required');
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required');
		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required');
		$this->form_validation->set_rules('status_is_active', 'Status', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->create();
		} else {
			$data = array('nama_pemilik_account'	=> $input['nama_pemilik_account'],
						  'nama_bank' 				=> $input['nama_bank'],
						  'nomor_rekening'			=> $input['nomor_rekening'],
						  'status_is_active'		=> $input['status_is_active'],
						  'updated_by'				=> $this->session->userdata("user_id"),
						  'updated_at'				=> date('Y-m-d H:i:s'));

			$where	= array("id" => $input['feducation_bank_account_id']);
			$this->CrudModel->u('feducation_bank_account', $data, $where);

			redirect('admin/bankAccount');
		}
	}

	public function delete($id) {

		$where = array("id" => $id);
		$this->CrudModel->d('feducation_bank_account', $where);

		redirect('admin/bankAccount');
	}

}
