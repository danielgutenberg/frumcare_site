<?php 
if(! defined('BASEPATH'))exit('NO direct script access allowed');
	class Cms extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('cms_model');
			$this->load->library('breadcrumbs');
			$this->load->model('common_care_model');
			$this->load->model('user_model');
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
		
		public function archiveuser()
		{
			$time = time();
			$eigthyThreeDaysAgo = $time - (60 * 60 * 24 * 83);
			$eightyEightDaysAgo = $time - (60 * 60 * 24 * 88);
			$eightyNineDaysAgo = $time - (60 * 60 * 24 * 89);
			$ninetyDaysAgo = $time - (60 * 60 * 24 * 90);
			$users = $this->common_care_model->getLastLogin($eigthyThreeDaysAgo);
			foreach ($users as $user) {
				if ($user['email'] == 'danielguten@gmail.com') {
				if ($user['login_time'] < $ninetyDaysAgo) {
					if ($user['archive_warning'] == 'two_days') {
						$this->send_expired($user);
						$this->user_model->edit_user(['archive' => 1], $user['id']);
					} else if ($user['archive_warning'] == 'week') {
						$this->send_warning($user, 2);
						$this->user_model->edit_user(['archive_warning' => 'two_days'], $user['id']);
					} else if (!$user['archive_warning']) {
						$this->send_warning($user, 7);
						$this->user_model->edit_user(['archive_warning' => 'week'], $user['id']);
					}
				} else if ($user['login_time'] < $eightyEightDaysAgo) {
					if ($user['archive_warning'] == 'week') {
						$this->send_warning($user, 2);
						$this->user_model->edit_user(['archive_warning' => 'two_days'], $user['id']);
					} else if (!$user['archive_warning']) {
						$this->send_warning($user, 7);
						$this->user_model->edit_user(['archive_warning' => 'week'], $user['id']);
					}
				} else if ($user['login_time'] < $eigthyThreeDaysAgo) {
					if (!$user['archive_warning']) {
						$this->send_warning($user, 7);
						$this->user_model->edit_user(['archive_warning' => 'week'], $user['id']);
					}
				}
				}
			}
		}
		
		private function send_warning($user, $days)
		{
	        $msg = $this->load->view('emails/account_inactive', array('name' => $user['name'], 'days' => $days), true);
	        $param = array(
	            'subject'     => 'Account Inactive',
	            'from'        => SITE_EMAIL,
	            'from_name'   => SITE_NAME,
	            'replyto'     => SITE_EMAIL,
	            'replytoname' => SITE_NAME,
	            'sendto'      => $user['email'],
	            'message'     => $msg
	        );
	        
	        sendemail($param);
		}
		
		private function send_expired($user)
		{
	        $msg = $this->load->view('emails/account_expired', array('name' => $user['name']), true);
	        $param = array(
	            'subject'     => 'Account Expired',
	            'from'        => SITE_EMAIL,
	            'from_name'   => SITE_NAME,
	            'replyto'     => SITE_EMAIL,
	            'replytoname' => SITE_NAME,
	            'sendto'      => $user['email'],
	            'message'     => $msg
	        );
	        
	        sendemail($param);
	        $this->load->library('activeCampaign');
        	$ac = $this->activecampaign;
	        $contact = array(
        		"email"      => $user['email'],
        		"tags"       => ['Archived'],
         	);
            $ac->api("contact/tag_add", $contact);
		}
	}
