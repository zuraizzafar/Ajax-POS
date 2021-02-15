$(document).on("click", ".signup-switch", function () {
    $('.carousel').carousel("next");
});
$(document).on("click", ".signin-switch", function () {
    $('.carousel').carousel("prev");
});
$(document).ready(function () {
    $(".signup-form").submit(function (e) {
        e.preventDefault();
        var fullname = $("input[name=sfname]").val();
        var username = $("input[name=susername]").val();
        var password = $("input[name=spassword]").val();
        $.ajax({
            url: '../../assets/include/save_user.php',
            type: 'POST',
            data: {
                fname: fullname,
                uname: username,
                pass: password,
            },
            success: function (data) {
                console.log(data);
                if (data == 1) {
                    swal({
                        title: "User created!",
                        text: "Enter credentials in login form!",
                        icon: "success",
                    });
                }
                else {
                    swal({
                        title: "User not created!",
                        text: "Try using different credentials!",
                        icon: "warning",
                    });
                }
            },
        });
        $(".login-form")[0].reset();
    });
});
$(document).ready(function () {
    $(".login-form").submit(function (e) {
        e.preventDefault();
        var username = $("input[name=username]").val();
        var password = $("input[name=password]").val();
        $.ajax({
            url: '../../assets/include/login.php',
            type: 'POST',
            data: {
                uname: username,
                pass: password,
            },
            success: function (data) {
                console.log(data);
                if (data == 1) {
                    window.location.replace("../");
                }
                else {
                    swal({
                        title: "User not found!",
                        text: "Try using different credentials!",
                        icon: "warning",
                    });
                }
            },
        });
    });
});