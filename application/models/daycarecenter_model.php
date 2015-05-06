<?php
	class Daycarecenter_model extends CI_model{
		public function __construct(){
			parent:: __construct();
		}


		public function getAllData($latitude,$longitude,$offset,$limit){
			$sql 	= "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = 3 and tbl_userprofile.care_type = 10 and tbl_user.status = 1 and tbl_userprofile.profile_status = 1   order by distance asc limit $offset,$limit";
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
           public function searchbylocation($latitude,$longitude,$offset,$limit){
		  	//$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 1 AND tbl_userprofile.care_type =10  order by distance asc limit $offset,$limit";
		  	$sql 	= "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = 3 and tbl_userprofile.care_type = 10 and tbl_user.status = 1 and tbl_userprofile.profile_status = 1   order by distance asc limit $offset,$limit";
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
				$language 			= $search['languages'];				
			//	$lookingtowork 		= $search['looking_to_work'];
			}

			$sql 	= "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = 3 and tbl_userprofile.care_type = 10 and tbl_user.status = 1 and tbl_userprofile.profile_status = 1  ";			
			if($language!=''){
			$languages = explode(',',$language);
			if(is_array($languages)){
				foreach($languages as $lang):
					$sql .= " and find_in_set('$lang',tbl_userprofile.language)";
				endforeach;
			}

		}
        if($search['sub_care']){
            $sql .=" and tbl_userprofile.sub_care = '".$search['sub_care']."'";
        }	
        if($search['age_group']){				
                 $age_group = explode(',',$search['age_group']);
                  if(is_array($age_group)){
                        foreach($age_group as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.age_group)"; 
  	                     }
                    }
            }
        $sql .="  order by distance asc";
        //echo $sql;exit;
		$query = $this->db->query($sql);
		$res = $query->result_array();
        if($res)
			return $res;
		else
			 return false;
		}

		public function count($lat,$lon){
			$sql 	= "select tbl_user.*,tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = 3 and tbl_userprofile.care_type = 10 and tbl_user.status = 1 and tbl_userprofile.profile_status = 1 and tbl_user.lat like '%$lat%' and tbl_user.lng like '%$lon%'";
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}

	}
?>