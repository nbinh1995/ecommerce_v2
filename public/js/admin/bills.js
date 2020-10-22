const TABLE = "Bills";
const SIZE_MODE = "modal-md";
const ID_FORM_CREATE = "form-create";
const ID_FORM_EDIT = "form-edit";

const URL_CREATE = "/dashboard/bills/create";
const URL_SHOW_LIST = "/dashboard/bills/list";
const URL_EDIT = "/dashboard/bills";
const URL_DESTROY = "/dashboard/bills";
const ID_TABLE = "#common-table";
const ID_MODAL = "#common-modal";

var bill =
    bill ||
    new CRUD(
        URL_CREATE,
        URL_SHOW_LIST,
        URL_EDIT,
        URL_DESTROY,
        ID_TABLE,
        ID_MODAL
    );

bill.init = function () {
    bill.showList();
};

$(document).ready(function () {
    bill.init();

    $(document).on("click", ".create", function (e) {
        bill.setModal(
            `Create ${TABLE}`,
            `Add ${TABLE}`,
            SIZE_MODE,
            ID_FORM_CREATE,
            ""
        );
        bill.createItem();
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".edit", function (e) {
        bill.setModal(
            `Edit ${TABLE}`,
            `Update ${TABLE}`,
            SIZE_MODE,
            ID_FORM_EDIT,
            ""
        );
        bill.editItem($(e.target).data("id"));
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".remove", function (e) {
        bill.destroyItem($(e.target).data("id"));
    });

    $(document).on("submit", `#${ID_FORM_CREATE}`, function (e) {
        e.preventDefault();
        bill.storeItem(e.target);
        $(ID_MODAL).modal("hide");
    });

    $(document).on("submit", `#${ID_FORM_EDIT}`, function (e) {
        e.preventDefault();
        bill.updateItem(e.target);
        $(ID_MODAL).modal("hide");
    });
});
