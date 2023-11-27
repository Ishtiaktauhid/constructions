<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

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
        return view('backend.payment.create');
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
        $this->notice::success('Land data saved');
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
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
