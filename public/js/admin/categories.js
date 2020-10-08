const URL_CREATE = "/dashboard/categories/create";
const URL_SHOW_LIST = "/dashboard/categories/list";
const URL_EDIT = "/dashboard/categories";
const URL_DESTROY = "/dashboard/categories";
const ID_TABLE = "#common-table";
const ID_MODAL = "#common-modal";

var category =
    category ||
    new CRUD(
        URL_CREATE,
        URL_SHOW_LIST,
        URL_EDIT,
        URL_DESTROY,
        ID_TABLE,
        ID_MODAL
    );

category.init = function () {
    category.showList();
};

$(document).ready(function () {
    category.init();

    $(document).on("click", ".create", function (e) {
        category.setModal(
            "Create Category",
            "Add Category",
            "modal-md",
            "form-create",
            ""
        );
        category.createItem();
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".edit", function (e) {
        category.setModal(
            "Edit Category",
            "Update Category",
            "modal-md",
            "form-edit",
            ""
        );
        category.editItem($(e.target).data("id"));
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".remove", function (e) {
        category.destroyItem($(e.target).data("id"));
    });

    $(document).on("submit", "#form-create", function (e) {
        e.preventDefault();
        category.storeItem(e.target);
        $(ID_MODAL).modal("hide");
    });

    $(document).on("submit", "#form-edit", function (e) {
        e.preventDefault();
        category.updateItem(e.target);
        $(ID_MODAL).modal("hide");
    });
});
