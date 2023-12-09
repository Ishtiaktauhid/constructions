<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\MaterialDamage;
use App\Models\Backend\Floor;
use App\Models\Backend\Flat;
use App\Models\Backend\Material;
use Illuminate\Http\Request;

class MaterialDamageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mdamage=MaterialDamage::paginate(10);
        return view('backend.damage.index',compact('mdamage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $floor=Floor::get();
        $flat=Flat::get();
        $material=Material::get();
        return view('backend.damage.create', compact('floor','flat','material'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $mdamage=new MaterialDamage();
            $mdamage->floor_id=$request->floor_id;
            $mdamage->flat_id=$request->flat_id;
            $mdamage->material_id=$request->material_id;
            $mdamage->quantity=$request->quantity;
            $mdamage->unit_price=$request->unit_price;
            $mdamage->total_amount=$request->total_amount;
            $mdamage->save();
            $this->notice::success('Damage data saved');
            return redirect()->route('damage.index');
          }
          catch(Exception $e){
            $this->notice::error('Please try again');
            // dd($e);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialDamage $materialDamage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $floor=Floor::get();
        $flat=Flat::get();
        $material=Material::get();
        $mdamage=MaterialDamage::find(encryptor('decrypt',$id));
        return view('backend.damage.edit',compact('floor','flat','material','mdamage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $mdamage=MaterialDamage::find(encryptor('decrypt',$id));
            $mdamage->floor_id=$request->floor_id;
            $mdamage->flat_id=$request->flat_id;
            $mdamage->material_id=$request->material_id;
            $mdamage->quantity=$request->quantity;
            $mdamage->unit_price=$request->unit_price;
            $mdamage->total_amount=$request->total_amount;
            $mdamage->save();
            $this->notice::success('Damage data saved');
            return redirect()->route('damage.index');
          }
          catch(Exception $e){
            $this->notice::error('Please try again');
            // dd($e);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mdamage=MaterialDamage::findOrFail(encryptor('decrypt',$id));
        if($mdamage->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
