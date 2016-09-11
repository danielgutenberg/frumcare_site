<div>
    <label>Days / Hours</label>
    <div class="form-field">
    <br>
     <label style="width:25%">Sun</label><input type="text" name="sunday_from" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_from'];?>"> to  <input type="text" name="sunday_to" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_to'];?>">
     <br>
     <br>
     <label style="width:25%">Mon-Thu</label><input type="text" name="mid_days_from" value="<?php echo $detail[0]['mid_days_from'];?>" class="time" style="width:25%"> to  <input type="text" name="mid_days_to" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_from'];?>">
     <br>
     <br>
     <label style="width:25%">Fri</label><input type="text" name="friday_from" value="<?php echo $detail[0]['friday_from'];?>" style="width:25%" class="time"> to <input type="text" name="friday_to" class="time" style="width:25%" value="<?php echo $detail[0]['friday_to'];?>">
     <div class="checkbox"><input type="checkbox" name="extended_hrs_available" value="1" <?php if($detail[0]['extended_hrs'] == 1){?> checked="checked" <?php }?> > Extended Hours Available</div>
     <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1" <?php if($detail[0]['flexible_hours'] == 1){?> checked="checked" <?php }?>> Flexible Hours</div>

     <br>
     <label>Vacation Days (Please specify vacation days)</label>
     <br>
     <input type="text" name="vacation_days" value="<?php echo $detail[0]['vacation_days'];?>" placeholder="Vacation Days">

    <br>
    <br>

    <?php $this->load->view('frontend/care/vacation_upload', ['file' => 'pdf']); ?>
    </div>
</div>