<?php

namespace App\Http\Controllers\Backend;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\client\ClientNewRequest; 
use App\Http\Requests\Backend\client\UpdateClientRequest; 
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client=Client::all();
        return view('backend.client.index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientNewRequest $request)
    {
        try{
            $client=new Client();
            $client->name=$request->name;
            $client->email=$request->email;
            $client->phone=$request->phone;
            $client->client_details=$request->client_details;
            if($client->save())
                return redirect()->route('client.index')->with('success','Successfully saved');
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
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client=Client::find(encryptor('decrypt',$id));
        return view('backend.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request,$id)
    {
        try{
            $client=Client::find(encryptor('decrypt',$id));
            $client->name=$request->name;
            $client->email=$request->email;
            $client->phone=$request->phone;
            $client->client_details=$request->client_details;
            if($client->save())
                return redirect()->route('client.index')->with('success','Successfully saved');
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
        $client= Client::findOrFail(encryptor('decrypt',$id));
        if($client->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
