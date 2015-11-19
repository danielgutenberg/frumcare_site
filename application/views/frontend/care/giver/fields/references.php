<div>
    <label>References</label>
    <div class="form-field not-required">
    <div class="radio"><input type="radio" id="ref_check1" value="1" name="references" class="required"/> Yes</div>
    <div class="radio"><input type="radio" id="ref_check2" value="2" name="references" class="required" checked/> No</div>
    </div>
</div>

<div class="refrence_file">
    <label></label>
    <input type="hidden" id="file-name" name="file">
    <button class="btn btn-primary" id="select_file">Select File</button>
    <input type="file" name="file_upload" id="file_upload" style="display: none;">
    <div id="output" class="loader"></div>
</div>

<div style="display:none">
    <label>Your references details</label>
    <div class="form-field not-required">
    <textarea style="display:none" name="references_details" class="txt"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
    </div>
</div>