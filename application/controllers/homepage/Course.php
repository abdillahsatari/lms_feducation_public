<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$content 	= '_homepageLayouts/course/index';
		$data 		= array('title'       => 'Course',
							'content'     => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}

	public function register($cat){
		switch ($cat){
			case "digital-marketing":
				$dataCourse = array("courseCategory"	=> "Intensive Course",
									"courseHeadline" 	=> "Digital Marketing");
				break;
			case "multimedia":
				$dataCourse = array("courseCategory"	=> "Intensive Course",
									"courseHeadline" 	=> "Multimedia");
				break;
			case "web-programming":
				$dataCourse = array("courseCategory"	=> "Intensive Course",
									"courseHeadline" 	=> "Web Programming");
				break;
			case "trading-research":
				$dataCourse = array("courseCategory"	=> "Intensive Course",
									"courseHeadline" 	=> "Trading Research");
				break;
			case "mini-course-web-programming":
				$dataCourse = array("courseCategory"	=> "Mini Course",
									"courseHeadline" 	=> "Mini Course Web Programming");
				break;
			case "mini-course-digital-marketing":
				$dataCourse = array("courseCategory"	=> "Mini Course",
									"courseHeadline" 	=> "Mini Course Digital Marketing");
				break;
			case "learning-management-system":
				$dataCourse = array("courseCategory"	=> "lms",
									"courseHeadline" 	=> "E-Course / LMS");
				break;
		}
		$content 	= '_homepageLayouts/course/register';
		$data 		= array('title'       	=> 'Course',
							'dataCourse'	=> $dataCourse,
							"csrfName" 		=> $this->security->get_csrf_token_name(),
							"csrfToken"		=> $this->security->get_csrf_hash(),
							'content'     	=> $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}

	public function save(){

		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('member_full_name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('member_phone_number', 'No. Hp', 'trim|required');
		$this->form_validation->set_rules('member_email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false){
			$this->register($input["courseCategory"]);
		}else{

			$uplineId	= "";

			if (!empty($input['referal_code'])){
				$referralCode	= array('referal_code' => $input['referal_code']);
				$referralOwner 	= $this->CrudModel->gw('feducation_course_registration', $referralCode);
				$uplineId		= $referralOwner[0]->id;
			}

			//price
			$price = $input["courseCategory"] == "Mini Course" ? 25000 : 1500000;
			$getPaymentLastCode	= generatePaymentLastCode();
			$totalPayment		= $price + $getPaymentLastCode;
			$registeredAt		= date('Y-m-d H:i:s');

			$data 	= array("member_email" 			=> $input["member_email"],
							"member_full_name"		=> $input["member_full_name"],
							"member_phone_number" 	=> $input["member_phone_number"],
							"course_headline"		=> $input["courseHeadline"],
							"course_price"			=> $price,
							"unique_code"			=> $getPaymentLastCode,
							"course_total_price"	=> $totalPayment,
							"parent_id"				=> $uplineId ?: NULL,
							"member_status"			=> MemberCourseStatus::REGISTERED,
							"created_at"			=> $registeredAt);

			$memberId			= $this->CrudModel->i2('feducation_course_registration', $data);
			$getMemberRefCode	= generateReferralCode($memberId);

			$dataSendEmail	= array('memberFullName'	=> $input['member_full_name'],
									'memberEmail'		=> $input['member_email'],
									'courseHeadline'	=> $input['courseHeadline'],
									'courseCategory'	=> $input['courseCategory'],
									'coursePrice'		=> $price,
									'uniqueCode'		=> $getPaymentLastCode,
									'totalPayment'		=> $totalPayment,
									'emailType'			=> EmailType::REGISTERED_COURSED,
									'emailSubject'		=> SubjectEmailType::COURSE_NEW_REGISTRATION);

			$emailService = sendEmail($dataSendEmail);

			switch ($emailService['isDelivered']){
				case TRUE:
					$dataRegisterUpdate	= array('is_email_regist_sent'=> 1,
												'referal_code'	=> $getMemberRefCode);
					$whereId			= array('id' => $memberId);
					$this->CrudModel->u('feducation_course_registration', $dataRegisterUpdate, $whereId);
					$this->registerFeedback("Success");
					break;
				case FALSE:
					$whereId	= array('id'	=> $memberId);
					$this->CrudModel->d('feducation_course_registration', $whereId);
					$this->registerFeedback("Failed");
					break;
			};
		}
	}

	public function registerFeedback($status){
		$content 	= '_homepageLayouts/course/registerFeedback';
		$data 		= array('title'     		=> 'Register Success',
							'content'   		=> $content,
							'register_status'	=> $status);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}
}
