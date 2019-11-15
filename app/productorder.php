<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productorder extends Model
{
    protected $table ='productorder'; // specify the table to be used 
    protected $fillable['order_id','product_id', 'quantity'];  // specify the fillable as an array
}
