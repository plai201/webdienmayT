@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('adminpublic/danhmucsanpham/them/style.css')}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Danh mục sản phẩm', 'key'=> 'Thêm'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('danh-muc-san-pham.themDanhMuc')}}" method="post">
                            @csrf
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Tên danh mục</label>
                                <input type="text" name="TenDanhMuc" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Danh mục cha</label>
                                <select class="form-control" name="DanhMucCha" id="exampleFormControlSelect1">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!!$htmlOption!!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chi tiết kỹ thuật</label>
                                    <div class="product-specs">
                                        <table id="specsTable">
                                            @foreach($thongso as $ts)
                                            <tr>
                                                <td><input type="checkbox" name="TenThongSo[]" value="{{$ts->TenThongSo}}"></td>
                                                <td><input type="text" class="ten-thong-so" value="{{$ts->TenThongSo}}"></td>
                                                <td><a class="btn btn-danger" onclick="return deleteRow(this)">Xoá</a></td>
                                            </tr>
                                                @endforeach
                                            <!-- Add more rows for additional specifications -->
                                        </table>
                                        <a class="btn btn-success m-10" onclick="addRow()">Thêm thông số kỹ thuật</a>

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
@endsection
