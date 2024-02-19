<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberRoyalty extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('member/login');
		}
	}
	
	public function index() {

		$content 		= '_memberLayouts/memberRoyalty/index';
		$memberId		= $this->session->userdata("member_id");
		$dataRoyalty	= $this->networktree->royalty($memberId);
		$data 			= array('session'			=> SessionType::MEMBER,
								'content'			=> $content,
								'dataRoyalty' 		=> $dataRoyalty);

		$this->load->view('_memberLayouts/wrapper', $data);
	}

}
