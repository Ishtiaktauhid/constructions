<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Property_Image;
use Illuminate\Http\Request;
use Exception;
use File;

class PropertyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pimage=Property_Image::paginate(10);
        return view('backend.property.index',compact('pimage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project=Project::get();
        return view('backend.property.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $pimage=new Property_Image();
         $pimage->project_id=$request->project_id;
            if($request->hasFile('image_name')){
                $imageName = rand(111,999).time().'.'.
                $request->image_name->extension();
                $request->image_name->move(public_path('uploads/project/properties'),$imageName);
                $pimage->image_name=$imageName;
            }
            $pimage->save();
            $this->notice::success('Image data saved');
            return redirect()->route('property.index');
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
    public function show(Property_Image $property_Image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project=Project::get();
        $pimage=Property_Image::find(encryptor('decrypt', $id));
        return view('backend.property.edit',compact('pimage','project'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $pimage=Property_Image::find($id);
             $pimage->project_id=$request->project_id;
                if($request->hasFile('image_name')){
                    $imageName = rand(111,999).time().'.'.
                    $request->image_name->extension();
                    $request->image_name->move(public_path('uploads/project/properties'),$imageName);
                    $pimage->image_name=$imageName;
                }
                $pimage->save();
                $this->notice::success('Image data saved');
                return redirect()->route('property.index');
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
        $pimage=Property_Image::find(encryptor('decrypt',$id));
        $image_path=public_path('uploads/project/properties').$pimage->image;
        if($pimage->delete()){
            if(File::exists($image_path)) File::delete($image_path);
            return redirect()->back()->with('success','Successfully Deleted');
        }
    }
}
