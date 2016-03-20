<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Experience extends CI_Controller{
	public function __construct(){
		parent:: __construct();	
        if (!is_super()) {
            $this->session->set_flashdata('fail', 'Please sign in as an admin to access that page');
            redirect('admin/login');
        }
	}

	public function index(){

		
		$data['main_content'] ='admin/experience/index';
		$this->load->view('admin/includes/template',$data);
	}
}
?>
