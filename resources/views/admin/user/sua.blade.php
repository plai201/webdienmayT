@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection
<link href="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('adminpublic/user/them.css')}}">

@section('css')

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Tài khoản', 'key'=> 'Sửa'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('user.cap-nhap',['MaTaiKhoan' =>$users->MaTaiKhoan])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tên tài khoản</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Nhập tên tài khoản"
                                       value="{{$users->name}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Nhập Email"
                                       value="{{$users->email}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Mật khẩu</label>
                                <input type="text" name="password" class="form-control" id="exampleFormControlInput1"
                                       placeholder="Nhập mật khẩu"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chọn vai trò</label>
                                <select class="form-control select2_v" name="MaVaiTro[]"  multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option
                                            {{$roleOfuser ->contains('MaVaiTro',$role->MaVaiTro) ? 'selected': ''}}
                                            value="{{$role->MaVaiTro}}">{{$role->TenVaiTro}}
                                        </option>
                                    @endforeach
                                </select>
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

@section('js')
    <script src="{{asset('vendors/select2/code.jquery.com_jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js')}}"></script>
    <script src="{{asset('adminpublic/user/them.js')}}"></script>
@endsection
