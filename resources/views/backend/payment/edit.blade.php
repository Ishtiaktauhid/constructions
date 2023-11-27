@extends('backend.layout.app')

@section('title',trans('payment'))
@section('page',trans('Update'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                <form class="form"  enctype="multipart/form-data" action="{{route('payment.update',encryptor('encrypt',$payment->id))}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$payment->id)}}">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="client_id">Client <i class="text-danger">*</i></label>
                                    <select class="form-control" name="client_id" id="land_id">
                                        <option value="">Select Client</option>
                                        @forelse($client as $l)
                                            <option value="{{$l->id}}" {{ old('client_id',$payment->client_id)==$l->id?"selected":""}}> {{$l->name}}</option>
                                        @empty
                                            <option value="">No Role found</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('client_id'))
                                        <span class="text-danger"> {{ $errors->first('client_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="amount">Amount<i class="text-danger">*</i></label>
                                    <input type="text" id="amount" class="form-control" value="{{ old('amount',$payment->amount)}}" name="amount">
                                    @if($errors->has('amount'))
                                        <span class="text-danger"> {{ $errors->first('amount') }}</span>
                                    @endif
                                </div>
                            </div>
                          <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="payment_date">Paymetn Date <i class="text-danger">*</i></label>
                                    <input type="date" id="payment_date" class="form-control" value="{{ old('payment_date',$payment->payment_date)}}" name="payment_date">
                                    @if($errors->has('payment_date'))
                                        <span class="text-danger"> {{ $errors->first('payment_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="payment_method">Payment Method <i class="text-danger">*</i></label>
                                    <input type="text" id="payment_method" class="form-control" value="{{ old('payment_method',$payment->payment_method)}}" name="payment_method">
                                    @if($errors->has('payment_method'))
                                        <span class="text-danger"> {{ $errors->first('payment_method') }}</span>
                                    @endif
                                </div>
                            </div>
                         </div>
                       
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

