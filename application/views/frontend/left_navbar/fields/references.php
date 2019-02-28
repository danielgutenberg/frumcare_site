<style>
    .languages_check {
        margin-top: 3px;
        margin-bottom: 3px;
    }
</style>
<?php $references = $data['references']; ?>
<div style="font-size:12px">
    <label style="font-size:13px; font-weight:600; margin-bottom:6px;">References</label>
    <div class="row">
        <div class="col-xs-12">
            <div class="languages_check"><input type="checkbox" name="references" value="yes" class="references" <?php if($references){?> checked="checked" <?php } ?>> Has References</div>
        </div>
    </div>
</div>