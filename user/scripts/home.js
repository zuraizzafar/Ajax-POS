$(document).on("click", ".add-to-cart", function() {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "includes/add_to_cart.php",
        data: { pid: id },
        success: function(data) {
            swal({
                title: "Added to cart!",
                text: "Item added to cart succesfully, goto cart to checkout!",
                icon: "success",
            });
        },
    });
});