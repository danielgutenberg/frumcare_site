<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Experience extends CI_Controller{
	public function __construct(){
		parent:: __construct();		
	}

	public function index(){

		
		$data['main_content'] ='admin/experience/index';
		$this->load->view('admin/includes/template',$data);
	}
}
?>
