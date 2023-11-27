@extends('backend.layout.app')

@section('title',trans('Asset'))
@section('page',trans('Update'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('asset.update',$asset->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                           <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" value="{{ old('name',$asset->name)}}" name="name">
                                    @if($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="derscription">Derscription</label>
                                    <input type="text" id="derscription" class="form-control" value="{{ old('derscription',$asset->description)}}" name="derscription">
                                    @if($errors->has('derscription'))
                                        <span class="text-danger"> {{ $errors->first('derscription') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="maintenance_schedule">Schedule</label>
                                    <input type="text" id="maintenance_schedule" class="form-control" value="{{ old('maintenance_schedule',$asset->maintenance_schedule)}}" name="maintenance_schedule">
                                    @if($errors->has('maintenance_schedule'))
                                        <span class="text-danger"> {{ $errors->first('maintenance_schedule') }}</span>
                                    @endif
                                </div>
                            </div>
                        
                               <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="other_details">Details</label>
                                    <input type="text" id="other_details" class="form-control" name="other_details" value="{{ old('other_details',$asset->other_details)}}"  >
                                    @if($errors->has('other_details'))
                                    <span class="text-danger"> {{ $errors->first('other_details') }}</span>
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
