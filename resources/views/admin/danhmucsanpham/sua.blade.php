@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('adminpublic/danhmucsanpham/them/style.css')}}">
    <link href="{{asset('adminpublic/sanpham/them/them.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Danh mục sản phẩm', 'key'=> 'Sửa'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('danh-muc-san-pham.capNhap',['MaDanhMuc'=>$danhmucsanpham->MaDanhMuc])}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Tên danh mục</label>
                                <input type="text"
                                       name="TenDanhMuc"
                                       value="{{$danhmucsanpham->TenDanhMuc}}"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Danh mục cha</label>
                                <select class="form-control" name="DanhMucCha" id="exampleFormControlSelect1">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!!$htmlOption!!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh danh mục</label>
                                <input type="file" name="AnhDanhMuc" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{$danhmucsanpham->AnhDanhMuc}}" alt="{{$danhmucsanpham->TenAnh}}" class="img_detail_product">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chi tiết kỹ thuật</label>
                                <div class="product-specs">
                                    <table id="specsTable">
                                        @foreach($danhmucsanpham->danhmucthongso as $ts)
                                            <tr>
                                                <td><input type="checkbox" checked name="TenThongSo[]" value="{{$ts->TenThongSo}}"></td>
                                                <td><input type="text" class="ten-thong-so" value="{{$ts->TenThongSo}}"></td>
                                                <td><a class="btn btn-danger" onclick="return deleteRow(this)">Xoá</a></td>
                                            </tr>
                                        @endforeach
                                        <!-- Add more rows for additional specifications -->
                                    </table>
                                    <table id="subTable"></table>

                                    <table id="subtoTable"></table>

                                    <a href="" class="btn btn-success m-8" onclick="addData()">Danh sách thông số</a>
                                    <a class="btn btn-success m-8" onclick="addRow()">Thêm thông số mới</a>



                                </div>
                                <!-- Add more rows for additional specifications -->
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
    <script src="{{asset('adminpublic/danhmucsanpham/them/js.js')}}" defer></script>
    <script>
        const notSelectedThongSo = {!! json_encode($notSelectedThongSo) !!};
    </script>
@endsection
