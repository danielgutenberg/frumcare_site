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
			$this->breadcrumbs->push('Safety Guide', '/safety-guide');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/cms/page';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('staying-safe');
			$data['title'] 		  = 'Staying Safe';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}

		public function tipsandtools(){
			$this->breadcrumbs->push('Advice and Tips', '/advice-and-tips');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/cms/page';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('tips-and-tools');
			$data['title'] 		  = 'Advice and Tips';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function faq(){
			$this->breadcrumbs->push('FAQ', '/faq');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/cms/page';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('faq');
			$data['title'] 		  = 'Frequently Asked Questions';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function ratecalculator(){
			$this->breadcrumbs->push('Rate Calculator', '/rate-calculator');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/cms/page';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('rate-calculator');
			$data['title'] 		  = 'Rate Calculator';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function backgroundcheck(){
			$this->breadcrumbs->push('Background Check', '/background-check');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/cms/page';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('background-check');
			$data['title'] 		  = 'Background Check';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		
	}