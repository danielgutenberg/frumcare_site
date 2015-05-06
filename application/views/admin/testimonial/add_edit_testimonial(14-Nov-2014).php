<div class="container">
    <div class="padding-10">
        <div class="row main-content">
            <?php flash();?>
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                <h1 class="txt-color-blueDark"><?php if($action=='add'){echo "Add";}else{echo "Edit";}?> Testimonial</h1>
                <div>
                <div class="panel-collapse">
                <div class="panel-body">
                    <form role="form" id="testimonial_add_edit_form" method="post" action="<?php echo ($action=="add") ? site_url("admin/testimonial/add_save") : site_url("admin/testimonial/edit_save/{$this->uri->segment(4)}")?>" enctype="multipart/form-data">
                        <table>
                        <tr>
                                <td>Testimonial For:</td>
                                <td>
                                    <input type="text" name="testimonial_for" value="<?php if($action=='edit') echo ucwords($detail->testimonial_for);?>" class="form-control required">
                                </td>
                            </tr>

                            <tr>
                                <td>Testimonial By:</td>
                                <td>
                                    <input type="text" name="testimonial_by" value="<?php if($action=='edit') echo ucwords($detail->testimonial_by);?>" class="form-control required">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">Testimonial Description : </td>
                                <td>
                                <textarea id="original_desc" style="display: none;"><?php if($action=='edit') echo $detail->testimonial_description;?></textarea>
                                <textarea id="testimonial_description" name="testimonial_description" rows="5" cols="40" class="form-control required"><?php if($action=='edit') echo $detail->testimonial_description?></textarea>
                                    <script type="text/javascript">
                                             var editor= CKEDITOR.replace( 'testimonial_description',{
                                                uiColor: '#9AB8F3',
                                              });
                                        //CKFinder.setupCKEditor(editor, '<?php echo base_url()?>plugins/ckfinder/');
                                    </script>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">Testimonial Picture :</td>
                                <td>
                                    <?php if($action=="edit" && $detail->image!=""):?>
                                    <div id="output"><div><img src="<?php echo site_url("images/testimonial/thumb/{$detail->image}")?>"></div></div>
                                    <?php else:?>
                                    <div id="output"><div><img src="<?php echo site_url("images/no-image.jpg")?>"></div></div>
                                    <?php endif?>
                                    <button class="btn btn-default" id="upload">Select File</button>
                                    <img src="<?php echo site_url("images/loader.gif")?>" id="loading-img" style="display:none;" alt="Please Wait"/>
                                </td>
                            </tr>

                            <tr>
                                <td>Rating:</td>
                                <td><div id="half" style="cursor: pointer;"></div></td>    
                            </tr> 

                            <tr>
                                <td>Status :</td>
                                <td>
                                    <select name="is_active" class="form-control">
                                        <option value="1">Approved</option>
                                        <option value="0" <?php if($action=='edit') echo $detail->is_active==0 ? 'selected="selected"' : '';?>>Pending</option>
                                    </select>
                                </td>
                            </tr>
                            <?php if($action=="add"):?>
                                <input type="hidden" name="testimonial_date" value="<?php echo time();?>">
                            <?php endif;?>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-default " type="submit" value="Save" id="save"/>
                                    <input class="btn btn-default" type="reset" value="Reset" id="reset"/>
                                    <input class="btn btn-default" type="button" value="Cancel" onclick="history.go(-1);"/>
                                </td>
                            </tr>
                            
                        </table>
                        <?php 
                       /*  if($action == 'edit')
                        {
                            ?>
                            <input type="hidden" name="slug" value="<?php echo $detail[0]['slug'];?>"/>
                            <?php
                        } */
                        ?>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- IMAGE FORM -->
<form action="<?php echo site_url("admin/testimonial/upload_image")?>" method="post" enctype="multipart/form-data" id="MyUploadForm" style>
    <input name="ImageFile" id="imageInput" type="file" style="display: none;"/>
</form>
<!-- IMAGE FORM -->


<script type="text/javascript">
$(function(){
    $('#reset').click(function(){
        var desc_value=$('#original_desc').val();
        //alert (desc_value);
        CKEDITOR.instances.testimonial_description.setData(desc_value);
    });
});
</script>

<script type="text/javascript" src="<?php echo site_url("js/my_imageupload.js")?>"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
<script src="<?php echo base_url();?>js/labs.js" type="text/javascript"></script>

<script type="text/css">
     $('#half').raty({
        path       : '<?php echo site_url();?>img/',
        starHalf   : 'star-half.png',
        starOff    : 'star-off.png',
        starOn     : 'star-on.png',
        half       :  true,
        score      :  '0'  
    });
</script>