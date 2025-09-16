/**
 * File : login.js
 * 
 * This file contain the login js
 * 
 * @author Jithin VP
 */


jQuery(document).ready(function($){

    $(function(){
    var isSubmitting = false;

    $('#loginForm').on('submit', function(e){
    
        e.preventDefault();
        let actionUrl = $(this).data("url"); // gets PHP-generated URL
        if(isSubmitting) return;
        isSubmitting = true;

        var btn = $('#loginBtn');
        var inputs = $('#loginForm :input');
        var msgDiv = $('#loginMsg');

        msgDiv.hide().removeClass('success error');

        var formData = $(this).serialize();

        inputs.prop('disabled', true);
        btn.html('<i class="fa fa-spinner fa-spin"></i> ');

        $.ajax({
            url: actionUrl,   // ✅ correct URL
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(res){
                if(res.status === 'success'){
                    msgDiv.removeClass('error').addClass('success').html(res.message).show();
                    setTimeout(function(){ 
                        if(res.redirect_url){
                            window.location.href = res.redirect_url; // ✅ use AJAX response
                        }
                     }, 1200);
                } else {
                    msgDiv.removeClass('success').addClass('error').html(res.message).show().addClass('shake');
                    setTimeout(function(){ msgDiv.removeClass('shake'); }, 500);
                    inputs.prop('disabled', false);
                    btn.html('Sign In');
                }
                isSubmitting = false;
            },
            error: function(){
                msgDiv.removeClass('success').addClass('error').html('Something went wrong.').show();
                inputs.prop('disabled', false);
                btn.html('Sign In');
                isSubmitting = false;
            }
        });
    });
});
});