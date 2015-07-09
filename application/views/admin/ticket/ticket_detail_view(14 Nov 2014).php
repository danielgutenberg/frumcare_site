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

                        <?php /* <div class="form-group">
                            <label class="control-label">File:</label>
                            <div class="ad-manager-full-input">
                                <?php if(file_exists('uploads/files/'.$details[0]->file) && $details[0]->file!=''){?>
                                    <a href="<?php echo site_url();?>uploads/files/<?php echo $details[0]->file;?>" target="_blank">Click here to download the file</a>
                                <?php }else{ ?>
                                No file submitted
                                <?php } ?>
                            </div>
                        </div> */?>



                    </div>
                    <div class="ticket-logs">
                    <table id="conversation-log" width="100%">
                        <?php foreach($details as $detail):?>
                            <?php if($detail->status==0):?>
                                <div class="form-group">
                                    <label class="control-label"><div class="bubble you"><div><?php echo $detail->reply_text?></div><div class="time"><?php echo date('h:iA, d M Y', $detail->replydate)?></div></div></label>
                                    <div class="ad-manager-full-input">&nbsp;</div>
                                </div>
                            <?php else:?>
                                <div class="form-group">
                                    <label class="control-label">&nbsp;</label>
                                    <div class="ad-manager-full-input"><div class="bubble me"><div><?php echo $detail->reply_text;?></div><div class="time"><?php echo date('h:iA, d M Y', $detail->replydate)?></div></div></div>
                                </div>
                            <?php endif?>
                        <?php endforeach?>
                    </table>
                    </div>
                </div>
                    <table>
                    <div class="form-group">
                        <label class="control-label">Action</label>
                        <div class="ad-manager-full-input">    
                            <a href="<?php echo site_url();?>admin/ticket/changestatus/<?php echo segment(4);?>" onclick="return confirm('Are you sure to complete this ticket?')">Mark as Complete</a>
                            |<a href="<?php echo site_url();?>admin/ticket/delete/<?php echo segment(4);?>" onclick="return confirm('Are you sure to delete this ticket?')">Delete</a> 
                    </div>
                    </table>

                <form role="form" id="ticket_reply">    
                    <textarea id="reply_text" name="reply_text" style="width: 66%; height: 36px;" placeholder="Add your comment"></textarea> 
                    <input class="btn btn-success" type="submit" value="+"/>
                </form>

                <?php if($next!=''){?><a href="<?php echo site_url();?>admin/ticket/view/<?php echo @$next['id'];?>">Next</a><?php } ?>| 
                <?php if($previous!=''){?><a href="<?php echo site_url();?>admin/ticket/view/<?php echo @$previous['id'];?>">Previous<?php } ?></a>
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
        $.ajax({
            url: '<?php echo site_url("admin/ticket/add_reply/{$this->uri->segment(4)}")?>',
            type: 'post',
            data: formdata,
            success: function(res){
                $('#conversation-log').append(res);
            }
        })
    }
})
</script>
