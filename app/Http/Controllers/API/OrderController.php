<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
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
            'order_id'=>'required',
            'order_date'=>'required',
            'headquarters_id'=>'required',
        ]);

        $order = new Order([
            'order_id'=>$request->get('order_id'),
            'order_date'=>$request->get('order_date'),
            'headquarters_id'=>$request->get('headquarters_id'),
        ]);
        $order->save();
        return response()->json($order,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::where('order_id',$id)->first();
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
            'order_id'=>'required',
            'order_date'=>'required',
            'headquarters_id'=>'required',
        ]);
        $order = Order::where('order_id',$id)->first();
        $order->order_id = $request->get('order_id');
        $order->order_date = $request->get('order_date');
        $order->headquarters_id = $request->get('headquarters_id');
        $order->save();
        return response()->json($order,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Order::where('order_id',$id)->first()->delete();
      return response()->json(null,204);

    }
}
