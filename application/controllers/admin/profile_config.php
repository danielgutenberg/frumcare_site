<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');

class Profile_config extends CI_Controller{
	public function __construct(){
		parent:: __construct();
	}
	
	public function index(){
		$data['main_content'] ='admin/profile_config/index';
		$this->load->view('admin/includes/template',$data);
	}


	public function add_experinces(){
		if(isset($_POST['save'])){
			$data = array(
				'name'		 => $this->input->post('name',TRUE),
				'status'	 => $this->input->post('status',TRUE),
				);
			$this->db->insert('tbl_experiences',$data);
			$this->session->set_flashdata('info', 'Experiences added successfully');

		}
		$data['main_content'] ='admin/profile_config/add';
		$this->load->view('admin/includes/template',$data);
	}

	public function add_nutshell(){
		if(isset($_POST['save'])){
			$data = array(
				'name'		 => $this->input->post('name',TRUE),
				'status'	 => $this->input->post('status',TRUE),
				);
			$this->db->insert('tbl_nutshell',$data);
			$this->session->set_flashdata('info', 'Nutshell added successfully');

		}
		$data['main_content'] ='admin/profile_config/add_nutshell';
		$this->load->view('admin/includes/template',$data);
	}
}
