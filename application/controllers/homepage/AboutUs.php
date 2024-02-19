<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$content 	= '_homepageLayouts/aboutUs/index';
		$data 		= array('title'       => 'About Us',
							'content'     => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}
}
