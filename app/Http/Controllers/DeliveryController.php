<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
use App\Supplier;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return view('deliveries.index',compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('deliveries.create',compact('suppliers'));
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
            'delivery_id'=>'required',
            'delivery_date'=>'required',
            'supplier_id'=>'required',
        ]);

        $delivery = new Delivery([
            'delivery_id'=>$request->get('delivery_id'),
            'delivery_date'=>$request->get('delivery_date'),
            'supplier_id'=>$request->get('supplier_id'),
        ]);


        $product->save();
        return redirect('/deliveries')->with('success', 'Delivery saved!');
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
        $delivery = Delivery::where('delivery_id',$id)->first();
        $suppliers = Supplier::all();
        return view('deliveries.edit', compact('delivery','suppliers'));
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
            'delivery_id'=>'required',
            'delivery_date'=>'required',
            'supplier_id'=>'required',
        ]);


        $delivery = Delivery::where('delivery_id',$id)->first();
        $delivery->delivery_id = $request->get('delivery_id');
        $delivery->delivery_date = $request->get('delivery_date');
        $delivery->supplier_id = $request->get('supplier_id');
        $delivery->save();

        return redirect('/deliveries')->with('success','Delivery updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delivery = Delivery::where('delivery_id',$id)->first();
        $order_detail_delivery = OrderDetailDelivery::where('delivery_id',$id)->first();
        $delivery->delete();
        $order_detail_delivery->delete();

        return redirect('/deliveries')->with('success','Delivery deleted!');
    }
}
