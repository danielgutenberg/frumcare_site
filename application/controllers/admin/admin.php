<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller{
    function __construct() {
         parent::__construct();
         
        if (!$this->session->userdata('admin_username')) {
            redirect('admin/login');
        }
		$this->load->model('admin/admin_model','admin');
        $this->load->helper('cookie');
      }
      
      
      function index(){
        $data['title'] = 'Admin Manager';
        $data['main_content']='admin/admin/admin_config';
        $data['data']=$this->admin->loadinfo();
        $this->load->view('admin/includes/template',$data);

      }

      function add(){
        $data['main_content']   = 'admin/admin/add_edit_admin';
        $data['adminrole']      = $this->admin->getAllRoles();
        $data['title']          = 'Admin Manager';
        $data['pagetitle']      = 'Add Admin';

        $this->load->view('admin/includes/template',$data);
      }
      
      function add_save(){
        if($this->input->post('save_admin_info'))
        {
            $res = $this->admin->add_save();    
            if($res)
            {
                $this->session->set_flashdata('info',"Admin Details Added Successfully.");
                redirect('admin/admin');
            }
            else
            {
                $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
                redirect('admin/admin');
            }
        }
      }

    function edit($id){

        $data['editdata'] = $this->admin->edit($id);
        $data['main_content']='admin/admin/add_edit_admin';
        $data['adminrole']      = $this->admin->getAllRoles();
        $data['title']          = 'Admin Manager';
        $data['pagetitle']      = 'Edit Admin';

        $this->load->view('admin/includes/template',$data);
    }

      
    function edit_save(){
        if($this->input->post('save_admin_info')){
            $res = $this->admin->edit_save();    
            if($res == "updated"){
                $this->session->set_flashdata('info',"Admin Details Updated Successfully.");
                redirect('admin/admin');
            }
            elseif($res)
            {
                $this->session->set_flashdata('info',"Admin Current Password Doesn't Match With Existing Password.");
                redirect('admin/admin/edit/'.$res);
            }
            else
            {
                $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
                redirect('admin/admin');
            }
        }
    }
      
    function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_username');
		$this->session->unset_userdata('admin_type');
        delete_cookie("remember_login");
        
        redirect('admin');
        
    }
    
    function delete($id)
    {
        $res = $this->admin->delete($id);    
        if($res)
        {
            $this->session->set_flashdata('info',"Admin Details Deleted Successfully.");
            redirect('admin/admin');
        }
        else
        {
            $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
            redirect('admin/admin');
        }
        
    }

    function adminprofile($id = ''){

        $data = array(
            'main_content' => 'admin/admin/profileview',
            'recdata'         => $this->admin->getProfileData($id) 
        );  

        $this->load->view('admin/includes/template',$data);
    }
    
    
}
