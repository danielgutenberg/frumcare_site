<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Dashboard extends  CI_Controller
{
    function __construct()
    {
          parent::__construct();
          $this->load->helper('cookie');
          $this->load->model('admin/admin_model');
          //$this->load->model("admin/settings_model");
          if(!$this->session->userdata('admin_username'))
          {
                  redirect('admin/login');
          }
    }
    
    function index()
    {   
        $data['title']='Dashboard';
        $data['main_content']='admin/dashboard_view';
        $this->load->view('admin/includes/template',$data);
    }
    
    
    function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_username');
        $login_url = $this->session->userdata('admin_login_url');
        $this->session->unset_userdata('admin_login_url');
        delete_cookie('remember_login');
        redirect($login_url, 'location');
    }
    
    function profile()
    {
        $user_id = $this->session->userdata('admin_id');
        $data['user_details'] = $this->admin_model->get_user_details($user_id);
        $data['title']='Admin Profile';
        $data['main_content']='admin/profile';
        $this->load->view('admin/includes/template',$data);
    }
    /*
    function myaccount()
    {
        $admin = $this->db->get_where('tbl_admin',array('adminlevel'=>'superadmin'))->row_array();
        $id = $admin['id'];
        $data['title']='My Account - Dashboard';
        $data['main_content']='admin/my_account';
        $data['settings'] = $this->settings_model->get_settings($id);
        $this->load->view('admin/includes/template',$data);
    }
    function save_admin_info()
    {
        $res = $this->settings_model->save_admin_info();
        
        if($res)
        {
            redirect("admin/dashboard");
        }
    }
    */
}//Controller Close
