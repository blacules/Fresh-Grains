<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{	
	protected $fillable=[
		'user_id','order_f_name','order_l_name','order_email','order_phone_no','order_county',
		'order_constituency','order_estate','order_subtotal', 'order_delivery_fee','order_total',
		'order_payment_method','shipped',
	];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function product()
    {
    	return $this->belongsToMany('App\products')->withpivot('quantity'); // many to many relationship between orders and products table with a pivot table
    }
}
