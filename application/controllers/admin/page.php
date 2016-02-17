<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_model');
        if (!is_super()) {
            $this->session->set_flashdata('fail', 'Please sign in as an admin to access that page');
            redirect('admin/login');
        }
        $this->load->model('admin/page_model');
     }
     
     public function index()
     {
        $data['page']           = $this->page_model->get_page();
        $data['parents']        = $this->page_model->get_parent_page();
        $data['main_content']   = "admin/page/page_view";
        $data['title']          = "Page Manager";
        $this->load->view('admin/includes/template',$data);
     }
     
     
     public function add()
     {
        $data['page']           = $this->page_model->get_parent_page();
        $data['main_content']   = "admin/page/add_edit_page";
        $data['title']          = 'Page Manager';
        $data['pagetitle']      = "Add Page";
        $this->load->view('admin/includes/template',$data);
     }
     
     public function edit($id)
     {
        $data['detail']         = $this->page_model->edit_detail($id);
        $data['page']           = $this->page_model->get_parent_page();
        $data['main_content']   = "admin/page/add_edit_page";
        $data['title']          = 'Page Manager';
        $data['pagetitle']      = 'Edit Page';
        $this->load->view('admin/includes/template',$data);
        
     }
     
     public function delete($id)
     {
        $res = $this->page_model->delete($id);
        if($res)
        {
            $this->session->set_flashdata('info',"Page Deleted Successfully");
            redirect('admin/page');
        }
     }
     
     //creating the slug
    function slug($str)
    {
        //Unwanted: {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($str);
        //Strip any unwanted characters
        $string = preg_replace('/[^a-z0-9_\s-]/', '', $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace('/[\s-]+/', ' ', $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace('/[\s_]/', '-', $string);
        
        $counter=0;
        $check = $this->check_slug($string);
        while($check)
        {
            $counter++;
            $slug1 = $string.'-'.$counter;
            
            $check = $this->check_slug($slug1);
        }
        
        if(isset($slug1))
        {
            $string = $slug1;
        }
        return $string;
    }
    //checking the slug
    function check_slug($slug)
    {
        $this->db->where('slug',$slug);
        $query = $this->db->get('tbl_pages');
        $slugnumber = $query->num_rows();
        if($slugnumber>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
     
     public function add_save()
     {
        if(!$this->input->post('add_page'))
        {
            redirect('admin/page/add');
        }
        else
        {
            
                
                $post = $this->input->post();
                $name = $post['page_name'];
                $data = array(
                                "title" => $post['page_name'],
                                "content"=>$post['page_desc'],
                                "parent_id"=>$post['parent_page'],
                                "isPublished"=>$post['isPublished'],
                                "sort_order"=>0,
                                "seo_meta_title"=>$post['meta_title'],
                                "seo_meta_keywords"=>$post['meta_keywords'],
                                "seo_meta_description"=>$post['meta_desc'],
                                "slug"=>$this->slug($name)
                                );
                
                $insert = $this->page_model->add_save($data);
                
                if($insert)
                {
                    $this->session->set_flashdata('info',"New Page Added Successfully");
                    redirect('admin/page');
                }
                else
                {
                    $this->session->set_flashdata('info',"Failed to Add New Page");
                    redirect('admin/page');
                }
            }
        }
     
     
     function edit_save()
     {
        
        
        if(!$this->input->post('add_page'))
        {
            $slug = $this->input->post('slug');
            
            redirect('admin/page/edit'."/$slug");
        }
        else
        {
            $slug = $this->input->post('slug');
            
            
         
                
                
                //  Update the content 
                $post = $this->input->post();
                $name = $post['page_name'];
                $data = array(
                                "title" => $post['page_name'],
                                "content"=>$post['page_desc'],
                                "parent_id"=>$post['parent_page'],
                                "isPublished"=>$post['isPublished'],
                                "seo_meta_title"=>$post['meta_title'],
                                "seo_meta_keywords"=>$post['meta_keywords'],
                                "seo_meta_description"=>$post['meta_desc'],
                                "slug"                => $this->slug($post['page_name'])  
                                 );
                
        
        
         $to_check=  $this->input->post('page_name');
         $slug_to_check=$this->only_slug($to_check);
         
        $this->db->where('slug',$slug_to_check);
        $query = $this->db->get('tbl_pages')->result_array();
        if(count($query)>0)
        {
            if($slug_to_check==$query[0]['slug'])
            {
                $data['slug']= $slug;
            }
            else
            {
                    $data['slug']= $this->slug($name);
            }
        }  
        //print_r($_POST);
        $update = $this->page_model->edit_save($data,$slug);
        
        if($update)
        {
            $this->session->set_flashdata('info',"Page Updated Successfully");
            redirect('admin/page');
        }
        else
        {
            $this->session->set_flashdata('info',"Failed to Update page");
            unlink('images/page/'.$name);
            unlink('images/page/thumbs'.$name);
            redirect('admin/page');
        }
    
        }
     }
     
     
     function check_title()
     {
        $name = $this->input->post('name');
        $res = $this->page_model->check_title($name);
        echo $res;
     }
     
     public function updatestatus(){
        $id=$this->input->post('id');
        $val=$this->input->post('value');
        $value=array('isPublished'=>$val);
        $res = $this->page_model->updatestatus($id,$value);
        
     }
     
     
     function only_slug($str){
        //Unwanted: {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($str);
        //Strip any unwanted characters
        $string = preg_replace('/[^a-z0-9_\s-]/', '', $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace('/[\s-]+/', ' ', $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace('/[\s_]/', '-', $string);
        
        return $string;
     }
}
