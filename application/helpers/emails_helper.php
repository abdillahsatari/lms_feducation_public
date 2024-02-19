<?php
defined('BASEPATH') or exit('No direct script access allowed');


function sendEmail($params){

	$ci = &get_instance();

	switch ($params['emailType']) {
		case EmailType::NEW_MEMBER_REGISTRATION:
			$dataMsg['user']	= array('memberFullName'	=> $params['memberFullName'],
										'memberEmail'		=> $params['memberEmail'],
										'memberPassword'	=> $params['memberPassword'],
										'memberToken'		=> $params['memberToken']);

			$emailBody 			= $ci->load->view('_emailTemplate/email_member_verification', $dataMsg, true);
			break;
		case EmailType::FORGOT_PASSWORD:
			$dataMsg['user']	= array('emailHeadline'		=> $params['emailSubject'],
										'memberFullName'	=> $params['memberFullName'],
										'memberEmail'		=> $params['memberEmail'],
										'memberPassword'	=> $params['memberPassword'],
										'memberToken'		=> $params['memberToken']);

			$emailBody 			= $ci->load->view('_emailTemplate/email_member_forgot_password', $dataMsg, true);
			break;
		case EmailType::MEMBER_COURSE:
			$dataMsg['user']	= array('memberFullName'	=> $params['memberFullName'],
										'courseHeadline'	=> $params['courseHeadline'],
										'courseCategory'	=> $params['courseCategory'],
										'coursePrice'		=> $params['coursePrice'],
										'paymentGateway'	=> $params['paymentGateway'],
										'nomorRekening'		=> $params['nomorRekening'],
										'pemilikAkunBank'	=> $params['pemilikAkunBank']);

			$emailBody 			= $ci->load->view('_emailTemplate/email_member_invoice', $dataMsg, true);
			break;
		case EmailType::REGISTERED_COURSED:
			$dataMsg['user']	= array('memberFullName'	=> $params['memberFullName'],
										'memberEmail'		=> $params['memberEmail'],
										'courseHeadline'	=> $params['courseHeadline'],
										'courseCategory'	=> $params['courseCategory'],
										'coursePrice'		=> $params['coursePrice'],
										'uniqueCode'		=> $params['uniqueCode'],
										'totalPayment'		=> $params['totalPayment']);

			$emailBody 			= $ci->load->view('_emailTemplate/email_register_course', $dataMsg, true);
			break;
		case EmailType::REGISTERED_COURSED_COMPLETED:
			$dataMsg['user']	= array('memberFullName'	=> $params['memberFullName'],
										'memberEmail'		=> $params['memberEmail'],
										'courseHeadline'	=> $params['courseHeadline'],
										'courseType'		=> $params['courseType'],
										'courseChannel'		=> $params['courseChannel'],
										'referalCode'		=> $params['referalCode']);

			$emailBody 			= $ci->load->view('_emailTemplate/email_register_course_acceptance', $dataMsg, true);
			break;
		case EmailType::REGISTERED_NEW_LMS_ACCOUNT:
			$dataMsg['user']	= array('memberFullName'	=> $params['memberFullName'],
										'memberEmail'		=> $params['memberEmail'],
										'memberPhoneNumber'	=> $params['memberPhoneNumber'],
										'coursePrice'		=> $params['coursePrice'],
										'uniqueCode'		=> $params['uniqueCode'],
										'totalPayment'		=> $params['totalPayment']);

			$emailBody 			= $ci->load->view('_emailTemplate/email_register_lms', $dataMsg, true);
			break;
		case EmailType::REGISTERED_LMS_ACCOUNT_COMPLETED:
			$dataMsg['user']	= array('memberFullName'	=> $params['memberFullName'],
										'memberEmail'		=> $params['memberEmail'],
										'memberPassword'	=> $params['memberPassword'],
										'referalCode'		=> $params['referalCode']);

			$emailBody 			= $ci->load->view('_emailTemplate/email_register_lms_acceptance', $dataMsg, true);
			break;
	};

	$ci->load->library('phpmailer_lib');
	$mail = $ci->phpmailer_lib->load();

	/*=============================*/
	/*

	USE THIS IN DEVELOPEMENT MODE TO PREVENT EMAIL HOSTING LIMITATION

	host: scwp.tfx.co.id
	email:	email_testing@tfx.co.id
	password: D3veL0pErTif1A@eMaiLT3st1nG

	*/
	/*=============================*/
	/*=============================*/
	/*

	USE THIS IN PRODUCTION MODE

	host: srv89.niagahoster.com
	email: noreply@feducation.id
	password: t3BB3t13IH@2022

	*/
	/*=============================*/
	
// 	$mail->Host     = 'srv89.niagahoster.com';
// 	$mail->SMTPAuth 	= true;
// 	$mail->Username 	= 'no-reply@lenteradigitalindonesia.com';
// 	$mail->Password 	= 'L3nteraDigitalIndonesia@2022';
// 	$mail->SMTPSecure 	= 'ssl';
// 	$mail->Port     	= 465; // 465/587

	$mail->isSMTP();
	$mail->Host     	= 'mail.feducation.id';
	$mail->SMTPAuth 	= true;
	$mail->Username 	= 'noreply@feducation.id';
	$mail->Password 	= 'n0r3ply@feducation@12345';
	$mail->SMTPSecure 	= 'ssl';
	$mail->Port     	= 465; // 465/587
	
	
	$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,
											  'verify_peer_name' => false,
											  'allow_self_signed' => true));

	$mail->setFrom('noreply@feducation.id', 'Feducation ID');
	$mail->addReplyTo('developer@feducation.co.id');
	$mail->addAddress($params['memberEmail']);
	$mail->Subject = $params['emailSubject'];
	$mail->isHTML(TRUE);
	$mail->Body = $emailBody;

	if ($mail->send()) {
		$result = array('isDelivered' 	=> TRUE,
					 	'errorMessage'	=> 'No Error',
					 	'status' 		=> 'Send Email Successfully');
	} else {
		$result = array('isDelivered' 	=> FALSE,
					    'errorMessage'	=> $mail->ErrorInfo,
					 	'status' 		=> 'Failed to Send Email');
	}

	return $result;
};
