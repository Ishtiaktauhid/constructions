@extends('backend.layout.appAuth')
@section('content')
<div class="col-xl-12">
    <div class="auth-form">
        <h4 class="text-center mb-4">Sign in your account</h4>
        <form action="{{route('login.check')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username"><strong>Email/Contact</strong></label>
                <input type="text" class="form-control" placeholder="Enter your Email Or Contact Number" name="username" id="username">
                @if($errors->has('username'))
                <small class="d-block text-danger">
                    {{$errors->first('username')}}
                </small>
            @endif
            </div>
            <div class="form-group">
                <label for="password"><strong>Password</strong></label>
                <input type="password" class="form-control" placeholder="Enter Your Password" name="password" id="password">
                @if($errors->has('password'))
                <small class="d-block text-danger">
                    {{$errors->first('password')}}
                </small>
            @endif
            </div>
            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                <div class="form-group">
                    <div class="form-check ml-2">
                        <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                        <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                    </div>
                </div>
                <div class="form-group">
                    <a href="page-forgot-password.html">Forgot Password?</a>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
            </div>
        </form>
        <div class="new-account mt-3">
            <p>Don't have an account? <a class="text-primary" href="{{route('register')}}">Sign up</a></p>
        </div>
    </div>
@endsection