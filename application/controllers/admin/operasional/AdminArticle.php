<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminArticle extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($this->session->userdata('user_authStatus') != AuthStatus::AUTHORIZED){
			redirect('admin/login');
		}
	}

	public function index() {
		$content    	= '_adminLayouts/adminArticle/index';

		if ($this->session->userdata("user_role_type") == UserRoleType::PUBLIC_RELATIONS) {
			$dataArticle 	= $this->CrudModel->gwo('feducation_article', array('created_at' => $this->session->userdata('user_id')),'created_at DESC');

		} else {
			$dataArticle 	= $this->CrudModel->gao('feducation_article', 'created_at DESC');
		}

		$data       	= array('session'    	=> SessionType::ADMIN,
								'dataArticle'	=> $dataArticle,
								'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function create(){
		$content    = '_adminLayouts/adminArticle/create';
		$where		= array("article_category_status" => TRUE);
		$dataArticleCat = $this->CrudModel->gwo('feducation_article_categories', $where, 'created_at DESC');
		$data       = array('session'    	=> SessionType::ADMIN,
							"csrfName" 		=> $this->security->get_csrf_token_name(),
							"csrfToken"		=> $this->security->get_csrf_hash(),
							'dataArticleCat'=> $dataArticleCat,
							'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function save(){

		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('article_headline', 'Article Headline', 'trim|required');
		$this->form_validation->set_rules('article_slug', 'Article Slug', 'trim|required');
		$this->form_validation->set_rules('article_meta_description', 'Article Meta Description', 'trim|required');
		$this->form_validation->set_rules('article_keyword', ' ArticleKeyword', 'trim|required');
		$this->form_validation->set_rules('article_thumbnail', 'Article Thumbnail', 'trim|required');
		$this->form_validation->set_rules('article_cover', 'Article Cover', 'trim|required');
		$this->form_validation->set_rules('article_content', 'Article Content', 'trim|required');
		$this->form_validation->set_rules('article_author', 'Article Author', 'trim|required');
		$this->form_validation->set_rules('article_category_id', 'Article Category', 'trim|required');

		if ($this->form_validation->run() == false){
			redirect('admin/article/create');
		}else{
			$data	= array("article_headline"			=> $input["article_headline"],
							"article_slug"				=> $input["article_slug"],
							"article_category_id"		=> $input["article_category_id"],
							"article_meta_description"	=> $input["article_meta_description"],
							"article_keyword"			=> $input["article_keyword"],
							"article_thumbnail"			=> $input["article_thumbnail"] ?: null,
							"article_cover"				=> $input["article_cover"] ?: null,
							"article_content"			=> $input["article_content"],
							"article_author"			=> $input["article_author"],
							"created_at"				=> date('Y-m-d H:i:s'),
							"created_by"				=> $this->session->userdata("user_id"));

			$this->CrudModel->i("feducation_article", $data);
			redirect('admin/article');
		}
	}

	public function edit($id){

		$content    = '_adminLayouts/adminArticle/edit';
		$whereId	= array("id" => $id);
		$whereStatus= array("article_category_status" => TRUE);
		$setQuery 	= $this->CrudModel->gw('feducation_article', $whereId);
		$dataArticleCat = $this->CrudModel->gwo('feducation_article_categories', $whereStatus, 'created_at DESC');
		$data       = array('session'    	=> SessionType::ADMIN,
							"csrfName" 		=> $this->security->get_csrf_token_name(),
							"csrfToken"		=> $this->security->get_csrf_hash(),
							'dataArticle'	=> current($setQuery),
							'dataArticleCat'=> $dataArticleCat,
							'content'    	=> $content);

		$this->load->view('_adminLayouts/wrapper', $data);
	}

	public function update(){
		$input = $this->input->post(NULL, TRUE);
		$this->form_validation->set_rules('article_headline', 'Article Headline', 'trim|required');
		$this->form_validation->set_rules('article_slug', 'Article Slug', 'trim|required');
		$this->form_validation->set_rules('article_meta_description', 'Article Meta Description', 'trim|required');
		$this->form_validation->set_rules('article_keyword', ' ArticleKeyword', 'trim|required');
		$this->form_validation->set_rules('article_thumbnail', 'Article Thumbnail', 'trim|required');
		$this->form_validation->set_rules('article_cover', 'Article Cover', 'trim|required');
		$this->form_validation->set_rules('article_content', 'Article Content', 'trim|required');
		$this->form_validation->set_rules('article_author', 'Article Author', 'trim|required');
		$this->form_validation->set_rules('article_category_id', 'Article Category', 'trim|required');

		if ($this->form_validation->run() == false){
			redirect('admin/article/edit'.$input["article_id"]);
		}else{
			$data	= array("article_headline"			=> $input["article_headline"],
							"article_slug"				=> $input["article_slug"],
							"article_category_id"		=> $input["article_category_id"],
							"article_meta_description"	=> $input["article_meta_description"],
							"article_keyword"			=> $input["article_keyword"],
							"article_thumbnail"			=> $input["article_thumbnail"] ?: null,
							"article_cover"				=> $input["article_cover"] ?: null,
							"article_content"			=> $input["article_content"],
							"article_author"			=> $input["article_author"],
							"updated_at"				=> date('Y-m-d H:i:s'),
							"updated_by"				=> $this->session->userdata("user_id"));

			$where	= array("id" => $input["article_id"]);
			$this->CrudModel->u("feducation_article", $data, $where);
			redirect('admin/article');
		}
	}

	public function delete($id){
		$whereId 		= array("id" => $id);
		$dataArticle 	= $this->CrudModel->gw('feducation_article',  $whereId);
		$collectArticle	= current($dataArticle);

		if($collectArticle->article_thumbnail != null){
			$target_thumbnail 	= './assets/resources/articles/'.$collectArticle->article_thumbnail;
			unlink($target_thumbnail);
		}

		if($collectArticle->article_cover != null){
			$target_cover 		= './assets/resources/articles/'.$collectArticle->article_cover;
			unlink($target_cover);
		}

		$this->CrudModel->d('feducation_article', $whereId);
		redirect(site_url('admin/article') );
	}
}
