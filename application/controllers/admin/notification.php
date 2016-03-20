<?php 
	if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Notification extends CI_Controller{
		public function __construct(){
			parent::__construct();

        if (!is_super()) {
            $this->session->set_flashdata('fail', 'Please sign in as an admin to access that page');
            redirect('admin/login');
        }
	        $this->load->model('admin/notification_model');
		}

		public function index(){

			$data = array(
				'main_content'  => 'admin/notification/index',
				'data'   		=> $this->notification_model->getAllNotification(),
				'title'			=> 'Notification Manager'
			);
			$this->load->view(BACKEND_TEMPLATE,$data);
		}

		public function add(){
			if(isset($_POST['save_admin_info'])){
				$this->notification_model->add();
				redirect('admin/notification','refresh');
				$this->session->flashdata('success', 'Notification added successfully.');
			}
			$data = array(
				'main_content' => 'admin/notification/add',
				'title'		   => 'Notification Manager',
				'pagetitle'	   => 'Add'

			);

			$this->load->view(BACKEND_TEMPLATE, $data);
		}

		public function edit($id = null){
			if(isset($_POST['save_admin_info'])){
				$this->notification_model->edit($id);
				redirect('admin/notification','refresh');
				$this->session->flashdata('success', 'Notification updated successfully');
			}
			$data = array(
				'main_content'	=> 'admin/notification/edit',
				'editData'		=> $this->notification_model->getById($id),
				'title'			=> 'Notification Manager',
				'pagetitle'		=> "Edit"
			);
			$this->load->view(BACKEND_TEMPLATE,$data);
		}

		public function delete($id = null){
			$this->notification_model->delete($id);
			$this->session->flashdata('success','Notification deleted successfully');
			redirect('admin/notification','refresh');
		}

		public function send($id= null){
			if(isset($_POST['save_admin_info'])){

				$notification_id 			= $_POST['notification_id'];
				$content  = $this->notification_model->getContentById($id);

				if(isset($_POST['notification_recepients'])) $notification_recepients = $_POST['notification_recepients'];
						if($notification_recepients!=''){
							$this->sendNotification($notification_recepients,$content);
							$this->session->flashdata('success', "Notification sent successfully.");
							redirect('admin/notification/send/'.$id, 'refresh');
						} 

				if(isset($_POST['group'])){
						foreach($_POST['group'] as $group):
							$notification_recepients[] = $this->notification_model->getAllNotificationReceivers($group);
						endforeach;
						for ($row = 0; $row < count($notification_recepients); $row++) {
						   for ($col = 0; $col < count($notification_recepients[$row]); $col++) {
						   	$this->sendNotification($notification_recepients[$row][$col]['address'], $content);
						   	$this->session->flashdata('success', "Notification sent successfully.");
						   	redirect('admin/notification/send/'.$id, 'refresh');
						   }
						}
				}
					

			}
			$data = array(
				'main_content'	=> 'admin/notification/send',
				'editData'		=> $this->notification_model->getById($id)
			);

			$this->load->view(BACKEND_TEMPLATE,$data);
		}

		public function get_emailaddress(){
			if(isset($_GET['term'])){
				$emailaddress = strtolower($_GET['term']);
				$this->notification_model->getEmail($emailaddress);
			}
		}

		public function sendNotification($receiver,$content){
			$email_config = Array(
		        'mailtype'  => 'html',
		        'starttls'  => true,
		        'newline'   => "\r\n"
   			 );
			$this->load->library('email',$email_config);
			
			$this->email->from('norepley@frumcare.com', 'FRUMCARE');
			$this->email->to($receiver);
			
			$this->email->subject($content['notification_title']);
			$this->email->message($content['notification_desc']);
			
			$this->email->send();
			
			//echo $this->email->print_debugger();
		}

		public function setasautoreplies($id = null){

			$data = array(
				'main_content'  => 'admin/notification/setasauto',
				'title'			=> 'Set as autoreplies',
				'emailtemplate' => $this->notification_model->getActiveEmailTemplate()
			);

			$this->load->view(BACKEND_TEMPLATE,$data);
		}

	}
?>
