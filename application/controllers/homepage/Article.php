<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index($num='') {
		$perpage 	= 5;
		$page 		= $this->uri->segment(2) ?: 0;
		$articles 	= $this->CrudModel->glo("feducation_article", $perpage, $page, 'created_at DESC');
		$totalRows	= $this->CrudModel->ca('feducation_article');

		$config['base_url'] = base_url('articles');
		$config['total_rows'] = $totalRows;
		$config['per_page'] = $perpage;
		$config['first_url'] = $config['base_url'];
		$config['next_link'] = 'Next Page';
		$config['prev_link'] = 'Previous Page';
		$config['first_link'] = 'First Page';
		$config['last_link'] = 'Last Page';
		$config['full_tag_open'] = '<ul class="pagination pg-red mt-3" style="overflow:auto;" >';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$content 		= '_homepageLayouts/article/index';
		$popularPost	= $this->CrudModel->gwo("feducation_article", 'article_order_number IS NOT NULL', 'article_order_number ASC');
		$whereCatStatus	= array("article_category_status" => TRUE);
		$dataArticleCat = $this->CrudModel->gwo('feducation_article_categories', $whereCatStatus, 'created_at DESC');

		$data 		= array('title'     	=> 'Article',
							'content'   	=> $content,
							'dataArticleCat'=> $dataArticleCat,
							'popularPost'	=> $popularPost,
							'articles'		=> $articles,
							'pagination'	=> $this->pagination->create_links());

		$this->load->view('_homepageLayouts/wrapper', $data);
	}

	public function search($num=''){
		$result			= array();
		$keywords 		= str_replace("-", " ", $this->uri->segment(3));
		$perpage 		= 4;
		$page 			= $this->uri->segment(4) ?: 0;


		if ($keywords != ""){
//			$query		= 'SELECT * FROM `feducation_article` WHERE article_headline like "%'.$input["keywords"].'%" ORDER BY created_at DESC LIMIT 4';
//			$result		= $this->CrudModel->q($query);
			$result 	= $this->CrudModel->gwlo("feducation_article", "article_headline LIKE '%".$keywords."%'",$perpage, $page, 'created_at DESC');
			$totalRows	= $this->CrudModel->cwo("feducation_article", "article_headline LIKE '%".$keywords."%'",'created_at DESC');
			$segmentKeywords = str_replace(" ", "-", $keywords);

			$config['base_url'] = base_url('article/search/'.$segmentKeywords);
			$config['total_rows'] = $totalRows;
			$config['per_page'] = $perpage;
			$config['first_url'] = $config['base_url'];
			$config['next_link'] = 'Next Page';
			$config['prev_link'] = 'Previous Page';
			$config['first_link'] = 'First Page';
			$config['last_link'] = 'Last Page';
			$config['full_tag_open'] = '<ul class="pagination pg-red mt-3" style="overflow:auto;" >';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
			$config['cur_tag_close'] = '</a></li>';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['attributes'] = array('class' => 'page-link');

			$this->pagination->initialize($config);
		}

		$content 		= '_homepageLayouts/article/search';
		$latestPost 	= $this->CrudModel->glo("feducation_article", $perpage, $page, 'created_at DESC');
		$popularPost	= $this->CrudModel->gwo("feducation_article", 'article_order_number IS NOT NULL', 'article_order_number ASC');
		$data 			= array('title'		=> 'Article',
								'keywords'	=> $keywords,
								'result'	=> $result,
								'latestPost'=> $latestPost,
								'popularPost'=> $popularPost,
								'pagination' => $this->pagination->create_links(),
								'content'	=> $content);

		$this->load->view('_homepageLayouts/wrapper', $data);
	}

	public function details($slug){
		$where			= array("article_slug" => $slug);
		$latestPost		= $this->CrudModel->gwo("feducation_article", 'article_order_number IS NOT NULL', 'article_order_number ASC');
		$dataArticle	= $this->CrudModel->gw("feducation_article", $where);
		$popularPost	= $this->CrudModel->gwo("feducation_article", 'article_order_number IS NOT NULL', 'article_order_number ASC');
		$whereCatStatus	= array("article_category_status" => TRUE);
		$dataArticleCat = $this->CrudModel->gwo('feducation_article_categories', $whereCatStatus, 'created_at DESC');
		$collectArticle	= current($dataArticle);

		$metaData		= array();
		foreach ($dataArticle as $data){
			$dataLists = new stdClass();
			$dataLists->ogUrl			= base_url("article/read/").$data->article_slug;
			$dataLists->ogDescription 	= $data->article_meta_description;
			$dataLists->ogKeyword		= $data->article_keyword;
			$dataLists->ogTitle			= $data->article_headline;
			$dataLists->ogImage			= $data->article_thumbnail ?: null;

			array_push($metaData, $dataLists);
		}

		$content 		= '_homepageLayouts/article/details';

		$data 		= array('title'       	=> 'Article-details',
							'content'     	=> $content,
							'dataArticleCat'=> $dataArticleCat,
							'popularPost'	=> $popularPost,
							'article'		=> $collectArticle,
							'metaData'		=> current($metaData));

		$this->load->view('_homepageLayouts/wrapper', $data);
	}
}
