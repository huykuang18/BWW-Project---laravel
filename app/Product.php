<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function brand(){
    	return $this->belongsTo('App\Brand','brand_id','brand_id');
    }

    public function order_detail(){
    	return $this->hasMany('App\OrderDetail','product_id','product_id');
    }
}
