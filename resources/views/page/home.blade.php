@extends('master')
@section('title','Trang chủ')
@section('content')
@if(session('alert'))
<script>
    alert("Hàng đã đặt thành công! Chúng tôi sẽ liên hệ qua sđt để giao hàng sớm nhất cho bạn");
    location = '/';
</script>
@endif
<!--? slider Area Start -->
<div class="slider-area ">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center slide-bg">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Lựa chọn cho phong cách riêng của bạn</h1>
                            <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Những xu hướng mới nhất luôn đi kèm với chất lượng sản phẩm thể hiện đẳng cấp và cá tính riêng của bạn.</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                <a href="{{asset('shop')}}" class="btn hero-btn">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                        <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                            <img src="source/assets/img/hero/watch.png" alt="" class=" heartbeat">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!--? Popular Items Start -->
<div class="popular-items section-padding30">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-70 text-center">
                    <h2>Sản phẩm mới</h2>
                    <p>Có {{count($new_product)}} sản phẩm</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($new_product as $new)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <div class="ribbon">

                        </div>
                        <a href="{{asset('product/'.$new->product_id)}}"><img src="source/images/{{$new->brand_id}}/{{$new->image}}" alt=""></a>
                        <div class="img-cap">
                            <a href="{{url('cart/add/'.$new->product_id)}}"><span>Thêm vào giỏ</span></a>
                        </div>
                        <div class="favorit-items">
                            <span class="flaticon-heart"></span>
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="{{asset('product/'.$new->product_id)}}">{{$new->product_name}}</a></h3>
                        @if($new->price_discount==0)
                        <span>{{number_format($new->price)}} vnđ</span>
                        @else
                        <span style="text-decoration: line-through;color: #ccc;">{{number_format($new->price)}} vnđ</span>
                        <span>{{number_format($new->price*(100-$new->price_discount)/100)}} vnđ</span>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <div class="row">{{$new_product->links()}}</div>
        <!-- Button -->
        <div class="row justify-content-center">
            <div class="room-btn pt-70">
                <a href="{{asset('shop')}}" class="btn view-btn1">Xem thêm</a>
            </div>
        </div>
    </div>
</div>
<!-- Popular Items End -->
<!--? Popular Items Start -->
<div class="popular-items section-padding30">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-70 text-center">
                    <h2>Đang giảm giá</h2>
                    <p>Có {{count($sale_product)}} sản phẩm</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($sale_product as $sale)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <div class="ribbon">

                        </div>
                        <img src="source/images/{{$sale->brand_id}}/{{$sale->image}}" alt="">
                        <div class="img-cap">
                            <a href="{{url('cart/add/'.$sale->product_id)}}"><span>Thêm vào giỏ</span></a>
                        </div>
                        <div class="favorit-items">
                            <span class="flaticon-heart"></span>
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="{{asset('shop/product/'.$sale->product_id)}}">{{$sale->product_name}}</a></h3>
                        <span style="text-decoration: line-through; color: #ccc;">{{number_format($sale->price)}} vnđ</span>
                        <span>{{number_format($sale->price*(100-$sale->price_discount)/100)}} vnđ</span>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <div class="row">{{$sale_product->links()}}</div>
        <!-- Button -->
        <div class="row justify-content-center">
            <div class="room-btn pt-70">
                <a href="{{asset('shop')}}" class="btn view-btn1">Xem thêm</a>
            </div>
        </div>
    </div>
</div>
<!-- Popular Items End -->
<!--? Gallery Area Start -->
<div class="gallery-area">
    <div class="container">
        <!-- Section tittle -->
        <div class="row">  
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="section-tittle mb-70">
                    <h2>Xu hướng thời trang</h2>
                </div>
            </div>
        </div>  
    </div>
    <div class="container-fluid p-0 fix">
        <div class="row">
            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img big-img" style="background-image: url(source/assets/img/gallery/gallery1.png);"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img big-img" style="background-image: url(source/assets/img/gallery/gallery2.png);"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url(source/assets/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12  col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url(source/assets/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Gallery Area End -->
<!--? Video Area Start -->
<div class="video-area mb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="video-wrap">
                    <div class="play-btn "><a class="popup-video" href="https://www.youtube.com/watch?v=QDFqsjoFFxo"><i class="fas fa-play"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Area End -->
<!--? Shop Method Start-->
<div class="shop-method-area">
    <div class="container">
        <div class="method-wrapper">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div> 
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Method End-->
@endsection