function validateEmail($email) {
 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 if( !emailReg.test( $email ) ) {
   return 0;
 } else {
   return 1;
 }
 }
$(document).ready(function(){
    $('.toggle-menu').click(function(){
        $('.primary-nav').slideToggle('slow');
    });
	$('#menu-item-32 a').each(function() {
     $(this).prepend('<i class="icon-login"></i>');
});
		$('#menu-item-33 a').each(function() {
     $(this).prepend('<i class="icon-lock"></i>');
});

$("#site-navigation .menu").addClass("primary-nav");
$(".button-link #menu-item-39 a").addClass("link-block browse-caregivers");
$(".button-link #menu-item-40 a").addClass("link-block browse-caregivers-job");

    /* jQuery for FAQ*/
    $('.qusn').click(function(){
       var id = $(this).attr('id');
       var aid = id.split('_');
       //alert(aid[1]);
       var cur_ans = $('#ans_'+aid[1]);
       if(cur_ans.hasClass('close')){
        cur_ans.slideDown();
        cur_ans.removeClass('close');
       }else{
        cur_ans.slideUp();
        cur_ans.addClass('close');
       } 
    });
    
    $('#faq_search').submit(function(){
       var input = $('.search-field').val();
       if(input ==''){
        return false;
       } 
    });
    
    /* jQuery for the Rate Calculator */
    $('.rate-nav li').click(function(e){
        $('.rate-nav li').removeClass('active');
        $(this).addClass('active');
        if($(this).children().hasClass('all_field')){
            $('.input_field').show();            
        }else if($(this).children().hasClass('therapist_playgroup')){
            $('.input_field').hide();
            $('#zip_cd').show();
            $('#yoe').show();
        }else if($(this).children().hasClass('cleaner')){
            $('.input_field').hide();
            $('#zip_cd').show();
            $('#yoe').show();
            $('#hrs_week').show();
            $('#OMF_time').show();
        }else if($(this).children().hasClass('runner')){
            $('.input_field').hide();
            $('#zip_cd').show();
            $('#yoe').show();            
            $('#OMF_time').show();
        }
        e.preventDefault();
    });
    
    /* jQuery for the Resource page */
    $('#btn_loadmore').click(function(e){
        var current_page = $('.current_page').val();
        var current_url = $('.current_url').val();
        var max_page = parseInt($('.max_page').val());
        if(current_page<max_page){
            $('.infinite-loader').show();
            var next_page = parseInt(current_page)+1;
            var next_url = current_url+'page/'+next_page+'/';    
            $('.pagination_holder').load(next_url+' #container_article',function(){
                var load_html = $('.pagination_holder #container_article').html();  
                $('.pagination_holder').html('');                                 
                $('#container_article').append(load_html);                          
                $('.current_page').val(next_page);                                
                $('.infinite-loader').hide();                 
            });
        }else{
           $('#btn_loadmore').hide(); 
        }
        e.preventDefault();
    });
    
    
    $('#commentform').submit(function(){
        var name = $('#author').val();
        var mail = $('#email').val();
        var comment = $('#comment').val();
        if(name ==""){
			$('.error').remove();
            $('<span class="error">Please enter your name.</span>').appendTo('.comment-form-author');
			$('#author').focus();
			return false;
		}else{
		  $('.error').remove();
		}
        
        if(mail ==""){
			$('.error').remove();
            $('<span class="error">Please enter your email address.</span>').appendTo('.comment-form-email');
			$('#email').focus();
			return false;
		}else{
		  $('.error').remove();
		}

		if(validateEmail(mail) !=1){
			$('.error').remove();
            $('<span class="error">Please enter valid email address.</span>').appendTo('.comment-form-email');
			$('#email').focus();
			return false;
		}else{
		  $('.error').remove();
		}
        
        if(comment ==""){
			$('.error').remove();
            $('<span class="error">Please enter your comment.</span>').appendTo('.comment-form-comment');
			$('#email').focus();
			return false;
		}else{
		  $('.error').remove();
		}
    });
    
});
