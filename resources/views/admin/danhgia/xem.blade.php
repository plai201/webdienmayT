@extends('layouts.admin')

@section('title')
    <title>Đánh giá</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('adminpublic/sanpham/trangchu/trangchu.css')}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Đánh giá danh sách', 'key'=> 'Chi tiết'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <form class="form-inline "  autocomplete="off">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group w-50  ">
                                <input class="form-control w-100 position-relative" name="key" id="keywords" placeholder="Nhập từ khoá">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                        <div id="search_ajax" class=" position-absolute translate-middle"></div>

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr >
                                 <th scope="col">Tên người đánh giá</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Thời gian đánh giá</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Đánh giá</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($danhgia as $dg)
                                <tr id="san-pham{{$dg->MaSanPham}}">
                                     <td scope="row">{{$dg->TenDanhGia}}</td>
                                    <td>{{$dg->SoDienThoai}}</td>
                                     <td>{{$dg->NgayDanhGia}}</td>
                                     <td>{{$dg->NoiDung}}</td>
                                    <td >{{$dg->DanhGia}} <span>&#9733</span></td>

                                    {{--                                    <td>--}}
{{--                                        <img src="{{$dg->AnhDanhGia}}" alt="{{$dg->TenAnh}}" class="img-thumbnail" style="width:80px;">--}}
{{--                                    </td>--}}


                                    <td>
                                        <div class="form-group">
                                             <select class="form-control trang-thai" data-id="{{$dg->MaDanhGia}}" name="TrangThai" id="trang-thai">
                                                @if($dg->TrangThai ==1)
                                                 <option selected value="1">Hiển thị</option>
                                                 <option value="2">Ẩn</option>
                                                 @else
                                                     <option value="1">Hiển thị</option>
                                                     <option selected value="2">Ẩn</option>
                                                 @endif
                                             </select>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">
                        {{--                        {{ $SanPham->appends(request()->all())->links() }}--}}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{asset('vendors/sweetalert/sweetalert2@11.net_npm_sweetalert2@11')}}"></script>
    <script src="{{asset('adminpublic/sanpham/trangchu/trangchu.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#keywords').keyup(function () {
                var key = $(this).val();
                var _token = $('input[name="_token"]').val();  // Get the value of _token

                if (key != '') {
                    $.ajax({
                        url: "{{ route('search') }}",
                        method: "POST",
                        data: { key: key, _token: _token },  // Pass _token as its value, not the jQuery object
                        success: function (data) {
                            console.log(data)
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);  // Log the error to the console
                        }
                    });
                } else {
                    $('#search_ajax').fadeOut();
                }
            });
            $('.trang-thai').on('change',function () {
                var key = $(this).val();
                var madanhgia = $(this).data('id');

                 $.ajax({
                     url:'{{ route('danhgia.cap-nhap', ['id' => 'madanhgia']) }}'.replace('madanhgia', madanhgia),
                    method: "POST",
                    data: { key: key, _token: '{{csrf_token()}}'  },  // Pass _token as its value, not the jQuery object
                    success: function (data) {
                        window.location.reload(true);

                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);  // Log the error to the console
                    }
                });

            });
            $(document).on('click', '.auto-complete', function () {
                $('#keywords').val($(this).text());
                $('#search_ajax').fadeOut();
            });
        });

    </script>
@endsection
