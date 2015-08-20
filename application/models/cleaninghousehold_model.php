<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Cleaninghousehold_model extends CI_Model {
	   public function __construct(){
			parent:: __construct();
		}
        public function getAllcleaninghousehold($latitude,$longitude,$limit,$start){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =15  order by distance asc limit $start,$limit";
            $query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
            if($res){
			     return $res;
            }
			else{
                return false;
            }
		}
           public function searchbylocation($latitude,$longitude){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 1 AND tbl_userprofile.care_type =15  order by distance asc";
			$query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
     public function sort($limit,$order){
        $sql = "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =15  order by distance asc limit $limit";
        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }        
   	public function search($postdata,$latitude,$longitude){
   	    
			$sql  = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.photo_status = 1 and tbl_userprofile.account_category=3 and tbl_userprofile.care_type=15 ";
			if(!empty($postdata['looking_to_work']) && $postdata['looking_to_work'] !='undefined'){				
                 $looking_to_work = explode(',',$postdata['looking_to_work']);
                  if(is_array($looking_to_work)){
                        foreach($looking_to_work as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.looking_to_work)"; 
  	                     }
                    }
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
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}	   
	}
