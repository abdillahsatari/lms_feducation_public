<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAjax extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED) {
			redirect('admin/login');
		}
	}

	/** 
	 * 
	 * 
	 *  ADMIN AJAX ARTICLE
	 * 
	 * 
	 * **/

	public function postArticleThumbnail(){
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'articleThumbnail_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/articles/thumbnails";
		$config['allowed_types']	='*';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$result = array ('status' 		=> 'failed',
								'data' 			=> $this->upload->display_errors(),
								'fileType'		=> $_FILES,
								'csrf_token' 	=> $csrf_token);
			} else {

				$dataUploaded = $this->upload->data();
				$result = array ('status' 		=> 'success',
								'data' 			=> $dataUploaded['file_name'],
								'fileType'		=> $_FILES,
								'csrf_token' 	=> $csrf_token);
			}
			echo json_encode($result);
		}

		die();
	}

	public function postArticleCover(){
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'articleCover_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/articles/covers";
		$config['allowed_types']	='*';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$result = array ('status' 		=> 'failed',
								'data' 			=> $this->upload->display_errors(),
								'fileType'		=> $_FILES,
								'csrf_token' 	=> $csrf_token);
			} else {

				$dataUploaded = $this->upload->data();
				$result = array ('status' 		=> 'success',
								'data' 			=> $dataUploaded['file_name'],
								'fileType'		=> $_FILES,
								'csrf_token' 	=> $csrf_token);
			}
			echo json_encode($result);
		}

		die();
	}

	public function adminArticleSlugValidate(){
		$input	= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$where			= array("article_slug" => $input["articleSlug"]);
		$dataCount		= $this->CrudModel->cw("feducation_article", $where);

		$result 		= array ('data'			=> $dataCount,
								'csrf_token' 	=> $csrf_token);

		echo json_encode($result);
		die();
	}

	public function showAdminArticleCategoryDetail(){
		$input = $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();

		$whereId		= array("id" => $input['dataArticleCategoryId']);
		$dataArticleCategory	= $this->CrudModel->gw("feducation_article_categories", $whereId);

		if (count($dataArticleCategory) > 0){
			$result = array('status'	=> 'success',
							'data'		=> current($dataArticleCategory),
							'csrf_token'=> $csrf_token);
		} else {

			$result = array('status'	=> 'failed',
							'csrf_token'=> $csrf_token);
		}

		echo json_encode($result);
		die();
	}

	public function adminFeaturedArticleValidate() {
		$input	= $this->input->post(NULL, TRUE);

		$csrf_token  	= $this->security->get_csrf_hash();
		$where			= array("article_order_number" => $input["ordered_number"]);
		$dataCount		= $this->CrudModel->cw("feducation_article", $where);

		$result 		= array ('data'			=> $dataCount,
								'csrf_token' 	=> $csrf_token);

		echo json_encode($result);
		die();
	}


	/** 
	 * 
	 * 
	 *  ADMIN AJAX COURSE
	 * 
	 * 
	 * **/

	public function createCourseModulFilter(){
		$input		 	= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$query			= 'SELECT *, FC.id fc_id FROM feducation_courses FC
							JOIN feducation_course_types FCT ON FC.course_type_id = FCT.id
							WHERE FCT.course_type_has_schedule = "FALSE" AND FC.course_category_id = "'.$input["categoryId"].'"';
		$dataCourses	= $this->CrudModel->q($query);

		if (count($dataCourses) > 0){
			$result = array('status'	=> 'success',
							'data'		=> $dataCourses,
							'csrf_token'=> $csrf_token);
		} else {

			$result = array('status'	=> 'failed',
							'csrf_token'=> $csrf_token);
		}

		echo json_encode($result);
		die();
	}

	public function adminCourseSlugValidate(){
		$input	= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$where			= array("course_slug" => $input["courseSlug"]);
		$dataCount		= $this->CrudModel->cw("feducation_courses", $where);

		$result 		= array ('data'			=> $dataCount,
								'csrf_token' 	=> $csrf_token);

		echo json_encode($result);
		die();
	}

	public function showAdminCourseCategoryDetail(){
		$input = $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();

		$whereId			= array("id" => $input['dataCourseCategoryId']);
		$dataCourseCategory	= $this->CrudModel->gw("feducation_course_categories", $whereId);

		if (count($dataCourseCategory) > 0){
			$result = array('status'	=> 'success',
							'data'		=> current($dataCourseCategory),
							'csrf_token'=> $csrf_token);
		} else {

			$result = array('status'	=> 'failed',
							'csrf_token'=> $csrf_token);
		}

		echo json_encode($result);
		die();
	}

	public function showAdminCourseTypeDetail(){
		$input 			= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();

		$whereId		= array("id" => $input['dataCourseTypeId']);
		$dataCourseType	= $this->CrudModel->gw("feducation_course_types", $whereId);

		if (count($dataCourseType) > 0){
			$result = array('status'	=> 'success',
							'data'		=> current($dataCourseType),
							'csrf_token'=> $csrf_token);
		} else {

			$result = array('status'	=> 'failed',
							'csrf_token'=> $csrf_token);
		}

		echo json_encode($result);
		die();
	}

	public function postCourseThumbnail() {
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'courseThumbnailImage_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/courses/thumbnails";
		$config['allowed_types']	='jpg|jpeg|png';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	public function postCourseBanner() {
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'courseBannerImage_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/courses/banners";
		$config['allowed_types']	='jpg|jpeg|png';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	public function postCourseTutorImage(){
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'tutorImage_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/tutors";
		$config['allowed_types']	='jpg|jpeg|png';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	public function postCourseModulThumbnail() {
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'courseModulThumbnailImage_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/courses/modul_thumbnails";
		$config['allowed_types']	='jpg|jpeg|png';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	public function postCourseModulPresentation(){
		$input 			= $this->input->post(NULL, TRUE);
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'modulPresentasi_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/documents/course_modul_presentation";
		$config['allowed_types']	='pdf|ppt|pptx';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	public function adminHighlightedcourseValidation() {
		$input	= $this->input->post(NULL, TRUE);

		$csrf_token  	= $this->security->get_csrf_hash();
		$where			= array("course_order_number" => $input["ordered_number"]);
		$dataCount		= $this->CrudModel->cw("feducation_courses", $where);

		$result 		= array ('data'			=> $dataCount,
								'csrf_token' 	=> $csrf_token);

		echo json_encode($result);
		die();
	}

	public function postEbook(){
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'ebook_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		= "./assets/admin/upload/ebook";
		$config['allowed_types']	= 'pdf';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$result = array(
					'status' 		=> 'failed',
					'data' 			=> $this->upload->display_errors(),
					'csrf_token' 	=> $csrf_token
				);
			} else {

				$dataUploaded = $this->upload->data();
				$result = array(
					'status' 		=> 'success',
					'data' 			=> $dataUploaded['file_name'],
					'csrf_token' 	=> $csrf_token
				);
			}
			echo json_encode($result);
		}

		die();
	}

	public function resendRegistrationEmail(){

		$input	= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$registrarId	= $input["registrarId"];

		$dataRegistrar		= current($this->CrudModel->gw("feducation_course_registration", array("id"=>$registrarId)));

		if (strpos($dataRegistrar->course_headline, "Mini") !== false){
			$courseCategory	= "Mini Course";
			$price			= 25000;
		} else {
			$courseCategory	= "Intensive Course";
			$price			= 1500000;
		}

		$paymentLastCode	= $dataRegistrar->unique_code;
		$totalPayment		= $price + $paymentLastCode;
		$getMemberRefCode	= $dataRegistrar->referal_code ?: generateReferralCode($registrarId);

		$dataSendEmail	= array('memberFullName'	=> $dataRegistrar->member_full_name,
								'memberEmail'		=> $dataRegistrar->member_email,
								'courseHeadline'	=> $dataRegistrar->course_headline,
								'courseCategory'	=> $courseCategory,
								'coursePrice'		=> $price,
								'uniqueCode'		=> $paymentLastCode,
								'totalPayment'		=> $totalPayment,
								'emailType'			=> EmailType::REGISTERED_COURSED,
								'emailSubject'		=> SubjectEmailType::COURSE_NEW_REGISTRATION);

		$emailService = sendEmail($dataSendEmail);

		switch ($emailService['isDelivered']){
			case TRUE:
				$dataRegisterUpdate	= array('is_email_regist_sent'=> 1,
											'referal_code'	=> $getMemberRefCode);
				$whereId			= array('id' => $registrarId);
				$this->CrudModel->u('feducation_course_registration', $dataRegisterUpdate, $whereId);

				$result = array ('status' 		=> 'success',
								'csrf_token' 	=> $csrf_token);

				break;
			case FALSE:
				$result = array ('status' 		=> 'failed',
								'errors' 		=> $emailService['errorMessage'],
								'csrf_token' 	=> $csrf_token);

				break;
		}

		echo json_encode($result);

		die();
	}

	public function sendAcceptanceEmail(){

		$input	= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$registrarId	= $input["registrarId"];

		$dataRegistrar		= current($this->CrudModel->gw("feducation_course_registration", array("id"=>$registrarId)));

		if (strpos($dataRegistrar->course_headline, "Digital") !== false){
			$courseType		= "Digital Marketing";
			$price			= 25000;
			$courseChannel	= "https://t.me/+jrbsEtQBtm42MzU1";
		} else {
			$courseType		= "Web Programming";
			$price			= 1500000;
			$courseChannel	= "https://t.me/+tnZj0mjcGt04Mjhl";
		}

		$dataSendEmail	= array('memberFullName'	=> $dataRegistrar->member_full_name,
								'memberEmail'		=> $dataRegistrar->member_email,
								'courseHeadline'	=> $dataRegistrar->course_headline,
								'courseType'		=> $courseType,
								'courseChannel'		=> $courseChannel,
								'referalCode'		=> $dataRegistrar->referal_code,
								'emailType'			=> EmailType::REGISTERED_COURSED_COMPLETED,
								'emailSubject'		=> SubjectEmailType::COURSE_PAYMENT_CONFIRMATION);

		$emailService = sendEmail($dataSendEmail);

		switch ($emailService['isDelivered']){
			case TRUE:
				$dataRegisterUpdate	= array('is_email_acceptance_sent'	=> 1,
											"updated_at"				=> date('Y-m-d H:i:s'),
											"updated_by"				=> $this->session->userdata('user_id'));
				$whereId			= array('id' => $registrarId);
				$this->CrudModel->u('feducation_course_registration', $dataRegisterUpdate, $whereId);

				$result = array ('status' 		=> 'success',
								'csrf_token' 	=> $csrf_token);

				break;
			case FALSE:
				$result = array ('status' 		=> 'failed',
								'errors' 		=> $this->upload->display_errors(),
								'csrf_token' 	=> $csrf_token);

				break;
		}

		echo json_encode($result);

		die();
	}

	public function postCoursePaymentReceipt(){
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'paymentReceipt_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/receipts";
		$config['allowed_types']	='jpg|jpeg|png';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	public function resendLmsRegistrationEmail(){

		$input	= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$registrarId	= $input["registrarId"];

		$dataRegistrar		= current($this->CrudModel->gw("member", array("id"=>$registrarId)));

		$dataSendEmail	= array('memberFullName'	=> $dataRegistrar->member_full_name,
								'memberEmail'		=> $dataRegistrar->member_email,
								'memberPhoneNumber'	=> $dataRegistrar->member_phone_number,
								'coursePrice'		=> $dataRegistrar->course_price,
								'uniqueCode'		=> $dataRegistrar->unique_code,
								'totalPayment'		=> $dataRegistrar->course_total_price,
								'emailType'			=> EmailType::REGISTERED_NEW_LMS_ACCOUNT,
								'emailSubject'		=> SubjectEmailType::REGISTERED_NEW_LMS_ACCOUNT);

		$emailService = sendEmail($dataSendEmail);

		switch ($emailService['isDelivered']){
			case TRUE:
				$dataRegisterUpdate	= array('member_is_email_regist_sent'	=> 1,
											'member_is_registered'			=> 1);
				$whereId			= array('id' => $registrarId);
				$this->CrudModel->u('member', $dataRegisterUpdate, $whereId);

				$result = array ('status' 		=> 'success',
								'csrf_token' 	=> $csrf_token);

				break;
			case FALSE:
				$result = array ('status' 		=> 'failed',
								'errors' 		=> $emailService['errorMessage'],
								'csrf_token' 	=> $csrf_token);

				break;
		}

		echo json_encode($result);

		die();
	}

	public function sendLmsAcceptanceEmail(){

		$input	= $this->input->post(NULL, TRUE);
		$csrf_token  	= $this->security->get_csrf_hash();
		$registrarId	= $input["registrarId"];

		$dataRegistrar				= current($this->CrudModel->gw("member", array("id"=>$registrarId)));
		
		$generatePassword			= generateAutomaticPassword();
		$generateTransactionCode	= generateAutomaticPassword();
		$setMemberPassword			= password_hash($generatePassword, PASSWORD_BCRYPT);
		$setMemberTransactionCode	= password_hash($generateTransactionCode, PASSWORD_BCRYPT);

		$dataSendEmail	= array('memberFullName'	=> $dataRegistrar->member_full_name,
								'memberEmail'		=> $dataRegistrar->member_email,
								'memberPassword'	=> $generatePassword,
								'referalCode'		=> $dataRegistrar->member_referal_code,
								'emailType'			=> EmailType::REGISTERED_LMS_ACCOUNT_COMPLETED,
								'emailSubject'		=> SubjectEmailType::REGISTERED_LMS_ACCOUNT_COMPLETED);

		$emailService = sendEmail($dataSendEmail);

		switch ($emailService['isDelivered']){
			case TRUE:
				$dataRegisterUpdate	= array('member_is_verified'		=> 1,
											"member_is_activated"		=> 1,
											"member_password"			=> $setMemberPassword,
											"member_transaction_code"	=> $setMemberTransactionCode,
											"updated_at"				=> date('Y-m-d H:i:s'),
											"updated_by"				=> $this->session->userdata('user_id'));
				$whereId			= array('id' => $registrarId);
				$this->CrudModel->u('member', $dataRegisterUpdate, $whereId);

				$result = array ('status' 		=> 'success',
								'csrf_token' 	=> $csrf_token);

				break;
			case FALSE:
				$result = array ('status' 		=> 'failed',
								'errors' 		=> $emailService['isDelivered'],
								'csrf_token' 	=> $csrf_token);

				break;
		}

		echo json_encode($result);

		die();
	}

	public function postLmsPaymentReceipt(){
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'LmsPaymentReceipt_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/receipts";
		$config['allowed_types']	='jpg|jpeg|png';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	/** 
	 * 
	 * 
	 *  ADMIN AJAX INTERN
	 * 
	 * 
	 * **/

	public function postInternImage(){
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'internImage_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/interns";
		$config['allowed_types']	='jpg|jpeg|png';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	/** 
	 * 
	 * 
	 *  ADMIN AJAX MITRA
	 * 
	 * 
	 * **/

	public function postMitraLogo(){
		$file 			= $_FILES['file']['name'];
		$fileName 		= $file;
		$fileExt 		= explode('.', $fileName);
		$fileActualExt 	= strtolower(end($fileExt));
		$fileNameNew 	= 'mitraLogo_' . uniqid('', false) . "." . $fileActualExt;

		$config['upload_path']		="./assets/resources/images/mitras";
		$config['allowed_types']	='jpg|jpeg|png';
		$config['file_name']		= $fileNameNew;
		$csrf_token  				= $this->security->get_csrf_hash();

		if (isset($file)) {
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

	/** 
	 * 
	 * 
	 *  ADMIN AJAX BENEFITS
	 * 
	 * 
	 * **/

	public function adminBenefitsValidate(){
		$csrf_token  	= $this->security->get_csrf_hash();
		$where			= array("status_is_active" => true);
		$dataCount		= $this->CrudModel->cw("feducation_benefits", $where);

		$result 		= array ('data'			=> $dataCount,
								'csrf_token' 	=> $csrf_token);

		echo json_encode($result);
		die();
	}		

}
