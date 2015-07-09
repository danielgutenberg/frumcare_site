<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Errandrunner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['main_content']  = 'frontend/errandrunner';
        $this->load->view(FRONTEND_TEMPLATE,$data);
    }
}
