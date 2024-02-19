<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberAjax extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('member_authStatus') != AuthStatus::AUTHORIZED) {
			redirect('member/login');
		}
	}

	public function coursesInit(){
		
		$response 			= array();
		$csrf_token  		= $this->security->get_csrf_hash();
		$dataCourseCategory	= $this->CrudModel->gw("feducation_course_categories", array("course_category_status" => TRUE));

		foreach($dataCourseCategory as $cc){

			$dataCourses		= array();
			$getCourses			= $this->CrudModel->gwo('feducation_courses', array('course_category_id' => $cc->id, 'course_status' => TRUE), 'created_at DESC');

			foreach($getCourses as $course){
				
				$dataCourseModuls 	= $this->CrudModel->gwo('feducation_course_moduls', array('feducation_course_id' => $course->id), 'created_at DESC');
			
				$courseLists 	= new stdClass();
				$courseLists->feducation_course_id			= $course->id;
				$courseLists->feducation_course_headline	= $course->course_headline;
				$courseLists->feducation_course_slug		= $course->course_slug;
				$courseLists->feducation_course_thumbnail	= $course->course_thumbnail;
				$courseLists->feducation_course_description	= $course->course_description;
				$courseLists->feducation_course_duration	= $course->course_total_duration;
				$courseLists->feducation_course_total_modul	= count($dataCourseModuls);
				
				array_push($dataCourses, $courseLists);
			}

		
			$dataAccordionCourses 	= new stdClass();
			$dataAccordionCourses->course_category_id		= $cc->id;
			$dataAccordionCourses->course_category_headline	= $cc->course_category_headline;
			$dataAccordionCourses->courses					= $dataCourses;

			array_push($response, $dataAccordionCourses);
		}

		$result = array('csrf_token' 	=> $csrf_token, 
						'response' 		=> $response);

		echo json_encode($result);
		die();
	}

	public function filterCoursesInit(){
		
		$response 			= array();
		$input				= $this->input->post(NULL, TRUE);
		$csrf_token  		= $this->security->get_csrf_hash();
		$queryOrder 		= $input["filterByOrder"] ?: "DESC";
		$dataCourseCategory	= $this->CrudModel->gw("feducation_course_categories", array("course_category_status" => TRUE));

		if($input["filterByHeadline"]){
			$response 	= array("headline value" => $input["filterByHeadline"]);
			$courses 	= $this->CrudModel->gwo("feducation_courses", "course_headline LIKE '%".$input["filterByHEadline"]."%'", "created_at ".$queryOrder."");



			
		} else {
			$response = array("headline value" => "ini berjalan kalau headline kosong");
		}
		// foreach($dataCourseCategory as $cc){

		// 	$dataCourses	= array();
		// 	$getCourses		= $this->CrudModel->gwo('feducation_courses', array('course_category_id' => $cc->id, 'course_status' => TRUE), 'created_at DESC');

		// 	foreach($getCourses as $course){
				
		// 		$dataCourseModuls 	= $this->CrudModel->gwo('feducation_course_moduls', array('feducation_course_id' => $course->id), 'created_at DESC');
			
		// 		$courseLists 	= new stdClass();
		// 		$courseLists->feducation_course_id			= $course->id;
		// 		$courseLists->feducation_course_headline	= $course->course_headline;
		// 		$courseLists->feducation_course_slug		= $course->course_slug;
		// 		$courseLists->feducation_course_thumbnail	= $course->course_thumbnail;
		// 		$courseLists->feducation_course_description	= $course->course_description;
		// 		$courseLists->feducation_course_duration	= $course->course_total_duration;
		// 		$courseLists->feducation_course_total_modul	= count($dataCourseModuls);
				
		// 		array_push($dataCourses, $courseLists);
		// 	}

		
		// 	$dataAccordionCourses = new stdClass();
		// 	$dataAccordionCourses->course_category_id		= $cc->id;
		// 	$dataAccordionCourses->course_category_headline	= $cc->course_category_headline;
		// 	$dataAccordionCourses->courses					= $dataCourses;

		// 	array_push($response, $dataAccordionCourses);
		// }

		$result = array('csrf_token' 	=> $csrf_token, 
						'response' 		=> $response);

		echo json_encode($result);
		die();
	}

	public function relatedCourseInit(){
		$response 	= array();
		$input		= $this->input->post(NULL, TRUE);
		$csrf_token = $this->security->get_csrf_hash();

		switch($input["relatedType"]){
			case "categories":
				$where 	= array('course_category_id' => $input['relatedId'],
								"id"				=> "NOT IN (".$input["exceptId"].")",
								'course_status' 	=> TRUE);
				break;
			case "tutors":
				$where = array('course_tutor_id' => $input['relatedId'],
								'course_status' => TRUE);
				break;
				default:
				$where = array('course_tuor_id' => $input['relatedId'],
								'course_status' => TRUE);
		}

		$getCourses	= $this->CrudModel->gwo('feducation_courses', $where, 'created_at DESC');

		if(count($getCourses) > 0){
			foreach($getCourses as $course){
			
				$dataCourseModuls = $this->CrudModel->gwo('feducation_course_moduls', array('feducation_course_id' => $course->id), 'created_at DESC');
			
				$courseLists = new stdClass();
				$courseLists->feducation_course_id			= $course->id;
				$courseLists->feducation_course_headline	= $course->course_headline;
				$courseLists->feducation_course_slug		= $course->course_slug;
				$courseLists->feducation_course_thumbnail	= $course->course_thumbnail;
				$courseLists->feducation_course_description	= $course->course_description;
				$courseLists->feducation_course_duration	= $course->course_total_duration;
				$courseLists->feducation_course_total_modul	= count($dataCourseModuls);
				
				array_push($response, $courseLists);
			}
		}

		$result = array('csrf_token' 	=> $csrf_token, 
						'response' 		=> $response);

		echo json_encode($result);
		die();
	}

	public function playlistButtonControl(){

		$response	= array();
		$input		= $this->input->post(NULL, TRUE);
		$csrf_token = $this->security->get_csrf_hash();

		$controlPlaylist = new stdClass();

		if($input["controlBtnStatus"]){
			$where	= array("member_id"	=> $this->session->userdata('member_id'),
							"course_id"	=> $input["courseId"]);

			$controlPlaylist->action_status = $this->CrudModel->drs("member_course_playlist", $where);

		} else {

			$dataPlaylist	= array("member_id" 	=> $this->session->userdata('member_id'),
									"course_id"		=> $input["courseId"],
									"created_by"	=> $this->session->userdata('member_id'),
									"created_at"	=> date('Y-m-d H:i:s'));

			$controlPlaylist->action_status = $this->CrudModel->irs("member_course_playlist", $dataPlaylist);
		}		
	
		array_push($response, $controlPlaylist);

		$result = array('csrf_token' 	=> $csrf_token, 
						'response' 		=> $response);
		
		echo json_encode($result);
		die();
	}

	public function getFeducationBankAccount() {
		$input	= $this->input->post(NULL, TRUE);
		$where 	= array('id' => $input['selectValue']);
		$ajax 	= $this->CrudModel->gw('feducation_bank_account', $where);

		$csrf_token  = $this->security->get_csrf_hash();
		$result = array('csrf_token' => $csrf_token, 'response' => $ajax);

		echo json_encode($result);
		die();
	}

	public function getMemberBankAccount(){
		$input	= $this->input->post(NULL, TRUE);
		$where 	= array('id' => $input['selectValue']);
		$ajax 	= $this->CrudModel->gw('member_bank_account', $where);

		$csrf_token  = $this->security->get_csrf_hash();
		$result = array('csrf_token' => $csrf_token, 'response' => $ajax);

		echo json_encode($result);
		die();
	}

	public function getMemberBankAccountDetail(){
		$input			= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$where 			= array('id' => $input['bankAccountId']);
		$dataBankAccount= $this->CrudModel->gw('member_bank_account', $where);
		
		if(count($dataBankAccount) > 0){
			$response 	= array('status'	=> "success",
								'csrf_token'=> $csrf_token, 
								'data' 		=> current($dataBankAccount));
		} else {
			$response 	= array('status'	=> "failed",
								'csrf_token'=> $csrf_token, 
								'data' 		=> "Cannot find the request.");
		}

		echo json_encode($response);
		die();
	}

	public function postMemberRegistrationReceipt() {
		$config['upload_path']	="./assets/admin/upload/member_transaction_receipt";
		$config['allowed_types']='jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;
		$csrf_token  			= $this->security->get_csrf_hash();

		if (isset($_FILES['file']['name'])) {
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$result = array ('status' 		=> 'failed',
								'data' 			=> $this->upload->display_errors(),
								'csrf_token' 	=> $csrf_token);
			} else {
				$dataUploaded = $this->upload->data();
				$result = array ('status' 		=> 'success',
								'data' 			=> $dataUploaded['file_name'],
								'csrf_token' 	=> $csrf_token);
			}

			echo json_encode($result);
		}

		die();
	}

	public function postMemberImageProfile(){
		$input 			= $this->input->post(NULL, TRUE);
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'memberProfileImage_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/accounts/memberImageProfiles";
		$config['allowed_types']	='*';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$result = array ('status' 		=> 'failed',
								'data' 			=> $this->upload->display_errors(),
								'csrf_token' 	=> $csrf_token);
			} else {

				// delete old image if exist
				$where 				= array("id" => $input['memberId']);
				$getMember 			= $this->CrudModel->gw('member',  $where);
				$member				= current($getMember);

				if($member->member_image != null){
					$profileImage_file = './assets/resources/images/accounts/memberImageProfiles/'.$member->member_image;
					unlink($profileImage_file);
				}		

				// update member image db
				$dataUploaded	= $this->upload->data();
				$data 			= array('member_image' => $dataUploaded['file_name']);
				$where 			= array("id" => $this->session->userdata('member_id'));
				$this->CrudModel->u('member', $data, $where);
				
				// update data session
				$sess 			= array('member_image'	=> $dataUploaded['file_name']);
				$this->session->set_userdata($sess);

				// data return
				$result = array ('status' 	=> 'success',
								'data' 		=> $dataUploaded['file_name'],
								'csrf_token'=> $csrf_token);
			}
			
			echo json_encode($result);
		}

		die();
	}

	public function validateMemberWdAmmount(){
		$input			= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$memberId		= $this->session->userdata("member_id");


		$getMemberBalance = current($this->FinanceModel->memberFinance($memberId))->totalBalance;

		if($input["wdInputAmmount"] > $getMemberBalance || !$input["wdInputAmmount"]){
			$balanceValidate = false;
		} else {
			$balanceValidate = true;
		}

		if($input["wdInputAmmount"] < 100000){
			$minimumAmmountValidate = false;
		} else {
			$minimumAmmountValidate = true;
		}

		$dataValidate 	= array("balanceValidate" 		=> $balanceValidate,
								"minimumAmmountValidate"=> $minimumAmmountValidate);

		$result 		= array ('data'			=> $dataValidate,
								'csrf_token' 	=> $csrf_token);

		echo json_encode($result);
		die();
	}

}
