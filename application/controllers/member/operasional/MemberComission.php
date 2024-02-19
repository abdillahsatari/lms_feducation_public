<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberComission extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('member/login');
		}
	}

	public function index(){

		$content 		= '_memberLayouts/memberComission/index';
		$memberId		= $this->session->userdata("member_id");
		$dataCommission	= $this->networktree->commission($memberId);
		$data 			= array('session'			=> SessionType::MEMBER,
								'content'			=> $content,
								'dataCommission' 	=> $dataCommission);

		$this->load->view('_memberLayouts/wrapper', $data);

	}
}
