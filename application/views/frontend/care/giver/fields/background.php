<div style="display:none">
    <label>Agree to background check?</label>
    <div class="form-field not-required">
        <div class="radio"><input type="radio" value="1" name="bg_check"  <?php echo isset($bg_check) && $bg_check == 1 ? 'checked' : '' ?>/> Yes</div>
        <div class="radio"><input type="radio" value="2" name="bg_check"  <?php echo isset($bg_check) && $bg_check == 2 ? 'checked' : '' ?> checked/> No</div>
    </div>
    <div>What's this? <a href="#">learn more</a></div>
</div>