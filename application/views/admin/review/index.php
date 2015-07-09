<div class="">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="">
                <span class="someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="txt-color-blueDark">
                    <i class="fa fa-lg fa-fw fa-file-text-o"></i> <span>Review Manager</span>
                      </h1>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                                <tr class="success">
                                    <th>Ticket Id</th>
                                    <th>Submitted By</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if(!$details)
                                {
                                    ?>
                                    <?php
                                }
                                else
                                {
                                    foreach($details as $review)
                                    {   
                                      
                                        ?>
                                        <tr>
                                            <td><?php echo $review['id'];?></td>
                                            <td><?php echo ucwords($review['name']);?></td>
                                            <td><?php echo number_format($review['review_rating']);?></td>
                                            <td><?php if($review['status'] == 1)echo "Active";else echo "Inactive";?></td>
                                            <td>
                                                <a href="<?php echo site_url("admin/review/view/{$review['id']}");?>" class="btn btn-info" title="View">Edit</a>
                                                <a href="<?php echo site_url("admin/review/delete/{$review['id']}");?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this review?');">Delete</a>
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
