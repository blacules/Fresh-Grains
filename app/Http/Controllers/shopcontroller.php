<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;
use App\Category;


class shopcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            if (request()->category){
                $products = products::with('categories')->whereHas('categories',function($query){
                    $query->where('slug', request()->category);
                })->get();

                $categories = Category::all();
            } else {


        $products = products::inRandomOrder()->take(5);
        $categories = category::all();
        }

        return view('pages.shop')->with([
            'products' => $products,
            'categories' => $categories,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function search(Request $request)
    {
       
        $results = (new Search())
    ->registerModel(products::class, ['name', 'description', 'price'])
    ->search($request->input('query'));

    return view('pages.search')->with($resul);
    
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $products = products::where('slug', $slug)->firstorfail();
         $mightalsolike = products::where('slug','!=', $slug)->inRandomOrder()->take(4)->get();

        return view('pages.product')->with([
        	'products' => $products,
        	'mightalsolike' =>$mightalsolike, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
