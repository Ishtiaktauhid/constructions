@extends('backend.layout.app')

@section('title',trans('Flat Update'))
@section('page',trans('Update'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('flat.update',encryptor('encrypt',$flat->id))}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="project_id">Project  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="project_id" id="project_id">
                                        <option value="">Select Project</option>
                                        @forelse($project as $l)
                                            <option value="{{$l->id}}" {{ old('project_id',$flat->project_id)==$l->id?"selected":""}}> {{$l->project_name}}</option>
                                        @empty
                                            <option value="">No Role found</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('project_id'))
                                        <span class="text-danger"> {{ $errors->first('project_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="floor_id">Floor Name  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="floor_id" id="floor_id">
                                        <option value="">Select Floor</option>
                                        @forelse($floor as $f)
                                            <option value="{{$f->id}}" {{ old('floor_id',$flat->floor_id)==$f->id?"selected":""}}> {{$f->floorname}}</option>
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
                                    <label for="flatName">Flat Name<i class="text-danger">*</i></label>
                                    <input type="text" id="flatName" class="form-control" value="{{ old('flatName',$flat->flatName)}}" name="flatName">
                                    @if($errors->has('flatName'))
                                        <span class="text-danger"> {{ $errors->first('flatName') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="total_square_ft">Total Square Ft.<i class="text-danger">*</i></label>
                                    <input type="text" id="total_square_ft" class="form-control" value="{{ old('total_square_ft',$flat->total_square_ft)}}" name="total_square_ft">
                                    @if($errors->has('total_square_ft'))
                                        <span class="text-danger"> {{ $errors->first('total_square_ft') }}</span>
                                    @endif
                                </div>
                            </div>
                            

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="total_cost">Total Cost<i class="text-danger">*</i></label>
                                    <input type="text" id="total_cost" class="form-control" value="{{ old('total_cost',$flat->total_cost)}}" name="total_cost">
                                    @if($errors->has('total_cost'))
                                        <span class="text-danger"> {{ $errors->first('total_cost') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="sale_price">Sale Price<i class="text-danger">*</i></label>
                                    <input type="text" id="sale_price" class="form-control" value="{{ old('sale_price',$flat->sale_price)}}" name="sale_price">
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
