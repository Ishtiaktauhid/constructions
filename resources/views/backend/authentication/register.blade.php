@extends('backend.layout.appAuth')
@section('content')
<div class="col-xl-12">
    <div class="auth-form">
        <h4 class="text-center mb-4">Sign up your account</h4>
        <form action="{{route('register.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="FullName"><strong>Full Name</strong></label>
                <input type="text" class="form-control" placeholder="username" name="FullName" id="FullName">
                @if($errors->has('FullName'))
                    <small class="d-block text-danger">
                            {{$errors->first('FullName')}}
                    </small>
                @endif
            </div>
            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input type="email" class="form-control" placeholder="enter your email" name="EmailAddress" id="email">
                @if($errors->has('EmailAddress'))
                    <small class="d-block text-danger">
                            {{$errors->first('EmailAddress')}}
                    </small>
                @endif
            </div>
            <div class="form-group">
                <label for="contact"><strong>Contact</strong></label>
                <input type="text" class="form-control" placeholder="enter your phone number" name="contact_no_en" id="contact">
                @if($errors->has('contact_no_en'))
                    <small class="d-block text-danger">
                            {{$errors->first('contact_no_en')}}
                    </small>
                @endif
            </div>
            <div class="form-group">
                <label for="password"><strong>Password</strong></label>
                <input type="password" class="form-control"  placeholder="enter your password" name="password" id="password"> 
                @if($errors->has('password'))
                    <small class="d-block text-danger">
                            {{$errors->first('password')}}
                    </small>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation"><strong>Confirm Password</strong></label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
            </div>
        </form>
        <div class="new-account mt-3">
            <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a></p>
        </div>
    </div>
</div>
@endsection