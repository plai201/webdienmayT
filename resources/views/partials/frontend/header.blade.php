<header>
    <div class="header max-width">
        <div class="header-left">
            <a href="{{route('trang-chu')}}">
                <div class="logo">
                    <h1>LOGO</h1>
                </div>
            </a>

        </div>
        <div class="header-right">
            <div class="header-right-search">
                <div>
                    <div>
                        <form class="form-inline "  autocomplete="off">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text"  name="key" id="keywords" placeholder="Bạn cần tìm gì hôm nay ?">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </form>
                    </div>
                    <div class="search_content">
                        <div id="search_ajax" class=" position-absolute translate-middle"></div>
                    </div>
                </div>
            </div>
            <nav class="header-right-menu">
                <ul class="menu-nav">
                    <li>
                        <a href="{{route('gio-hang')}}">
                            <div class="menu-icon">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="mount">{{count((array)session('giohang'))}}</span>
                            </div>
                            <div class="menu-text">Giỏ hàng</div>
                        </a>

                    </li>
                    @php
                        if (Auth::check()) {

                        $user = Auth::user();
                        $userName = $user->name;
                    }
                    @endphp
                    @if (Auth::check())
                        <li>
                            <a href="{{route('trang-ca-nhan')}}">
                                <div class="menu-icon">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                </div>
                                <div class="menu-text">Xin chào,<br> {{$userName }}</div>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('login')}}">
                                <div class="menu-icon">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                </div>
                                <div class="menu-text">Tài khoản</div>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="">
                            <div class="menu-icon">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                            </div>
                            <div class="menu-text">Liên hệ</div>
                        </a>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<section class="danh-muc-header max-width">
    <div class="danh-muc">
        <div class="danh-muc-left">
            <h3>
                <i class="fa fa-bars" aria-hidden="true"></i>
                <b>Danh mục sản phẩm</b>
            </h3>
            <nav>

            </nav>
        </div>
        <div class="danh-muc-right">
            <div class="danh-muc-menu-header">
                <div class="danh-muc-menu">
                    @foreach($danhmuc as $dm)
                        <div class="danh-muc-item">
                            <a href="{{route('danh-muc-view',['MaDanhMuc'=>$dm->MaDanhMuc])}}">
                                <img src="{{$dm->AnhDanhMuc}}" alt="{{$dm->TenAnh}}">
                                {{$dm->TenDanhMuc}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
