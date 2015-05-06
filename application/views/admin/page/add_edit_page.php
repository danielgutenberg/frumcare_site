<div class="">
    <div class="padding-10">
        <div class="row main-content">
            <?php flash();?>
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                    <h1 class="txt-color-blueDark"><?php if($action=='add'){echo "Add";}else{echo "Edit";}?> Page</h1>
                </div>
                <div class="panel-collapse">
                <div class="panel-body">
                    <form role="form" id="page_add_edit_form" method="post" action="<?php if($action == 'add'){echo site_url('admin/page/add_save');}else{echo site_url('admin/page/edit_save');}?>" enctype="multipart/form-data">
                        <div class="ad-manager">
                            <div class="form-group">
                                <label class="control-label">Page Title</label>
                                <div class="ad-manager-full-input">
                                    <input type="text" class="form-control required" name="page_name" id="name" onchange="myFunction('name');" value="<?php if($action == 'edit'){echo $detail[0]['title'];}?>"/>
                                  <?php /*   <input type="text" id="title1" value="<?php if($action == 'edit'){echo $detail[0]['title'];}?>"/> */?>
                                    <br />
                                    <span class="msg_name"></span>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label">Page Description</label>
                                <div class="ad-manager-full-input">
                                    <textarea id="desc" name="page_desc" rows="5" cols="40" class="required"><?php if($action == 'edit'){echo $detail[0]['content'];}?></textarea>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('desc');
                                        CKFinder.setupCKEditor(editor, '<?php echo base_url()?>plugins/ckfinder/');
                                    </script>
                                    <?php /* <input type="text" id="original_desc" value="<?php if($action == 'edit'){echo $detail[0]['content'];}?>" /> */?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">SEO Meta Title</label>
                                <div class="ad-manager-full-input"><input type="text" class="form-control" name="meta_title" value="<?php if($action == 'edit'){echo $detail[0]['seo_meta_title'];}?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">SEO Meta Keywords</label>
                                <div class="ad-manager-full-input"><textarea name="meta_keywords" class="form-control" rows="5" cols="40"><?php if($action == 'edit'){echo $detail[0]['seo_meta_keywords'];}?></textarea></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">SEO Meta Description</label>
                                <div class="ad-manager-full-input"><textarea name="meta_desc" class="form-control" rows="5" cols="40"><?php if($action == 'edit'){echo $detail[0]['seo_meta_description'];}?></textarea></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <div class="ad-manager-full-input">
                                    <select name="isPublished">
                                        <option value="1" <?php if($action == 'add'||($action=='edit' && $detail[0]['isPublished']==1)){echo "selected='selected'";}?>>Active</option>
                                        <option value="0" <?php if($action == 'edit' && $detail[0]['isPublished']==0){echo "selected='selected'";}?>>Inactive</option>
                                    </select>                                    
                                </div>
                            </div>

                            <?php if($this->uri->segment(3)!= 'add'){?>
                            <div class="form-group"><div class="form-group">
                                <label class="control-label">Actions</label>
                                <div class="ad-manager-full-input">
                                     <?php prev_next('admin/page/edit', $detail[0]['id'], 'tbl_pages');?>
                                     <a href="<?php echo site_url();?>admin/page/delete/<?php echo $detail[0]['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this page?');">Delete</a>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <div class="ad-manager-btns">
                                    <input class="btn btn-default  btn-primary" type="submit" name="add_page" value="Save"/>
                                    <input class="btn btn-default  btn-primary" type="reset" value="Reset" id="reset"/>
                                    <input class="btn btn-default  btn-danger" type="button" value="Cancel" onclick="history.go(-1);"/>
                                </div>
                            </div>
                            <input type="hidden" name="parent_page" value="0">
                        </div>
                        <?php 
                        if($action == 'edit')
                        {
                            ?>
                            <input type="hidden" name="slug" value="<?php echo $detail[0]['slug'];?>"/>
                            <?php
                        }
                        ?>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#page_add_edit_form').validate();
</script>