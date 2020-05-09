<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories',function($query){
                $query->where('slug',request()->categorie);
            })->orderBy('created_at','DESC')->paginate(6);
        }else{
            $products = Product::with('categories')->orderBy('created_at','DESC')->paginate(6);
        }


        return view('Products.index', compact('products'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $product = Product::where('slug', $slug)->firstOrFail();

        $stock = $product->stock ===0 ? 'Indisponible' : 'Disponible';

        return view('Products.show',[
            'product' =>$product,
            'stock' =>$stock
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

    public function search()
    {

        request()->validate([
            'search'=>'required|min:3'
        ]);

       $search = request()->input('search');

       $products = Product::where('title','like',"%$search%")
                ->orWhere('description','like',"%$search%")
                ->paginate(6);

        return view('Products\search')->with('products',$products);
    }
}
