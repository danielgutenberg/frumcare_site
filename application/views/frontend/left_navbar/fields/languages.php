<style>
    .languages_check {
        margin-top: 3px;
        margin-bottom: 3px;
    }
</style>
<?php $languages = explode(',',$data['language']); ?>
<div style="font-size:12px">
    <label style="font-size:13px; font-weight:600; margin-bottom:6px;">Languages Required</label>
    <div class="row">
        <div class="col-xs-5">
            <div class="languages_check"><input type="checkbox" name="languages[]" value="English" class="lang" <?php if(in_array('English',$languages)){?> checked="checked" <?php } ?>> English</div>
        </div>
        <div class="col-xs-5">
            <div class="languages_check"><input type="checkbox" name="languages[]" value="Yiddish" class="lang" <?php if(in_array('Yiddish',$languages)){?> checked="checked" <?php } ?>> Yiddish</div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="languages_check"><input type="checkbox" name="languages[]" value="Hebrew" class="lang" <?php if(in_array('Hebrew',$languages)){?> checked="checked" <?php } ?>> Hebrew</div>
        </div>
        <div class="col-xs-5">
            <div class="languages_check"><input type="checkbox" name="languages[]" value="Russian" class="lang" <?php if(in_array('Russian',$languages)){?> checked="checked" <?php } ?>> Russian</div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="languages_check"><input type="checkbox" name="languages[]" value="French" class="lang" <?php if(in_array('French',$languages)){?> checked="checked" <?php } ?>> French</div>
        </div>
        <div class="col-xs-5">
            <div class="languages_check"><input type="checkbox" name="languages[]" value="Other" class="lang" <?php if(in_array('Other',$languages)){?> checked="checked" <?php } ?>> Other</div>
        </div>
    </div>
</div>