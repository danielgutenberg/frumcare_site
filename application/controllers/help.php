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
		
		$data['main_content'] = 'frontend/pages/help';
		$data['title'] 		  = 'Help';
		$data['seotitle'] 		  = 'Contact Us';
		
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

			$this->sendemail($ticket_data);
		}
	}

	 public function uploadfile(){
        $this->fileupload_lib->upload('files');
    }

	public function send_message(){
		if(isset($_POST['submit_now'])) {
			$admin_email = $this->common_model->getAdminEmails();
			$redirect = $this->input->post('current_url', true);
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$emaildata = array();
			$emaildata['name']    = $name;
			$emaildata['email']   = $email;
			$emaildata['message'] = $this->input->post('message'); 

			$msg = $this->load->view('emails/contactus', $emaildata, true);
			
			$param = array(
                'subject'     => 'Help Needed',
                'from'        => SITE_EMAIL,
                'from_name'   => SITE_NAME,
                'sendto'      => 'info@frumcare.com',
                'message'     => $msg,
                'bcc'         => ['danielguten@gmail.com' => 'Daniel Gutenberg']
            );
            sendemail($param); 
            
            $this->load->library('activeCampaign');
            $name = explode(' ', $name);
            $contact = array(
        		"email"      => $email,
        		"first_name" => array_shift($name),
        		"last_name"  => implode(' ', $name),
        		"p[6]"       => 6,
        		"status[6]"  => 1,
        		"tags"       => '[CT] Contact Help'
         	);
         	$this->activecampaign->api("contact/sync", $contact);
            
            if ($redirect) {
            	redirect($redirect, 'refresh');
            } else {
				redirect('help','refresh');  
            }
		}
	}
    function send_this_message(){        
  
		    $config = Array(
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            ); 
            $emaildata = array();
			$emaildata['name']    = $this->input->post('name');
			$emaildata['email']   = $this->input->post('email');
			$emaildata['message'] = $this->input->post('message');
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n"); 			
			$this->email->from('noreply@frumcare.com', 'FRUMCARE');
			$this->email->to('info@frumcare.com');
			$this->email->reply_to($emaildata['email']);
			$this->email->subject('Help Needed');
			$this->email->message($this->load->view('emails/contactus', $emaildata, true));

			$this->email->send();
        
    }

	function sendemail($emaildata){            
           $adminemails = $this->common_model->getTicketAdmiEmails();
           foreach($adminemails as $adminemail):
           		$emails[]  = $adminemail['email1'];
           	endforeach;
		         $email_config = array(        
                    'mailtype'  => 'html',
                    'starttls'  => true,
                    'newline'   => "\r\n",
                    // 'protocol' => 'sendmail',
                    // 'charset'=> 'iso-8859-1', 
                ); 
               $this->load->library( 'email',$email_config);
               $this->email->from('info@frumcare.com','FRUMCARE');
               $this->email->to($emails);
               $this->email->subject('A new ticket has been submitted');
               $this->email->message($this->load->view('emails/ticketapproval', $emaildata, true));
               $this->email->send();
        }
}
?>
