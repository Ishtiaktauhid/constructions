@extends('backend.layout.app')

@section('title',trans('supplier'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('supplier.store')}}">
                        @csrf
                        
                        <div class="row">
                           <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" value="{{ old('name')}}" name="name">
                                    @if($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="name_bn" class="form-control" value="{{ old('email')}}" name="email">
                                    @if($errors->has('email'))
                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Contact <i class="text-danger">*</i></label>
                                    <input type="text" id="phone" class="form-control" value="{{ old('phone')}}" name="phone">
                                    @if($errors->has('phone'))
                                        <span class="text-danger"> {{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                               <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="details">supplier Details</label>
                                    <input type="text" id="details" class="form-control" name="details">
                                    @if($errors->has('supplier_details'))
                                    <span class="text-danger"> {{ $errors->first('details') }}</span>
                                @endif
                                </div>
                            </div> 
                          </div>
                      
                          <div class="row">
                            <div class="col-12 d-flex justify-content-start">
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
