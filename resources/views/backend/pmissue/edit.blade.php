@extends('backend.layout.app')
@section('title',trans('Project Issue Update'))
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
                            Update
                        </h1>
                    </div>
                </div>

                @include('partials._breadcrumbs')
            </div>
        </div>
    </header>
    <!-- END: Header -->

    <!-- BEGIN: Main Page Content -->
    <div class="container-xl px-2 mt-n10">
        <form action="{{ route('pmissue.update',$pmissue->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">


                <div class="col-xl-12">
                    <div class="col-md-2 mt-2">
                        <label for="project_id" class="float-end"><h6>Project<span class="text-danger">*</span></h6></label>
                    </div>
                    <div class="col-md-4">
                        <select required class="form-control form-select" name="project_id" id="project_id">
                            <option value="">Select Project</option>
                            @forelse($project as $p)
                                <option value="{{$p->id}}" {{ old('project_id',$pmissue->project_id)==$p->id?"selected":""}}> {{ $p->project_name}}</option>
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
                                <option value="{{$m->id}}" {{ old('material_id',$pmissue->material_id)==$m->id?"selected":""}}> {{ $m->name}}</option>
                            @empty
                                <option value="">No Material found</option>
                            @endforelse
                        </select>
                    </div>
                  @if($errors->has('material_id'))
                    <span class="text-danger"> {{ $errors->first('material_id') }}</span>
                    @endif
                    
                        <div class="mb-3">
                                <label for="quantity">Quantity <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-solid @error('quantity') is-invalid @enderror" id="quantity" name="quantity"
                                    rows="3">{{ old('quantity',$pmissue->quantity) }}</textarea>
                                @error('Address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                           




                            <!-- Submit button -->
                            <button class="btn btn-primary" type="submit">Add</button>
                            <a class="btn btn-danger" href="{{ route('pmissue.index') }}">Cancel</a>
                        </div>
                    </div>
                    <!-- END: Customer Details -->
                </div>
            </div>
        </form>
    </div>
    <!-- END: Main Page Content -->
@endsection

 