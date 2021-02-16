$(document).ready(function () {
    $(".change-profile").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "../includes/update_profile.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
                if(data=='1') {
                    swal({
                        title: "Profile Updated!",
                        icon: "success",
                    });
                }
                else {
                    swal({
                        title: "Profile not Updated!",
                        text: "Try using different username!",
                        icon: "warning",
                    });
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
                    swal({
                        title: "Password Updated!",
                        icon: "success",
                    });
                    $(".change-password")[0].reset();
                }
                else {
                    swal({
                        title: "Password not Updated!",
                        text: "Try using different credentials!",
                        icon: "warning",
                    });
                }
            }
        });
    });
});