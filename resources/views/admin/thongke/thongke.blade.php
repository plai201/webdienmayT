@extends('layouts.admin')

@section('title')
    <title>Thống kê</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('adminpublic/sanpham/trangchu/trangchu.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/thongbao/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/thongbao/morris.css')}}">

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('partials.content-header',['name' => 'Thống kê', 'key'=> 'Danh sách'])
        <p class="title">Thống kê đơn hàng doanh số</p>

        <div class="row">
            <form  autocomplete="off" class="form-inlinee">
            <div class="col-md-5 ">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                <input type="button" id="btn-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
            </div>
            <div class="col-md-5">
                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
            </div>
            <div class="col-md-5">
                <p>Chọn:<select  class="form-control option-filter"  name=" " id="exampleFormControlSelect1">
                        <option value="1ngay">1 ngày qua</option>
                        <option value="7ngay">7 ngày qua</option>
                        <option  value="1thangnay">1 tháng qua</option>
                        <option value="1thangtruoc">1 tháng trước</option>
                        <option selected value="1nam">1 năm qua</option>
                    </select>
                </p>
            </div>
            <div class=" col-md-5 thong-bao" style="display: none"></div>


                <p style="display: none" ><input type="hidden"  name="_token" value="@csrf" ></p>
        </form>

        <div class="col-md-12">
            <div id="chart" style="height: 250px;"></div>
        </div>
        <div class="col-md-12 form-inlinee">
            <div id="chartsl" style="height: 250px;"></div>
            <div>
                <p class="title"> Sản phẩm xem nhiều</p>
                <ol>
                    @foreach($sanpham_view as $sp)
                        <li>
                            <a class="text-primary" href="{{route('chi-tiet-san-pham',['MaSanPham'=>$sp->MaSanPham])}}" target="_blank">
                                <span class="font-weight-bold">{{ $sp->TenSanPham }}: <span class="text-danger">{{ $sp->LuotXem }}</span></span>
                            </a>
                        </li>

                    @endforeach
                </ol>
            </div>
            <div>
                <p class="title"> Sản phẩm bán chạy</p>
                <ol>
                    @foreach($sanpham_sale as $sp)
                        <li>
                            <a class="text-primary" href="{{route('chi-tiet-san-pham',['MaSanPham'=>$sp->MaSanPham])}}" target="_blank">
                                <span class="font-weight-bold">{{ $sp->TenSanPham }}: <span class="text-danger">{{ $sp->SanPhamBan }}</span></span>
                            </a>
                        </li>

                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    </div>




@endsection
@section('js')
    <script src="{{asset('vendors/thongbao/jquery-3.6.0.js')}}"></script>
    <script src=" {{asset('vendors/thongbao/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/thongbao/raphael-min.js')}}"></script>
    <script src="{{asset('vendors/thongbao/morris.min.js')}}"></script>
    <script src="{{asset('adminpublic/thongke/thongke.js')}}"></script>
    <script src="{{asset('vendors/thongbao/jquery-ui.js')}}"></script>
            <script>
                $( function() {
                    d356days();

                    $( "#datepicker" ).datepicker({
                        dateFormat: "yy-mm-dd",
                        duration:"slow"
                    });
                    $( "#datepicker2" ).datepicker({
                        dateFormat: "yy-mm-dd",
                        duration:"slow"
                        }
                    );
                    $('#btn-filter').on('click',function (){
                        var _token =$('input[name="_token"]').val();
                        var ngay1 = $( "#datepicker" ).val()
                        var ngay2 = $( "#datepicker2" ).val();
                        $.ajax({
                            url:"{{route('thong-ke.loc')}}",
                            method:"get",
                            dataType:"JSON",
                            data:{_token,ngay1,ngay2},
                            success:function (data){
                                if (data !== null && data.length > 0) {
                                    chart.setData(data);
                                } else {
                                    alert('Không có dữ liệu');
                                }

                            }
                        })
                    })
                    $('.option-filter').on('change',function (){
                        var val = $(this).val();
                        var _token =$('input[name="_token"]').val();
                         $.ajax({
                            url:"{{route('thong-ke.loc-chon')}}",
                            method:"get",
                            dataType:"JSON",
                            data:{val:val, _token:_token},
                            success:function (data){
                                if (data !== null && data.length > 0) {
                                    chart.setData(data);
                                } else {
                                    alert('Không có dữ liệu');
                                }

                            }
                        })

                    })
                     function d356days(){
                         var _token =$('input[name="_token"]').val();
                        $.ajax({
                            url:"{{route('thong-ke.loc-load')}}",
                            method:"get",
                            dataType:"JSON",
                            data:{  _token:_token},
                            success:function (data){
                                if (data !== null && data.length > 0) {
                                    chart.setData(data);
                                } else {
                                    alert('Không có dữ liệu');
                                }
                            }
                        })
                    }
                    var chart = new Morris.Bar({
                        element: 'chart',

                        lineColors:['rgba(54, 162, 235, 1)'],
                        pointFillColors:['$fffff'],
                        pointStrokeColors:['black'],
                        hideHover: 'auto',
                        parseTime: false,
                        xkey: 'NgayDonHang',
                        ykeys: ['NgayDonHang','DoanhThu','LoiNhuan','SoLuong'],
                        labels: ['Đơn hàng','Doanh số','Lợi nhuận','Số lượng']
                    });
                    new Morris.Donut({
                        element: 'chartsl',
                        resize: true,
                        colors: ['#4CAF50', '#2196F3', '#FF9800'],
                        data: [
                            { label: "Sản phẩm", value: <?php echo $sanpham; ?> },
                            { label: "Đơn hàng", value: <?php echo $donhang; ?> },
                            { label: "Khách hàng", value: <?php echo $khachhang; ?> }
                        ]
                    });


                } );
            </script>

@endsection
