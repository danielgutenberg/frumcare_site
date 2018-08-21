<?php if($this->uri->segment(1) == 'caregivers') { ?>
    <?php if($this->uri->segment(2) == 'organization-workers') { ?>        
        <select id="careId" name="service" class="care_type_organizations select2" style="width:95%" multiple="multiple" data-type="organization_job">
            <option value="31" <?php if(segment(3) == 'workers-staff-for-childcare-facility' || in_array(31, $careId)){?> selected="selected" <?php }?>>Childcare facility</option>
            <option value="35" <?php if(segment(3) == 'workers-staff-for-senior-care-facility' || in_array(35, $careId)){?> selected="selected" <?php }?> >Senior care facility</option>
            <option value="36" <?php if(segment(3) == 'workers-staff-for-special-needs-facility' || in_array(36, $careId)){?> selected="selected" <?php }?>>Special needs facility</option>
            <option value="38" <?php if(segment(3) == 'workers-for-cleaning-company' || in_array(38, $careId)){?> selected="selected" <?php }?>>Cleaning company</option>
        </select>     
    <?php } 
    else if ($this->uri->segment(2) == 'organizations') { ?>
        <select id="careId" name="service" class="care_type_organizations select2" style="width:95%" multiple="multiple" data-type="caregivers">
            <option value="3" <?php if(segment(3) == 'nursery-playgroup-drop-off-gan' || in_array(3, $careId)){?> selected="selected" <?php }?>>Nursery / Playgroup / Drop off / Gan</option>
            <option value="11" <?php if(segment(3) == 'day-care-center-day-camp-afternoon-activities' || in_array(11, $careId)){?> selected="selected" <?php }?>>Day Care Center / Day Camp / Afternoon Activities</option>
            <option value="13" <?php if(segment(3) == 'senior-care-agency' || in_array(13, $careId)){?> selected="selected" <?php }?>>Senior Care Agency</option>                    
            <option value="14" <?php if(segment(3) == 'special-needs-center' || in_array(14, $careId)){?> selected="selected" <?php }?>>Special needs center</option>  
            <option value="15" <?php if(segment(3) == 'cleaning-household-help-company' || in_array(15, $careId)){?> selected="selected" <?php }?>>Cleaning / household help company</option>
        </select> 
    <?php } else { ?>
        <select id="careId" name="service" class="service care_type select2" style="width:95%" multiple="multiple" data-type="caregivers">
            <option value="1" <?php if(segment(2) == 'babysitter' || in_array(1, $careId)){?> selected="selected" <?php }?>>Babysitter</option>
            <option value="2" <?php if(segment(2) == 'nanny-au-pair' || in_array(2, $careId)){?> selected="selected" <?php }?> >Nanny / Au-pair</option>
            <option value="10" <?php if(segment(2) == 'pediatric-baby-nurse' || in_array(10, $careId)){?> selected="selected" <?php }?>>Pediatric / Baby Nurse</option>
            <option value="3" <?php if(segment(2) == 'nursery-playgroup-drop-off-gan' || in_array(3, $careId)){?> selected="selected" <?php }?>>Nursery / Playgroup / Drop off / Gan</option>
            <option value="11" <?php if(segment(2) == 'day-care-center-day-camp-afternoon-activities' || in_array(11, $careId)){?> selected="selected" <?php }?>>Day Care Center / Day Camp / Afternoon Activities</option>
            <option value="4" <?php if(segment(2) == 'tutor-private-lessons' || in_array(4, $careId)){?> selected="selected" <?php }?>>Tutor/ Private lessons</option>
            <option value="5" <?php if(segment(2) == 'senior-caregiver' || in_array(5, $careId)){?> selected="selected" <?php }?> >Senior Caregiver / Companion</option>
            <option value="13" <?php if(segment(2) == 'senior-care-agency' || in_array(13, $careId)){?> selected="selected" <?php }?>>Senior Care Agency</option>                    
            <option value="16" <?php if(segment(2) == 'assisted-living-senior-care-center-nursing-home' || in_array(16, $careId)){?> selected="selected" <?php }?>>Assisted living / Senior Care Center / Nursing Home</option>
            <option value="6" <?php if(segment(2) == 'special-needs-caregiver' || in_array(6, $careId)){?> selected="selected" <?php }?>>Special needs caregiver / companion</option>
            <option value="14" <?php if(segment(2) == 'special-needs-center' || in_array(14, $careId)){?> selected="selected" <?php }?>>Special needs center</option>
            <option value="7" <?php if(segment(2) == 'therapists' || in_array(7, $careId)){?> selected="selected" <?php }?>>Therapist</option>
            <option value="8" <?php if(segment(2) == 'cleaning-household-help' || in_array(8, $careId)){?> selected="selected" <?php }?>>Cleaning / household help</option>
            <option value="15" <?php if(segment(2) == 'cleaning-household-help-company' || in_array(15, $careId)){?> selected="selected" <?php }?>>Cleaning / household help company</option>
            <option value="9" <?php if(segment(2) == 'errand-runner-odd-jobs-personal-assistant-driver' || in_array(9, $careId)){?> selected="selected" <?php }?>>Errand runner / odd jobs / personal assistant / driver</option>                    																													
            <option value="31" <?php if(segment(3) == 'workers-staff-for-childcare-facility' || in_array(31, $careId)){?> selected="selected" <?php }?>>Workers / Staff for childcare facility</option>
            <option value="35" <?php if(segment(3) == 'workers-staff-for-senior-care-facility' || in_array(35, $careId)){?> selected="selected" <?php }?> >Workers / Staff for senior care facility</option>
            <option value="36" <?php if(segment(3) == 'workers-staff-for-special-needs-facility' || in_array(36, $careId)){?> selected="selected" <?php }?>>Workers / Staff for special needs facility</option>
            <option value="38" <?php if(segment(3) == 'workers-for-cleaning-company' || in_array(38, $careId)){?> selected="selected" <?php }?>>Workers for cleaning company</option>
        </select>
    <?php } ?>
<?php } ?>

<?php if($this->uri->segment(1) == 'jobs') { ?>    
    <select id="careId" name="service" class="service jobtype select2" style="width:95%" multiple="multiple" data-type="jobs">
        <option value="17" <?php if(segment(2) == 'babysitter' || in_array(17, $careId)){?> selected="selected" <?php }?>>Babysitter</option>
    	<option value="18" <?php if(segment(2) == 'nanny-au-pair' || in_array(18, $careId)){?> selected="selected" <?php }?> >Nanny / Au-pair</option>           
    	<option value="23" <?php if(segment(2) == 'pediatric-baby-nurse' || in_array(23, $careId)){?> selected="selected" <?php }?>>Pediatric / Baby Nurse</option>       
    	<option value="19" <?php if(segment(2) == 'tutor-private-lessons' || in_array(19, $careId)){?> selected="selected" <?php }?>>Tutor / Private lessons</option>
    	<option value="20" <?php if(segment(2) == 'senior-caregiver' || in_array(20, $careId)){?> selected="selected" <?php }?>>Senior Caregiver / Companion</option>        
    	<option value="22" <?php if(segment(2) == 'special-needs-caregiver' || in_array(22, $careId)){?> selected="selected" <?php }?>>Special needs caregiver / companion</option>
    	<option value="24" <?php if(segment(2) == 'cleaning-household-help' || in_array(24, $careId)){?> selected="selected" <?php }?>>Cleaning / household help</option>        
    	<option value="21" <?php if(segment(2) == 'errand-runner-odd-jobs-personal-assistant-driver' || in_array(21, $careId)){?> selected="selected" <?php }?>>Errand runner / odd jobs / personal assistant / driver</option>
        <option value="25" <?php if(segment(2) == 'workers-staff-for-childcare-facility' || in_array(25, $careId)){?> selected="selected" <?php }?>>Workers / Staff for childcare facility</option>
        <option value="26" <?php if(segment(2) == 'workers-staff-for-senior-care-facility' || in_array(26, $careId)){?> selected="selected" <?php }?> >Workers / Staff for senior care facility</option>
        <option value="27" <?php if(segment(2) == 'workers-staff-for-special-needs-facility' || in_array(27, $careId)){?> selected="selected" <?php }?>>Workers / Staff for special needs facility</option>
        <option value="28" <?php if(segment(2) == 'workers-for-cleaning-company' || in_array(28, $careId)){?> selected="selected" <?php } ?>>Workers for cleaning company</option>
    </select>
<?php } ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.10/css/bootstrap-multiselect.css" type="text/css"/>
<script>
    $(document).ready(function() {
        $('.select2').multiselect({
            placeholder: 'Please select 1 or more care types',
            includeSelectAllOption: true,
            buttonText: function(options, select) {
                if (options.length === 0) {
                    return 'Select a care type';
                }
                else if (options.length > 1) {
                    return options.length + ' types selected';
                }
                 else {
                     var labels = [];
                     options.each(function() {
                         if ($(this).attr('label') !== undefined) {
                             labels.push($(this).attr('label').substr(0, 30));
                         }
                         else {
                             labels.push($(this).html().substr(0, 30));
                         }
                     });
                     return labels.join(', ') + '';
                 }
            }
        });
        $('.btn-group').ready(function() {
            $('.locationText').on('click', function(e) {
                e.stopPropagation()
                $('.multiselect').trigger('click.bs.dropdown')
            })
        })
        
        
        
    })
</script>


<style>
.btn .caret {
    float: right;
    margin-top: 6px;
    margin-right: -8px;
}
.locationCaret {
    margin-top: 1px;
    margin-right: 7px;
    margin-left: -17px;
}
 .btn-group{width:95%}
 .multiselect{width:100%}
 .dropdown-menu{display:none;}
 .btn-group [data-toggle="dropdown"] {
    height: 26px;
}
.multiselect-selected-text {
    float:left;
    font-size: 14px;
    margin-top: -4px;
    margin-left: -10px !important;
    color: #6a6a6a;
}
</style>