<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{	protected $table ='category';
    public function product()
    {

    	return $this->belongsToMany('App\products');
    }
}
