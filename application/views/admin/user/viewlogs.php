<?php //var_dump($recordData);?>
<div class="container">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                <h1 class="txt-color-blueDark">User Log View</h1>
                </div>
                <?php flash() ?>
                <div class="panel-collapse">
                    <div class="panel-body">
                        <div class="ad-manager">
                            <?php if(is_array($recordData)){?>
                            <div class="form-group">
                                <label class="control-label">User Id:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['user_id'];?></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">User Login Time:</label>
                                <div class="ad-manager-full-input">
                                    <?php echo date('Y/m/d h:i:s', $recordData['login_time']); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">User Login Out:</label>
                                <div class="ad-manager-full-input">
                                    <?php echo ($recordData['logout_time']) ? date('Y/m/d h:i:s', $recordData['logout_time']) : 'Not Logged Out'; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">User Login Browser:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['login_browser'];?></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">User Login OS:</label>
                                <div class="ad-manager-full-input"><?php echo ucwords($recordData['login_os']);?></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">User Login IP:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['login_ip'];?></div>
                            </div>
                            <?php  } ?>
                            <input type="button" onclick="history.go(-1)" value="Back" class="btn btn-default  btn-primary">
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
