@extends('backend.layout.app')

@section('title',trans('project'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('project.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="land_id">Land  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="land_id" id="land_id">
                                        <option value="">Select Land</option>
                                        @forelse($land as $l)
                                            <option value="{{$l->id}}" {{ old('land_id')==$l->id?"selected":""}}> {{$l->name_en}}</option>
                                        @empty
                                            <option value="">No Role found</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('land_id'))
                                        <span class="text-danger"> {{ $errors->first('land_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="project_name">Project Name <i class="text-danger">*</i></label>
                                    <input type="text" id="project_name" class="form-control" value="{{ old('project_name')}}" name="project_name">
                                    @if($errors->has('project_name'))
                                        <span class="text-danger"> {{ $errors->first('project_name') }}</span>
                                    @endif
                                </div>
                            </div>
                          <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="description">Description <i class="text-danger">*</i></label>
                                    <input type="text" id="description" class="form-control" value="{{ old('description')}}" name="description">
                                    @if($errors->has('description'))
                                        <span class="text-danger"> {{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="start_time">Start Time <i class="text-danger">*</i></label>
                                    <input type="datetime-local" id="start_time" class="form-control" value="{{ old('start_time')}}" name="start_time">
                                    @if($errors->has('start_time'))
                                        <span class="text-danger"> {{ $errors->first('start_time') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="end_time">End Time <i class="text-danger">*</i></label>
                                    <input type="datetime-local" id="start_time" class="form-control" value="{{ old('end_time')}}" name="end_time">
                                    @if($errors->has('end_time'))
                                        <span class="text-danger"> {{ $errors->first('end_time') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="other_project_details">Project Details</label>
                                    <input type="text" id="other_project_details" class="form-control" value="{{ old('other_project_details')}}" name="other_project_details">
                                    @if($errors->has('other_project_details'))
                                        <span class="text-danger"> {{ $errors->first('other_project_details') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="project_value">Project Value</label>
                                    <input type="text" id="project_value" class="form-control" value="{{ old('project_value')}}" name="project_value">
                                    @if($errors->has('project_value'))
                                        <span class="text-danger"> {{ $errors->first('project_value') }}</span>
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
