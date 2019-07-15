<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;
use App\Order;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_details = OrderDetail::all();
        return view('orderdetails.index',compact('order_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        return view('orderdetails.create',compact('orders'));
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
            'order_detail_id'=>'required',
            'product_id'=>'required',
            'product_quantity'=>'required|numeric',
            'order_id'=>'required',
        ]);

        $order_detail = new OrderDetail([
            'order_detail_id'=>$request->get('order_detail_id'),
            'product_id'=>$request->get('product_id'),
            'product_quantity'=>$request->get('product_quantity'),
            'order_id'=>$request->get('order_id'),
        ]);


        $order_detail->save();
        return redirect('/orderdetails')->with('success', 'Order Detail saved!');
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
        $order_detail = OrderDetail::where('order_detail_id',$id)->first();
        $orders = Order::all();
        return view('orderdetails.edit', compact('order_detail','orders'));
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
            'order_detail_id'=>'required',
            'product_id'=>'required',
            'product_quantity'=>'required|numeric',
            'order_id'=>'required',
        ]);


        $order_detail = OrderDetail::where('order_detail_id',$id)->first();
        $order_detail->order_detail_id = $request->get('order_detail_id');
        $order_detail->product_id = $request->get('product_id');
        $order_detail->product_quantity = $request->get('product_quantity');
        $order_detail->order_id = $request->get('order_id');
        $order_detail->save();

        return redirect('/orderdetails')->with('success','Order Detail updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_detail = OrderDetail::where('order_detail_id',$id)->first();
        $order_detail->delete();

        return redirect('/orderdetails')->with('success','Order Detail deleted!');
    }
}
