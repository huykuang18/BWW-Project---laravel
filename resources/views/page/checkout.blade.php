@extends('master')
@section('title','Thanh toán');
@section('content')
<?php
$products=DB::table('products')->whereIn('product_id',array_keys(session('cart')))->get();
$total=0;
?>
<!-- Hero Area Start-->
<form method="post" accept-charset="utf-8">
  @csrf
  <div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="hero-cap text-center">
              <h2>Thủ tục thanh toán</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
<!--     <div class="cupon_area">
      <div class="check_title">
        <h2>
          Have a coupon?
          <a href="#">Click here to enter your code</a>
        </h2>
      </div>
      <input type="text" placeholder="Enter coupon code" />
      <a class="tp_btn" href="#">Apply Coupon</a>
    </div> -->
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-8">
          <h3>Thông tin chi tiết</h3>
          <form class="row contact_form" action="#" method="post" novalidate="novalidate">
            @if(!session('user'))
            <div class="col-md-12 form-group p_star">
              <label>Họ tên:</label>
              <input type="text" class="form-control" id="last" name="name" />
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Số điện thoại:</label>
              <input type="text" class="form-control" id="number" name="number" />
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Email:</label>
              <input type="text" class="form-control" id="email" name="email" />
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Địa chỉ nhận:</label>
              <input type="text" class="form-control" id="address" name="address" />
            </div>
            @else
            <div class="col-md-12 form-group p_star">
              <label>Người nhận hàng:</label>
              <input type="text" class="form-control" id="last" name="name" value="{{$account->fullname}}" />
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Số điện thoại liên hệ:</label>
              <input type="text" class="form-control" id="number" name="number" value="{{$account->mobile}}"/>
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Email:</label>
              <input type="text" class="form-control" id="email" name="email" value="{{$account->email}}" disabled="true"/>
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Địa chỉ nhận:</label>
              <input type="text" class="form-control" id="address" name="address" value="{{$account->address}}"/>
            </div>
            @endif
<!--             <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="add2" name="add2" />
              <span class="placeholder" data-placeholder="Address line 02"></span>
            </div> -->
            <div class="col-md-12 form-group">
              <label>Ghi chú:</label>
              <textarea class="form-control" name="note" id="message" rows="3"></textarea>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="order_box">
            <h2>Đơn hàng</h2>
            <ul class="list">
              <li>
                <a href="#">Sản phẩm
                  <span>Thành tiền</span>
                </a>
              </li>
              @foreach($products as $product)
              <li>
                <a href="{{asset('shop/product/'.$product->product_id)}}">{{$product->product_name}}
                  <span class="middle">x {{session("cart.$product->product_id.number")}}</span>
                  @if($product->price_discount==0)
                  <span class="last">{{number_format($product->price*session("cart.$product->product_id.number"))}}</span>
                  @else
                  <span class="last">{{number_format($product->price_discount*session("cart.$product->product_id.number"))}}</span>
                  @endif
                </a>
              </li>
              <?php if ($product->price_discount==0) {
                $total = $total + $product->price*session("cart.$product->product_id.number");
              }else{
                $total = $total + $product->price_discount*session("cart.$product->product_id.number");
              }
              ?>
              @endforeach
            </ul>
            <ul class="list list_2">
              <li>
                <a href="#">Tổng tiền:
                  <span>{{number_format($total)}}</span>
                </a>
              </li>
            </ul>
            @foreach($payments as $payment)
            <div class="payment_item active">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="methodId" id="f-option" value="{{$payment->payment_method_id}}" checked>
                <label class="form-check-label" for="f-option">
                  {{$payment->method_name}}
                </label>
              </div>
            </div>
            @endforeach
            <div class="creat_account">
              <input type="checkbox" id="f-option4" name="selector" />
              <label for="f-option4">Tôi đã đọc và đồng ý với </label>
              <a href="#">mọi điều khoản*</a>
            </div>
            <button class="btn_3" type="submit">Hoàn tất</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Checkout Area =================-->
</form>

@endsection