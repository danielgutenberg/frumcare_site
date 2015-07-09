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
                    <h1 class="txt-color-blueDark">Set Notification Auto Reply</h1>
                    </div>
                    <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info'); } ?>
                    <div class="panel-collapse collapse in">
                    <div class="panel-collapse collapse in panel-body">
                    <div class="ad-manager">
                    <form role="form" action="<?php echo site_url();?>admin/notification/setasautoreplies/<?php echo $this->uri->segment(4);?>" method="post" enctype="multipart/form-data" id="set_notification">
                        <div class="form-group">
                            <label class="control-label">Email Template</label>
                            <div class="ad-manager-select">
                                <select class="form-control required" name="emailtemplate">
                                    <option>--select--</option>
                                    <?php 
                                            if($emailtemplate){
                                                foreach($emailtemplate as $template):
                                    ?>
                                        <option value="<?php echo $template['id'];?>"><?php echo $template['title'];?></option>
                                    <?php 
                                        endforeach;
                                        } 
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Actions</label>
                            <div class="ad-manager-select">
                                    <input type="checkbox" value="2weeksaftersignup" name="action[]">2 Weeks after Singup <br/>
                                    <input type="checkbox" value="2weeksbeforadexpires" name="action[]">2 Weeks before Ad Expires <br/>
                                    <input type="checkbox" value="afteradsubmission" name="action[]">After Ad Submission<br/>
                                    <input type="checkbox" value="incompletesingup" name="action[]">Incomplete Signup<br/>
                            </div>
                        </div>

                         <div class="form-group">
                             <div class="ad-manager-btns">
                                <input type="submit" class="btn btn-default  btn-primary" id="btn_save" name="save_admin_info" value="Save Changes"/> 
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
