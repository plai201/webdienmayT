function phuongthucmuahang(element) {
    // Xóa lớp active từ tất cả các elements
    var elements = document.querySelectorAll('.phuong_thuc_');
    elements.forEach(function(el) {
        el.classList.remove('active');
    });

    // Thêm lớp active cho element được click
    element.classList.add('active');
}
function chondiachi(element) {
    // Xóa lớp active từ tất cả các elements
    var elements = document.querySelectorAll('.them_dia_chi');
    elements.forEach(function(el) {
        el.classList.remove('active');
    });

    // Thêm lớp active cho element được click
    element.classList.add('active');
}
function selectPaymentOption(selectedOption) {
    // Lấy tất cả các checkbox trong các phần tử .thanh_toan
    var labels = document.querySelectorAll('.round-checkbox');
    labels.forEach(function(label) {
        checkboxes = label.getElementsByTagName('input');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }

    });
    var checkbox = selectedOption.querySelector('input[type="checkbox"]');
    checkbox.checked = true;
    var elements = document.querySelectorAll('.thanh_toan');
    elements.forEach(function(el) {
        el.classList.remove('active');
    });

    // Thêm lớp active cho element được click
    selectedOption.classList.add('active');

}
function themDiaChiKH(){
    event.preventDefault();
    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    var dong = document.querySelector(".btn_back");

    dong.onclick = function(){
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
}


document.addEventListener('DOMContentLoaded', function() {

    // Gán sự kiện click cho các phần tử có lớp .phuong_thuc_
    var phuongThucElements = document.querySelectorAll('.phuong_thuc_');
    var thanhToan =document.querySelectorAll('.thanh_toan');
    var themDiaChi = document.querySelector('.them_dia_chi_');
    var inputElements = document.querySelectorAll('.form-control');
    var diachi = document.querySelectorAll('.them_dia_chi');

    phuongThucElements.forEach(function(element) {
        element.addEventListener('click', function() {
            phuongthucmuahang(this); // Gọi toggleActive và chuyển phần tử được click làm đối số
        });
    });
    diachi.forEach(function(element) {
        element.addEventListener('click', function() {
            chondiachi(this); // Gọi toggleActive và chuyển phần tử được click làm đối số
        });
    });
    thanhToan.forEach(function(element) {
        element.addEventListener('click', function() {
            selectPaymentOption(this);
        });
    });
    if(themDiaChi){
        themDiaChi.addEventListener('click', function (){
            themDiaChiKH();
        });
    }

    if (inputElements) {
        inputElements.forEach(function (element) {
            element.addEventListener('focus', function() {
                var labelElement = element.parentElement.querySelector('.input-wrapper__label');
                labelElement.classList.add('mini');
            });

            element.addEventListener('blur', function() {
                var labelElement = element.parentElement.querySelector('.input-wrapper__label');
                if (element.value === '') {
                    labelElement.classList.remove('mini');
                }
            });
        });
    }


});
$(document).ready(function() {
    $('.custom-select').select2({
        maximumSelectionLength: 4
    });
});
function thongBaoDelete(event) {
    event.preventDefault();
    let urlRequest = $('.product_cart_main').data('url');
    let id = $(this).data('id');
    let that =$(this).closest('.product_cart_main');
    Swal.fire({
        title: 'Bạn có chắc chắn không?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                data:{id:id},
                success: function (data){
                    if(data.code==200){
                        that.remove();
                        Swal.fire(
                            'Đã xoá!',
                            'Sản phẩm đã được xoá khỏi giỏ hàng.',
                            'success',
                    ).then((result) => {
                            if (result.isConfirmed || result.isDismissed) {
                                // Reload the page
                                location.reload(true);
                            }
                        });
                    }
                },
                error:function (){

                }
            })
        }
    })
}


$(function (e){
    $(document).on('click', '.delete-cta',thongBaoDelete)
    // $(document).on('click', '#select_all_ids',deleteAllSelect)
    // $(document).on('keyup','#search', search)

})
