
@extends('layouts.frontend')
@section('css')
    <link rel="stylesheet" href="{{asset('css/chitetsanpham/chitietsanpham.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset("vendors/slick/css/slick.min.css")}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('vendors/slick/css/theme.min.css')}}">

@endsection

@section('content')

<div class="product_detail">
    <div class="product_detail__ max-width">
        <div class="product_detail_">
            <div class="product_left">
                <div class="product_detail_img">
                    <div class="product_detail_img_main">
                        <img id="mainImage" src="{{$sanpham->AnhSanPham}}" alt="{{$sanpham->TenAnh}}">
                    </div>
                    <div class="product_detail_img_item_list">
                        <div class="product_detail_img_item">
                            @foreach($sanpham->anh as $sanphamanh)
                                <div class="product_img_item">
                                    <img class="imgItem"  src="{{$sanphamanh->AnhChiTiet}}" alt="{{$sanphamanh->TenAnh}}">
                                </div>
                            @endforeach
                        </div>
                        <a class="control_btn btn_detail_next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                        <a class="control_btn btn_detail_prev">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="product_right">
                <div class="product_slug">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('trang-chu')}}">Trang chủ</a>
                        </li>
                        @if($danhmucsanphamcha)
                        <li class="breadcrumb-item">
                                <a href="{{route('danh-muc-view',['MaDanhMuc'=>$danhmucsanphamcha->MaDanhMuc])}}">{{$danhmucsanphamcha->TenDanhMuc}}</a>
                        </li>
                        @endif
                        <li class="breadcrumb-item active">
                            <a href="">{{$sanpham->danhmucsanpham->TenDanhMuc}}</a>
                        </li>
                    </ol>
                </div>
                <div class="product_info_">
                    <h1 class="product_name">
                        {{$sanpham->TenSanPham}}
                    </h1>
                    <div class="product_price">
                        <div class="product_info_price_value-final">
                        <span class="price_final" data-product_id="123235" data-price="{{$sanpham->GiaGoc}}">
                            {{$sanpham->GiaGoc}}
                        </span>
                            <div class="product_price_promo">
                                <div class="product_info_price">
                                    <span>9.990.000đ</span>
                                </div>
                                <span class="product_discount_percent">-43%</span>
                            </div>
                            <div class="top-stickers"><span class="tt_sticker tt-installment">Trả góp 0%</span></div>
                        </div>
                    </div>
                    <div class="product_rating">
                        @php

                                $maxStars = 5;
                                $ratingPercentage = ($trungbinh / $maxStars) * 100;

                                 for($i = 1; $i <= $maxStars; $i++) {
                                    if ($i <= $ratingPercentage / 20) {
                                         echo '<span><i class="fas fa-star"></i></span>';
                                    } elseif ($i <= ceil($ratingPercentage / 20)) {
                                         echo '<span><i class="fas fa-star-half-alt"></i></span>';
                                    } else {
                                        // Hiển thị ngôi sao rỗng
                                        echo '<span><i class="far fa-star"></i></span>';
                                    }
                                }
                        @endphp

                        <span>({{$danhgia_count}} đánh giá)</span>
                    </div>


                </div>
                @if($sanpham->SanPhamSoLuong <=0)
                    <div class="btn_check_out">
                        <a  class="button-blue-icons buttons"> Sản phẩm hết hàng</a>
                    </div>

                @else
                    <div class="btn_check_out">
                        <a href="{{route('san-pham-gio-hang',$sanpham->MaSanPham)}}" class="button-blue-icons buttons"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                        <a href="{{route('san-pham-gio-hang-live',$sanpham->MaSanPham)}}" class="button-blue-icons buttons"><i class="fas fa-wallet"></i>Mua ngay</a>
                    </div>
                @endif

                @if(session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif

            </div>
        </div>
        <div class="product_detail_info_m">
                <div class="product_detail_discrip product_left">
                    <div>
                        <div>
                            {!! $sanpham->MoTaSanPham !!}
                        </div>
                    </div>
                </div>
                <div class="product_detail_thong_so product_right">
                    <h2>Thông số kỹ thuật</h2>
                    @foreach($sanpham->sanphamthongso as $spts)
                        <div class="thong_so">
                            <p>{{$spts->TenThongSo}}</p>
                            <p>{{$spts->pivot->GiaTri}}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        <div class="danh-gia">
            <div class="danh_gia_main">
                <div style="border: 1px solid #ededed;">
                    <div class="Review_header">
                        <div class="danh_gia_main-left"> Đánh giá và nhận xét về {{$sanpham->TenSanPham}} </div>
                     </div>
                    <div class="review_body_">
                        <div class="box-flex">
                            <div class="c-btn-rate btn-write">Viết đánh giá</div>
                        </div>
                        <div class="viet-danh-gia" style="display: none;">
                            <div class="review_body">
                                Chọn đánh giá của bạn
                                <ul class="list-inline">
                                    @for($count =1; $count<=5; $count++)

                                        <li
                                            id="{{$sanpham->MaSanPham}}-{{$count}}"
                                            data-index="{{$count}}"
                                            data-id="{{$sanpham->MaSanPham}}"
                                             class="rating" style="cursor: pointer; color: #ccc;   font-size: 30px">&#9733</li>
                                    @endfor
                                </ul>
                                <input type="hidden" class="danh-gia-sao">
                            </div>
                            <div>
                                <label for="dsc_message_89631" id="lbl-89631" class="cm-required" style="display: none">Nhận xét</label>
                                <textarea placeholder="Nhập nhận xét về sản phẩm (Tối thiểu 100 kí tự)" class="noidung" type="file" aria-labelledby="lbl-89631" id="dsc_message_89631" name=" " rows="5" minlength="5" cols="72"></textarea>

                            </div>
                            <div class="post_composer">
                                <div class="composer_name">
                                    <input type="text" id="hoten" placeholder="Họ và tên (bắt buộc)" name="hoten" size="50" value="">
                                </div>
                                <div class="composer_name">
                                    <input type="text" id="sodienthoai" placeholder="Số điện thoại" name="post_data[phone]" value="" size="11" autocomplete="off">                        </div>
                                <div class="composer_send"><button class="btn_send btn-send-review" type="button" data-id="{{$sanpham->MaSanPham}}">GỬI ĐÁNH GIÁ</button></div>
                                <input type="hidden" name="masanpham" value="{{$sanpham->MaSanPham}}">
                            </div>
                            <div id="success-message" class="hidden" style="display: none">

                            </div>
                        </div>
                        <ul class="list-danh-gia">
                         </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="binh-luan"></div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('vendors/slick/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('vendors/slick/js/slick.min.js')}}"></script>
    <script src="{{ asset('js/cardslideproduct.js') }}"></script>
    <script src="{{ asset('css/chitetsanpham/chitietsanpham.js') }}" defer></script>

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
            loadDanhGia();
             function loadDanhGia() {
                var masanpham = $('input[name="masanpham"]').val();

                $.ajax({
                    url: "{{ route('load-danh-gia') }}",
                    method: "GET",
                    data: {_token: '{{csrf_token()}}',masanpham:masanpham },
                    success: function (data) {
                        var ulList = $(".list-danh-gia");

                        // Clear the existing content inside the ul
                        ulList.empty();

                        // Loop through the reviews and add them to the ul
                        data.forEach(function (review) {
                            var listItem = $("<li>").addClass("par");
                            listItem.append("<div class='cmt-top'><p class='cmt-top-name'>" + review.TenDanhGia + "</p></div>");
                            listItem.append("<div class='cmt-intro'><div class='cmt-top-star'>" + generateStarRating(review.DanhGia) + "</div></div>");
                            listItem.append("<div class='cmt-content'><p class='cmt-txt'>" + review.NoiDung + "</p></div>");

                            ulList.append(listItem);
                        });

                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);  // Log the error to the console
                    }
                });
            };
            function generateStarRating(rating) {
                var stars = "<ul class='list-inline'>";
                for (var count = 1; count <= 5; count++) {
                    var starColor = count <= rating ? "#ffcc00" : "#ccc";
                    var starIcon = "&#9733;";
                    stars += "<li id='star-" + count + "' style='color:" + starColor + "; font-size: 30px;'>" + starIcon + "</li>";
                }
                stars += "</ul>";
                return stars;
            }




            $('.btn-send-review').click(function () {
                var masanpham = $(this).data('id');
                var danhgia = $('.danh-gia-sao').val();
                var noidung = $('.noidung').val();
                var sodienthoai = $('#sodienthoai').val();
                var hoten = $('#hoten').val();

                $.ajax({
                    url: "{{ route('them-danh-gia') }}",
                    method: "POST",
                    data: { masanpham: masanpham,noidung:noidung,sodienthoai:sodienthoai,hoten:hoten,  _token: '{{csrf_token()}}',danhgia:danhgia },
                    success: function (data) {
                        if(data.code ==200){
                            $('#success-message').text('Thêm thành công!').show();
                            setTimeout(function() {
                                location.reload(); // Reload trang sau một khoảng thời gian
                            }, 2000);
                        }

                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);  // Log the error to the console
                    }
                });

            });

        });

    </script>
@endsection
