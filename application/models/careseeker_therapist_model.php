<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Careseeker_therapist_model extends CI_Model {
	   public function __construct(){
			parent:: __construct();
		}
        public function getAlltherapist($latitude,$longitude,$limit,$offset){
		  	$sql 	= "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance  FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 2 AND tbl_userprofile.care_type = 23  order by distance asc limit $offset,$limit";
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
		  	$sql 	= "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 2 AND tbl_userprofile.care_type =23   order by distance asc";
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
   	    
			$sql  = "select *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance  from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_userprofile.care_type=23 ";           
           	if(!empty($postdata['gender_of_caregiver']) && $postdata['gender_of_caregiver'] !='undefined'){				
                $sql .= " and tbl_userprofile.gender_of_caregiver=".$postdata['gender_of_caregiver'];
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
			$sql 	= "SELECT *FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 2 AND tbl_userprofile.care_type = 23 and tbl_user.lat like '$lat' and tbl_user.lng like '%$lon%'";
            $query 	=  $this->db->query($sql);
			$res 	= $query->num_rows();
            if($res){
				return $res;
            }
			else{
                return false;
            }
		}
	   
	}
