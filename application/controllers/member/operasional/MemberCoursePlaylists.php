<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberCoursePlaylists extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {

		$content    				= '_memberLayouts/memberCoursePlaylists/index';
		$memberId   				= $this->session->userdata('member_id');
		$dataMemberCoursePlaylists	= array();
		$getMemberCoursePlaylists	= $this->CrudModel->gwo("member_course_playlist", array("member_id" => $this->session->userdata("member_id")), 'created_at DESC');

		foreach($getMemberCoursePlaylists as $mcp){
			$dataCourse		= current($this->CrudModel->gw('feducation_courses', array('id' => $mcp->course_id)));
			$dataCourseModuls 	= $this->CrudModel->cwo('feducation_course_moduls', array('feducation_course_id' => $mcp->course_id), 'created_at DESC');

			$coursePlaylists 	= new stdClass();

			$coursePlaylists->feducation_course_id			= $dataCourse->id;
			$coursePlaylists->feducation_course_headline	= $dataCourse->course_headline;
			$coursePlaylists->feducation_course_slug		= $dataCourse->course_slug;
			$coursePlaylists->feducation_course_thumbnail	= $dataCourse->course_thumbnail;
			$coursePlaylists->feducation_course_description	= $dataCourse->course_description;
			$coursePlaylists->feducation_course_duration	= $dataCourse->course_total_duration;
			$coursePlaylists->feducation_course_total_modul	= $dataCourseModuls;
			$coursePlaylists->feducation_course_is_added_to_playlist	= "1";
			
			array_push($dataMemberCoursePlaylists, $coursePlaylists);
		}
		
		$data 	= array('session'           => SessionType::MEMBER,
						'dataCoursePlaylits'=> $dataMemberCoursePlaylists,
						'dataMember'	    => $this->CrudModel->gw('member', array("id" => $this->session->userdata('member_id'))),
						'content'		    => $content); 

		$this->load->view('_memberLayouts/wrapper', $data);
	}
}
