<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Datatables extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('Datatables');
    }
    
    //function to handle callbacks
    function datatable()
    {
        $this->datatables->select('id,first,last,email')
        ->unset_column('id')
        ->from('subscriber');
        
        echo $this->datatables->generate();
    }
}
