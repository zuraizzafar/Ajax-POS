$(document).on("click", ".add-to-cart", function() {
    var id = $(this).data("id");
    var cat = $(this).data("cat");
    var subcat = $(this).data("subcat");
    window.location.href = "product/?id="+id+"&cat="+cat+"&subcat="+subcat;
});
$(document).ready( function() {
    $(document).on("keyup", '#search-product',function() { 
        var search = $("#search-product").val();
        search = search.toLowerCase();
        if(search=="") {
            $(".product-card").show();
        }
        $(".card-title").each(function() {
            var text = $(this).text();
            text = text.toLowerCase();
            var id = $(this).data("id");
            if(!text.includes(search)) {
                $(this).parent().parent().parent().hide();
                // $("#card-"+id).hide();
            }else {
                $(this).parent().parent().parent().show();
                // $("#card-"+id).show();
            }
        });
    });
});