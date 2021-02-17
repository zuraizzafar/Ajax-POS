$(document).on("click", ".add-to-cart", function() {
    var id = $(this).data("id");
    var quan = $("input[name=pquan]").val();
    $.ajax({
        type: "POST",
        url: "../includes/add_to_cart.php",
        data: { pid: id, pquan: quan },
        success: function(data) {
            swal({
                title: "Added to cart!",
                text: "Item added to cart succesfully, goto cart to checkout!",
                icon: "success",
            });
            if(data==1) {
                $(".cart-items-badge").text(parseInt($(".cart-items-badge").text())+1);
            }
        },
    });
});