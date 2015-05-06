<?php $seg4 = segment(4);?>
<div class="container">
    <div class="padding-10 content-box">
    <div class="row main-content">
        <div class="">
        <span class="someinfo"><?php flash();?></span>
            <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="txt-color-blueDark">
                <i class="fa fa-lg fa-fw fa-ticket"></i> <span>Ticket View</span>
                </h1>
                <div>
                <div class="panel-body">
                  <div class="table-responsive">
                   <div class="ticket-manager">
                        <div class="form-group">
                            <label class="control-label">Ticket Id:</label>
                            <div class="ad-manager-full-input"><?php echo $details[0]->ticketId + 10000;?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ticket Subject:</label>
                            <div class="ad-manager-full-input"><?php echo ucwords($details[0]->subject);?></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Ticket Description:</label>
                            <div class="ad-manager-full-input"><?php echo nl2br($details[0]->description);?></div>
                        </div>

                         <div class="form-group">
                            <label class="control-label">File:</label>
                            <div class="ad-manager-full-input">
                                <?php if(file_exists('uploads/files/'.$details[0]->file) && $details[0]->file!=''){?>
                                    <a href="<?php echo site_url();?>uploads/files/<?php echo $details[0]->file;?>" target="_blank">Click here to view/download the file</a>
                                <?php }else{ ?>
                                No file submitted
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <div class="ticket-logs">
                    <div id="conversation-log" width="100%">
                        <?php foreach($details as $detail):?>
                            <?php if($detail->status==0):?>
                                <div class="form-group">
                                    <div class="ad-manager-full-inputs">
                                        <div class="bubble you">
                                            <div class="detials">
                                                <?php echo $detail->reply_text?>
                                            </div>

                                            <div class="detials">
                                                <?php echo $detail->internal_comments;?>
                                            </div>

                                            <div class="time">
                                                 <?php echo date('h:iA, d M Y', $detail->replydate)?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else:?>
                                <div class="form-group">

                                    <div class="ad-manager-full-inputs">
                                        <div class="bubble me">
                                            <div class="detials">
                                                <?php echo $detail->reply_text;?>
                                            </div>

                                            <div class="time">
                                                <?php echo $detail->internal_comments;?>
                                            </div>
                                                <br/>
                                            <div class="time">
                                                <?php echo date('h:iA, d M Y', $detail->replydate)?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif?>
                        <?php endforeach?>
                    </div>
                    </div>
                </div>
                    <table>

                    <div class="form-group">
                        <label class="control-label">Status:</label>
                        <div class="ad-manager-full-input">
                            <?php if($details[0]->ticket_status == '0'){ echo 'Open'; }else{ echo 'Closed'; }?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Action:</label>
                        <div class="ad-manager-full-input">    
                            <a href="<?php echo site_url();?>admin/ticket/changestatus/<?php echo segment(4);?>" onclick="return confirm('Are you sure to complete this ticket?')">Mark as Complete</a>
                            |<a href="<?php echo site_url();?>admin/ticket/delete/<?php echo segment(4);?>" onclick="return confirm('Are you sure to delete this ticket?')">Delete</a> 
                        </div>
                    </div>
                    </table>
                <form role="form" id="ticket_reply">    

                    <textarea id="reply_text" name="reply_text" style="width: 66%; height: 36px;" placeholder="Add your comment"></textarea> 
                    <br />
                    <br />
                    <textarea id="internal_comments" id="internal_comments" style="width: 66%; height: 36px;" name="internal_comments" placeholder="Please add internal comments"></textarea>

                    <input type="hidden" name="emailaddress" value="<?php echo $commentordetail['email'];?>">
                    <input type="hidden" name="subject" value="<?php echo $commentordetail['subject'];?>">

                    <br>
                    <br>
                     <div class="ad-manager-btns">
                    <input class="btn btn-primary reply" type="submit" value="Reply Ticket" <?php if($commentordetail['status'] == 1){?> disabled="disabled" <?php } ?>/>
                </div>

                </form>

                <br />
               
                <div class="ad-manager-btns">
                    <?php prev_next('admin/ticket/view', $commentordetail['id'], 'tbl_tickets');?>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php $this->ticket->set_as_viewed($seg4)?>
<script type="text/javascript">
$('#reset').click(function(){
    var desc_value=$('#original_desc').val();
    //alert (desc_value);
    CKEDITOR.instances.testimonial_description.setData(desc_value);
});

$('#ticket_reply').submit(function(e){
    e.preventDefault();
    var check= $('#reply_text').val();
    if($.trim(check)!=""){
        var formdata = $(this).serialize();
        $('#reply_text').val('');
        $('#internal_comments').val('');
        $.ajax({
            url: '<?php echo site_url("admin/ticket/add_reply/{$this->uri->segment(4)}")?>',
            type: 'post',
            data: formdata,
            success: function(res){
                $('#conversation-log').append(res);
            }
        })
    }else{
        alert('Please write reply.');return false;
    }
});
</script>
