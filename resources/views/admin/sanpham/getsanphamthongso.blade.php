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
                        <form action="{{route('postsanphamthongso')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chọn danh mục</label>
                                <select  class="form-control danh-muc @error('MaDanhMuc') is-invalid @enderror" name="MaDanhMuc" id="exampleFormControlSelect1">
                                    <option value="">Chọn danh mục cha</option>
                                    {!!$danhmucsanpham!!}
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Chi tiết kỹ thuật</label>
                                <div class="product-specs">
                                    <table id="specsTable">
                                        {{--                                        @foreach($htmlOption->danhmucthongso as $ts)--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <td><input type="text" name="TenThongSo[]"  class="ten-thong-so" value="{{$ts->TenThongSo}}"></td>--}}
                                        {{--                                                <td><input type="text" name="GiaTri[]"  class="ten-thong-so"></td>--}}
                                        {{--                                                <td><a class="btn btn-danger" onclick="return deleteRow(this)">Xoá</a></td>--}}
                                        {{--                                            </tr>--}}
                                        {{--                                        @endforeach--}}
                                        <!-- Add more rows for additional specifications -->
                                    </table>
                                </div>
                                <a class="btn btn-success m-10" onclick="addRowSP()">Thêm thông số kỹ thuật</a>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="{{asset('vendors/select2/code.jquery.com_jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('vendors/select2/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_js_select2.min.js')}}"></script>
    <script src="{{asset('adminpublic/sanpham/them/them.js')}}"></script>
    <script src="{{asset('vendors/summernote/bootstrap.bundle.min.js')}}"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="{{asset('vendors/summernote/summernote-lite.min.js')}}"></script>

    <script src="{{asset('adminpublic/danhmucsanpham/them/js.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>





@endsection
