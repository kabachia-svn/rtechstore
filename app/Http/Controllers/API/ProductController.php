<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'name'=>'required',
            'supplier_id'=>'required',
            'order_id'=>'required',
        ]);

        $product = new Product([
            'product_id'=>$request->get('product_id'),
            'name'=>$request->get('name'),
            'supplier_id'=>$request->get('supplier_id'),
            'order_id'=>$request->get('order_id'),
        ]);
   
        $product->save();
        return response()->json($product,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::where('product_id',$id)->first();
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
        $request->validate([
            'product_id'=>'required',
            'name'=>'required',
            'supplier_id'=>'required',
            'order_id'=>'required',
        ]);

        $product = Product::where('product_id',$id)->first();
        $product->product_id = $request->get('product_id');
        $product->name = $request->get('name');
        $product->supplier_id = $request->get('supplier_id');
        $product->order_id = $request->get('order_id');
        $product->save();

        return response()->json($product,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Product::where('product_id',$id)->first()->delete();
      return response()->json(null,204);

    }
}
