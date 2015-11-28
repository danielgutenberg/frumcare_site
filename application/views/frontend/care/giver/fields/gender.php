 <div>
    <label>Gender</label>
    <div class="form-field">
        <div class="radio"><input type="radio" value="1" name="gender" checked> Male</div>
        <div class="radio"><input type="radio" value="2" name="gender" <?php echo isset($gender) && $gender == 2 ? 'checked' : '' ?>> Female </div>
    </div>
</div>