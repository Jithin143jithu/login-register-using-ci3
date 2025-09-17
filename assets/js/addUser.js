/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Jithin VP
 */

$(document).ready(function(){

    var addForm = $("#addNewUser");
	
    var validator = addForm.validate({
        rules: {
            email: {
                required: true,
                email: true
                // Note: `is_unique` can only be checked server-side
            },
            password: {
                required: true,
                minlength: 6
            },
            first_name: {
                required: true,
                maxlength: 128
            },
            last_name: {
                required: true,
                maxlength: 128
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            role_id: {
                required: true,
                digits: true
            }
        },
        messages: {
            email: {
                required: "Email is required",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Password is required",
                minlength: "Password must be at least 6 characters"
            },
            first_name: {
                required: "First Name is required",
                maxlength: "First Name cannot exceed 128 characters"
            },
            last_name: {
                required: "Last Name is required",
                maxlength: "Last Name cannot exceed 128 characters"
            },
            mobile: {
                required: "Mobile number is required",
                digits: "Only numbers are allowed",
                minlength: "Mobile must be at least 10 digits",
                maxlength: "Mobile cannot exceed 15 digits"
            },
            role_id: {
                required: "Role is required",
                digits: "Invalid role value"
            }
        },
		highlight: function(element, errorClass, validClass) {
            if ($(element).is("select")) {
                $(element).addClass("select-error"); // custom class for select
            } else {
                $(element).addClass(errorClass);
            }
        },
        submitHandler: function(form) {
			var $form = $(form);

			// 🔒 Manually trigger disable logic since submit event won't fire
			disableSubmitButton($form);

            $.ajax({
                url: $(form).attr("action"),   // Controller URL
                type: "POST",
                data: $(form).serialize(),
                dataType: "json",
                success: function(response) {

					$("#form-messages").html(""); // clear old messages
				
					if(response.status == "success") {
						var successMsg = $(
							'<div class="alert alert-success alert-dismissible">' +
								'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
								'Record added successfully.' +
							'</div>'
						);
				
						$("#form-messages").html(successMsg);
				
						// Auto-hide after 3 seconds
						setTimeout(function() {
							successMsg.fadeOut("slow", function() {
								$(this).remove();
							});
						}, 3000);
				
						form.reset(); // reset form fields
				
					} else if(response.status == "error" && response.errors) {

						$(".error").remove();

                            // Collect all error messages into one string
                            let allErrors = "";
                            $.each(response.errors, function(key, value) {
                                allErrors += value + "<br>";
                            });

						var errorMsg = $(
							'<div class="alert alert-danger alert-dismissible">' +
								'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
								'Please fix the errors below. <br>' +
								allErrors +
							'</div>'
						);
				
						$("#form-messages").html(errorMsg);
				
						// Show validation errors near inputs
						$.each(response.errors, function(key, value) {
							var input = $('[name="'+ key +'"]', form);
							input.closest(".form-group").find(".error").remove();
							input.after('<label class="error">'+ value +'</label>');
						});
					}
					// ✅ Re-enable submit button
					resetSubmitButton($form);
				}
				,
                error: function() {
                    alert("Something went wrong. Please try again.");
					resetSubmitButton($form); // also re-enable on error
                }
            });
			
            return false; // prevent normal form submit
        }
    });

});


