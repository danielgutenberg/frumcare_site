<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Seniorcarecenter_model extends CI_Model {
	   public function __construct(){
			parent:: __construct();
		}
        public function getAllseniorcarecenter($latitude,$longitude,$limit,$start){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status = 1 AND tbl_userprofile.profile_status = 1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type = 16  order by tbl_user.id desc limit $start,$limit";
            $query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
            if($res){
			     return $res;
            }
			else{
                return false;
            }
		}
        public function searchbylocation($latitude,$longitude,$limit,$offset){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =16  order by distance asc";
			$query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
     public function sort($limit,$order){
        $sql = "SELECT * FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =16 limit $limit";
        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }        
   	public function search($postdata,$latitude,$longitude){
   	    
			$sql  = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.care_type=16 ";            
			if(!empty($postdata['language']) && $postdata['language'] !='undefined'){				
                 $language = explode(',',$postdata['language']);
                  if(is_array($language)){
                        foreach($language as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.language)"; 
  	                     }
                    }
            }
            if(!empty($postdata['extra_field']) && $postdata['extra_field'] !='undefined'){				
                 $extra_field = explode(',',$postdata['extra_field']);
                  if(is_array($extra_field)){
                        foreach($extra_field as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.extra_field)"; 
  	                     }
                    }
            }
            if(!empty($postdata['sub_care'])){
                $sql .= " and tbl_userprofile.sub_care = '".$postdata['sub_care']."'";
            }
			if(!empty($postdata['willing_to_work']) && $postdata['willing_to_work'] !='undefined'){				
                 $willing_to_work = explode(',',$postdata['willing_to_work']);
                  if(is_array($willing_to_work)){
                        foreach($willing_to_work as $data){
                            $data1 = mysql_real_escape_string($data);
                            $sql .= " and FIND_IN_SET('$data1',tbl_userprofile.willing_to_work)"; 
  	                     }
                    }
            }
            $sql .="  order by distance asc";
            //echo $sql;exit;    
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}

    public function count($lat,$lon){
      $sql  = "SELECT tbl_user.*, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type = 16 and tbl_user.lat like '%$lat%' and tbl_user.lng like '%$lon%'";
      $query  =  $this->db->query($sql);
      $res  = $query->num_rows();
      if($res){
           return $res;
      }else{
          return false;
      }
    }

	}
