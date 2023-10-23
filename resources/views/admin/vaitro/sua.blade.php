@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection
<link href="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('adminpublic/vaitro/them.css')}}">

@section('css')

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Vai trò', 'key'=> 'Sửa'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('roles.cap-nhap',['MaVaiTro' =>$role->MaVaiTro])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tên vai trò</label>
                                <input type="text" name="TenVaiTro" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên vai trò"
                                       value="{{$role->TenVaiTro}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Mô tả vai trò</label>
                                <textarea type="text" name="TenHienThi" class="form-control " id="exampleFormControlInput1" placeholder="Nhập mô tả vai trò">{{$role->TenHienThi}}</textarea>
                            </div>
                            @foreach($permissionParents as $permissionParent)
                                <div class="form-group">
                                    <div class="card col-md-12 row">
                                        <div class="card-header">
                                            <input type="checkbox" value="" class="checkbox_wrapper">Module {{$permissionParent->TenQuyen}}
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            @foreach($permissionParent->quyenChild as $permissionChild)
                                                <li class="list-group-item ">
                                                    <input
                                                        {{$permissionChecked ->contains('MaQuyen',$permissionChild->MaQuyen) ? 'checked': ''}}
                                                        type="checkbox" name="MaQuyen[]"
                                                           value="{{$permissionChild->MaQuyen}}" class="checkbox_wrapper_child">
                                                    {{$permissionChild->TenQuyen}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
             </div>
        </div>

    </div>
 @endsection

@section('js')
    <script src="{{asset('vendors/select2/code.jquery.com_jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js')}}"></script>
    <script src="{{asset('adminpublic/vaitro/them.js')}}" ></script>
@endsection
