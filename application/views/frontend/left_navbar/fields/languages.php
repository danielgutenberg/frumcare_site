<?php $languages = explode(',',$data['language']); ?>
<div>
    <label>Languages</label>
    <div class="checkbox first"><input type="checkbox" name="languages[]" value="English" class="lang" <?php if(in_array('English',$languages)){?> checked="checked" <?php } ?>> English</div>
    <div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang" <?php if(in_array('Yiddish',$languages)){?> checked="checked" <?php } ?>> Yiddish</div>
    <div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang" <?php if(in_array('Hebrew',$languages)){?> checked="checked" <?php } ?>> Hebrew</div>
    <div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang" <?php if(in_array('Russian',$languages)){?> checked="checked" <?php } ?>> Russian</div>
    <div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang" <?php if(in_array('French',$languages)){?> checked="checked" <?php } ?>> French</div>
<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang" <?php if(in_array('Other',$languages)){?> checked="checked" <?php } ?>> Other</div>
</div>