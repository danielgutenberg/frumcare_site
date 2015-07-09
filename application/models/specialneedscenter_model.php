<?php 
class Specialneedscenter_model extends CI_model{
		public function __construct(){
			parent:: __construct();
		}


		public function getAllData($latitude,$longitude,$offset,$limit){
			$sql 	= "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = 3 and tbl_userprofile.care_type = 14 and tbl_user.status = 1 and tbl_userprofile.profile_status = 1   order by distance asc limit $offset,$limit";
			$query 	= $this->db->query($sql);
			$res 	= $query->result_array();
			if($res)
				return $res;
			else
				return false;
		}
        public function searchbylocation($latitude,$longitude){
		  	$sql 	= "SELECT tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id WHERE tbl_user.status =1 AND tbl_userprofile.profile_status =1 AND tbl_userprofile.account_category = 3 AND tbl_userprofile.care_type =14  order by distance asc ";
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
				$willingtowork 		= $search['willing_to_work'];
			}

			$sql 	= "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join tbl_userprofile on tbl_user.id = tbl_userprofile.user_id where tbl_userprofile.account_category = 3 and tbl_userprofile.care_type = 14 and tbl_user.status = 1  and tbl_userprofile.profile_status = 1";
			if($language!=''){
				$languages = explode(',',$language);
				if(is_array($languages)){
					foreach($languages as $lang):
						$sql .= " and find_in_set('$lang',tbl_userprofile.language)";
					endforeach;
				}
			}


			if($willingtowork!=''){
				$works = explode(',',$willingtowork);
				if(is_array($works)){
					foreach($works as $work):
						$sql .= " and find_in_set('$work',tbl_userprofile.willing_to_work)";
					endforeach;
				}
			}
            if(!empty($search['extra_field']) && $search['extra_field'] !='undefined'){				
                 $extra_field = explode(',',$search['extra_field']);
                  if(is_array($extra_field)){
                        foreach($extra_field as $data){
                            $sql .= " and FIND_IN_SET('$data',tbl_userprofile.extra_field)"; 
  	                     }
                    }
            }
            $sql .="  order by distance asc";


		$query = $this->db->query($sql);
		$res = $query->result_array();
		if($res)
			return $res;
		else
			 return false;

		}

}
?>
