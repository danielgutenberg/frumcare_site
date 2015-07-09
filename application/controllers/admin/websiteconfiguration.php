<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Websiteconfiguration extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	}

	public function index(){	 
    	if ($this->input->post()) {
            if($this->db->update('tbl_website_config', $_POST, array('id'=>1)))
            	$this->session->set_flashdata('info', 'Saved Successfully');
            else
            	$this->session->set_flashdata('info', 'Failed to Save');
        }
        $data['title'] = 'Website Configuration';
        $data['details'] = $this->db->get_where('tbl_website_config', array('id'=>1))->row();
        $data['main_content']='admin/websiteconfig/websiteconfiguration_view';
        $this->load->view('admin/includes/template', $data);	
	}

}

/* End of file websiteconfiguration.php */
/* Location: ./application/controllers/admin/websiteconfiguration.php */
