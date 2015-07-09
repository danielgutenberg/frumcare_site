<?php
class Package_model extends CI_Model
{
    function get_all_packages(){
        return $this->db->get('tbl_packages')->result_array();
    }
    
    function get_all_active_features(){
        return $this->db->get_where('tbl_features')->result_array();
    }
    
    function get_package_features($id){
        return $this->db->get_where('tbl_packages_features',array('package_id'=>$id))->result_array();
    }
    
    function add_save(){
        $post=$this->input->post();
        var_dump($post);exit;
        $data = array(
                        'package_name'      =>$post['package_name'],
                        'package_price'     =>$post['package_price'],
                        'package_duration'  =>$post['package_duration'],
                        'duration_time'     =>$_post['duration_time']
                    );
            
            $res = $this->db->insert('tbl_packages',$data);
            if($res){
                $package_id = $this->db->insert_id();
                $features = $post['package_features'];
                foreach($features as $pf)
                {
                    $data1 = array();
                    $data1['package_id'] = $package_id;
                    $data1['feature_id'] = $pf;
                    $this->db->insert('tbl_packages_features',$data1);
                }
                return true;
            }
            else{
                return null;
            }
    }

    function edit($id){
        $res = $this->db->get_where('tbl_packages',array('id'=>$id));
        return $res->row_array();
    }

    function edit_save(){
        $post=$this->input->post();
        $id = $post['id']; 
        $data['package_name']       = $post['package_name'];
        $data['package_price']      = $post['package_price'];
        $data['package_duration']   = $post['package_duration'];
        $data['duration_time']      = $post['duration_time'];
        
        $this->db->where('id',"$id");
        $res = $this->db->update('tbl_packages',$data);
        if($res){
            $package_id = $id;
            $features = $post['package_features'];
            $this->db->where('package_id',$package_id);
            $this->db->delete('tbl_packages_features');
            foreach($features as $pf){
                $data1 = array();
                $data1['package_id'] = $package_id;
                $data1['feature_id'] = $pf;
                $this->db->insert('tbl_packages_features',$data1);
            }
            return "updated";
        }
        else{
            return null;
        }
    }

    function delete($id){
        $res = $this->db->delete('tbl_packages',array('id' => $id));
        if($res){
            $res1 = $this->db->delete('tbl_packages_features',array('package_id' => $id));
            return true;
        }
        else{
            return null;
        }
    }

    function getAllPackages(){
        $sql        = "select * from tbl_packages";
        $query      = $this->db->query($sql);
        $res        = $query->result_array();
        if($res){
            return $res;
        }else{
            return false;
        }
    }
}//Model Close
