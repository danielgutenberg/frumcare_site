<?php 
	if(!defined('BASEPATH'))exit('No direct script access allowed');
	class Tutor_model extends CI_model{
		public function __construct(){
			parent:: __construct();
		}

		public function getAllTutors($latitude,$longitude,$limit,$offset){
			$sql = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join  tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status=1 and tbl_userprofile.account_category=1 and tbl_userprofile.care_type=4  order by distance asc limit $offset,$limit";
            $query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
		   public function searchbylocation($latitude,$longitude){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 1 AND tbl_userprofile.care_type =4  order by distance asc";
			$query 	=  $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
		public function search($search,$latitude,$longitude){
		if(is_array($search)){
			$care_type  		= $search['care_type'];
			$neighbour 			= $search['neighbour'];
			$caregiverage_from 	= $search['caregiverage_from'];
			$caregiverage_to 	= $search['caregiverage_to'];
			$gender 			= $search['gender'];
			$language 			= $search['language'];
			$observance 		= $search['observance'];
			$min_exp 			= $search['min_exp'];
			$availability		= $search['availability'];
			$subjects 			= $search['subjects'];
            $start_date         = $search['start_date'];
		}

		$sql = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join  tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.profile_status=1 and  tbl_userprofile.care_type=4";	
        if($search['smoker']!=''){
				    $sql .= " and tbl_userprofile.smoker=".$search['smoker'];
        }
        if($search['gender'] && $search['gender'] != 3 ){                
        			     $sql .=" and tbl_user.gender=".$search['gender'];
        			} 
		if($search['caregiverage_from'] && $search['caregiverage_to']){
                $sql .= " and tbl_user.age between ".$search['caregiverage_from'].' and '.$search['caregiverage_to'];
        }

		if($gender!=''){
			$sql .=" and tbl_user.gender=$gender";
		}

		if($language!=''){
			$languages = explode(',',$language);
			if(is_array($languages)){
				foreach($languages as $lang):
					$sql .= " and find_in_set('$lang',tbl_userprofile.language)";
				endforeach;
			}

		}

		if($observance!=''){
			$observances = explode(',',$observance);
			if(is_array($observances)){
				foreach($observances as $obs):
					$sql .= " and find_in_set('$obs',tbl_userprofile.religious_observance)";
				endforeach;
			}

		}

		if($min_exp!=''){
			$sql .= " and tbl_userprofile.experience >= $min_exp";
		}

		if($availability!=''){
			$times = explode(',',$availability);
			if(is_array($times)){
				foreach($times as $time):
					$sql .=" and find_in_set('$time',tbl_userprofile.availability)";
				endforeach;
			}
		}

		if($subjects!=''){
			$subject = explode(',', $subjects);
				if(is_array($subject)){
					foreach ($subject as $sub):
						$sql .= " and find_in_set('$sub',tbl_userprofile.subjects)";
					endforeach;
				}
		}
        if($start_date!='')
				$sql .= " and tbl_userprofile.start_date='".$start_date."'";
		$sql .="  order by distance asc";
        //echo $sql;exit;
		$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;

		}

		public function countTutor($lat,$lon){
			$sql = "select * from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_user.status = 1 and tbl_userprofile.care_type !=7 and tbl_userprofile.account_category = 1 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$lat%' and tbl_user.lng like'%$lon%' and tbl_userprofile.care_type = 4";
	        $query  = $this->db->query($sql);
	        $res = $query->num_rows();
	        if($res)
	            return $res;
	        else 
	            return false;
		}


	}
