<div>
    <label>References</label>
    <div class="form-field not-required">
    <div class="radio"><input type="radio" id="ref_check1" value="1" name="references" class="required"/> Yes</div>
    <div class="radio"><input type="radio" id="ref_check2" value="2" name="references" class="required" checked/> No</div>
    </div>
</div>

<div class="refrence_file" style="display:none">
    <?php $this->load->view('frontend/care/file_upload'); ?>
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
