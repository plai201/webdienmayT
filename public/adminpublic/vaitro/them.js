$('.checkbox_wrapper').on('click',function (){
    $(this).parents('.card').find('.checkbox_wrapper_child').prop('checked',$(this).prop('checked'));
});
