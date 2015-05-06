<div class="">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="">
                <span class="someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="txt-color-blueDark">
                        <i class="fa fa-lg fa-fw fa-envelope"></i><span class="break"></span> <span>Email Logs Manager</span>
                      </h1>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                                <tr class="success">
                                    <th>Subject</th>
                                    <th>Sent By</th>
                                    <th>Sent To</th>
                                    <th>Sent Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!$emaillogs)
                                {
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    foreach($emaillogs as $cat)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $cat['email_subject'];?></td>
                                            <td><?php echo $cat['sent_by'];?></td>
                                            <td><?php echo $cat['sent_to'];?></td>
                                            <td><?php echo date("jS F Y", strtotime($cat['sent_date'])); ?></td>
                                            <td>
                                                <a href="<?php echo site_url('admin/emaillogs/view')."/".$cat['id'];?>" class="btn btn-info" title="View">View</a>
                                                <a href="<?php echo site_url('admin/emaillogs/delete')."/".$cat['id'];?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this email?');">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>