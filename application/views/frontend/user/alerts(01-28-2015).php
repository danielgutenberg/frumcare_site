<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
	<div class="container">
	<?php echo $this->breadcrumbs->show();?>
		<div class="dashboard-left float-left">
			 <?php $this->load->view('frontend/user/dashboard_nav');?>
		</div>

		<div class="dashboard-right float-right">

			<div class="top-welcome">
				<h2>Alerts</h2>
			</div>

			 <table class="table table-bordered">
        
        <?php
        if(!$record){
        ?>
        <p>There are currently no search alerts.</p>
        <?php
        }else{
             
        ?>
            <tr>
                <th>Date</th>
                <th>Alert Description</th>
            </tr>

            <?php 
                    $data = array();
                    foreach($searches as $search):
                        foreach($record as $rec){ 
                            if($rec['neighbour'] == $search['neighbor'])
                                $data['neighbour'] = $rec['neighbour'];
                            // if($rec['experience'] == $search['year_experience'])  
                            //     $data['experience'] = $search['year_experience'];   
                            // if($rec['gender'] == $search['gender'])  
                            //     $data['gender'] = $search['gender'];
                            // if($rec['smoker'] == $search['smoker'])  
                            //     $data['smoker'] = $search['smoker'];
                            // if($rec['language'] == $search['language'])  
                            //     $data['language'] = $search['language'];
                            // if($rec['religious_observance'] == $search['observance'])  
                            //     $data['religious_observance'] = $search['observance'];
                            // if($rec['number_of_children'] == $search['number_of_children'])  
                            //     $data['number_of_children'] = $search['number_of_children'];
                            // if($rec['optional_number'] == $search['morenum'])  
                            //     $data['optional_number'] = $search['morenum'];
                            // if($rec['age_group'] == $search['age_group'])  
                            //     $data['age_group'] = $search['age_group'];
                            // if($rec['looking_to_work'] == $search['looking_to_work'])
                            //     $data['looking_to_work'] = $search['looking_to_work'];
                            // if($rec['training'] == $search['training'])
                            //     $data['training'] = $search['training'];
                            // if($rec['availability'] == $search['availability'])
                            //     $data['availability'] = $search['availability'];
                            // if($rec['driver_license'] == $search['driver_license'])
                            //     $data['driver_license']  = $search['driver_license'];
                            // if($rec['vehicle'] == $search['vehicle'])
                            //     $data['vehicle']  = $search['vehicle'];
                            // if($rec['pick_up_child'] == $search['pick_up_child'])
                            //     $data['pick_up_child']  = $search['pick_up_child'];
                            // if($rec['cook'] == $search['cook'])
                            //     $data['cook']  = $search['cook'];
                            // if($rec['basic_housework'] == $search['basic_housework'])
                            //     $data['basic_housework']  = $search['basic_housework'];
                            // if($rec['homework_help'] == $search['homework_help'])
                            //     $data['homework_help']  = $search['homework_help'];
                            // if($rec['sick_child_care'] == $search['sick_child_care'])
                            //     $data['sick_child_care']  = $search['sick_child_care'];
                            // if($rec['on_short_notice'] == $search['on_short_notice'])
                            //     $data['on_short_notice']  = $search['on_short_notice'];
                            // if($rec['caregiverage_from'] == $search['caregiverage_from'])
                            //     $data['caregiverage_from']  = $search['caregiverage_from'];
                            // if($rec['caregiverage_to'] == $search['caregiverage_to'])
                            //     $data['caregiverage_to']  = $search['caregiverage_to'];
                            // if($rec['start_date'] == $search['start_date'])
                            //     $data['start_date']  = $search['start_date'];
                            // if($rec['willing_to_work'] == $search['willing_to_work'])
                            //     $data['willing_to_work']  = $search['willing_to_work'];                
                            // if($rec['subjects'] == $search['subjects'])
                            //     $data['subjects']  = $search['subjects'];
                            // if($rec['accept_insurance'] == $search['accept_insurance'])
                            //     $data['accept_insurance']   = $search['accept_insurance'];
                            // if($rec['rate'] == $search['rate'])
                            //     $data['rate']   = $search['rate'];
                            // if($rec['rate_type'] == $search['rate_type'])
                            //     $data['rate_type']   = $search['rate_type'];
                            // if($rec['gender_of_caregiver'] == $search['gender_of_caregiver'])
                            //     $data['gender_of_caregiver']   = $search['gender_of_caregiver'];

                            $data['user']      = $search['user_id'];
                            $data['care_type']  = $search['care_type'];
                            $data['date'] = $search['searcheddate'];
             }
        endforeach;
        }

        if($data['user']!= 0){
            $user = get_user($data['user']);
            $name = ucwords($user['name']);
        }else{
            $name = "Guest user";
        }
        if($data['care_type']){
            $care = get_care_detail($data['care_type']);
            $carename = $care['service_name'];
        }

        ?>
        <?php if($data['user']!= check_user()){
            ?>
            <tr>
                <td><?php echo $data['date'];?></td>
                <td>
                        <?php echo $name;?> has searched <?php echo $carename;?> on frumcare around <?php echo @$data['neighbour'];?>                </td>
            <tr>
        <?php }else{
            echo 'There are currently no search alerts.';
        } ?>
    </table>

		</div>
	</div>
