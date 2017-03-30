<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Review extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('review_model');
        $this->load->library('breadcrumbs');
	}

	public function approve()
	{
		$path = $_SERVER['REQUEST_URI'];
        $position = $this->strposX($path, '/', 4);
        $hash = substr($path, $position + 1);
		
		$hashData = json_decode(encrypt_decrypt('decrypt', $hash));
		if (!isset($hashData->id)) {
			$this->session->set_flashdata('fail', 'An Error occured, review not approved');
            redirect('admin/login');
		}
		
		$this->review_model->approve_review($hashData->id);
		
		redirect('review/success','refresh');
	}
	
	public function success()
   {
        $this->breadcrumbs->push('Success', '/help');
        $this->breadcrumbs->unshift('Home', base_url());

        $data = array(
            'main_content' => 'frontend/review/success',
            'title'        => 'Success',
        );

        $this->load->view(FRONTEND_TEMPLATE,$data);

    }
	
	public function strposX($haystack, $needle, $number){
        if($number == '1'){
            return strpos($haystack, $needle);
        }elseif($number > '1'){
            return strpos($haystack, $needle, $this->strposX($haystack, $needle, $number - 1) + strlen($needle));
        }else{
            
        }
    }
	
	public function index(){
		$postdata = $this->input->post();
		if($postdata){
			$data = $this->review_model->add_review($postdata);
			$hashInfo = ['user_id' => $postdata['current_user'], 'score' => $postdata['score'], 'id' => $data['id']];
			$emailData = [
				'review' => $postdata['review_description'],
				'hash' => encrypt_decrypt('encrypt', json_encode($hashInfo))
			];
			
			$msg = $this->load->view('frontend/email/approveReview', $emailData, true);
			
            $param = array(
                'subject'     => 'A new review has been added that requires approval',
                'from'        => SITE_EMAIL,
                'from_name'   => SITE_NAME,
                'replyto'     => SITE_EMAIL,
                'replytoname' => SITE_NAME,
                'sendto'      => SITE_EMAIL,
                'message'     => $msg
            );
            sendemail($param);
            echo $data['msg'];
		}else{
		  echo "Some error occured";
		}

	}

	public function allreviews($id = NULL){
		$id = $this->uri->segment(3);
		$data['main_content'] =  'frontend/review/index';
		$data['recordData']   =  $this->review_model->getAllReviewsByUserId($id);
		$data['title']        =  'All Reviews';

		$this->load->view(FRONTEND_TEMPLATE,$data);
	}
}
