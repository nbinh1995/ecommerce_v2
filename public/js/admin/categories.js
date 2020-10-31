const TABLE = "Categories";
const SIZE_MODE = "modal-md";
const ID_FORM_CREATE = "form-create";
const ID_FORM_EDIT = "form-edit";

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

    $(document).on("click", ".create", async function(e) {
        category.setModal(
            `Create ${TABLE}`,
            `Add ${TABLE}`,
            SIZE_MODE,
            ID_FORM_CREATE,
            ""
        );
        await category.createItem();
        $('.select2').select2();    
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".edit",async function (e) {
        category.setModal(
            `Edit ${TABLE}`,
            `Update ${TABLE}`,
            SIZE_MODE,
            ID_FORM_EDIT,
            ""
        );
        await category.editItem($(e.target).data("id"));
        
        $('.select2').select2().trigger('change');
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".remove", function (e) {
        category.destroyItem($(e.target).data("id"));
    });

    $(document).on("submit", `#${ID_FORM_CREATE}`, function (e) {
        e.preventDefault();
        category.storeItem(e.target);
        $(ID_MODAL).modal("hide");
    });

    $(document).on("submit", `#${ID_FORM_EDIT}`, function (e) {
        e.preventDefault();
        category.updateItem(e.target);
        $(ID_MODAL).modal("hide");
    });
});
