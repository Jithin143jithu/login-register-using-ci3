/**
 * @author Jithin VP
 */

// runs after every successful AJAX call
$(document).ajaxSuccess(function(event, xhr) {
    try {
        var response = JSON.parse(xhr.responseText);
        if (response.status && response.status === "session_expired") {
            // show message
            var expiredMsg = $(
                '<div class="alert alert-warning alert-dismissible">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                    response.message +
                '</div>'
            );

            // place it in a common container
            $("#form-messages").html(expiredMsg);

            // redirect after 2s
            setTimeout(function() {
                window.location.href = response.redirect || "auth";
            }, 2000);
        }
    } catch (e) {
        // not JSON → ignore
    }
});

// common.js → Prevent double form submission globally
// Global handler to prevent double submission
$(document).ready(function () {
    $(document).on("submit", "form", function (e) {
        var $form = $(this);

        // Check if form has jQuery validation
        if ($form.data("validator")) {
            if (!$form.valid()) {
                // Form invalid → don’t disable submit
                return true;
            }
        }

        var $btn = $form.find('button[type="submit"], input[type="submit"]');

        if ($btn.prop("disabled")) {
            console.log("🚫 Submit blocked - button already disabled.");
            e.preventDefault();
            return false;
        }

        // Disable only after valid submission
        $btn.prop("disabled", true);

        if ($btn.is("button")) {
            $btn.data("original-text", $btn.text()).text("Submitting...");
        }
        if ($btn.is("input")) {
            $btn.data("original-value", $btn.val()).val("Submitting...");
        }
        console.log("🔒 Button disabled and set to Submitting... for form:", $form.attr('id'));

    });
});

// global helpers
function disableSubmitButton($form) {
    var $btn = $form.find('button[type="submit"], input[type="submit"]');
    if ($btn.prop('disabled')) {
        console.log("🚫 Submit blocked - button already disabled.");
        return false;
    }
    $btn.prop('disabled', true);
    if ($btn.is('button')) {
        $btn.data('original-text', $btn.text()).text('Submitting...');
    } else if ($btn.is('input')) {
        $btn.data('original-value', $btn.val()).val('Submitting...');
    }
    console.log("🔒 Button disabled and set to Submitting... for form:", $form.attr('id'));
    return true;
}


// Re-enable button after AJAX completes (success/error)
function resetSubmitButton($form) {
    var $btn = $form.find('button[type="submit"], input[type="submit"]');

    if ($btn.is("button") && $btn.data("original-text")) {
        $btn.text($btn.data("original-text"));
    }
    if ($btn.is("input") && $btn.data("original-value")) {
        $btn.val($btn.data("original-value"));
    }

    $btn.prop("disabled", false);
    console.log("✅ Button re-enabled for form:", $form.attr('id'));

}




