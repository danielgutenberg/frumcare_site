<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscriptions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_username')) {
            redirect('admin/login');
        }
        $this->load->model('common_model');
        $this->load->model('user_model');
        $this->load->model('admin/subscriptions_model');
        $this->load->model('caretype_model');
        $this->load->model('review_model');
        $this->load->model('refrence_model');
        $this->load->library('fileupload_lib');
    }

    function index(){
        $data['title'] = 'Newsletter Subscriptions';
        $data['user_data']    = $this->subscriptions_model->getSubscriptions();
        $data['main_content'] = 'admin/subscriptions/subscriptions_view';
        $this->load->view(BACKEND_TEMPLATE, $data);
    }



}//Controller Close
