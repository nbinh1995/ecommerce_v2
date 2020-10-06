var cart = cart || {};

cart.addCart = function(ele) {
    let data = new FormData(ele);
    $.ajax({
        url: "/cart/add",
        method: "post",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
            $(ele)
                .find("input[name='product_amount']")
                .val(1);
            // $("#cart").html(data["hover"]);
            $(".badge").text(data.carts.count);
            toastr.options = { positionClass: "toast-bottom-right" };
            toastr["success"]("Add Cart Success!");
        }
    });
};

cart.clearCart = function() {
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "cart/clear",
        method: "delete",
        data: {
            _token: token
        },
        success: function(data) {
            $(".cart-container").html(data.html);
            // $("#cart").html(data["hover"]);
            $(".badge").text(0);
            toastr.options = { positionClass: "toast-bottom-right" };
            toastr["success"]("Clear Cart Success!");
        }
    });
};

cart.removeCart = function(ele) {
    let id = $(ele).data("id");
    let size_id = $(ele).data("size");
    let token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "/cart/remove",
        method: "delete",
        data: {
            _token: token,
            product_id: id,
            product_size_id: size_id
        },
        success: function(data) {
            $(".cart-container").html(data.html);
            // $("#cart").html(data["hover"]);
            $(".badge").text(data.carts.count);
            toastr.options = { positionClass: "toast-bottom-right" };
            toastr["success"]("Update Success!");
        }
    });
};

cart.updateCart = function(ele) {
    let product_amount = $(ele).val();
    let id = $(ele).data("id");
    let size_id = $(ele).data("size");
    let token = $("meta[name='csrf-token']").attr("content");
    // console.log("{{ route('products.updateCart',['id'=>"+id+"]) }}");
    $.ajax({
        url: "/cart/update",
        method: "post",
        data: {
            _token: token,
            product_id: id,
            product_amount: product_amount,
            product_size_id: size_id
        },
        success: function(data) {
            $(".cart-container").html(data.html);
            // $("#cart").html(data["hover"]);
            $(".badge").text(data.carts.count);
            toastr.options = { positionClass: "toast-bottom-right" };
            toastr["success"]("Update Cart Success!");
        }
    });
};

$(document).ready(function() {
    $(document).on("submit", "#add-cart", function(e) {
        e.preventDefault();
        console.log(e.target);
        cart.addCart(e.target);
    });

    $(document).on("amount", ".qty", function(e) {
        e.preventDefault();
        cart.updateCart(e.target);
    });

    $(document).on("click", ".remove-cart", function(e) {
        e.preventDefault();
        cart.removeCart(e.target);
    });

    $(document).on("click", ".clear-cart", function(e) {
        e.preventDefault();
        cart.clearCart();
    });
});
