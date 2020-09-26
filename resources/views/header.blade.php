    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="source/assets/img/logo/logo.jpg" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="/">Trang chủ</a></li>
                                    <li><a href="{{asset('shop')}}">Cửa hàng</a></li>
                                    <li><a href="{{asset('about')}}">Giới thiệu</a></li>
                                    <li><a href="{{asset('blog')}}">Tin tức</a></li>
                                    <li><a href="{{asset('contact')}}">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>
                                <li><a href="{{asset('cart')}}"><span class="flaticon-shopping-cart"></span></a> </li>
                                @if(!session('user'))
                                <li> <a href="{{asset('login')}}"><span class="flaticon-user"></span></a></li>
                                @else
                                <li>
                                    <div class="dropdown">
                                        <a id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{asset('login')}}"><span class="flaticon-user">&nbsp;{{session('user')}}</span></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a href="{{asset('logout')}}" class="dropdown-item">Đăng xuất</a>
                                            <a href="{{asset('order/follow')}}" class="dropdown-item">Theo dõi đơn hàng</a>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>