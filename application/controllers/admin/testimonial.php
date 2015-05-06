<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct(){
		parent:: __construct();
        $this->load->model('admin/testimonial_model', 'testimonial');
        if(!$this->session->userdata('admin_username'))
        {
            redirect('admin/login');
        }
        $this->load->library('imageupload_lib');
	}

	public function index(){

        $this->load->library('pagination');
        $offset = $this->uri->segment(4)?$this->uri->segment(4):0;
        $config['base_url'] = site_url().'admin/testimonial/index/';
        $config['total_rows'] = $this->db->count_all('tbl_testimonials');
        $config['per_page'] = 10;
        $config['uri_segment'] = $offset;
        $config['num_links'] = 3;
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";

        $this->pagination->initialize($config);

        $data['title'] = 'Testimonial Manager';	 
        $data['details'] = $this->testimonial->get_all_testimonials($offset,$config['per_page']);
        $data['links']    = $this->pagination->create_links();  
        $data['main_content']='admin/testimonial/testimonial_view';
        $this->load->view('admin/includes/template', $data);	
	}

    public function add(){
        $data['title']          = 'Testimonial Manager';
        $data['pagetitle']      = 'Add';
        $data['main_content']   = "admin/testimonial/add_edit_testimonial";
        
        $this->load->view('admin/includes/template',$data);
    }

    public function edit($id){
        $data['title']          = 'Testimonial Manager';
        $data['pagetitle']      = 'Edit';
        $data['detail']         = $this->testimonial->edit_testimonial($id);
        $data['main_content']   = "admin/testimonial/add_edit_testimonial";

        $this->load->view('admin/includes/template',$data);
    }
 
    public function add_save(){
        $data = $_POST;
        
        $data['image']  = $data['file'];
        unset($data['file']);

        $this->db->insert('tbl_testimonials', $data);
        $this->session->set_flashdata('info',"Testimonial Saved Successfully");
        redirect('admin/testimonial');
    }

    public function edit_save($id){
        $data = $_POST;
        $data['image']  = $data['file'];
        unset($data['file']);

        $res = $this->db->update('tbl_testimonials', $data, array('id'=>$id));
        $this->session->set_flashdata('info',"Testimonial Saved Successfully");
        redirect('admin/testimonial');
    } 
    
     
    public function delete($id){
        $res = $this->testimonial->delete_testimonial($id);
        if($res)
        {
            $this->session->set_flashdata('info',"Testimonial Deleted Successfully");
            redirect('admin/testimonial');
        }
    }

    public function upload_image(){
        $this->imageupload_lib->upload('testimonial', 100, 300);
    }

    public function getdata($num = null){
        $num = $this->uri->segment(4)?$this->uri->segment(4):0;
        $testimonials = $this->testimonial->getData($num);
        if($testimonials){
           $data = json_encode($testimonials);
           echo $data;
        }else{
            echo '1';
        }
    }

}

/* End of file testimonial.php */
/* Location: ./application/controllers/admin/testimonial.php */
