<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Project;
use App\Models\Backend\Property_Image;
use App\Models\Backend\Land;
use Illuminate\Http\Request;
use Exception;
use File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
       $project=Project::paginate(10);
        return view('backend.project.index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $land=Land::get();
        return view('backend.project.create', compact('land'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $project=new Project();
            $project->project_name=$request->project_name;
            $project->land_id=$request->land_id;
            $project->description=$request->description;
            $project->start_time=$request->start_time;
            $project->end_time=$request->end_time;
            $project->other_project_details=$request->other_project_details;
            $project->project_value=$request->project_value;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.
                $request->image->extension();
                $request->image->move(public_path('uploads/project'),$imageName);
                $project->image=$imageName;
            }
             
            if($project->save())
                return redirect()->route('project.index')->with('success','Successfully saved');
            else 
                return redirect()->back()->withInput()->with('error','Please try again');
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with('error','Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $land=Land::get();
        $project=Project::find(encryptor('decrypt', $id));
        return view('backend.project.edit',compact('project','land'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $project=Project::find($id);
            $project->project_name=$request->project_name;
            $project->land_id=$request->land_id;
            $project->description=$request->description;
            $project->start_time=$request->start_time;
            $project->end_time=$request->end_time;
            $project->other_project_details=$request->other_project_details;
            $project->project_value=$request->project_value;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.
                $request->image->extension();
                $request->image->move(public_path('uploads/project'),$imageName);
                $project->image=$imageName;
            }
            if($project->save())
                return redirect()->route('project.index')->with('success','Successfully saved');
            else 
                return redirect()->back()->withInput()->with('error','Please try again');
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withInput()->with('error','Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project=Project::find(encryptor('decrypt',$id));
        $image_path=public_path('uploads/users/').$project->image;
        if($project->delete()){
            if(File::exists($image_path)) File::delete($image_path);
            return redirect()->back()->with('success','Successfully Deleted');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function addFile($id)
    {
        $project=Property_Image::where('project_id',encryptor('decrypt', $id))->get();
        return view('backend.project.addFile', compact('project','id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeFile(Request $request,$id)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('uploads/project/properties'),$imageName);
        
        $imageUpload = new Property_Image();
        $imageUpload->image_name = $imageName;
        $imageUpload->project_id=encryptor('decrypt', $id);
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function destroyFile(Request $request)
    {
        $image_name =  $request->get('image_name');
        Property_Image::where('image_name',$image_name)->delete();
        $path=public_path().'/uploads/project/properties/'.$image_name;
        if (file_exists($path)) {
            unlink($path);
        }
        return $image_name;  
    }
    

}
