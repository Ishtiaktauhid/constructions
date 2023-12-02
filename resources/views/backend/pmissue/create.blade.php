@extends('backend.layout.app')
@section('title',trans('Project Issue List'))
@section('page',trans('List'))

@section('content')
    <!-- BEGIN: Header -->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa-solid fa-users"></i></div>
                            Add 
                        </h1>
                    </div>
                </div>

                @include('backend.partials._breadcrumbs')
            </div>
        </div>
    </header>
    <!-- END: Header -->

    <!-- BEGIN: Main Page Content -->
    <div class="container-xl px-2 mt-n10">
        <form action="{{ route('pmissue.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">


                
                    <div class="col-md-2 mt-2">
                        <label for="project_id" class="float-end"><h6>Project<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4">
                        <select required class="form-control form-select" name="project_id" id="project_id">
                            <option value="">Select Project</option>
                            @forelse($project as $p)
                                <option value="{{$p->id}}" {{ old('project_id')==$p->id?"selected":""}}> {{ $p->project_name}}</option>
                            @empty
                                <option value="">No project found</option>
                            @endforelse
                        </select>
                    </div>

                  @if($errors->has('project_id'))
                    <span class="text-danger"> {{ $errors->first('project_id') }}</span>
                  @endif

                    <div class="col-md-2 mt-2">
                        <label for="material_id" class="float-end"><h6>Material<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4">
                        <select required class="form-control form-select" name="material_id" id="material_id">
                            <option value="">Select Supplier</option>
                            @forelse($material as $m)
                                <option value="{{$m->id}}" {{ old('material_id')==$m->id?"selected":""}}> {{ $m->name}}</option>
                            @empty
                                <option value="">No Material found</option>
                            @endforelse
                        </select>
                    </div>
                  @if($errors->has('material_id'))
                    <span class="text-danger"> {{ $errors->first('material_id') }}</span>
                    @endif
                    
                    <div class="col-md-2 mt-2">
                        <div class="form-group">
                                    <label for="quantity">Quantity <i class="text-danger">*</i></label>
                                    <input type="text" id="quantity" class="form-control" value="{{ old('quantity')}}" name="quantity">
                                    @if($errors->has('project_name'))
                                        <span class="text-danger"> {{ $errors->first('quantity') }}</span>
                                    @endif
                         </div>
                    </div> 

                </div>

                      <button class="btn btn-primary" type="submit">Add</button>
                            <a class="btn btn-danger" href="{{ route('pmissue.index') }}">Cancel</a>
                        </div>
                   
                    <!-- END: Customer Details -->
                </div>
            </div>
        </form>
    </div>
  
@endsection

 