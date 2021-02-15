function tableSer() {
    var i = 1;
    $(".ser-row").each(function () {
        $(this).text(i++);
    });
}
$(document).ready(function () {
    $("#pcat").change(function () {
        $("#pscat").removeAttr("disabled");
        var cat_id = $("select[name=pcat]").val();
        $.ajax({
            type: "POST",
            url: "assets/include/sub_categories.php",
            data: { id: cat_id },
            success: function (sub_cat) {
                $("#pscat").html(sub_cat);
            },
        });
    });
});
$(document).ready(function () {
    $("#copy-product #pcat").change(function () {
        $("#copy-product #pscat").removeAttr("disabled");
        var cat_id = $("#copy-product select[name=pcat]").val();
        $.ajax({
            type: "POST",
            url: "assets/include/sub_categories.php",
            data: { id: cat_id },
            success: function (sub_cat) {
                $("#copy-product #pscat").html(sub_cat);
            },
        });
    });
});
$(document).ready(function () {
    $("#epcat").change(function () {
        $("#epscat").removeAttr("disabled");
        var cat_id = $("select[name=epcat]").val();
        $.ajax({
            type: "POST",
            url: "assets/include/sub_categories.php",
            data: { id: cat_id },
            success: function (sub_cat) {
                $("#epscat").html(sub_cat);
            },
        });
    });
});
$(document).ready(function () {
    $("#cpcat").change(function () {
        $("#cpscat").removeAttr("disabled");
        var cat_id = $("select[name=cpcat]").val();
        $.ajax({
            type: "POST",
            url: "assets/include/sub_categories.php",
            data: { id: cat_id },
            success: function (sub_cat) {
                $("#cpscat").html(sub_cat);
            },
        });
    });
});
$(document).ready(function () {
    $("form#add-product").submit(function (e) {
        e.preventDefault();
        $("#save-p-btn").attr("disabled", "true");
        $("#save-p-btn i").attr("class", "fas fa-spinner fa-spin ml-2 mr-2");
        $.ajax({
            url: "assets/include/add_product.php",
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                $("#add_product").modal("hide");
                var id = data.trim();
                var tableRow =
                    `
                    <tr id = 'row-` +
                    id +
                    `'>
                        <td class="ser-row"></td>
                        <td id="name-` +
                    id +
                    `">` +
                    $("input[name=pname]").val() +
                    `</td>
                        <td id="cat-` +
                    id +
                    `">` +
                    $("#add_product select[name=pcat] option:checked").text() +
                    `</td>
                        <td id="subcat-` +
                    id +
                    `">` +
                    $("#add_product select[name=pscat] option:checked").text() +
                    `</td>
                    <td id="quantity-` +
                    id +
                    `">` +
                    $("input[name=pquan]").val() +
                    `</td>
                    <td id="price-`+id+`">`+$("input[name=price]").val()+`</td> <td><span id="status-`+id+`" class="badge badge-primary">Active</span></td>
                        <td id="action-` +
                    id +
                    `">
                    <div class="dropdown">
                        <button type="button" class="btn btn-light dropdown-toggle w-100" data-toggle="dropdown">
                            Actions
                        </button>
                        <div class="dropdown-menu bg-dark text-center p-2 w-100">
                        <button class="btn btn-sm btn-info view-product" data-toggle="tooltip" data-placement="top" title="View" data-id="` +
                    id +
                    `"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-sm btn-success edit-product" data-toggle="tooltip" data-placement="top" title="Edit" data-id="` +
                    id +
                    `"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-warning copy-product" data-toggle="tooltip" data-placement="top" title="Copy" data-id="` +
                    id +
                    `"><i class="fas fa-copy"></i></button>
                        <button class="btn btn-sm btn-danger delete-product" data-toggle="tooltip" data-placement="top" title="Delet" data-id="` +
                    id +
                    `"><i class="fas fa-trash"></i></button>
                    </div>
                    </div></td>
                        </tr>
                `;
                // $("")
                $("#main-table").prepend(tableRow);
                $("#bs-alert").toggle();
                setTimeout(function () {
                    $("#bs-alert").toggle();
                }, 10000);
                tableSer();
                $("#save-p-btn").attr("disabled", "false");
                $("#save-p-btn i").attr("class", "fas fa-save ml-2 mr-2");
                $("form#add-product")[0].reset();
            },
        });
    });
});
$(document).ready(function () {
    $("form#copy-product").submit(function (e) {
        e.preventDefault();
        $("#copy-p-btn").attr("disabled", "true");
        $("#copy-p-btn i").attr("class", "fas fa-spinner fa-spin ml-2 mr-2");
        $.ajax({
            url: "assets/include/add_product.php",
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                var id = data.trim();
                var tableRow =
                    `
                    <tr id = 'row-` +
                    id +
                    `'>
                        <td class="ser-row"></td>
                        <td id="name-` +
                    id +
                    `">` +
                    $("#copy_product input[name=pname]").val() +
                    `</td>
                        <td id="cat-` +
                    id +
                    `">` +
                    $("#copy_product select[name=pcat] option:checked").text() +
                    `</td>
                        <td id="subcat-` +
                    id +
                    `">` +
                    $(
                        "#copy_product select[name=pscat] option:checked"
                    ).text() +
                    `</td>
                        <td id="quantity-` +
                    id +
                    `">` +
                    $("#copy_product input[name=pquan]").val() +
                    `</td>
                    <td id="price-`+id+`">`+$("#copy_product input[name=price]").val()+`</td>
                    <td><span id="status-`+id+`" class="badge badge-primary">Active</span></td>
                        <td id="action-` +
                    id +
                    `">
                    <div class="dropdown">
                        <button type="button" class="btn btn-light dropdown-toggle w-100" data-toggle="dropdown">
                            Actions
                        </button>
                        <div class="dropdown-menu bg-dark text-center p-2 w-100">
                        <button class="btn btn-sm btn-info view-product" data-toggle="tooltip" data-placement="top" title="View" data-id="` +
                    id +
                    `"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-sm btn-success edit-product" data-toggle="tooltip" data-placement="top" title="Edit" data-id="` +
                    id +
                    `"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-warning copy-product" data-toggle="tooltip" data-placement="top" title="Copy" data-id="` +
                    id +
                    `"><i class="fas fa-copy"></i></button>
                        <button class="btn btn-sm btn-danger delete-product" data-toggle="tooltip" data-placement="top" title="Delet" data-id="` +
                    id +
                    `"><i class="fas fa-trash"></i></button>
                    </div>
                    </div></td>
                        </tr>
                `;
                $("#main-table").prepend(tableRow);
                $("#copy_product").modal("hide");
                $("#bs-alert").css("display", "block");
                setTimeout(function () {
                    $("#bs-alert").css("display", "none");
                }, 10000);
                tableSer();
                $("#copy-p-btn").attr("disabled", "false");
                $("#copy-p-btn i").attr("class", "fas fa-save ml-2 mr-2");
            },
        });
    });
});
$(document).ready(function () {
    $("form#edit-product").submit(function (e) {
        var id = $("input[name=id]").val();
        $("#edit-p-btn").removeAttr("disabled");
        $("#edit-p-btn i").attr("class", "fas fa-spinner fa-spin ml-2 mr-2");
        e.preventDefault();
        $.ajax({
            url: "assets/include/edit_products.php",
            type: "post",
            data: $(this).serialize(),
            success: function () {},
        });
        $("#edit-p-btn").removeAttr("disabled");
        $("#edit-p-btn i").attr("class", "fas fa-save ml-2 mr-2");
        $("#edit_product").modal("hide");
        $("#name-" + id).text($("input[name=epname]").val());
        $("#price-" + id).text($("input[name=eprice]").val());
        $("#cat-" + id).text($("select[name=epcat] option:checked").text());
        $("#subcat-" + id).text($("select[name=epscat] option:checked").text());
        var status = $("select[name=status] option:checked").text();
        $("#status-" + id).text(status);
        if (status=='Disabled') {
            $("#status-" + id).attr("class", "badge badge-danger");
        }
        else {
            $("#status-" + id).attr("class", "badge badge-primary");
        }
        $("#quantity-" + id).text($("input[name=epquan]").val());
    });
});
$(document).on("click", ".delete-product", function () {
    var id = $(this).data("id");
    swal({
        title: "Are you sure?",
        text: "Once deleted the product will disappear!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: "assets/include/remove_products.php",
                data: { pid: id },
            });
            $("#status-" + id).attr("class", "badge badge-danger");
            $("#status-" + id).text("Disabled");
            tableSer();
            swal("The Product has been deleted!", {
                icon: "success",
            });
        }
    });
});
$(document).on("click", ".view-product", function () {
    var id = $(this).data("id");
    $("#view_product").modal();
    $("#product_name").text($("#name-" + id).text());
    $("#product_cat").text($("#cat-" + id).text());
    $("#product_subcat").text($("#subcat-" + id).text());
    $("#product_quan").text($("#quantity-" + id).text());
});
$(document).on("click", ".edit-product", function () {
    $("#edit-product")[0].reset();
    var id = $(this).data("id");
    $("#edit_product").modal();
    $("input[name=id]").val(id);
    $('select#epscat option:contains("' + $("#subcat-" + id).text() + '")').prop("selected", true);
    $('select#epcat option:contains("' + $("#cat-" + id).text() + '")').prop("selected",true);
    $('select#status option:contains("' + $("#status-" + id).text() + '")').prop("selected",true);
    $("input[name=epname]").val($("#name-" + id).text());
    $("input[name=eprice]").val($("#price-" + id).text());
    $("input[name=epquan]").val($("#quantity-" + id).text());
});
$(document).on("click", ".copy-product", function () {
    $("#copy-product")[0].reset();
    var id = $(this).data("id");
    $("#copy_product").modal();
    $("input[name=id]").val(id);
    $("input[name=pname]").val($("#name-" + id).text());
    $("input[name=pquan]").val($("#quantity-" + id).text());
    $("input[name=price]").val($("#price-" + id).text());
    $('#copy-product #pscat option:contains("' + $("#subcat-" + id).text() + '")').prop("selected", true);
    $('#copy-product #pcat option:contains("' + $("#cat-" + id).text() + '")').prop("selected", true);
});
var session_items = sessionStorage.getItem("cart-items");
if (session_items==null) {
    sessionStorage.setItem("cart-items", 0);
}
$(document).ready(function () {
    $(".cart-items").text(sessionStorage.getItem("cart-items"));
});