<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order';

	public function order_detail(){
		return $this->hasMany('\App\OrderDetail','order_id','order_id');
	}
	public function payment_method(){
		return $this->belongsTo('\App\PaymentMethod','payment_method_id','payment_method_id');
	}
	public function account(){
		return $this->belongsTo('\App\Account','account_id','account_id');
	}
}
