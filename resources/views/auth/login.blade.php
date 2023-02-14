@extends('layouts.login')

@section('content')
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="body">
            <div class="input-style">
               
                    <span class="tms">IntelliTut</span>
            </div>
            <div class="input-style">
                <label class="email_label">Username</label>
                <div class="input-group">
                  <i class="bi bi-person"></i>
                  <input id="username" placeholder="Username" type="text" class="form-control login-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                </div>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-style">
                <label class="email_label">Password</label>
                <div class="input-group">
                  <i class="bi bi-lock"></i>
                  <input id="password" placeholder="******" type="password" class="form-control login-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>          
            
<!--            <div class="col-md-12 form-group">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                {{ __('Remember Me') }}
            </div>-->
            
            <!-- <div class="input-style">
              <div class="col-lg-6 col-md-6 pl-0">
                <input type="checkbox" name="remember_me"/> 
                <span class="remember">Remember me</span>
              </div>
              <div class="col-lg-6 col-md-6 pr-0">
                <p class="text-right forgot mb-0">
                  <a href="#">Reset password?</a>
                </p>
              </div> 
              <div class="clearfix"></div>                               
            </div> -->
        </div>
        <div class="input-style">                               
            <button type="submit" class="btn btn-primary btn-login">{{ __('Login') }}</button>
        </div>
        <div class="input-style">
            <p class="text-center register mb-0">
                Don't have account ? </p>
               <p class="text-center register mb-0">   <a href="{{ route('register-student') }}" class="ps-2">Signup as Student</a> </p>
                <p class="text-center register mb-0">  <a href="{{ route('register') }}" class="ps-2">Signup as Teacher</a> </p>
            </p>
        </div>
    </form>
@endsection