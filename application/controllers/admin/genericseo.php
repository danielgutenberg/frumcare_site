<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Genericseo extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('admin/genericseo_model');
		if(!$this->session->userdata('admin_username'))
        {
            redirect('admin/login');
        }

	}

	public function index()
	{
		 
        if ($this->input->post('submit')) {
            $this->genericseo_model->update_generic_seo();
            $this->session->set_flashdata('info',"Information updated Successfully");
            
        }
        $data['title']          = 'Generic SEO';
        $data['details'] = $this->genericseo_model->get_generic_seo();
        $data['main_content']='admin/genericseo/genericseo';
        $this->load->view('admin/includes/template', $data);	
	}

}

/* End of file genericseo.php */
/* Location: ./application/controllers/admin/genericseo.php */
