<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_ajax extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function check_email(){
        check_email($_POST['email']);
    }

}
