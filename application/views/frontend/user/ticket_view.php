<?php 
    $ci = &get_instance();
    if(!$ci->input->is_ajax_request()){
        ?>
        <link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
        <div class="container">
        <?php echo $this->breadcrumbs->show();?>
            <div class="dashboard-left float-left">
                 <?php $this->load->view('frontend/user/dashboard_nav');?>
            </div>
             <div class="dashboard-right float-right">
                <div class="top-welcome">
                    <h2>My Notifications</h2> 
                        <?php if(!$record){?> 
                        <a href='#' id='ticketModal' data-toggle='modal' data-target='#ticketModal' class="btn btn-info">
                            Submit a ticket
                        </a> 
                        <?php  } ?> 
                </div>
                <?php 
                    if(user_flash()){
                        echo user_flash();
                    }
   }     
        ?>
        <div id="ticket">
            <table class="table table-bordered table-striped">  
                <?php
                    if(!$record){?>
                        <p>No tickets have been submitted.</p>
                        <?php
                    }
                    else{?>
                        <tr>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php
                        foreach($record as $tic){?>
                            <tr>
                                <td>
                                    <?php $subject = ucwords($tic->subject);?>
                                    <?php if(strlen($subject)>100){$subject = substr($subject,0,60);}?>
                                    <?php echo $subject;?>
                                </td>                    
                                <td><?php if($tic->status == 1) {echo "Closed";}else{echo "Open";}?></td>
                                <td><?php echo $tic->created_date; ?></td>
                                <td>
                                    <a href="<?php echo site_url()."user/ticket_detail_view/$tic->id";?>"><button class="btn btn-success">View</button></a>
                                </td>
                                <td>   
                                    <a href="<?php echo site_url();?>user/deleteticket/<?php echo $tic->id;?>"><button class="btn btn-danger" onclick="return confirm('Are you sure to delete this ticket?')">Delete</button>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            <div><?php echo $links;?></div>
        </div> 

        <?php if($record){?> 
                <a href='#' id='ticketModal' data-toggle='modal' data-target='#ticketModal' class="btn btn-info">
                    Submit a ticket
                </a> 
        <?php  } ?> 

        <?php if(!$ci->input->is_ajax_request()) {?>   
    </div>
</div>
    <div class="modal fade help-page" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Submit a Ticket <button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-hidden="true">&times;</button></div>
            <div class="modal-body">
                <form class="ticket" enctype="multipart/form-data" method="post">   
                    <label>Ticket Title</label>
                    <input type="text" name="ticket_title" class="title">
                    <br/>
                    <label>Ticket Description</label>
                    <textarea name="ticket_description" class="desc"></textarea>
                    <br/>
                    <label>File</label>
                    <input type="hidden" id="file-name" name="file">
                    <button class="btn btn-default" id="select_file">Select File</button>
                    <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
                    <div id="output" class="loader"></div>
                    <br/>
                    <label>Contact Email</label>
                    <input type="text" name="contact_email" class="email">
                    <br/>
                    <label>Contact Number(Optional)</label>
                    <input type="text" name="contact_number">
                    <input type="hidden" name="date" value="<?php echo time();?>">
                    <div class="modal-footer">
                     <button class="btn closeform" data-dismiss="modal" aria-hidden="true">Close</button>
                     <input type="submit" class="btn btn-primary save_ticket" value="Save Changes" />
                    </div>
                </form>
                <div id="success"></div>
            </div>
        </div>

    </div>
</div>
       


<script type="text/javascript">
    $(function(){
        $(".ticket").validate({
            // Specify the validation rules
            rules: {
                ticket_title: "required",
                contact_email: {
                    required: true,
                    email: true
                },
                contact_number: {
                  number: true,
                  digits: true,
                  maxlength: 10
                }
            },
            // Specify the validation error messages
            messages: {
                ticket_title: "Please enter ticket title",
                contact_email: "Please enter a valid email address",
            },
            submitHandler: function(form) {
                     $.ajax({
                        type: "POST",
                        url: "<?php echo site_url();?>user/submit_ticket",
                        data: $('form.ticket').serializeArray(),
                        success: function(data){
                            $("form.ticket").get(0).reset();
                            jQuery('#success').show().html('<p class="success">Your ticket has been submitted.</p>');
                            jQuery('.ticket').hide();
                        },
                    error: function(){
                        alert("failure");
                        }
                    });
              return true;
            }
        });



        // modal box section goes here 
        $('#ticketModal').on('click', function(e){
            e.preventDefault();
            var current_user = "<?php if(isset($this->session->userdata['current_user'])) echo $this->session->userdata['current_user'] ;?>";
            if(current_user!=''){
                $('#success').hide();
                $('.ticket').show();
                $('#reportModal').modal();  
            }else{
                window.location.href='<?php echo site_url();?>login';
            }
                
        });
        
        $(".close").on("click", null, null, function(){
            $('.modal-backdrop').hide();
            $('.title error').removeclass('.title error');
            
        });

        $(".closeform").on("click", null, null, function(){
            $('.modal-backdrop').hide();
        }); 
    });
</script>

<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/uploadfile?files")?>';
    $('#select_file').click(function(e){
        e.preventDefault();
        $('#file_upload').trigger('click');
    });//CODE BY CHAND
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
<!-- FILE UPLOAD -->
<?php } ?>