const TABLE = "Users";
const SIZE_MODE = "modal-lg";
const ID_FORM_CREATE = "form-create";
const ID_FORM_EDIT = "form-edit";

const URL_CREATE = "/dashboard/users/create";
const URL_SHOW_ADMIN_LIST = "/dashboard/users/listAdmin";
const URL_SHOW_CUSTOMER_LIST = "/dashboard/users/listCustomer";
const URL_SHOW_BANNED_LIST = "/dashboard/users/listBanned";
const URL_EDIT = "/dashboard/users";
const URL_DESTROY = "/dashboard/users";
const ID_ADMIN_TABLE = "#admin-table";
const ID_CUSTOMER_TABLE = "#customer-table";
const ID_BANNED_TABLE = "#banned-table";
const ID_MODAL = "#common-modal";

var user =
    user ||
    new CRUD(
        URL_CREATE,
        URL_SHOW_ADMIN_LIST,
        URL_EDIT,
        URL_DESTROY,
        ID_ADMIN_TABLE,
        ID_MODAL
    );

user.showCustomerList = function() {
    $.ajax({
        url: URL_SHOW_CUSTOMER_LIST,
        method: "GET",
        dataType: "json",
        success: function(data) {
            let tbody = `${ID_CUSTOMER_TABLE} tbody`;
            if ($.fn.DataTable.isDataTable(ID_CUSTOMER_TABLE)) {
                $(ID_CUSTOMER_TABLE)
                    .DataTable()
                    .destroy();
            }
            $(tbody).empty();
            $(tbody).html(data.html);
            $(ID_CUSTOMER_TABLE).DataTable({
                responsive: true,
                autoWidth: false
            });
        }
    });
};

user.showBannerList = function() {
    $.ajax({
        url: URL_SHOW_BANNED_LIST,
        method: "GET",
        dataType: "json",
        success: function(data) {
            let tbody = `${ID_BANNED_TABLE} tbody`;
            if ($.fn.DataTable.isDataTable(ID_BANNED_TABLE)) {
                $(ID_BANNED_TABLE)
                    .DataTable()
                    .destroy();
            }
            $(tbody).empty();
            $(tbody).html(data.html);
            $(ID_BANNED_TABLE).DataTable({
                responsive: true,
                autoWidth: false
            });
        }
    });
};

user.banItem = function (id,message = "Ban Success!"){
    let token = $("meta[name='csrf-token']").attr("content");
    let url = `${URL_DESTROY}/${id}`;
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
        callback: function (result) {
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {
                        _token: token,
                    },
                    success: function (data) {
                        user.showBannerList();
                        user.showCustomerList();
                        toastr.options = {
                            positionClass: "toast-bottom-right",
                        };
                        toastr["success"](`${message}`);
                    },
                });
            }
        },
    });
}

user.restoreItem = function(id,message = "Restore Success!"){
    let token = $("meta[name='csrf-token']").attr("content");
    let url = `${URL_DESTROY}/${id}`;
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
        callback: function (result) {
            if (result) {
                $.ajax({
                    method: "post",
                    url: url,
                    data: {
                        _token: token,
                        _method: 'PATCH',
                    },
                    success: function (data) {
                        user.showBannerList();
                        user.showCustomerList();
                        toastr.options = {
                            positionClass: "toast-bottom-right",
                        };
                        toastr["success"](`${message}`);
                    },
                });
            }
        },
    });
}

user.init = function() {
    user.showList();
    user.showCustomerList();
    user.showBannerList();
};

$(document).ready(function() {
    user.init();

    $(document).on("click", ".create", function(e) {
        user.setModal(
            `Create Admin ${TABLE}`,
            `Add Admin ${TABLE}`,
            SIZE_MODE,
            ID_FORM_CREATE,
            ""
        );
        user.createItem();
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".edit", function(e) {
        user.setModal(
            `Edit Admin ${TABLE}`,
            `Update Admin ${TABLE}`,
            SIZE_MODE,
            ID_FORM_EDIT,
            ""
        );
        user.editItem($(e.target).data("id"));
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".remove", function(e) {
        user.destroyItem($(e.target).data("id"));
    });

    $(document).on("click", ".ban", function(e) {
        user.banItem($(e.target).data("id"));
    });

    $(document).on("click", ".restore", function(e) {
        user.restoreItem($(e.target).data("id"));
    });

    $(document).on("submit", `#${ID_FORM_CREATE}`, function(e) {
        e.preventDefault();
        user.storeItem(e.target);
        $(ID_MODAL).modal("hide");
    });

    $(document).on("submit", `#${ID_FORM_EDIT}`, function(e) {
        e.preventDefault();
        user.updateItem(e.target);
        $(ID_MODAL).modal("hide");
    });
});
