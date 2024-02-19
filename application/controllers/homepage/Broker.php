<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broker extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$content 	= '_homepageLayouts/broker/index';
		$data 		= array('title'       => 'Broker List',
							'content'     => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}
}
