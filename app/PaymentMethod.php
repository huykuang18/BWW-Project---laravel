<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
	protected $table = 'paymentmethods';
	public function order(){
		return $this->hasMany('\App\Order','payment_method_id','payment_method_id');
	}
}
