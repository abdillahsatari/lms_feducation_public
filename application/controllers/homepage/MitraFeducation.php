<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MitraFeducation extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$content 	= '_homepageLayouts/mitraFeducation/index';
		$mitra 		= $this->CrudModel->gwo("feducation_mitra", array("mitra_status" => TRUE), 'created_at DESC');
		$data 		= array('title'       => 'Mitra Feducation',
							'dataMitra'		=> $mitra,
							'content'     => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}
}
