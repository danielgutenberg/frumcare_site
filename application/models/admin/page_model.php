<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page_model extends CI_Model
{
    public function get_page()
    {
        $this->db->order_by('id','desc');
        $pages = $this->db->get('tbl_pages');
        if($pages->num_rows()>0)
        {
            return $pages->result_array();
        }
        else
        {
            return false;
        }
    }
    
    
    function get_page_by_slug($slug){
        $this->db->where(array('slug'=>$slug,'isPublished'=>1));
        $pages = $this->db->get('tbl_pages');
        return $pages->result_array();
    }
    
    
    public function get_parent_page()
    {
        $val = 0;
        $this->db->select('id,title');
        $parent = $this->db->get_where('tbl_pages',array('parent_id' => $val));
        
        if($parent->num_rows()>0)
        {
            return $parent->result_array();
        }
        else
        {
            return false;
        }
    }
    
    public function add_save($data)
    {
        $res = $this->db->insert('tbl_pages',$data);
        
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    //delete a page
    public function delete($id)
    {
        $res = $this->db->delete('tbl_pages',array('id'=>$id));
        return $res;
    }
    
    //get content of a page to edit
    public function edit_detail($id)
    {
        return $this->db->get_where('tbl_pages',array("id"=>$id))->result_array();
    }

    //get curretn image to unlink
    public function current_image($slug)
    {
        $this->db->select('cat_image');
        return $this->db->get_where('tbl_pages',array('slug'=>$slug))->result_array();
    }
    
    //update the new uploaded image name for the page
    public function new_image($slug,$data)
    {
        $this->db->where('slug',$slug);
        $this->db->update('tbl_pages',$data);
        return true;
    }
    public function edit_save($data,$slug)
    {
        $this->db->where('slug',$slug);
        $res = $this->db->update('tbl_pages',$data);
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function parent_order()
    {
        $this->db->select('id,title,slug,sort_order');
        $this->db->order_by('sort_order');
        $this->db->where('parent_id',0);
        $result = $this->db->get('tbl_pages');
        if($result->num_rows()>0)
        {
            return $result->result_array();
        }
        else
        {
            return null;
        }
    }
    
    public function child_order()
    {
        $this->db->select('id,title,slug,parent_id,sort_order');
        $this->db->order_by('sort_order');
        $this->db->where('parent_id != ',0);
        $result = $this->db->get('tbl_pages');
        if($result->num_rows()>0)
        {
            return $result->result_array();
        }
        else
        {
            return null;
        }
    }
    
    public function update_order($data,$where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pages',$data);
        return true;
    }
    
    public function check_title($title)
    {
        
        $res = $this->db->get_where('tbl_pages',array('title'=>$title));
        
        
        if($res->num_rows()>0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    function updatestatus($id,$value){
        $this->db->where(array('id'=>$id));
        $res=$this->db->update('tbl_pages',$value);
        
        }
    
}
