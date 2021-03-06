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
        $sql = "SELECT *,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance FROM tbl_user LEFT OUTER JOIN tbl_userprofile ON tbl_user.id = tbl_userprofile.user_id  left outer join tbl_care on tbl_care.id = tbl_userprofile.care_type WHERE tbl_userprofile.profile_status = 1 and tbl_user.archive=0 ";                
        if($care_type!=''){
            $sql.=" and tbl_userprofile.care_type = $care_type";
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
    
    function featured()
    {
    	$sql = "
    		select 
				(SELECT MAX(login_time) FROM tbl_user_logs WHERE tbl_user_logs.user_id = tbl_user.id) AS login_time,
				tbl_user.profile_picture,
				tbl_user.name,
				tbl_user.state,
				tbl_user.country,
				tbl_user.city
			from 
				tbl_user 
			where 
				tbl_user.status = 1 
				and tbl_user.profile_picture is not NULL 
				and tbl_user.profile_picture != '' 
				and tbl_user.profile_picture_status = 1 
			order 
				by login_time desc
			limit 4
    	";
    	
    	$query 	= $this->db->query($sql);
		$res 	= $query->result_array();
		if($res)
			return $res;
		else
			return [];
    }
    
    function getLastLogin($time)
    {
    	$sql = "
    		select 
				(SELECT MAX(last_activity) FROM ci_sessions WHERE ci_sessions.user_id = tbl_user.id) AS login_time,
				tbl_user.id,
				tbl_user.name,
				tbl_user.email,
				tbl_user.archive_warning
			from 
				tbl_user 
			where 
				tbl_user.archive = 0
				and EXISTS (SELECT * FROM ci_sessions WHERE ci_sessions.user_id = tbl_user.id)
				and (SELECT MAX(last_activity) FROM ci_sessions WHERE ci_sessions.user_id = tbl_user.id) < $time
			order 
				by login_time desc
    	";
    	
    	$query 	= $this->db->query($sql);
		$res 	= $query->result_array();
		if($res)
			return $res;
		else
			return [];
    }
    
    function filter($search,$latitude,$longitude, $organization, $limit, $offset)
    {
        $latitude = round($latitude, 3);
        $longitude = round($longitude, 3);
        if(is_array($search)){
			$care_type  		  = $search['care_type'];
			$neighbour 			  = $search['neighbour'];
			$caregiverage_from 	  = $search['caregiverage_from'];
			$caregiverage_to 	  = $search['caregiverage_to'];
			$gender_of_caregiver  = $search['gender_of_caregiver'];
			$gender_of_careseeker = $search['gender_of_careseeker'];
			$language 			  = $search['language'];
			$jobLanguage 		  = $search['job_language'];			
			$observance 		  = $search['observance'];
			$min_exp 			  = $search['min_exp'];
			$availability		  = $search['availability'];
			$carelocation 		  = $search['carelocation'];
			$trainings 			  = $search['trainings'];
			$able_to_work		  = $search['able_to_work'];
			$driver_license		  = $search['driver_license'];
			$vehicle			  = $search['vehicle'];
			$available 			  = $search['available'];
            $start_date           = $search['start_date'];
            $able_to_work         = $search['able_to_work'];
            $distance             = $search['distance'];
            $sort_by              = $search['sort_by'];
            $skills               = $search['skills'];
            $references           = $search['references'];
		}
		
		$sql = "select (SELECT MAX(login_time) FROM tbl_user_logs WHERE tbl_user_logs.user_id = tbl_userprofile.user_id) AS login_time, (select count(tbl_reviews.profile_id) from tbl_reviews where tbl_reviews.profile_id = tbl_userprofile.id) as number_reviews, (select sum(tbl_reviews.review_rating) from tbl_reviews where tbl_reviews.profile_id = tbl_userprofile.id) as total_review, tbl_user.*,(((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) AS distance, tbl_userprofile.* from tbl_user left outer join  tbl_userprofile on tbl_user.id = tbl_userprofile.user_id left outer join tbl_care on tbl_care.id = tbl_userprofile.care_type where tbl_user.status = 1 and tbl_userprofile.profile_status=1 and tbl_user.archive=0";			

		if ($care_type == 'caregivers') {
		    $sql .= " and tbl_care.service_type = 1";
		}
		
		if ($care_type == 'jobs') {
		    $sql .= " and tbl_care.service_type = 2";
		}
		if($search['references'] == 1) {
        	$sql .= " and tbl_userprofile.references > 0";
		}
		if (count( explode(',', $care_type) ) > 1) {
			$sql .= "  and tbl_userprofile.care_type in ($care_type)";
		} else {
		
			if ($care_type > 0) {
			    $sql .= "  and tbl_userprofile.care_type=$care_type";
			}
		}
		
		if(!empty($search['number_of_children']) && $search['number_of_children'] !='undefined'){				
            $sql .= " and tbl_userprofile.number_of_children <=".$search['number_of_children'];
        }
        if(!empty($search['morenum']) && $search['morenum'] !='undefined'){				
            $optional_number = explode(',',$search['morenum']);
            if(is_array($optional_number)){
                foreach($optional_number as $data){
                    $sql .= " and FIND_IN_SET('$data',tbl_userprofile.optional_number)"; 
                }
            }
        }
        if(!empty($search['age_group']) && $search['age_group'] !='undefined'){				
            $age_group = explode(',',$search['age_group']);
             if(is_array($age_group)){
                 $first = array_shift($age_group);
            	 $sql .= " and (FIND_IN_SET('$first',tbl_userprofile.age_group)";
            	 foreach($age_group as $data){
            		 $sql .= " or FIND_IN_SET('$data',tbl_userprofile.age_group)";
              	 }
              	 $sql .= ")";
            }
        }
        if(!empty($search['rate']) && $search['rate'] !='undefined'){
                $sql .= " and tbl_userprofile.rate ='".$search['rate']. "'";
            }
		if($search['caregiverage_from'] && $search['caregiverage_to']){
            $sql .= " and tbl_user.age between ".$search['caregiverage_from'].' and '.$search['caregiverage_to'];
        }
        if($search['smoker']!=''){
		    $sql .= " and tbl_userprofile.smoker=".$search['smoker'];
        }
		if($search['gender_of_caregiver'] && $search['gender_of_caregiver'] != 3 ){                
		     $sql .=" and tbl_user.gender=".$search['gender_of_caregiver'];
		}
		if($search['gender_of_careseeker'] && $search['gender_of_careseeker'] != 3 ){                
		     $sql .=" and tbl_userprofile.gender_of_careseeker=".$search['gender_of_careseeker'];
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
		
		if($jobLanguage!=''){
			$languages = explode(',',$jobLanguage);
			if(is_array($languages)){
				$first = array_shift($languages);
            	$sql .= " and (FIND_IN_SET('$first' ,tbl_userprofile.language)";
            	foreach($languages as $data){
            		$sql .= " or FIND_IN_SET('$data',tbl_userprofile.language)";
              	}
              	$sql .= ")";
			}
		}
		
		if(!empty($search['subject']) && $search['subject'] !='undefined'){				
                 $subject = explode(',',$search['subject']);
                  if(is_array($subject)){
                        foreach($subject as $data){
                            $data1 = mysql_real_escape_string($data);
                            $sql .= " and FIND_IN_SET('$data1',tbl_userprofile.subjects)"; 
  	                     }
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
        if ($organization) {
		    $sql .= " and (FIND_IN_SET('Caregiving institution',tbl_userprofile.looking_to_work) OR FIND_IN_SET('Cleaning Company',tbl_userprofile.looking_to_work))";
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
					$sql .=" and FIND_IN_SET('$location',tbl_userprofile.looking_to_work)";
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
        
        if($search['looking_to_work'] !=''){				
            $locations = explode(',',$search['looking_to_work']);
            if(is_array($locations)){
                foreach($locations as $data){
                    $sql .= " and FIND_IN_SET(\"$data\",tbl_userprofile.looking_to_work)"; 
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
        if($distance != "unlimited" && ((int) $distance) > 0){
            $sql.=" having distance <= $distance";
        }
        if($sort_by == 'tbl_userprofile.id') {
        	$sql.= " order by login_time desc";
        }
        if($sort_by == 'distance') {
        	$sql.= " order by distance asc";
        }
        if($sort_by == 'rating') {
        	$sql.= " order by total_review desc";
        }
        
        $sql.=" limit $limit";
        $sql.=" offset $offset";
		$query 	= $this->db->query($sql);
		$res 	= $query->result_array();
		if($res)
			return $res;
		else
			return [];
    }
    
    function get_count($search,$latitude,$longitude, $organization)
    {
        $latitude = round($latitude, 3);
        $longitude = round($longitude, 3);
        if(is_array($search)){
			$care_type  		  = $search['care_type'];
			$neighbour 			  = $search['neighbour'];
			$caregiverage_from 	  = $search['caregiverage_from'];
			$caregiverage_to 	  = $search['caregiverage_to'];
			$gender_of_caregiver  = $search['gender_of_caregiver'];
			$gender_of_careseeker = $search['gender_of_careseeker'];
			$language 			  = $search['language'];
			$jobLanguage 		  = $search['job_language'];			
			$observance 		  = $search['observance'];
			$min_exp 			  = $search['min_exp'];
			$availability		  = $search['availability'];
			$carelocation 		  = $search['carelocation'];
			$trainings 			  = $search['trainings'];
			$able_to_work		  = $search['able_to_work'];
			$driver_license		  = $search['driver_license'];
			$vehicle			  = $search['vehicle'];
			$available 			  = $search['available'];
            $start_date           = $search['start_date'];
            $able_to_work         = $search['able_to_work'];
            $distance             = $search['distance'];
            $sort_by              = $search['sort_by'];
            $skills               = $search['skills'];
            $references           = $search['references'];
		}
		
		$sql = "select count(*) from tbl_user left outer join  tbl_userprofile on tbl_user.id = tbl_userprofile.user_id left outer join tbl_care on tbl_care.id = tbl_userprofile.care_type where tbl_user.status = 1 and tbl_userprofile.profile_status=1 and tbl_user.archive=0";			

		if ($care_type == 'caregivers') {
		    $sql .= " and tbl_care.service_type = 1";
		}
		
		if ($care_type == 'jobs') {
		    $sql .= " and tbl_care.service_type = 2";
		}
		if ($search['references'] == 1) {
        	$sql .= " and tbl_userprofile.references>0";
		}
		if (count( explode(',', $care_type) ) > 1) {
			$sql .= "  and tbl_userprofile.care_type in ($care_type)";
		} else {
		
			if ($care_type > 0) {
			    $sql .= "  and tbl_userprofile.care_type=$care_type";
			}
		}
		
		if(!empty($search['number_of_children']) && $search['number_of_children'] !='undefined'){				
            $sql .= " and tbl_userprofile.number_of_children <=".$search['number_of_children'];
        }
        if(!empty($search['morenum']) && $search['morenum'] !='undefined'){				
            $optional_number = explode(',',$search['morenum']);
            if(is_array($optional_number)){
                foreach($optional_number as $data){
                    $sql .= " and FIND_IN_SET('$data',tbl_userprofile.optional_number)"; 
                }
            }
        }
        if(!empty($search['age_group']) && $search['age_group'] !='undefined'){				
            $age_group = explode(',',$search['age_group']);
             if(is_array($age_group)){
                 $first = array_shift($age_group);
            	 $sql .= " and (FIND_IN_SET('$first',tbl_userprofile.age_group)";
            	 foreach($age_group as $data){
            		 $sql .= " or FIND_IN_SET('$data',tbl_userprofile.age_group)";
              	 }
              	 $sql .= ")";
            }
        }
        if(!empty($search['rate']) && $search['rate'] !='undefined'){
                $sql .= " and tbl_userprofile.rate ='".$search['rate']. "'";
            }
		if($search['caregiverage_from'] && $search['caregiverage_to']){
            $sql .= " and tbl_user.age between ".$search['caregiverage_from'].' and '.$search['caregiverage_to'];
        }
        if($search['smoker']!=''){
		    $sql .= " and tbl_userprofile.smoker=".$search['smoker'];
        }
		if($search['gender_of_caregiver'] && $search['gender_of_caregiver'] != 3 ){                
		     $sql .=" and tbl_user.gender=".$search['gender_of_caregiver'];
		}
		if($search['gender_of_careseeker'] && $search['gender_of_careseeker'] != 3 ){                
		     $sql .=" and tbl_userprofile.gender_of_careseeker=".$search['gender_of_careseeker'];
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
		if($jobLanguage!=''){
			$languages = explode(',',$jobLanguage);
			if(is_array($languages)){
				$first = array_shift($languages);
            	$sql .= " and (FIND_IN_SET('$first' ,tbl_userprofile.language)";
            	foreach($languages as $data){
            		$sql .= " or FIND_IN_SET('$data',tbl_userprofile.language)";
              	}
              	$sql .= ")";
			}
		}		
		if(!empty($search['subject']) && $search['subject'] !='undefined'){				
                 $subject = explode(',',$search['subject']);
                  if(is_array($subject)){
                        foreach($subject as $data){
                            $data1 = mysql_real_escape_string($data);
                            $sql .= " and FIND_IN_SET('$data1',tbl_userprofile.subjects)"; 
  	                     }
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
        if ($organization) {
		    $sql .= " and (FIND_IN_SET('Caregiving institution',tbl_userprofile.looking_to_work) OR FIND_IN_SET('Cleaning Company',tbl_userprofile.looking_to_work))";
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
					$sql .=" and FIND_IN_SET('$location',tbl_userprofile.looking_to_work)";
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
        
        if($search['looking_to_work'] !=''){				
            $locations = explode(',',$search['looking_to_work']);
            if(is_array($locations)){
                foreach($locations as $data){
                    $sql .= " and FIND_IN_SET(\"$data\",tbl_userprofile.looking_to_work)"; 
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
        if($distance != "unlimited" && ((int) $distance) > 0){
            $sql.=" and (((acos(sin(($latitude * pi() /180 )) * sin((`lat` * pi( ) /180 ) ) + cos( ( $latitude * pi( ) /180 ) ) * cos( (`lat` * pi( ) /180 )) * cos( (( $longitude - `lng` ) * pi( ) /180 )))) *180 / pi( )) *60 * 1.1515) <= $distance";
        }
		$query 	= $this->db->query($sql);
		$res 	= $query->row_array();
		if($res)
			return $res;
		else
			return [];
    }
}
