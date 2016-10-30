<div class="container">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="">
            <span class="someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h1 class="txt-color-blueDark">
                    <i class="fa fa-lg fa-fw fa-book"></i> <span>SEO Manager</span>
                  </h1>
                </div>

                <div class="panel-body">
                <div>
                Page:  <select id="seoPage" name="service" class="care_type_organizations" style="width:230px">
                        <option value="organizations">--select--</option> 
                        <option value="1" <?php if ($page == 'home'){?> selected="selected" <?php }?>>Home</option>
                        <option value="2" <?php if ($page == 'howitworks'){?> selected="selected" <?php }?> >How it Works</option>
                        <option value="3" <?php if ($page== 'aboutus'){?> selected="selected" <?php }?>>About Us</option>
                        <option value="4" <?php if ($page == 'contactus'){?> selected="selected" <?php }?>>Contact Us</option>
                        <option value="5" <?php if ($page == 'jobs'){?> selected="selected" <?php }?>>Jobs</option>
                        <option value="6" <?php if ($page == 'caregivers'){?> selected="selected" <?php }?>>Caregivers</option>
                        <option value="13" <?php if ($page == 'organizations'){?> selected="selected" <?php }?>>Organizations</option>
                        <option value="7" <?php if ($page == 'signup'){?> selected="selected" <?php }?>>Sign Up</option>
                        <option value="8" <?php if ($page == 'tipsfamilies'){?> selected="selected" <?php }?>>Tips for Families</option>
                        <option value="9" <?php if ($page == 'tipscaregivers'){?> selected="selected" <?php }?>>Tips for Caregivers</option>
                        <option value="10" <?php if ($page == 'safetyguidefamilies'){?> selected="selected" <?php }?>>Safety Guide for Families</option>
                        <option value="11" <?php if ($page == 'safetyguidecaregivers'){?> selected="selected" <?php }?>>Safety Guide for Caregivers</option>
                        <option value="14" <?php if ($page == 'faqs'){?> selected="selected" <?php }?>>FAQs</option>
                    </select> 
                </div>
                    <div class="table-responsive"> 
                        <div class="ad-manager">
                            <?php 
                                $attributes = array('id' => 'page_add_edit_form', 'enctype' => 'multipart/form-data');
                                echo form_open('', $attributes);
                            ?>
                            <div class="form-group">
                                    <label class="control-label">TITLE</label>
                                    <div class="ad-manager-full-input">
                                        <input size="50" type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo $details['meta_title'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="control-label">DESCRIPTIONS</label>
                                    <div class="ad-manager-full-input"><textarea rows="5" cols="80" name="meta_desc" class="form-control" rows="5" cols="40"><?php echo $details['meta_desc'];?></textarea></div>
                                </div>
    
                                <div class="form-group">
                                    <label class="control-label">PAGE KEYWORDS</label>
                                    <div class="ad-manager-full-input"><textarea rows="5" cols="80" name="meta_tags" class="form-control" rows="5" cols="40"><?php echo $details['meta_keywords'];?></textarea></div>
                                </div>
    
                                <div class="form-group">
                                    <label class="control-label">GOOGLE ANALYTICS</label>
                                    <div class="ad-manager-full-input"><textarea rows="5" cols="80" name="google_analytics" class="form-control" rows="5" cols="40"><?php echo $details['google_analytics'];?></textarea></div>
                                </div>
    
                                <div class="form-group">
                                    <label class="control-label">STATUS</label>
                                    <div class="ad-manager-checkbox">
                                        <input type="radio" name="is_active" value="1" <?php echo $details['isActive']==1?'checked="checked"':''?>> Active<br/>
                                        <input type="radio" name="is_active" value="0" <?php echo $details['isActive']==0?'checked="checked"':''?>> Inactive
                                    </div>
                                </div>
                              
                                <input class="btn btn-primary btn-default" type="hidden" name="page" value="<?php echo $page ?>"/>
                                <div class="form-group">
                                   <div class="ad-manager-btns">
                                        <input class="btn btn-primary btn-default" type="submit" name="submit" value="Save"/>
                                        <input class="btn btn-primary btn-default" type="reset" value="Reset" id="reset"/>
                                        <input class="btn btn-danger btn-default" type="button" value="Cancel" onclick="history.go(-1);"/>
                                    </div>
                                </div>
                        </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#seoPage').change(function(){
            var id = $('#seoPage').val();
            navigate(id);
        });
        
        function navigate(pagelink){
            if(pagelink == '1')
                var locationaddress = 'home';
            if(pagelink == '2')
                var locationaddress = 'howitworks';            
            if(pagelink == '3')
                var locationaddress = 'aboutus';
            if(pagelink == '4')
                var locationaddress = 'contactus';
             if(pagelink == '5')
                var locationaddress = 'jobs';
            if(pagelink == '6')
                var locationaddress = 'caregivers';
            if(pagelink == '7')
                var locationaddress = 'signup';
            if(pagelink == '8')
                var locationaddress = 'tipsfamilies';
            if(pagelink == '9')
                var locationaddress = 'tipscaregivers';   
            if(pagelink == '10')
                var locationaddress = 'safetyguidefamilies'; 
            if(pagelink == '11')
                var locationaddress = 'safetyguidecaregivers';
            if(pagelink == '13')
                var locationaddress = 'organizations';
            if(pagelink == '14')
                var locationaddress = 'faqs';
            if(pagelink == '15')
            	var locationaddress = 'cleaning-household-help-company';
            if(pagelink == '16')
            	var locationaddress = 'assisted-living-senior-care-center-nursing-home';
             if(pagelink == '17')
            	var locationaddress = 'babysitter';
             if(pagelink == '18')
            	var locationaddress = 'nanny-au-pair';
             if(pagelink == '19')
            	var locationaddress = 'tutor-private-lessons';
             if(pagelink == '20')
            	var locationaddress = 'senior-caregiver';
             if(pagelink == '21')
            	var locationaddress = 'errand-runner-odd-jobs-personal-assistant-driver';
             if(pagelink == '22')
            	var locationaddress = 'special-needs-caregiver';
             if(pagelink == '23')
            	var locationaddress = 'pediatric-baby-nurse';
             if(pagelink == '24')
            	var locationaddress = 'cleaning-household-help';            
             if(pagelink == '25' || pagelink == '31')
                var locationaddress = 'workers-staff-for-childcare-facility';
            if(pagelink == '26' || pagelink == '35')
                var locationaddress = 'workers-staff-for-senior-care-facility';
            if(pagelink == '27' || pagelink == '36')
                var locationaddress = 'workers-staff-for-special-needs-facility';
             if(pagelink == '28' || pagelink == '38')
                var locationaddress = 'workers-for-cleaning-company';
            
            if(pagelink == 'caregivers')
                var locationaddress = 'all';
            if(pagelink == 'jobs')
                var locationaddress = 'all';
            if(pagelink == 'organizations')
                var locationaddress = 'all';
            
            location.href = '<?php echo site_url();?>admin/seo/'+locationaddress;
        }

    });			         
</script>
