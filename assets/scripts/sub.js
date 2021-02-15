var session_items = sessionStorage.getItem("cart-items");
if (session_items==null) {
    sessionStorage.setItem("cart-items", 0);
}
function tableSer() {
    var i = 1;
    $(".ser-row").each(function () {
        $(this).text(i++);
    });
}
function loadingBtn() {
    $(".loading-btn").attr("disabled","true");
    $(".loading-btn i").attr("class","fas fa-spinner fa-spin mr-2 ml-2");
}
function stopLoading() {
    $(".loading-btn").removeAttr("disabled");
    $(".loading-btn i").attr("class","fas fa-save mr-2 ml-2");
}
$(document).ready(function () {
    $("form#add-subcategory").submit(function (e) {
        e.preventDefault();
        loadingBtn();
        $.ajax({
            url: "../assets/include/add_subcategory.php",
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                // console.log(data);
                $("#add_subcategory").modal("hide");
                id = data.trim();
                var tableRow =
                    `
                    <tr id = 'row-` +
                    id +
                    `'>
                        <td class="ser-row"></td>
                        <td id="name-` +
                    id +
                    `">` +
                    $("input[name=scname]").val() +
                    `</td>
                        <td id="cat-` +
                    id +
                    `">` +
                    $("select[name=pscat] option:checked").text() +
                    `</td>
                        <td>
                        <div class="dropdown">
                        <button type="button" class="btn btn-light dropdown-toggle w-100" data-toggle="dropdown">
                            Actions
                        </button>
                        <div class="dropdown-menu bg-dark text-center p-2 w-100">
                        <button class="btn btn-sm btn-info view-subcat" data-toggle="tooltip" data-placement="top" title="View" data-id="` +
                    id +
                    `"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-sm btn-success edit-subcat" data-toggle="tooltip" data-placement="top" title="Edit" data-id="` +
                    id +
                    `"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-warning copy-subcat" data-toggle="tooltip" data-placement="top" title="Copy" data-id="` +
                    id +
                    `"><i class="fas fa-copy"></i></button>
                        <button class="btn btn-sm btn-danger delete-subcat" data-toggle="tooltip" data-placement="top" title="Delet" data-id="` +
                    id +
                    `"><i class="fas fa-trash"></i></button>
                    </div>
                    </div>
                        </td>
                    </tr>
                `;
                $("tbody").prepend(tableRow);
                $("form")[0].reset();
                stopLoading();
                tableSer();
            },
        });
    });
});
$(document).on("click", ".delete-subcat", function () {
    var id = $(this).data("id");
    swal({
        title: "Are you sure?",
        text: "Once delted the subcategory will be removed from Database!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: "../assets/include/remove_subcategory.php",
                data: { scid: id },
            });
            $("#row-" + id).remove();
            tableSer();
            swal("The Product has been deleted!", {
                icon: "success",
            });
        }
    });
});

$(document).on("click", ".view-subcat", function () {
    var id = $(this).data("id");
    $("#view_subcat").modal();
    $("#subcat_name").text($("#name-" + id).text());
    $("#pcat").text($("#cat-" + id).text());
});
$(document).on("click", ".copy-subcat", function () {
    var id = $(this).data("id");
    $("#add_subcategory").modal();
    $("input[name=scname]").val($("#name-" + id).text());
    $('#pscat option:contains("' + $("#cat-" + id).text() + '")').prop(
        "selected",
        true
    );
});

$(document).on("click", ".edit-subcat", function () {
    var id = $(this).data("id");
    $("#edit_subcat").modal();
    $("input[name=id]").val(id);
    $("input[name=escname]").val($("#name-" + id).text());
    $('#epscat option:contains("' + $("#cat-" + id).text() + '")').prop(
        "selected",
        true
    );
});
$(document).ready(function () {
    $("form#edit-subcat").submit(function (e) {
        loadingBtn();
        var id = $("input[name=id]").val();
        e.preventDefault();
        $.ajax({
            url: "../assets/include/edit_subcategory.php",
            type: "post",
            data: $(this).serialize(),
            success: function () {},
        });
        $("#edit_subcat").modal("hide");
        $("#name-" + id).text($("input[name=escname]").val());
        $("#cat-" + id).text($("select[name=epscat] option:checked").text());
        $("form")[0].reset();
        stopLoading();
    });
});
var session_items = sessionStorage.getItem("cart-items");
if (session_items==null) {
    sessionStorage.setItem("cart-items", 0);
}
$(document).ready(function () {
    $(".cart-items").text(sessionStorage.getItem("cart-items"));
});