<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProjectMaterialIssue as PmIssue ;
use App\Models\Backend\Project;
use App\Models\Backend\Material;
use Illuminate\Http\Request;

class ProjectMaterialIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pmissue=PmIssue::all();
        return view('backend.pmissue.index',compact('pmissue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project=Project::get();
        $material=Material::get();
        return view('backend.pmissue.create', compact('project','material'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $pmissue=new PmIssue();
            $pmissue->project_id=$request->project_id;
            $pmissue->material_id=$request->material_id;
            $pmissue->quantity=$request->quantity;
            $pmissue->issued_by=$request->issued_by;
            $pmissue->issued_date=$request->issued_date;
            $pmissue->received_by=$request->received_by;
            $pmissue->received_date=$request->received_date;
            $pmissue->save();
            $this->notice::success('Project Materials Issue data saved');
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
    public function show(ProjectMaterialIssue $projectMaterialIssue)
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
        $pmissue=PmIssue::findOrFail(encryptor('decrypt', $id));
        return view('backend.pm.edit',compact('pmissue','project','material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectMaterialIssue $projectMaterialIssue)
    {
        try{
            $pmissue=PmIssue::findOrFail(encryptor('decrypt', $id));
            $pmissue->project_id=$request->project_id;
            $pmissue->material_id=$request->material_id;
            $pmissue->quantity=$request->quantity;
            $pmissue->issued_by=$request->issued_by;
            $pmissue->issued_date=$request->issued_date;
            $pmissue->received_by=$request->received_by;
            $pmissue->received_date=$request->received_date;
            $pmissue->save();
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
        $pmissue=PmIssue::findOrFail(encryptor('decrypt',$id));
        if($pmissue->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }  
    }
}
