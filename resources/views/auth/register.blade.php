@extends('layouts.register')

@section('content')
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input name="role" type="hidden" value="teacher">
        <div class="body">
            <div class="input-style">
                <h4 class="tms">
                    <strong>{{ __('Teacher Registration') }}</strong>
                </h4>
            </div>
            <div class="input-style">
                <label class="email_label">{{ __('CNIC/Passport') }}<span class="text-danger">*</span></label>
                <input id="cnic" type="text" maxlength="15" data-inputmask="'mask': '99999-9999999-9'" placeholder="0000-0000000-0" class="form-control @error('cnic') is-invalid @enderror" name="cnic" value="{{ old('cnic') }}" required autocomplete="CNIC" autofocus>

                @error('cnic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                
            </div>
            <div class="input-style">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label class="email_label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6">
                    <label class="email_label">{{ __("Father's Name") }}</label>
                    <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" required autocomplete="Father Name" autofocus>

                    @error('father_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="input-style">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label class="email_label">{{ __("Mobile Number") }}</label>
                        <input id="mobile" maxlength="13" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="Mobile Number" autofocus>

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="email_label">{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>    
                </div>
            </div>
                        
            <div class="input-style">
                <label class="email_label">{{ __('Username') }}</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-style">
                <label class="email_label">{{ __('Subject') }}</label>
                <!--<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">-->
                    <select class="form-control" id="subject_id" name="subject_id" required>
                        <option value="0">All</option>
                        @foreach($subjects as $d)
                        <option {{ old('username') == $d->subject_id  ? "selected" : "" }} value="{{ $d->subject_id }}">{{ $d->subject_name }}</option>
                        @endforeach
                    </select>
                
                
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="input-style">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <label class="email_label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="email_label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                
            </div>                        
        </div>
        <div class="input-style">                               
            <button type="submit" class="btn btn-primary btn-login">{{ __('Register') }}</button>
        </div>
        <div class="input-style">
            <p class="text-center register mb-0">
                Already have account ?<a href="{{route('login')}}" class="ps-2">Signin</a></p>
        </div>
    </form>


@endsection

