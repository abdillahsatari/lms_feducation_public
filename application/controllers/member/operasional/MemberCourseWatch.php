<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberCourseWatch extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED){
			redirect('member/login');
		}
	}

	public function index() {
        $content                = '_memberLayouts/memberCourseWatch/index';
        $loadView               = "_memberLayouts/wrapper";
        $data                   = array();
        $dataCourseSlug         = $this->input->get('v', TRUE);
        $dataCourseModulIndex   = $this->input->get('index', TRUE);

        $courseModulsQuery      = 'SELECT FCM.*, FC.id fc_id, FC.course_headline fc_headline, FC.course_slug, FC.course_category_id cc_id, FCC.course_category_headline fcc_headline 
                                    FROM feducation_course_moduls FCM
                                    JOIN feducation_courses FC ON FCM.feducation_course_id = FC.id
                                    JOIN feducation_course_categories FCC ON FC.course_category_id = FCC.id
                                    WHERE FC.course_slug = "'.$dataCourseSlug.'" ORDER BY FCM.created_at ASC';
        $dataCourseTutorQuery   = 'SELECT FT.*, FC.id fc_id, FC.course_slug, FC.course_tutor_id tutor_id 
                                    FROM feducation_tutor FT
                                    JOIN feducation_courses FC ON FT.id = FC.course_tutor_id
                                    WHERE FC.course_slug = "'.$dataCourseSlug.'"';
        $dataCourseModuls       = $this->CrudModel->q($courseModulsQuery);
        $dataCourseTutor        = $this->CrudModel->q($dataCourseTutorQuery);


        if($dataCourseModulIndex && is_numeric($dataCourseModulIndex)){
            // When The Index Parameter Value is Valid ID (Numbers)
            $modulFilterQuery   = 'SELECT FCM.*, FC.id fc_id, FC.course_headline fc_headline, FC.course_slug, FC.course_category_id cc_id, FCC.course_category_headline fcc_headline 
                                    FROM feducation_course_moduls FCM
                                    JOIN feducation_courses FC ON FCM.feducation_course_id = FC.id
                                    JOIN feducation_course_categories FCC ON FC.course_category_id = FCC.id
                                    WHERE FC.course_slug = "'.$dataCourseSlug.'" AND FCM.id = "'.$dataCourseModulIndex.'" ORDER BY FCM.created_at ASC';
            $requestedModule    = $this->CrudModel->q($modulFilterQuery);

            // filter the index params
            if(count($requestedModule) > 0 ){
                $dataCurrentModul   = current($requestedModule);
                $data 	= array('session'     		=> SessionType::MEMBER,
                                'dataCourseTutor'   => current($dataCourseTutor),
                                'dataCourseModuls'  => $dataCourseModuls,
                                'dataCurrentModul'  => $dataCurrentModul,
                                'dataCourseModulIndex'   => $dataCourseModulIndex,
                                'dataMember'	    => $this->CrudModel->gw('member', array('id' => $this->session->userdata('member_id'))),
                                'content'			=> $content);
            } else {
                $loadView = "errors/html/error_404";
            }

        } elseif($dataCourseModulIndex && !is_numeric($dataCourseModulIndex)){
            // When The Index Parameter Value is Not Valid || Not n course_modul_id (Not Numbers)
            $loadView = "errors/html/error_404";
        
        } else {
            // First Time User Click the Course || No Index Parameter
            $dataCurrentModul   = current($dataCourseModuls);
            $data 	            = array('session'     		=> SessionType::MEMBER,
                                        'dataCourseTutor'   => current($dataCourseTutor),
                                        'dataCourseModuls'  => $dataCourseModuls,
                                        'dataCurrentModul'  => $dataCurrentModul,
                                        'dataCourseModulIndex'   => $dataCourseModulIndex,
                                        'dataMember'	    => $this->CrudModel->gw('member', array('id' => $this->session->userdata('member_id'))),
                                        'content'			=> $content);
        }

		$this->load->view($loadView, $data);
	}
}
