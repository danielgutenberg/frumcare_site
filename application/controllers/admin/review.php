<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Review extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('admin/review_model');
        if (!is_super()) {
            $this->session->set_flashdata('fail', 'Please sign in as an admin to access that page');
            redirect('admin/login');
        }
	}

	public function index(){
		$data['main_content'] = "admin/review/index";
		$data['details']	  = $this->review_model->getAllReviews();
        $this->load->view('admin/includes/template',$data);
	}

	public function view($id = null){
		$id = segment(4);

		if(isset($_POST['save'])){
			$data = array(
				'name'				=> $this->input->post('username',TRUE),
				'description'		=> $this->input->post('review_description',TRUE),
				'review_rating' 	=> $this->input->post('review_rating',TRUE),
				'status'			=> $this->input->post('status',TRUE)
			);
			
			$this->review_model->update($data);
			$this->session->set_flashdata('info', 'Review updated successfully');
			redirect('admin/review','location');
		}

		$data['main_content'] = "admin/review/edit_view_review";
		$data['details']	  = $this->review_model->getAllReviewsById($id);
        $this->load->view('admin/includes/template',$data);	
	}
	
	public function delete($id){
		$id = $this->uri->segment(4);
		$del = $this->db->delete('tbl_reviews',array('id'=>$id));
		if($del){
			$this->session->set_flashdata('info', 'Review deleted successfully');
			redirect('admin/review','location');
		}

	}

}
