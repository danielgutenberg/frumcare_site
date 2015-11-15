<div>
    <label>Care Location</label>
    <div class="checkbox first"><input type="checkbox" value="Child's home" class="looking_to_work">Child's home</div>
    <div class="checkbox"><input type="checkbox" value="My home" class="looking_to_work">Caregivers home</div>
    <div class="checkbox"><input type="checkbox" value="Caregiving institution" class="looking_to_work" <?php echo ($this->uri->segment(1)=='caregivers' && ($this->uri->segment(2)=='workers-staff-for-childcare-facility' || $this->uri->segment(2)=='organizations'  || $this->uri->segment(3) == 'workers-staff-for-childcare-facility') )?'checked':'' ?> >Caregiving institution</div>
    <div class="checkbox"><input type="checkbox" value="Mother's helper" class="looking_to_work">Mother's helper</div>
</div>