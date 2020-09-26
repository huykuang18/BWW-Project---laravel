@extends('master')
@section('title','Theo dõi đơn hàng');
@section('content')
@if(session('alert'))
<script>
	alert("Hàng đã đặt thành công! Chúng tôi sẽ giao hàng sớm nhất cho bạn");
	location = '/order/follow';
</script>
@endif
<div class="slider-area ">
	<div class="single-slider slider-height2 d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="hero-cap text-center">
						<h2>Theo dõi đơn hàng</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@if($count==0)
<section class="alert alert-danger">Chưa có đơn hàng nào</section>
@else
<div class="container">
	<table class="table table-bordered table-striped mb-0">
	<tr>
		<th>Mã đơn hàng</th>		
		<th>Thời gian đặt hàng</th>
		<th>Phương thức thanh toán</th>
		<th>Trạng thái đơn hàng</th>
		<th>Thao tác</th>
	</tr>
	@foreach($orders as $order)

	<tr>
		<th>{{$order->order_id}}</th>
		<td>{{$order->created_at}}</td>
		<td>{{$order->payment_method->method_name}}</td>
		<td>
			@if($order->status==1)
			Chưa xử lý
			@elseif($order->status==2)
			Đã đóng gói
			@elseif($order->status==3)
			Đang vận chuyển
			@elseif($order->status==4)
			Đã giao hàng thành công
			@endif
		</td>
		<td>
			<a class="btn btn_3 btn-outline-info" href="{{asset('order/detail/'.$order->order_id)}}">Xem</a>
			@if($order->status==1)
			<a href="{{asset('/order/delete/'.$order->order_id)}}" onclick="return confirm('Hiện tại đơn hàng này chưa được xử lý, Bạn chắc chắn muốn hủy?')" class="btn btn_1 btn-danger">Hủy</a>
			@else		
			@endif
		</td>
	</tr>
	@endforeach
</table>
</div>

@endif
@endsection