const TABLE = "Sizes";
const SIZE_MODE = "modal-md";
const ID_FORM_CREATE = "form-create";
const ID_FORM_EDIT = "form-edit";

const URL_CREATE = "/dashboard/sizes/create";
const URL_SHOW_LIST = "/dashboard/sizes/list";
const URL_EDIT = "/dashboard/sizes";
const URL_DESTROY = "/dashboard/sizes";
const ID_TABLE = "#common-table";
const ID_MODAL = "#common-modal";

var size =
    size ||
    new CRUD(
        URL_CREATE,
        URL_SHOW_LIST,
        URL_EDIT,
        URL_DESTROY,
        ID_TABLE,
        ID_MODAL
    );

size.init = function () {
    size.showList();
};

$(document).ready(function () {
    size.init();

    $(document).on("click", ".create", function (e) {
        size.setModal(
            `Create ${TABLE}`,
            `Add ${TABLE}`,
            SIZE_MODE,
            ID_FORM_CREATE,
            ""
        );
        size.createItem();
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".edit", function (e) {
        size.setModal(
            `Edit ${TABLE}`,
            `Update ${TABLE}`,
            SIZE_MODE,
            ID_FORM_EDIT,
            ""
        );
        size.editItem($(e.target).data("id"));
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".remove", function (e) {
        size.destroyItem($(e.target).data("id"));
    });

    $(document).on("submit", `#${ID_FORM_CREATE}`, function (e) {
        e.preventDefault();
        size.storeItem(e.target);
        $(ID_MODAL).modal("hide");
    });

    $(document).on("submit", `#${ID_FORM_EDIT}`, function (e) {
        e.preventDefault();
        size.updateItem(e.target);
        $(ID_MODAL).modal("hide");
    });
});
