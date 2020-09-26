<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
	protected $table = 'payment_methods';
	public function order(){
		return $this->hasMany('\App\Order','payment_method_id','payment_method_id');
	}
}
