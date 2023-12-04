<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Floor_material;
use App\Http\Requests\Backend\project\AddPMRequest; 
use App\Http\Requests\Backend\project\UpdatePMRequest; 
use App\Models\Backend\Project;
use App\Models\Backend\Material;
use Illuminate\Http\Request;
use Exception;

class FloorMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $pmaterial=Floor_material::all();
       return view('backend.pm.index',compact('pmaterial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project=Project::get();
        $material=Material::get();
        return view('backend.pm.create', compact('project','material'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPMRequest $request)
    {
       try{
        $pmaterial=new Floor_material();
        $pmaterial->project_id=$request->project_id;
        $pmaterial->material_id=$request->material_id;
        $pmaterial->quantity=$request->quantity;
        $pmaterial->issued_by=$request->issued_by;
        $pmaterial->issued_date=$request->issued_date;
        $pmaterial->received_by=$request->received_by;
        $pmaterial->received_date=$request->received_date;
        $pmaterial->save();
        $this->notice::success('PM data saved');
        return redirect()->route('pm.index');
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
    public function show(Floor_material $project_material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $project=Project::get();
        $material=Material::get();
        $pmaterial=Floor_material::findOrFail(encryptor('decrypt', $id));
        return view('backend.pm.edit',compact('pmaterial','project','material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePMRequest $request, $id)
    {
        try{
            $pmaterial=Floor_material::findOrFail(encryptor('decrypt', $id));
            $pmaterial->project_id=$request->project_id;
            $pmaterial->material_id=$request->material_id;
            $pmaterial->quantity=$request->quantity;
            $pmaterial->issued_by=$request->issued_by;
            $pmaterial->issued_date=$request->issued_date;
            $pmaterial->received_by=$request->received_by;
            $pmaterial->received_date=$request->received_date;
            $pmaterial->save();
            $this->notice::success('PM data saved');
            return redirect()->route('pm.index');
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
        $pmaterial=Floor_material::findOrFail(encryptor('decrypt',$id));
        if($pmaterial->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
