<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Flat;
use App\Models\Backend\project;
use App\Models\Backend\Floor;

use Illuminate\Http\Request;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flat=Flat::all();
        return view('backend.flat.index',compact('flat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project=Project::get();
        $floor=Floor::get();
        return view('backend.flat.create', compact('project','floor',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $floor=new Floor();
            $floor->project_id=$request->project_id;
            $floor->floor_id=$request->floor_id;
            $floor->flatName=$request->flatName;
            $floor->total_square_ft=$request->total_square_ft;
            $floor->total_cost=$request->total_cost;
            $floor->sale_price=$request->sale_price;
            $floor->client_id=currentUserId();
            $floor->save();
            $this->notice::success('Flat data saved');
            return redirect()->route('flat.index');
           }
           catch(Exception $e){
            $this->notice::error('Please try again');
             dd($e);
            return redirect()->back()->withInput();
           }
    }

    /**
     * Display the specified resource.
     */
    public function show(Flat $flat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project=Project::get();
        $floor=Floor::get();
        $flat=Flat::findOrFail(encryptor('decrypt', $id));
        return view('backend.flat.create', compact('flat','project','floor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $flat=Flat::findOrFail(encryptor('decrypt', $id));
            $floor->project_id=$request->project_id;
            $floor->floor_id=$request->floor_id;
            $floor->flatName=$request->flatName;
            $floor->total_square_ft=$request->total_square_ft;
            $floor->total_cost=$request->total_cost;
            $floor->sale_price=$request->sale_price;
            $floor->client_id=currentUserId();
            $floor->save();
            $this->notice::success('Flat data saved');
            return redirect()->route('flat.index');
           }
           catch(Exception $e){
            $this->notice::error('Please try again');
             dd($e);
            return redirect()->back()->withInput();
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $flat=Flat::findOrFail(encryptor('decrypt',$id));
        if($flat->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
