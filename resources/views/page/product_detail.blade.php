@extends('master')
@section('title','Cửa hàng');
<style>
    .mySlides {display: none}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
  }

  /* Next & previous buttons */
  .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
  }

  /* Position the "next button" to the right */
  .next {
      right: 0;
      border-radius: 3px 0 0 3px;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
  }

  /* Caption text */
  .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color;
  }

  .active, .dot:hover {
      background-color: #717171;
  }

  /* Fading animation */
  .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1000000s;
      animation-name: fade;
      animation-duration: 1000000s;
  }

  @-webkit-keyframes fade {
      from {opacity: 1} 
      to {opacity: 1}
  }

  @keyframes fade {
      from {opacity: 1} 
      to {opacity: 1}
  }

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
      .prev, .next,.text {font-size: 11px}
  }
</style>
@section('content')
<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Chi tiết sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End-->
<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                      <img src="source/images/{{$product->brand_id}}/{{$product->view1}}" alt="" class="img-fluid">
                  </div>

                  <div class="mySlides fade">
                      <img src="source/images/{{$product->brand_id}}/{{$product->view2}}" alt="" class="img-fluid">
                  </div>

                  <div class="mySlides fade">
                      <img src="source/images/{{$product->brand_id}}/{{$product->image}}" alt="" class="img-fluid">
                  </div>

                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>

              </div>
              <br>

              <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span> 
                  <span class="dot" onclick="currentSlide(2)"></span> 
                  <span class="dot" onclick="currentSlide(3)"></span> 
              </div>
          </div>
          <div class="col-md-8 mt-sm-20">
            <h3 style="text-align: center;">{{$product->product_name}}</h3>
            <div class="row">
              <b>Giới thiệu:</b>
              <p>{{$product->desciption}}</p>
              </div>
            <div class="row">
              <b>Đơn giá: </b>&nbsp;&nbsp;&nbsp;
              @if($product->price_discount==0)
              <b style="color: red;">{{number_format($product->price)}} vnđ</b>
              @else
              <b style="color: red;">{{number_format($product->price_discount)}} vnđ</b>
              @endif
            </div>
            <div class="row">
              <b>Trạng thái: </b>&nbsp;&nbsp;&nbsp;
              @if($product->quantity==0)
              <b style="color: #ccc;">tạm thời hết hàng</b>
              @else
              <b style="color: blue;">còn hàng</b> <p>( {{$product->quantity}} sản phẩm )</p>
              @endif
            </div>
            @if($product->quantity==0)
            @else
            <div class="card_area" style="text-align: center;">
                <div class="add_to_cart">
                    <a href="{{url('cart/add/'.$product->product_id)}}" class="btn_3">Thêm vào giỏ</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
<!--================End Single Product Area =================-->
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
  }

  function currentSlide(n) {
      showSlides(slideIndex = n);
  }

  function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
          }
      </script>
      @endsection