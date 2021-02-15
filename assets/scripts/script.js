var session_items = sessionStorage.getItem("cart-items");
if (session_items==null) {
    sessionStorage.setItem("cart-items", 0);
}
$(document).ready(function () {
    $(".cart-items").text(sessionStorage.getItem("cart-items"));
});
$(document).ready(function () {
    var window_width = $( window ).width();
    $(".side-bar").click(function () {
        if ($("nav>button i").attr("class") == "fas fa-bars fa-2x") {
            $("nav>button i").attr("class", "fas fa-times fa-2x");
            $("nav a:eq(0)").append("<span class='link-text'>Home</span>");
            $("nav a:eq(1)").append("<span class='link-text'>Cart</span>");
            $("nav a:eq(2)").append("<span class='link-text'>Products</span>");
            $("nav a:eq(3)").append("<span class='link-text'>Category</span>");
            $("nav a:eq(4)").append("<span class='link-text'>Sub Category</span>");
            if (window_width<"1025") {
                $("nav").css("width", "50%");
            }
            else
                $("nav").css("width", "15%");
        } else if ($("nav button i").attr("class") == "fas fa-times fa-2x") {
            if (window_width<"480") {
                $("nav").css("width", "15%");
            }
            else
                $("nav").css("width", "5%");
            $("nav>button i").attr("class", "fas fa-bars fa-2x");
            $(".link-text").remove();
        }
    });
});
$(document).ready(function () {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
});
$(document).ready(function () {
    $(".cart-items").text(sessionStorage.getItem("cart-items"));
});
var session_items = sessionStorage.getItem("cart-items");
if (session_items==null) {
    sessionStorage.setItem("cart-items", 0);
}
$(document).ready(function () {
    $(".cart-items").text(sessionStorage.getItem("cart-items"));
});