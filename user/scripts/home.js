$(document).on("click", ".add-to-cart", function() {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "../../assets/include/add_to_cart.php",
        data: { pid: id },
    });
    var items = parseInt($(".cart-items").text());
    $(".cart-items").text(items + 1);
    var current =  parseInt($(".cart-items").text());
    sessionStorage.setItem("cart-items", current);
});