<?php
class Common_care_model extends CI_Model
{
      public function sort($per_page,$latitude,$longitude,$option,$account_category,$care_type,$distance){                                        
        $order_type = 'asc';
        if($option == 'tbl_userprofile.id'){
            $order_type = 'desc';
        }        
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance,tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id  WHERE tbl_user.status = 1 and tbl_userprofile.profile_status = 1 ";        
        if($care_type!=''){
            $sql.=" and tbl_userprofile.care_type = $care_type";
        }
        else{
           if($account_category==1){
                $sql.=" and tbl_userprofile.care_type < 10";
           }
           if($account_category==2){
                $sql.=" and tbl_userprofile.care_type >16 and tbl_userprofile.care_type < 25";
           }            
        }
        if($distance != "unlimited"){
            $sql.=" having distance <= $distance";
        }
        $sql.= " order by $option $order_type limit 0,$per_page";        
        $query = $this->db->query($sql);
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    public function paginate($position,$item_per_page,$latitude,$longitude,$option,$account_category,$care_type,$distance){
        $order_type = 'asc';
        if($option == 'tbl_userprofile.id'){
            $order_type = 'desc';
        }        
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance,tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id  WHERE tbl_user.status = 1 and tbl_userprofile.profile_status = 1 ";
        if($care_type!=''){
            $sql.=" and tbl_userprofile.care_type = $care_type";
        }
        else{
           if($account_category==1){
                $sql.=" and tbl_userprofile.care_type < 10";
           }
           if($account_category==2){
                $sql.=" and tbl_userprofile.care_type >16 and tbl_userprofile.care_type < 25";
           }            
        }
        if($distance != "unlimited"){
            $sql.=" having distance <= $distance";
        }
        $sql.= " order by $option $order_type limit $position,$item_per_page";       
        $query = $this->db->query($sql);
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    public function getCount($latitude,$longitude,$account_category,$care_type,$distance){                
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance,tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id  WHERE tbl_user.status = 1 and tbl_userprofile.profile_status = 1 ";
        if($care_type!=''){
            $sql.=" and tbl_userprofile.care_type = $care_type";
        }
        else{
           if($account_category==1){
                $sql.=" and tbl_userprofile.care_type < 10";
           }
           if($account_category==2){
                $sql.=" and tbl_userprofile.care_type >16 and tbl_userprofile.care_type < 25";
           }                       
        }
        if($distance != "unlimited"){
            $sql.=" having distance <= $distance";
        }                        
        $query = $this->db->query($sql);        
        return $query->num_rows();
                
    }
}