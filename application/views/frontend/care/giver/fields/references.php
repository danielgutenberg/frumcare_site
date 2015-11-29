<div>
    <label>References</label>
    <div class="form-field not-required">
    <div class="radio"><input type="radio" value="1" id="ref_check1" name="references" class="required" <?php echo isset($reference_file) && $ref =='1'?'checked':''?>/> Yes</div>
    <div class="radio"><input type="radio" value="2" id="ref_check2" name="references" class="required" <?php echo isset($ref) && $ref != '1' ? 'checked' : '' ?> /> No</div>
            
    </div>
</div>

<div class="refrence_file" <?php echo isset($reference_file) && $ref =='1' ?"":"style='display:none;'" ?>>
    <?php $this->load->view('frontend/care/reference_upload'); ?>
</div>


<script>
    $(document).ready(function(){
        $("#ref_check1").click(function(){
            $(".refrence_file").show();   
        });
        $("#ref_check2").click(function(){
            $.ajax({
                 type: "POST",
                 url: "<?php echo base_url(); ?>user/delete_ref_file",
                 data: {file_name : $("#output").text()},
                 success: function(r){
                    $('#output').html(r);
                 }
              });
            $(".refrence_file").hide(); 
            $('#file-name').val('');   
        });
});
</script>
