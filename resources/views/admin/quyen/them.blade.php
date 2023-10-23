@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>

@endsection

@section('css')

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Quyền', 'key'=> 'Thêm'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('permission.them-quyen')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Chọn phân quyền </label>
                                <select class="form-control" name="module_cha" id="exampleFormControlSelect1">
                                    @foreach(config('permissions.table_module') as $moduleItem)
                                        <option value="{{$moduleItem}}">{{$moduleItem}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" value="Xem danh sách" name="module_con[]">
                                            Xem danh sách
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" value="Thêm" name="module_con[]">
                                            Thêm
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" value="Sửa" name="module_con[]">
                                            Sửa
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" value="Xoá" name="module_con[]">
                                            Xoá
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" value="Khôi phục" name="module_con[]">
                                            Khôi phục
                                        </label>
                                    </div>
                                </div>

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
@endsection

