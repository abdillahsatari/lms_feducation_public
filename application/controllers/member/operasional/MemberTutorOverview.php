<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberTutorOverview extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {

		$content 		= '_memberLayouts/memberTutorOverview/index';
		$loadView       = "_memberLayouts/wrapper";
        $data           = array();
        $tutorId        = $this->input->get('t', TRUE);
        $dataTutor      = $this->CrudModel->gw("feducation_tutor", array("id" => $tutorId));


        if($tutorId && is_numeric($tutorId)){
            if(count($dataTutor) > 0 ){
                
                $data 	= array('session'     		=> SessionType::MEMBER,
                                'dataTutor'         => current($dataTutor),
                                'datatutorCourse'   => $this->CrudModel->gw("feducation_courses", array("course_tutor_id" => $tutorId)),
                                'dataMember'	    => $this->CrudModel->gw('member', array("id" => $this->session->userdata('member_id'))),
                                'content'		    => $content);       
            } else {
                $loadView = "errors/html/error_404";
            }

        } else {
            $loadView = "errors/html/error_404";
        }
        
		$this->load->view($loadView, $data);

	}
}
