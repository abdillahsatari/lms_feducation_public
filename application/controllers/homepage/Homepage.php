<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function index() {
		$perpage 	= 4;
		$page 		= $this->uri->segment(2) ?: 0;
		$articles 	= $this->CrudModel->glo("feducation_article", $perpage, $page, 'created_at DESC');
		$mitra 		= $this->CrudModel->gwo("feducation_mitra", array("mitra_status" => TRUE), 'created_at DESC');

		$content 	= '_homepageLayouts/homepage/index';
		$data 		= array('title'      	=> 'Homepage',
							'appHome'		=> true,
							'content'    	=> $content,
							'dataNews'		=> $articles,
							'dataMitra'		=> $mitra
		);

        $this->load->view('_homepageLayouts/wrapper', $data);
    }

	public function emailSubmit(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'No. Hp', 'trim|required');

		if ($this->form_validation->run() == false){
			$this->index();
		}else{
			$data 	= array("visitors_name" 	=> $input["name"],
							"visitors_email"	=> $input["email"],
							"visitors_phone" 	=> $input["phone"],
							"status"			=> FastResponseStatus::INCOMING,
							"created_at"		=> date('Y-m-d H:i:s'));

			$this->CrudModel->i("fast_response", $data);
			$this->emailSubmitted();
		}
	}

	public function emailSubmitted(){
		$content 	= '_homepageLayouts/appFeedBacks/fastResponseFeedback';
		$data 		= array('title'       => 'Email Submitted',
							'content'     => $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}
}
