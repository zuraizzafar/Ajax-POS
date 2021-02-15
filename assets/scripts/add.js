$(document).ready(function () {
    $("#pcat").change(function () {
        $("#pscat").removeAttr("disabled");
        var cat_id = $("select[name=pcat]").val();
        $.ajax({
            type: "POST",
            url: "../assets/include/sub_categories.php",
            data: {id: cat_id},
            success: function (sub_cat) {
                $("#pscat").html(sub_cat);
            },
        });
    });
});
var session_items = sessionStorage.getItem("cart-items");
if (session_items==null) {
    sessionStorage.setItem("cart-items", 0);
}
$(document).ready(function () {
    $(".cart-items").text(sessionStorage.getItem("cart-items"));
});