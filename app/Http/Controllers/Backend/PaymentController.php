<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Payment;
use App\Models\Backend\Client;
use Illuminate\Http\Request;
use Exception;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment=Payment::all();
        return view('backend.payment.index',compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client=Client::get();
        return view('backend.payment.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try{
        $payment=new Payment();
        $payment->client_id=$request->client_id;
        $payment->amount=$request->amount;
        $payment->payment_date=$request->payment_date;
        $payment->payment_method=$request->payment_method;
        $payment->save();
        $this->notice::success('Payment data saved');
        return redirect()->route('payment.index');
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client=Client::get();
        $payment=Payment::find($id);
        return view('backend.payment.edit',compact('payment','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $payment=Payment::find($id);
            $payment->client_id=$request->client_id;
            $payment->amount=$request->amount;
            $payment->payment_date=$request->payment_date;
            $payment->payment_method=$request->payment_method;
            $payment->save();
            $this->notice::success('Payment data updated');
            return redirect()->route('payment.index');
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
    public function destroy(Payment $payment)
    {
        $payment=Payment::findOrFail(encryptor('decrypt',$id));
        if($payment->delete()){
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
