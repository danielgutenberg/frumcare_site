<div class="">
    <div class="padding-10">
        <div class="row main-content">
            <?php flash();?>
               <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                    <h1 class="txt-color-blueDark"><i class="fa fa-lg fa-fw fa-ticket"></i><?php if($action=='add'){echo "Add";}else{echo "Edit";}?> Package Details</h1>
                </div>
                <div>
                <?php
                if($action=='edit')
                {
                    $id=$editdata['id'];
                    $name=$editdata['package_name'];
                    //$desc=$editdata['package_desc'];
                    $price=$editdata['package_price'];
                    $duration=$editdata['package_duration'];
                    //$stauts=$editdata['isActive'];
                    $duration_time = $editdata['duration_time'];
                }
                ?>
                <div class="panel-collapse">
                <div class="panel-body">
                
                <form role="form" action="<?php if($action=='add'){echo site_url('admin/package/add_save');}else{echo site_url('admin/package/edit_save');}?>" method="post" enctype="multipart/form-data" id="package_add_edit_form">
                <table>
                    <tr>
                        <td>Package Name : </td>
                        <td><input type="text" class="form-control required" name="package_name" value="<?php if(isset($name)){ echo $name;} ?>" /></td>
                    </tr>
                    <tr>
                        <td>Price : </td>
                        <td>
                            <br />
                            <div class="input-group packageprice">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                <input class="form-control required" id="prepend" type="text" name="package_price" placeholder="10.00" value="<?php if(isset($price)){ echo $price;} ?>"  />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Duration:</td>
                        <td>
                            <input type="text" class="form-control required number" name="package_duration" value="<?php if(isset($duration)){ echo $duration;} ?>" maxlength="2" placeholder="Duration" />
                            <select class="form-control" name="duration_time">
                                <option value="Month" <?php if($action == 'edit'){ if($duration_time == 'Month'){?> selected="selected" <?php } }?> >Month</option>
                                <option value="Year" <?php if($action == 'edit'){ if($duration_time == 'Year'){?> selected="selected" <?php } }?>>Year</option>
                            </select>
                        </td>
                    </tr>
                    <tr><td><br /></td><td><br /></td></tr>
                    <tr>
                        <td>Package Features :</td>
                        <td>
                           <?php
                           if(isset($features) && $features!=null)
                           {
                                foreach($features as $feature)
                                {
                                    $pfs = array();
                                    foreach($package_features as $pf)
                                    {
                                        $pfs[] = $pf['feature_id'];
                                    }
                                    ?>
                                    <input <?php if(in_array($feature['id'],$pfs)){echo 'checked="checked"';}?> type="checkbox" name="package_features[]" value="<?php echo $feature['id']?>" /><?php echo $feature['feature_name'];?><br />
                                    <?php
                                }
                           }
                           else
                           {
                            echo "No Features Added Yet. Go to <a href='".site_url('admin/feature/add')."'>Add Features</a>";
                           }
                           ?> 
                        </td>
                    </tr>
                    <tr><td><br /></td><td><br /></td></tr>
                    <tr>
                        <td colspan="2">
                        <?php if(isset($id)){ ?><input type="hidden" name="id" value="<?php echo $id; ?>" /><?php }?>
                        
                        <input type="submit" class="btn btn-default" id="btn_save" name="save_package" value="Save"/> 
                        <input type="reset" class="btn btn-default" id="package_reset" /> 
                        <input type="button" class="btn btn-default" value="Cancel" onclick="history.go(-1)" />
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
</div>
