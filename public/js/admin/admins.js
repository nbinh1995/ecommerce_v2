const TABLE_ADMIN = "Admins";
const SIZE_MODE_ADMIN = "modal-md";
const ID_FORM_CREATE_ADMIN = "form-create-admin";
const ID_FORM_EDIT_ADMIN = "form-edit-admin";

const URL_CREATE_ADMIN = "/dashboard/admins/create";
const URL_SHOW_LIST_ADMIN = "/dashboard/admins/list";
const URL_EDIT_ADMIN = "/dashboard/admins";
const URL_DESTROY_ADMIN = "/dashboard/admins";
const ID_TABLE_ADMIN = "#admin-table";
const ID_MODAL_ADMIN = "#common-modal";

var admin =
    admin ||
    new CRUD(
        URL_CREATE_ADMIN,
        URL_SHOW_LIST_ADMIN,
        URL_EDIT_ADMIN,
        URL_DESTROY_ADMIN,
        ID_TABLE_ADMIN,
        ID_MODAL_ADMIN
    );

admin.init = function () {
    admin.showList();
    console.log('admin');
};

$(document).ready(function () {
    admin.init();

    $(document).on("click", ".create-admin", function (e) {
        admin.setModal(
            `Create ${TABLE_ADMIN}`,
            `Add ${TABLE_ADMIN}`,
            SIZE_MODE_ADMIN,
            ID_FORM_CREATE_ADMIN,
            ""
        );
        admin.createItem();
        $(ID_MODAL_ADMIN).modal("show");
    });

    $(document).on("click", ".edit-admin", function (e) {
        admin.setModal(
            `Edit ${TABLE_ADMIN}`,
            `Update ${TABLE_ADMIN}`,
            SIZE_MODE_ADMIN,
            ID_FORM_EDIT_ADMIN,
            ""
        );
        admin.editItem($(e.target).data("id"));
        $(ID_MODAL_ADMIN).modal("show");
    });

    $(document).on("click", ".remove-admin", function (e) {
        admin.destroyItem($(e.target).data("id"));
    });

    $(document).on("submit", `#${ID_FORM_CREATE_ADMIN}`, function (e) {
        e.preventDefault();
        admin.storeItem(e.target);
        $(ID_MODAL).modal("hide");
    });

    $(document).on("submit", `#${ID_FORM_EDIT_ADMIN}`, function (e) {
        e.preventDefault();
        admin.updateItem(e.target);
        $(ID_MODAL).modal("hide");
    });
});
