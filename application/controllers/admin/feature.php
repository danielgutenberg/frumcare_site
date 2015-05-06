<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Feature extends  CI_Controller{
    function __construct()
    {
          parent::__construct();
          $this->load->model('admin/feature_model');
          $this->load->model('admin/package_model');
          if(!$this->session->userdata('admin_username'))
          {
                  redirect('admin/login');
          }
    }
    
    function index(){

        $data['title']           = 'Feature Manager';
        $data['main_content']    = 'admin/feature/feature_view';
        $data['data']            = $this->feature_model->get_all_features();
        $this->load->view('admin/includes/template',$data);

    }
    
    function add(){
        
        $data['main_content']    ='admin/feature/add_edit_feature';
        $data['packages']        = $this->package_model->getAllPackages(); 
        $data['title']           = 'Feature Manager';
        $data['pagetitle']       = 'Add';

        $this->load->view('admin/includes/template',$data);
      }
      
      function add_save(){
        if($this->input->post('save_feature')){
            $res = $this->feature_model->add_save();    
            if($res){
                $this->session->set_flashdata('info',"Feature Added Successfully.");
                redirect('admin/feature');
            }
            else{
                $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
                redirect('admin/feature');
            }
        }
      }

    function edit($id){

         $data['editdata']          = $this->feature_model->edit($id);
         $data['main_content']      ='admin/feature/add_edit_feature';
         $data['packages']          = $this->package_model->getAllPackages();
         $data['title']             = 'Feature Manager';
         $data['pagetitle']         = 'Edit';

         $this->load->view('admin/includes/template',$data);
    }
      
    function edit_save(){
        if($this->input->post('save_feature')){
            $res = $this->feature_model->edit_save();    
            if($res == "updated"){
                $this->session->set_flashdata('info',"Feature Updated Successfully.");
                redirect('admin/feature');
            }
            else{
                $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
                redirect('admin/feature');
            }
        }
    }
    
    function delete($id){
        $res = $this->feature_model->delete($id);    
        if($res){
            $this->session->set_flashdata('info',"Feature Deleted Successfully.");
            redirect('admin/feature');
        }
        else{
            $this->session->set_flashdata('info',"Process Failed! Some Error Occured.Please,Try Again!");
            redirect('admin/feature');
        }
        
    }
    
}//Controller Close