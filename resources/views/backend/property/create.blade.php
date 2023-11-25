@extends('backend.layout.app')

@section('title',trans('Property Image'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('property.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="project_id">Project  <i class="text-danger">*</i></label>
                                    <select class="form-control" name="project_id" id="project_id">
                                        <option value="">Select Project</option>
                                        @forelse($project as $p)
                                            <option value="{{$p->id}}" {{ old('project_id')==$p->id?"selected":""}}> {{$p->project_name}}</option>
                                        @empty
                                            <option value="">No Project found</option>
                                        @endforelse
                                    </select>
                                    @if($errors->has('project_id'))
                                        <span class="text-danger"> {{ $errors->first('project_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="image_name">Property Image</label>
                                    <input type="file" id="image_name" class="form-control" placeholder="Image" name="image_name">
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
