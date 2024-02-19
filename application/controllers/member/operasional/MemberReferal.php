<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberReferal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {
		$content 	= '_memberLayouts/memberReferal/index';
		$uplineId	= array("member_parent_id" => $this->session->userdata("member_id"));
		$myTeam		= $this->CrudModel->gw("member", $uplineId);

		$data 		= array('session'     	=> SessionType::MEMBER,
							'myTeam'		=> $myTeam,
							'content'		=> $content);

		$this->load->view('_memberLayouts/wrapper', $data);
	}
}
