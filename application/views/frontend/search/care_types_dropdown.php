<?php if($this->uri->segment(1) == 'caregivers') { ?>
    <?php if($this->uri->segment(2) == 'organizations') { ?>        
        <select id="careId" name="service" class="care_type_organizations select2" style="width:250px" multiple="multiple" data-type="organization_job">
            <option value="31" <?php if(segment(3) == 'workers-staff-for-childcare-facility'){?> selected="selected" <?php }?>>Childcare facility</option>
            <option value="35" <?php if(segment(3) == 'workers-staff-for-senior-care-facility'){?> selected="selected" <?php }?> >Senior care facility</option>
            <option value="36" <?php if(segment(3) == 'workers-staff-for-special-needs-facility'){?> selected="selected" <?php }?>>Special needs facility</option>
            <option value="38" <?php if(segment(3) == 'workers-for-cleaning-company'){?> selected="selected" <?php }?>>Cleaning company</option>
        </select>     
    <?php } 
    else { ?>
        <select id="careId" name="service" class="service care_type select2" style="width:250px" multiple="multiple" data-type="caregivers">
            <option value="1" <?php if(segment(2) == 'babysitter'){?> selected="selected" <?php }?>>Babysitter</option>
            <option value="2" <?php if(segment(2) == 'nanny-au-pair'){?> selected="selected" <?php }?> >Nanny / Au-pair</option>
            <option value="10" <?php if(segment(2) == 'pediatric-baby-nurse'){?> selected="selected" <?php }?>>Pediatric / Baby Nurse</option>
            <option value="3" <?php if(segment(2) == 'nursery-playgroup-drop-off-gan'){?> selected="selected" <?php }?>>Nursery / Playgroup / Drop off / Gan</option>
            <option value="11" <?php if(segment(2) == 'day-care-center-day-camp-afternoon-activities'){?> selected="selected" <?php }?>>Day Care Center / Day Camp / Afternoon Activities</option>
            <option value="4" <?php if(segment(2) == 'tutor-private-lessons'){?> selected="selected" <?php }?>>Tutor/ Private lessons</option>
            <option value="5" <?php if(segment(2) == 'senior-caregiver'){?> selected="selected" <?php }?> >Senior Caregiver / Companion</option>
            <option value="13" <?php if(segment(2) == 'senior-care-agency'){?> selected="selected" <?php }?>>Senior Care Agency</option>                    
            <option value="16" <?php if(segment(2) == 'assisted-living-senior-care-center-nursing-home'){?> selected="selected" <?php }?>>Assisted living / Senior Care Center / Nursing Home</option>
            <option value="6" <?php if(segment(2) == 'special-needs-caregiver'){?> selected="selected" <?php }?>>Special needs caregiver / companion</option>
            <option value="14" <?php if(segment(2) == 'special-needs-center'){?> selected="selected" <?php }?>>Special needs center</option>
            <option value="7" <?php if(segment(2) == 'therapists'){?> selected="selected" <?php }?>>Therapist</option>
            <option value="8" <?php if(segment(2) == 'cleaning-household-help'){?> selected="selected" <?php }?>>Cleaning / household help</option>
            <option value="15" <?php if(segment(2) == 'cleaning-household-help-company'){?> selected="selected" <?php }?>>Cleaning / household help company</option>
            <option value="9" <?php if(segment(2) == 'errand-runner-odd-jobs-personal-assistant-driver'){?> selected="selected" <?php }?>>Errand runner / odd jobs / personal assistant / driver</option>                    																													
            <option value="31" <?php if(segment(2) == 'workers-staff-for-childcare-facility'){?> selected="selected" <?php }?>>Workers / Staff for childcare facility</option>
            <option value="35" <?php if(segment(2) == 'workers-staff-for-senior-care-facility'){?> selected="selected" <?php }?> >Workers / Staff for senior care facility</option>
            <option value="36" <?php if(segment(2) == 'workers-staff-for-special-needs-facility'){?> selected="selected" <?php }?>>Workers / Staff for special needs facility</option>
            <option value="38" <?php if(segment(2) == 'workers-for-cleaning-company'){?> selected="selected" <?php }?>>Workers for cleaning company</option>
        </select>
    <?php } ?>
<?php } ?>

<?php if($this->uri->segment(1) == 'jobs') { ?>    
    <select id="careId" name="service" class="service jobtype select2" style="width:250px" multiple="multiple" data-type="jobs">
        <option value="17" <?php if(segment(2) == 'babysitter'){?> selected="selected" <?php }?>>Babysitter</option>
    	<option value="18" <?php if(segment(2) == 'nanny-au-pair'){?> selected="selected" <?php }?> >Nanny / Au-pair</option>           
    	<option value="23" <?php if(segment(2) == 'pediatric-baby-nurse'){?> selected="selected" <?php }?>>Pediatric / Baby Nurse</option>       
    	<option value="19" <?php if(segment(2) == 'tutor-private-lessons'){?> selected="selected" <?php }?>>Tutor / Private lessons</option>
    	<option value="20" <?php if(segment(2) == 'senior-caregiver'){?> selected="selected" <?php }?>>Senior Caregiver / Companion</option>        
    	<option value="22" <?php if(segment(2) == 'special-needs-caregiver'){?> selected="selected" <?php }?>>Special needs caregiver / companion</option>
    	<option value="24" <?php if(segment(2) == 'cleaning-household-help'){?> selected="selected" <?php }?>>Cleaning / household help</option>        
    	<option value="21" <?php if(segment(2) == 'errand-runner-odd-jobs-personal-assistant-driver'){?> selected="selected" <?php }?>>Errand runner / odd jobs / personal assistant / driver</option>
        <option value="25" <?php if(segment(2) == 'workers-staff-for-childcare-facility'){?> selected="selected" <?php }?>>Workers / Staff for childcare facility</option>
        <option value="26" <?php if(segment(2) == 'workers-staff-for-senior-care-facility'){?> selected="selected" <?php }?> >Workers / Staff for senior care facility</option>
        <option value="27" <?php if(segment(2) == 'workers-staff-for-special-needs-facility'){?> selected="selected" <?php }?>>Workers / Staff for special needs facility</option>
        <option value="28" <?php if(segment(2) == 'workers-for-cleaning-company'){?> selected="selected" <?php } ?>>Workers for cleaning company</option>
    </select>
<?php } ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.10/css/bootstrap-multiselect.css" type="text/css"/>
<script>
    $(document).ready(function() {
        $('.select2').multiselect({
            placeholder: 'Please select 1 or more care types',
            includeSelectAllOption: true,
            onDropdownHide: function(event, session) {
                console.log(event)
                console.log($('.select2').val())
            },
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
        
        
    })
</script>


<style>
.btn .caret {
    float: right;
    margin-top: 6px;
    margin-right: -8px;
}
 .btn-group{width:229px}
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