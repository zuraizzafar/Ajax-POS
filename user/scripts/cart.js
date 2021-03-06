function cartItem() {
    var quantity = 0;
    $('.cart-item-quan').each(function () {
        quantity += parseInt($("#cart-item-quantity-" + $(this).data("id")).val());
    });
    $(".cart-items").text(quantity);
}
function cartPrice() {
    var price = 0;
    $(".item-price").each(function () {
        var item_price = parseInt($(this).text());
        var input_id = parseInt($(this).data("id"));
        var quantity = $("#cart-item-quantity-" + input_id).val();
        if (quantity == 1) {
            price += item_price;
        }
        else {
            while (quantity >= 1) {
                price += item_price;
                quantity--;
            }
        }
    });
    $(".cart-price").text(price);
}
$(document).on("click", ".delete-item", function () {
    var id = $(this).data("id");
    swal({
        title: "Are you sure?",
        text: "This item will be removed from cart!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "../includes/delete_cart_item.php",
                type: "POST",
                data: { cid: id },
            });
            $("#cart-item-" + id).remove();
            $(".cart-items-badge").text(parseInt($(".cart-items-badge").text()) - 1);
            cartPrice();
            cartItem();
            swal("Cart has been updated!", {
                icon: "success",
            });
        }
    });
});
$(document).ready(function () {
    $(document).on("click", ".update-quantity", function () {
        var id = $(this).data("id");
        var quantity = $("#cart-item-quantity-" + id).val();
        cartPrice();
        cartItem();
        $.ajax({
            url: "../includes/update_cart_item.php",
            type: "POST",
            data: { cid: id, quan: quantity }
        });
    });
});
$(document).on("click", ".un-checkout", function () {
    var items = parseInt($(".cart-items-badge").text());
    if (items)
        window.location.href = "../login/";
    else {
        swal({
            title: "Cart is empty!",
            icon: "warning",
        });
    }
});
$(document).on("click", ".checkout", function () {
    var pr = $(".cart-price").text();
    var items = parseInt($(".cart-items-badge").text());
    if (items) {
        swal({
            title: "Proceed to Purchase?",
            buttons: true,
        })
            .then((proceed) => {
                if (proceed) {
                    swal({
                        title: "Payment Successfull!",
                        icon: "success",
                    });
                    $.ajax({
                        url: "../includes/checkout.php",
                        type: "POST",
                        data: { price: pr },
                        success: function (data) {
                            $(".cart-card").remove();
                            cartPrice();
                            $(".cart-items-badge").text(0);
                        }
                    });
                }
            });
    }
    else {
        swal({
            title: "Cart is empty!",
            icon: "warning",
        });
    }
});