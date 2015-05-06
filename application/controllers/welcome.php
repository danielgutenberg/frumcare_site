<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/*
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{        
		$this->load->model('testimonial_model');
		$this->load->model('common_model');
        $this->load->model('blog_model');
        $data['main_content'] 	= 'frontend/home';
        $data['title'] 			= 'Home';
        $data['testimonial'] 	= $this->testimonial_model->getTestiomialsForHome();
        $data['seodata']		= $this->common_model->getSEODATA();
        $this->load->view(FRONTEND_TEMPLATE, $data);
	}

    function add_care_type()
    {
        $this->load->model('common_model');
        if($_POST) {
            $i = $_POST;
            $this->common_model->insert('tbl_care', $i);
            redirect('welcome/add_care_type');
        } else {
            $this->load->view('admin/care_type_view');
        }
    }
    
    function subscribe(){        
        $res = $this->common_model->subscribe();
        if($res){
            echo "1";
        }else{
            echo "0";
        }
    }

    function success(){

        $this->load->library('breadcrumbs');
        $this->breadcrumbs->push('success', '');
        $this->breadcrumbs->unshift('Home', base_url());


        $data = array(
                'main_content' => 'frontend/success',
                'title'        => 'Success',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */