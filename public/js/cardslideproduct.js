
$(document).ready(function(){
    $('.list_product').slick({
        slidesToShow: 5, // Số lượng sản phẩm hiển thị
        slidesToScroll: 1, // Số lượng sản phẩm chuyển đổi khi lướt
        autoplay: true, // Tự động chuyển đổi slide
        autoplaySpeed: 2000, // Tốc độ chuyển đổi (đơn vị: ms)
        prevArrow: $('.btn_prev'), // Selector của nút chuyển đổi slide trước
        nextArrow: $('.btn_next'), // Selector của nút chuyển đổi slide kế tiếp
        draggable: true,  // Cho phép kéo chuột
        swipe: true,  // Cho phép kéo trên thiết bị cảm ứng
        pauseOnHover: true,  // Tạm dừng khi rê chuột vào
        swipeToSlide: true,  // Lướt slide theo chuột
    });
    $('.list_product_3').slick({
        slidesToShow: 5, // Số lượng sản phẩm hiển thị
        slidesToScroll: 1, // Số lượng sản phẩm chuyển đổi khi lướt
        autoplay: true, // Tự động chuyển đổi slide
        autoplaySpeed: 2000, // Tốc độ chuyển đổi (đơn vị: ms)
        draggable: true,  // Cho phép kéo chuột
        swipe: true,  // Cho phép kéo trên thiết bị cảm ứng
        pauseOnHover: true,  // Tạm dừng khi rê chuột vào
        swipeToSlide: true,  // Lướt slide theo chuột
    });
    $('.product_detail_img_item').slick({
        slidesToShow: 3, // Số lượng sản phẩm hiển thị
        slidesToScroll: 1, // Số lượng sản phẩm chuyển đổi khi lướt
        autoplaySpeed: 2000, // Tốc độ chuyển đổi (đơn vị: ms)
        prevArrow: $('.btn_detail_prev'), // Selector của nút chuyển đổi slide trước
        nextArrow: $('.btn_detail_next'), // Selector của nút chuyển đổi slide kế tiếp
        draggable: true,  // Cho phép kéo chuột
        swipe: true,  // Cho phép kéo trên thiết bị cảm ứng
        pauseOnHover: true,  // Tạm dừng khi rê chuột vào
        swipeToSlide: true,  // Lướt slide theo chuột
    });
});
