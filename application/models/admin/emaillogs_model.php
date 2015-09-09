<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emaillogs_model extends CI_Model
{
    public function get_emaillogs()
    {
        $this->db->order_by('id','desc');
        $emails = $this->db->get('tbl_email_logs');
        if($emails->num_rows()>0)
        {
            return $emails->result_array();
        }
        else
        {
            return false;
        }
    }
    
    //delete a email
    public function view_detail($id)
    {
        return $this->db->get_where('tbl_email_logs',array('id'=>$id))->result_array();
    }
    
    //delete a email
    public function delete($id)
    {
        $res = $this->db->delete('tbl_email_logs',array('id'=>$id));
        return $res;
    }


    public function addEmailLog($data){
        $table="tbl_email_logs";
        return $this->db->insert($table,$data);

    }
}
