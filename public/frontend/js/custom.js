$(document).ready(function (){
    loadCart();
    loadWishlist();

    // csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // load cart count helper function
    function loadCart()
    {
        $.ajax({
            method: 'GET',
            url: '/load-cart-count',
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    // load wishlist count helper function
    function loadWishlist()
    {
        $.ajax({
            method: 'GET',
            url: '/load-wishlist-count',
            success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }

    // add to cart button
    $('.addToCartBtn').click(function (e){
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: 'POST',
            url: '/add-to-cart',
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                Toast.fire({
                    icon: response.icon,
                    title: response.status,
                });
                loadCart();
            }
        });
    });

    // add to wishlist button
    $('.addToWishlist').click(function (e){
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: 'POST',
            url: '/add-to-wishlist',
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                Toast.fire({
                    icon: response.icon,
                    title: response.status,
                });
                loadWishlist();
            }
        });
    });

    // checkout button
    $('.buyNowBtn').click(function (e){
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: 'POST',
            url: '/add-to-cart',
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                if (response) {
                    window.location = "/checkout";
                }
            },
            failure: function (response) {
                Toast.fire({
                    icon: response.icon,
                    title: response.status,
                });
            }
        });
    });

    // increment button
    $('.increment-btn').click(function (e){
        e.preventDefault();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    // decrement button
    $('.decrement-btn').click(function (e){
        e.preventDefault();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    // remove cart item button
    $('.delete-cart-item').click(function (e){
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: 'POST',
            url: '/delete-cart-item',
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                window.location.reload();
                Toast.fire({
                    icon: response.icon,
                    title: response.status,
                });
            }
        });
    });

    // remove wishlist button
    $('.remove-wishlist-item').click(function (e){
       e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: 'POST',
            url: '/delete-wishlist-item',
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                window.location.reload();
                Toast.fire({
                    icon: response.icon,
                    title: response.status,
                });
            }
        });

    });

    // change quantity on decrement btn
    $('.changeQuantity').click(function (e){
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        data = {
            'prod_id' : prod_id,
            'prod_qty' : qty,
        }
        $.ajax({
            method: 'POST',
            url: '/update-cart',
            data: data,
            success: function (response) {
                window.location.reload();
                Toast.fire({
                    icon: response.icon,
                    title: response.status,
                });
            }
        });
    });
});
