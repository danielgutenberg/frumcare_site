<script type="text/javascript" src="<?php echo site_url("js/jquery.form.min.js")?>"></script>
<div class="container">
    <div class="padding-10">
        <div class="row main-content">
        <?php flash();?>
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                <i class="fa fa-lg fa-fw fa-file-text-o"></i> <span><h1 class="txt-color-blueDark">Edit Review</span></h1>
                </div>
                <divclass="panel-collapse">
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo site_url();?>admin/review/view/<?php echo $details['id'];?>" enctype="multipart/form-data">
                        <div class="ad-manager">
                            <div class="form-group">
                                <label class="control-label">Name :</label>
                                <div class="ad-manager-full-input">
                                    <input type="text" name="username" value="<?php echo ucwords($details['name']);?>" class="form-control required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Review Description : </label>
                                <div class="ad-manager-full-input">
                                <textarea id="original_desc" style="display: none;"><?php echo $details['description'];?></textarea>
                                <textarea id="review_description" name="review_description" rows="5" cols="40" class="form-control required"><?php echo $details['description'];?></textarea>
                                    <script type="text/javascript">
                                             var editor= CKEDITOR.replace( 'review_description',{
                                                uiColor: '#9AB8F3',
                                                
                                              });
                                        CKFinder.setupCKEditor(editor, '<?php echo base_url()?>plugins/ckfinder/');
                                    </script>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Rating :</label>
                                <div class="ad-manager-full-input">
                                    <input type="radio" name="review_rating" value="1" <?php if($details['review_rating'] == 1){?> checked="checked" <?php } ?> title="bad">
                                    <input type="radio" name="review_rating" value="2" <?php if($details['review_rating'] == 2){?> checked="checked" <?php } ?> title="poor">
                                    <input type="radio" name="review_rating" value="3" <?php if($details['review_rating'] == 3){?> checked="checked" <?php } ?> title="regular">
                                    <input type="radio" name="review_rating" value="4" <?php if($details['review_rating'] == 4){?> checked="checked" <?php } ?> title="good">
                                    <input type="radio" name="review_rating" value="5" <?php if($details['review_rating'] == 5){?> checked="checked" <?php } ?> title="very good">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label">Status :</label>
                                <div class="ad-manager-full-input">
                                    <select name="status" class="form-control">
                                        <option value="1" <?php if($details['status'] == 1){?> selected="selected" <?php }?>>Approved</option>
                                        <option value="0" <?php if($details['status'] == 0){?> selected="selected" <?php }?>>Pending</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $details['id'];?>">
                            <div class="form-group">
                                <div class="ad-manager-btns">
                                    <input class="btn btn-default btn-primary" type="submit" value="Save" name="save" />
                                    <input class="btn btn-default btn-danger" type="button" value="Cancel" onclick="history.go(-1);"/>
                                </div>
                            </div>
                            
                        </div>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

