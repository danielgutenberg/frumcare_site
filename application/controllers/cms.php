<?php 
if(! defined('BASEPATH'))exit('NO direct script access allowed');
	class Cms extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('cms_model');
			$this->load->library('breadcrumbs');
		}

		public function aboutus(){

         	$this->breadcrumbs->push('About us', '/about-us');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/cms/page';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('about-us');
			$data['title'] 		  = 'About us';
			
			$this->load->view(FRONTEND_TEMPLATE, $data);
		}

		public function termsandconditions(){	
			if($this->input->is_ajax_request()){
				$data['content_data'] = $this->cms_model->getPageDetailBySlug('terms-and-conditions');	
				echo ($data['content_data']['content']);exit();
			}
		}

		public function stayingsafe(){
			$data['main_content'] = 'frontend/cms/page';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('staying-safe');
			$data['title'] 		  = 'Staying Safe';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}

		public function tipsandtools(){
			$data['main_content'] = 'frontend/cms/page';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('tips-and-tools');
			$data['title'] 		  = 'Tips and Tools';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
	}