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
    $("form#add-category").submit(function (e) {
        e.preventDefault();
        loadingBtn();
        $.ajax({
            url: "../assets/include/add_category.php",
            type: "post",
            data: $(this).serialize(),
            success: function (data) {
                // console.log(data);
                $("#add_category").modal("hide");
                id = data.trim();
                var tableRow =
                    `
                    <tr id = 'row-` +
                    id +
                    `'>
                        <td class="ser-row"></td>
                        <td id="name-"` +
                    id +
                    `>` +
                    $("input[name=cname]").val() +
                    `</td>
                    <td>
                        <span id="status-`+id+`" class="badge badge-primary">Active</span></td>
                    <td>
                        <div class="dropdown">
                        <button type="button" class="btn btn-light dropdown-toggle w-100" data-toggle="dropdown">
                            Actions
                        </button>
                        <div class="dropdown-menu bg-dark text-center p-2 w-100">
                        <button class="btn btn-sm btn-info view-category" data-toggle="tooltip" data-placement="top" title="View" data-id="` +
                    id +
                    `"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-sm btn-success edit-category" data-toggle="tooltip" data-placement="top" title="Edit" data-id="` +
                    id +
                    `"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-warning copy-category" data-toggle="tooltip" data-placement="top" title="Copy" data-id="` +
                    id +
                    `"><i class="fas fa-copy"></i></button>
                        <button class="btn btn-sm btn-danger delete-category" data-toggle="tooltip" data-placement="top" title="Delet" data-id="` +
                    id +
                    `"><i class="fas fa-trash"></i></button>
                    </div>
                    </div>
                        </td>
                    </tr>
                `;
                $("tbody").prepend(tableRow);
                tableSer();
                $("form")[0].reset();
                stopLoading();
            },
        });
    });
});
$(document).on("click", ".delete-category", function () {
    var id = $(this).data("id");
    swal({
        title: "Are you sure?",
        text: "Once delted the category will be removed from Database!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: "../assets/include/remove_category.php",
                data: { cid: id },
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
$(document).on("click", ".view-category", function () {
    var id = $(this).data("id");
    $("#view_category").modal();
    $("#category_name").text($("#name-" + id).text());
});
$(document).on("click", ".copy-category", function () {
    var id = $(this).data("id");
    $("#add_category").modal();
    $("input[name=cname]").val($("#name-" + id).text());
});

$(document).on("click", ".edit-category", function () {
    var id = $(this).data("id");
    $("#edit_category").modal();
    $("input[name=ecname]").val($("#name-" + id).text());
    $("input[name=id]").val(id);
    $('select option:contains("' + $("#status-" + id).text() + '")').prop("selected", true);
});
$(document).ready(function () {
    $("form#edit-category").submit(function (e) {
        var id = $("input[name=id]").val();
        loadingBtn();
        e.preventDefault();
        $.ajax({
            url: "../assets/include/edit_category.php",
            type: "post",
            data: $(this).serialize(),
            success: function () {},
        });
        $("#edit_category").modal("hide");
        $("#name-" + id).text($("input[name=ecname]").val());
        var status = $("select option:checked").text();
        $("#status-" + id).text(status);
        if (status=='Disabled') {
            $("#status-" + id).attr("class", "badge badge-danger");
        }
        else {
            $("#status-" + id).attr("class", "badge badge-primary");
        }
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