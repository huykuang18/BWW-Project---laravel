@extends('master')
@section('title','Cửa hàng');
@section('content')
<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Cửa hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End-->
<!-- Latest Products Start -->
<section class="popular-items latest-padding">
    <div class="container">
        <div class="row product-btn justify-content-between mb-40">
            <div class="properties__button">
                <!--Nav Button  -->
                <nav>             
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($brand as $brand)
                        <a class="nav-item nav-link" id="nav-home-tab" href="{{asset('shop/brand/'.$brand->brand_id)}}" role="tab" aria-controls="nav-home" aria-selected="true"><img src="source/images/{{$brand->logo}}" alt=""></a>
                        @endforeach
                    </div>
                </nav>
                <!--End Nav Button  -->
            </div>
            <!-- Grid and List view -->
            <div class="grid-list-view">
            </div>
            <!-- Select items -->
            <div class="select-this">
                <form action="#">
                    <div class="select-itms">
                        <select name="select" id="select1">
                            <option value="">40 per page</option>
                            <option value="">50 per page</option>
                            <option value="">60 per page</option>
                            <option value="">70 per page</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>Trang này gồm {{count($products)}} sản phẩm</p>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <a href="{{asset('shop/product/'.$product->product_id)}}"><img src="source/images/{{$product->brand_id}}/{{$product->image}}" alt=""></a>
                                <div class="img-cap">
                                    <a href="{{url('cart/add/'.$product->product_id)}}"><span>Thêm vào giỏ</span></a>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="{{asset('shop/product/'.$product->product_id)}}">{{$product->product_name}}</a></h3>
                                @if($product->price_discount==0)
                                <span>{{number_format($product->price)}} vnđ</span>
                                @else
                                <span style="text-decoration: line-through;color: #ccc;">{{number_format($product->price)}} vnđ</span>
                                <span>{{number_format($product->price_discount)}} vnđ</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">{{$products->links()}}</div>
            </div>
        </div>
        <!-- End Nav Card -->
    </div>
</section>
<!-- Latest Products End -->
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