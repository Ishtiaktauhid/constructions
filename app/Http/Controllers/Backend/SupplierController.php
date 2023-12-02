<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier=Supplier::all();
        return view('backend.supplier.index',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $supplier=new Supplier();
            $supplier->name=$request->name;
            $supplier->email=$request->email;
            $supplier->phone=$request->phone;
            $supplier->details=$request->details;
            if($supplier->save())
                return redirect()->route('supplier.index')->with('success','Successfully saved');
            else 
                return redirect()->back()->withInput()->with('error','Please try again');
        } catch(Exception $e){
            $this->notice::error('Please try again');
            dd($e);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier=Supplier::find(encryptor('decrypt',$id));
        return view('backend.supplier.edit',compact('supplier'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        try{
            $supplier=Supplier::find(encryptor('decrypt',$id));
            $supplier->name=$request->name;
            $supplier->email=$request->email;
            $supplier->phone=$request->phone;
            $supplier->details=$request->details;
            if($supplier->save())
                return redirect()->route('supplier.index')->with('success','Successfully saved');
            else 
                return redirect()->back()->withInput()->with('error','Please try again');
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
        $supplier= Supplier::findOrFail(encryptor('decrypt',$id));
        if($supplier->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
