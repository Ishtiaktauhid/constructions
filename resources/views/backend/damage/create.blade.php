@extends('backend.layout.app')

@section('title',trans('damage Create'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('damage.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="floor_id">Floor <i class="text-danger">*</i></label>
                                    <select class="form-control" name="floor_id" id="floor_id">
                                        <option value="">Select Project</option>
                                        @forelse($floor as $l)
                                            <option value="{{$l->id}}" {{ old('floor_id')==$l->id?"selected":""}}> {{$l->floorname}}</option>
                                        @empty
                                            <option value="">No Role found</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('floor_id'))
                                        <span class="text-danger"> {{ $errors->first('floor_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="flat_id">Flat Name  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="flat_id" id="flat_id">
                                        <option value="">Select Floor</option>
                                        @forelse($flat as $ft)
                                            <option value="{{$ft->id}}" {{ old('flat_id')==$ft->id?"selected":""}}> {{$ft->flatName}}</option>
                                        @empty
                                            <option value="">No Role found</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('flat_id'))
                                        <span class="text-danger"> {{ $errors->first('flat_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="material_id">Material Name  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="material_id" id="material_id">
                                        <option value="">Select Floor</option>
                                        @forelse($material as $m)
                                            <option value="{{$m->id}}" {{ old('material_id')==$m->id?"selected":""}}> {{$m->material_name}}</option>
                                        @empty
                                            <option value="">No Role found</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('material_id'))
                                        <span class="text-danger"> {{ $errors->first('material_id') }}</span>
                                    @endif
                                </div>
                            </div>
                             
                           
                          <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="quantity">Quantity<i class="text-danger">*</i></label>
                                    <input type="text" id="quantity" class="form-control" value="{{ old('quantity')}}" name="quantity">
                                    @if($errors->has('quantity'))
                                        <span class="text-danger"> {{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="total_square_ft">Total Square Ft.<i class="text-danger">*</i></label>
                                    <input type="text" id="total_square_ft" class="form-control" value="{{ old('total_square_ft')}}" name="total_square_ft">
                                    @if($errors->has('total_square_ft'))
                                        <span class="text-danger"> {{ $errors->first('total_square_ft') }}</span>
                                    @endif
                                </div>
                            </div>
                            

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="total_cost">Total Cost<i class="text-danger">*</i></label>
                                    <input type="text" id="total_cost" class="form-control" value="{{ old('total_cost')}}" name="total_cost">
                                    @if($errors->has('total_cost'))
                                        <span class="text-danger"> {{ $errors->first('total_cost') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="sale_price">Sale Price<i class="text-danger">*</i></label>
                                    <input type="text" id="sale_price" class="form-control" value="{{ old('sale_price')}}" name="sale_price">
                                    @if($errors->has('sale_price'))
                                        <span class="text-danger"> {{ $errors->first('sale_price') }}</span>
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
