<div class="">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                <h1 class="txt-color-blueDark">Reset Password</h1>
                </div>
                <?php flash() ?>
                <div class="panel-collapse">
                <div class="panel-body">
                    <form role="form" id="user_resetpassword_form" method="post" action="<?php echo base_url('admin/user/reset_password/'.segment(4))?>" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <input placeholder="Password" type="password" class="form-control required" name="password" id="password" value="" />
                                </td>
                            </tr>
                            
                             <tr>
                                <td>Confirm Password</td>
                                <td>
                                    <input placeholder="Confirm Password" type="password" class="form-control required" name="cpassword" id="cpassword" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="id" value="<?php echo segment(4);?>">
                                </td>
                            </tr>
                           
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-default btn-primary" type="submit" name="reset_password" value="Reset Password"/>
                                    <input class="btn btn-default btn-primary" type="reset" value="Reset" id="reset"/>
                                    <input class="btn btn-default  btn-danger" type="button" value="Cancel" onclick="history.go(-1);"/>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#user_resetpassword_form').validate({
             rules: {
                password: {
                        required: true,
                        minlength : 5
                    },
                cpassword: {
                      equalTo: "#password",
                      minlength : 5
                }
            }
        });
    })
</script>