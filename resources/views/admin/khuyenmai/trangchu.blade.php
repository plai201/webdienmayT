@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Khuyến mãi', 'key'=> 'Danh sách'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('quyen-khuyen-mai-them')
                            <a href="{{route('khuyen-mai.them')}}" class="btn btn-success float-right m-2">Thêm</a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên mã khuyến mãi</th>
                                <th scope="col">Mã khuyến mãi</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Số lượng còn</th>
                                <th scope="col">Tính năng mã</th>
                                <th scope="col">Giá trị mã</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach($khuyenmai as $km )
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <th scope="row">{{$km->TenKhuyenMai}}</th>
                                    <td>{{$km->Ma}}</td>
                                    <td>{{$km->SoLuong}}</td>
                                    <td>{{$i}}</td>
                                    <td>
                                        @if($km->TinhNangMa==1)
                                            Giảm theo %
                                        @elseif($km->TinhNangMa==2)
                                            Giảm theo tiền
                                        @endif
                                    </td>
                                    <td>@if($km->TinhNangMa==1)
                                            Giảm {{$km->GiaTri}}%
                                        @elseif($km->TinhNangMa==2)
                                            Giảm {{number_format($km->GiaTri)}}đ
                                        @endif
                                        </td>
                                    <td>
                                        @can('quyen-khuyen-mai-sua')
                                        <a href="{{route('khuyen-mai.sua',['MaKhuyenMai'=>$km->MaKhuyenMai])}}" class="btn btn-default">Sửa</a>
                                        @endcan
                                        @can('quyen-khuyen-mai-xoa')
                                        <a href="" data-url="{{route('khuyen-mai.xoa',['MaKhuyenMai'=>$km->MaKhuyenMai])}}" class="btn btn-danger delete_km">Xóa</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        {{ $users->links() }}--}}
{{--                    </div>--}}

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

