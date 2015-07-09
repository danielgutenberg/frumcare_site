<div class="">
    <div class="padding-10 content-box">
            <div class="row main-content">
                <div class="">
                <div class="panel panel-default">
                <div class="panel-heading">
                <h1 class="txt-color-blueDark">
                <i class="fa fa-lg fa-fw fa-user"></i> <span>Admin Profile View</span>
                </h1>
                
                <div class="panel-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                        <?php
                            if(!$recdata)
                            {
                                ?>
                                No Data Found.
                                <?php
                            }
                            else
                            {
                                    ?>
                                    	<tr>
                                            <th>Full Name</th>
                                            <td><?php echo $recdata['full_name'];?></td>
                                        </tr>

                                        <tr>
                                            <th>User Name</th>
                                            <td><?php echo $recdata['username'];?></td>
                                        </tr>

                                        <tr>
                                            <th>Password</th>
                                            <td><?php echo encrypt_decrypt('decrypt',$recdata['password']);?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Email Address</th>
                                            <td><?php echo $recdata['email1'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Role</th>
                                            <td><?php echo $recdata['role'];?></td>
                                        </tr>
                                    <?php
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

