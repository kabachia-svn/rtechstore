<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Headquarters;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headquarters = Headquarters::all();
        return view('orders.create',compact('headquarters'));
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
        return redirect('/orders')->with('success', 'Order saved!');
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
        $order = Order::where('order_id',$id)->first();
        $headquarters = Headquarters::all();
        return view('orders.edit', compact('order','headquarters'));
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

        return redirect('/orders')->with('success','Order updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('order_id',$id)->first();
        $order->delete();

        return redirect('/orders')->with('success','Order deleted!');
    }
}
