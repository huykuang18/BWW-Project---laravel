<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between" style="border: #ccc thin solid">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="/"><img src="source/assets/img/logo/logo_footer.jpg" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Chất lượng thể hiện đẳng cấp, luôn đồng hành cùng bạn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Đường dẫn</h4>
                            <ul>
                                <li><a href="{{asset('about')}}">Giới thiệu</a></li>
                                <li><a href="{{asset('blog')}}">Tin tức</a></li>
                                <li><a href="{{asset('contact')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Thương hiệu đồng hành</h4>
                            <ul>
                                <li><a href="{{asset('shop/brand/1')}}">Aries Gold</a></li>
                                <li><a href="{{asset('shop/brand/2')}}">Epos Swiss</a></li>
                                <li><a href="{{asset('shop/brand/3')}}">Philippe Auguste
                                </a></li>
                                <li><a href="{{asset('shop/brand/4')}}">Atlatic</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Hỗ trợ</h4>
                            <ul>
                                <li><a href="#">Giải đáp thắc mắc</a></li>
                                <li><a href="#">Điều khoản & điều kiện</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Cách thức thanh toán</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-8 col-md-7">
                </div>
                <div class="col-xl-5 col-lg-4 col-md-5">
                    <div class="footer-copy-right f-right">
                        <!-- social -->
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/Black-Wolf-Watch-104245878113038"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v8.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
attribution=setup_tool
page_id="104245878113038"
theme_color="#124526"
logged_in_greeting="Chào bạn! Chúng tôi có thể giúp đỡ gì cho bạn?"
logged_out_greeting="Chào bạn! Chúng tôi có thể giúp đỡ gì cho bạn?">
</div>