<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Order;
use App\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        $suppliers = Supplier::all();
        return view('products.create',compact('orders','suppliers'));
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
        return redirect('/products')->with('success', 'Product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('product_id',$id)->first();
        $suppliers = Supplier::all();
        $orders = Order::all();
        return view('products.edit', compact('product','suppliers','orders'));
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

        return redirect('/products')->with('success','Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('product_id',$id)->first();
        $product->delete();

        return redirect('/products')->with('success','Product deleted!');
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('term');
        $result = Product::where('product_id', 'LIKE','%'.$search.'%')->get();
        return response()->json($result);
    }
}
