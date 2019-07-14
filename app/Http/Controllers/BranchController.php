<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Headquarters;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headquarters = Headquarters::all();
        return view('branches.create',compact('headquarters'));
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
            'branch_id'=>'required',
            'name'=>'required',
            'headquarters_id'=>'required',
        ]);

        $branch = new Branch([
            'branch_id'=>$request->get('branch_id'),
            'name'=>$request->get('name'),
            'headquarters_id'=>$request->get('headquarters_id'),
        ]);
        
   
        $branch->save();
        return redirect('/branches')->with('success', 'Branch saved!');
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
        $branch = Branch::where('branch_id',$id)->first();
        $headquarters = Headquarters::all();
        return view('branches.edit', compact('branch','headquarters'));
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
            'branch_id'=>'required',
            'name'=>'required',
            'headquarters_id'=>'required',
        ]);
        

        $branch = Branch::where('branch_id',$id)->first();
        $branch->branch_id = $request->get('branch_id');
        $branch->name = $request->get('name');
        $branch->headquarters_id = $request->get('headquarters_id');
        $branch->save();

        return redirect('/branches')->with('success','Branch updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::where('branch_id',$id)->first();
        $branch->delete();

        return redirect('/branches')->with('success','Branch deleted!');
    }
}
