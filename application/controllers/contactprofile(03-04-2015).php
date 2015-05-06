<?php 
	if(!defined("BASEPATH"))exit('No direct script access allowed');
	class ContactProfile extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('common_model');
		}

		public function profile($id = ''){
			$category = $this->uri->segment(3);
			$slug 	  = $this->uri->segment(4);
			if($slug){
				$emailaddress  = $this->common_model->getEmailAddressById($slug);
			}
			if(isset($_POST['contact'])){
				$name 			= $this->input->post('name',true);
				$phonenumber 	= $this->input->post('phonenumber',true);
				$email 			= $this->input->post('email',true);
				$comment 		= $this->input->post('comment',true);

				if($_FILES['userfile']['size'] > 0){
					$config['upload_path'] 		= 'uploads/files/';
					$config['allowed_types'] 	= 'gif|jpg|jpeg|png|txt|pdf|doc|docx';
					$config['max_size']         = '0';
					$config['encrypt_name']     = true;

					$this->load->library('upload',$config);
					if(! $this->upload->do_upload()){
							$error = array('error' => $this->upload->display_errors());
					}else{
						$upload_data	= $this->upload->data();
						$filename		= $upload_data['file_name'];
					}
				}

				// send email from here
					 $config = array(
			              'mailtype' => 'html',
			              'charset' => 'iso-8859-1',
			              'wordwrap' => TRUE
		            	);

					  $this->load->library('email',$config);      
				      $this->email->from($email, $name);
				      $this->email->to($emailaddress['email']);
				      $this->email->subject('Somebody Contacted you on frumcare');
				      if($filename!=''){
				      	$this->email->attach($upload_data['full_path']);	
				      }
				      $this->email->message($this->load->view('frontend/email/conact_email',array('name'=>$name,'phonenumber'=>$phonenumber,'comment'=>$comment,'email'=>$email,'filename'=>$filename),true));
				      $this->email->send();

				      redirect('contactprofile/profile/'.$id,'refresh');

			}


			$data = array(
				'title' 		=> "Contact",
				'main_content' 	=> 'frontend/contact/index',
				'category'		=> $category,
			);

			$this->load->view(FRONTEND_TEMPLATE,$data);
		}
	}

