<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {

		$content 				= '_memberLayouts/dashboard/index';
		$memberId				= $this->session->userdata('member_id');
		$whereId				= array('id' => $memberId);
		$queryHighlightedCourse = 'SELECT * FROM feducation_courses WHERE course_order_number IS NOT NULL ORDER BY course_order_number ASC';

		$memberAfiliation		= $this->CrudModel->cw("member", array("member_parent_id" => $this->session->userdata("member_id")));

		// data filter
		$dataCourseCategory		= $this->CrudModel->gw("feducation_course_categories", array("course_category_status" => TRUE));
		$dataCourseTutors		= $this->CrudModel->ga("feducation_tutor");

		$data 					= array('session'     			=> SessionType::MEMBER,
										'memberAfiliation'		=> $memberAfiliation,
										'dataBalance'			=> current($this->FinanceModel->memberFinance($memberId))->totalBalance,
										'dataHighlightedCourses'=> $this->CrudModel->q($queryHighlightedCourse),
										'dataCourseCategory'	=> $dataCourseCategory,
										'dataCourseTutor'		=> $dataCourseTutors,
										'dataMember'			=> $this->CrudModel->gw('member', $whereId),
										'content'				=> $content);

		$this->load->view('_memberLayouts/wrapper', $data);
	}
}
