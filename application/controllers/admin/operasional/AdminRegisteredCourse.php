<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminRegisteredCourse extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED ) {
			redirect('admin/login');
		}
	}
	public function index(){

		$content    = '_adminLayouts/adminRegisteredCourse/index';
		$query 		= 'SELECT FMC.*, ME.member_full_name, ME.member_email, FC.course_headline, FC.course_category 
						FROM feducation_member_course FMC
						JOIN member ME ON FMC.member_id = ME.id
						JOIN feducation_course FC ON FMC.course_id = FC.id';

		$dataRegisteredCourse = $this->CrudModel->q($query);

		$data       = array('session'   			=> SessionType::ADMIN,
							'dataRegisteredCourse'	=> $dataRegisteredCourse,
							'content'   			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function edit($id = NULL){

		$content	= '_adminLayouts/adminRegisteredCourse/edit';

		$query		= 'SELECT FMC.id as FMC_id, FMC.member_course_purchase, FMC.member_course_status, FBA.*, FC.id as FC_id, FC.course_headline, FC.course_description, FC.course_price, FC.course_category, 
       					FC.course_schedule, FC.course_place, ME.member_email, ME.member_full_name, ME.member_phone_number
						FROM feducation_member_course FMC
						JOIN feducation_course FC ON FMC.course_id = FC.id
						JOIN feducation_bank_account FBA ON FMC.feducation_bank_id = FBA.id
						JOIN member ME ON FMC.member_id = ME.id
						WHERE FMC.id = "'.$id.'"';

		$dataRegisteredCourse	= $this->CrudModel->q($query);

		$data       = array('session'   			=> SessionType::ADMIN,
							'csrfName' 				=> $this->security->get_csrf_token_name(),
							'csrfToken'				=> $this->security->get_csrf_hash(),
							'dataRegisteredCourse'	=> $dataRegisteredCourse,
							'content'   			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update() {

		$input 				= $this->input->post(NULL, TRUE);
		$date				= date('Y-m-d H:i:s');
		$userId				= $this->session->userdata("user_id");
		$courseId 			= $input["feducation_course_id"];
		$memberCourseId		= $input["feducation_member_course_id"];
		$memberCourseStatus	= $input["feducation_member_course_status"];

		$dataMemberCourse	= array('user_id'				=> $userId,
									'member_course_status' 	=> $memberCourseStatus,
									'updated_at'			=> $date);
		$whereMemberCourse	= array('id'					=> $memberCourseId);

		$this->CrudModel->u("feducation_member_course", $dataMemberCourse, $whereMemberCourse);

		$queryFMC 			= 'SELECT FMC.*, FC.course_price, ME.member_parent_id 
								FROM feducation_member_course FMC
								JOIN feducation_course FC ON FMC.course_id = FC.id
								JOIN member ME ON FMC.member_id = ME.id
								WHERE FMC.id = "'.$memberCourseId.'"';

		$dataFMC					= $this->CrudModel->q($queryFMC);
		$collectFMC					= current($dataFMC);
		$collectFMCPrice			= $collectFMC->course_price;
		$collectFMCMemberId			= $collectFMC->member_id;
		$collectFMCMemberParentId	= $collectFMC->member_parent_id;

		if ($memberCourseStatus == MemberCourseStatus::APPROVED) {
			$whereStatusActive 	= array("status_is_active" => true);
			$getBenefits		= $this->CrudModel->gw("feducation_benefits", $whereStatusActive);

			if (count($getBenefits) > 0){
				$commissionPercentage 	= current($getBenefits)->commission_percentage;
				$royaltyPercentage		= current($getBenefits)->royalty_percentage;
			} else {
				$commissionPercentage 	= 30;
				$royaltyPercentage		= 5;
			}

			if ($collectFMCMemberParentId) {

				$isParentActivated	= $this->networktree->validateMemberActiveStatus($collectFMCMemberParentId);

				if ($isParentActivated) {
					$memberGetCommission 	= $collectFMCMemberParentId;
					$commissionCameFrom		= $collectFMCMemberId;
					$commissionAmmount 		= $collectFMCPrice * ($commissionPercentage / 100);

					$dataCommission 		= array("commission_member_id" 			=> $memberGetCommission,
													"commission_member_child_id" 	=> $commissionCameFrom,
													"commission_ammount" 			=> $commissionAmmount,
													"commission_course_id"			=> $courseId,
													"commission_date" 				=> $date,
													"created_at" 					=> $date);

					$this->CrudModel->i("member_commission", $dataCommission);
				}

				$memberGetRoyalty = $this->networktree->initializeParentLevel($collectFMCMemberParentId, 4);

				foreach ($memberGetRoyalty as $level => $parentId) {

					if ($parentId != NULL) {

						$collectMemberGetRoyaltyId	= current($parentId)->member_parent_id;
						$isMemberRoyaltyActivated	= $this->networktree->validateMemberActiveStatus($collectMemberGetRoyaltyId);

						if ($isMemberRoyaltyActivated) {

							$royaltyCameFrom= $collectFMCMemberId;
							$royaltyAmmount	= $collectFMCPrice * ($royaltyPercentage / 100);

							$dataRoyalty = array('royalty_member_id' 	=> $collectMemberGetRoyaltyId,
												'royalty_child_id' 		=> $royaltyCameFrom,
												'royalty_ammount' 		=> $royaltyAmmount,
												'royalty_course_id'		=> $courseId,
												'created_at' 			=> $date);

							$this->CrudModel->i('member_royalty', $dataRoyalty);
						}
					}
				}
			}

			$dataMember		= array("member_is_activated" => TRUE);
			$whereMember	= array("id" => $collectFMCMemberId);
			$this->CrudModel->u("member", $dataMember, $whereMember);
		}


		redirect("admin/Registered/course");
	}
}
