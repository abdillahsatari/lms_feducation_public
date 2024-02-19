<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PresensiIntern extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$content 	= '_homepageLayouts/presensiIntern/index';
		$data 		= array('title'       => 'Presensi Intern',
							'content'     => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}

	public function save(){

		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('intern_name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('intern_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('intern_phone', 'No. Hp', 'trim|required');
		$this->form_validation->set_rules('presensi_type', 'tipe', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		}else{
			$data 	= array("intern_name" 			=> $input["intern_name"],
							"intern_email"			=> $input["intern_email"],
							"intern_phone" 			=> $input["intern_phone"],
							"intern_institution"	=> $input["intern_institution"],
							"presensi_type"			=> $input["presensi_type"],
							"ip_address"			=> $this->getIpAddress(),
							"created_at"			=> date('Y-m-d H:i:s'));

			$this->CrudModel->i("intern_presensi", $data);

			$presensiType = $input["presensi_type"] == "clock_in" ? "clock-in" : "clock-out";
			$dataRedirect = "presensi/".$presensiType;
			redirect($dataRedirect);
		}
	}

	public function saveFeedback($type = NULL){
		$content 	= '_homepageLayouts/presensiIntern/result';
		$data 		= array('title'     => 'Presensi Submitted',
							'dataType' 	=> $type,
							'content'   => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}

	private function getIpAddress(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) //ip from client network
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) // ip from proxy
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return $ip;
	}
}
