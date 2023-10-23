@extends('layouts.frontend')
@section('css')
     <link rel="stylesheet" href="{{asset('css/trangcanhan/trangcanhan.css')}}">
     <link rel="stylesheet" href="{{asset('css/trangcanhan/css.css')}}">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/css/select2.min.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/js/select2.min.js"></script>

@endsection
@section('content')

   <div class="container profile-2018">
        <div class="row">
            <div class="ty-mainbox-body">
                <div class="nk-profile-sidebar">
                    <div class="nk-profile">
                        <div class="nk-accountInfo">
                            <div class="nk-accountInfo-img">

                                <form name="login_form" action="https://www.nguyenkim.com/" method="post" class="validate_form cm-processed-form" enctype="multipart/form-data">

                                    <input type="hidden" name="dispatch" value="profiles.upload_avatar">
                                    <input type="submit" name="sub_login" id="upload" style="display:none" value="Đăng nhập">
                                    <div class="nk-form-group file-uploader" style="  border-radius: 50%; ">
                                        <input class="nk-input-form" type="file" id="avatar" name="avatar" required="">
                                    </div>

                                    <input type="hidden" name="security_hash" class="cm-no-hide-input" value="b1471de2582bd9e55615c2b58197eaf1">
                                </form>
                            </div>
                            <a href="https://www.nguyenkim.com/cap-nhat-thong-tin-tai-khoan.html"><p class="nk-accountInfo-name">Chào, <span>{{$khachhang->Ho}} {{$khachhang->Ten}}</span></p></a>
                        </div>
                        <div class="nk-profileMenu">
                            <ul>
                                <li class="item1 "><a href=" ">Quản lý đơn hàng <span id="badge_order"></span></a></li>
                                <li class="item2 active"><a href="">Quản lý thông tin</a>
                                    <ul>
                                        <li><a href="https://www.nguyenkim.com/cap-nhat-thong-tin-tai-khoan.html">Thông tin tài khoản</a></li>
                                        <li><a href="" class="dia-chi-show">Địa chỉ của bạn</a></li>
                                        <!--<li ><a href="https://www.nguyenkim.com/cap-nhat-thong-tin-tai-khoan.html?flag=card">Thẻ thành viên</a></li>-->
                                        <li><a href="https://www.nguyenkim.com/cap-nhat-thong-tin-tai-khoan.html?flag=resetpass">Đổi mật khẩu</a></li>
                                        <li><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Đăng xuất
                                            </a></li>
                                    </ul>
                                </li>
{{--                                <li class="item3"><span>Hoạt động của bạn</span>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="san-pham-da-xem.html">Sản phẩm đã xem</a></li>--}}
{{--                                        <li><a href="san-pham-yeu-thich-vi.html" class="like-prd ">Sản phẩm yêu thích</a></li>--}}
{{--                                        <li><a href="nhan-xet.html">Nhận xét của tôi</a></li>--}}
{{--                                        <li><a href="binh-luan.html">Bình luận của tôi</a></li>--}}
{{--                                        <li><a href="bao-hanh-profile.html">Bảo hành sửa chữa</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                <li class="item4"><a href="#">Quản lý mã giảm giá</a></li>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="nk-profile-notifications " id="notifications-success" style="display: none">
                    <div class="notifications-content notifications-success"><span class="nki-information"></span> Thông tin tài khoản của bạn đã được cập nhật thành công.
                    </div>
                </div>
                <div class="nk-profile-notifications" id="notifications-error" style="display: none">
                    <div class="notifications-content notifications-error"><span class="nki-information"></span> Thông tin tài khoản của bạn cập nhật không thành công.
                    </div>
                </div>
                <div class="nk-profile-contain" id="thong-tin">
                    <div class="nk-profile-contain-in bg">
                        <div class="nk-profile-sub-top">
                            <h3>Xin chào anh {{$khachhang->Ho}} {{$khachhang->Ten}} </h3>
                            <p>Bắt đầu trải nghiệm nào!</p>
                        </div>
                    </div>
                    <div class="nk-profile-contain-in" style="height: auto">
                        <div class="nk-profile-sub main-view" style="display:block">
                            <div class="nk-profile-check-orders">
                                <div class="nk-profile-order-info">
                                    <div class="nk-profile-order-info-item">
                                        <div class="head">
                                            <h3>Thông tin cá nhân</h3>
                                            <a class="edit-profile" id="edit-profile" href="">CẬP NHẬT</a>
                                        </div>
                                        <h3 class="nk-name-desc"><i class="nki-menu-user"></i>{{$khachhang->Ho}} {{$khachhang->Ten}}</h3>
                                        <dl class="nk-address-group">
                                            <dd class="nk-address-desc "><i class="nki-phone-iphone"></i> {{$khachhang->SoDienThoai}}</dd>
                                            <dd class="nk-address-desc"><i class="nki-envelope"></i> {{$khachhang->Email}}</dd>
                                            <input type="hidden" class="hovaten" value="{{$khachhang->Ho}} {{$khachhang->Ten}}">
                                            <input type="hidden" class="sodienthoai" value="{{$khachhang->SoDienThoai}}">
                                            <input type="hidden" class="email" value="{{$khachhang->Email}}">
                                            <input type="hidden" class="diachi" value="{{$khachhang->DiaChi}}">
                                            <input type="hidden" class="thanhphotinh" value="{{$khachhang->ThanhPhoTinh}}">
                                            <input type="hidden" class="quanhuyen" value="{{$khachhang->QuanHuyen}}">
                                            <input type="hidden" class="phuongxa" value="{{$khachhang->PhuongXa}}">

                                        </dl>
                                    </div>
                                    @foreach($giaohang as $gh)
                                        <div class="nk-profile-order-info-item">
                                            <a class="edit-address" href="javascript:void(0)"  data-id="{{$gh->MaGiaoHang}}">CẬP NHẬT</a>
                                            <h3>Địa chỉ nhận hàng</h3>
                                            <h3 class="nk-name-desc"><i class="nki-menu-user"></i>{{$gh->Ho}} {{$gh->Ten}}</h3>
                                            <dl class="nk-address-group">
                                                <dd class="nk-address-desc "><i class="nki-phone-iphone"></i>{{$gh->SoDienThoai}}</dd>
                                                <dd class="nk-address-desc"><i class="nki-menu-home"></i>  {{$gh->DiaChi}}, {{$gh->PhuongXa}}, {{$gh->QuanHuyen}}, {{$gh->ThanhPhoTinh}}</dd>
                                            </dl>
                                            <input type="hidden" class=" name-" value="Nguyễn Thanh Tùngf">
                                            <input type="hidden" class="phone-" value="0967647377">
                                            <input type="hidden" class="address-" value="342">
                                            <input type="hidden" class="s_state_" value="001">
                                            <input type="hidden" class="s_district_" value="002">
                                            <input type="hidden" class="s_ward_" value="003">
                                            <input type="hidden" class="profile_id_" value="981217">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="nk-tabProfile-content nk-tabProfile-orders-content magirntop45">
                                <h2>Đơn đặt hàng gần đây</h2>
                                <div class="nk-tabProfileG-content">
                                    <div class="nk-orders-list">
                                        @if($donhangchitietList)
                                            @foreach($donhangchitietList as $item)
                                                @php
                                                    $tongtien =0;
                                                @endphp
                                                <div class="product_info__">
                                                   <div class="product_info_list">
                                                    @foreach($item as $index => $dh)
                                                        @php
                                                            $tongtien += $dh->GiaBan * $dh->SoLuong;
                                                        @endphp
                                                        <div class="product_info_">
                                                            @if($index === 0)
                                                                <div class="product_info">
                                                                    <span>Mã đơn hàng:</span>
                                                                    <span>{{$dh->MaDatDon}}</span>
                                                                </div>
                                                            @endif
                                                            <div class="product_info">
                                                                    <span>Tên sản phẩm: </span>
                                                                    <span>{{$dh->TenSanPham}} </span>
                                                                </div>

                                                                <div class="product_info">
                                                                    <span class="gia_ban">Giá gốc: </span>
                                                                    <span class="gia_ban">{{ number_format($dh->GiaGoc) }}đ</span>
                                                                </div>
                                                                <div class="product_info">
                                                                    <span class="gia_ban">Giá bán:</span>
                                                                    <span class="gia_ban">{{ number_format($dh->GiaBan) }}đ</span>
                                                                </div>
                                                            <div class="product_info">
                                                                <span>Số lượng:</span>
                                                                <span>{{$dh->SoLuong}}</span>
                                                            </div>
                                                            <div class="product_info">
                                                                <span>Thời gian đặt đơn:</span>
                                                                <span> {{ \Carbon\Carbon::parse($dh->created_at)->format('d/m/Y H:i:s') }}</span>
                                                            </div>
                                                        </div>
                                                    @if($dh->khuyenmai)
                                                        @php
                                                        $khuyenmai= $dh->khuyenmai;
                                                        @endphp
                                                    @endif
                                                    @endforeach
                                                        @if($khuyenmai->TinhNangMa==1)
                                                            @php
                                                                $tongtiengiam = ($tongtien* $khuyenmai->GiaTri)/100;
                                                                $tongtien = $tongtien - $tongtiengiam;
                                                            @endphp
                                                        @elseif($khuyenmai->TinhNangMa==2)
                                                            @php
                                                                $tongtiengiam = $khuyenmai->GiaTri;
                                                                $tongtien = $tongtien - $tongtiengiam;
                                                            @endphp
                                                        @endif
                                                    <div class="product_info">
                                                        <span>Tổng tiền giảm</span>
                                                        <span> {{number_format($tongtiengiam)}}đ</span>
                                                    </div>
                                                    <div class="product_info">
                                                        <span>Tổng tiền</span>
                                                        <span> {{number_format($tongtien)}}đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                        <div class="nk-empty-order">
                                            <img src="https://cdn.nguyenkimmall.com/images/companies/_1/html/T09/profile/Cart.png">
                                            <p>Bạn chưa có đơn hàng nào</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-profile-sub" id="update-diachi">
                        <div  class="nk-tabProfile-content nk-tabProfile-info-content new-address">
                            <h2>Địa chỉ của tôi</h2>
                            <p class="nk_wcislc_sb_error error_address"></p>
                            <div class="nk-tabProfileG-content nk-tabProfile2-content">
                                <div class="nk-tabProfile2AddAddress-content">
                                    <form class="cm-processed-form" method="post">
                                        <div class="nk-tabProfileContent-control ">
                                            <label class="nk-tabProfileContent-label">Họ và tên</label>
                                            <input class="nk-tabProfileContent-input hovaten" name="hovaten" type="text" value=" ">
                                            <p class="nk_wcislc_sb_error "></p>
                                        </div>
                                        <div class="nk-tabProfileContent-control">
                                            <label class="nk-tabProfileContent-label ">Số điện thoại</label>
                                            <input class="nk-tabProfileContent-input sodienthoai " name="sodienthoai" value=" " type="number">
                                            <p class="nk_wcislc_sb_error "></p>
                                        </div>

                                        <div class="nk-tabProfileContent-control">
                                            <label class="nk-tabProfileContent-label">Tỉnh, thành phố</label>
                                            <div class="select-style">
                                                <select class="  CustomerProvince" id="thanh-pho" name="thanh-pho">
                                                    @foreach ($thanhpho as $country)
                                                        <option value="{{ $country->name }}" data-id="{{ $country->matp }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="nk_wcislc_sb_error "></p>
                                            </div>

                                        </div>
                                        <div class="nk-tabProfileContent-control">
                                            <label class="nk-tabProfileContent-label">Quận, huyện</label>
                                            <div class="select-style">
                                                <select class="  CustomerProvince" id="quan-huyen" name="quan-huyen">
                                                </select>
                                                <p class="nk_wcislc_sb_error "></p>
                                            </div>

                                        </div>
                                        <div class="nk-tabProfileContent-control">
                                            <label class="nk-tabProfileContent-label">Phường, xã</label>
                                            <div class="select-style">
                                                <select class="  CustomerProvince" id="phuong-xa" name="phuong-xa">
                                                </select>
                                                <p class="nk_wcislc_sb_error "></p>
                                            </div>
                                        </div>
                                        <div class="nk-tabProfileContent-control">
                                            <label class="nk-tabProfileContent-label nk-tabProfileContent-label-address">Địa chỉ nhận hàng<span>(Tầng, số nhà, đường)</span></label>
                                            <input class="nk-tabProfileContent-input add-ress" name="diachi"  type="text">
                                            <p class="nk_wcislc_sb_error "></p>
                                        </div>
                                        <div class="nk-profile-btn">
                                            <a href="javascript:void(0)" class="nk-tabProfileContent-submit save-address" >Lưu thông tin</a>
                                            <a href="cap-nhat-thong-tin-tai-khoan.html?flag=address"><input data-ca-live-edit="langvar::revert" class="ty-profile-field__reset ty-btn ty-btn__tertiary cm-live-edit live-edit-item nk-tabProfileContent-del" type="button" name="reset" value="HỦY" id="shipping_address_reset"></a>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="nk-profile-contain" id="cap-nhap-thong-tin" style="display: none;">
                    <div class="nk-profile-contain-in">
                        <div class="nk-profile-sub update-profile-sub" >
                            <div style="display: flex;" class="nk-tabProfile-content nk-tabProfile-info-content" id="profile-infor">
                                <div class="info-user">
                                    <h2>Thông tin cá nhân</h2>
                                    <div class="nk-tabProfileG-content nk-tabProfile1-content">
                                        <form name="update-profile" action="" method="post" class="cm-ajax cm-processed-form">
                                            @csrf
                                            <p class="nk_wcislc_sb_error baoloi"></p>
                                            <div class="nk-gender">
                                                <label class="nk-tabProfileContent-label">Giới tính</label>
                                                <div class="nk-tabProfileContent-field">
                                                   @if($khachhang->GioiTinh==1)
                                                        <label class="nk-tabProfileContent-label gender" for="male">
                                                            <input id="male" class="nk-tabProfileContent-radio" type="radio" value="1" checked="" name="gender"><span class="theme-radio"></span><span>Anh</span></label>
                                                        <label class="nk-tabProfileContent-label gender" for="female">
                                                            <input id="female" class="nk-tabProfileContent-radio" type="radio" value="2" name="gender"><span class="theme-radio"></span><span>Chị</span></label>
                                                    @else
                                                        <label class="nk-tabProfileContent-label gender" for="male">
                                                            <input id="male" class="nk-tabProfileContent-radio" type="radio" value="1"  name="gender"><span class="theme-radio"></span><span>Anh</span></label>
                                                        <label class="nk-tabProfileContent-label gender" for="female">
                                                            <input id="female" class="nk-tabProfileContent-radio" type="radio" value="2" checked="" name="gender"><span class="theme-radio"></span><span>Chị</span></label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="nk-tabProfileContent-control">
                                                <label class="nk-tabProfileContent-label">Họ và tên</label>
                                                <input class="nk-tabProfileContent-input name-info" id="full_name" name="hovaten" value="{{$khachhang->Ho}} {{$khachhang->Ten}}" type="text">
                                            </div>
                                            <div class="contain-info" style="display: flex">
                                                <div class="nk-tabProfileContent-control phone-user">
                                                    <label class="nk-tabProfileContent-label">Số điện thoại</label>
                                                    <input class="nk-tabProfileContent-input phone-info" onkeypress="if(this.value.length==11) return false;" id="phone" name="sodienthoai" value="{{$khachhang->SoDienThoai}}" type="number" disabled="">
                                                </div>
                                                <div class="nk-tabProfileContent-control email-user">
                                                    <label class="nk-tabProfileContent-label">Email</label>
                                                    <input class="nk-tabProfileContent-input email-info" id="email" name="email" value="{{$khachhang->Email}}" type="email" disabled="">
                                                </div>
                                            </div>
                                            <div class="nk-tabProfileContent-control nk-data-birthday">
                                                <label class="nk-tabProfileContent-label">Ngày sinh</label>
                                                <div class="nk-tabProfileContent-field">
                                                    <input class="nk-tabProfileContent-input email-info" id="ngaysinh" name="ngaysinh" value="{{$khachhang->NgaySinh}}" type="date" >
                                                </div>
                                            </div>

                                            <div class="nk-profile-btn">
                                                <a href="javascript:void(0)" data-id="{{$khachhang->MaKhachHang}}"   class="nk-text-login nk-tabProfileContent-submit update-info">Cập nhật thông tin</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="add-user">
                                    <h2>Thông tin địa chỉ</h2>
                                    <div class="nk-tabProfileG-content nk-tabProfile2-content">
                                        <div class="nk-tabProfile2AddAddress-content">
                                            <form class="cm-processed-form">
                                                <div class="nk-tabProfileContent-control">
                                                    <label class="nk-tabProfileContent-label">Thành phố/Tỉnh</label>
                                                    <div class="select-style">
                                                        <select class="placeholder CustomerProvince" id="thanh-pho" name="thanh-pho">
                                                            <option selected disabled>{{$khachhang->ThanhPhoTinh}}</option>
                                                            @foreach ($thanhpho as $country)
                                                                <option value="{{ $country->name }}" data-id="{{ $country->matp }}">{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <p class="nk_wcislc_sb_error province"></p>
                                                </div>
                                                <div class="nk-tabProfileContent-control">
                                                    <label class="nk-tabProfileContent-label">Quận/Huyện</label>
                                                    <div class="select-style">
                                                         <select class="placeholder CustomerProvince" id="quan-huyen" name="quan-huyen">
                                                             <option selected disabled>{{$khachhang->QuanHuyen}}</option>
                                                         </select>
                                                    </div>
                                                    <p class="nk_wcislc_sb_error district"></p>
                                                </div>
                                                <div class="nk-tabProfileContent-control">
                                                    <label class="nk-tabProfileContent-label">Phường/Xã</label>
                                                    <div class="select-style">
                                                         <select class="placeholder CustomerProvince" id="phuong-xa" name="phuong-xa">
                                                             <option selected disabled>{{$khachhang->PhuongXa}}</option>
                                                         </select>
                                                    </div>
                                                    <input type="hidden" id="profile_id_u" value="">
                                                    <p class="nk_wcislc_sb_error ward"></p>
                                                </div>
                                                <div class="nk-tabProfileContent-control">
                                                    <label class="nk-tabProfileContent-label nk-tabProfileContent-label-address">Địa chỉ</label>
                                                    <input class="nk-tabProfileContent-input address" id="diachi" type="text" value="{{$khachhang->DiaChi}}">
                                                    <p class="nk_wcislc_sb_error address"></p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div style="display: none" class="nk-tabProfile-content nk-tabProfile-info-content" id="list-address">--}}
{{--                                <div class="nk-address-item-add">--}}
{{--                                    <h2>Danh sách địa chỉ</h2>--}}

{{--                                </div>--}}
{{--                                <div class="nk-tabProfileG-content nk-tabProfile2-content">--}}
{{--                                    <div class="nk-tabProfile2Available-content">--}}
{{--                                        <div class="nk-address-item">--}}
{{--                                            <div class="nk-tabProfileContent-field-new">--}}
{{--                                                <h3 class="nk-name-desc">Nguyễn Thanh Tùngf</h3>--}}
{{--                                                <dl class="nk-address-group">--}}
{{--                                                    <dd class="nk-address-desc">--}}
{{--                                                        <span>Số điện thoại:</span>--}}
{{--                                                        0967647377--}}
{{--                                                    </dd>--}}
{{--                                                    <dd class="nk-address-desc">--}}
{{--                                                        <span>Địa chỉ giao hàng:</span>--}}
{{--                                                        342, Phường Bình An, Quận 2, TP.HCM--}}
{{--                                                    </dd>--}}
{{--                                                </dl>--}}
{{--                                                <input type="hidden" class=" name-0" value="Nguyễn Thanh Tùngf">--}}
{{--                                                <input type="hidden" class="phone-0" value="0967647377">--}}
{{--                                                <input type="hidden" class="address-0" value="342">--}}
{{--                                                <input type="hidden" class="s_state_0" value="001">--}}
{{--                                                <input type="hidden" class="s_district_0" value="002">--}}
{{--                                                <input type="hidden" class="s_ward_0" value="003">--}}
{{--                                                <input type="hidden" class="profile_id_0" value="981217">--}}
{{--                                                <label class="nk-tabProfileContent-label check-default"><input class="nk-tabProfileContent-checkbx default default-0" type="checkbox" checked="checked"><span class="theme-checkbox"></span><span>Địa chỉ mặc định</span></label>--}}
{{--                                                <div class="nk-address-func">--}}
{{--                                                    <a href="javascript:void(0);" onclick="popupdelAddress(981217)" class="nk-address-del">Xóa</a>--}}
{{--                                                    <a href="javascript:void(0);" onclick="edit_address($(this))" class="nk-address-edit" data-vl="0" data-edit="981217">Chỉnh sửa</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <input type="hidden" class="default_0" value="1">                                                                        <div class="nk-tabProfile2Empty-content" style="width: 303px; height: 190px; margin: 37px 35px 0 0;">--}}

{{--                                            <a href="javascript:void(0);" class="nk-addAddress-link">+ Thêm địa chỉ mới</a>--}}
{{--                                        </div>--}}
{{--                                        <input type="hidden" class="count_address" value="1">--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div style="display: none" class="nk-tabProfile-content nk-tabProfile-info-content new-address">--}}
{{--                                <h2>Địa chỉ của tôi</h2>--}}
{{--                                <p class="nk_wcislc_sb_error error_address"></p>--}}
{{--                                <div class="nk-tabProfileG-content nk-tabProfile2-content">--}}
{{--                                    <div class="nk-tabProfile2AddAddress-content">--}}
{{--                                        <form class="cm-processed-form">--}}
{{--                                            <div class="nk-tabProfileContent-control ">--}}
{{--                                                <label class="nk-tabProfileContent-label">Họ và tên</label>--}}
{{--                                                <input class="nk-tabProfileContent-input fullname" type="text">--}}
{{--                                                <p class="nk_wcislc_sb_error "></p>--}}
{{--                                            </div>--}}
{{--                                            <div class="nk-tabProfileContent-control">--}}
{{--                                                <label class="nk-tabProfileContent-label ">Số điện thoại</label>--}}
{{--                                                <input class="nk-tabProfileContent-input add-phone " type="number">--}}
{{--                                                <p class="nk_wcislc_sb_error "></p>--}}
{{--                                            </div>--}}
{{--                                            <div class="nk-tabProfileContent-control">--}}
{{--                                                <label class="nk-tabProfileContent-label nk-tabProfileContent-label-address">Địa chỉ nhận hàng<span>(Tầng, số nhà, đường)</span></label>--}}
{{--                                                <input class="nk-tabProfileContent-input add-ress" type="text">--}}
{{--                                                <p class="nk_wcislc_sb_error "></p>--}}
{{--                                            </div>--}}
{{--                                            <div class="nk-tabProfileContent-control">--}}
{{--                                                <label class="nk-tabProfileContent-label">Tỉnh, thành phố</label>--}}
{{--                                                <div class="select-style">--}}
{{--                                                    <select class="placeholder" id="CustomerProvince">--}}
{{--                                                        <option value="" disabled="" selected="" hidden="">Chọn tỉnh, thành phố của bạn</option>--}}
{{--                                                    </select>--}}
{{--                                                    <p class="nk_wcislc_sb_error "></p>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="nk-tabProfileContent-control">--}}
{{--                                                <label class="nk-tabProfileContent-label">Quận, huyện</label>--}}
{{--                                                <div class="select-style">--}}
{{--                                                    <select class="placeholder" id="CustomerDistrict">--}}
{{--                                                        <option value="" disabled="" selected="" hidden="">Chọn quận huyện của bạn</option>--}}
{{--                                                    </select>--}}
{{--                                                    <p class="nk_wcislc_sb_error "></p>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="nk-tabProfileContent-control">--}}
{{--                                                <label class="nk-tabProfileContent-label">Phường, xã</label>--}}
{{--                                                <div class="select-style">--}}
{{--                                                    <select class="placeholder" id="CustomerWard">--}}
{{--                                                        <option value="" disabled="" selected="" hidden="">Chọn phường, xã của bạn</option>--}}
{{--                                                    </select>--}}
{{--                                                    <p class="nk_wcislc_sb_error "></p>--}}
{{--                                                </div>--}}
{{--                                                <input type="hidden" id="profile_id" value="">--}}

{{--                                            </div>--}}
{{--                                            <div class="nk-tabProfileContent-field nk-tabProfileContent-noPaddingR nk-tabProfileContent-field-choose">--}}
{{--                                                <label class="nk-tabProfileContent-label"><input class="nk-tabProfileContent-checkbx default-checkout" type="checkbox"><span class="theme-checkbox"></span><span>Chọn làm địa chỉ mặc định</span></label>--}}
{{--                                            </div>--}}
{{--                                            <div class="nk-profile-btn">--}}
{{--                                                <a href="javascript:void(0)" onclick="save_address()" class="nk-tabProfileContent-submit save-address">Lưu thông tin</a>--}}
{{--                                                <a href="cap-nhat-thong-tin-tai-khoan.html?flag=address"><input data-ca-live-edit="langvar::revert" class="ty-profile-field__reset ty-btn ty-btn__tertiary cm-live-edit live-edit-item nk-tabProfileContent-del" type="button" name="reset" value="HỦY" id="shipping_address_reset"></a>--}}
{{--                                            </div>--}}
{{--                                            <input type="hidden" name="security_hash" class="cm-no-hide-input" value="b1471de2582bd9e55615c2b58197eaf1"></form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <div class="nk-tabProfile-content nk-tabProfile-info-content" id="edit-password" style="display: none;">--}}
{{--                                <h2>Thay đổi mật khẩu</h2>--}}
{{--                                <div class="nk-tabProfileG-content nk-tabProfile4-content">--}}
{{--                                    <form name="password_form" action="https://www.nguyenkim.com/" method="post" class="cm-ajax cm-processed-form">--}}

{{--                                        <input type="hidden" name="redirect_url" value="https://www.nguyenkim.com/cap-nhat-thong-tin-tai-khoan.html">--}}
{{--                                        <input type="hidden" name="dispatch" value="profiles.update">--}}
{{--                                        <input type="submit" name="reset" id="reset" style="display:none" value="Thay đổi mật khẩu">--}}
{{--                                        <div class="form-control">--}}
{{--                                            <label class="nk-tabProfileContent-label">Mật khẩu hiện tại</label>--}}
{{--                                            <input class="nk-tabProfileContent-input old-pass" value="" type="password">--}}
{{--                                            <p class="nk_wcislc_sb_error oldpass"></p>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-control">--}}
{{--                                            <label class="nk-tabProfileContent-label">Mật khẩu mới</label>--}}
{{--                                            <input class="nk-tabProfileContent-input new-pass" value="" type="password">--}}
{{--                                            <p class="nk_wcislc_sb_error newpass"></p>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-control">--}}
{{--                                            <label class="nk-tabProfileContent-label">Xác nhận lại mật khẩu</label>--}}
{{--                                            <input class="nk-tabProfileContent-input re-pass" value="" type="password">--}}
{{--                                            <p class="nk_wcislc_sb_error repass"></p>--}}
{{--                                        </div>--}}
{{--                                        <div class="nk-profile-btn">--}}
{{--                                            <a href="javascript:void(0)" onclick="change_password()" class="nk-tabProfileContent-submit">ĐỔI MẬT KHẨU</a>--}}
{{--                                        </div>--}}
{{--                                        <input type="hidden" name="security_hash" class="cm-no-hide-input" value="b1471de2582bd9e55615c2b58197eaf1"></form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="dia_chi" style="display: none">
                        @if(isset($giaohang) && $giaohang)
                            @foreach($giaohang as $gh)
                                <div class="them_dia_chi them_dia_chi_ed">
                                    <a class="edit-address" href="javascript:void(0)"  data-id="{{$gh->MaGiaoHang}}">CẬP NHẬT</a>
                                    <h3>Địa chỉ nhận hàng</h3>
                                    <h3 class="nk-name-desc"><i class="nki-menu-user"></i>{{$gh->Ho}} {{$gh->Ten}}</h3>
                                    <dl class="nk-address-group">
                                        <dd class="nk-address-desc "><i class="nki-phone-iphone"></i>{{$gh->SoDienThoai}}</dd>
                                        <dd class="nk-address-desc"><i class="nki-menu-home"></i>  {{$gh->DiaChi}}, {{$gh->PhuongXa}}, {{$gh->QuanHuyen}}, {{$gh->ThanhPhoTinh}}</dd>
                                    </dl>
                                 </div>
                                <a href="javascript:void(0)" class="button button-white address-delete-cta ml-2"
                                   data-id="{{$gh->MaGiaoHang}}">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>

                                <a href="javascript:void(0)" class="button button-white edit-address-cta edit-address modal-cta" id="edit-address"
                                   data-id="{{$gh->MaGiaoHang}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>


                            @endforeach
                            <div class="them_dia_chi">
                                <div class="them_dia_chi_">
                                    <p>Thêm địa chỉ nhận hàng</p>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                            </div>
                        @else
                            <div class="them_dia_chi">
                                <div class="them_dia_chi_">
                                    <p>Thêm địa chỉ nhận hàng</p>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#thanh-pho').on('change', function () {
                var selectedOption = $(this).find('option:selected');
                var countryId = selectedOption.data('id');
                $('#quan-huyen').html('');
                $.ajax({
                    url: '{{ route('get-quan-huyen') }}?MaThanhPho=' + countryId,
                    type: 'get',
                    success: function (res) {
                        $('#quan-huyen').html('<option value="">Chọn Quận/ Huyện</option>');
                        $.each(res, function (key, value) {
                            $('#quan-huyen').append('<option value="' + value.name + '" data-id="' + value.maqh + '">' + value.name + '</option>');
                        });
                        $('#phuong-xa').html('<option value="">Chọn Phường / Xã</option>');
                    }
                });
            });
            $('#quan-huyen').on('change', function () {
                var selectedOption = $(this).find('option:selected');
                var stateId = selectedOption.data('id');
                $('#phuong-xa').html('');
                $.ajax({
                    url: '{{ route('get-phuong-xa') }}?MaQuanHuyen=' + stateId,
                    type: 'get',
                    success: function (res) {
                        $('#phuong-xa').html('<option value=""</option>');
                        $.each(res, function (key, value) {
                            $('#phuong-xa').append('<option data-id="' + value.xaid + '" value="' + value.name + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            $('.edit-profile').on('click',function(event) {
                event.preventDefault();

                $('#thong-tin').hide();
                $('#cap-nhap-thong-tin').show();

            });

            $('.update-info').on('click',function (){
                var MaKhachHang = $(this).data('id');
                var gioitinh = $('input[name="gender"]:checked').val();
                var hovaten = $('#full_name').val();
                var sodienthoai = $('#phone').val();
                var email = $('#email').val();
                var ngaysinh = $('#ngaysinh').val();
                var thanhpho = $('#thanh-pho').val();
                var quanhuyen = $('#quan-huyen').val();
                var phuongxa = $('#phuong-xa').val();
                var diachi = $('#diachi').val();
                $.ajax({
                    url:'{{ route('cap-nhap-thong-tin-khach-hang', ['id' => 'MaKhachHang']) }}'.replace('MaKhachHang', MaKhachHang),
                    method:'post',
                    data:{
                        _token: '{{csrf_token()}}',
                        gioitinh, hovaten, sodienthoai, email, ngaysinh,MaKhachHang,thanhpho,quanhuyen,phuongxa,diachi
                    },success: function (data){
                        if(data.code==200){
                            $('#notifications-success').show();
                            $('#notifications-error').hide();
                            $('#success-message').text('Thông tin tài khoản của bạn đã được cập nhật thành công.');
                        }else {
                            $('#notifications-success').hide();
                            $('#notifications-error').show();
                            $('#error-message').text('Thông tin tài khoản của bạn cập nhật không thành công.');
                        }
                    },
                    error: function(error) {
                        console.error('Error updating cart:', error);
                    }
                });

            });
            $('.edit-address').on('click',function(event) {
                var MaGiaoHang = $(this).data('id');

                event.preventDefault();
                $('.main-view').hide();
                $('#update-diachi').show();
                $('.save-address').attr('data-id', MaGiaoHang);

                $.ajax({

                    url:'{{ route('sua-dia-chi', ['id' => 'MaGiaoHang']) }}'.replace('MaGiaoHang', MaGiaoHang),
                    method:'get',
                    data:{
                        _token: '{{csrf_token()}}',
                    },success: function(response) {
                        $('input[name="hovaten"]').val(response.data.Ho+ ' ' + response.data.Ten);
                        $('input[name="sodienthoai"]').val(response.data.SoDienThoai);
                        $('#email').val(response.data.Email);
                        $('#thanh-pho').append('<option selected>' + response.data.ThanhPhoTinh + '</option>');
                        $('#quan-huyen').append('<option selected  >' + response.data.QuanHuyen + '</option>');
                        $('#phuong-xa').append('<option selected  >' + response.data.PhuongXa + '</option>');
                        $('input[name="diachi"]').val(response.data.DiaChi);
                    },
                    error: function(error) {
                        console.error('Lỗi:', error);
                    }
                });

            });
            $('#edit-address').on('click',function(event) {
                var MaGiaoHang = $(this).data('id');

                // event.preventDefault();
                $('#thong-tin').show();
                $('.main-view').hide();
                $('.dia_chi').hide();
                $('#update-diachi').show();
                $('.save-address').attr('data-id', MaGiaoHang);

                $.ajax({

                    url:'{{ route('sua-dia-chi', ['id' => 'MaGiaoHang']) }}'.replace('MaGiaoHang', MaGiaoHang),
                    method:'get',
                    data:{
                        _token: '{{csrf_token()}}',
                    },success: function(response) {
                        $('input[name="hovaten"]').val(response.data.Ho+ ' ' + response.data.Ten);
                        $('input[name="sodienthoai"]').val(response.data.SoDienThoai);
                        $('#email').val(response.data.Email);
                        $('#thanh-pho').append('<option selected>' + response.data.ThanhPhoTinh + '</option>');
                        $('#quan-huyen').append('<option selected  >' + response.data.QuanHuyen + '</option>');
                        $('#phuong-xa').append('<option selected  >' + response.data.PhuongXa + '</option>');
                        $('input[name="diachi"]').val(response.data.DiaChi);
                    },
                    error: function(error) {
                        console.error('Lỗi:', error);
                    }
                });

            });
            $('.save-address').on('click',function (){
                var MaGiaoHang = $(this).data('id');
                var HoVaTen = $('input[name="hovaten"]').val();
                var SoDienThoai = $('input[name="sodienthoai"]').val();
                var ThanhPhoTinh = $('#thanh-pho').val();
                var QuanHuyen = $('#quan-huyen').val();
                var PhuongXa = $('#phuong-xa').val();
                var DiaChi = $('input[name="diachi"]').val();

                $.ajax({
                    url:'{{ route('cap-nhap-dia-chi', ['id' => 'MaGiaoHang']) }}'.replace('MaGiaoHang', MaGiaoHang),
                    method:'post',
                    data:{
                        _token: '{{csrf_token()}}',
                        HoVaTen, SoDienThoai, ThanhPhoTinh, QuanHuyen, DiaChi,PhuongXa
                    },success: function (data){
                        if(data.code==200){
                            $('#notifications-success').show();
                            $('#notifications-error').hide();
                            $('#success-message').text('Cập nhật thành công địa chỉ thành công.');
                        }else {
                            $('#notifications-success').hide();
                            $('#notifications-error').show();
                            $('#error-message').text('Cập nhật không thành công.');
                        }
                    },
                    error: function(error) {
                        console.error('Lỗi:', error);
                    }
                });

            });
           $('.dia-chi-show').on('click',function(event) {
                event.preventDefault();
                $('#thong-tin').hide();
                $('.dia_chi').show();
           });
        });
    </script>
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
