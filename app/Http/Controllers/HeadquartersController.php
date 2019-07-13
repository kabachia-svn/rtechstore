<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Headquarters;
use App\Branch;

class HeadquartersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headquarters = Headquarters::all();
        return view('headquarters.index',compact('headquarters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('headquarters.create');
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
            'headquarters_id'=>'required',
            'name'=>'required',
        ]);

        $headquarters = new Headquarters([
            'headquarters_id'=>$request->get('headquarters_id'),
            'name'=>$request->get('name'),
        ]);

        $headquarters->save();
        return redirect('/headquarters')->with('success', 'Headquarter saved!');
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
        $headquarters = Headquarters::where('headquarters_id',$id)->first();
        return view('headquarters.edit', compact('headquarters'));
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
            'headquarters_id'=>'required',
            'name'=>'required',
        ]);


        $headquarters = Headquarters::where('headquarters_id',$id)->first();
        $headquarters->headquarters_id = $request->get('headquarters_id');
        $headquarters->name = $request->get('name');
        $headquarters->save();

        return redirect('/headquarters')->with('success','Headquarter updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $headquarters = Headquarters::where('headquarters_id',$id)->first();
        $headquarters->delete();

        return redirect('/headquarters')->with('success','Headquarter deleted!');
    }
}
