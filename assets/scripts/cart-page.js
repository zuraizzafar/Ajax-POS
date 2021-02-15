var session_items = sessionStorage.getItem("cart-items");
if (session_items == null) {
    sessionStorage.setItem("cart-items", 0);
}
$(document).ready(function () {
    $(".cart-items").text(sessionStorage.getItem("cart-items"));
});
function cartItem() {
    var quantity = 0;
    $('.cart-item-quan').each(function() {
        quantity += parseInt($("#cart-item-quantity-"+$(this).data("id")).val());
    });
    sessionStorage.setItem("cart-items", quantity);
    $(".cart-items").text(quantity);
}
function cartPrice() {
    var price = 0;

    $(".item-price").each(function () {
        var item_price = parseInt($(this).text());
        var input_id = parseInt($(this).data("id"));
        var quantity = $("#cart-item-quantity-"+input_id).val();
        if (quantity == 1) {
            price += item_price;
        }
        else {
            while (quantity>=1) {
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
                url: "../assets/include/delete_cart_item.php",
                type: "POST",
                data: { cid: id },
            });
            var items = parseInt($(".cart-items").text());
            $(".cart-items").text(items - 1);
            $("#cart-item-" + id).remove();
            var current = parseInt($(".cart-items").text());
            sessionStorage.setItem("cart-items", current);
            cartPrice();
            cartItem();
            swal("Cart has been updated!", {
                icon: "success",
            });
        }
    });
});
$(document).ready(function () {
    $("input").change(function () {
        var id = $(this).data("id");
        var quantity = $("#cart-item-quantity-" + id).val();
        cartPrice();
        cartItem();
        $.ajax({
            url: "../assets/include/update_cart_item.php",
            type: "POST",
            data: { cid: id, quan: quantity }
            // success: function(){}
        });
    });
});
$(document).on("click", ".checkout", function() {
    $(".cart-card").each( function() {
        var id = $(this).data("id");
        var quantity = $("#cart-item-quantity-"+id).val();
        $.ajax({
            url: "../assets/include/checkout.php",
            type: "POST",
            data: { cid: id, quan: quantity }
        })
    })
});