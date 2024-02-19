<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberBankAccount extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {

		$content 			= '_memberLayouts/memberBankAccount/index';
		$idMember			= $this->session->userdata('member_id');
		$where				= array("member_id" => $idMember);
		$memberBankAccount	= $this->CrudModel->gwo("member_bank_account", $where, "created_at DESC");

		$data 		= array('session'     		=> SessionType::MEMBER,
							'dataMemberAccount' => $memberBankAccount,
							'csrfName'			=> $this->security->get_csrf_token_name(),
							'csrfToken'			=> $this->security->get_csrf_hash(),
							'content'			=> $content);

		$this->load->view('_memberLayouts/wrapper', $data);
	}

	public function save() {

		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required');
		$this->form_validation->set_rules('pemilik_rekening', 'Nama Pemilik', 'trim|required');
		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		} else {
			$data = array(	'member_id'			=> $this->session->userdata("member_id"),
							'nama_bank' 		=> $input['nama_bank'],
							'nomor_rekening'	=> $input['nomor_rekening'],
							'pemilik_rekening'	=> $input['pemilik_rekening']);

			$this->CrudModel->i('member_bank_account', $data);

			redirect('member/bank/account');
		}
	}

	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required');
		$this->form_validation->set_rules('pemilik_rekening', 'Nama Pemilik', 'trim|required');
		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		} else {
			$data 	= array('nama_bank' 		=> $input['nama_bank'],
							'nomor_rekening'	=> $input['nomor_rekening'],
							'pemilik_rekening'	=> $input['pemilik_rekening']);

			$where	= array("id"=> $input["member_bank_account_id"]);

			$this->CrudModel->u('member_bank_account', $data, $where);

			redirect('member/bank/account');
		}
	}

	public function delete($id){
		$where = array("id" => $id);
		$this->CrudModel->d('member_bank_account', $where);

		redirect('member/bank/account');
	}
}
