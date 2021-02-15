$(document).on("click", ".add-to-cart", function() {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "../assets/include/add_to_cart.php",
        data: { pid: id },
    });
});