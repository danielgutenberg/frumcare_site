<?php
/**
 * Template Name: rate-calc
 * @package frumcare
 */

get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container">
            <div class="breadcrumb breadcrum-wrap">
                <?php if(function_exists('bcn_display')){
                    wp_reset_query();
                    bcn_display();
                }?>                
            </div>
            <div class="rate-calcutaion-wrap">
                <div class="rate-title"> Under Construction</div>
            </div>
            <?php /* 
            <div class="rate-calcutaion-wrap">
                <div class="rate-title"> What`s the Going Rate for... </div>
		          <ul class="rate-nav clearfix">
			         <li class="active"> <a href="#" class="all_field"> Senior Caregiver </a> </li>
                     <li> <a href="#" class="all_field"> Caregiver </a> </li>
                     <li> <a href="#" class="therapist_playgroup"> Therapist </a> </li>
			         <li> <a href="#" class="therapist_playgroup"> Playgroup </a> </li>
			         <li> <a href="#" class="all_field"> Baby sitter </a> </li>
			         <li> <a href="#" class="all_field"> Nanny </a> </li>
                     <li> <a href="#" class="cleaner"> Cleaner </a> </li>
                     <li> <a href="#" class="runner"> Errand Runner </a> </li>
                     <li> <a href="#" class="all_field"> Lessons </a> </li>
		          </ul>
            <div class="rate-form">
			 <form>
			     <input type="text" class="input_field" id="zip_cd" placeholder="Enter your ZIP CODE"> 
			     <input type="text" class="input_field" placeholder="Numbers of Children/Seniors"> 
			     <input type="text" class="input_field" id="yoe" placeholder="Years of Experience"> 
			     <input type="text" class="input_field" id="hrs_week" placeholder="Hours Per Week">
                 <input type="text" class="input_field" id="OMF_time" placeholder="One Time/Multiple Times/Full Time">  
			     <input type="submit" value="Calculate" class="calculate">
		      </form>
		</div> */?>

		</div> <!-- rate-calcutaion-wrap end -->
	   </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?//php get_sidebar(); ?>
<?php get_footer(); ?>