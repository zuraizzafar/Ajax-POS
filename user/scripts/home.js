$(document).on("click", ".add-to-cart", function() {
    var id = $(this).data("id");
    var cat = $(this).data("cat");
    var subcat = $(this).data("subcat");
    window.location.href = "product/?id="+id+"&cat="+cat+"&subcat="+subcat;
});