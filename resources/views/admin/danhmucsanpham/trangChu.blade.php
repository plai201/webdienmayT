@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Danh mục sản phẩm', 'key'=> 'Danh sách'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('danh-muc-san-pham-khoi-phuc')
                            <a href="{{route('danh-muc-san-pham.danh-sach-da-xoa')}}" class="btn btn-success float-right m-2">Khôi phục</a>
                        @endcan
                        @can('danh-muc-san-pham-them')
                            <a href="{{route('danh-muc-san-pham.them')}}" class="btn btn-success float-right m-2">Thêm</a>
                        @endcan
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
                            @foreach($danhmucsanpham as $danhmuc )
                                <tr>
                                    <th scope="row">{{$danhmuc->MaDanhMuc}}</th>
                                    <td>{{$danhmuc->TenDanhMuc}}</td>
                                     <td>
                                        <img src="{{$danhmuc->AnhDanhMuc}}" alt="{{$danhmuc->TenAnh}}" class="img-thumbnail" style="width:80px;">
                                    </td>
                                    <td>
                                        @can('danh-muc-san-pham-sua')
                                            <a href="{{route('danh-muc-san-pham.sua',['MaDanhMuc' => $danhmuc->MaDanhMuc])}}" class="btn btn-default">Sửa</a>
                                        @endcan
                                        @can('danh-muc-san-pham-xoa')
                                                <a href="{{route('danh-muc-san-pham.xoa',['MaDanhMuc' => $danhmuc->MaDanhMuc])}}" class="btn btn-danger">Xóa</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                    {{ $danhmucsanpham->appends(request()->all())->links() }}

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
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
                        url: "{{ route('searchdanhmuc') }}",
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
