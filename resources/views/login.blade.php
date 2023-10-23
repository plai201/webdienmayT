<?php $hideFooter = true; ?>
@extends('layouts.frontend')
@section('css')
    <link rel="stylesheet" href="{{asset('css/login/css.css')}}">
@endsection
@section('content')
<div class="main">
        <section class="section-login" id="main_login">
            <div class="container">
                <div id="ceNotification_nk"></div>
                <div class="login-wrapper">

                    <ul class="nav nav-tabs" id="navsTab" role="tablist">
                        <li class="nav-item" role="tab">
                            <a href="" class="nav-link" id="registerTab">Đăng ký</a>
                        </li>
                        <li class="nav-item" role="tab">
                            <a rel="nofollow" href=" " class="nav-link active" id="loginTab" >Đăng nhập</a>
                        </li>
                        <li class="nav-item hidden-nav-item">
                            <a rel="nofollow" href=" " class="nav-link" id="forgotTab">Quên mật khẩu</a>
                        </li>
                        <li class="nav-item hidden-nav-item">
                            <a rel="nofollow" href=" " class="nav-link" id="resetTab"  >Đặt mật khẩu mới</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="navsTabContent">
                        <div class="tab-pane"  id="login-tab" style="display: block;">
                            <div class="login-form" id="login_from">
                                <form id="form-login-with-password" class="login-width-password cm-ajax cm-processed-form" name="main_login_form" action="{{route('login.post')}}" method="post" >
                                    @csrf
                                    <div class="form-group emailInput">
                                        <input type="text" name="username" class="form-control" id="emailInput" placeholder="Email/Số điện thoại" autocomplete="username">
                                    </div>
                                    <div class="form-group position-relative passwordInput">
                                        <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Nhập mật khẩu" autocomplete="current-password">
                                        <div class="view-password-wrapper">
                                            <i class="fa fa-eye-slash hide-password active"></i>
                                            <i class="fa fa-eye show-password"></i>
                                        </div>
                                    </div>
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="form-sub-actions sublinklogin">
                                        <a href=" " data-tabpane="forgotPasswordTabContent">Quên mật khẩu?</a>
                                     </div>
                                    <div class="form-main-actions">
                                        <button type="submit" class="checkout_login login-button button login-width-password">
                                            Đăng nhập
                                        </button>
                                    </div>
                                </form>
{{--                                <form style="display: none;" id="formSendOtp" name="confirm_sms_form" action="" method="post" novalidate="novalidate" style="display: none;" class="cm-processed-form">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" name="phone_login" class="form-control phoneformSendOtp" id="phoneInput" placeholder="Số điện thoại"  >--}}
{{--                                    </div>--}}

{{--                                    <div class="form-sub-actions">--}}
{{--                                        <a href=" " class="link-login btn-login-sms" data-tabpane="loginTabContent">Đăng nhập bằng mật khẩu</a>--}}
{{--                                    </div>--}}
{{--                                    <p class="note-otp hidden" id="note_get_otp"></p>--}}
{{--                                    <div class="form-main-actions">--}}
{{--                                        <button id="get-otp" class="login-button button" type="submit">--}}
{{--                                            Lấy mã OTP--}}
{{--                                            <img src=" " width="15" height="20" alt="arrow-right">--}}
{{--                                        </button>--}}

{{--                                    </div>--}}
{{--                                </form>--}}
{{--                                <form style="display: none;" id="formConfirmEmail" name="confirm_sms_form" action="" method="post" style="display: none;" class="cm-processed-form">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="text" name="phone_login" class="form-control" id="phoneInput" placeholder="Số điện thoại"  >--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group email-confirm">--}}
{{--                                        <input type="text" name="confirm_email" class="form-control" id="emailInput" placeholder="Email xác nhận"  >--}}
{{--                                    </div>--}}
{{--                                    <div class="form-sub-actions">--}}
{{--                                        <a href=" " class="link-login btn-login-sms" data-tabpane="loginTabContent">Đăng nhập bằng mật khẩu</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-main-actions">--}}
{{--                                        <button id="get-otp" class="login-button button">--}}
{{--                                            Xác Nhận--}}
{{--                                            <img src=" " width="15" height="20" alt="arrow-right">--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                                <div style="display: none;" class="login-social-box">--}}
{{--                                    <input type="hidden" id="return_url_social" value=" ">--}}
{{--                                    <div class="other-login-method__wrapper">--}}
{{--                                        <div class="other-login-method">--}}
{{--                                            Hoặc--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <a href="javascript:void(0)" data-idp="facebook"   class="checkout_login nk-text-facebook facebook-link cm-login-provider login-social button login-fb">--}}
{{--                                        <img src=" " width="30" height="30" alt="icon-fb">--}}
{{--                                        Đăng nhập bằng facebook--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:void(0)" data-idp="facebook"   class="checkout_login nk-text-facebook facebook-link cm-login-provider login-social button login-fb">--}}
{{--                                        <img src=" " width="30" height="30" alt="icon-fb">--}}
{{--                                        Đăng nhập bằng google--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <!--login_from-->--}}
                            </div>
                        </div>
{{--                        //dang khi--}}
                        <div class="tab-pane"   data-tabpane="registerTabContent" role="tabpanel" aria-labelledby="register-tab">
                            <div class="register-form" id="register-form" style="display: none!important;">
                                <form id="register-form-validate" action="{{route('user.them-user-khach')}}" method="post" name="registry_form" class="cm-ajax cm-ajax-full-render cm-processed-form"  >
                                    @csrf
{{--                                    <input type="hidden" name="dispatch" value="profiles.update">--}}
{{--                                    <input type="hidden" name="result_ids" value="register-form">--}}
{{--                                    <input type="hidden" name="redirect_url" value=" ">--}}
{{--                                    <input type="hidden" name="src" value="dang-ky-tai-khoan-destop">--}}
{{--                                    <input type="submit" name="create_account" style="display: none">--}}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="hovaten" id="reg-fullName" placeholder="Họ và Tên" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="sodienthoai" class="form-control" id="reg-phone" placeholder="Số điện thoại" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="reg-email" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group position-relative">
                                        <input type="password" class="form-control input-password" name="password" id="reg-password" autocomplete="off" placeholder="Mật khẩu">
                                        <div class="view-password-wrapper">
                                            <i class="fa fa-eye-slash hide-password active"></i>
                                            <i class="fa fa-eye show-password"></i>
                                        </div>
                                    </div>
                                    <div class="form-group position-relative">
                                        <input type="password" class="form-control input-password-repeat" name="password_confirmation" autocomplete="off" id="reg-password-repeat" placeholder="Nhập lại mật khẩu">
                                        <div class="view-password-wrapper">
                                            <i class="fa fa-eye-slash hide-password active"></i>
                                            <i class="fa fa-eye show-password"></i>
                                        </div>
                                    </div>

                                    <div class="form-main-actions">
                                        <button class="checkout_register reg-button button" type="submit">
                                            Đăng ký
                                        </button>
                                    </div>
                                </form>
                                <!--register-form--></div>
                        </div>
{{--                        <div class="tab-pane" style="display: none;" data-tabpane="forgotPasswordTabContent" role="tabpanel" aria-labelledby="forgot-password-tab">--}}
{{--                            <div class="forgot-password-form">--}}
{{--                                <form class="cm-ajax cm-ajax-full-render cm-processed-form" id="formForgetPassword" name="recoverfrm" action=" " method="post" novalidate="novalidate">--}}
{{--                                    <h2 class="form-header">Quên mật khẩu</h2>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input type="email" class="form-control" name="user_email" id="forgot-email" placeholder="Email">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-main-actions">--}}
{{--                                        <a href="javascript:void(0)" class="login-now forget-password-login" data-tabpane="loginTabContent">Trở lại đăng nhập</a>--}}
{{--                                        <button class="forget-password-button button" type="submit">--}}
{{--                                            Gửi--}}
{{--                                            <img src=" " width="15" height="20" alt="arrow-right">--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" style="display: none;" data-tabpane="resetPasswordTabContent" role="tabpanel" aria-labelledby="reset-password-tab">--}}
{{--                            <div class="reset-password-form">--}}
{{--                                <form class="cm-processed-form">--}}
{{--                                    <h2 class="form-header"> Đặt lại mật khẩu</h2>--}}
{{--                                    <div class="form-group position-relative">--}}
{{--                                        <input type="password" class="form-control input-password" id="reset-password" required="" minlength="8"  placeholder="Mật khẩu">--}}
{{--                                        <div class="view-password-wrapper">--}}
{{--                                            <i class="fa fa-eye-slash hide-password active"></i>--}}
{{--                                            <i class="fa fa-eye show-password"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group position-relative">--}}
{{--                                        <input type="password" class="form-control input-password-repeat" id="reset-password-repeat" required="" minlength="8"  placeholder="Nhập lại mật khẩu">--}}
{{--                                        <div class="view-password-wrapper">--}}
{{--                                            <i class="fa fa-eye-slash hide-password active"></i>--}}
{{--                                            <i class="fa fa-eye show-password"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-main-actions">--}}
{{--                                        <button class="reset-password-button button" type="submit">--}}
{{--                                            Gửi--}}
{{--                                            <img src=" " width="15" height="20" alt="arrow-right">--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection
@section('js')
    <script src="{{asset('css/login/js.js')}}"></script>
    <script src="{{asset('vendors/thongbao/jquery-3.6.0.js')}}"></script>
    <script>
        $(document).ready(function (){
             $('.view-password-wrapper').on('click', function(){
                 var passwordInput = $('#passwordInput');
                 if (passwordInput.attr('type') === 'password') {
                     passwordInput.attr('type', ' ');
                    $('.hide-password').show();
                     $('.show-password').hide();
                } else {
                     passwordInput.attr('type', 'password');
                    $('.show-password').show();
                     $('.hide-password').hide();

                 }
            });
        })
    </script>
@endsection
