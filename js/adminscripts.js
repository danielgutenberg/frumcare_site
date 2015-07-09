function myFunction(id){
    var site_url=$('#site_url').val();
        var title=$('#'+id).val();
        var title1=$('#title1').val();
        //alert(title);
        $.ajax({
            url:site_url+'admin/page/check_title',
            data:'name='+title,
            type:'POST',
            success: function(response)
            {
                //alert(response);
                if(response==1 && title!=title1)
                {
                    $('#'+id).focus();
                    $('input[type=submit]').attr('disabled', 'disabled');
                    $('.msg_'+id).html('Already exist.');
                }
                else
                {
                    $('.msg_'+id).html('');
                    $("input[type=submit]").removeAttr("disabled");
                }
            }
        });
    }
    
    
$(document).ready(function(){
    
    var site_url=$('#site_url').val();
    
    $('#admin_add_edit_form').validate({
        rules:
        {
            confirm_new_password:
            {
                equalTo: '#new_password'
            }
        },
        messages:
        {
            confirm_new_password:
            {
                equalTo: "Sorry!! New Passwords Do Not Match."
            }
        }
    });
    
   $('#login-form').validate({
    errorPlacement: function(error, element)
    {
        if (element.attr("name") == "username")
        {
            error.insertAfter(".usernme");
        }
        else if (element.attr("name") == "password")
        {
            error.insertAfter(".passwd");
        }
        else
        {
            error.insertAfter(element);
        }
    }
   }); //login-form validate close
   
   $('.updateInfo').click(function(){
        var idd=$(this).attr('id');
        $('#loader_'+idd).html("<img src='"+site_url+"images/loader.gif' width='28px' height='25px' />");
        if(this.checked) {
                $.ajax({
                url: site_url+'admin/page/updatestatus',
                data: 'id=' + idd+'&value=1',
                type: 'POST',
                success: function () {
                    $('#loader_'+idd).html('<span class="glyphicon glyphicon-ok"></span>')
                }
            });
    
        }
        else{
            $.ajax({
                url: site_url+'admin/page/updatestatus',
                data: 'id=' + idd+'&value=0',
                type: 'POST',
                success: function () {
                    $('#loader_'+idd).html('<span class="glyphicon glyphicon-ok"></span>')
                }
            });
        }
    });//update status of pages  close
    
    
    //validate the input fields
    $('#page_add_edit_form').validate({
        rules:{
            page_name:{
                required:true
            }
            
        },
        messages:{
            page_name:{
                required:"Please Enter Page Name"
            }
            
        }
    });
    
    $('#reset').click(function(){
        var desc_value=$('#original_desc').val();
        //alert (desc_value);
        CKEDITOR.instances.desc.setData(desc_value);
    });
    
    $('#feature_add_edit_form').validate();
    
    $('#feature_reset').click(function(){
        var desc_value=$('#feature_original_desc').val();
        //alert (desc_value);
        CKEDITOR.instances.feature_desc.setData(desc_value);
    });
    
    $('#package_add_edit_form').validate();
    
    $('#package_reset').click(function(){
        var desc_value=$('#package_original_desc').val();
        //alert (desc_value);
        CKEDITOR.instances.package_desc.setData(desc_value);
    });
    
});//Document ready close
