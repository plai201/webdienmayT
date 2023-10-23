@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection
<link rel="stylesheet" href="{{asset('adminpublic/user/them.css')}}">

@section('css')

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Khuyến mãi', 'key'=> 'Thêm'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('khuyen-mai.them-ma')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tên mã giảm giá</label>
                                <input type="text" name="TenKhuyenMai" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên mã giảm giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Mã giảm giá</label>
                                <input type="text" name="Ma" class="form-control" id="exampleFormControlInput1" placeholder="Nhập mã giảm giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Số lượng mã</label>
                                <input type="text" name="SoLuong" class="form-control" id="exampleFormControlInput1" placeholder="Nhập số lượng mã">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tính năng mã</label>
                                <select class="form-control" name="TinhNangMa" >
                                    <option selected value="0">-----Chọn-----</option>
                                    <option value="1">Giảm theo phầm trăm</option>
                                    <option value="2">Giảm theo tiền</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nhập % hoặc số tiền giảm</label>
                                <input type="text" name="GiaTri" class="form-control" id="exampleFormControlInput1" placeholder="Nhập % hoặc số tiền giảm">
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm mã</button>
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
