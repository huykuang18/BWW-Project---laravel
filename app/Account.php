<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    public function order(){
		return $this->hasMany('App\Order','account_id','account_id');
	}
}
