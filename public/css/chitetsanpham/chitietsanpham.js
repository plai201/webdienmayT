var imgItems = document.querySelectorAll('.imgItem');
var imgMain = document.getElementById('mainImage');

imgItems.forEach(function(imgItem) {
    imgItem.addEventListener('click', function() {
        imgMain.src = this.src;
    });
});
function remove_background(masanpham){
    for (var count =1; count <=5; count++){
        $('#'+masanpham+'-'+count).css('color','#ccc');
    }
}
$(document).ready(function (){
    $(document).on('mouseenter','.rating',function (){
        var index = $(this).data("index");
        var  masanpham = $(this).data("id");

        remove_background(masanpham);
        for (var count =1; count <=index; count++){
            $('#'+masanpham+'-'+count).css('color','#ffcc00');
        }
        $(document).on('mouseleave','.rating',function (){
            remove_background(masanpham);
            for (var count =1; count <=index; count++){
                $('#'+masanpham+'-'+count).css('color','#ffcc00');
            }
            $('.danh-gia-sao').val(index);
        })
    })
    $(document).on('click','.rating',function (){
        var index = $(this).data("index");
        var  masanpham = $(this).data("id");
        remove_background(masanpham);
        for (var count =1; count <=index; count++){
            $('#'+masanpham+'-'+count).css('color','#ffcc00');
        }
        $('.danh-gia-sao').val(index);
    })

    $('.c-btn-rate').on('click',function (){
        $('.viet-danh-gia').show();
        $(this).hide();
    })
})
