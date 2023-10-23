@extends('layouts.admin')

@section('title')
    <title>Nhãn hàng</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Nhãn hàng', 'key'=> 'Danh sách'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('nhan-hang.danh-sach-da-xoa')}}" class="btn btn-success float-right m-2">Khôi phục</a>
                        <a href="{{route('nhan-hang.them')}}" class="btn btn-success float-right m-2">Thêm</a>
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
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nhanhang as $nh )
                                <tr>
                                    <th scope="row">{{$nh->MaNhanHang}}</th>
                                    <td>{{$nh->TenNhanHang}}</td>
                                    <td>
                                        <img src="{{$nh->AnhNhanHang}}" alt="{{$nh->TenAnh}}" class="img-thumbnail" style="width:80px;">
                                    </td>                                    <td>
                                        <a href="{{route('nhan-hang.sua',['MaNhanHang' => $nh->MaNhanHang])}}" class="btn btn-default">Sửa</a>
                                        <a href="{{route('nhan-hang.xoa',['MaNhanHang' => $nh->MaNhanHang])}}" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                         {{ $nhanhang->appends(request()->all())->links() }}
                    </div>

                </div>

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
                        url: "{{ route('searchnhanhang') }}",
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
            $(document).on('click', '.auto-complete', function () {
                $('#keywords').val($(this).text());
                $('#search_ajax').fadeOut();
            });
        });

    </script>
@endsection

