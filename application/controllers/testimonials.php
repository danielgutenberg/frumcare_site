<?php 
if(! defined('BASEPATH'))exit('No direct script access allowed');
class Testimonials extends CI_Controller{
	public function __construct(){
		parent::  __construct();
		$this->load->model('testimonial_model');
		$this->load->library('breadcrumbs');
	}

	public function index(){
		$this->breadcrumbs->push('Testimonials', '/testimonials');
		$this->breadcrumbs->unshift('Home', base_url());

		$data['main_content'] = 'frontend/testimonails/index';
		$data['testimonails'] = $this->testimonial_model->getAllTestimonails();
		$data['title']		  = 'Testimonials';


		$this->load->view(FRONTEND_TEMPLATE, $data);

	}
}