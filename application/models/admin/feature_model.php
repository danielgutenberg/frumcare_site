<?php
class Feature_model extends CI_Model{

    public function __construct(){
        parent:: __construct();
    }

    function get_all_features(){
        return $this->db->get('tbl_features')->result_array();
    }
    
    function add_save(){
        $post=$this->input->post();
        $data = array(
            'feature_name'  => $post['feature_name'],
            'package'       => $post['package']
            );
            
            $res = $this->db->insert('tbl_features',$data);
            if($res)
            {
                return true;
            }
            else
            {
                return null;
            }
    }

    function edit($id){
        $res = $this->db->get_where('tbl_features',array('id'=>$id));
        return $res->row_array();
    }

    function edit_save(){

        $post=$this->input->post();
        $id = $post['id']; 

        $data['feature_name']  = $post['feature_name'];
        $data['package']       = $post['package'];
        
        $this->db->where('id',"$id");
        $res = $this->db->update('tbl_features',$data);
        if($res){
            return "updated";
        }
        else{
            return null;
        }
    }

    function delete($id){
        $res = $this->db->delete('tbl_features',array('id' => $id));
        if($res){
            return true;
        }
        else{
            return null;
        }
    }

}//Model Close