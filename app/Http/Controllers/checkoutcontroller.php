<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use App\products;
use App\productorder;


use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

class checkoutcontroller extends Controller
{			

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

       
    	return view('pages.checkout');
    }

     protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = orders::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            
            'order_f_name' => $request->f_name,
            'order_l_name' => $request->l_name,
            'order_email' => $request->email,
            'order_phone_no' => $request->phone_no,
            'order_county' => $request->county,
            'order_constituency' => $request->constituency,
            'order_estate' => $request->estate,
           
            
            
            'order_subtotal' => getNumbers()->get('newSubtotal'),
            'order_delivery_fee' => getNumbers()->get('newdeliveryfee'),
            'order_total' => getNumbers()->get('newTotal'),
             'order_payment_method' =>$request->payment_method,
            'error' => $error,


        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            productorder::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    
    public function store(CheckoutRequest $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }

        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        $order = $this->addToOrdersTables($request, null);
         // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        }


        protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = products::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = products::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }

}
