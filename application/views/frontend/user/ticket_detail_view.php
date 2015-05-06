<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">

    <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
       <?php $this->load->view('frontend/user/dashboard_nav');?>
   </div>
   <div class="dashboard-right float-right">

     <div class="top-welcome">
        <h2>View Ticket</h2>
    </div>
    <div class="well">
        <p class="h4">My Query</p>
        <table class="table table-striped" >
            <tr>
                <th>Ticket Subject</th>
                <td><?php echo (isset($details[0]->subject) && $details[0]->subject!='')?$details[0]->subject:'No Subject';?></td>
            </tr>
            <tr>
                <th>Ticket Description</th>
                <td><?php echo (isset($details[0]->description) && $details[0]->description!='')?$details[0]->description:'No Description';?></td>
            </tr>
            <tr>
                <th>File</th>
                <td>

                    <?php 
                    if(isset($details[0]->file) && $details[0]->file!=''){
                        $filepath   = site_url().'uploads/files/'.$details[0]->file;
                        $link       =  "Click here to download the file";
                    }else{ 
                        $filepath   = site_url().'#';
                        $link       =  "No file";      
                    } 
                    ?>
                    <a href="<?php echo $filepath;?>" target="_blank"><?php echo $link;?></a>
                </td>
            </tr>
            <tr>
                <th>Submitted date and time</th>
                <td><?php echo $details[0]->submitted_date;?></td>
            </tr>
        </table>
    </div>
    <div class="ticket-replies">
        <?php 
        /* if(($details[0]->created_date) && ($details[0]->reply_text)){ */ 
            $num = count($details);
            ?>

            <p class="h4 reply-title">Reply</p>
            <?php  
            for($i = 0; $i < $num;$i++ ){ 
                ?>
                <div class="reply">
                    <?php
                    if(isset($details[$i]->created_date)){
                        ?>

                        <p><strong>Reply date and time</strong></p>
                        <p><?php echo @$details[$i]->created_date;?></p>
                        <?php 
                    } 
                    if(isset($details[$i]->reply_text)){    
                        ?> 

                        <p><strong>Description</strong></p>
                        <div>
                            <?php echo (isset($details[$i]->reply_text) && $details[$i]->reply_text!='')?$details[$i]->reply_text:'No Description';?>
                        </div>
                        <?php  
                    }
                    ?>
                </div>
                <?php 
            } 
            ?>

        </div>
        <button class="btn btn-info" onclick="window.history.back();">Back</button>
    </div>
</div>
