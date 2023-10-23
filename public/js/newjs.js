function toggleActive(element) {
    $('.menu_wrap_item').removeClass('active'); // Xóa lớp active từ tất cả các elements
    $(element).addClass('active'); // Thêm lớp active cho element được click
}

$(function() {
    $(document).on('click', '.menu_wrap_item', function() {
        toggleActive(this); // Gọi toggleActive và chuyển phần tử được click làm đối số
    });
});

