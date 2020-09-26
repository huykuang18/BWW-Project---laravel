<!Doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | BWW</title>
    <base href="{{asset('')}}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="source/assets/img/favicon.jpg">

    <!-- CSS here -->
    <link rel="stylesheet" href="source/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="source/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="source/assets/css/flaticon.css">
    <link rel="stylesheet" href="source/assets/css/slicknav.css">
    <link rel="stylesheet" href="source/assets/css/animate.min.css">
    <link rel="stylesheet" href="source/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="source/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="source/assets/css/themify-icons.css">
    <link rel="stylesheet" href="source/assets/css/slick.css">
    <link rel="stylesheet" href="source/assets/css/nice-select.css">
    <link rel="stylesheet" href="source/assets/css/style.css">
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="source/assets/img/logo/logo.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('header')
    <main>
        @yield('content') 
    </main>
    @include('footer')
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form" method="get" action="{{url('shop/keyword/key')}}">
                <input type="text" id="search-input" name="keyword" placeholder="Nhập từ khóa.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="./source/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./source/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./source/assets/js/popper.min.js"></script>
    <script src="./source/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./source/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./source/assets/js/owl.carousel.min.js"></script>
    <script src="./source/assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./source/assets/js/wow.min.js"></script>
    <script src="./source/assets/js/animated.headline.js"></script>
    <script src="./source/assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./source/assets/js/jquery.scrollUp.min.js"></script>
    <script src="./source/assets/js/jquery.nice-select.min.js"></script>
    <script src="./source/assets/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="./source/assets/js/contact.js"></script>
    <script src="./source/assets/js/jquery.form.js"></script>
    <script src="./source/assets/js/jquery.validate.min.js"></script>
    <script src="./source/assets/js/mail-script.js"></script>
    <script src="./source/assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./source/assets/js/plugins.js"></script>
    <script src="./source/assets/js/main.js"></script>
    
</body>
</html>