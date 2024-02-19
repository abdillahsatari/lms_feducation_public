<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberCourseOverview extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {

		$content    = '_memberLayouts/memberCourseOverview/index';
		$loadView   = "_memberLayouts/wrapper";
        $data       = array();
        $dataCourse = array();
        $courseSlug = $this->input->get('c', TRUE);
        $getCourse  = $this->CrudModel->gw("feducation_courses", array("course_slug" => $courseSlug));
        $course     = current($getCourse);

        if($courseSlug && !is_numeric($courseSlug)){
            if(count($getCourse) > 0 ){

                $course         = current($getCourse);
                $courseLists    = new stdClass();

                $courseModulsQuery  = 'SELECT FCM.*, FC.id fc_id, FC.course_headline fc_headline, FC.course_slug, FC.course_category_id cc_id, FCC.course_category_headline fcc_headline 
                                        FROM feducation_course_moduls FCM
                                        JOIN feducation_courses FC ON FCM.feducation_course_id = FC.id
                                        JOIN feducation_course_categories FCC ON FC.course_category_id = FCC.id
                                        WHERE FC.course_slug = "'.$courseSlug.'" ORDER BY FCM.created_at ASC';
                $dataCourseModuls   = $this->CrudModel->q($courseModulsQuery);
                $isAddedToPlaylist  = $this->CrudModel->gw("member_course_playlist", array("course_id"=>$course->id, "member_id"=> $this->session->userdata("member_id")));
                

                if(count($isAddedToPlaylist) > 0){
                    $courseIsAddedStatus = "1";
                } else{
                    $courseIsAddedStatus = "0";
                }

                $courseLists->feducation_course_id			            = $course->id;
                $courseLists->feducation_course_headline	            = $course->course_headline;
                $courseLists->feducation_course_slug		            = $course->course_slug;
                $courseLists->feducation_course_price		            = $course->course_price;
                $courseLists->feducation_course_category_id	            = $course->course_category_id;
                $courseLists->feducation_course_thumbnail	            = $course->course_thumbnail;
                $courseLists->feducation_course_banner	                = $course->course_banner;
                $courseLists->feducation_course_description	            = $course->course_description;
                $courseLists->feducation_course_duration	            = $course->course_total_duration;
                $courseLists->feducation_course_moduls	                = $dataCourseModuls;
                $courseLists->feducation_course_total_modul	            = count($dataCourseModuls);
                $courseLists->feducation_course_is_added_to_playlist	= $courseIsAddedStatus;
                
                array_push($dataCourse, $courseLists);

               
                $data 	= array('session'           => SessionType::MEMBER,
                                'dataCourse'        => current($dataCourse),
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
