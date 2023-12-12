<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Backend\Asset;
use Illuminate\Http\Request;
use Exception;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset=Asset::all();
        return view('backend.asset.index',compact('asset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try{
        $asset=new Asset();
        $asset->name=$request->name;
        $asset->description=$request->description;
        $asset->maintenance_schedule=$request->maintenance_schedule;
        $asset->maintenance_schedule=$request->maintenance_schedule;
        $asset->other_details=$request->other_details;
        $asset->created_by=currentUserId();
        $asset->save();
        $this->notice::success('Asset data saved');
        return redirect()->route('asset.index');
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
    public function show(Asset $asset)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asset=Asset::findOrFail(encryptor('decrypt',$id));
        return view('backend.asset.edit',compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $asset=Asset::find($id);
            $asset->name=$request->name;
            $asset->description=$request->description;
            $asset->maintenance_schedule=$request->maintenance_schedule;
            $asset->maintenance_schedule=$request->maintenance_schedule;
            $asset->other_details=$request->other_details;
            $asset->updated_by=currentUserId();
            $asset->save();
            $this->notice::success('Asset data updated');
            return redirect()->route('asset.index');
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
        $asset= Asset::findOrFail(encryptor('decrypt',$id));
        if($asset->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
