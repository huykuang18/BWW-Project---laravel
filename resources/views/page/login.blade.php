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
            <div id="status"></div>

            <a href="http://bwwshop.cc:88/javascript:void(0);" onclick=”fbLogin()” id="fbLink"><img src=”fblogin.png”/></a>

            <div id=”userData”></div>
        </div>
    </div>
</section>

<script>
    window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '359232718636871', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
  });
    
    // Check whether the user already logged in
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    });
};
// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData();
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}
// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
        function (response) {
            document.getElementById('fbLink').setAttribute("onclick","fbLogout()");
            document.getElementById('fbLink').innerHTML = 'Logout from Facebook';
            document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.first_name + '!';
            document.getElementById('userData').innerHTML = '<p><b>FB ID:</b> '+response.id+'</p><p><b>Name:</b> '+response.first_name+' '+response.last_name+'</p><p><b>Email:</b> '+response.email+'</p><p><b>Gender:</b> '+response.gender+'</p><p><b>Locale:</b> '+response.locale+'</p><p><b>Picture:</b> <img src="'+response.picture.data.url+'"/></p><p><b>FB Profile:</b> <a target="_blank" href="'+response.link+'">click to view profile</a></p>';
        });
}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
        document.getElementById('fbLink').setAttribute("onclick","fbLogin()");
        document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
        document.getElementById('userData').innerHTML = '';
        document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
    });
}
</script>
<!--================login_part end =================-->
@endsection