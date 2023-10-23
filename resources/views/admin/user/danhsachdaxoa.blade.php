@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Tài khoản', 'key'=> 'Danh sách đã xoá'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('user.danh-sach-da-xoa')}}" class="btn btn-success float-right m-2">Khôi phục</a>
                        <a href="{{route('users.trangChu')}}" class="btn btn-success float-right m-2">Danh sách</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($danhsachdaxoa as $user )
                                <tr>
                                    <th scope="row">{{$user->MaTaiKhoan}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href=" {{route('user.khoiPhuc',['MaTaiKhoan' =>$user->MaTaiKhoan])}}" class="btn btn-default">Khôi phục</a>
                                        <a href="" data-url="{{route('user.xoaVinhVien',['MaTaiKhoan' => $user->MaTaiKhoan])}}" class="btn btn-danger delete_tk">Xóa vĩnh viễn</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
{{--                        {{ $danhsachdaxoa->links() }}--}}
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
@endsection

