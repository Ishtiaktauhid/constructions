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
        $p=Project::where('id',$id)->first();
        $data = array();
        if($p){
            $data=array(
                'id' => $p->id,
                'project_name'=>$p->project_name,
                'description'=>$p->description,
                'land'=>$p->land?->land_area,
                'start_time'=>date('d M, Y',strtotime($p->start_time)),
                'end_time'=>date('d M, Y',strtotime($p->end_time)),
                'other_project_details'=>$p->other_project_details,
                'image'=>$p->image,
                'price'=>$p->flats->min('sale_price')==$p->flats->max('sale_price')? $p->flats->min('sale_price') : $p->flats->min('sale_price') ." - ". $p->flats->max('sale_price'),
            );
        }
        return response($data, 200);
    }
    public function allproject()
    {
        $project=Project::get();
        $data = array();
        if($project){
            foreach($project as $p){

                $data[]=array(
                    'id' => $p->id,
                    'project_name'=>$p->project_name,
                    'description'=>$p->description,
                    'land'=>$p->land?->land_area,
                    'start_time'=>$p->start_time,
                    'end_time'=>$p->end_time,
                    'other_project_details'=>$p->other_project_details,
                    'image'=>$p->image,
                    'price'=>$p->flats->min('sale_price')==$p->flats->max('sale_price')? $p->flats->min('sale_price') : $p->flats->min('sale_price') ." - ". $p->flats->max('sale_price'),
                );
              }
        }
      return response($data, 200);
    }
}
