const ID_IMAGE_TABLE = '#image-table';
const URL_BASE = '/dashboard/products';
const ID_IMAGE_FORM = '#create-image-form';
const ID_IMAGE_MODAL = '#create-image-modal';

var image = image || {};
image.showList = function(){
    $.ajax({
        url: `${URL_BASE}/${product_slug}/show-list-image`,
        method: "GET",
        dataType: "json",
        success: function (data) {
            let tbody = `${ID_IMAGE_TABLE} tbody`;
            $(tbody).empty();
            $(tbody).html(data.html);
        },
    });
}

image.storeItem = function(element){
    let url = $(element).attr("action");
    let data = new FormData(element);
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                image.showList();
                $(ID_IMAGE_MODAL).modal("hide");
                toastr.options = { positionClass: "toast-bottom-right" };
                toastr["success"]('Created Image Success!');
            },
            error: function (xhr, status, error) {
               
            },
        });
}
image.removeItem = function(id){
    let token = $("meta[name='csrf-token']").attr("content");
    let url = `${URL_BASE}/${id}/remove-image`;
    bootbox.confirm({
        message: "Are you sure?",
        buttons: {
            confirm: {
                label: "Yes",
                className: "btn-success",
            },
            cancel: {
                label: "No",
                className: "btn-danger",
            },
        },
        callback:function (result){
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {
                        _token: token,
                    },
                    success: function (data) {
                        image.showList();
                        toastr.options = {
                            positionClass: "toast-bottom-right",
                        };
                        toastr["success"](`Removed Image Success!`);
                    },
                });
            }
        },
    });
}
image.init = function(){
    image.showList();
}
$(document).ready(function () {
    image.init();

    $(document).on("submit", ID_IMAGE_FORM, function (e) {
       e.preventDefault();
       image.storeItem(e.target);
    });

    $(document).on("click", ".remove-image", function (e) {
        image.removeItem($(e.target).data("id"));
    });

});