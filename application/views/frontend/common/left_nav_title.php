<?php if($this->uri->segment(1) == 'caregivers') { ?>
    <?php if($this->uri->segment(2) == 'organizations') { ?>        
        <select name="service" class="care_type_organizations">
            <option value="organizations">--select--</option> 
            <option value="25" <?php if(segment(3) == 'workers-staff-for-childcare-facility'){?> selected="selected" <?php }?>>Workers / Staff for childcare facility</option>
            <option value="26" <?php if(segment(3) == 'workers-staff-for-senior-care-facility'){?> selected="selected" <?php }?> >Workers / Staff for senior care facility</option>
            <option value="27" <?php if(segment(3) == 'workers-staff-for-special-needs-facility'){?> selected="selected" <?php }?>>Workers / Staff for special needs facility</option>
            <option value="28" <?php if(segment(3) == 'workers-for-cleaning-company'){?> selected="selected" <?php }?>>Workers for cleaning company</option>
        </select>     
    <?php } 
    else { ?>
        <select name="service" class="care_type">
            <option value="caregivers">--select--</option> 
            <option value="1" <?php if(segment(2) == 'babysitter'){?> selected="selected" <?php }?>>Babysitter</option>
            <option value="2" <?php if(segment(2) == 'nanny-au-pair'){?> selected="selected" <?php }?> >Nanny / Au-pair</option>
            <option value="3" <?php if(segment(2) == 'nursery-playgroup-drop-off-gan'){?> selected="selected" <?php }?>>Nursery / Playgroup / Drop off / Gan</option>
            <option value="10" <?php if(segment(2) == 'day-care-center-day-camp-afternoon-activities'){?> selected="selected" <?php }?>>Day Care Center / Day Camp / Afternoon Activities</option>
            <option value="4" <?php if(segment(2) == 'tutor-private-lessons'){?> selected="selected" <?php }?>>Tutor/ Private lessons</option>
            <option value="5" <?php if(segment(2) == 'senior-caregiver'){?> selected="selected" <?php }?> >Senior Caregiver</option>
            <option value="13" <?php if(segment(2) == 'senior-care-agency'){?> selected="selected" <?php }?>>Senior Care Agency</option>                    
            <option value="16" <?php if(segment(2) == 'assisted-living-senior-care-center-nursing-home'){?> selected="selected" <?php }?>>Assisted living / Senior Care Center / Nursing Home</option>
            <option value="6" <?php if(segment(2) == 'special-needs-caregiver'){?> selected="selected" <?php }?>>Special needs caregiver</option>
            <option value="14" <?php if(segment(2) == 'special-needs-center'){?> selected="selected" <?php }?>>Special needs center</option>
            <option value="7" <?php if(segment(2) == 'therapists'){?> selected="selected" <?php }?>>Therapist</option>
            <option value="8" <?php if(segment(2) == 'cleaning-household-help'){?> selected="selected" <?php }?>>Cleaning / household help</option>
            <option value="15" <?php if(segment(2) == 'cleaning-household-help-company'){?> selected="selected" <?php }?>>Cleaning / household help company</option>
            <option value="9" <?php if(segment(2) == 'errand-runner-odd-jobs-personal-assistant-driver'){?> selected="selected" <?php }?>>Errand runner / odd jobs / personal assistant / driver</option>                    																													
            <option value="25" <?php if(segment(2) == 'workers-staff-for-childcare-facility'){?> selected="selected" <?php }?>>Workers / Staff for childcare facility</option>
            <option value="26" <?php if(segment(2) == 'workers-staff-for-senior-care-facility'){?> selected="selected" <?php }?> >Workers / Staff for senior care facility</option>
            <option value="27" <?php if(segment(2) == 'workers-staff-for-special-needs-facility'){?> selected="selected" <?php }?>>Workers / Staff for special needs facility</option>
            <option value="28" <?php if(segment(2) == 'workers-for-cleaning-company'){?> selected="selected" <?php }?>>Workers for cleaning company</option>
        </select>
    <?php } ?>
<?php } ?>

<?php if($this->uri->segment(1) == 'jobs') { ?>    
    <select name="service" class="jobtype">
        <option value="jobs">--select--</option> 
        <option value="17" <?php if(segment(2) == 'babysitter'){?> selected="selected" <?php }?>>Babysitter</option>
    	<option value="18" <?php if(segment(2) == 'nanny-au-pair'){?> selected="selected" <?php }?> >Nanny / Au-pair</option>        
    	<option value="19" <?php if(segment(2) == 'tutor-private-lessons'){?> selected="selected" <?php }?>>Tutor / Private lessons</option>
    	<option value="20" <?php if(segment(2) == 'senior-caregiver'){?> selected="selected" <?php }?>>Senior Caregiver</option>        
    	<option value="22" <?php if(segment(2) == 'special-needs-caregiver'){?> selected="selected" <?php }?>>Special needs caregiver</option>           
    	<?php /*<option value="23" <?php if(segment(2) == 'therapists'){?> selected="selected" <?php }?>>Therapist</option> */ ?>
    	<option value="24" <?php if(segment(2) == 'cleaning-household-help'){?> selected="selected" <?php }?>>Cleaning / household help</option>        
    	<option value="21" <?php if(segment(2) == 'errand-runner-odd-jobs-personal-assistant-driver'){?> selected="selected" <?php }?>>Errand runner / odd jobs / personal assistant / driver</option>
        <option value="25" <?php if(segment(2) == 'workers-staff-for-childcare-facility'){?> selected="selected" <?php }?>>Workers / Staff for childcare facility</option>
        <option value="26" <?php if(segment(2) == 'workers-staff-for-senior-care-facility'){?> selected="selected" <?php }?> >Workers / Staff for senior care facility</option>
        <option value="27" <?php if(segment(2) == 'workers-staff-for-special-needs-facility'){?> selected="selected" <?php }?>>Workers / Staff for special needs facility</option>
        <option value="28" <?php if(segment(2) == 'cleaning-household-help-company'){?> selected="selected" <?php } ?>>Workers for cleaning company</option>
    </select>
<?php } ?>


<script>
    $(document).ready(function(){
        $('.care_type').change(function(){
            var id = $('.care_type').val();
            navigate(id,'caregivers');
        });
        
        $('.jobtype').change(function(){
            var id = $('.jobtype').val();
            navigate(id,'jobs');
        });
        
        $('.orgtype').change(function(){
            var id = $('.orgtype').val();
            navigate(id,'organizations');
        });
        
        $('.care_type_organizations').change(function(){
            var id = $('.care_type_organizations').val();
            navigate(id,'organization_job');
        });
        
        function navigate(pagelink,type){
            if(pagelink == '1')
                var locationaddress = 'babysitter';
            if(pagelink == '2')
                var locationaddress = 'nanny-au-pair';            
            if(pagelink == '3')
                var locationaddress = 'nursery-playgroup-drop-off-gan';
            if(pagelink == '4')
                var locationaddress = 'tutor-private-lessons';
             if(pagelink == '5')
                var locationaddress = 'senior-caregiver';
            if(pagelink == '6')
                var locationaddress = 'special-needs-caregiver';
            if(pagelink == '7')
                var locationaddress = 'therapists';
            if(pagelink == '8')
                var locationaddress = 'cleaning-household-help';
            if(pagelink == '9')
                var locationaddress = 'errand-runner-odd-jobs-personal-assistant-driver';                            
            if(pagelink == '10')
                var locationaddress = 'day-care-center-day-camp-afternoon-activities';
            if(pagelink == '13')
                var locationaddress = 'senior-care-agency';
            if(pagelink == '14')
                var locationaddress = 'special-needs-center';
            if(pagelink == '15')
            	var locationaddress = 'cleaning-household-help-company';
            if(pagelink == '16')
            	var locationaddress = 'assisted-living-senior-care-center-nursing-home';
             if(pagelink == '17')
            	var locationaddress = 'babysitter';
             if(pagelink == '18')
            	var locationaddress = 'nanny-au-pair';
             if(pagelink == '19')
            	var locationaddress = 'tutor-private-lessons';
             if(pagelink == '20')
            	var locationaddress = 'senior-caregiver';
             if(pagelink == '21')
            	var locationaddress = 'errand-runner-odd-jobs-personal-assistant-driver';
             if(pagelink == '22')
            	var locationaddress = 'special-needs-caregiver';
             if(pagelink == '23')
            	var locationaddress = 'therapists';
             if(pagelink == '24')
            	var locationaddress = 'cleaning-household-help';            
             if(pagelink == '25')
                var locationaddress = 'workers-staff-for-childcare-facility';
            if(pagelink == '26')
                var locationaddress = 'workers-staff-for-senior-care-facility';
            if(pagelink == '27')
                var locationaddress = 'workers-staff-for-special-needs-facility';
             if(pagelink == '28')
                var locationaddress = 'workers-for-cleaning-company';
            
            if(pagelink == 'caregivers')
                var locationaddress = 'all';
            if(pagelink == 'jobs')
                var locationaddress = 'all';
            if(pagelink == 'organizations')
                var locationaddress = 'all';
            
            if(type == 'caregivers')                    
                location.href = '<?php echo site_url();?>caregivers/'+locationaddress;
            if(type == 'jobs')                    
                location.href = '<?php echo site_url();?>jobs/'+locationaddress;
            if(type == 'organizations')                    
                location.href = '<?php echo site_url();?>organizations/'+locationaddress;
            if(type == 'organization_job')
                location.href = '<?php echo site_url();?>caregivers/organizations/'+locationaddress;
        } //end of navigate
    });			         
</script>