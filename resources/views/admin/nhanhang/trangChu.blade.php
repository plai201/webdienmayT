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
                                    <td>{{$nh->Anh}}</td>
                                    <td>
                                        <a href="{{route('nhan-hang.sua',['MaNhanHang' => $nh->MaNhanHang])}}" class="btn btn-default">Sửa</a>
                                        <a href="{{route('nhan-hang.xoa',['MaNhanHang' => $nh->MaNhanHang])}}" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$nhanhang->links()}}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

