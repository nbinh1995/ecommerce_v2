const TABLE = "Attributes";
const SIZE_MODE = "modal-md";
const ID_FORM_CREATE = "form-create";
const ID_FORM_EDIT = "form-edit";

const URL_CREATE = "/dashboard/attributes/create";
const URL_SHOW_LIST = "/dashboard/attributes/list";
const URL_EDIT = "/dashboard/attributes";
const URL_DESTROY = "/dashboard/attributes";
const ID_TABLE = "#common-table";
const ID_MODAL = "#common-modal";

var attributes =
    attributes ||
    new CRUD(
        URL_CREATE,
        URL_SHOW_LIST,
        URL_EDIT,
        URL_DESTROY,
        ID_TABLE,
        ID_MODAL
    );

attributes.init = function () {
    attributes.showList();
};

$(document).ready(function () {
    attributes.init();

    $(document).on("click", ".create", async function (e) {
        attributes.setModal(
            `Create ${TABLE}`,
            `Add ${TABLE}`,
            SIZE_MODE,
            ID_FORM_CREATE,
            ""
        );
        await attributes.createItem();
        attr_value.showItem();
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".edit", async function (e) {
        attributes.setModal(
            `Edit ${TABLE}`,
            `Update ${TABLE}`,
            SIZE_MODE,
            ID_FORM_EDIT,
            ""
        );
        await attributes.editItem($(e.target).data("id"));
        attr_value.showItem();
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".remove", function (e) {
        attributes.destroyItem($(e.target).data("id"));
    });

    $(document).on("submit", `#${ID_FORM_CREATE}`, function (e) {
        e.preventDefault();
        attributes.storeItem(e.target);
        $(ID_MODAL).modal("hide");
    });

    $(document).on("submit", `#${ID_FORM_EDIT}`, function (e) {
        e.preventDefault();
        attributes.updateItem(e.target);
        $(ID_MODAL).modal("hide");
    });
});
