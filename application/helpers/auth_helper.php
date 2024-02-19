<?php
defined('BASEPATH') or exit('No direct script access allowed');


function authenticate($email, $password, $suffix){

	$ci = &get_instance();

	if ($suffix == CredentialType::ADMIN){
		$where	= array(''.$suffix.'_email' => $email);
	} else {
		$where	= array(''.$suffix.'_email' => $email,
						''.$suffix.'_is_verified' => true);
	}

	$dataUser = $ci->CrudModel->gw($suffix, $where);

	if (count($dataUser)>0) {

		$dataCollected		= current($dataUser);
		$recordedEmail		= "$suffix"."_email";
		$recordedImage		= "$suffix"."_image";
		$recordedFullName	= "$suffix"."_full_name";
		$recordedPassword 	= "$suffix"."_password";

		$isGrantedPassword 	= $dataCollected->$recordedPassword;

		if (password_verify($password, $isGrantedPassword)) {

			$collectAdminRole = NULL;

			if ($suffix == CredentialType::ADMIN) {
				$queryUserRole		= 'SELECT UR.role_type FROM user U JOIN user_role UR ON U.user_role_id = UR.id WHERE U.id = "'.$dataCollected->id.'"';
				$dataUserRole		= $ci->CrudModel->q($queryUserRole);
				$collectAdminRole	= current($dataUserRole)->role_type;
			}

			$suffix == 'user' ? $sess_kcfinder = 'KCFINDER' : $sess_kcfinder = 'ses_member';

			$dataSession = array("$suffix"."_id" 		=> $dataCollected->id,
								"$suffix"."_email"		=> $dataCollected->$recordedEmail,
								"$suffix"."_image"		=> $dataCollected->$recordedImage,
								"$suffix"."_full_name"	=> $dataCollected->$recordedFullName,
								"$suffix"."_authStatus" => AuthStatus::AUTHORIZED,
								"$sess_kcfinder"		=> array('disabled' => false),
								"$suffix"."_role_type" 	=> $collectAdminRole ?: "Member");

			$result = array('status' 		=> AuthStatus::AUTHORIZED,
							'message'		=> array("info"	=> "Login Berhasil",
							"msg"			=> "Selamat Datang ".$dataSession["$suffix"."_full_name"]."",
							"type"			=> ToasterType::SUCCESS),
							'dataSession'	=> $dataSession);

		} else {
			$result = array('status' 	=> AuthStatus::UNAUTHORIZED,
							'message'	=> array("info"	=> "Login Gagal",
												 "msg"	=> "Mohon Periksa Kembali Password Anda",
												 "type"	=> ToasterType::FAILED));
		}
	} else {
		$result = array('status' 	=> AuthStatus::UNAUTHORIZED,
						'message'	=> array("info"	=> "Login Gagal",
											 "msg"	=> "Mohon Periksa Kembali Email Anda",
											 "type"	=> ToasterType::FAILED));
	}

	return $result;
}
