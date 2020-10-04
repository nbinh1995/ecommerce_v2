var cart = cart || {};

cart.addCart() = function(ele) {
    let data = new FormData(ele);
    $.ajax({
        url: "/cart/add",
        method: "post",
        data: data,
        success: function(data) {
            $(ele)
                .find("input[name='product_amount']")
                .val(1);
            $("#cart").html(data["hover"]);
            $(".badge").text(data["count"]);
            // toastr.options = { positionClass: "toast-bottom-right" };
            // toastr["success"]("Add Success!");
        }
    });
};

cart.clearCart = function() {
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "cart/clear",
        method: "get",
        data: {
            _token: token
        },
        success: function(data) {
            $(".cart-table").html(data["table"]);
            $("#cart").html(data["hover"]);
            $(".badge").text(data["count"]);
            toastr.options = { positionClass: "toast-bottom-right" };
            toastr["success"]("Clear Success!");
        }
    });
};

cart.removeCart = function(id) {
    url = window.location.origin + "cart/remove/" + id;
    $.ajax({
        url: url,
        method: "get",
        success: function(data) {
            $(".cart-table").html(data["table"]);
            // $("#cart").html(data["hover"]);
            $(".badge").text(data["count"]);
            // toastr.options = { positionClass: "toast-bottom-right" };
            // toastr["success"]("Remove Success!");
        }
    });
};

cart.updateCart = function(ele) {
    product_amount = $(ele).val();
    id = $(ele).data("id");
    let token = $("meta[name='csrf-token']").attr("content");
    // console.log("{{ route('products.updateCart',['id'=>"+id+"]) }}");
    $.ajax({
        url: "/cart/update",
        method: "post",
        data: {
            _token: token,
            product_id: id,
            product_amount: product_amount
        },
        success: function(data) {
            $(".cart-table").html(data["table"]);
            // $("#cart").html(data["hover"]);
            $(".badge").text(data["count"]);
            // toastr.options = { positionClass: "toast-bottom-right" };
            // toastr["success"]("Update Success!");
        }
    });
};
