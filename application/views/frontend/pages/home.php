<script src="<?php echo base_url('js/unslider-min.js') ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('js/unslider.css') ?>">
<?php home_flash();?>
		    <div class="alert alert-success alert-dismissible invite_response" role="alert" style="display:none">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
<main class="site-main">
    <section class="banner">
        <div class="myslider">
            <ul id="site-banner" class="banner-main">
    
                <li class="banner-item home_page_banner bigBanner1" style='background-image:url(img/bannerImages/big-banner-1.jpg);'></li>
                <li class="banner-item home_page_banner bigBanner2" style='background-image:url(img/bannerImages/big-banner-2.jpg);'></li>
            </ul>
        </div>
                <div class="container textBoxLarge" style="margin-top: -394px; margin-bottom: 75px">
                    <div class="row bannerText" style="margin-bottom:5px">
                        <div class="col-xs-12">
                            <h2 class="banner-title bannerTextLarge" style="text-align:center;text-transform: none;">
                                Find and connect with the <br> best caregivers in your area
                            </h2>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2" style="min-height:245px; background-color:white; border-radius: 8px;; box-shadow:0 3px 4px 1px rgba(0,0,0,.2); z-index:10001">
                        <h2 class="paddingBanner" style="text-align:center; padding-bottom:5px;">I'm looking for:</h2>
                        <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-xs-10 col-xs-offset-1 tinyBannerRight" style="margin-bottom:8px; background: none repeat scroll 0 0 #85bd30;border: medium none;border-radius: 13px;height: 60px;padding:20px;text-align:center"><a style="text-transform: uppercase;color: #fff; font-size:17px" href="<?php echo site_url('caregivers/all');?>">CAREGIVERS</a></div>
                                <div class="col-md-4 col-md-offset-0 col-xs-10 col-xs-offset-1 tinyBanner" style="background: none repeat scroll 0 0 #85bd30;border: medium none;border-radius: 13px;height: 60px;padding:20px;text-align:center;"><a style="text-transform: uppercase;color: #fff; font-size:17px"href="<?php echo base_url('jobs/all') ?>">JOB OPPORTUNITIES</a></div>
                        </div>
                        <div style="text-align:center; padding-top:5px;">Do you have a <a href="<?php echo base_url('caregivers/organizations') ?>">Care Business</a>?</div>
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
                
                $('.myslider').unslider({
                    autoplay: true,
                    nav: false,
                    arrows: false,
                    infinite: true,
                    delay: 6000,
                    speed: 2000,
                    fluid: true
                });
                
                
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


