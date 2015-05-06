<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Specialneedscaregiver extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['main_content']  = 'frontend/specialneedscaregiver';
        $this->load->view(FRONTEND_TEMPLATE,$data);
    }
}