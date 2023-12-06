<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Land;
use App\Http\Requests\Backend\land\StoreLandRequest; 
use App\Http\Requests\Backend\land\UpdateLandRequest; 
use Illuminate\Http\Request;
use Exception;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $land=Land::paginate(10);
        return view('backend.land.index',compact('land'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.land.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLandRequest $request)
    {
       try{
        $land=new Land();
        $land->name_en=$request->name_en;
        $land->name_bn=$request->name_bn;
        $land->description=$request->description;
        $land->mouza_no_en=$request->mouza_no_en;
        $land->mouza_no_bn=$request->mouza_no_bn;
        $land->rs_no_en=$request->rs_no_en;
        $land->rs_no_bn=$request->rs_no_bn;
        if($request->hasFile('rs_image')){
            $imageName = rand(111,999).time().'.'.
            $request->rs_image->extension();
            $request->rs_image->move(public_path('uploads/lands/rs'),$imageName);
            $land->rs_image=$imageName;
        }
        $land->bs_no_en=$request->bs_no_en;
        $land->bs_no_bn=$request->bs_no_bn;
        if($request->hasFile('bs_image')){
            $imageName = rand(111,999).time().'.'.
            $request->bs_image->extension();
            $request->bs_image->move(public_path('uploads/lands/bs'),$imageName);
            $land->bs_image=$imageName;
        }
        $land->registration_no_en=$request->registration_no_en;
        $land->registration_no_bn=$request->registration_no_bn;
        if($request->hasFile('registration_image')){
            $imageName = rand(111,999).time().'.'.
            $request->registration_image->extension();
            $request->registration_image->move(public_path('uploads/lands/registration'),$imageName);
            $land->registration_image=$imageName;
        }
        $land->land_area=$request->land_area;
        $land->acquire_date=$request->acquire_date;
        $land->original_owner_details=$request->original_owner_details;
        $land->price=$request->price;
        $land->save();
        $this->notice::success('Land data saved');
        return redirect()->route('land.index');
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
    public function show($id)
    {
        $land=Land::findOrFail(encryptor('decrypt',$id));
        return view('backend.land.show',compact('land'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $land=Land::find(encryptor('decrypt',$id));
        return view('backend.land.edit',compact('land'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLandRequest $request, $id)
    {
        try{
            $land=Land::find(encryptor('decrypt',$id));
            $land->name_en=$request->name_en;
            $land->name_bn=$request->name_bn;
            $land->description=$request->description;
            $land->mouza_no_en=$request->mouza_no_en;
            $land->mouza_no_bn=$request->mouza_no_bn;
            $land->rs_no_en=$request->rs_no_en;
            $land->rs_no_bn=$request->rs_no_bn;
            if($request->hasFile('rs_image')){
                $imageName = rand(111,999).time().'.'.
                $request->rs_image->extension();
                $request->rs_image->move(public_path('uploads/lands/rs'),$imageName);
                $land->rs_image=$imageName;
            }
            $land->bs_no_en=$request->bs_no_en;
            $land->bs_no_bn=$request->bs_no_bn;
            if($request->hasFile('bs_image')){
                $imageName = rand(111,999).time().'.'.
                $request->bs_image->extension();
                $request->bs_image->move(public_path('uploads/lands/bs'),$imageName);
                $land->bs_image=$imageName;
            }
            $land->registration_no_en=$request->registration_no_en;
            $land->registration_no_bn=$request->registration_no_bn;
            if($request->hasFile('registration_image')){
                $imageName = rand(111,999).time().'.'.
                $request->registration_image->extension();
                $request->registration_image->move(public_path('uploads/lands/registration'),$imageName);
                $land->registration_image=$imageName;
            }
            $land->land_area=$request->land_area;
            $land->acquire_date=$request->acquire_date;
            $land->original_owner_details=$request->original_owner_details;
            $land->price=$request->price;
            $land->save();
            $this->notice::success('Land data saved');
            return redirect()->route('land.index');
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
        $land= Land::findOrFail(encryptor('decrypt',$id));
        if($land->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
