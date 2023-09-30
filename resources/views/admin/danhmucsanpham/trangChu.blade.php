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
                        <a href="{{route('danh-muc-san-pham.danh-sach-da-xoa')}}" class="btn btn-success float-right m-2">Khôi phục</a>
                        <a href="{{route('danh-muc-san-pham.them')}}" class="btn btn-success float-right m-2">Thêm</a>
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
                                    <td>{{$danhmuc->Anh}}</td>
                                    <td>
                                        <a href="{{route('danh-muc-san-pham.sua',['MaDanhMuc' => $danhmuc->MaDanhMuc])}}" class="btn btn-default">Sửa</a>
                                        <a href="{{route('danh-muc-san-pham.xoa',['MaDanhMuc' => $danhmuc->MaDanhMuc])}}" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $danhmucsanpham->links() }}
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

