function danhmucchon(element) {
     var elements = document.querySelectorAll('.danh-muc-item');
    elements.forEach(function(el) {
        el.classList.remove('active');
    });

     element.classList.add('active');
}
document.addEventListener('DOMContentLoaded', function() {
    var danhmuc = document.querySelectorAll('.danh-muc-item');
    danhmuc.forEach(function(element) {
        element.addEventListener('click', function() {
            danhmucchon(this); // Gọi toggleActive và chuyển phần tử được click làm đối số
        });
    });
});
