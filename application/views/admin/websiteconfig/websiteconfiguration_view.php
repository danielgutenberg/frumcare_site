<div class="container">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="">
            <span class="notify"><?php flash();?></span>
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h1 class="txt-color-blueDark">
                    <i class="fa fa-lg fa-fw fa-gear"></i> <span>Website Configuration Manager</span>
                  </h1>
                </div>
                <div class="panel-body">
                <div class="table-responsive" >
                    <div class="ad-manager">
                    <form role="form" id="myform" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label class="control-label">EMAIL 1</label>
                                <div class="ad-manager-full-input">
                                    <input size="40" type="text" class="form-control email" name="contact_email1" id="contact_email1" value="<?php echo $details->contact_email1;?>"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label">EMAIL 2</label>
                                <div class="ad-manager-full-input">
                                    <input size="40" type="text" class="form-control email" name="contact_email2" id="contact_email2" value="<?php echo $details->contact_email2;?>"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label">EMAIL 3</label>
                                <div class="ad-manager-full-input">
                                    <input size="40" type="text" class="form-control email" name="contact_email3" id="contact_email3" value="<?php echo $details->contact_email3;?>"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label">EMAIL 4</label>
                                <div class="ad-manager-full-input">
                                    <input size="40" type="text" class="form-control email" name="contact_email4" id="contact_email4" value="<?php echo $details->contact_email4;?>"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label">EMAIL 5</label>
                                <div class="ad-manager-full-input">
                                    <input size="40" type="text" class="form-control email" name="contact_email5" id="contact_email5" value="<?php echo $details->contact_email5;?>"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label">FACEBOOK LINK</label>
                                <div class="ad-manager-full-input">
                                    <input size="40" type="text" class="form-control" name="facebook_link" id="facebook_link" value="<?php echo $details->facebook_link;?>"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label">TWITTER LINK</label>
                                <div class="ad-manager-full-input">
                                    <input size="40" type="text" class="form-control" name="twitter_link" id="twitter_link" value="<?php echo $details->twitter_link;?>"/>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label">NOTIFICATIONS</td>
                                <div class="ad-manager-full-input">
                                    <input type="radio" name="enable_notifications" value="1" <?php echo $details->enable_notifications==1?'checked="checked"':''?>/> Enable
                                    <input type="radio" name="enable_notifications" value="0" <?php echo $details->enable_notifications==0?'checked="checked"':''?>/> Disable
                                </div>
                            </div>
                          

                             <div class="form-group">
                                <div class="ad-manager-btns">
                                    <input class="btn btn-primary btn-default" type="submit" value="Save"/>
                                    <input class="btn btn-primary btn-default" type="reset" value="Reset" id="reset"/>
                                    <input class="btn btn-primary btn-danger" type="button" value="Cancel" onclick="history.go(-1);"/>
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

<script type="text/javascript">
$().ready(function(){
    $('form').validate();
})
</script>