<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFeaturedArticle extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {
		$content    	= '_adminLayouts/adminFeaturedArticle/index';
		$dataArticle	= $this->CrudModel->gwo("feducation_article", 'article_order_number IS NOT NULL', 'article_order_number ASC');
		$data       	= array('session'    	=> SessionType::ADMIN,
								'dataArticle'	=> $dataArticle,
								'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function create() {
		$content    = '_adminLayouts/adminFeaturedArticle/create';
		$where		= array("article_order_number" => null);
		$dataArticle= $this->CrudModel->gwo('feducation_article', $where ,'created_at DESC');
		$data       = array('session'    	=> SessionType::ADMIN,
							"csrfName" 		=> $this->security->get_csrf_token_name(),
							"csrfToken"		=> $this->security->get_csrf_hash(),
							'articleList'	=> $dataArticle,
							'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save() {
		$input	= $this->input->post(NULL, TRUE);
		$data	= array("article_order_number"	=> $input["article_order_number"]);

		$where	= array("id" => $input["article_id"]);
		$this->CrudModel->u("feducation_article", $data, $where);
		redirect('admin/featuredArticle');
	}

	public function edit($id) {
		$content    = '_adminLayouts/adminFeaturedArticle/edit';
		$where		= array("id" => $id);
		$dataArticle= $this->CrudModel->gw('feducation_article', $where);
		$data       = array('session'    	=> SessionType::ADMIN,
							"csrfName" 		=> $this->security->get_csrf_token_name(),
							"csrfToken"		=> $this->security->get_csrf_hash(),
							'articleList'	=> current($dataArticle),
							'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);

	}

	public function update() {
		$input	= $this->input->post(NULL, TRUE);
		$data	= array("article_order_number"	=> $input["article_order_number"]);

		$where	= array("id" => $input["article_id"]);
		$this->CrudModel->u("feducation_article", $data, $where);
		redirect('admin/featuredArticle');
	}

	public function delete($id) {
		$data	= array("article_order_number"	=> null);

		$where	= array("id" => $id);
		$this->CrudModel->u("feducation_article", $data, $where);
		redirect('admin/featuredArticle');
	}

}
