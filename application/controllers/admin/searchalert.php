<?php 
	if(!defined('BASEPATH'))exit('No direct script access allowed');

	class SearchAlert extends CI_Controller{
		public function __construct(){
			parent:: __construct();
	        if (!is_super()) {
	            $this->session->set_flashdata('fail', 'Please sign in as an admin to access that page');
	            redirect('admin/login');
	        }
            $this->load->model('admin/searchalert_m','searchalert_m',true);
		}

		public function index(){
            $records=$this->searchalert_m->get_all();
            //print_r($records); exit;
			$data = array(
                'record'=>$records,
				'main_content' => 'admin/searchalert/index',
				'title'		   => 'SearchAlert'
			);

			$this->load->view(BACKEND_TEMPLATE, $data);
		}
	}
?>
