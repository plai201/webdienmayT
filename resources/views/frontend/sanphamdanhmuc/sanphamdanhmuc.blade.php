@extends('layouts.frontend')
@section('css')
    <link rel="stylesheet" href="{{asset('css/sanphamdanhmuc/sanphamdanhmuc.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
@section('content')
<div class="product_container max-width">
        <div class="product_container_main">
            <div class="list_header">
{{--                <div class="hinh_giam_gia">--}}
{{--                    <a href="">--}}
{{--                        <img src="images/Title-web_1200x65.jpg" alt="">--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
            <div class="stage_product">
                <div class="track_product_2">
                    <div class="track_menu" style="height: 55px;">
                        <h2 class="sort-total"><b>{{$sanpham_count}}</b> {{$danhmucha->TenDanhMuc}} <strong class="manu-sort"></strong></h2>
                     </div>
                    <div class="list_product_2">
                        @foreach($sanpham as $sp)
                            <div class="product_list_item " style="width: 232.2px; margin-right:10px;">
                                <div class="product_item">
                                    <div class="item1">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp['TraGop']}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp['AnhSanPham']}}" alt="{{$sp['TenAnh']}}">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp['TenSanPham']}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{number_format($sp['GiaGoc'])}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{number_format($sp['GiaBan'])}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp['GiamGia']}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="pagination-container">
                {{ $sanpham->links() }}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#keywords').keyup(function () {
                var key = $(this).val();
                var _token = $('input[name="_token"]').val();  // Get the value of _token

                if (key != '') {
                    $.ajax({
                        url: "{{ route('tim-san-pham') }}",
                        method: "POST",
                        data: { key: key, _token: _token },  // Pass _token as its value, not the jQuery object
                        success: function (data) {
                             $('.search_content').fadeIn();
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);  // Log the error to the console
                        }
                    });
                } else {
                    $('.search_content').fadeOut();
                    $('#search_ajax').fadeOut();

                }
            });
            $(document).on('click', '.auto-complete', function () {
                $('#search_ajax').fadeOut();
            });
        });

    </script>


@endsection
