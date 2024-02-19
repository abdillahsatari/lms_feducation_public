<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$content 	= '_homepageLayouts/contactUs/index';
		$data 		= array('title'       => 'Contact Us',
							'content'     => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}
}
