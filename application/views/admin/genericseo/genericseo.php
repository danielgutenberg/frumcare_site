<div class="container">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="">
            <span class="someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h1 class="txt-color-blueDark">
                    <i class="fa fa-lg fa-fw fa-book"></i> <span>GENERIC SEO Manager</span>
                  </h1>
                </div>
                <div class="panel-body">
                    <div class="table-responsive"> 
                        <div class="ad-manager">
                        <form role="form" id="page_add_edit_form" method="post" action="" enctype="multipart/form-data">
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
