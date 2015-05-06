<?php 
	if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Howitworks extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}

		public function index(){

			$data = array(
				'main_content' =>  'frontend/howitworks/index',
				'title'		   => 'How it works'	
			);

			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
	}
?>