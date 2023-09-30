@extends('layouts.admin')

@section('title')
    <title>Sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('adminpublic/sanpham/trangchu/trangchu.css')}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Sản phẩm', 'key'=> 'Danh sách'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="">
                            <!-- Actual search box -->
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" name="search" placeholder="Search" id="search">
                            </div>
                        </div>
                        <a href="{{route('san-pham.danh-sach-da-xoa')}}" class="btn btn-success float-right m-2">Khôi phục</a>
                        <a href="{{route('san-pham.them')}}" class="btn btn-success float-right m-2">Thêm</a>
                        <a href="#" data-url="{{ route('san-pham.delete') }}" class="btn btn-danger  m-2" id="deleteAllSelect">Xoá mục chọn</a>

                    </div>
                    <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr >
                                    <th><input type="checkbox"  id="select_all_ids" ></th>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá gốc</th>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col">Giá bán</th>
                                    <th scope="col">Trả góp</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Nhãn hàng</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($SanPham as $sanpham)
                                    <tr id="san-pham{{$sanpham->MaSanPham}}">
                                        <th><input type="checkbox" name="ids" class="check_ids"  value="{{$sanpham->MaSanPham}}"></th>
                                        <th scope="row">{{$sanpham->MaSanPham}}</th>
                                        <td>{{$sanpham->TenSanPham}}</td>
                                        <td>{{$sanpham->GiaGoc}}</td>
                                        <td>{{$sanpham->GiamGia}}</td>
                                        <td>{{$sanpham->GiaBan}}</td>
                                        <td>{{$sanpham->TraGop}}</td>
                                        <td>{{($sanpham->danhmucsanpham->TenDanhMuc)}}</td>
                                        <td>{{($sanpham->nhanhang->TenNhanHang)}}</td>
                                        <td>
                                            <img src="{{$sanpham->AnhSanPham}}" alt="{{$sanpham->TenAnh}}" class="img-thumbnail" style="width:80px;">
                                        </td>

                                        <td>{{$sanpham->TrangThai}}</td>
                                        <td>
                                            <a href="{{route('san-pham.sua',['MaSanPham' => $sanpham->MaSanPham])}}" class="btn btn-default">Sửa</a>
                                            <a href="" data-url="{{route('san-pham.xoa',['MaSanPham' => $sanpham->MaSanPham])}}" class="btn btn-danger delete_sp">Xóa</a
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                    <div class="col-md-12">
                        {{ $SanPham->links() }}
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
