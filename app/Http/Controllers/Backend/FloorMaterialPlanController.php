<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\FloorMaterialPlan as FMP;
use App\Models\Backend\Project;
use App\Models\Backend\Material;
use Illuminate\Http\Request;
use Exception;

class FloorMaterialPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $$fmp = FMP::all();
        return view('backend.floormaterial.index',compact('fmp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project=Project::get();
        $material=Material::get();
        return view('backend.floormaterial.create', compact('project','material'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $fmp=new FMP();
            $fmp->project_id=$request->project_id;
            $fmp->material_id=$request->material_id;
            $fmp->quantity=$request->quantity;
            $fmp->save();
            $this->notice::success('PM data saved');
            return redirect()->route('floormaterial.index');
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
    public function show(FloorMaterialPlan $floorMaterialPlan)
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
        $fmp=FMP::findOrFail(encryptor('decrypt', $id));
        return view('backend.floormaterial.edit',compact('fmp','project','material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $fmp=FMP::findOrFail(encryptor('decrypt', $id));
            $fmp->project_id=$request->project_id;
            $fmp->material_id=$request->material_id;
            $fmp->quantity=$request->quantity;
            $fmp->save();
            $this->notice::success('PM data saved');
            return redirect()->route('floormaterial.index');
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
        $fmp=FMP::findOrFail(encryptor('decrypt',$id));
        if($pmaterial->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
