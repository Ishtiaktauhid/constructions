@extends('backend.layout.app')

@section('title',trans('Project Material'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('pm.update',$pmaterial->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="project_id">Project  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="project_id" id="project_id">
                                        <option value="">Select Project</option>
                                        @forelse($project as $l)
                                            <option value="{{$l->id}}" {{ old('project_id',$pmaterial->project_id)==$l->id?"selected":""}}> {{$l->project_name}}</option>
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
                                    <label for="material_id">Material  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="material_id" id="material_id">
                                        <option value="">Select Material</option>
                                        @forelse($material as $m)
                                            <option value="{{$m->id}}" {{ old('material_id',$pmaterial->name)==$l->id?"selected":""}}> {{$m->name}}</option>
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
                                    <label for="quantity">Quantity <i class="text-danger">*</i></label>
                                    <input type="text" id="quantity" class="form-control" value="{{ old('quantity')}}" name="quantity">
                                    @if($errors->has('project_name'))
                                        <span class="text-danger"> {{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                            </div>
                          <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="issued_by">Issued_By <i class="text-danger">*</i></label>
                                    <input type="text" id="issued_by" class="form-control" value="{{ old('issued_by')}}" name="issued_by">
                                    @if($errors->has('issued_by'))
                                        <span class="text-danger"> {{ $errors->first('issued_by') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="issued_date">Issued_date<i class="text-danger">*</i></label>
                                    <input type="date" id="issued_date" class="form-control" value="{{ old('issued_date')}}" name="issued_date">
                                    @if($errors->has('issued_date'))
                                        <span class="text-danger"> {{ $errors->first('issued_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="received_by">Received By <i class="text-danger">*</i></label>
                                    <input type="text" id="received_by" class="form-control" value="{{ old('received_by')}}" name="received_by">
                                    @if($errors->has('received_by'))
                                        <span class="text-danger"> {{ $errors->first('received_by') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="received_date">Received Date</label>
                                    <input type="date" id="received_date" class="form-control" value="{{ old('received_date')}}" name="received_date">
                                    @if($errors->has('received_date'))
                                        <span class="text-danger"> {{ $errors->first('received_date') }}</span>
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
