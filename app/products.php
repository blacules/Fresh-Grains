<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class products extends Model implements Searchable
{
    public function categories()
    {
    	return $this->belongsToMany('App\category');
    }

         public function getSearchResult(): SearchResult
     {
        $url = route('shop.show', $this->slug);
     
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
         );
     }
}
