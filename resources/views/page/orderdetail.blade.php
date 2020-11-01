@extends('master')
@section('title','Chi tiết đơn hàng')
@section('content')
<?php
$total=0;
$quantity=0;
?>
<!-- Hero Area Start-->
<div class="slider-area ">
  <div class="single-slider slider-height2 d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="hero-cap text-center">
            <h2>Chi tiết đơn hàng</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================ confirmation part start =================-->
<section class="confirmation_part section_padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="confirmation_tittle">
          <span>Cảm ơn bạn đã mua hàng. Đơn hàng của bạn sẽ hoàn thành sớm.</span>
        </div>
      </div>
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>Thông tin đơn hàng</h4>
          <ul>
            <li>
              <p>Mã đơn hàng</p><span>: BWW0{{$order->order_id}}</span>
            </li>
            <li>
              <p>Thời gian đặt hàng</p><span>: {{$order->created_at}}</span>
            </li>
            <li>
              <p>Phương thức thanh toán:</p><span>: {{$order->payment_method->method_name}}</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>Thông tin khách hàng</h4>
          <ul>
            <li>
              <p>Họ tên</p><span>: {{$order->account->fullname}}</span>
            </li>
            <li>
              <p>Email</p><span>: {{$order->account->email}}</span>
            </li>
            <li>
              <p>Địa chỉ</p><span>: {{$order->account->address}}</span>
            </li>
            <li>
              <p>SĐT</p><span>: {{$order->account->mobile}}</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <ul>
            <li>
              <p>Đơn vị bán hàng</p><span>: BLACK WOLF WATCH</span>
            </li>
            <li>
              <p>Điện thoại</p><span>: 0394366374</span>
            </li>
            <li>
              <p>Số tài khoản:</p><span>: 0344458779451616</span>
            </li>
            <li>
              <p>Cơ sở HN:</p><span>: Tầng 5, số 55, ngõ 255, Cầu Giấy, Hà Nội </span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 col-lx-4">
        <div class="single_confirmation_details">
          <h4>Thông tin nhận hàng:</h4>
          <ul>
            <li>
              <p>Người nhận</p><span>: {{$order->buyer_name}}</span>
            </li>
            <li>
              <p>SĐT liên lạc</p><span>: {{$order->buyer_mobile}}</span>
            </li>
            <li>
              <p>Địa chỉ:</p><span>: {{$order->buyer_address}}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="order_details_iner">
          <h3>Hoá đơn</h3>
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col" colspan="2">Sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order_details as $order_detail)
              <tr>
                <th colspan="2"><img src="source/images/{{$order_detail->product->brand_id}}/{{$order_detail->product->image}}" alt="" width="50" height="50">
                  <span>{{$order_detail->product->product_name}}</span></th>
                  <th>0{{$order_detail->quantity}}</th>
                  <th> <span>{{number_format($order_detail->quantity*$order_detail->price)}}</span></th>
                </tr>
                <?php
                $quantity += $order_detail->quantity;
                $total += $order_detail->quantity*$order_detail->price;
                ?>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col" colspan="2">Tổng:</th>
                  <th scope="col">0{{$quantity}}</th>
                  <th scope="col">{{number_format($total)}}</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->
  @endsection