// site url
var site_url = window.location.origin+'/';
if(site_url == 'http://localhost/') {
    site_url = 'http://localhost/frumcare/';
}

// functions to run on document ready
$(document).ready(function(){

});

function get_care_type(type) {
    $.ajax({
        url: site_url+'signup/get_care_type',
        data: 'type='+type,
        type: 'post',
        success: function(resp) {
            var care_type = $('#care_type');
            care_type.html();
            care_type.html(resp);
        }
    })
}

function enable_password()
{
    if($('#password').prop('disabled')) {
        $('#password').removeAttr('disabled');
    } else {
        $('#password').attr('disabled', 'disabled');
    }
}

function load_caregiver_form(type)
{
    $.ajax({
        url: site_url+'ad/load_caregiver_form',
        data: 'type='+type,
        method: 'post',
        beforeSend: function () {
            $("body").addClass('loading');
        },
        success: function(res) {
            $("body").removeClass('loading');
            res = JSON.parse(res);
            var exp_form = $('#step-3');
            //var form_extra = $('#form-extra');
            var form_extra = $('.ad-form-right');
            exp_form.html('');
            exp_form.html(res[0]);
            form_extra.html('');
            if(res[1]){
                /*if(res[1]==1)
                    $('.ad-form-right').html(res[2]);
                else*/
                    form_extra.html(res[1]);
            }
                
        }
    })
}

