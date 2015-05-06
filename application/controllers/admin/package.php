<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Package extends  CI_Controller
{
    function __construct()
    {
          parent::__construct();
          $this->load->model('admin/package_model');
          if(!$this->session->userdata('admin_username'))
          {
                  redirect('admin/login');
          }
    }
    
    function index(){
        $data['title']='Package Manager';
        $data['main_content']='admin/package/package_view';
        $data['data']=$this->package_model->get_all_packages();
        $this->load->view('admin/includes/template',$data);
    }
    
    function add(){
        $data['main_content']       ='admin/package/add_edit_package';
        $data['package_features']   = array();
        $data['features']           = $this->package_model->get_all_active_features();
        $data['title']              = 'Package Manager';
        $data['pagetitle']          = 'Add';
        $this->load->view('admin/includes/template',$data);
      }
      
      function add_save()
      {
        if($this->input->post('save_package'))
        {
            $res = $this->package_model->add_save();    
            if($res)
            {
                $this->session->set_flashdata('info',"Package Added Successfully.");
                redirect('admin/package');
            }
            else
            {
                $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
                redirect('admin/package');
            }
        }
      }
    function edit($id){
        $data['editdata']           = $this->package_model->edit($id);
        $data['features']           = $this->package_model->get_all_active_features();
        $data['package_features']   = $this->package_model->get_package_features($id);
        $data['main_content']       ='admin/package/add_edit_package';
        $data['title']              = 'Package Manager';
        $data['pagetitle']          = 'Edit';

        $this->load->view('admin/includes/template',$data);
      }
      
    function edit_save()
    {
        if($this->input->post('save_package'))
        {
            $res = $this->package_model->edit_save();    
            if($res == "updated")
            {
                $this->session->set_flashdata('info',"Package Updated Successfully.");
                redirect('admin/package');
            }
            else
            {
                $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
                redirect('admin/package');
            }
        }
    }
    
    function delete($id)
    {
        $res = $this->package_model->delete($id);    
        if($res)
        {
            $this->session->set_flashdata('info',"Package Deleted Successfully.");
            redirect('admin/package');
        }
        else
        {
            $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
            redirect('admin/package');
        }
        
    }
    
}//Controller Close