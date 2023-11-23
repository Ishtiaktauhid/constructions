@extends('backend.layout.app')

@section('title',trans('Lands'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('land.store')}}">
                        @csrf
                        <div class="row">
                           <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name_en">Name (English) <i class="text-danger">*</i></label>
                                    <input type="text" id="userName_en" class="form-control" value="{{ old('name_en')}}" name="name_en">
                                    @if($errors->has('name_en'))
                                        <span class="text-danger"> {{ $errors->first('name_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name_bn">Name (Bangla)</label>
                                    <input type="text" id="name_bn" class="form-control" value="{{ old('name_bn')}}" name="name_bn">
                                    @if($errors->has('name_bn'))
                                        <span class="text-danger"> {{ $errors->first('name_bn') }}</span>
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
                                    <label for="mouza_no_en">Mouza Number (English) <i class="text-danger">*</i></label>
                                    <input type="text" id="mouza_no_en" class="form-control" value="{{ old('mouza_no_en')}}" name="mouza_no_en">
                                    @if($errors->has('mouza_no_en'))
                                        <span class="text-danger"> {{ $errors->first('mouza_no_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="mouza_no_bn">Mouza Number (Bangla)</label>
                                    <input type="text" id="mouza_no_bn" class="form-control" value="{{ old('mouza_no_bn')}}" name="mouza_no_bn">
                                    @if($errors->has('mouza_no_bn'))
                                        <span class="text-danger"> {{ $errors->first('mouza_no_bn') }}</span>
                                    @endif
                                </div>
                            </div>
                              
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="rs_no_en">RS Number (English) <i class="text-danger">*</i></label>
                                    <input type="text" id="rs_no_en" class="form-control" value="{{ old('rs_no_en')}}" name="rs_no_en">
                                    @if($errors->has('rs_no_en'))
                                        <span class="text-danger"> {{ $errors->first('rs_no_en') }}</span>
                                    @endif
                                </div>
                            </div>  
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="rs_no_bn">RS Number (Bangla)</label>
                                    <input type="text" id="rs_no_bn" class="form-control" value="{{ old('rs_no_bn')}}" name="rs_no_bn">
                                    @if($errors->has('rs_no_bn'))
                                        <span class="text-danger"> {{ $errors->first('rs_no_bn') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="rs_image">RS Image</label>
                                    <input type="file" id="rs_image" class="form-control" placeholder="Image" name="rs_image">
                                </div>
                            </div> 
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="bs_no_en">BS Number (English)<i class="text-danger">*</i> </label>
                                    <input type="text" id="bs_no_en" class="form-control" value="{{ old('bs_no_en')}}" name="bs_no_en">
                                    @if($errors->has('bs_no_en'))
                                        <span class="text-danger"> {{ $errors->first('bs_no_en') }}</span>
                                    @endif
                                </div>
                            </div>  
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="bs_no_bn">BS Number (Bangla)</label>
                                    <input type="text" id="bs_no_bn" class="form-control" value="{{ old('bs_no_bn')}}" name="bs_no_bn">
                                    @if($errors->has('bs_no_bn'))
                                        <span class="text-danger"> {{ $errors->first('bs_no_bn') }}</span>
                                    @endif
                                </div>
                            </div>  
                       
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="bs_image">BS Image</label>
                                <input type="file" id="bs_image" class="form-control" placeholder="Image" name="bs_image">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="rs_no_en">Registration Number (English) <i class="text-danger">*</i></label>
                                <input type="text" id="registration_no_en" class="form-control" value="{{ old('registration_no_en')}}" name="registration_no_en">
                                @if($errors->has('registration_no_en'))
                                    <span class="text-danger"> {{ $errors->first('registration_no_en') }}</span>
                                @endif
                            </div>
                        </div> 
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="registration_no_bn">Registration Number (Bangla)</label>
                                <input type="text" id="registration_no_bn" class="form-control" value="{{ old('registration_no_bn')}}" name="registration_no_bn">
                                @if($errors->has('registration_no_bn'))
                                    <span class="text-danger"> {{ $errors->first('registration_no_bn') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="registration_image">Registration Image</label>
                                <input type="file" id="registration_image" class="form-control" placeholder="Image" name="registration_image">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="land_area">Land Area</label>
                                <input type="text" id="land_area" class="form-control" value="{{ old('land_area')}}" name="land_area">
                                @if($errors->has('land_area'))
                                    <span class="text-danger"> {{ $errors->first('land_area') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="acquire_date">Acquire Date</label>
                                <input type="text" id="acquire_date" class="form-control" value="{{ old('acquire_date')}}" name="acquire_date">
                                @if($errors->has('acquire_date'))
                                    <span class="text-danger"> {{ $errors->first('acquire_date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="original_owner_details">Owner Details</label>
                                <input type="text" id="original_owner_details" class="form-control" value="{{ old('original_owner_details')}}" name="original_owner_details">
                                @if($errors->has('original_owner_details'))
                                    <span class="text-danger"> {{ $errors->first('original_owner_details') }}</span>
                                @endif
                            </div>
                        </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input type="text" id="price" class="form-control" value="{{ old('price')}}" name="price">
                                    @if($errors->has('price'))
                                        <span class="text-danger"> {{ $errors->first('price') }}</span>
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
