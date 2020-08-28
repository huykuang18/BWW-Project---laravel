<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
use App\Product;
use App\Brand;
use App\Cart;
use App\PaymentMethod;
use App\Account;
use App\Order;
use App\OrderDetail;
use Session;

class PageController extends Controller
{
	public function getIndex(){
		$new_product = Product::Where('new',1)->paginate(6);
		$sale_product = Product::Where('price_discount','<>',0)->paginate(9);
		return view('page.home',compact('new_product','sale_product'));
	}

	public function getShop(){
		$brand = Brand::Where('status',1)->get();
		$products = Product::Where('status',1)->paginate(12);
		return view('page.shop',compact('brand','products'));
	}

	public function getShop_brand($id){
		$brand = Brand::Where('status',1)->get();
		$product_type = Product::Where('brand_id',$id)->paginate(9);
		$brand_name = Brand::Where('brand_id',$id)->first();
		return view('page.show_product_brand',compact('brand','product_type','brand_name'));
	}

	public function getProductDetail($id){
		$product = Product::Where('product_id',$id)->first();
		return view('page.product_detail',compact('product'));
	}

	public function getAbout(){
		return view('page.about');
	}

	public function getContact(){
		return view('page.contact');
	}

	/* -- Cart --*/
	public function cart($action=null,$id=null,Request $request){
		switch ($action) {
			// case 'order':
			// if (session('user')):
			// 	return redirect('order');
			// else:
			// 	return redirect('login');
			// endif;
			// break;

			case 'update':
			foreach (array_keys(session('cart')) as $key) {
				session([
					"cart.$key.number"=>$request->input($key."number")
				]);
			}
			return redirect("cart");
			break;

			case 'add':
			if (session("cart.$id.number")){
				session(["cart.$id.number"=>session("cart.$id.number")+1]);
			}else{
				session(["cart.$id.number"=>1]);
			}
			return redirect("cart");
			break;

			case 'delete':
			session()->forget("cart.$id");
			return redirect('cart');
			break;
			case 'deleteall':
			session()->forget("cart");
			return redirect('cart');
			break;
			default:
			return view('page.cart');
			break;
		} 
	}
	/*-- end cart --*/

	/*-- Checkout --*/
	public function getCheckout(){
		$account = Account::where('user_name',session('user'))->first();
		$payments = PaymentMethod::Where('status',1)->get();
		return view('page.checkout',compact('payments','account'));
	}

	public function postOrder(Request $request)
	{
		if (session('user')):
			$account = Account::where('user_name',session('user'))->first();
			$account_id=$account->account_id;
			$method_id=$request->methodId;
			$name=$request->name;
			$number=$request->number;
			$address=$request->address;
			$note=$request->note;
			Order::insert([
				'account_id'=>$account_id,
				'buyer_mobile'=>$number,
				'buyer_name'=>$name,
				'buyer_address'=>$address,
				'payment_method_id'=>$method_id,
				'note'=>$note
			]);
			$order = Order::orderBy('order_id','desc')->first();
			$order_id = $order->order_id;
			foreach (array_keys(session('cart')) as $product_id):
				$quantity = session("cart.$product_id.number");
				$price = Product::where('product_id',$product_id)->first()->price;
				OrderDetail::insert([
					'order_id'=>$order_id,
					'product_id'=>$product_id,
					'quantity'=>$quantity,
					'price'=>$price
				]);
			endforeach;
		else:
			$method_id=$request->methodId;
			$name=$request->name;
			$number=$request->number;
			$address=$request->address;
			$note=$request->note;
			Order::insert([
				'buyer_mobile'=>$number,
				'buyer_name'=>$name,
				'buyer_address'=>$address,
				'payment_method_id'=>$method_id,
				'note'=>$note
			]);
			$order = Order::orderBy('order_id','desc')->first();
			$order_id = $order->order_id;
			foreach (array_keys(session('cart')) as $product_id):
				$quantity = session("cart.$product_id.number");
				$price = Product::where('product_id',$product_id)->first()->price;
				OrderDetail::insert([
					'order_id'=>$order_id,
					'product_id'=>$product_id,
					'quantity'=>$quantity,
					'price'=>$price
				]);
			endforeach;
		endif;
		session()->forget("cart");
		return redirect('/')->with('alert','success');

	}

	public function followOrder(){
		$account = Account::where('user_name',session('user'))->first();
		$account_id=$account->account_id;
		$orders=Order::where('account_id',$account_id)->get();
		$count=Order::where('$account_id',$account_id)->count();
		return view('page.follow',compact('orders','count'));
	}

	public function orderDetail($id){
		$account = Account::where('user_name',session('user'))->first();
		$account_id=$account->account_id;
		$order=Order::where('$account_id',$account_id)->where('order_id',$id)->first();
		$order_details=OrderDetail::where('order_id',$id)->get();
		return view('page.orderDetail',compact('order','order_details'));
	}

	/*-- end Checkout --*/

	/*-- Account --*/
	public function getLogin(){
		return view('page.login');
	}

	public function getLogout()
	{
		session()->forget('user');
		session()->forget('cart');
		return redirect('/');
	}

	public function postLogin(Request $request)
	{
		$username=$request->username;
		$password=md5($request->password);
		$result=Account::where('user_name',$username)->where('password',$password)->first();
		if ($result==null) {
			$alert='Sai tên đăng nhập hoặc mật khẩu!';
			return redirect()->back()->with('alert',$alert);
		}else{
			session(['user'=>$username]);
			return redirect('/');
		}
	}

	public function getRegister(){
		return view('page.register');
	}

	public function postRegister(Request $request)
	{
		$username=$request->input('username');
		$result=DB::table('accounts')->where('user_name',$username)->first();
		if ($result!=null) {
			$alert='Tên người dùng đã tồn tại.Vui lòng thử 1 tên khác';
			return redirect()->back()->with('alert',$alert);
		}else{
			$password=md5($request->input('password'));
			$fullName=$request->input('name');
			$mobile=$request->input('number');
			$email=$request->input('email');
			$address=$request->input('address');
			Account::insert([
				'user_name'=>$username,
				'password'=>$password,
				'fullname'=>$fullName,
				'mobile'=>$mobile,
				'email'=>$email,
				'address'=>$address
			]);
			return redirect('login');
		}
	}
	/*-- end Account --*/

	public function getBlog(){
		return view('page.blog');
	}
}
