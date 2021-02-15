$(document).on("click", ".add-to-cart", function() {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "assets/include/add_to_cart.php",
        data: { pid: id },
    });
    var items = parseInt($(".cart-items").text());
    $(".cart-items").text(items + 1);
    var current =  parseInt($(".cart-items").text());
    sessionStorage.setItem("cart-items", current);
});
var session_items = sessionStorage.getItem("cart-items");
if (session_items==null) {
    sessionStorage.setItem("cart-items", 0);
}
$(document).ready(function () {
    $(".cart-items").text(sessionStorage.getItem("cart-items"));
});