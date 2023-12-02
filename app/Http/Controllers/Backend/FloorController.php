<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Floor;
use App\Models\Backend\Project;
use Illuminate\Http\Request;
use Exception;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $floor=Floor::all();
       return view('backend.floor.index',compact('floor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project=Project::get();
        return view('backend.floor.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $floor=new Floor();
            $floor->project_id=$request->project_id;
            $floor->floorname=$request->floorname;
            $floor->total_square_ft=$request->total_square_ft;
            $floor->total_cost=$request->total_cost;
            $floor->total_budget=$request->total_budget;
            $floor->use_status=$request->use_status;
            $floor->save();
            $this->notice::success('Floor data saved');
            return redirect()->route('floor.index');
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
    public function show(Floor $floor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project=Project::get();
        $floor=Floor::findOrFail(encryptor('decrypt', $id));
        return view('backend.pm.edit',compact('floor','project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Floor $floor)
    {
        try{
            $floor=Floor::findOrFail(encryptor('decrypt', $id));
            $floor->project_id=$request->project_id;
            $floor->floorname=$request->floorname;
            $floor->total_square_ft=$request->total_square_ft;
            $floor->total_cost=$request->total_cost;
            $floor->total_budget=$request->total_budget;
            $floor->use_status=$request->use_status;
            $floor->save();
            $this->notice::success('Floor data saved');
            return redirect()->route('floor.index');
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
    public function destroy(Floor $floor)
    {
        $floor=Floor::findOrFail(encryptor('decrypt',$id));
        if($floor->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
