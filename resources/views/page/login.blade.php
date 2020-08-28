@extends('master')
@section('title','Đăng nhập')
@section('content')
<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Đăng nhập</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End-->
<!--================login_part Area =================-->
<section class="login_part section_padding ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Bạn mới ghé cửa hàng?</h2>
                        <p>Trở thành khách hàng thành viên của chúng tôi để nhận nhiều ưu đãi</p>
                        <a href="{{asset('register')}}" class="btn_3">Tạo tài khoản mới</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Chào mừng bạn ! <br>
                        Đăng nhập tài khoản nào</h3>
                        <form class="row contact_form" method="post">
                            @if(session('alert'))
                            <section class="alert alert-danger">{{session('alert')}}</section>
                            @endif
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="username" name="username" value=""
                                placeholder="Tài khoản" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                placeholder="Mật khẩu" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Nhớ mật khẩu</label>
                                </div>
                                <input type="submit" value="Đăng nhập" class="btn_3">
                                <a class="lost_pass" href="#">quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->
@endsection