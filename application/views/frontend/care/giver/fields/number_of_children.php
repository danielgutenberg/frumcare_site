<div>
    <label>Number of children willing to care for</label>
    <div class="form-field">
        <div class="checkbox"><input type="text" value="<?php echo isset($number_of_children) ? $number_of_children : '' ?>" name="number_of_children" class="txt number"></div>
        <div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]" <?php if(in_array("twins",$optional_number)){ ?> checked='checked' <?php }?>/>Twins</div>
        <div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]" <?php if(in_array("triplets",$optional_number)){ ?> checked='checked' <?php }?>/>Triplets</div>
    </div>
</div>