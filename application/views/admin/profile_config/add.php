<div class="">
    <div class="padding-10">
    <div class="row main-content">
        <div class="">
            <?php flash();?>
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                <h1 class="txt-color-blueDark">Add Experince Configuration</h1>
                <span><?php if($this->session->flashdata('info')){echo $this->session->flashdata('info');}?></span>
                </div>
                <div class="panel-collapse">
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo site_url();?>admin/profile_config/add_experinces" enctype="multipart/form-data">
                        <table> 
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                   <select name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </td>
                            </tr>    
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-default" type="submit" value="Save Changes" name="save" />
                                    <input class="btn btn-default btn-danger" type="button" value="Cancel" onclick="history.go(-1);"/>
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

