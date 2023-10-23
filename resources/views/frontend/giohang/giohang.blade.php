<?php $hideFooter = true; ?>
@extends('layouts.frontend')
@section('css')
    <link rel="stylesheet" href="{{asset('css/giohang/giohang.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.0/js/select2.min.js"></script>

@endsection
@section('content')
<form method="post">
    @csrf
    <div class="cart">
        <div class="cart_info">
            <h3>Chọn địa chỉ nhận hàng</h3>
            <div class="phuong_thuc_nhan_hang">
                <div class="phuong_thuc_nhan">
                    <div class="phuong_thuc ">
                        <div value="1" class="phuong_thuc_ active ">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <h4>Nhận hàng tại nhà</h4>
                        </div>
                        <div value="2" class="phuong_thuc_" style="display: none">
                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            <h4>Nhận hàng tại cửa hàng</h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="dia_chi">
                @if(Auth::check())
                    @if(isset($giaohang) && $giaohang)
                        @foreach($giaohang as $gh)
                        <div class="them_dia_chi dia_chi_ed " data-id="{{$gh->MaGiaoHang}}">
                            <p><span class="hovaten">{{$gh->Ho}} {{$gh->Ten}}</span> <span class="sodienthoai" style="margin-left: 3px;">({{$gh->SoDienThoai}})</span></p>
                            <p><span class="diachi">{{$gh->DiaChi}}</span>,<span class="phuongxa">{{$gh->PhuongXa}}</span>,
                                <span class="quanhuyen">{{$gh->QuanHuyen}}</span>,<span class="thanhphotinh">{{$gh->ThanhPhoTinh}}</span></p>
                            <div class="address-cta-box">
                                <div>
                                    <a href="javascript:void(0)" class="button button-white edit-address-cta modal-cta"
                                       data-id="{{$gh->MaGiaoHang}}">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="button button-white address-delete-cta ml-2"
                                       data-id="{{$gh->MaGiaoHang}}">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
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

                @else
                    <div class="modal-body_ ">
                        <div class="dia_chi_flex">
                            <div class="dia_chi_flex_">
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <span class="input-wrapper__label mini">Họ và tên <span class="red">(*)</span></span>
                                        <input type="text" class="form-control label-mini" id="full_name" name="full_name">
                                    </div>
                                    @error('hoten')
                                    <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <span class="input-wrapper__label mini">Số điện thoại <span class="red">(*)</span></span>
                                        <input type="text" class="form-control label-mini" id="phone_number" name="phone_number">
                                    </div>
                                    @error('sodienthoai')
                                    <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <span class="input-wrapper__label mini">Email</span>
                                        <input type="text" class="form-control label-mini" id="email" name="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="dia_chi_flex_">
                                <div class="form-group input-city" data-select2-id="10">
                                    <div class="input-wrapper" data-select2-id="9">
                                        <span class="input-wrapper__label mini">Tỉnh / Thành Phố  <span class="red">(*)</span></span>
                                        <select class="custom-select label-mini select2-hidden-accessible" id="thanh-pho" name="thanh-pho">
                                            <option selected disabled>Chọn Tỉnh / Thành Phố</option>
                                            @foreach ($thanhpho as $country)
                                                <option value="{{ $country->name }}" data-id="{{ $country->matp }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('thanhpho')
                                    <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group input-district">
                                    <div class="input-wrapper">
                                        <span class="input-wrapper__label mini">Quận / Huyện  <span class="red">(*)</span></span>
                                        <select class="custom-select label-mini select2-hidden-accessible" id="quan-huyen" name="quan-huyen"></select>
                                    </div>
                                </div>
                                @error('quanhuyen')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                                <div class="form-group input-ward">
                                    <div class="input-wrapper">
                                        <span class="input-wrapper__label mini">Phường / Xã  <span class="red">(*)</span></span>
                                        <select class="custom-select label-mini select2-hidden-accessible" id="phuong-xa" name="phuong-xa"></select>
                                    </div>
                                </div>
                                @error('phuongxa')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-wrapper">
                                <span class="input-wrapper__label mini">Số nhà / Tên đường  <span class="red">(*)</span></span>
                                <input type="text" class="form-control label-mini" id="diachi" name="diachi">
                            </div>
                            @error('diachi')
                            <div class="alert alert-danger thong-bao">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                @endif

            </div>
            <h3>Chọn hình thức thanh toán</h3>
            <div class="phuong_thuc_thanh_toan">
                <div class="phuong_thuc_thanh">
                    <div value="1" class="thanh_toan active" name="hinhthucthanhtoan">
                        <p>Thanh toán khi nhận hàng</p>
                        <label class="round-checkbox">
                            <input id="check_pt" type="checkbox" checked name="option" value="option1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div value="2" class="thanh_toan " name="hinhthucthanhtoan">
                        <p>Thẻ ATM/Internet banking</p>
                        <label class="round-checkbox">
                            <input id="check_pt" type="checkbox" name="option" value="option1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div value="3" class="thanh_toan" name="hinhthucthanhtoan">
                        <p>Thẻ tín dụng</p>
                        <label class="round-checkbox">
                            <input id="check_pt" type="checkbox" name="option" value="option1">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            @error('thanhtoan')
            <div class="alert alert-danger thong-bao">{{ $message }}</div>
            @enderror
            <div class="ghi_chu">
                <h3>Ghi chú đơn hàng</h3>
                <textarea id="ghichu"></textarea>
            </div>
        @if(auth()->check())
            <div class="checkout_box check_out_logined">
                <button type="button">Thanh toán</button>
            </div>
        @else
            <div class="checkout_box">
                <button type="button">Thanh toán</button>
            </div>
        @endif

        </div>
        <div class="product_cart">
            <h3>Giỏ hàng của bạn</h3>
            @php
                $tongtien =0;
            @endphp
            @if(session('giohang'))
            <div class="product_cart_list">
                    @foreach(session('giohang') as $id => $detail)
                        @php
                            $tongtien += $detail['GiaBan'] * $detail['SoLuong'];
                        @endphp
                        <div class="product_cart_main" id="{{$id}}" data-url="{{route('xoa.cart')}}">
                            <a href="javascript:void(0)" class="product_cart_main_img">
                                <img src="{{$detail['AnhSanPham']}}" alt="">
                            </a>
                            <div class="product_cart_name">
                                <span>{{$detail['TenSanPham']}}</span>
                            </div>
                            <div class="product_cart_main_price">
                                <span class="gia_goc">{{ number_format($detail['GiaGoc']) }}đ</span>
                                <span class="gia_ban">{{number_format($detail['GiaBan'])}}đ</span>
                                <div class="product-counter">
                                    <div class="counter-minus">
                                        <a href="javascript:void(0)" class="counter-minus-cta">
                                            −
                                        </a>
                                    </div>
                                    <div class="counter-content" data-product-id="128121" data-item-key="2530513141" data-item-quantity="1">
                                        {{$detail['SoLuong']}}
                                    </div>
                                    <div class="counter-plus">
                                        <a href="javascript:void(0)" class="counter-plus-cta">
                                            +
                                        </a>
                                    </div>
                                </div>
                                <div class="delete-cta-wrapper">
                                    <a href="javascript:void(0)" data-id="{{$id}}"  class="delete-cta">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
                <div class="cart__total">
                    <div class="cart__total-box">
                        <div class="cart__total-sub">
                            <div class="label">Tạm tính</div>
                            <div class="content">{{number_format($tongtien)}}đ</div>
                        </div>
                        <div class="cart__total-promotion">
                            <div class="label">Khuyến mãi</div>
                            <div class="content">
                                @if(session()->get('khuyenmai'))
                                    @foreach(session()->get('khuyenmai') as $key =>$khuyenmai)
                                        @if($khuyenmai['TinhNangMa']==1)
                                            @php
                                                $tongtiengiam = ($tongtien* $khuyenmai['GiaTri'])/100;
                                                $tongtien = $tongtien - $tongtiengiam;
                                            @endphp
                                            {{number_format($tongtiengiam)}}đ
                                        @elseif($khuyenmai['TinhNangMa']==2)
                                            @php
                                                $tongtiengiam = $khuyenmai['GiaTri'];
                                                $tongtien = $tongtien - $tongtiengiam;
                                            @endphp
                                            {{number_format($tongtiengiam)}}đ
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if(session()->get('khuyenmai'))
                            @foreach(session()->get('khuyenmai') as $key =>$khuyenmai)
                            <input type="hidden" name="khuyenmai" class="makhuyenmai" value="{{$khuyenmai['MaKhuyenMai']}}">
                            @endforeach
                        @else
                            <input type="hidden" name="khuyenmai" class="makhuyenmai" value="0">

                        @endif
                        <div class="cart__total-delivery">
                            <div class="label">Phí vận chuyển</div>
                            <div class="content">0đ</div>
                        </div>
                    </div>
                    <div class="cart__total-content">
                        <div class="label">Tổng tiền</div>

                        <div class="content">{{number_format($tongtien)}}đ</div>
                    </div>
                    <div class="price-include-vat">
                        <sup>*</sup> Giá trên đã bao gồm VAT và phí vận chuyển.</div>
                </div>
                <form id="coupon-form" novalidate="novalidate">
                    @csrf
                    <div class="cart__coupon">
                        <div class="cart__coupon-box">
                            <div class="input-wrapper">
                                <span class="input-wrapper__label no-value">Mã giảm giá</span>
                                <input type="text" name="Ma" class="form-control label-mini" id="voucher-code-input" aria-label="input voucher code" required="">
                            </div>

                            <button type="button" class="buttona button-red coupon-cta">Áp dụng</button>
                        </div>
                        <div class="alert alert-danger alert-err" style="display: none;"></div>
                        <div class="alert alert-success alert-success-message" style="display: none;"></div>

                    </div>
                </form>

            @else
                <div class="icon-cart-empty"><span class=" "></span><p class="empty-cart">Giỏ hàng của bạn đang trống</p></div>
            @endif

        </div>
    </div>
</form>
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <form action="{{route('them-dia-chi')}}" method="post">
            @csrf
            <div class="modal-header">
                <div>
                    <div class="modal_title">Thêm địa chỉ giao hàng</div>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label">Họ và tên</span>
                        <input type="text" class="form-control label-mini" id="full_name" name="hovaten">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label">Số điện thoại</span>
                        <input type="text" class="form-control label-mini" id="phone_number" name="sodienthoai">
                    </div>
                </div>
                <div class="form-group input-city" data-select2-id="10">
                    <div class="input-wrapper" data-select2-id="9">
                        <span class="input-wrapper__label mini">Tỉnh / Thành Phố</span>
                        <select class="custom-select label-mini select2-hidden-accessible" id="thanh-pho" name="thanhphotinh">
                            <option selected disabled>Chọn Tỉnh / Thành Phố</option>
                            @foreach ($thanhpho as $country)
                                <option value="{{ $country->name }}" data-id="{{ $country->matp }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group input-district">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label mini">Quận / Huyện</span>
                        <select class="custom-select label-mini select2-hidden-accessible" id="quan-huyen" name="quanhuyen"></select>

                    </div>
                </div>
                <div class="form-group input-ward">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label mini">Phường / Xã</span>
                        <select class="custom-select label-mini select2-hidden-accessible" id="phuong-xa" name="phuongxa"></select>

                    </div>
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label">Số nhà / Tên đường</span>
                        <input type="text" class="form-control label-mini" id="diachi" name="diachi">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button button-blue-icon add-address-cta" type="submit">
                    Lưu địa chỉ
                </button>
                <a href="javascript:void(0)" class="button button_while_icon btn_back">Quay lại</a>
            </div>
        </form>

    </div>
</div>
<div id="myModalsua" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <form action="" method="post">
            @csrf
            <div class="modal-header">
                <div>
                    <div class="modal_title">Thêm địa chỉ giao hàng</div>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label mini">Họ và tên</span>
                        <input type="text" class="form-control label-mini" id="full_name_edit" name="hovaten">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label mini">Số điện thoại</span>
                        <input type="text" class="form-control label-mini" id="phone_number_edit" name="sodienthoai">
                    </div>
                </div>
                <div class="form-group input-city" data-select2-id="10">
                    <div class="input-wrapper" data-select2-id="9">
                        <span class="input-wrapper__label mini">Tỉnh / Thành Phố</span>
                        <select class="custom-select label-mini select2-hidden-accessible" id="thanh-pho_edit" name="thanhphotinh">
                            @foreach ($thanhpho as $country)
                                <option value="{{ $country->name }}" data-id="{{ $country->matp }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group input-district">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label mini">Quận / Huyện</span>
                        <select class="custom-select label-mini select2-hidden-accessible" id="quan-huyen_edit" name="quanhuyen"></select>

                    </div>
                </div>
                <div class="form-group input-ward">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label mini">Phường / Xã</span>
                        <select class="custom-select label-mini select2-hidden-accessible" id="phuong-xa_edit" name="phuongxa"></select>

                    </div>
                </div>
                <div class="form-group">
                    <div class="input-wrapper">
                        <span class="input-wrapper__label mini">Số nhà / Tên đường</span>
                        <input type="text" class="form-control label-mini" id="diachi_edit" name="diachi">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button button-blue-icon update-address-cta" data-id="" type="button">
                    Lưu địa chỉ
                </button>
                <a href="javascript:void(0)" class="button button_while_icon btn_back">Quay lại</a>
            </div>
        </form>

    </div>
</div>


@endsection
@section('js')
    <script src="{{asset('vendors/sweetalert/sweetalert2@11.net_npm_sweetalert2@11')}}"></script>

    <script src="{{asset('css/giohang/giohang.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
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


            $('#thanh-pho_edit').on('change', function () {
                var selectedOption = $(this).find('option:selected');
                var countryId = selectedOption.data('id');
                $('#quan-huyen_edit').html('');
                $.ajax({
                    url: '{{ route('get-quan-huyen') }}?MaThanhPho=' + countryId,
                    type: 'get',
                    success: function (res) {
                        $('#quan-huyen_edit').html('<option value="">Chọn Quận/ Huyện</option>');
                        $.each(res, function (key, value) {
                            $('#quan-huyen_edit').append('<option value="' + value.name + '" data-id="' + value.maqh + '">' + value.name + '</option>');
                        });
                        $('#phuong-xa_edit').html('<option value="">Chọn Phường / Xã</option>');
                    }
                });
            });
            $('#quan-huyen_edit').on('change', function () {
                var selectedOption = $(this).find('option:selected');
                var stateId = selectedOption.data('id');
                $('#phuong-xa_edit').html('');
                $.ajax({
                    url: '{{ route('get-phuong-xa') }}?MaQuanHuyen=' + stateId,
                    type: 'get',
                    success: function (res) {
                        $('#phuong-xa_edit').html('<option value=""</option>');
                        $.each(res, function (key, value) {
                            $('#phuong-xa_edit').append('<option data-id="' + value.xaid + '" value="' + value
                                .name + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            $('.edit-address-cta').on('click',function (){

                var MaGiaoHang = $(this).data('id');
                $('.update-address-cta').attr('data-id', MaGiaoHang);

                event.preventDefault();
                var modal = document.getElementById("myModalsua");
                modal.style.display = "block";

                var dong = document.querySelector(".btn_back");

                dong.onclick = function(){
                    modal.style.display = "none";
                }

                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                };
                $.ajax({

                    url:'{{ route('sua-dia-chi', ['id' => 'MaGiaoHang']) }}'.replace('MaGiaoHang', MaGiaoHang),
                    method:'get',
                    data:{
                        _token: '{{csrf_token()}}',
                    },success: function(response) {
                        $('#full_name_edit').val(response.data.Ho+ ' ' + response.data.Ten);
                        $('#phone_number_edit').val(response.data.SoDienThoai);
                        $('#email_edit').val(response.data.Email);
                        $('#thanh-pho_edit').append('<option selected>' + response.data.ThanhPhoTinh + '</option>');
                        $('#quan-huyen_edit').append('<option selected  >' + response.data.QuanHuyen + '</option>');
                        $('#phuong-xa_edit').append('<option selected  >' + response.data.PhuongXa + '</option>');
                        $('#diachi_edit').val(response.data.DiaChi);
                    },
                    error: function(error) {
                        console.error('Error updating cart:', error);
                    }
                });
            });
            $('.update-address-cta').on('click',function (){
                var MaGiaoHang = $(this).data('id');
                var HoVaTen = $('#full_name_edit').val();
                var SoDienThoai = $('#phone_number_edit').val();
                var ThanhPhoTinh =$('#thanh-pho_edit').val();
                var QuanHuyen =$('#quan-huyen_edit').val();
                var PhuongXa =$('#phuong-xa_edit').val();
                var DiaChi =$('#diachi_edit').val();
                $.ajax({
                    url:'{{ route('cap-nhap-dia-chi', ['id' => 'MaGiaoHang']) }}'.replace('MaGiaoHang', MaGiaoHang),
                    method:'post',
                    data:{
                        _token: '{{csrf_token()}}',
                        MaGiaoHang,HoVaTen,SoDienThoai,ThanhPhoTinh,QuanHuyen,PhuongXa,DiaChi
                    },success: function (data){
                            if(data.code==200){
                                Swal.fire(
                                    'Cập nhập hoàn tất !',
                                    'Địa chỉ đã được cập nhập.',
                                    'success',
                                ).then((result) => {
                                    if (result.isConfirmed || result.isDismissed) {
                                        // Reload the page
                                        location.reload(true);
                                    }
                                });
                            }
                    },
                    error: function(error) {
                        console.error('Error updating cart:', error);
                    }
                });

            });
            $('.address-delete-cta').on('click',function (){
                var MaGiaoHang = $(this).data('id');
                Swal.fire({
                    title: 'Xác nhận xoá địa chỉ',
                    // text: "B!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '{{ route('xoa-dia-chi', ['id' => 'MaGiaoHang']) }}'.replace('MaGiaoHang', MaGiaoHang),
                            method: 'get',
                            data: {
                                _token: '{{csrf_token()}}',
                            }, success: function (data) {
                                if (data.code == 200) {
                                    Swal.fire(
                                        'Đã xoá địa chỉ !',
                                        'Địa chỉ đã được xoá.',
                                        'success',
                                    ).then((result) => {
                                        if (result.isConfirmed || result.isDismissed) {
                                            // Reload the page
                                            location.reload(true);
                                        }
                                    });
                                }
                            },
                            error: function (error) {
                                console.error('Error updating cart:', error);
                            }
                        });
                    }});
            });
            $('.coupon-cta').on('click',function (){
                var maInput = document.querySelector('input[name="Ma"]');
                var code = maInput.value;
                var thongbaoloi = $('.alert-err');
                var thongbaothanhcong = $('.alert-success-message');

                $.ajax({
                        url: '{{route('khuyen-mai.ap-dung')}}',
                        method: 'post',
                        data: {
                            _token: '{{csrf_token()}}',code

                        }, success: function (data) {
                            window.location.reload();

                            if(data.code == 200){
                                thongbaoloi.hide();  // Hide the error message
                                thongbaothanhcong.text(data.message).show();
                            }else{
                                thongbaothanhcong.hide();  // Hide the success message

                                thongbaoloi.text(data.message).show();
                            }

                    },
                        error: function(xhr, textStatus, errorThrown) {
                            if (xhr.status === 401) {
                                // Unauthorized error (401)
                                thongbaoloi.text('Đăng nhập để có thể sử dụng mã.').show();
                            } else {
                                console.log('Error:', xhr.status, textStatus);
                                alert('An error occurred. Please try again later.');
                            }
                        }

                    });

            });

            function updateCart(el, quantity) {

                $.ajax({
                    url: '{{ route('update.cart') }}',
                    type: 'get',
                    data: {
                        _token:'{{ csrf_token()}}',
                        product_id: el.closest('.product_cart_main').id,
                        quantity: quantity
                    },
                    success: function(response) {
                        console.log(response.message);
                        // Cập nhật thành công, bạn có thể xử lý dữ liệu cập nhật ở đây
                    },
                    error: function(error) {
                        console.error('Error updating cart:', error);
                    }
                });
            }
            var minusButtons = document.querySelectorAll('.counter-minus-cta');
            var plusButtons = document.querySelectorAll('.counter-plus-cta');

            minusButtons.forEach(function (minusButton) {
                minusButton.addEventListener('click', function() {
                    var content = this.closest('.product-counter').querySelector('.counter-content');
                    var currentQuantity = parseInt(content.innerText);
                    if (currentQuantity > 1) {
                        var updatedQuantity = currentQuantity - 1;
                        content.innerText = updatedQuantity;
                        updateCart(this, updatedQuantity);
                        location.reload(true);
                    }
                    // Không làm gì nếu số lượng đã là 1
                });
            });

            plusButtons.forEach(function (plusButton) {
                plusButton.addEventListener('click', function() {
                    var content = this.closest('.product-counter').querySelector('.counter-content');
                    var currentQuantity = parseInt(content.innerText);
                    var updatedQuantity = currentQuantity + 1;
                    content.innerText = updatedQuantity;
                    updateCart(this, updatedQuantity);
                    location.reload(true);
                });
            });
            $('.checkout_box button').click(function (){
                var selectedDiv = $('.phuong_thuc_.active');
                var noinhanhang = selectedDiv.attr('value');
                var thanhtoandiv = $('.thanh_toan.active');
                var thanhtoan = thanhtoandiv.attr('value');
                var hoten = $('#full_name').val();
                var sodienthoai = $('#phone_number').val();
                var email = $('#email').val();
                var thanhpho = $('#thanh-pho').val();
                var quanhuyen = $('#quan-huyen').val();
                var phuongxa = $('#phuong-xa').val();
                var diachi = $('#diachi').val();
                var ghichu = $('#ghichu').val();
                var makhuyenmai = $('.makhuyenmai').val();
                Swal.fire({
                    title: 'Xác nhận đặt hàng',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({

                            url:'{{route('check-out')}}',
                            method:'POST',
                            data:{
                                _token: '{{csrf_token()}}',
                                noinhanhang,thanhtoan,hoten,sodienthoai,email,thanhpho,quanhuyen,phuongxa,diachi,ghichu,makhuyenmai
                            },
                            success: function (data){
                                if(data.code==200){
                                    Swal.fire(
                                        'Đã đặt hàng!',
                                        'Sản phẩm sẽ được gửi đến bạn.',
                                        'success',
                                    ).then((result) => {
                                        if (result.isConfirmed || result.isDismissed) {
                                            // Reload the page
                                            location.reload(true);
                                        }
                                    });
                                }
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                // Handle error response
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Đặt hàng không thành công!',
                                    text: 'Xem lại đơn hàng.'
                                });
                            }
                        })
                    }
                })
            })
            $('.check_out_logined button').click(function (){
                var magiaohang = $('.them_dia_chi.active').data('id');
                var selectedDiv = $('.phuong_thuc_.active');
                var noinhanhang = selectedDiv.attr('value');
                var thanhtoandiv = $('.thanh_toan.active');
                var thanhtoan = thanhtoandiv.attr('value');
                var ghichu = $('#ghichu').val();
                var makhuyenmai = $('.makhuyenmai').val();
                Swal.fire({
                    title: 'Xác nhận đặt hàng',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({

                            url:'{{route('check-out-logined')}}',
                            method:'POST',
                            data:{
                                _token: '{{csrf_token()}}',
                                noinhanhang,thanhtoan,ghichu,magiaohang,makhuyenmai
                            },
                            success: function (data){
                                console.log(data.message )
                                if(data.code==200){
                                    Swal.fire(
                                        'Đã đặt hàng!',
                                        'Sản phẩm sẽ được gửi đến bạn.',
                                        'success',
                                    ).then((result) => {
                                        if (result.isConfirmed || result.isDismissed) {
                                            // Reload the page
                                            location.reload(true);
                                        }
                                    });
                                }
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                // Handle error response
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Đặt hàng không thành công!',
                                    text: 'Xem lại đơn hàng.'
                                });
                            }
                        })
                    }
                })
            })

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
