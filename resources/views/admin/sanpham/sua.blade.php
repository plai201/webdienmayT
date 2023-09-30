@extends('layouts.admin')

@section('title')
    <title>Sửa Sản phẩm</title>
@endsection

@section('css')
    <link href="{{asset('adminpublic/sanpham/them/them.css')}}" rel="stylesheet" />
    <link href="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('vendors/summernote/summernote.min.css')}}" rel="stylesheet" />
    <link href="{{asset('vendors/summernote/summernote-lite.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('adminpublic/danhmucsanpham/them/style.css')}}">


@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Sản phẩm', 'key'=> 'Sửa'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('san-pham.capNhap',['MaSanPham' =>$sanpham->MaSanPham])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Tên sản phẩm</label>
                                <input type="text"
                                       name="TenSanPham"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập tên sản phẩm"
                                       value="{{$sanpham->TenSanPham}}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chọn danh mục</label>
                                <select class="form-control danh-muc-sua" name="MaDanhMuc" id="danhmuc">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!!$htmlOption!!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chọn nhãn hàng</label>
                                <select class="form-control" name="MaNhanHang" id="exampleFormControlSelect1">
                                    <option value="0">Chọn tên nhãn hàng</option>
                                    {!!$htmlOptionNhanHang!!}
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Giá gốc</label>
                                <input type="text"
                                       name="GiaGoc"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập giá gốc sản phẩm"
                                       value="{{$sanpham->GiaGoc}}">
                            </div>

                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Giảm giá</label>
                                <input type="text"
                                       name="GiamGia"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập phần trăm giảm giá: 1-100"
                                       value="{{$sanpham->GiamGia}}">
                            </div>

                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Giá bán</label>
                                <input type="text"
                                       name="GiaBan"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Giá bán sản phẩm"
                                       value="{{$sanpham->GiaBan}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
                                <input type="file" name="AnhSanPham" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{$sanpham->AnhSanPham}}" alt="{{$sanpham->TenAnh}}" class="img_detail_product">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh chi tiết</label>
                                <input type="file"
                                       multiple
                                       name="AnhChiTiet[]"
                                       class="form-control-file"
                                       id="exampleFormControlFile1"
                                >
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($sanpham->anh as $anh)
                                    <div class="col-md-3">
                                        <img src="{{$anh->AnhChiTiet}}" alt="{{$anh->TenAnh}}" class="img_detail_product" >
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Nhập tags cho sản phẩm</label>
                                <select id="mySelect" name="TenThe[]" class="form-control" multiple="multiple" >
                                    @foreach($sanpham->the as $the)
                                        <option value="{{$the->TenThe}}" selected>{{$the->TenThe}}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Nhập nội dung</label>
                                <textarea id="mycontent" name="MoTaSanPham" class="form-control" rows="3" >{{$sanpham->MoTaSanPham}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chi tiết kỹ thuật</label>
                                <div class="product-specs">
                                    <table id="specsTable">
                                        @foreach($sanpham->sanphamthongso as $ts)
                                            <tr>
                                                <td><input class="ten-thong-so" type="text" checked name="TenThongSo[]" value="{{$ts->TenThongSo}}"></td>
                                                <td><input class="ten-thong-so" name="GiaTri[]" type="text" class="ten-thong-so" value="{{$ts->pivot->GiaTri}}"></td>
                                                <td><a href="{{route('xoa-san-pham-thong-so',['MaSanPham'=>$sanpham->MaSanPham, 'MaThongSo'=>$ts->MaThongSo])}}" data-masanpham ="{{ $sanpham->MaSanPham }}" data-mathongso="{{ $ts->MaThongSo }}" class="btn btn-danger xoa-sp-ts" >Xoá</a></td>
                                            </tr>
                                        @endforeach
                                        <!-- Add more rows for additional specifications -->
                                    </table>
                                    <div class="product-sub">

                                    </div>
                                    <table id="subTable"></table>

                                    <a value="{{$sanpham->MaDanhMuc}}" class="btn btn-success m-8 danh-muc-mau">Danh sách thông số</a>
                                    <a class="btn btn-success m-8" onclick="addRowSP()">Thêm thông số mới</a>

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
    <script src="{{asset('vendors/select2/code.jquery.com_jquery-3.6.0.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



    <script src="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js')}}"></script>
    <script src="{{asset('adminpublic/sanpham/them/them.js')}}"></script>
    <script src="{{asset('vendors/summernote/bootstrap.bundle.min.js')}}"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="{{asset('vendors/summernote/summernote-lite.min.js')}}"></script>
    <script src="{{asset('adminpublic/danhmucsanpham/them/js.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>






@endsection
