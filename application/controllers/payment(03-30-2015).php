<?php 
if(! defined('BASEPATH'))exit('No direct script access allowed');
class Payment extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('payment_model');
		$this->load->model('package_model');
		$this->load->model('email_template_model');
		$this->load->model('user_model');
		$this->load->library('breadcrumbs');
	}
	public function checkpaymentstatus(){
		if(isset($_POST)){
			$id = $_POST['id'];
			$res = $this->payment_model->getPaymentByUserId($id);
			if($res){
				echo '1';
			}else{
				echo '0';
			}
		}
	}

	public function upgrademembership(){

		$data['packages'] 	=	$this->package_model->getAllPackages();
		$data['main_content']  = 'frontend/payment/upgrade';
		$data['title']		   =  'Upgrade Membership';	
		$this->load->view(FRONTEND_TEMPLATE, $data);

	}

	public function save(){
		$data[] = $_POST;
		$data[] = $_GET;
		$this->load->library('email');
		
		$this->email->from('info@frumcare.com', 'FRUMCARE');
		$this->email->to('kiran@access-keys.com');
		
		
		$this->email->subject('paypaltesting');
		$this->email->message($this->load->view('frontend/email/paypaltest_email',array('data'=>$data),true));
		
		$this->email->send();
		
		//echo $this->email->print_debugger();


		if(isset($_POST['save'])){
			//  get template and others
			$template 		= $this->email_template_model->getEmailTemplateBySlug('upgrade-package');
			$userdetails 	= $this->user_model->getUserName($_POST['user_id']);
			$packagedetails = $this->package_model->getPackageName($_POST['package']);	 

			
			$name 		= $userdetails['name'];
			$packageid 	= $_POST['package'];

			// save data to database
			$data = array(
				'package_name' 	=> $packagedetails['package_name'],
				'user_name'	 	=> $name,
				'created_date'	=> date('Y-m-d'),
				'package_amount'=> $packagedetails['package_price'],
				'user_id'		=> $_POST['user_id'],
				'profile_id'	=> $_POST['profile_id'],
				'invoice_number' => 'INV-'.rand()
			);



			$this->session->set_userdata($data);
			
			// find and replace
			$message 		= str_replace('{username}',$userdetails['name'],$template['content']);
			$finalmessage	= str_replace('{package_name}', $packagedetails['package_name'], $message);

			$q = $this->db->insert('tbl_payments',$data);

			// update tbl_userprofile and send email from here.
			if($q){
				$this->db->where(array('user_id'=>$data['user_id'],'care_type'=>$data['profile_id']));
			  	$this->db->update('tbl_userprofile',array('package_id'=>$packageid));	

			  	// send email
				$config = array ('mailtype' => 'html','charset'  => 'utf-8','wordwrap' => true);
				$this->load->library('email',$config);			
				$this->email->from('info@frumcare.com', 'FRUMCARE');
				$this->email->to($userdetails['email']);
				$this->email->subject($template['subject']);
				$this->email->message($finalmessage);			
				$this->email->send();
				
				redirect('payment/pay','refresh');
			}

			
		}
	}

	public function pay(){
		$data = array(
			'main_content' => 'frontend/payment/pay',
			'title'		   => 'Pay from here',		
		);

		$this->load->view(FRONTEND_TEMPLATE,$data);
	}

}
?>