@extends('layouts.admin')

@section('title')
    <title>Sản phẩm</title>
@endsection
@section('css')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Đơn hàng', 'key'=> 'Xem'])
        <div class="content mt-3 mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col bg-white">
                        <h4 class="text-center  p-3 align-content-center">Khách hàng</h4>
                    </div>
                    @if($khachhang)
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Số điện thoại </th>
                                    <th scope="col">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$khachhang->Ho}} {{$khachhang->Ten}}</td>
                                        <td>{{$khachhang->SoDienThoai}}</td>
                                        <td>{{$khachhang->Email}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="content mt-3 mb-5 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col bg-white">
                        <h4 class="text-center p-3 align-content-center">Thông tin vận chuyển</h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr >
                                <th scope="col">Tên người nhận</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hình thức thanh toán</th>
                                <th scope="col">Ghi chú</th>

                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$giaohang->Ho}} {{$giaohang->Ten}}</td>
                                    <td><span class="diachi">{{$giaohang->DiaChi}}</span>,<span class="phuongxa">{{$giaohang->PhuongXa}}</span>,
                                        <span class="quanhuyen">{{$giaohang->QuanHuyen}}</span>,<span class="thanhphotinh">{{$giaohang->ThanhPhoTinh}}</span></td>
                                    <td>{{$giaohang->SoDienThoai}}</td>
                                    <td>{{$giaohang->Email}}</td>
                                    <td>
                                        @if($giaohang->ThanhToan==1)
                                            Thanh toán khi nhận hàng
                                        @elseif($giaohang->ThanhToan==2)
                                            Thanh toán bằng thẻ ATM/Internet banking
                                        @elseif($giaohang->ThanhToan==3)
                                            Thanh toán bằng thẻ tín dụng
                                        @endif
                                    </td>
                                    <td>{{$giaohang->GhiChu}}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        {{ $giaohang->links() }}--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
        <div class="content mt-3 mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col bg-white">
                        <h4 class="text-center  p-3 align-content-center">Liệt kê chi tiết đơn hàng</h4>
                    </div>

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr >
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn Giá</th>
                                @if($khuyenmai)
                                    <th scope="col">Khuyến mãi</th>
                                @endif
                                <th scope="col">Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $i=0;
                                $tongtien =0;
                                $masanpham = [];
                                $soluong = [];
                            @endphp
                            @foreach($donhangchitiet as $ctdh)
                                @php
                                    $tongtien += $ctdh->GiaBan * $ctdh->SoLuong;
                                @endphp
                                @php
                                    $i++;
                                    $madatdon = $ctdh->MaDatDon;
                                    array_push($masanpham , $ctdh->MaSanPham);
                                    array_push($soluong , $ctdh->SoLuong);

                                @endphp
                                <input type="hidden" class="MaSanPham" id="MaSanPham" value="{{$ctdh->MaSanPham}}">

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$ctdh->TenSanPham}}</td>
                                    <td>{{$ctdh->SoLuong}}</td>
                                    <td>{{number_format($ctdh->GiaBan),0,',','.'}}đ</td>
                                    @if($khuyenmai)
                                        <td>{{$khuyenmai->Ma}}</td>
                                    @endif
                                    <td>{{number_format($ctdh->GiaBan *$ctdh->SoLuong),0,',','.'}}đ</td>
                                    @endforeach
                                </tr>
                                @if($khuyenmai)
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
                                @endif


                                <tr>
                                    <td colspan="6">
                                        @if(isset($tongtiengiam))
                                            <h5 class="  mr-lg-5">Tổng tiền giảm: {{number_format($tongtiengiam)}}đ</h5>
                                        @endif
                                        <h5 class=" mr-lg-5">Tổng tiền: {{number_format($tongtien)}}đ</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">Cập nhập trạng thái đơn hàng</label>
                            <select class="form-control" id="trang-thai"  name="TrangThai" id="exampleFormControlSelect1">
                                @foreach($donhang as $dh)
                                    @if($dh->TrangThai ==1)
                                        <option selected value="1">Đơn hàng mới</option>
                                        <option value="2">Đã xử lý</option>
                                    @else
                                        <option disabled value="1">Đơn hàng mới</option>
                                        <option value="2">Đã xử lý</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        @can('quyen-don-hang-cap-nhap')
                            <a href="" data-url="{{route('don-hang.cap-nhap',['MaDatDon'=>$madatdon])}}" class="cap-nhap-don-hang btn btn-success">Cập nhập đơn hàng</a>

                        @endcan

                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{asset('vendors/sweetalert/sweetalert2@11.net_npm_sweetalert2@11')}}"></script>
    <script>
        $(document).ready(function (){
            $('.cap-nhap-don-hang').click(function (event){
                event.preventDefault();
                  var url = $(this).data('url');
                  var trangthai = $('#trang-thai').val();
                  var masanpham  = @json($masanpham);
                  var soluong  = @json($soluong);
                 Swal.fire({
                    title: 'Xác nhận cập nhập đơn hàng',
                    text: "Sau khi cập nhập sẽ không thể thay đổi!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url:url,
                            method:'POST',
                            data:{
                                _token: '{{csrf_token()}}',trangthai:trangthai,masanpham:masanpham,soluong:soluong
                             },
                            success: function (data){
                                console.log(data)
                                  if(data.code==200){
                                    Swal.fire(
                                        'Cập nhập thành công!',
                                         'success',
                                    ).then((result) => {
                                        if (result.isConfirmed || result.isDismissed) {
                                            // Reload the page
                                            location.reload(true);
                                        }
                                    });
                                }
                            },

                        })
                    }
                })
            })
        })
    </script>

@endsection

