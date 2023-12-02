@extends('backend.layout.app')

@section('title',trans('Floor Create'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('floor.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="project_id">Project  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="project_id" id="project_id">
                                        <option value="">Select Project</option>
                                        @forelse($project as $l)
                                            <option value="{{$l->id}}" {{ old('project_id')==$l->id?"selected":""}}> {{$l->project_name}}</option>
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
                                    <label for="floorname">Floor Name <i class="text-danger">*</i></label>
                                    <input type="text" id="floorname" class="form-control" value="{{ old('floorname')}}" name="floorname">
                                    @if($errors->has('floorname'))
                                        <span class="text-danger"> {{ $errors->first('floorname') }}</span>
                                    @endif
                                </div>
                            </div>
                          <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="total_square_ft">Total Square Ft. <i class="text-danger">*</i></label>
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
                                    <label for="total_budget">Total Budget<i class="text-danger">*</i></label>
                                    <input type="text" id="total_budget" class="form-control" value="{{ old('total_budget')}}" name="total_budget">
                                    @if($errors->has('total_budget'))
                                        <span class="text-danger"> {{ $errors->first('total_budget') }}</span>
                                    @endif
                                </div>
                            </div> 
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="use_status">Status<i class="text-danger">*</i></label>
                                    <input type="text" id="use_status" class="form-control" value="{{ old('use_status')}}" name="use_status">
                                    @if($errors->has('use_status'))
                                        <span class="text-danger"> {{ $errors->first('use_status') }}</span>
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
