<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emailtemplate_model extends CI_Model
{
    public function get_emailtemplate()
    {
        $this->db->order_by('id','desc');
        $this->db->where('isActive',1);
        $emails = $this->db->get('tbl_email_templates');
        if($emails->num_rows()>0)
        {
            return $emails->result_array();
        }
        else
        {
            return false;
        }
    }
    
    
    
    public function add_save($data){
        $res = $this->db->insert('tbl_email_templates',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }
   
    //delete a email
    public function delete($id)
    {
        $res = $this->db->delete('tbl_email_templates',array('id'=>$id));
        return $res;
    }
    
    //get content of a email to edit
    public function edit_detail($id){
        return $this->db->get_where('tbl_email_templates',array("id"=>$id))->result_array();
    }
    //get curretn image to unlink
    
    public function edit_save($data,$id){
        $this->db->where('id',$id);
        $res = $this->db->update('tbl_email_templates',$data);
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    

    function updatestatus($id,$value){
        $this->db->where(array('id'=>$id));
        $res=$this->db->update('tbl_email_templates',$value);
        
   }

   public function checkname($title){
        $sql = "select title from tbl_email_templates where title = '$title'";
        $query  = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;
        else return false;
   }

   public function getContentById($id){
        $sql   = "select * from tbl_email_templates where id = $id";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        if($res) return $res;
        else return false;
   }

   public function addlogs($data){
        foreach($data['sent_to'] as $sender):
            $data['sent_to'] = $sender;
            $this->db->insert('tbl_email_logs',$data);
        endforeach;
   }

    
}
