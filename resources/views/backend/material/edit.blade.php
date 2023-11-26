@extends('backend.layout.app')

@section('title',trans('Material'))
@section('page',trans('Update'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('material.update',$material->id)}}">
                        @csrf
                        @method('PATCH')
                        
                        <div class="row">
                           <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="material_name">Material Name</label>
                                    <input type="text" id="material_name" class="form-control" value="{{ old('material_name',$material->name)}}" name="material_name">
                                    @if($errors->has('material_name'))
                                        <span class="text-danger"> {{ $errors->first('material_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description"class="form-control" id="description" cols="30" rows="10" value="{{old('description',$material->description)}}"></textarea>
                                    @if($errors->has('description'))
                                        <span class="text-danger"> {{ $errors->first('description') }}</span>
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
