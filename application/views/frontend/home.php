<?php home_flash();?>
<main class="site-main">
    <section class="banner">
        <ul id="site-banner" class="banner-main">
            <li class="banner-item" style='background-image:url(img/banner-bg.jpg);'>
                <div class="container">
                    <div class="banner-text col-md-5 col-sm-6 col-xs-12">
                        <h2 class="banner-title">
                            We Connect <br />Jewish Families <br />with CareGivers
                        </h2>                        
                        <div class='banner-sub-title'>
                            <div class="banner-title-small">Choose an option:</div>
                                <?php /* <a href="<?php echo site_url('signup?ac=2')?>">I am a Parent</a>
                                <br />

                                <a href="<?php echo site_url('signup?ac=1')?>">I am a Caregiver</a>
                                <br />

                                <a href="<?php echo site_url('signup?ac=3')?>">I am a Care Orgainzation</a>
                                <br /> */?>                                
                                <p></p>
                                <div class="amlabel">
                                    <input id="parents" type="radio" name="parent" class="select" value="2"><label for="parents">I'm a Parent</label>
                                    <br />

                                    <input id="caregiver" type="radio" name="parent" class="select" value="1"><label for="caregiver">I'm a Caregiver</label>
                                    <br />

                                    <input id="care_organization" type="radio" name="parent" class="select" value="3"><label for="care_organization">I'm a Care Organization</label>
                                </div>
                                <br />

                                <a href="javascript:void(0);" class="link-block browse-caregivers place-ad-link">Join for free</a>
                            </div>
                            <?php /* <a href="<?php echo site_url("ad");?>" class="link-block browse-caregivers">PLACE AN AD FOR FREE</a> */ ?>
                        </div>
                        <div class="banner-images col-md-7 col-sm-6 col-xs-12">
                            <ul>
                                <li><a title="Child Care"><img src="img/banner%20images/woman-taking-care-of-girl.png" alt="#"/><span>Child Care</span></a></li>
                                <li><a title="Senior Care"><img src="img/banner%20images/man-helping-elderly.png" alt="#"/><span>Senior Care</span></a></li>
                                <!--<li><a title="Special Needs Care"><img src="img/banner%20images/woman-and-child.png" alt="#"/><span>Special Needs Care</span></a></li>-->
                                <li><a title="Special Needs Care"><img src="img/banner%20images/ThinkstockPhotos-468469005.png" alt="#"/><span>Special Needs Care</span></a></li>                            
                                <li><a title="Cleaning & Household Help"><img src="img/banner%20images/woman-doing-house-chores.png" alt="#"/><span>Cleaning & Household Help</span></a></li>                            
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </section>

        <section class="callout">
            <div class="container">
                <div class="row">
                    <div class="col-half">
                        <div class='callout-block'>
                            <h2 class="title">
                                <span class="looking-for-care">Looking for care?</span><br/>
                                Find quality Caregivers in your area
                            </h2>
                            <a href="<?php echo site_url('caregivers');?>" class="place-ad-link link-block">FIND A CAREGIVER</a>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class='callout-block'>
                            <h2 class="title">
                                <span class="looking-for-care-job">Looking for a care job?</span><br/>
                                Find Jobs in your area
                            </h2>
                            
                            <a href="<?php echo base_url('jobs/all') ?>" class="place-ad-link link-block">FIND A JOB</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <!--<div class="col-full">
                    <p class="callout-text">If you represent a care giving institution, <a href="<?php echo site_url();?>ad">click here</a>
                    </div>-->
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
                <h2 class="title">Like our site? Questions? Comments? We're Listening!</h2>


                <?php /*<div class="toll-info-chat">
                    <span class="toll-num">Toll:111-222-333</span>
                    <br/>
                    <span class="info-com">info@frumcare.com</span>
                    <br/>
                    <span class="chats-wrap">Chat</span>
                </div> */?>
                <div class="contact-form-help col-sm-12 col-xs-12" style="">
                  <span>Contact Form </span>

                  <form action="<?php echo site_url();?>help/send_message" method="post" name="contact" id="contact-form">
                     <div><span class="contact-form-name"><input type="text" name="name" placeholder="Name" ></span>

                         <span class="contact-form-email"><input type="text" name="email" placeholder="Email" ></span>
                     </div>			<span class="contact-form-message"><textarea name="message" placeholder="Write a message"></textarea></span>
                     <div class="clearfix"></div>
                     <span class="contact-submit-btn"><input type="submit" name="submit_now" value="Submit Now" id="submit_now" /></span>
                 </form>

             </div>
                    <?php /*<article>
                        <p class="testimonial">
                            “<?php
                            $desc = nl2br(strip_tags($testimonial[0]->testimonial_description));
                            echo strip_tags($desc); 
                            ?>”
                            <br />
                            <span class="author"><?php echo $testimonial[0]->testimonial_by;?></span>
                        </p>
                    </article>
                    <article>
                        <p class="testimonial">
                            “<?php

                            $desc = nl2br(strip_tags($testimonial[1]->testimonial_description));
                            echo strip_tags($desc); 
                            ?>”
                            <br />
                            <span class="author"><?php echo $testimonial[1]->testimonial_by;?></span>
                        </p>
                    </article> */ ?>
                </div>
                </div>
            </section>
        </main>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
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
                    var msg = $('#message1').val();
                    if( name != '' && email != '' && msg !='') {
                        $(".searchloader").fadeIn('fast');
                        $.post('<?php echo site_url()?>help/send_this_message',
                            {
                                'name'    : name,
                                'email'   : email,
                                'message' : msg
                            },
                            function(e){
                                $(".searchloader").fadeOut('fast');
                                notif({
                                  msg: "Thank you for joining us. We will get back you soon",
                                  position: "right",
                                  time: 100                              
                                });
                                $('#submit_now').attr('disabled','disabled');
                                                        
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