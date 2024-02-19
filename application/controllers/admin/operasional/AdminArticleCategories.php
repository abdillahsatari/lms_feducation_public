<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminArticleCategories extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {

		$content    			= '_adminLayouts/adminArticleCategories/index';
		$dataArticleCategories 	= $this->CrudModel->gao('feducation_article_categories', 'created_at DESC');
		$data       			= array('session'    			=> SessionType::ADMIN,
										'csrfName'				=> $this->security->get_csrf_token_name(),
										'csrfToken'				=> $this->security->get_csrf_hash(),
										'dataArticleCategories'	=> $dataArticleCategories,
										'content'    			=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('article_category_headline', 'Judul Kategori', 'trim|required');
		$this->form_validation->set_rules('article_category_status', 'Status Kategori', 'trim|required');

		if ($this->form_validation->run() == false){
			redirect('admin/article/category');
		}else{
			$data 	= array("article_category_headline" => $input["article_category_headline"],
							"article_category_status"	=> $input["article_category_status"],
							"created_at"				=> date('Y-m-d H:i:s'),
							"created_by"				=> $this->session->userdata('user_id'));

			$this->CrudModel->i("feducation_article_categories", $data);
			redirect('admin/article/category');
		}
	}


	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('article_category_headline', 'Judul Kategori', 'trim|required');
		$this->form_validation->set_rules('article_category_status', 'Status Kategori', 'trim|required');
		$this->form_validation->set_rules('article_category_id', 'Artikel Kategori Id', 'trim|required');

		if ($this->form_validation->run() == false){
			redirect('admin/article/category');
		}else{
			$data 	= array("article_category_headline" => $input["article_category_headline"],
							"article_category_status"	=> $input["article_category_status"],
							"updated_at"				=> date('Y-m-d H:i:s'),
							"updated_by"				=> $this->session->userdata('user_id'));

			$where = array("id" => $input["article_category_id"]);

			$this->CrudModel->u("feducation_article_categories", $data, $where);
			redirect('admin/article/category');
		}
	}
}
