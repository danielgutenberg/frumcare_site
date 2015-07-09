<?php 
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Payment extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('admin/payment_model');
		$this->load->model('email_template_model');
		$this->load->model('common_model');
	}

	public function index(){
		$data['details']      =  $this->payment_model->getAllPaymentDetails();
		$data['main_content'] ='admin/payment/index';
		$data['title']        = 'Payment Manager';
	    $this->load->view('admin/includes/template',$data);
	}

	public function edit($id=null){
		$id = $this->uri->segment(4);

		if(isset($_POST['save'])){
			$this->payment_model->edit($id);
			$this->session->set_flashdata('info','Payment updated Successfully');
			redirect('admin/payment/index','refresh');
		}
		
		$data['details'] 		= $this->payment_model->getDetails($id);
		$data['next'] 			=  $this->payment_model->getNext($id);
		$data['prev'] 			=  $this->payment_model->getPrevious($id);
		$data['main_content'] 	='admin/payment/edit';
		$data['title']      	= 'Payment Manager';
		$data['pagetitle']		= 'Edit';
		$this->load->view('admin/includes/template',$data);
		
	}

	public function delete($id = null){
		$id = $this->uri->segment(4);
		if($id){
			$this->payment_model->delete($id);
			$this->session->flashdata('info','Payment deleted successfully');
			redirect('admin/payment/index','refresh');
		}
	}

	public function updatepaymentstatus($id = null){
		$id = $this->uri->segment(4);
		if($id){
			$this->payment_model->changestatus($id);
			redirect('admin/payment/edit/'.$id);
		}
	}

	public function sendinvoice($id  = null){
		$id = $this->uri->segment(4);
		$invoice_number = $this->payment_model->getInvoiceNumber($id);
		$username = $this->payment_model->getUsername($invoice_number['user_id']);
		$template = $this->email_template_model->getEmailTemplateBySlug('send-invoice');
		$name 		= str_replace('{username}', $username['first_name'], $template['content']);
		$message	= str_replace('{invoice_number}', $invoice_number['invoice_number'], $name);
		$res = $this->common_model->sendemail($username['email'],$template['subject'],$message);
		if($res){
			$this->session->set_flashdata('info', 'Invoice detail email sent successfully.');
			redirect('admin/payment/edit/'.$id,'refresh');
		}
		
	}


	public function sendinvoiceremainder($id = null){
		$id = $this->uri->segment(4);
		$invoice_number = $this->payment_model->getInvoiceNumber($id);
		$userdetail = $this->payment_model->getUsername($invoice_number['user_id']);
		$template = $this->email_template_model->getEmailTemplateBySlug('send-invoice-remainder');
		$name 		= str_replace('{username}', $userdetail['first_name'], $template['content']);
		$message	= str_replace('{invoice_number}', $invoice_number['invoice_number'], $name);

		$res = $this->common_model->sendemail($userdetail['email'],$template['subject'],$message);
		if($res){
			$this->session->set_flashdata('info', 'Invoice Remainder email sent successfully.');
			redirect('admin/payment/edit/'.$id,'refresh');
		}

	}

	public function markascomplete($id = ''){
		$this->payment_model->markascomplete($id);
		$this->session->flashdata('success','Transaction has been marked as complete');
		redirect('admin/payment/edit/'.$id, 'refresh');
	}

	public function issuerefund($id = ''){
		$this->payment_model->issuerefund($id);
		$this->session->flashdata('success', 'Transaction has been issue refunded');
		redirect('admin/payment/edit/'.$id,'refresh');
	}

	public function pay($id = ''){
		$data = array(
			'recordData'	=> $this->payment_model->getPaymentDetails($id),
			'main_content' 	=> 'admin/payment/pay',
			'title'			=> 'Payment Manager',
			'pagetitle'		=> 'Pay'
		);
		$this->load->view('admin/includes/template',$data);
	}

	public function save($id = ''){
		if(isset($_POST['save_admin_info'])){
			$this->payment_model->save();
			$this->session->flashdata('success','Payment Saved Successfully');
			redirect('admin/payment','refresh');
		}
	}

}
?>
