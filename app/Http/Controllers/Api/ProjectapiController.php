<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Backend\Project;
use App\Models\Backend\Property_Image;
use App\Models\Backend\Land;
use Illuminate\Http\Request;
use Exception;
use File;

class ProjectapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function project_details($id)
    {
        $project=Project::where('id',$id)->get();
        
        return response($project, 200);
    }
    public function allproject()
    {
        $project=Project::get();

        return response($project, 200);
    }

    
}
