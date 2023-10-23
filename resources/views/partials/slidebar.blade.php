<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Welcome</span>
    </a>
    @php
        if (Auth::check()) {

        $user = Auth::user();
        $userName = $user->name;
    }
    @endphp

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/avatar-1577909_960_720.webp')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @if (Auth::check())
                <a href="#" class="d-block">{{$userName}}</a>
                @endif
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('quyen-thong-ke-xem')
                <li class="nav-item">
                    <a href="{{route('thong-ke.trangchu')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Thống kê
                         </p>
                    </a>
                </li>
                @endcan
            @can('danh-muc-san-pham-danh-sach')
                    <li class="nav-item">
                        <a href="{{route('danh-muc-san-pham.trangChu')}}" class="nav-link">
                            <i class="fas fa-folder"></i>
                            <p>
                                Danh mục sản phẩm
                             </p>
                        </a>
                    </li>
                @endcan

                @can('nhan-hang-danh-sach')
                        <li class="nav-item">
                            <a href="{{route('nhan-hang.trangChu')}}" class="nav-link">
                                <i class="fas fa-tag"></i>
                                <p>
                                    Nhãn hàng
{{--                                    <span class="right badge badge-danger">New</span>--}}
                                </p>
                            </a>
                        </li>
                @endcan
                @can('san-pham-danh-sach')
                        <li class="nav-item">
                            <a href="{{route('san-pham.trangChu')}}" class="nav-link">
                                <i class="fas fa-shopping-bag"></i>
                                <p>
                                    Sản phẩm
                                 </p>
                            </a>
                        </li>
                @endcan
                @can('tai-khoan-danh-sach')
                        <li class="nav-item">
                            <a href="{{route('users.trangChu')}}" class="nav-link">
                                <i class="far fa-id-badge"></i>
                                <p>
                                    Danh sách tài khoản
                                 </p>
                            </a>
                        </li>
                @endcan
                @can('vai-tro-danh-sach')
                        <li class="nav-item">
                            <a href="{{route('roles.trangChu')}}" class="nav-link">
                                <i class="fas fa-shield-alt"></i>
                                <p>
                                    Danh sách vai trò
                                 </p>
                            </a>
                        </li>
                @endcan
                @can('quyen-them')
                        <li class="nav-item">
                            <a href="{{route('permission.them')}}" class="nav-link">
                                <i class="fas fa-lock"></i>
                                <p>
                                    Thêm quyền
                                 </p>
                            </a>
                        </li>
                @endcan
                         <li class="nav-item">
                            <a href="{{route('khach-hang.trangChu')}}" class="nav-link">
                                <i class="far fa-id-badge"></i>
                                <p>
                                    Danh sách khách hàng
                                </p>
                            </a>
                        </li>
                @can('quyen-xem-don-hang')
                <li class="nav-item">
                    <a href="{{route('don-hang.trangchu')}}" class="nav-link">
                        <i class="far fa-list-alt"></i>
                        <p>
                            Quản lý đơn hàng
                         </p>
                    </a>
                </li>
                @endcan
                @can('quyen-khuyen-mai-xem')
                <li class="nav-item">
                    <a href="{{route('khuyen-mai.trangchu')}}" class="nav-link">
                        <i class="fas fa-tasks"></i>
                        <p>
                            Quản lý mã khuyến mãi
                         </p>
                    </a>
                </li>
                @endcan
                @can('quyen-khuyen-mai-xem')
                <li class="nav-item">
                    <a href="{{route('danhgia.trangchu')}}" class="nav-link">
                        <i class="fas fa-tasks"></i>
                        <p>
                            Quản lý đánh giá sản phẩm
                         </p>
                    </a>
                </li>
                @endcan



{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('san-pham.trangChu')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Khuyến mãi--}}
{{--                            <span class="right badge badge-danger">New</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('san-pham.trangChu')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Đơn hàng--}}
{{--                            <span class="right badge badge-danger">New</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('san-pham.trangChu')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Tài khoản--}}
{{--                            <span class="right badge badge-danger">New</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
