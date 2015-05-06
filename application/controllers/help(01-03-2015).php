<?php 
if(! defined('BASEPATH'))exit('No direct script access allowed');
class Help extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->library('breadcrumbs');
		$this->load->model('common_model');
		$this->load->library('fileupload_lib');
	}

	public function index(){
		
		$this->breadcrumbs->push('Help', '/help');
		$this->breadcrumbs->unshift('Home', base_url());
		
		$data['main_content'] = 'frontend/help/index';
		$data['title'] 		  = 'Help';
		
		$this->load->view(FRONTEND_TEMPLATE, $data);
	}


	public function submit_ticket(){

		if(isset($_POST['ticket_title'])){
			
			$ticket_data = array(
				'subject'      => $_POST['ticket_title'],
				'description'  => $_POST['ticket_description'],
				'file'  	   => $_POST['file'],
				'email'		   => $_POST['contact_email'], 
				'phone'		   => $_POST['contact_number'],
				'date' 		   => time(),
				'user_id'		=> $this->session->userdata['current_user']
			);
			$this->db->insert('tbl_tickets', $ticket_data);

			$this->sendemail->ticket_data();
		}
	}

	 public function uploadfile(){
        $this->fileupload_lib->upload('files');
    }

	public function send_message(){
		if(isset($_POST['submit_now'])){
		$admin_email = $this->common_model->getAdminEmails();

		$email_config = array(        
                    'mailtype'  => 'html',
                    'starttls'  => true,
                    'newline'   => "\r\n",
                    // 'protocol' => 'sendmail',
                    // 'charset'=> 'iso-8859-1', 
                ); 

		$emaildata = array();
			$emaildata['name']    = $this->input->post('name');
			$emaildata['email']   = $this->input->post('email');
			$emaildata['message'] = $this->input->post('message'); 

			$this->load->library('email', $email_config);
			
			$this->email->from('noreply@frumcare.com', 'FRUMCARE');
			$this->email->to('santosh@access-keys.com');
			
			$this->email->subject('Help Needed');
			$this->email->message($this->load->view('emails/contactus', $emaildata, true));
			$this->email->send();
			redirect('help','refresh');
		}
	}

	function sendemail($emaildata){            
           $admin_email = $this->common_model->getAdminEmails();
		         $email_config = array(        
                    'mailtype'  => 'html',
                    'starttls'  => true,
                    'newline'   => "\r\n",
                    // 'protocol' => 'sendmail',
                    // 'charset'=> 'iso-8859-1', 
                ); 

               $this->load->library( 'email',$email_config);
               $this->email->from('info@frumcare.com','FRUMCARE');
               $this->email->to( 'santosh@access-keys.com' );
               $this->email->subject('A new ticket has been submitted');
               $this->email->message($this->load->view('emails/ticketapproval', $emaildata, true));
               $this->email->send();
        }
}
?>