<?php 
	if(!defined('BASEPATH'))exit('No Direct script access allowed');

	class Adminrole extends CI_Controller{
		public function __construct(){
			parent:: __construct();

        if (!is_super()) {
            $this->session->set_flashdata('fail', 'Please sign in as an admin to access that page');
            redirect('admin/login');
        }

			$this->load->model('admin/adminrole_model');
			$this->load->model('admin/admin_model');
		}

		public function index(){
			$data = array(
				'main_content' 	=> 'admin/adminrole/index',
				'data'			=>  $this->adminrole_model->getAllData(),
				'title'			=> 'Admin Role Manager'
			);
			$this->load->view(BACKEND_TEMPLATE,$data);
		}

		public function add(){

			if(isset($_POST['save_admin_info'])){
					//$this->adminrole_model->add();
				if(isset($_POST['access'])){
					$access = join(',',$_POST['access']);
				}
		
			$idata = array(
				'role_name' => $this->input->post('name',true),
				'access'	=> isset($access)?$access:'',
				'status'	=> $this->input->post('status',true),
			);

		$this->db->insert('tbl_adminrole',$idata);

					$this->session->flashdata('success', "AdminRole added successfully.");
					redirect('admin/adminrole','refresh');
			}

			$data = array(
				'main_content'  	=> 'admin/adminrole/add',
				'adminusers'		=> $this->admin_model->getAllAdminUsers(),
				'title'				=> 'Admin Role Manager',
				'pagetitle'		=> 'Add Admin Role'
			);
			$this->load->view(BACKEND_TEMPLATE,$data);
		}

		public function edit($id = null){

			if(isset($_POST['save_admin_info'])){
				//$this->adminrole_model->edit($id);

				if(isset($_POST['access'])){
					$access = join(',',$_POST['access']);
				}

			$data = array(
				'role_name' => $this->input->post('name',true),
				'access'	=> isset($access)?$access:'',
				'status'	=> $this->input->post('status',true),
			);
				$id = $this->input->post('id',true);
				$this->db->where('id', $id);
				$this->db->update('tbl_adminrole',$data);
				
				$this->session->flashdata('success',"AdminRole updated successfully");
				redirect('admin/adminrole','refresh');
			}

			$data = array(
					'main_content' 	=> 	'admin/adminrole/edit',
					'editData'		=>  $this->adminrole_model->getById($id),
					'adminusers'	=>  $this->admin_model->getAllAdminUsers(),
					'title'			=>  'Admin Role Manager',
					'pagetitle'	    =>  'Edit Admin Role'
			);

			$this->load->view(BACKEND_TEMPLATE, $data);
		}

		public function delete($id = null){
			$this->adminrole_model->delete($id);
			$this->session->flashdata('success','AdminRole deleted successfully');
			redirect('admin/adminrole','refresh');
		}

	}
