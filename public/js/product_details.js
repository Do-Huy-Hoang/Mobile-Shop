$(document).ready(function () {
    // MDB Lightbox Init
    $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });
});

$(document).ready(function(){

    $(".tb").hover(function(){

        $(".tb").removeClass("tb-active");
        $(this).addClass("tb-active");

        current_fs = $(".active");

        next_fs = $(this).attr('id');
        next_fs = "#" + next_fs + "1";

        $("fieldset").removeClass("active");
        $(next_fs).addClass("active");

        current_fs.animate({}, {
            step: function() {
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'display': 'block'
                });
            }
        });
    });

});

function buy_now(event) {
    event.preventDefault();
    let urlCart = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: urlCart,
        dataType: 'json',
        success: function (data) {
            if (data.code === 200) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'You have successfully added a product'
                })
                location.replace('/cart');
            }
        },
        error: function () {

        }
    })
}
function addtocart(event) {
    event.preventDefault();
    let urlCart = $(this).data('url');
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: urlCart,
        dataType: 'json',
        success: function (data) {
            if (data.code === 200) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 0,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'You have successfully added a product'
                })
                setInterval(function(){ location.replace('/product/'+id); }, 1000);
            }
        },
        error: function () {

        }
    })
}

$(function () {
    $('.buy_now').on('click', buy_now);
    $('.add_to_cart').on('click', addtocart);
})
