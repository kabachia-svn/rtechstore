<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Supplier::all();
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
            'supplier_id'=>'required',
            'name'=>'required',
        ]);

        $supplier = new Supplier([
            'supplier_id'=>$request->get('supplier_id'),
            'name'=>$request->get('name'),
        ]);

        $supplier->save();

        return response()->json($supplier,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Supplier::where('supplier_id',$id)->first();
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
            'supplier_id'=>'required',
            'name'=>'required',
        ]);
        $supplier = Supplier::where('supplier_id',$id)->first();
        $supplier->supplier_id = $request->get('supplier_id');
        $supplier->name = $request->get('name');
        $supplier->save();
        return response()->json($supplier,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Supplier::where('supplier_id',$id)->first()->delete();
      return response()->json(null,204);

    }
}
