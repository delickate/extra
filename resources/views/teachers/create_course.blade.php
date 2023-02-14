@extends('layouts.app')
@section('content')
    <form action="{{ route('teacher.addcourse') }}" method="post">
        @csrf
        <input name="role" type="hidden" value="teacher">
        <div class="body">
            <div class="input-style">
                <h4 class="tms">
                    <strong>{{ __('Create Course') }}</strong>
                </h4>
            </div>
            <div class="input-style">
              <div class="row" style="padding: 10px;">
                <div class="col-lg-6 col-md-6">
                    <label class="email_label" style="margin-bottom:10px">{{ __('Course Name') }}</label>
                    <input id="coursename" type="text" class="form-control @error('coursename') is-invalid @enderror" name="coursename" value="{{ old('coursename') }}" required autocomplete="name" autofocus>

                    @error('coursename')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
             </div> 
        <div class="input-style" style="padding-left: 30px; padding-top:10px">                               
            <button type="submit" class="btn btn-primary btn-login">{{ __('Create Course') }}</button>
        </div>
    </form>
@endsection

