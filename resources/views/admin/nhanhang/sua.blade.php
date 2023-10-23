@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection
@section('css')
    <link href="{{asset('adminpublic/sanpham/them/them.css')}}" rel="stylesheet" />

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Nhãn hàng', 'key'=> 'Sửa'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('nhan-hang.capNhap',['MaNhanHang'=>$nhanhang->MaNhanHang])}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Tên nhãn hàng</label>
                                <input type="text"
                                       name="TenNhanHang"
                                       value="{{$nhanhang->TenNhanHang}}"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập tên nhãn hàng">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh nhãn hàng</label>
                                <input type="file" name="AnhNhanHang" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{$nhanhang->AnhNhanHang}}" alt="{{$nhanhang->TenAnh}}" class="img_detail_product">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

