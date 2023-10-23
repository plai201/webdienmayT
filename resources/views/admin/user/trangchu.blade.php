@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Tài khoản', 'key'=> 'Danh sách'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('user.danh-sach-da-xoa')}}" class="btn btn-success float-right m-2">Khôi phục</a>
                        <a href="{{route('user.them')}}" class="btn btn-success float-right m-2">Thêm</a>
{{--                        {{route('user.danh-sach-da-xoa')}} {{route('user.them')}}--}}
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
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vai trò</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user )
                                <tr>
                                    <th scope="row">{{$user->MaTaiKhoan}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @forelse ($user->vaitro as $vaiTro)
                                            {{ $vaiTro->TenVaiTro }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @empty

                                        @endforelse
                                    </td>
                                    <td>
                                        <a href=" {{route('user.sua',['MaTaiKhoan' =>$user->MaTaiKhoan])}}" class="btn btn-default">Sửa</a>
                                        <a href="" data-url="{{route('user.xoa',['MaTaiKhoan' => $user->MaTaiKhoan])}}" class="btn btn-danger delete_tk">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
{{--                         {{ $users->appends(request()->all())->links() }}--}}
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
                        url: "{{ route('searchuser') }}",
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

