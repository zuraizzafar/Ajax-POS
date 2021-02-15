$(document).on("click", ".signup-switch", function() {
    $('.carousel').carousel("next");
});
$(document).on("click", ".signin-switch", function() {
    $('.carousel').carousel("prev");
});
$(document).ready(function() {
    $(".signup-form").submit(function(e) {
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
        });
        $(".signup-form")[0].reset();
    });
});