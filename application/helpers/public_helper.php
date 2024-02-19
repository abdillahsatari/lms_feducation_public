<?php
defined('BASEPATH') or exit('No direct script access allowed');

function generateReferralCode($id){

	$random1	= substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
	$random2	= substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
	$result		= "FED-".$random1.str_pad($id, 4, "X",STR_PAD_BOTH).$random2;

	return $result;
}

function generateToken(){

	$result	= random_string('alnum', 64);

	return $result;
}

function generateAutomaticPassword(){

	$result	= random_string('alnum', 4);

	return $result;
}

function generatePaymentLastCode() {

	return mt_rand(100,999);

}

function generalToaster($info, $msg, $type){

	$ci = &get_instance();

	switch ($type){
		case ToasterType::SUCCESS:
			$ci->session->set_flashdata('message', '<div class="alert border-0 alert-dismissible fade show py-2">
														<div class="d-flex align-items-center">
															<div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
															</div>
															<div class="ms-3">
																<h6 class="mb-0 text-white">'.$info.'</h6>
																<small class="text-white">'.$msg.'</small>
															</div>
														</div>
														<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>');
			break;
		case ToasterType::FAILED;
			$ci->session->set_flashdata('message', '<div class="alert border-0 alert-dismissible fade show py-2">
														<div class="d-flex align-items-center">
															<div class="font-30 text-white"><i class="bx bxs-message-square-x"></i>
															</div>
															<div class="ms-3">
																<h6 class="mb-0 text-white">'.$info.'</h6>
																<small class="text-white">'.$msg.'</small>
															</div>
														</div>
														<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>');
			break;
		case ToasterType::INFO:
			$ci->session->set_flashdata('message', '<div class="alert border-0 alert-dismissible fade show py-2">
														<div class="d-flex align-items-center">
															<div class="font-25 text-white"><i class="bx bx-info-circle"></i>
															</div>
															<div class="ms-3">
																<h6 class="mb-0 text-white">'.$info.'</h6>
																<small class="text-white">'.$msg.'</small>
															</div>
														</div>
														<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>');
			break;
	}
}

function generalNotification($info, $msg, $type){
	/* This Features
	 * Undone!!
	 * */
	$ci = &get_instance();

	switch ($type){
		case NotificationType::SUCCESS:
			$ci->session->set_flashdata('notification', '<div class="card">
															<div class="card-body">
																<div class="row row-cols-auto g-3">
																	<div class="col">
																		<button type="button" class="btn btn-dark px-5 js-notifications" id="clickMe" onclick="lobiboxNotifications('.$info.', '.$msg.', '.NotificationType::SUCCESS.')" hidden>Default</button>
																	</div>
																</div>
															</div>
														</div>');
			break;
		case NotificationType::FAILED:
			$ci->session->set_flashdata('notification', '<span class="js-notifications" data-info="'.$info.'" data-msg="'.$msg.'" data-type="'.NotificationType::FAILED.'" hidden></span>');
			break;
		case NotificationType::INFO:
			$ci->session->set_flashdata('notification', '<span class="js-notifications" data-info="'.$info.'" data-msg="'.$msg.'" data-type="'.NotificationType::INFO.'" hidden></span>');
			break;
	}

}

function getSpace($params) {
	$space = '';
	for ($i = 1; $i <= $params; $i++) {
		$space .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	}
	return $space;
}
