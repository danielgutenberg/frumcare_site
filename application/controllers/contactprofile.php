<?php 
	if(!defined("BASEPATH"))exit('No direct script access allowed');
	class ContactProfile extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('user_model');
		}

		public function profile($id = '')
		{
			$category = $this->uri->segment(3);
			$slug 	  = $this->uri->segment(4);
			$careType = $this->uri->segment(5);
			if ($slug) {
				$user  = $this->user_model->getUserDetailsBySlug($slug, $careType);
			}
			if (isset($_POST['contact'])) {			 
				$name 			= $this->input->post('name',true);
				$phonenumber 	= $this->input->post('phonenumber',true);
				$email 			= $this->input->post('email',true);
				$comment 		= $this->input->post('comment',true);			
                        
				$viewData = array(
					'name'        => $name,
					'phonenumber' => $phonenumber,
					'comment'     => $comment,
					'email'       => $email,
					'filename'    => $filename
				);
				
				$msg = $this->load->view('frontend/email/conact_email', $viewData, true);				      
                      
                $user_id = check_user();
		        $loggedInUser = get_user($user_id);
                
                $param = array(
	                'subject'     => 'Somebody Contacted you on FrumCare',
	                'from'        => SITE_EMAIL,
	                'from_name'   => SITE_NAME,
	                'replyto'     => $email,
	                'replytoname' => $name,
	                'sendto'      => $user['email'],
	                'bcc'         => SITE_EMAIL,
	                'message'     => $msg,
	                'initiatedBy' => array('id' => $loggedInUser['id'], 'email' => $loggedInUser['email']),
	            );

	            
            	if (sendemail($param)) {	                
            		$data = [
		                'sender_id' => $loggedInUser['id'],
		                'receiver_id' => $user['user_id'],
		                'comment' => $comment,
		                'time' => time()
		            ];
		            $this->user_model->saveMessage($data);
			        $this->session->set_flashdata('info','Email successfully sent');
	                redirect($category . '/details/' . $slug . '/' . $careType, 'refresh');
	            }
                else{
                    show_error($this->email->print_debugger());
                }
			}
            else{
				
				$data = array(
    				'title' 		=> "Contact",
    				'main_content' 	=> 'frontend/contact/index',
    				'category'		=> $category,
            		'user'          => $user,
            		'careType'      => $careType
    			);

			   $this->load->view(FRONTEND_TEMPLATE,$data);
            }
		}
	}
