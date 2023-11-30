<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Employee;
use App\Http\Requests\Backend\employees\AddEmployeeRequest; 
use App\Http\Requests\Backend\employees\UpdateEmployeeRequest; 
use Exception;
use File;
  
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee=Employee::all();
        return view('backend.employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddEmployeeRequest $request)
    {
       try{
        $employee=new Employee();
        $employee->name=$request->name;
        if($request->hasFile('image')){
            $imageName=rand(111,999).time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/employees'),$imageName);
            $employee->image=$imageName;
        }
        $employee->position=$request->position;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->details=$request->details;
        $employee->created_by=currentUserId();
        $employee->save();
        $this->notice::success('Employee data saved');
        return redirect()->route('employee.index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee=Employee::find(encryptor('decrypt',$id));
        return view('backend.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        try{
            $employee=Employee::find($id);
            $employee->name=$request->name;
            if($request->hasFile('image')){
                $imageName=rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/employees'),$imageName);
                $employee->image=$imageName;
            }
            $employee->position=$request->position;
            $employee->email=$request->email;
            $employee->phone=$request->phone;
            $employee->details=$request->details;
            $employee->updated_by=currentUserId();
            $employee->save();
            $this->notice::success('Employee data saved');
            return redirect()->route('employee.index');
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
    public function destroy(string $id)
    {
        $employee=Employee::find(encryptor('decrypt',$id));
        $image_path=public_path('uploads/employees/').$employee->image;
        if($employee->delete()){
            if(File::exists($image_path)) File::delete($image_path);
            return redirect()->back()->with('success','Successfully Deleted');
        }  
    }
}
