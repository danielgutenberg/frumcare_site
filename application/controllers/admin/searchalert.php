<?php 
	if(!defined('BASEPATH'))exit('No direct script access allowed');

	class SearchAlert extends CI_Controller{
		public function __construct(){
			parent:: __construct();
		}

		public function index(){

			$data = array(
				'main_content' => 'admin/searchalert/index',
				'title'		   => 'SearchAlert'	
			);

			$this->load->view(BACKEND_TEMPLATE, $data);
		}
	}
?>