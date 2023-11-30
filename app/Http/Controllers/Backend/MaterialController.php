<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Material;
use Illuminate\Http\Request;
use Exception;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $material = Material::all();
        return view('backend.material.index',compact('material'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.material.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $material=new Material;
            $material->name=$request->material_name;
             $material->description=$request->description;
             $material->created_by=currentUserId();
             $material->save();
             $this->notice::success('material data saved');
             return redirect()->route('material.index');
        } catch(Exception $e){
            $this->notice::error('Please try again');
            dd($e);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $material=Material::find(encryptor('decrypt',$id));
        return view('backend.material.edit',compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $material=Material::find($id);
            $material->name=$request->material_name;
             $material->description=$request->description;
             $material->updated_by=currentUserId();
             $material->save();
             $this->notice::success('material data Updated');
             return redirect()->route('material.index');
        
        } catch(Exception $e){
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
        $material= Material::findOrFail(encryptor('decrypt',$id));
        if($material->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
