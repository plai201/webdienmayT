@extends('layouts.admin')

@section('title')
    <title>Sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('adminpublic/sanpham/trangchu/trangchu.css')}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Sản phẩm', 'key'=> 'Danh sách'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="">
                            <!-- Actual search box -->
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" name="search" placeholder="Search" id="search">
                            </div>
                        </div>
{{--                        <a href="{{route('san-pham.danh-sach-da-xoa')}}" class="btn btn-success float-right m-2">Khôi phục</a>--}}
{{--                        <a href="{{route('san-pham.them')}}" class="btn btn-success float-right m-2">Thêm</a>--}}
{{--                        <a href="#" data-url="{{ route('san-pham.delete') }}" class="btn btn-danger  m-2" id="deleteAllSelect">Xoá mục chọn</a>--}}

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr >
{{--                                <th><input type="checkbox"  id="select_all_ids" ></th>--}}
                                <th scope="col">STT</th>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Tình trạng đơn hàng</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach($donhang as $dh)
                                @php
                                    $i++;
                                @endphp
                                <tr>
{{--                                    <th><input type="checkbox" name="ids" class="check_ids"  value="{{$sanpham->MaSanPham}}"></th>--}}
                                    <td>{{$i}}</td>
                                    <td>{{$dh->MaDatDon}}</td>
                                    <td>
                                        @if($dh->TrangThai==1)
                                            Đơn hàng mới
                                        @else
                                            Đã xử lý
                                        @endif
                                    </td>
                                    <td>
                                        @can('quyen-xem-don-hang-chi-tiet')
                                            <a href="{{route('don-hang.xem',['MaDatDon'=>$dh->MaDatDon])}}" class="btn btn-success">Xem</a>
                                        @endcan
                                     </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                    <div class="col-md-12">
                        {{ $donhang->links() }}
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
    <script src="{{asset('vendors/sweetalert/sweetalert2@11.net_npm_sweetalert2@11')}}"></script>
    <script src="{{asset('adminpublic/sanpham/trangchu/trangchu.js')}}"></script>
@endsection
