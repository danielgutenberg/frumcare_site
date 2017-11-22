<?php 
if(! defined('BASEPATH'))exit('NO direct script access allowed');
	class Cms extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('cms_model');
			$this->load->library('breadcrumbs');
			$this->load->model('common_care_model');
		}

		public function aboutus(){

         	$this->breadcrumbs->push('About us', '/about-us');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('about-us');
			$data['title'] 		  = 'About us';
			$data['seotitle']     = 'About us';
			
			$this->load->view(FRONTEND_TEMPLATE, $data);
		}

		public function termsofuse(){	
			$this->breadcrumbs->push('Terms of Use', '/terms-of-use');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('terms-of-use');
			$data['title'] 		  = 'Terms of Use';
			$data['seotitle']     = 'About us';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function privacypolicy(){	
			$this->breadcrumbs->push('Privacy Policy', '/privacy-policy');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('privacy-policy');
			$data['title'] 		  = 'Privacy Policy';
			$data['seotitle']     = 'About us';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}

		public function stayingsafefamilies(){
			$this->breadcrumbs->push('Safety Guide', '/safety-guide/families');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('staying-safe-family');
			$data['title'] 		  = 'Safety Guide - For Families';
			$data['seotitle']     = 'safetyguidefamilies';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function stayingsafecaregivers(){
			$this->breadcrumbs->push('Safety Guide', '/safety-guide/caregivers');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('staying-safe-caregivers');
			$data['title'] 		  = 'Safety Guide - For Caregivers';
			$data['seotitle']     = 'safetyguidecaregivers';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}

		public function tipsandtoolsfamilies(){
			$this->breadcrumbs->push('Advice and Tips', '/advice-and-tips/families');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('tips-and-tools-families');
			$data['title'] 		  = 'Advice and Tips - For Families';
			$data['seotitle']     = 'tipsfamilies';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function tipsandtoolscaregivers(){
			$this->breadcrumbs->push('Advice and Tips', '/advice-and-tips/caregivers');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('tips-and-tools-caregivers');
			$data['title'] 		  = 'Advice and Tips - For Caregivers';
			$data['seotitle']     = 'tipscaregivers';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function tipsandtoolsemployers(){
			$this->breadcrumbs->push('Advice and Tips', '/advice-and-tips/employers');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('tips-and-tools-employers');
			$data['title'] 		  = 'Advice and Tips - For Families';
			$data['seotitle']     = 'tipsfamilies';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function faq(){
			$this->breadcrumbs->push('FAQ', '/faq');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('frequently-asked-questions');
			$data['title'] 		  = 'Frequently Asked Questions';
			$data['seotitle']     = 'faqs';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function ratecalculator(){
			$this->breadcrumbs->push('Rate Calculator', '/rate-calculator');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('rate-calculator');
			$data['title'] 		  = 'Rate Calculator';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function backgroundcheck()
		{
			$this->breadcrumbs->push('Background Check', '/background-check');
			$this->breadcrumbs->unshift('Home', base_url());
			
			$data['main_content'] = 'frontend/pages/article';
			$data['content_data'] = $this->cms_model->getPageDetailBySlug('background-check');
			$data['title'] 		  = 'Background Check';
			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
		
		public function archiveusers()
		{
			$time = time();
			$eigthyThreeDaysAgo = $time - (60 * 60 * 24 * 83);
			$users = $this->common_care_model->getLastLogin($eigthyThreeDaysAgo);
			foreach ($users as $user) {
				print_rr($user);
			}
		}
		
		
	}
