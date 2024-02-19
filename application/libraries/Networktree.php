<?php

class Networktree {

	function generateMemberTree($memberId, $level = 1){
		$ci 	= &get_instance();
		$result = "";

		$query 		= 'SELECT * FROM member WHERE member_parent_id = "'.$memberId.'" ORDER BY created_at ASC ';
		$getChild	= $ci->CrudModel->q($query);

		foreach ($getChild as $child) {
			$memberId		= array("id" => $child->id);
			$member			= $ci->CrudModel->gw("member", $memberId);
			$memberCollect	= current($member);

			$result .= '
				<div>
					' . getSpace($level) . ' | <br>
					' . getSpace($level) . ' |__
					<code>' . ($memberCollect->member_full_name) . '</code>
				</div>
			';

			$result .= $this->generateMemberTree($child->id, $level + 1);
		}

		return $result;
	}

	function initializeParentLevel($memberId, $number_of_levels){
		$ci = &get_instance();

		$parents = [];
		$currentMember = "";

		for ($i = 1; $i <= $number_of_levels; $i++) {
			$iterateId		= $currentMember ?: $memberId;
			$query 			= 'SELECT member_parent_id FROM member WHERE id = "'.$iterateId.'"';
			$newParentId	= $ci->CrudModel->q($query);
			$collectNewParentId	= current($newParentId)->member_parent_id;

			if ($collectNewParentId != NULL) {
				$currentMember = $collectNewParentId;
				$parents[$i] = $newParentId;
			} else {
				$parents[$i] = NULL;}
		}

		return $parents;
	}

	function validateMemberActiveStatus($memberId){

		$ci = &get_instance();

		$dataMember			= $ci->CrudModel->gw("member", array("id" => $memberId));
		$collectMember		= current($dataMember);
		$isMemberActivated	= $collectMember->member_is_activated;

		$isMemberActivated != NULL ? $memberStatus = TRUE : $memberStatus = FALSE;

		return $memberStatus;
	}


	/**
	 *
	 *	This Code Should be removed later
	 *  The Logic already moved to models -> FinanceModel.php
	**/
	function commission($id = NULL){

		$ci = &get_instance();
		$result = array();

		if ($id) {
			$queryCommission		= 'SELECT MC.id as MC_id, MC.commission_ammount, MC.created_at as commission_created_at,
       											ME.member_full_name as member_get_commission_name, FC.course_category
										FROM member_commission MC
										JOIN member ME ON MC.commission_member_id = ME.id
										JOIN feducation_course FC ON MC.commission_course_id = FC.id
										WHERE MC.commission_member_id = "'.$id.'"
										ORDER BY MC.created_at DESC';

		} else {
			$queryCommission		= 'SELECT MC.id as MC_id, MC.commission_ammount, MC.created_at as commission_created_at,
       											ME.member_full_name as member_get_commission_name, FC.course_category
										FROM member_commission MC
										JOIN member ME ON MC.commission_member_id = ME.id
										JOIN feducation_course FC ON MC.commission_course_id = FC.id
										ORDER BY MC.created_at DESC';
		}

		$getDataCommission	= $ci->CrudModel->q($queryCommission);

		foreach($getDataCommission as $data){

			$queryDataDescription	= 'SELECT ME.member_full_name FROM member_commission MC
										JOIN member ME ON MC.commission_member_child_id = ME.id
										WHERE MC.id = "'.$data->MC_id.'"';
			$getDataDescription		= $ci->CrudModel->q($queryDataDescription);
			$commission_came_from	= current($getDataDescription)->member_full_name;

			$dataCommissionLists = new stdClass();
			$dataCommissionLists->member_get_commission_name 	= $data->member_get_commission_name;
			$dataCommissionLists->commission_ammount				= $data->commission_ammount;
			$dataCommissionLists->commission_created_at					= $data->commission_created_at;
			$dataCommissionLists->commission_course_category				= $data->course_category;
			$dataCommissionLists->commission_came_from			= $commission_came_from;

			array_push($result, $dataCommissionLists);
		}

		return $result;
	}

	function royalty($id = NULL){

		$ci = &get_instance();
		$result = array();

		if ($id) {
			$queryRoyalty		= 'SELECT MR.id as MR_id, MR.royalty_ammount, MR.created_at as royalty_created_at,
											ME.member_full_name as member_get_royalty_name, FC.course_category
									FROM member_royalty MR
									JOIN member ME ON MR.royalty_member_id = ME.id
									JOIN feducation_course FC ON MR.royalty_course_id = FC.id
									WHERE MR.royalty_member_id = "'.$id.'"
									ORDER BY MR.created_at DESC';

		} else {
			$queryRoyalty		= 'SELECT MR.id as MR_id, MR.royalty_ammount, MR.created_at as royalty_created_at,
											ME.member_full_name as member_get_royalty_name, FC.course_category
									FROM member_royalty MR
									JOIN member ME ON MR.royalty_member_id = ME.id
									JOIN feducation_course FC ON MR.royalty_course_id = FC.id
									ORDER BY MR.created_at DESC';
		}

		$getDataRoyalty	= $ci->CrudModel->q($queryRoyalty);

		foreach($getDataRoyalty as $data){

			$queryDataDescription	= 'SELECT ME.member_full_name FROM member_royalty MR
										JOIN member ME ON MR.royalty_child_id = ME.id
										WHERE MR.id = "'.$data->MR_id.'"';
			$getDataDescription		= $ci->CrudModel->q($queryDataDescription);
			$royalty_came_from		= current($getDataDescription)->member_full_name;

			$dataRoyaltyLists = new stdClass();
			$dataRoyaltyLists->member_get_royalty_name 		= $data->member_get_royalty_name;
			$dataRoyaltyLists->royalty_ammount				= $data->royalty_ammount;
			$dataRoyaltyLists->royalty_created_at			= $data->royalty_created_at;
			$dataRoyaltyLists->royalty_course_category		= $data->course_category;
			$dataRoyaltyLists->royalty_came_from			= $royalty_came_from;

			array_push($result, $dataRoyaltyLists);
		}

		return $result;
	}

	function withdrawal($id = NULL){

		$ci = &get_instance();
		$result = array();

		if ($id) {
			$queryWithdarwal		= 'SELECT MW.*, ME.member_full_name as member_request_wd, ME.member_email, ME.member_phone_number,
       										MBA.nama_bank, MBA.nomor_rekening, MBA.pemilik_rekening
									FROM member_withdrawal MW
									JOIN member ME ON MW.wd_member_id = ME.id
									JOIN member_bank_account MBA ON MW.wd_member_bank_id = MBA.id
									WHERE MW.wd_member_id = "'.$id.'"
									ORDER BY MW.created_at DESC';

		} else {
			$queryWithdarwal		= 'SELECT MW.*, ME.member_full_name as member_request_wd, ME.member_email, ME.member_phone_number, 
       									MBA.nama_bank, MBA.nomor_rekening, MBA.pemilik_rekening
									FROM member_withdrawal MW
									JOIN member ME ON MW.wd_member_id = ME.id
									JOIN member_bank_account MBA ON MW.wd_member_bank_id = MBA.id
									ORDER BY MW.created_at DESC';
		}

		$getDataWithdarwal		= $ci->CrudModel->q($queryWithdarwal);

		foreach($getDataWithdarwal as $data){

			$dataWithdrawaklLists = new stdClass();
			$dataWithdrawaklLists->withdrawal_id 					= $data->id;
			$dataWithdrawaklLists->member_request_wd 				= $data->member_request_wd;
			$dataWithdrawaklLists->withdrawal_member_email 			= $data->member_email;
			$dataWithdrawaklLists->withdrawal_member_phone_number	= $data->member_phone_number;
			$dataWithdrawaklLists->withdrawal_requested_ammount		= $data->wd_amount_input;
			$dataWithdrawaklLists->withdrawal_bank_name				= $data->nama_bank;
			$dataWithdrawaklLists->withdrawal_bank_number			= $data->nomor_rekening;
			$dataWithdrawaklLists->withdrawal_bank_customer			= $data->pemilik_rekening;
			$dataWithdrawaklLists->withdrawal_status				= $data->wd_status;
			$dataWithdrawaklLists->withdrawal_created_at			= $data->created_at;

			array_push($result, $dataWithdrawaklLists);
		}

		return $result;
	}

	function benefits($id){

		$ci = &get_instance();
		$result = array();

		$queryCommission= 'SELECT *, sum(member_commission.commission_ammount) total_commission 
							FROM member_commission 
							WHERE commission_member_id = "'.$id.'"';
		$queryRoyalty	= 'SELECT *, sum(member_royalty.royalty_ammount) total_royalty 
							FROM member_royalty 
							WHERE royalty_member_id = "'.$id.'"';
		$queryCommission= 'SELECT *, sum(member_commission.commission_ammount) total_commission 
							FROM member_commission 
							WHERE commission_member_id = "'.$id.'"';
		$querywithdrawal= 'SELECT *, sum(member_withdrawal.wd_amount_input) total_withdrawal 
							FROM member_withdrawal 
							WHERE wd_status = "'.MemberWdStatus::WD_FINISHED.'"
							AND wd_member_id = "'.$id.'"';

		$commission	= $ci->CrudModel->q($queryCommission);
		$royalty	= $ci->CrudModel->q($queryRoyalty);
		$withdrawal	= $ci->CrudModel->q($querywithdrawal);

		$countCommission	= current($commission)->total_commission ?: 0;
		$countRoyalty		= current($royalty)->total_royalty ?: 0;
		$countWithdrawal	= current($withdrawal)->total_withdrawal ?: 0;
		$countBalance 		= $countCommission + $countRoyalty - $countWithdrawal;

		$dataBenefits = new stdClass();
		$dataBenefits->countCommission 	= $countCommission;
		$dataBenefits->countRoyalty		= $countRoyalty;
		$dataBenefits->countBalance		= $countBalance;

		array_push($result, $dataBenefits);

		return $result;
	}
}
