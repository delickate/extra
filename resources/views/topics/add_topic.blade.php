@extends('layouts.app')
@section('content')
    <form action="{{ route('topic.savetopic',['course_id' => $course_id])}}" method="post">
        @csrf
        <input name="role" type="hidden" value="teacher">
        <div class="body">
            <div class="input-style">
                <h4 class="tms">
                    <strong>{{ __('Add Topic') }}</strong>
                </h4>
            </div>
            <div class="input-style">
              <div class="row" style="padding: 10px;">
                <div class="col-lg-6 col-md-6">
                    <label class="email_label" style="margin-bottom:10px">{{ __('Topic Title') }}</label>
                    <input id="topictitle" type="text" class="form-control @error('topictitle') is-invalid @enderror" name="topictitle" value="{{ old('toptictitle') }}" required autocomplete="name" autofocus>

                    @error('topictitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
			</div>
			</div>
			<div class="input-style">
				<div class="row" style="padding: 10px;">
					<div class="col-lg-6 col-md-6">
						<label class="email_label" style="margin-bottom:10px">{{ __('Topic Description') }}</label>
						<textarea id="topicdesc" class="form-control @error('topicdesc') is-invalid @enderror" name="topicdesc" autofocus>
							@if(isset($topicdesc))

								{{ $topicdesc }}

							@endif
						</textarea>

						@error('topicdesc')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>	
             </div> 
        <div class="input-style" style="padding-left: 30px; padding-top:10px">                               
            <button type="submit" class="btn btn-primary btn-login">{{ __('Add Topic') }}</button>
        </div>
	</div>
    </form>
@endsection

