<div class="">
    <div class="padding-10 content-box">
            <div class="row main-content">
                <div class="">
                <span class="someinfo"><?php flash();?></span>
                <div class="panel panel-default">
                <div class="panel-heading">
                <h1 class="txt-color-blueDark">
                <i class="fa fa-lg fa-fw fa-envelope"></i> <span>Email Log Details</span>
                </h1>
                
                <div class="panel-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                        <?php
                            if(!$detail)
                            {
                                ?>
                                No Data Found.
                                <?php
                            }
                            else
                            {
                                foreach($detail as $cat)
                                {
                                    //print_r($cat);
                                    ?>
                                        <tr>
                                            <th>Email Sent Date</th>
                                            <td><?php echo $cat['sent_date'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Email Subject</th>
                                            <td class="email_subject"><?php echo $cat['email_subject'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Email Sent By</th>
                                            <td><?php echo $cat['sent_by'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Email Sent To</th>
                                            <td class="sent_to"><?php echo $cat['sent_to'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Email Content</th>
                                            <td class="content"><?php echo $cat['email_content'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Actions</th>
                                            <td>
                                                <?php prev_next('admin/emaillogs/view',$cat['id'],'tbl_email_logs');?>
                                                <a href="<?php echo site_url('admin/emaillogs/delete')."/".$cat['id'];?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this email?');">Delete</a>
                                                <a href="javascript:void(0);" class="btn btn-info reply" id="replyemail">Reply</a>
                                                <a href="javascript:void(0);" class="btn btn-info forward" id="forwardemail">Forward</a>    
                                                <a href="<?php echo site_url();?>admin/emaillogs/markasurgent/<?php echo $cat['id'];?>" class="btn btn-info" onclick="return confirm('Are sure to mark this message as urgent?');">Mark as Urgent</a>    
                                                <a href="<?php echo site_url();?>admin/emaillogs/markasunread/<?php echo $cat['id'];?>" class="btn btn-info" onclick="return confirm('Are sure to mark this message as unread?');">Mark as Unread</a>    
                                                <input class="btn btn-default" type="button" value="Back" onclick="history.go(-1);"/>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function(){
        $('.reply').click(function() {
            var sentto = $('.sent_to').text();

            $('.sender_emailaddress').val(sentto);
                $('#dialog_simple').dialog('open');
                $('.replyform').show();
                $('.forwardform').hide();
                return false;
        
        });

        function add(){
            var $myRequest = $.ajax({
                type:"post",
                url:"<?php echo site_url();?>admin/emaillogs/reply",
                data : $('#replyemail').serializeArray(),
                success:function(msg){
                    $('#dialog_simple').dialog("close");
                }
            });
        }


        $('#dialog_simple').dialog({
                autoOpen : false,
                width : 600,
                resizable : false,
                dragable: false,
                modal : true,
                buttons : [{
                    html : "Send",
                    "class" : "btn btn-info",
                    "id"    : "replyemail",
                    click : function() {
                       add();
                    }
                }, {
                    html : "<i class='fa fa-times'></i>&nbsp; Cancel",
                    "class" : "btn btn-default",
                    click : function() {
                        $(this).dialog("close");
                        $myRequest.abort();
                    }
                }]
        }); 

        $('.forward').click(function(){
                $('#dialog_simple').dialog('open');
                    var emailsub = $('.email_subject').text();
                    $('.forwardsubject').val(emailsub);
                    $('.message').val($('.content').text());
                    $('.forwardform').show();
                    $('.replyform').hide();
                return false; 
        });

  });
</script>

<!-- reply email starts-->
<div id="dialog_simple">
    <div class="replyform" style="display:none;">
        <form method="post" action="" id="replyemail">
                <table>
                    <tr>
                        <th>To:</th>
                        <td>
                            <input type="text" name="send_to" class="form-control sender_emailaddress" readonly="readonly" id="send_to"/>
                        </td>
                    </tr>

                    <tr>
                        <th>Subject:</th>
                        <td>
                            <input type="text" name="subject" class="form-control" id="subject" />
                        </td>
                    </tr>

                    <tr>
                        <th>Message:</th>
                        <td>
                            <textarea name="email_content" rows="5" cols="20" class="form-control required" id="email_content"></textarea>
                        </td>
                    </tr>
                </table>
        </form>
    </div>


    <div class="forwardform" style="display:none;">
            <form method="post" action="" id="forwardemail">
                <table> 
                    <tr>
                        <th>To</th>    
                        <td>
                            <input type="text" name="receiver" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <th>Subject</th>    
                        <td>
                            <input type="text" name="subject" class="form-control forwardsubject" />
                        </td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>
                            <textarea name="message" rows="5" cols="20" class="message"></textarea>
                        </td>
                    </tr>
                </table>
            </form>
    </div>


</div>
<!-- reply email ends-->
