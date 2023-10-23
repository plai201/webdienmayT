function thongBaoDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that =$(this);
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
                success: function (data){
                    if(data.code==200){
                        that.parent().parent().remove();
                        Swal.fire(
                            'Đã xoá!',
                            'File đã được xoá.',
                            'success'
                        )
                    }
                },
                error:function (){

                }
            })
        }
    })
}


$(function (e){
    $(document).on('click', '.delete_sp',thongBaoDelete)
    $(document).on('click', '.delete_tk',thongBaoDelete)
    $(document).on('click', '.delete_vt',thongBaoDelete)
    $(document).on('click', '.delete_km',thongBaoDelete)
    // $(document).on('click', '#select_all_ids',deleteAllSelect)
    // $(document).on('keyup','#search', search)

})

// function search(){
//     $values = $(this).val();
//     $urls = `/search`;
//     $.ajax({
//         type: 'get',
//         url: $urls,
//         data:{'search':value},
//
//         success:function (data){
//             console.log(data);
//         }
//     })
// }
$(document).ready(function() {
    $("#select_all_ids").click(function (){
        $('.check_ids').prop('checked',$(this).prop('checked'));
    });
    $("#deleteAllSelect").click(function (e) {
        e.preventDefault();
        const all_ids = [];

        $('input:checkbox[name=ids]:checked').each(function() {
            all_ids.push($(this).val());
        });

        const itemCount = all_ids.length;  // Get the count of selected items
        let urlRequest = $(this).data('url');
        if (itemCount > 0) {
            Swal.fire({
                title: `Bạn có chắc chắn muốn xoá ${itemCount} sản phẩm?`,  // Dynamic message
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: urlRequest,
                        type: 'GET',
                        data: { ids: all_ids },

                        success: function(response) {
                            if (response.code === 200) {
                                all_ids.forEach(id => {
                                    $(`input:checkbox[name=ids][value=${id}]`).closest('tr').remove();
                                });

                                Swal.fire(
                                    'Đã xoá!',
                                    'Đã xoá ' + itemCount + ' sản phẩm.',
                                    'success'
                                );
                            } else {
                                console.error('Error:', response.message);
                            }
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        }
                    });
                }
            });
        } else {
            Swal.fire('Vui lòng chọn ít nhất một sản phẩm để xoá.');
        }
    });
});







