<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$content 	= '_homepageLayouts/gallery/index';
		$data 		= array('title'       => 'Gallery',
							'content'     => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}
}
