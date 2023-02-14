@extends('layouts.app')
@section('content')
<section class="search_area col-md-12" style="padding-bottom: 10px;">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 mr-auto form-group">
                <div class="page_title">Add Item</div>
            </div>

        </div>
    </div>
</section>

<section class="add_user_area">

    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('topic.saveitem')}}">
            @csrf
			<input type="hidden" name="topic_id" value="{{ $topic_id }}">
			 <div class="input-style">
				 <div class="row" style="padding: 10px;">
					<div class="col-lg-6 col-md-6">
						<label class="email_label" style="margin-bottom:10px">{{ __('Question') }}</label>
						<input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question" autofocus>

						@error('option1')
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
						<label class="email_label" style="margin-bottom:10px">{{ __('Option 1') }}</label>
						<input id="option1" type="text" class="form-control @error('option1') is-invalid @enderror" name="option1" value="{{ old('option1') }}" required autocomplete="option1" autofocus>

						@error('option1')
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
						<label class="email_label" style="margin-bottom:10px">{{ __('Option 2') }}</label>
						<input id="option2" type="text" class="form-control @error('option2') is-invalid @enderror" name="option2" value="{{ old('option2') }}" required autocomplete="option2" autofocus>

						@error('option2')
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
						<label class="email_label" style="margin-bottom:10px">{{ __('Option 3') }}</label>
						<input id="option3" type="text" class="form-control @error('option3') is-invalid @enderror" name="option3" value="{{ old('option3') }}" required autocomplete="option2" autofocus>

						@error('option3')
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
						<label class="email_label" style="margin-bottom:10px">{{ __('Option 4') }}</label>
						<input id="option4" type="text" class="form-control @error('option4') is-invalid @enderror" name="option4" value="{{ old('option4') }}" required autocomplete="option4" autofocus>

						@error('option4')
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
							<label class="email_label" style="margin-bottom:10px">{{ __('Select Correct Option') }}</label>
							<Select name="correctoption" id="correctoption" class="form-control @error('correctoption') is-invalid @enderror" value="{{ old('correctoption') }}" required autocomplete="correctoption" autofocus>
								<option value="answer_1" selected>Option1</option>
								<option value="answer_2">Option2</option>
								<option value="answer_3">Option3</option>
								<option value="answer_4">Option4</option>
							</select>
							@error('correctoption')
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
							<label class="email_label" style="margin-bottom:10px">{{ __('Select Assessment Type') }}</label>
							<Select name="assessmenttype" id="assessmenttype" class="form-control @error('assessmenttype') is-invalid @enderror" value="{{ old('assessmenttype') }}" required autocomplete="assessmenttype" autofocus>
								<option value="pre" selected>Pre Assessment</option>
								<option value="post">Post Assessment</option>
							</select>
							@error('assessmenttype')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
				</div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>


    </div>

</section>

<script type="text/javascript">
        tinymce.init({
            selector: 'textarea#activityContent',
            
        });
/*$("#contentlevel").change(function() {
  if ($(this).val() == "Bloom") {
    $('#bloom-id').show();
  } else {
    $('#bloom-id').hide();
	$('#solo-id').show();
  }
});	*/
document.getElementById('taxonomy').addEventListener("change", function (e) {
    if (e.target.value === 'Solo') {
        document.getElementById('bloom-id').style.display = 'none';
        document.getElementById('solo-id').style.display = 'block';
    } else {
        document.getElementById('solo-id').style.display = 'none';
        document.getElementById('bloom-id').style.display = 'block'
    }
});
</script>

@endsection
    
