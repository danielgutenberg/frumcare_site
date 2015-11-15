<?php
class Common_care_model extends CI_Model
{

    public function sort($per_page,$latitude,$longitude,$option,$account_category,$care_type,$distance){                                        
        if(empty($latitude) && empty($latitude)){
            $ip = $_SERVER['REMOTE_ADDR'];
            $ipdata = $this->getIPData($ip);
            if(is_array($ipdata)){
                $latitude = $ipdata['lat'];
                $longitude = $ipdata['lon'];                
            }else{
                die('Some error occured. We will fix it soon');
            }
        }
        $order_type = 'asc';
        if($option == 'tbl_userprofile.id'){
            $order_type = 'desc';
        }        
        $sql = "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id  left outer join tbl_care on tbl_care.id = tbl_userprofile.care_type WHERE tbl_userprofile.profile_status = 1 ";                
        if($care_type!=''){
            $sql.=" and tbl_userprofile.care_type = $care_type and tbl_userprofile.account_category = $account_category";
        }
        else{
           if($account_category==1){
                $sql.=" and tbl_care.service_type = 1";
           }
           if($account_category==2){
                $sql.=" and tbl_care.service_type = 2";
           }
           if($account_category ==3 ) {
                if(segment(1) == 'caregivers' && segment(2) == 'organizations') $sql .=" and tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17";
                elseif(segment(1) == 'jobs' && segment(2) == 'organizations') $sql .=" and tbl_userprofile.care_type > 24";                
                else $sql .=" and (tbl_userprofile.care_type >9 and tbl_userprofile.care_type < 17) or tbl_userprofile.care_type > 24";
           }                      
        }
        if($distance != "unlimited"){
            $sql.=" having distance <= $distance";
        }
        $sql.= " order by $option $order_type";
        $query = $this->db->query($sql);
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    
    
    public function getIPData($ip){
        //$ip='119.6.144.74'; //ip of china
        //$ip='202.166.205.143'; //ip of kathmandu
        //$location = file_get_contents('http://freegeoip.net/json/'.$ip);
        //$ip='109.226.44.128';isareal
        $location = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
        if($location){
            if(empty($location['city'])){
                $lat = $location['lat'];
                $lng = $location['lon'];
                $json = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
                $json_data = json_decode($json);
                $location['city'] = $json_data->results[3]->formatted_address;
            }
            return $location;
        }
         else{
            $new_data = @unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
            if($new_data){
                $location2 = array(
                            'lat'           => $new_data['geoplugin_latitude'],
                            'lon'           => $new_data['geoplugin_longitude'],
                            'city'          => $new_data['geoplugin_city'],
                            'regionName'    => $new_data['geoplugin_regionName'],
                            'country'       => $new_data['geoplugin_countryName'],
                        );
                 if(empty($location2['city'])){
                    $lat = $location2['lat'];
                    $lng = $location2['lon'];
                    $json2 = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false");
                    $json_data2 = json_decode($json2);
                    $location2['city'] = $json_data2->results[3]->formatted_address;
                }
                return $location2;
            }
            else{
                return false;    
                            
            }                                                                         
         }    
    }
    
    function filter($search,$latitude,$longitude)
    {
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
			$carelocation 		= $search['carelocation'];
			$trainings 			= $search['trainings'];
			$able_to_work		= $search['able_to_work'];
			$driver_license		= $search['driver_license'];
			$vehicle			= $search['vehicle'];
			$available 			= $search['available'];
            $start_date         = $search['start_date'];
            $able_to_work       = $search['able_to_work'];
            $distance           = $search['distance'];
            $sort_by            = $search['sort_by'];
            $skills             = $search['skills'];
		}
		$sql = "select tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join  tbl_userprofile on tbl_user.id = tbl_userprofile.user_id left outer join tbl_care on tbl_care.id = tbl_userprofile.care_type where tbl_user.status = 1 and tbl_userprofile.profile_status=1";			

		if ($care_type == 'caregivers') {
		    $sql .= " and tbl_care.service_type = 1";
		}
		
		if ($care_type > 0) {
		    $sql .= "  and tbl_userprofile.care_type=$care_type";
		}
		
		
		if($search['caregiverage_from'] && $search['caregiverage_to']){
            $sql .= " and tbl_user.age between ".$search['caregiverage_from'].' and '.$search['caregiverage_to'];
        }
        if($search['smoker']!=''){
		    $sql .= " and tbl_userprofile.smoker=".$search['smoker'];
        }
		if($search['gender'] && $search['gender'] != 3 ){                
		     $sql .=" and tbl_user.gender=".$search['gender'];
		}

		if($language!=''){
			$languages = explode(',',$language);
			if(is_array($languages)){
				$first = array_shift($languages);
            	$sql .= " and (FIND_IN_SET('$first' ,tbl_user.caregiver_language)";
            	foreach($languages as $data){
            		$sql .= " or FIND_IN_SET('$data',tbl_user.caregiver_language)";
              	}
              	$sql .= ")";
			}

		}

		if($observance){
            $observance = explode(',',$observance);
            if(is_array($observance)){
            	if(!in_array('Any', $observance)) {
            		$first = array_shift($observance);
            		if ($first == 'Familiar With Jewish Tradition') {
            			$sql .= " and (tbl_user.familartojewish = 1";
            		} else {
                		$sql .= " and (FIND_IN_SET('$first' ,tbl_user.caregiver_religious_observance)";
            		}
                	foreach($observance as $data){
                		if ($data == 'Familiar With Jewish Tradition') {
                			$sql .= " or tbl_user.familartojewish = 1";
                		} else {
                			$sql .= " or FIND_IN_SET('$data',tbl_user.caregiver_religious_observance)";
                		}
  	            	}
  	            	$sql .= ")";
            	}
            }
        }
        
        if($search['pick_up_child'])
			$sql .= " and tbl_userprofile.pick_up_child=".$search['pick_up_child'];
		if($search['cook'])
			$sql .= " and tbl_userprofile.cook=".$search['cook'];
		if($search['basic_housework'])
			$sql .= " and tbl_userprofile.basic_housework=".$search['basic_housework'];
		if($search['homework_help'])
			$sql .= " and tbl_userprofile.homework_help=".$search['homework_help'];
		if($search['sick_child_care'])
			$sql .= " and tbl_userprofile.sick_child_care=".$search['sick_child_care'];
        if($search['bath_children'])
			$sql .= " and tbl_userprofile.bath_children=".$search['bath_children'];
        if($search['bed_children'])
			$sql .= " and tbl_userprofile.bed_children=".$search['bed_children'];
        
        if($able_to_work!=''){
			$works = explode(',',$able_to_work);
			if(is_array($works)){
				foreach($works as $work):
					$sql .= " and find_in_set('$work',tbl_userprofile.willing_to_work)";
				endforeach;
			}
		}
		
		if($skills!=''){
			$skills = explode(',',$skills);
			if(is_array($skills)){
				foreach($skills as $skill):
					$sql .= " and find_in_set('$skill',tbl_userprofile.willing_to_work)";
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
		if($carelocation!=''){
			$locations = explode(',',$carelocation);
			if(is_array($locations)){
				foreach($locations as $location):
					$sql .=" and find_in_set('$location',tbl_userprofile.looking_to_work)";
				endforeach;	
			}
		}

		if($trainings!=''){
			$training = explode(',',$trainings);
			foreach($training as $tran):
				$sql .=" and find_in_set('$tran',tbl_userprofile.training)";
			endforeach;
		}
		
		if(!empty($search['extra_field']) && $search['extra_field'] !='undefined'){				
            $extra_field = explode(',',$search['extra_field']);
            if(is_array($extra_field)){
                foreach($extra_field as $data){
                    $sql .= " and FIND_IN_SET('$data',tbl_userprofile.extra_field)"; 
                }
            }
        }

		if($driver_license!=''){
			$sql .=" and tbl_userprofile.driver_license=$driver_license";
		}

		if($vehicle!=''){
			$sql .=" and tbl_userprofile.vehicle=$vehicle";
		}
		if($available!=''){
			$sql .=" and tbl_userprofile.on_short_notice=$available";
		}
        if($start_date)
		$sql .= " and tbl_userprofile.start_date='".$start_date."'";
        if($distance != "unlimited"){
            $sql.=" having distance <= $distance";
        }
        $sql.= " order by $option $sort_by";
		$query 	= $this->db->query($sql);
		$res 	= $query->result_array();
		if($res)
			return $res;
		else
			return [];
    }
}
