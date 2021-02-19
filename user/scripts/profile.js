function showAlert(selectAlert, alertText) {
    $(selectAlert).fadeIn();
    $(selectAlert+"-text").text(alertText);
    setTimeout(function() {
        $(selectAlert).fadeOut();
    }, 3000)
}
$(document).on("click", "button.close", function() {
    $(this).parent().fadeOut();
});
$(document).ready(function () {
    $(".change-profile").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "../includes/update_profile.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
                if(data=='1') {
                    showAlert("#positive-alert", "Profile updated!");
                }
                else {
                    showAlert("#negative-alert", "Profile not updated! Try using different username.");
                }
            }
        });
    });
});
$(document).ready(function () {
    $(".change-password").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "../includes/update_password.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
                if (data=='1') {
                    showAlert("#positive-alert", "Password updated! operation successful.");
                    $(".change-password")[0].reset();
                }
                else {
                    showAlert("#negative-alert", "Password not updated. Try using different credentials.");
                }
            }
        });
    });
});