$(document).on('click', '.number-spinner button', function () {
    var btn = $(this),
        oldValue = btn.closest('.number-spinner').find('input').val().trim(),
        newVal = 0;

    if (btn.attr('data-dir') == 'up') {
        newVal = parseInt(oldValue) + 1;
    } else {
        if (oldValue > 1) {
            newVal = parseInt(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    btn.closest('.number-spinner').find('input').val(newVal);
});

function update_Cart(event) {
    event.preventDefault();
    let urlUpdateCart = $('.update_cart_url').data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('.ad').find('input.qaty').val();
    $.ajax({
        type: 'GET',
        url: urlUpdateCart,
        data: {id: id, quantity: quantity},
        success: function (data) {
           if (data.code === 200){
              $('.wrapper').html(data.shopping_cart);
           }
        },
        error: function () {

        }
    })
}

function delete_Cart(event){
    event.preventDefault();
    let urlDeleteCart = $('.delete_cart_url').data('url');
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: urlDeleteCart,
        data: {id: id},
        success: function (data) {
            if (data.code === 200){
                $('.wrapper').html(data.shopping_cart).time(0);
            }

        },
        error: function () {

        }
    })
}

$(function () {
   $('.update_Cart').on('click',update_Cart);
    $('.delete_Cart').on('click', delete_Cart);
})

