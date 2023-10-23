@extends('layouts.frontend')
@section('css')
    <script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
          href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css')}}">
    <title>Document</title>

@endsection

@section('content')
    <div class="slider-container max-width">
        <div class="banner-home">
            <div class="banner-left">
                <div class="start_carousel">
                    <div class="start_carousel_list">
                        <div class="banner_list">
                            <div class="banner_track">
                                <div id="lastClone" class="banner_item" data-index="1" tabindex="-1" aria-hidden="true"
                                     style="width: 796px;">
                                    <div>
                                        <a href="" aria-label="" tabindex="-1"
                                           style="width: 100%; display: inline-block">
                                            <img class="image"
                                                 src="images/vn-50009109-8218903465777a1366d7c84eb986f5cd_xxhdpi.jpg"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="banner_item " data-index="1" tabindex="-1" aria-hidden="true"
                                     style="width: 796px;">
                                    <div>
                                        <a href="" aria-label="" tabindex="-1"
                                           style="width: 100%; display: inline-block">
                                            <img class="image"
                                                 src="images/vn-50009109-9999f5c3214feaf0fb894728cfbbf5c3_xxhdpi.jpg"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="banner_item " data-index="1" tabindex="-1" aria-hidden="true"
                                     style="width: 796px;">
                                    <div>
                                        <a href="" aria-label="" tabindex="-1"
                                           style="width: 100%; display: inline-block">
                                            <img class="image"
                                                 src="images/vn-50009109-8218903465777a1366d7c84eb986f5cd_xxhdpi.jpg"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="banner_item " data-index="1" tabindex="-1" aria-hidden="true"
                                     style="width: 796px;">
                                    <div>
                                        <a href="" aria-label="" tabindex="-1"
                                           style="width: 100%; display: inline-block">
                                            <img class="image"
                                                 src="images/vn-50009109-9999f5c3214feaf0fb894728cfbbf5c3_xxhdpi.jpg"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="banner_item " data-index="1" tabindex="-1" aria-hidden="true"
                                     style="width: 796px;">
                                    <div>
                                        <a href="" aria-label="" tabindex="-1"
                                           style="width: 100%; display: inline-block">
                                            <img class="image"
                                                 src="images/vn-50009109-8218903465777a1366d7c84eb986f5cd_xxhdpi.jpg"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="banner_item" data-index="1" tabindex="-1" aria-hidden="true"
                                     style="width: 796px;">
                                    <div>
                                        <a href="" aria-label="" tabindex="-1"
                                           style="width: 100%; display: inline-block">
                                            <img class="image"
                                                 src="images/vn-50009109-9999f5c3214feaf0fb894728cfbbf5c3_xxhdpi.jpg"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>

                                <div id="firstClone" class="banner_item" data-index="1" tabindex="-1" aria-hidden="true"
                                     style="width: 796px;">
                                    <div>
                                        <a href="" aria-label="" tabindex="-1"
                                           style="width: 100%; display: inline-block">
                                            <img class="image"
                                                 src="images/vn-50009109-8218903465777a1366d7c84eb986f5cd_xxhdpi.jpg"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="control_btn btn_banner_next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                        <a class="control_btn btn_banner_prev">
                            <i class="fas fa-angle-left"></i>
                        </a>
                        <div class="start_carousel_dots">
                            <ul class="slick-dots">
                                <li class="slick-active">
                                    <button>1</button>
                                </li>
                                <li class="">
                                    <button>2</button>
                                </li>
                                <li class="">
                                    <button>3</button>
                                </li>
                                <li class="">
                                    <button>4</button>
                                </li>
                                <li class="">
                                    <button>5</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner_right">
                <div class="banner_top_item">
                    <a href="">
                        <div>
                            <img src="images/vn-50009109-2db95558fc2fa3ae017504cbe58d7eea_xhdpi.jpg" alt="">
                        </div>
                    </a>
                </div>
                <div class="banner_bottom_item">
                    <a href="">
                        <div>
                            <img src="images/vn-50009109-e1dbca0cc7eae35d01436638df1248ed_xhdpi.jpg" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="product_container max-width">
        <div class="product_container_main">
            <div class="list_header">
                <div class="hinh_giam_gia">
                    <a href="">
                        <div class="title_container">
                            <p class="title_text">Sản phẩm nổi bật</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="stage_product">
                <div class="track_product">
                    <div class="list_product">
                        @foreach($sanpham as $sp)
                            <div class="product_list_item " style="width: 232.2px; margin-right:10px;">
                                <div class="product_item">
                                    <div class="item1">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="{{route('chi-tiet-san-pham',['MaSanPham'=>$sp->MaSanPham])}}">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="{{route('chi-tiet-san-pham',['MaSanPham'=>$sp->MaSanPham])}}">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{number_format($sp->GiaGoc)}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{number_format($sp->GiaBan)}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item2">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="{{route('chi-tiet-san-pham',['MaSanPham'=>$sp->MaSanPham])}}">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="{{route('chi-tiet-san-pham',['MaSanPham'=>$sp->MaSanPham])}}">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{number_format($sp->GiaGoc)}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{number_format($sp->GiaBan)}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
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
                <a class="control_btn btn_next">
                    <i class="fas fa-angle-right"></i>
                </a>
                <a class="control_btn btn_prev">
                    <i class="fas fa-angle-left"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="product_container max-width">
        <div class="product_container_main">
            <div class="list_header">
                <div class="hinh_giam_gia">
                         <div class="title_container">
                            <div class="title_text">Top sản phẩm bán chạy</div>
                        </div>
                 </div>
            </div>
            <div class="stage_product">
                <div class="track_product_2">
                    <div class="track_menu" style="height: 55px;">
                        <div class="menu_wrap">
                            @foreach($danhmuc as $dm)
                                <div class="menu_wrap_item">
                                    <span>{{$dm->TenDanhMuc}}</span>
                                </div>
                            @endforeach



                        </div>
                    </div>
                    <div class="list_product_2">
                        @foreach(@$sanpham as $sp)
                            <div class="product_list_item " style="width: 232.2px; margin-right:10px;">
                                <div class="product_item">
                                    <div class="item1">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item2">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
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
                        @foreach($sanpham as $sp)
                            <div class="product_list_item " style="width: 232.2px; margin-right:10px;">
                                <div class="product_item">
                                    <div class="item1">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item2">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
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
                        @foreach($sanpham as $sp)
                            <div class="product_list_item " style="width: 232.2px; margin-right:10px;">
                                <div class="product_item">
                                    <div class="item1">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item2">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
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
                        @foreach($sanpham as $sp)
                            <div class="product_list_item" style="width: 232.2px; margin-right:10px;">
                                <div class="product_item">
                                    <div class="item1">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_footer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item2">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
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
        </div>
    </div>
    <div class="product_container max-width">
        <div class="product_container_main">
            <div class="list_header">
                <div class="hinh_giam_gia">
                    <a href="">
                        <div class="title_container">
                            <p class="title_text">Sản phẩm đã xem</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="stage_product">
                <div class="track_product_3">
                    <div class="list_product_3">
                        @foreach(@$sanpham as $sp)
                            <div class="product_list_item " style="width: 232.2px; margin-right:10px;">
                                <div class="product_item">
                                    <div class="item1">
                                        <div class="product_slide">
                                            <div class="product">
                                                <div class="product_header">
                                                    <div class="top_right">
                                                        <div class="tra_gop">
                                                            <span>Trả góp {{$sp->TraGop}} %</span>
                                                        </div>
                                                    </div>
                                                    <div class="product_image">
                                                        <a href="{{route('chi-tiet-san-pham',['MaSanPham'=>$sp->MaSanPham])}}">
                                                            <img src="{{$sp->AnhSanPham}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tags_image"></div>
                                                    <div class="frame"></div>
                                                </div>
                                                <div class="product_body">
                                                    <div class="product_feature_badge"></div>
                                                    <div class="product_title">
                                                        <a href="{{route('chi-tiet-san-pham',['MaSanPham'=>$sp->MaSanPham])}}">{{$sp->TenSanPham}}</a>
                                                    </div>
                                                    <div class="product_price">
                                                        <p class="final_price">{{$sp->GiaGoc}}đ</p>
                                                        <div class="saved">
                                                            <span class="amount">{{$sp->GiaBan}}đ</span>
                                                            <div class="discount_percent">
                                                                <span>-{{$sp->GiamGia}}%</span>
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
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js')}}"></script>
    <script src="{{ asset('js/cardslide.js') }}"></script>
    <script src="{{ asset('js/cardslideproduct.js') }}"></script>
    <script src="{{ asset('js/newjs.js') }}" defer></script>
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
