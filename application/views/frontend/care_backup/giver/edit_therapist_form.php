<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
if($detail){
    $type_of_therapy = $detail[0]['type_of_therapy'];
    $certification = $detail[0]['certification'];
    $exp = $detail[0]['experience'];
    $licence_information = $detail[0]['licence_information'];
    $hr_rate 		 = $detail[0]['hourly_rate'];
    $ins = $detail[0]['accept_insurance'];
    $desc 			 = $detail[0]['profile_description'];
    $ref 			 = $detail[0]['references'];
    $reference_file  = $detail[0]['reference_file'];
     $rate = $detail[0]['rate'];
    $rate_type = $detail[0]['rate_type'];
    
}
?>
<?php $care_type = $this->uri->segment(4);?>
<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    
    <div class="dashboard-right float-right">
    
    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
        <div class="ad-form-container">
        
        <div>
            <h1 class="step3">Edit Job Details</h1>
        </div>
        
        <div>
            <label>Type of therapy</label>
            <div class="form-field">
            <input type="text" value="<?php echo isset($type_of_therapy) ? $type_of_therapy : '' ?>" name="type_of_therapy" class="required">
            </div>
        </div>

        <div>
            <label>Training/ Certification</label>
            <div class="form-field">
            <input type="text" value="<?php echo isset($certification) ? $certification : '' ?>" name="certification" class="required">
            </div>
        </div>
        <div>
            <label>Years of experience</label>
            <div class="form-field">
            <select name="experience" class="required">
                <option value="">Select years of experience</option>
                <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>
        <div>
            <label>License information</label>
            <div class="form-field">
            <input type="text" value="<?php echo isset($licence_information) ? $licence_information : '' ?>" name="licence_information" class="required">
            </div>
        </div>
        <div>
            <label>Rate</label>
            <div class="form-field">
            <select name="rate" class="required">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$10-$15</option>
            <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+</option>
            </select>
            </div>
        </div>
        <select name="rate_type">
            <option value="1" <?php echo isset($rate_type) && $rate_type == '1'?'selected':'' ?>>Hourly Rate</option>
            <option value="2" <?php echo isset($rate_type) && $rate_type == '2'?'selected':'' ?>>Monthly Rate</option>
        </select>
        <div>
            <label>Accepts insurance</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="accept_insurance" class="required" <?php echo isset($ins) && $ins == 1 ? 'checked' : '' ?>/> Yes</div>
            <div class="radio"><input type="radio" value="2" name="accept_insurance" class="required" <?php echo isset($ins) && $ins == 2 ? 'checked' : '' ?> /> No</div>
            </div>
        </div>
        <div>
            <label>Tell us about yourself</label>
            <div class="form-field">
            <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
            </div>
        </div>
        <div>
            <label>References</label>
            <div class="form-field not-required">
            <div class="radio"><input type="radio" value="1" id="ref_check1" name="references" class="required" <?php echo isset($reference_file) && $ref =='1'?'checked':''?>/> Yes</div>
            <div class="radio"><input type="radio" value="2" id="ref_check2" name="references" class="required" <?php echo isset($ref) && $ref != '1' ? 'checked' : '' ?> /> No</div>
            </div>
        </div>
        
        <div class="refrence_file" <?php echo isset($reference_file) && $ref =='1' ?"":"style='display:none;'" ?>>
            <label></label>
            <input type="hidden" id="file-name" name="file" value="<?php echo isset($reference_file)?$reference_file:'' ?>">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader"><?php echo isset($reference_file)?$reference_file:'' ?></div>
        </div>
        
        <div style="display:none">
            <label>Your references details</label>
            <div class="form-field not-required">
            <textarea style="display:none" name="references_details" class="required"><?php echo isset($ref_det) ? $ref_det : '' ?></textarea>
            </div>
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Update"/>
        </div>
    </div>
</form>
</div>
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
<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/uploadfile?files")?>';
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });//CODE BY Kiran
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
