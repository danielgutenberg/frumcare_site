<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Careseeker_babysitter_model extends CI_Model {
	   public function __construct(){
			parent:: __construct();
		}
        public function getAllBabySitter($latitude,$longitude,$limit,$start){
		  	$sql 	= "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 2 AND tbl_userprofile.care_type =17  order by distance asc limit $start,$limit";
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
        public function searchbylocation($latitude,$longitude){
            $sql 	= "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 2 AND tbl_userprofile.care_type =17 HAVING distance < 50 order by distance asc";                              
            $query 	=  $this->db->query($sql);
			  $res 	= $query->result_array();
            if($res){
                
			     return $res;
            }
			else{
                return false;
            }
		}
    public function record_count(){
        $sql 	= "SELECT * FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 2 AND tbl_userprofile.care_type =17 order by tbl_user.id desc";
		$query 	=  $this->db->query($sql);
		return $query->num_rows();
	}
     public function sort($latitude,$latitude,$limit,$start){
        $sql = "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 2 AND tbl_userprofile.care_type =17 order by distance asc limit $start,$limit";
        $query   = $this->db->query($sql);
        $res     = $query->result_array();
        if($res)
            return $res;
        else 
            return false;
    }        
   	public function search($postdata,$latitude,$longitude){   	    
			$sql  = "select *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance  from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.care_type=17 ";			
            if(!empty($postdata['morenum']) && $postdata['morenum'] !='undefined'){				
                 $optional_number = explode(',',$postdata['morenum']);
                  if(is_array($optional_number)){
                        foreach($optional_number as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.optional_number)"; 
  	                     }
                    }
            }
			if(!empty($postdata['age_group']) && $postdata['age_group'] !='undefined'){				
                 $age_group = explode(',',$postdata['age_group']);
                  if(is_array($age_group)){
                        foreach($age_group as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.age_group)"; 
  	                     }
                    }
            }
           	if(!empty($postdata['number_of_children']) && $postdata['number_of_children'] !='undefined'){				
                 $number_of_children = explode(',',$postdata['number_of_children']);
                  if(is_array($number_of_children)){
                        foreach($number_of_children as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.number_of_children)"; 
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
			if(!empty($postdata['availability']) && $postdata['availability'] !='undefined'){				
                 $availability = explode(',',$postdata['availability']);
                  if(is_array($availability)){
                        foreach($availability as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.availability)"; 
  	                     }
                    }
            }
            if(!empty($postdata['rate']) && $postdata['rate'] !='undefined'){
                $sql .= " and tbl_userprofile.rate =".$postdata['rate'];
            }
//            if(!empty($postdata['rate_type']) && $postdata['rate_type'] !='undefined'){
//                $sql .= " and tbl_userprofile.rate_type =".$postdata['rate_type'];
//            }
			if(!empty($postdata['rate_type']) && $postdata['rate_type'] !='undefined'){				
                 $rate_type = explode(',',$postdata['rate_type']);
                  if(is_array($rate_type)){
                        foreach($rate_type as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.rate_type)"; 
  	                     }
                    }
            }
            if(!empty($postdata['start_date']) && $postdata['start_date'] !='undefined'){
                $sql .= " and tbl_userprofile.start_date ='".$postdata['start_date']."'";
            }
            // $sql .="  order by distance asc";
            
            //echo $sql;exit;    
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}   
	}