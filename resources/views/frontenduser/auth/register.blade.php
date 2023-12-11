@extends('layout.app')
@section('content')
     
<main class="main-content  mt-0">
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign Up</h4>
                <div class="row mt-3">
                  <div class="col-2 text-center ms-auto">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-facebook text-white text-lg"></i>
                    </a>
                  </div>
                  <div class="col-2 text-center px-1">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-github text-white text-lg"></i>
                    </a>
                  </div>
                  <div class="col-2 text-center me-auto">
                    <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-google text-white text-lg"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" action="{{route('register.store')}}" method="post">
                @csrf
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label" for="FullName">Name</label>
                  <input type="text" class="form-control" name="FullName" value="{{old('FullName')}}">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label" for="contact_no_en">Contact</label>
                  <input type="text" class="form-control" name="contact_no_en" value="{{old('contact_no_en')}}">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label" for="email">Email</label>
                  <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" class="form-control" name="password" value="{{old('password')}}">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label" for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="form-check form-check-info text-start ps-0">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-2 text-sm mx-auto">
                Already have an account?
                <a href="{{route('login')}}" class="text-primary text-gradient font-weight-bold">Sign in</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</main>
@endsection