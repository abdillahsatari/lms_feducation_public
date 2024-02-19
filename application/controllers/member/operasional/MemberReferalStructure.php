<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberReferalStructure extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {
		$content 		= '_memberLayouts/MemberReferalStructure/index';
		$memberId		= $this->session->userdata("member_id");
		$member 		= $this->CrudModel->gw("member", array("id" => $memberId));
		$memberCollect	= current($member);

		$data = array('session'     	=> SessionType::MEMBER,
					  "memberFullName"	=> $memberCollect->member_full_name,
					  "memberTree"		=> $this->networktree->generateMemberTree($memberCollect->id),
					  "content"			=> $content);

		$this->load->view('_memberLayouts/wrapper', $data);
	}
}
