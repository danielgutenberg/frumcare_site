<?php home_flash();?>
		    <div class="alert alert-success alert-dismissible invite_response" role="alert" style="display:none">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
<main class="site-main">
    <section class="banner">
        
        <ul id="site-banner" class="banner-main">
            <li class="banner-item home_page_banner" style='background-image:url(img/banner-bg.jpg);'>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="banner-title" style="text-align:center">
                                We Connect <br> Jewish Families with Caregivers
                            </h2>
                        </div>
                    </div>
                    <div style="float:none" class="banner-images row">
                        <div style="margin-bottom:5px" class="col-xs-4 col-sm-3 col-med-offset-2 col-sm-offset-0 col-xs-offset-2 col-med-2 hide-tiny">
                            <a title="Child Care"><img src="img/banner%20images/woman-taking-care-of-girl1.png" alt="#"/><span>Child Care</span></a>
                        </div>
                        <div style="margin-bottom:5px" class="col-xs-4 col-sm-3 col-med-2 hide-tiny">
                            <a title="Senior Care"><img src="img/banner%20images/man-helping-elderly1.png" alt="#"/><span>Senior Care</span></a>
                        </div>
                        <div class="clearfix showdiv-xs"></div>
                        <div style="margin-bottom:5px" class="col-xs-4 col-sm-3 col-med-2 col-xs-offset-2 col-sm-offset-0 hide-tiny">    
                            <a title="Special Needs Care"><img src="img/banner%20images/ThinkstockPhotos-4684690051.png" alt="#"/><span>Special Needs Care</span></a>
                        </div>
                        <div style="margin-bottom:5px" class="col-xs-4 col-sm-3 col-med-2 hide-tiny">
                            <a title="Cleaning & Household Help"><img src="img/banner%20images/woman-doing-house-chores1.png" alt="#"/><span class="col-xs-11" style="padding-left:2px">Cleaning & Household Help</span></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="row" style="margin-top:25px">
                        <div class="home_page_buttons-lg home_page_buttons-md home_page_buttons-sm home_page_buttons-xs home_page_buttons-xxs buttons-xxxs buttons-xxxxs">
                                <a href="<?php echo site_url('caregivers/all');?>" class="place-ad-link link-block">FIND A CAREGIVER</a>
                        </div>
                        <div class="home_page_buttons2 home_page_buttons-md2 home_page_buttons-sm2 home_page_buttons-xs2 home_page_buttons-xxs buttons-xxxs buttons-xxxxs">
                                <a href="<?php echo base_url('jobs/all') ?>" class="place-ad-link link-block">FIND A JOB</a>
                        </div>
                    </div>
        </section>

        <section class="how-it-works">
            <div class="container">
                <h2 class="title">How it works <span><a href="<?php echo site_url();?>howitworks">Learn More</a></span></h2>

                <ol class="how-it-works-display">
                    <li class="item lookingfor">
                        <h3 class="sub-title">I am looking for</h3>
                        <a>
                            <i class="icon-caregiver"></i><br/>
                            Caregiver
                        </a>
                        <a>
                            <i class="icon-find-job"></i><br/>
                            Find a Job
                        </a>
                        <a>
                            <i class="icon-employees"></i><br/>
                            Employees
                        </a>
                    </li>
                    <li class="item create-listing">
                        <h3 class="sub-title">Create a Listing</h3>
                        <a>
                            <i class="icon-profile"></i><br/>
                            Create a Profile
                        </a>
                        <a>
                            <i class="icon-job"></i><br/>
                            Post a Job
                        </a>

                        <!-- <ol class="createlisting">
                            <li><a href="<?php //echo site_url();?>signup">Create a Profile</a></li>
                            <li><a href="<?php //echo site_url();?>ad">Post a Job</a></li>
                        </ol> -->
                    </li>
                    <li class="item item-search">
                        <h3 class="sub-title">Search</h3>
                        <a><i class="icon-search-circle"></i><br/>
                            Search Caregivers
                        </a>
                        <a><i class="icon-search-circle-jobs"></i><br/>
                            Search Jobs
                        </a>

                        <!-- <p>
                            Ut at metus auctor, fermentum justo ut, egestas neque. Nunc in ultrices leo, et pharetra dolor.
                            Donec
                        </p> -->
                    </li>
                    <li class="item item-hire">
                        <h3 class="sub-title">Hire</h3>
                        <a>
                            <i class="icon-employees"></i><br/>
                            Hire
                        </a>
                        <a><i class="icon-hire"></i><br/>
                            Get Hired
                        </a>

                        <!-- <p>Ut at metus auctor, fermentum justo ut, egestas neque. Nunc in ultrices leo, et pharetra dolor.
                        Donec</p> -->
                    </li>
                </ol>
            </div>
        </section>
        <!--end .how-it-works-->

        <section class="safety-first">
            <div class="container">

                <h2 class="title">We put safety first</h2>


                <div class="row">
                    <div class="col-half border-right">

                        <h2><a href="safety-guide/families" style="color:white">Safety Guide</a></h2>
                        <?php
                        $this->load->model('blog_model');
                        $safetyposts = $this->blog_model->getSafetyFirstPosts(22);
                        //if(is_array($safetyposts)){
                            //foreach($safetyposts as $key => $safety):

                                ?>

                            <div class="col-half">
                                <article>
                                    <?php /*
                                        if($key == 0){
                                            echo '<i class="icon-crowd"></i>';
                                        }
                                        if($key == 1){
                                            echo '<i class="icon-coins"></i>';
                                        }
                                    ?>
                                    <?php /*
                                    <h3 class="sub-title">
                                        <a href="<?php echo $safety['guid'];?>" style="color:#fff;"><?php echo $safety['post_title'];?></a>
                                     </h3>
                                     */ ?>
                                     <div class="content">
                                        <h3>For Families:</h3>
                                        <p>
                                            <?php echo substr($safetyposts[1]['post_excerpt'],0,180);?>
                                            <a href="blog/hiring-in-home-help">Read More</a>
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <div class="col-half">
                                <article>
                                    <?php /*
                                        if($key == 0){
                                            echo '<i class="icon-crowd"></i>';
                                        }
                                        if($key == 1){
                                            echo '<i class="icon-coins"></i>';
                                        }
                                    ?>
                                    <?php /*
                                    <h3 class="sub-title">
                                        <a href="<?php echo $safety['guid'];?>" style="color:#fff;"><?php echo $safety['post_title'];?></a>
                                     </h3>
                                     */ ?>
                                     <div class="content">
                                        <h3>For Caregivers:</h3>
                                        <p>
                                            <?php echo substr($safetyposts[0]['post_excerpt'],0,180);?>
                                            <a href="blog/in-home-care-for-the-elderly-and-ill">Read More</a>
                                        </p>
                                    </div>
                                </article>
                            </div>
                         <?php
                         //endforeach;
                     //}
                     ?>

                 </div>
                 <?php
                 $adviceandtools = $this->blog_model->getAdvicePosts(21);

                 ?>
                 <div class="col-half padleft">
                    <h2><a href="advice-and-tips/families" style="color:white">Advice and Tips</a></h2>
                    <?php
                    //if(is_array($adviceandtools)){
                        //foreach($adviceandtools as $key => $advice):
                            ?>
                        <div class="col-half">
                            <article>
                                 <?php /*
                                            if($key == 0){
                                                echo  '<i class="icon-comment"></i>';
                                            }else{
                                                echo '<i class="icon-doc"></i>';
                                            }
                                        ?>
                                    <h3 class="sub-title">
                                        <a href="<?php echo $safety['guid'];?>" style="color:#fff;"><?php echo $advice['post_title'];?></a>
                                    </h3>
                                    */ ?>
                                    <div class="content">
                                        <h3>For Families:</h3>
                                        <p>
                                            <?php echo substr($adviceandtools[0]['post_excerpt'],0,180);?>
                                            <a href="blog/finding-and-preparing-for-a-new-babysitter">Read More</a>
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <div class="col-half">
                            <article>
                                 <?php /*
                                            if($key == 0){
                                                echo  '<i class="icon-comment"></i>';
                                            }else{
                                                echo '<i class="icon-doc"></i>';
                                            }
                                        ?>
                                    <h3 class="sub-title">
                                        <a href="<?php echo $safety['guid'];?>" style="color:#fff;"><?php echo $advice['post_title'];?></a>
                                    </h3>
                                    */ ?>
                                    <div class="content">
                                        <h3>For Caregivers:</h3>
                                        <p>
                                            <?php echo substr($adviceandtools[1]['post_excerpt'],0,180);?>
                                            <a href="blog/how-to-prevent-caregiver-burnout">Read More</a>
                                        </p>
                                    </div>
                                </article>
                            </div>
                            <?php
                            //endforeach;
                        //}
                        ?>
                    </div>
                </div>
            </div>
            <!--end .container-->
        </section>

        <!--end .safety-first-->

        <section class="client-say">
            <div class="container">
                <div class="row">
                
                <h2 class="testimonials_title" style="text-transform: capitalize; font-size:40px">What people are saying about us</h2>

             <div class="col-md-6 col-sm-6 col-xs-12" style="border-right:1px solid #ccc;">

                 <article>
                        <p class="testimonial">
                            “<?php
                            $desc = nl2br(strip_tags($testimonial[0]->testimonial_description));
                            echo strip_tags($desc);
                            ?>”
                            <br />
                            <span class="author"><?php echo $testimonial[0]->testimonial_by;?></span>
                        </p>
                    </article>

             </div>
             <div class="col-md-6 col-sm-6 col-xs-12">

                 <article>
                        <p class="testimonial">
                            “<?php

                            $desc = nl2br(strip_tags($testimonial[1]->testimonial_description));
                            echo strip_tags($desc);
                            ?>”
                            <br />
                            <span class="author"><?php echo $testimonial[1]->testimonial_by;?></span>
                        </p>
                    </article>

             </div>
                </div>
                <h2 class="title" style="font-size: 40px;">Like our site? Questions? Comments? We're Listening!</h2>


                <?php /*<div class="toll-info-chat">
                    <span class="toll-num">Toll:111-222-333</span>
                    <br/>
                    <span class="info-com">info@frumcare.com</span>
                    <br/>
                    <span class="chats-wrap">Chat</span>
                </div> */?>
                <div class="contact-form-help" style="">
                  <span>Contact Form </span>

                  <form action="<?php echo site_url();?>help/send_message" method="post" name="contact" id="contact-form">
                     <div><span class="contact-form-name"><input type="text" name="name" placeholder="Name" ></span>

                         <span class="contact-form-email"><input type="text" name="email" placeholder="Email" ></span>
                     </div>			<span class="contact-form-message"><textarea name="message" placeholder="Write a message"></textarea></span>
                     <div class="clearfix"></div>
                     <span class="contact-submit-btn"><input type="submit" name="submit_now" value="Submit Now" id="submit_now" /></span>
                 </form>

             </div>

             


                </div>
                </div>
            </section>
        </main>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Invite Friends to Join FrumCare.com</h4>
                                </div>
                                <div class="modal-body">
                        <form class="usersinviteform">
                            <table>
                       
                                <tbody class="rows">
                                <tr>
                                    <td><label>Name:</label></td>
                                    <td style="padding:3px;padding-top: 0px;">
                                        <input type="email" name="names[]" class="required" multiple></input>
                                    </td>
                                    <td style="padding-left:20px"><label>Email:</label></td>
                                    <td style="padding:3px;padding-top: 0px;">
                                        <input type="email" name="emails[]" class="required" multiple></input>
                                    </td>
                                </tr>
                                </tbody>
                               </table>
                               <table style="margin-left:-10px; margin-top:12px">
                                <tr><td class="addrow" style="cursor: pointer;font-size: 13px;color: blue;">Add Name</td></tr>

                    
                                <tr>
                                    <td>
                                        <input type="hidden" name="current_user" value="<?php echo @$this->session->userdata['current_user'];?>"/>
                                    </td>
                                </tr>
                                </table>
                            

                            <div class="modal-footer">
                              <button style="float:left" type="button" class="btn btn-primary save">Invite Friends</button>
                          </div>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
        <script src="<?php echo site_url(); ?>js/notifIt.js" type="text/javascript"></script>
        <link href="<?php echo site_url(); ?>css/notifIt.css" type="text/css" rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(function(){
                 // dialog box
                 var $myDialog = $('<div></div>')
                 .html('Please select care type')
                 .dialog({
                    autoOpen: false,
                    title: 'Select Care Type',
                    resizable: false,

                    buttons: {
                      "Ok": function () {
                        $(this).dialog("close");
                    },
                }
            });

                 $('.browse-caregivers').click(function(e){
                    e.preventDefault();
                    var selected_category = $("input[type='radio'].select:checked").val();
                    if(selected_category == undefined){
                            //alert('Please select the care type');return false;
                            window.location= '<?php echo site_url();?>signup';
                        }else{
                            window.location= '<?php echo site_url();?>signup?ac='+selected_category;
                        }
                    });
                    $("#submit_now").click(function(e){
                    var name = $('input[name=name]').val();
                    var email = $('input[name=email]').val();
                    var msg = $('textarea').val();
                    if( name != '' && email != '' && msg !='') {
                        $(".searchloader").fadeIn('fast');
                        $.post('<?php echo site_url()?>help/send_message',
                            {
                                'name'    : name,
                                'email'   : email,
                                'message' : msg,
                                'submit_now': true
                            },
                            function(e){
                                $(".searchloader").fadeOut('fast');
                                notif({
                                  msg: "Thank you for contacting us. We will get back to you shortly.",
                                  position: "right",
                                  time: 100
                                });
                                // $('#submit_now').attr('disabled','disabled');

                        });
                    }
                    else {
                        notif({
                                  msg: "Please fill all the field correctly",
                                  position: "right",
                                  time: 100
                                });
                    }
                    return false;
                });
             });
</script>
<?php 
$ci = &get_instance();
if ($ci->session->flashdata('invite')) { ?>
<script>
$(document).ready(function() {
    	$('#myModal2').modal('show');
    	
    	$('.save').on('click',function(){
			$.ajax( {
				type: "POST",
				url: '<?php echo site_url();?>invite_friends',
				data: $('form.usersinviteform').serializeArray(),
				success: function( msg ) {
	    			$('#myModal2').modal('hide');
	                $('.invite_response').html(msg);
	                $('.invite_response').show();
	                html = '<tr><td><label>Name:</td><td style="padding:3px;padding-top: 0px;"><input type="text" name="names[]" class="required" multiple></input></td><td style="padding-left:20px"><label>Email:</label></td><td style="padding:3px;padding-top: 0px;"><input type="email" name="emails[]" class="required" multiple></input></td></tr>'
        
        			$('.rows').html(html)
	            }
	        });
		});
        
        $('.addrow').on('click', function() {
        	html = '<tr><td><label>Name:</label></td><td style="padding:3px;padding-top: 0px;"><input type="text" name="names[]" class="required" multiple></input></td><td style="padding-left:20px"><label>Email:</label></td><td style="padding:3px;padding-top: 0px;"><input type="email" name="emails[]" class="required" multiple></input></td></tr>'
        
        	$('.rows').append(html)
        })
    })
</script>
<?php } ?>


