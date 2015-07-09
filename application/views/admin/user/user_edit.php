<div class="">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                <h1 class="txt-color-blueDark">Edit User</h1>
                </div>
                <?php flash() ?>
                <div class="panel-collapse">
                <div class="panel-body">
                    <form role="form" id="user_add_edit_form" method="post" action="<?php echo base_url('admin/user/edit/'.segment(4))?>" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>First Name</td>
                                <td>
                                    <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $detail[0]['first_name']; ?>"/>
                                </td>
                            </tr>
                            <?php /* <tr>
                                <td>Middle Name</td>
                                <td>
                                    <input type="text" class="form-control" name="mname" id="mname" value="<?php echo $detail[0]['middle_name']; ?>"/>
                                </td>
                            </tr> 
                            <tr>
                                <td>Last Name</td>
                                <td>
                                    <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $detail[0]['last_name']; ?>"/>
                                </td>
                            </tr> */?>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $detail[0]['email']; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <input placeholder="Password Locked" type="password" class="form-control" name="password" id="password" value="<?php echo $detail[0]['original_password'];?>" />
                                </td>
                            </tr>
                            <?php /* <tr>
                                <td>Birthday</td>
                                <td>
                                    Month: <select name="month" class="required">
                                        <option value="">Month</option>
                                        <?php for($i = 1; $i <= 12; $i++) { ?>
                                            <option value="<?php echo $i; ?>" <?php echo ($i == date('m', $detail[0]['dob'])) ? 'selected' : '';?>>
                                                <?php echo $i; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    Day: <select name="day" class="required">
                                        <option value="">Day</option>
                                        <?php for($i = 1; $i <= 31; $i++) { ?>
                                            <option value="<?php echo $i; ?>" <?php echo ($i == date('d', $detail[0]['dob'])) ? 'selected' : '';?>>
                                                <?php echo $i; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    Year: <select name="year" class="required">
                                        <option value="">Year</option>
                                        <?php for($i = date('Y'); $i >= 1905; $i--) { ?>
                                            <option value="<?php echo $i; ?>" <?php echo ($i == date('Y', $detail[0]['dob'])) ? 'selected' : '';?>>
                                                <?php echo $i; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr> */?>
                             <?php if($detail[0]['account_type'] != 2) {?>
                            <tr>
                                <td>Gender</td>
                                <td>
                                    Male: <input type="radio" name="gender" value="1" <?php echo ($detail[0]['gender'] == 1) ? 'checked' : '' ?>/><br/>
                                    Female: <input type="radio" name="gender" value="2" <?php echo ($detail[0]['gender'] == 2) ? 'checked' : '' ?>/>
                                </td>
                            </tr>
                            <?php  } ?>

                            <tr>
                                <td>
                                    Account Type
                                </td>
                                <td>
                                    <select name="account_category" onchange="get_care_type($(this).val())">
                                        <option value="">Select Account Type</option>
                                        <option value="1" <?php echo ($detail[0]['account_category'] == 1) ? 'selected' : '' ?>>Caregiver</option>
                                        <option value="2" <?php echo ($detail[0]['account_category'] == 2) ? 'selected' : '' ?>>Careseeker</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Care Type
                                </td>
                                <td>
                                    <select id="care_type" name="care_type">
                                        <option value="">Select Care Type</option>
                                        <optgroup label="Individual">
                                            <?php
                                            $flag = 0;
                                            foreach($care as $c) { ?>
                                                <option value="<?php echo $c['id'] ?>" <?php echo ($detail[0]['care_type'] == $c['id']) ? 'selected' : ''; ?>>
                                                    <?php
                                                    echo $c['service_name'];
                                                    if($c['service_by'] == 2 && $flag != 1) {
                                                        echo '</optgroup><optgroup label="Organization">';
                                                        $flag = 1;
                                                    }
                                                    ?>
                                                </option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Activate Account?</td>
                                <td><input type="checkbox" name="activate" <?php echo ($detail[0]['status'] == 1) ? 'checked' : '' ?>/></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-default btn-primary" type="submit" name="add_user" value="Save"/>
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
