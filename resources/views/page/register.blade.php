@extends('master')
@section('title','Đăng ký')
@section('content')
<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Đăng ký tài khoản</h2>
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
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Chào mưng bạn ! <br>
                        Vui lòng điền đầy đủ thông tin</h3>
                        <form class="row contact_form" method="post">
                            @if(session('alert'))
                            <section class="alert alert-danger">{{session('alert')}}</section>
                            @endif
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <label>Tên đăng nhập:</label>
                                <input type="text" class="form-control" id="username" name="username" required />
                            </div>
                            <div class="col-md-12 form-group p_star">
                              <label>Mật khẩu:</label>
                              <input min="6" type="password" class="form-control" id="password" name="password" required >
                          </div>
                          <div class="col-md-12 form-group p_star">
                              <label>Họ tên:</label>
                              <input type="text" class="form-control" id="last" name="name" required >
                          </div>
                          <div class="col-md-12 form-group p_star">
                              <label>Số điện thoại:</label>
                              <input type="text" class="form-control" id="number" name="number" required >
                          </div>
                          <div class="col-md-12 form-group p_star">
                              <label>Email:</label>
                              <input type="text" class="form-control" id="email" name="email" required >
                          </div>
                          <div class="col-md-12 form-group p_star">
                              <label>Địa chỉ:</label>
                              <input type="text" class="form-control" id="address" name="address" required >
                          </div>
                          <div class="col-md-12 form-group">
                            <div class="creat_account d-flex align-items-center">
                                <input type="submit" value="Đăng ký" class="btn_3">
                                <input type="reset" value="Nhập lại" class="btn_3">
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