@extends('layouts.admin')

@section('title')
    <title>Khách hàng</title>

@endsection
<link href="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('adminpublic/user/them.css')}}">

@section('css')

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Khách hàng', 'key'=> 'Sửa'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tên khách hàng</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Nhập tên tài khoản"
                                       value="{{$khachhang->Ho}} {{$khachhang->Ten}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Giới tính</label>
                                <select class="form-control">
                                    @if($khachhang->GioiTinh == 1)
                                        <option selected value="1"> Nam</option>
                                        <option  value="2"> Nữ</option>
                                    @else
                                        <option value="1"> Nam</option>
                                        <option selected   value="2"> Nữ</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Ngày sinh</label>
                                <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Nhập Email"
                                       value="{{$khachhang->NgaySinh}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Số điện thoại</label>
                                <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Nhập Email"
                                       value="{{$khachhang->SoDienThoai}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Địa chỉ</label>
                                <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Nhập Email"
                                       value="{{$khachhang->DiaChi}} {{$khachhang->PhuongXa}} {{$khachhang->QuanHuyen}}  {{$khachhang->ThanhPhoTinh}}"
                                >
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhập thông tin</button>
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

@section('js')
    <script src="{{asset('vendors/select2/code.jquery.com_jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js')}}"></script>
    <script src="{{asset('adminpublic/user/them.js')}}"></script>
@endsection
