<div class="">
    <div class="padding-10">
        <div class="row main-content">
        <?php flash();?>
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                    <h1 class="txt-color-blueDark"><i class="fa fa-lg fa-fw fa-pencil-square"></i><?php if($action=='add'){echo "Add";}else{echo "Edit";}?> Email Template</h1>
                </div>
                <div class="panel-collapse">
                <div class="panel-body">
                    <div class="ad-manager">
                    <form role="form" id="email_add_edit_form" method="post" action="<?php if($action == 'add'){echo site_url('admin/emailtemplate/add_save');}else{echo site_url('admin/emailtemplate/edit_save');}?>" enctype="multipart/form-data">
                        <div class="form-group">
                                <label class="control-label">Template Name <?php if($action == 'edit') echo '(Cannot be edited)';?> :</label>
                                <div class="ad-manager-full-input">
                                    <input <?php if($action == 'edit'){echo 'readonly="readonly"';}?> type="text" class="form-control required" name="title" value="<?php if($action == 'edit'){echo $detail[0]['title'];}?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Template Subject : </label>
                                <div class="ad-manager-full-input">
                                    <input  type="text"  class="form-control required" name="subject" value="<?php if($action == 'edit'){echo $detail[0]['subject'];}?>"/>
                                </div>
                            </div>

                           <div class="form-group">
                                <label class="control-label">Sender Email : </label>
                                <div class="ad-manager-full-input">
                                    <input  type="text"  class="form-control required" name="sender_email" value="<?php if($action == 'edit'){echo $detail[0]['sender_email'];}?>"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Template Content : </label>
                                <div class="ad-manager-full-input">
                                <textarea id="desc" name="content" rows="5" cols="40"><?php if($action == 'edit'){echo $detail[0]['content'];}?></textarea>
                                    <script type="text/javascript">
                                             var editor= CKEDITOR.replace( 'desc',{
                                                uiColor: '#9AB8F3',
                                                
                                              });
                                        CKFinder.setupCKEditor(editor, '<?php echo base_url()?>plugins/ckfinder/');
                                    </script>
                                    
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="control-label">IsActive ? :</label>
                                <div class="ad-manager-checkbox">
                                    <input checked="checked" type="radio" value="1" name="isActive" /> Yes<br/>
                                    <input <?php if(isset($detail[0]['isActive']) && $detail[0]['isActive']==0){echo 'checked="checked"';}?> type="radio" value="0" name="isActive" /> No
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="ad-manager-btns">
                                <?php
                                if($action=='edit'){ ?> <input type="hidden" name="id" value="<?php echo $detail[0]['id']; ?>" /> <?php }
                                ?>
                                    <input class="btn btn-primary btn-default" type="submit" name="add_emailtemplate" value="Save"/>
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

<script>
    //validate the input fields
    
    $('#email_add_edit_form').validate();
    
       
$('#reset').click(function(){
    var desc_value=$('#original_desc').val();
    //alert (desc_value);
    CKEDITOR.instances.desc.setData(desc_value);
    });
        

    
    
    function myFunction(id){
        var title=$('#'+id).val();
        var title1=$('#title1').val();
        //alert(title);
        $.ajax({
            url:'<?php echo site_url('admin/email/check_username');?>',
            data:'username='+title,
            type:'POST',
            success: function(response)
            {
                //alert(response);
                if(response==1 && title!=title1)
                {
                    $('#'+id).focus();
                    $('input[type=submit]').attr('disabled', 'disabled');
                    $('.msg_'+id).html('Username already exists!');
                }
                else
                {
                    $('.msg_'+id).html('');
                    $("input[type=submit]").removeAttr("disabled");
                }
            }
        });
    }
    function hide(clas)
    {
        $('.'+clas).html('');
    }
</script>