<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Careseeker_seniorcarefacility_model extends CI_Model {
	   public function __construct(){
			parent:: __construct();
		}
        public function getAllseniorcarefacility($latitude,$longitude,$limit,$offset){
  		  	$sql 	= "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance  FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =26    order by distance asc limit $offset,$limit";
          $query 	=  $this->db->query($sql);
  			  $res 	= $query->result_array();
          if($res){
			      return $res;
          }else{
              return false;
          }
		}
          public function searchbylocation($latitude,$longitude){
		  	$sql 	= "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =26  order by distance asc";
            $query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
            if($res){
                //echo "<pre>";print_r($res);exit;
			     return $res;
            }
			else{
                return false;
            }
		}
        public function search($postdata,$latitude,$longitude){
   	    
			$sql  = "select *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance  from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.care_type=26 ";            
			if(!empty($postdata['age_group']) && $postdata['age_group'] !='undefined'){				
                 $age_group = explode(',',$postdata['age_group']);
                  if(is_array($age_group)){
                        foreach($age_group as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.age_group)"; 
  	                     }
                    }
            }
			if(!empty($postdata['looking_to_work']) && $postdata['looking_to_work'] !='undefined'){				
                 $looking_to_work = explode(',',$postdata['looking_to_work']);
                  if(is_array($looking_to_work)){
                        foreach($looking_to_work as $data){
                            $data1 = mysql_real_escape_string($data);
                            $sql .= " and FIND_IN_SET('$data1',tbl_userprofile.looking_to_work)"; 
  	                     }
                    }
            }
            if(!empty($postdata['rate']) && $postdata['rate'] !='undefined'){
                $sql .= " and tbl_userprofile.rate ='".$postdata['rate'] ."'";
            }
            if(!empty($postdata['rate_type']) && $postdata['rate_type'] !='undefined'){
                $rates =  explode(',', $postdata['rate_type']);
                if(is_array($rates)){
                    foreach ($rates as $rate) {
                      $sql .= " and FIND_IN_SET('$rate',tbl_userprofile.rate_type)"; 
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

    public function count($lat,$lon){
        $sql  = "SELECT *FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =26  and tbl_user.lat like '%$lat%' and tbl_user.lng like '%$lon'";
        $query  =  $this->db->query($sql);
        $res  = $query->num_rows();
        if($res){
            return $res;
        }else{
              return false;
        }
    }
	   
	}