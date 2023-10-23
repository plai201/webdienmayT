@extends('layouts.admin')

@section('title')
    <title>Thêm Sản phẩm</title>
@endsection

@section('css')
    <link href="{{asset('adminpublic/sanpham/them/them.css')}}" rel="stylesheet" />
    <link href="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('vendors/summernote/summernote.min.css')}}" rel="stylesheet" />
    <link href="{{asset('vendors/summernote/summernote-lite.min.css')}}" rel="stylesheet" />

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Sản phẩm', 'key'=> 'Thêm'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('san-pham.them-san-pham')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Tên sản phẩm</label>
                                <input type="text"
                                       name="TenSanPham"
                                       class="form-control @error('TenSanPham') is-invalid @enderror"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập tên sản phẩm"
                                       value="{{old('TenSanPham')}}">
                                @error('TenSanPham')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chọn danh mục</label>
                                <select  class="form-control danh-muc @error('MaDanhMuc') is-invalid @enderror" name="MaDanhMuc" id="exampleFormControlSelect1">
                                    <option value="">Chọn danh mục cha</option>
                                    {!!$htmlOption!!}
                                </select>

                                @error('MaDanhMuc')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chọn nhãn hàng</label>
                                <select class="form-control @error('MaNhanHang') is-invalid @enderror" value="{{old('MaNhanHang')}}" name="MaNhanHang" id="exampleFormControlSelect1">
                                    <option value="">Chọn tên nhãn hàng</option>
                                    {!!$htmlOptionNhanHang!!}
                                </select>

                                @error('MaNhanHang')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Giá gốc</label>
                                <input type="text"
                                       name="GiaGoc"
                                       class="form-control @error('GiaGoc') is-invalid @enderror"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập giá gốc sản phẩm"
                                       value="{{old('GiaGoc')}}">
                                @error('GiaGoc')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Giảm giá</label>
                                <input type="text"
                                       name="GiamGia"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập phần trăm giảm giá: 1-100">
                            </div>

                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Giá bán</label>
                                <input type="text"
                                       name="GiaBan"
                                       class="form-control @error('GiaBan') is-invalid @enderror"
                                       id="exampleFormControlInput1"
                                       placeholder="Giá bán sản phẩm"
                                       value="{{old('GiaBan')}}">
                                @error('GiaBan')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Trả góp</label>
                                <input type="text"
                                       name="TraGop"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập phần trăm trả góp: 1-100">
                            </div>
                            <div class="form-group ">
                                <label for="exampleFormControlInput1">Nhâp số lượng sản phẩm</label>
                                <input type="text"
                                       name="SanPhamSoLuong"
                                       class="form-control"
                                       id="exampleFormControlInput1"
                                       placeholder="Nhập số lượng sản phẩm">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
                                <input type="file" name="AnhSanPham" class="form-control-file" id="exampleFormControlFile1">
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
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Nhập tags cho sản phẩm</label>
                                <select id="mySelect" name="TenThe[]" class="form-control" multiple="multiple">

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Nhập nội dung</label>
                                <textarea id="mycontent" name="MoTaSanPham" class="form-control @error('MoTaSanPham') is-invalid @enderror" rows="3">
                                    {{old('MoTaSanPham')}}
                                </textarea>
                                @error('MoTaSanPham')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                @error('GiaTri')
                                <div class="alert alert-danger thong-bao">{{ $message }}</div>
                                @enderror
                                <label for="exampleFormControlInput1">Chi tiết kỹ thuật</label>
                                <div class="product-specs">
                                    <table id="specsTable">
                                    </table>
                                </div>
                                <table id="subTable"></table>

                                <a class="btn btn-success m-10" onclick="addRowSP()">Thêm thông số kỹ thuật</a>

                                <!-- Add more rows for additional specifications -->
                            </div>



                            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js')}}"></script>


    <script src="{{asset('vendors/select2/code.jquery.com_jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js')}}"></script>
    <script src="{{asset('adminpublic/sanpham/them/them.js')}}"></script>
    <script src="{{asset('vendors/summernote/bootstrap.bundle.min.js')}}"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="{{asset('vendors/summernote/summernote-lite.min.js')}}"></script>

    <script src="{{asset('adminpublic/danhmucsanpham/them/js.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>





@endsection
