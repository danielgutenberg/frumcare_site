<div class="container">
    <div class="padding-10">
        <div class="row">
               <span class="error">
                    <h3></h3>
                </span>
               <?php $action = $this->uri->segment(3);?>
                   <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                   <div class="panel-heading">
                    <h1 class="txt-color-blueDark">Send Notification </h1>
                    </div>
                    <?php if($this->session->flashdata('success')){ echo $this->session->flashdata('success'); } ?>
                    <div class="panel-collapse collapse in">
                    <div class="panel-collapse collapse in panel-body">
                    <?php
                        $id                  = $editData['id'];
                        $notification_type   = $editData['notification_type'];
                    ?>
                    <div class="ad-manager">
                    <form role="form" action="<?php echo site_url();?>admin/notification/send/<?php echo $id;?>" method="post" enctype="multipart/form-data" id="admin_add_edit_form">

                        <div class="form-group">
                            <label class="control-label">Notification Recepients</label>
                            <div class="ad-manager-select">
                               <div class="ad-manager-full-inputs">
                                <input type="text" class="form-control required receivers" name="notification_recepients" value="" placeholder="please enter user id or email address" autocomplete="off"/>
                               </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Notification Type</label>
                            <div class="ad-manager-select">
                                <select class="form-control required" name="notification_type">
                                    <option>--select--</option>
                                    <option value="Ad Refresh" <?php if($notification_type == 'Ad Refresh'){?> selected="selected" <?php } ?> >Ad Refresh</option>
                                    <option value="Upgrade Account" <?php if($notification_type == 'Upgrade Account'){?> selected="selected" <?php } ?>>Upgrade Account</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Group</label>
                            <div class="ad-manager-select">
                                <div><input type="checkbox" name="group[]" value="1">Caregivers</div>
                                <div><input type="checkbox" name="group[]" value="2">Careseekers</div>
                            </div>
                        </div>

                         <div class="form-group">
                             <div class="ad-manager-btns">
                             <input type="hidden" value="<?php echo $id;?>" name="notification_id">
                                <input type="submit" class="btn btn-default  btn-primary" id="btn_save" name="save_admin_info" value="Send"/> 
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="control-label">Action</label>
                            <div class="ad-manager-btns">
                              <a href="#">Set as recurring notification</a>
                              <a href="<?php echo site_url();?>admin/notification/add">Create a notification</a>
                              <a href="<?php echo site_url();?>admin/notification/edit/<?php echo $id;?>">Edit notification</a>
                            </div>
                        </div>

                       </form>

                </div>
                    </div>
                    </div>
                </div><!--panel default-->
            </div>
        </div>
    </div>
</div>


<link href="<?php echo site_url();?>css/jquery-ui.css" rel="Stylesheet"></link>
<script src="<?php echo site_url();?>js/jquery-ui.js" ></script>

<script>
$(document).ready(function(){
  $(".receivers").autocomplete({
    source: "<?php echo site_url();?>admin/notification/get_emailaddress" // name of controller followed by function
  }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<a><div class="list_item_container"><div class="label" style="color:#000000">' + item.label + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    };
});
</script>