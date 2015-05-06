<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emailtemplate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_model');
        if(!$this->session->userdata('admin_username'))
        {
            redirect('admin/login');
        }
        $this->load->model('admin/emailtemplate_model');
     }
     
     public function index()
     {
        $data['emailtemplate']  = $this->emailtemplate_model->get_emailtemplate();
        $data['main_content']   = "admin/emailtemplate/emailtemplate_view";
        $data['title']          = 'Email Template Manager';

        $this->load->view('admin/includes/template',$data);
     }
     
     
     public function add()
     {
        
        $data['main_content'] = "admin/emailtemplate/add_edit_emailtemplate";
        $data['title']        = 'Email Template Manager';
        $data['pagetitle']   = 'Add Email Template';
        $this->load->view('admin/includes/template',$data);
     }
     
     public function edit($id)
     {
        $data['detail'] = $this->emailtemplate_model->edit_detail($id);
        
        $data['main_content'] = "admin/emailtemplate/add_edit_emailtemplate";
        $data['title']        = 'Email Template Manager';
        $data['pagetitle']   = 'Edit Email Template';
        $this->load->view('admin/includes/template',$data);
        
     }
     
     
     
     public function delete($id)
     {
        $res = $this->emailtemplate_model->delete($id);
        if($res)
        {
            $this->session->set_flashdata('info',"Information Deleted Successfully");
            redirect('admin/emailtemplate');
        }
     }
     
     
     public function add_save()
     {
        if(!$this->input->post('add_emailtemplate'))
        {
            redirect('admin/emailtemplate/add');
        }
        else
        {
                $post = $this->input->post();
                
                $data = array(
                            "title"         => $post['title'],
                            "subject"       => $post['subject'],
                            "content"       => $post['content'],
                            "isActive"      => $post['isActive'],
                            'slug'          => url_title($post['title'], 'dash', true),
                            'sender_email'  => $post['sender_email']
                        );
                
                $insert = $this->emailtemplate_model->add_save($data);
                
                if($insert)
                {

                    $this->session->set_flashdata('info',"Information Added Successfully");
                    redirect('admin/emailtemplate');
                }
                else
                {
                    $this->session->set_flashdata('info',"Failed to Add New Information");
                    redirect('admin/emailtemplate');
                }
            }
        }
     
     
     function edit_save()
     {
        
        
        if(!$this->input->post('add_emailtemplate'))
        {
            redirect('admin/emailtemplate');
        }
        else
        {
            $id = $this->input->post('id');
                
                //  Update the content 
                $post = $this->input->post();
                
                $data = array(
                                "title"         => $post['title'],
                                "subject"       => $post['subject'],
                                "content"       =>$post['content'],
                                "isActive"      =>$post['isActive'],
                                "sender_email"  => $post['sender_email']
                                );
                

        $update = $this->emailtemplate_model->edit_save($data,$id);
        
        if($update)
        {
                    
            $this->session->set_flashdata('info',"Information Updated Successfully");
            redirect('admin/emailtemplate');
        }
        else
        {
            $this->session->set_flashdata('info',"Failed to Update Information");
            redirect('admin/emailtemplate');
        }
    
        }
     }
     
     public function updatestatus(){
        $id=$this->input->post('id');
        $val=$this->input->post('value');
        $value=array('isPublished'=>$val);
        $res = $this->emailtemplate_model->updatestatus($id,$value);
        
     }

     public function createclone($id){
        $id = segment(4);
        $template = $this->emailtemplate_model->edit_detail($id);
        if($template[0]['title']!=''){
            $checktemp_name = $this->emailtemplate_model->checkname($template[0]['title']);
            if($checktemp_name['title']!=''){
                $num = count($checktemp_name);
                $name['template'] = $template[0]['title'].'_0'.$num;
            }
        }
        $clonedata = array(
                'title'     => $name['template'],
                'slug'      => url_title($name['template'],'dash',true),
                'subject'   => $template[0]['subject'],
                'content'   => $template[0]['content'],
                'isActive'  => $template[0]['isActive'],
                'sender_email'  => $template[0]['sender_email'],
            );
        $this->db->insert('tbl_email_templates',$clonedata);
        redirect('admin/emailtemplate','refresh');
        $this->session->set_flashdata('info', 'Email template cloned successfully. Please rename it by editing the title for further use');

     }

     public function send($id=''){
        $message        = $this->emailtemplate_model->getContentById($id);

        $subject        = $message['subject'];
        $content        = $message['content'];
        $senderemail    = $message['sender_email'];
        $receiveremail  = array('santosh@access-keys.com','ambika@access-keys.com');

        $data = array(
                'email_subject' => $subject,
                'email_content' => $content,
                'sent_by'       => $senderemail,
                'sent_to'       => $receiveremail,
                'sent_date'     => date('Y-m-d')
            );

        $this->emailtemplate_model->addlogs($data);

        $config = array (
            'mailtype' => 'html',
            'charset'  => 'utf-8',
            'priority' => '1'
        );

         $this->load->library('email',$config);
        
         $this->email->from($senderemail, 'FRUMCARE');
         $this->email->to($receiveremail);
        
        
         $this->email->subject($subject);
         $this->email->message($content);
        
         $this->email->send();
        
         //echo $this->email->print_debugger();
     }
     
     
}