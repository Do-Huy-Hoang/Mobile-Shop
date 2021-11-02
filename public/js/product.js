function addtocart(event) {
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
                setInterval(function(){ location.reload(); }, 3000);
            }
        },
        error: function () {

        }
    })
}
$(function () {
    $('.add_to_cart').on('click', addtocart);
})


