<?php

namespace App\Http\Controllers;
use App\Products;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){

        if (request()->category){
                $products = products::with('categories')->whereHas('categories',function($query){
                    $query->where('slug', request()->category);
                })->get();

                $categories = Category::all();
            } else {


        $products = products::inRandomOrder()->take(5)->get();
        $categories = category::all();
        }

        return view('pages.home')->with([
            'products' => $products,
            'categories' => $categories,
        ]);
    }

     public function about(){
    	return view('pages.about');
    }

     public function shop(){
    	return view('pages.shop');
    }

     public function cart(){
    	return view('pages.cart');
    }

     public function checkout(){
    	return view('pages.checkout');
    }

     public function product(){
    	return view('pages.product')->with([
            'products' => $products,
            'mightalsolike' =>$mightalsolike, 
        ]);
    
    }


}
