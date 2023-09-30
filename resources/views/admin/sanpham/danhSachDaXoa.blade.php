@extends('layouts.admin')

@section('title')
    <title>Sản phẩm</title>
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
                        <a href="{{route('san-pham.danh-sach-da-xoa')}}" class="btn btn-success float-right m-2">Khôi phục</a>
                        <a href="{{route('san-pham.them')}}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><input type="checkbox"  id="select_all_ids_kp" ></th>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá gốc</th>
                                <th scope="col">Giảm giá</th>
                                <th scope="col">Giá bán</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Nhãn hàng</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($danhSachSPDaXoa as $sanpham)
                                <tr>
                                    <th><input type="checkbox" name="ids_kp" class="check_ids"  value="{{$sanpham->MaSanPham}}"></th>

                                    <th scope="row">{{$sanpham->MaSanPham}}</th>
                                    <td>{{$sanpham->TenSanPham}}</td>
                                    <td>{{$sanpham->GiaGoc}}</td>
                                    <td>{{$sanpham->GiamGia}}</td>
                                    <td>{{$sanpham->GiaBan}}</td>
                                    <td>{{($sanpham->danhmucsanpham->TenDanhMuc)}}</td>
                                    <td>{{($sanpham->nhanhang->TenNhanHang)}}</td>
                                    <td>

                                        <img src="{{$sanpham->AnhSanPham}}" alt="{{$sanpham->TenAnh}}" class="img-thumbnail" style="width:80px;">
                                    </td>

                                    <td>{{$sanpham->TrangThai}}</td>
                                    <td>
                                        <a href="{{route('san-pham.khoiPhuc',['MaSanPham' => $sanpham->MaSanPham])}}" class="btn btn-default">Khôi phục</a>
                                        <a href="" data-url="{{route('san-pham.xoaVinhVien',['MaSanPham' => $sanpham->MaSanPham])}}" class="btn btn-danger delete_sp">Xóa vĩnh viễn</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        {{ $SanPham->links() }}--}}
{{--                    </div>--}}

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('adminpublic/sanpham/trangchu/trangchu.js')}}"></script>
@endsection
