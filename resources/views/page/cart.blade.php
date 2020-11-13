@extends('master')
@section('title','Giỏ hàng')
@section('content')
@if(session('cart'))
<?php
$products=DB::table('product')->whereIn('product_id',array_keys(session('cart')))->get();
$total=0;
?>
<!-- Hero Area Start-->
<div class="slider-area ">
  <div class="single-slider slider-height2 d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="hero-cap text-center">
            <h2>Giỏ hàng</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================Cart Area =================-->
<form method="post" action="{{url('cart/update')}}" id="formCart">
  @csrf
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <a href="{{asset('product/'.$product->product_id)}}"><img src="source/images/{{$product->brand_id}}/{{$product->image}}" alt="" /></a>
                    </div>
                    <div class="media-body">
                      <a href="{{asset('product/'.$product->product_id)}}">
                      <p>{{$product->product_name}}</p></a>
                    </div>
                  </div>
                </td>
                <td>
                  @if($product->price_discount==0)
                  <h5>{{number_format($product->price)}}</h5>
                  @else
                  <h5>{{number_format($product->price*(100-$product->price_discount)/100)}}</h5>
                  @endif
                </td>
                <td>
                  <div class="product_count">
                    <input autocomplete="on" min="1" class="form-control form-control-sm" type="number" name="{{$product->product_id}}number" value='{{session("cart.$product->product_id.number")}}'>
                  </div>
                </td>
                <td>
                  @if($product->price_discount==0)
                  <h5>{{number_format($product->price*session("cart.$product->product_id.number"))}}</h5>
                  @else
                  <h5>{{number_format(($product->price*(100-$product->price_discount)/100)*session("cart.$product->product_id.number"))}}</h5>
                  @endif
                </td>
                <td>
                  <a href="{{url('cart/delete/'.$product->product_id)}}"><img src="source/assets/img/delete.png" alt="xóa" width="30" height="30"></a>
                </td>
              </tr>
              {{-- {{$product->product_id.'=>'.session("cart.$product->product_id.number")}} --}}
              <?php if ($product->price_discount==0) {
                $total = $total + $product->price*session("cart.$product->product_id.number");
              }else{
                $total = $total + ($product->price*(100-$product->price_discount)/100)*session("cart.$product->product_id.number");
              }
              ?>
              @endforeach
              <tr class="bottom_button">
                <td>
                  <input class="btn_1" type="submit" value="Cập nhật giỏ hàng">
                  <a onclick="return confirm('Bạn muốn xóa giỏ hàng chứ?')" href="{{url('cart/deleteall')}}" class="btn_1">Xóa tất cả</a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Tổng tiền</h5>
                </td>
                <td>
                  <h5>{{number_format($total)}}</h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{asset('shop')}}">Tiếp tục mua hàng</a>
            <a class="btn_1 checkout_btn_1" href="{{asset('checkout')}}">Đi đến thanh toán</a>
          </div>
        </div>
      </div>
    </section>
  </form>

  <!--================End Cart Area =================-->
  @else
  <section class="alert alert-danger" style="text-align: center; margin:10%;">Giỏ hàng trống</section>
  @endif
  @endsection