<div class="container">
    <div class="padding-10">
        <div class="row main-content">
            <?php flash();?>
            <div class="panel panel-default">
               <?php $action = $this->uri->segment(3);?>
               <div class="panel-heading">
                <h1><i class="fa fa-lg fa-fw fa-th-large"></i><?php if($action=='add'){echo "Add";}else{echo "Edit";}?><span>Feature Details</span></h1>
                 </div>
                <div>
                <?php
                if($action=='edit'){
                    $id        = $editdata['id'];
                    $name      = $editdata['feature_name'];
                }
                ?>
                <div class="panel-collapse">
                <div class="panel-body">
                    <div class="ad-manager">
                <form role="form" action="<?php if($action=='add'){echo site_url('admin/feature/add_save');}else{echo site_url('admin/feature/edit_save');}?>" method="post" enctype="multipart/form-data" id="feature_add_edit_form">                    
               <div class="form-group">
                        <label class="control-label">Feature Name :</label>
                         <div class="ad-manager-full-input"><input type="text" class="form-control required" name="feature_name" value="<?php if(isset($name)){ echo $name;} ?>" /></td>
                    </div>
                   <div class="form-group margin-tops">
                        <label class="control-label">Package:</label>
                         <div class="ad-manager-full-input">

                            <select name="package" class="form-control required">
                                <?php 
                                if(is_array($packages)){
                                        foreach($packages as $package):
                                    ?>
                                    <option value="<?php echo $package['package_name'];?>" <?php if($action == 'edit'){ if($editdata['package']  == $package['package_name']){?> selected="selected" <?php } }?> ><?php echo $package['package_name'];?></option>
                                <?php 
                                    endforeach;
                                } 
                               ?>
                            </select>
</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="ad-manager-btns">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="centre">

                        <?php if(isset($id)){ ?><input type="hidden" name="id" value="<?php echo $id; ?>" /><?php }?>
                        

                        <input type="submit" class="btn btn-primary btn-default" id="btn_save" name="save_feature" value="Save"/> 
                        <input type="reset" class="btn btn-primary btn-default" id="feature_reset" /> 
                        <input type="button" class="btn btn-primary btn-danger" value="Cancel" onclick="history.go(-1)" />
                        </div>
                    </div>
<div class="form-group">
                    </div>
                        </td>
                    </tr>
                </table>

                </form>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
