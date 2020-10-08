const TABLE = "Products";
const SIZE_MODE = "modal-lg";
const ID_FORM_CREATE = "form-create";
const ID_FORM_EDIT = "form-edit";

const URL_CREATE = "/dashboard/products/create";
const URL_SHOW_LIST = "/dashboard/products/list";
const URL_EDIT = "/dashboard/products";
const URL_DESTROY = "/dashboard/products";
const ID_TABLE = "#common-table";
const ID_MODAL = "#common-modal";

const ID_IMAGE_PREVIEW = "#image-preview";

var product =
    product ||
    new CRUD(
        URL_CREATE,
        URL_SHOW_LIST,
        URL_EDIT,
        URL_DESTROY,
        ID_TABLE,
        ID_MODAL
    );

product.previewImage = function(element) {
    let img = element.files[0];
    let reader = new FileReader();
    reader.onloadend = function() {
        $(ID_IMAGE_PREVIEW).attr("src", reader.result);
    };
    reader.readAsDataURL(img);
};

product.init = function() {
    product.showList();
};

$(document).ready(function() {
    product.init();

    $(document).on("click", ".create", function(e) {
        product.setModal(
            `Create ${TABLE}`,
            `Add ${TABLE}`,
            SIZE_MODE,
            ID_FORM_CREATE,
            ""
        );
        product.createItem();
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".edit", function(e) {
        product.setModal(
            `Edit ${TABLE}`,
            `Update ${TABLE}`,
            SIZE_MODE,
            ID_FORM_EDIT,
            ""
        );
        product.editItem($(e.target).data("id"));
        $(ID_MODAL).modal("show");
    });

    $(document).on("click", ".remove", function(e) {
        product.destroyItem($(e.target).data("id"));
    });

    $(document).on("change", "#image-btn", function(e) {
        product.previewImage(e.target);
    });

    $(document).on("submit", `#${ID_FORM_CREATE}`, function(e) {
        e.preventDefault();
        product.storeItem(e.target);
        $(ID_MODAL).modal("hide");
    });

    $(document).on("submit", `#${ID_FORM_EDIT}`, function(e) {
        e.preventDefault();
        product.updateItem(e.target);
        $(ID_MODAL).modal("hide");
    });
});
