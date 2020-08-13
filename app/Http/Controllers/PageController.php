<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;

use Illuminate\Http\Request;

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
		return view('page.showProductBrand',compact('brand','product_type','brand_name'));
	}
	public function getAbout(){
		return view('page.about');
	}
	public function getContact(){
		return view('page.contact');
	}
	public function getLogin(){
		return view('page.login');
	}
	public function getCart(){
		return view('page.cart');
	}
	public function getRegister(){
		return view('page.register');
	}
	public function getCheckout(){
		return view('page.checkout');
	}
	public function getBlog(){
		return view('page.blog');
	}
}
