<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Parents extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->library('breadcrumbs');
	}

	public function index(){

		$this->breadcrumbs->push('Parents', '/parents 	');
        $this->breadcrumbs->unshift('Home', base_url());

		$data = array(
			'main_content' => 'frontend/parents/index',
			'title'		   => 'Parents'
		);

		$this->load->view(FRONTEND_TEMPLATE, $data);
	}

}