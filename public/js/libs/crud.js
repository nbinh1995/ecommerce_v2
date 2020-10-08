class CRUD {
    constructor(create, show, edit, destroy, table, modal) {
        this.create = create || "";
        this.show = show || "";
        this.edit = edit || "";
        this.destroy = destroy || "";
        this.table = table || "";
        this.modal = modal || "";
    }

    setModal(titleModal, btnName, sizeModal, idForm, contentModal) {
        $(this.modal).find(".modal-title").text(titleModal);
        $(this.modal).find(".modal-dialog").addClass(sizeModal);
        $(this.modal).find(".modal-body").text(contentModal);
        $(this.modal).find("button[type='submit']").text(btnName);
        $(this.modal).find("button[type='submit']").attr("form", idForm);
    }

    showList() {
        $.ajax({
            url: this.show,
            method: "GET",
            dataType: "json",
            success: function (data) {
                let tbody = `${this.table} tbody`;
                if ($.fn.DataTable.isDataTable(this.table)) {
                    $(this.table).DataTable().destroy();
                }
                $(tbody).empty();
                $(tbody).html(data.html);
                $(this.table).DataTable({
                    responsive: true,
                    autoWidth: false,
                });
            }.bind(this),
        });
    }

    createItem() {
        $.ajax({
            url: this.create,
            method: "GET",
            dataType: "json",
            success: function (data) {
                let tbody = `${this.modal} .modal-body`;
                $(tbody).html(data.html);
            }.bind(this),
        });
    }

    storeItem(element, message = "Created Success!") {
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
                this.showList();
                toastr.options = { positionClass: "toast-bottom-right" };
                toastr["success"](`${message}`);
            }.bind(this),
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON);
                // console.log(status);
                // console.log(error);
            },
        });
    }

    editItem(id) {
        let url = `${this.edit}/${id}/edit`;
        $.ajax({
            url: url,
            method: "GET",
            dataType: "json",
            success: function (data) {
                let tbody = `${this.modal} .modal-body`;
                $(tbody).html(data.html);
            }.bind(this),
        });
    }

    updateItem(element, message = "Updated Success!") {
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
                this.showList();
                toastr.options = { positionClass: "toast-bottom-right" };
                toastr["success"](`${message}`);
            }.bind(this),
            error: function (xhr, status, error) {},
        });
    }

    destroyItem(id, message = "Removed Success!") {
        let token = $("meta[name='csrf-token']").attr("content");
        let url = `${this.destroy}/${id}`;
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
                            this.showList();
                            toastr.options = {
                                positionClass: "toast-bottom-right",
                            };
                            toastr["success"](`${message}`);
                        }.bind(this),
                    });
                }
            }.bind(this),
        });
    }
}
