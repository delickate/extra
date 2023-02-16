@extends('layouts.app')
@section('content')
<section class="search_area col-md-12" style="padding-bottom: 10px;">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 mr-auto form-group">
                <div class="page_title">Create/Update Activity</div>
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

        <form id="teacher_form" method="POST" action="{{ route('savestudent') }}">
            @csrf
			 
			 <div class="input-style">
				 <div class="row" style="padding: 10px;">
					<div class="col-lg-6 col-md-6">
						<label class="name_label" style="margin-bottom:10px">{{ __('Name') }}</label>
						<input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ old('student_name') }}" required autocomplete="student_name" autofocus>

						@error('student_name')
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
						<label class="name_label" style="margin-bottom:10px">{{ __('Father Name') }}</label>
						<input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" required autocomplete="father_name" autofocus>

						@error('father_name')
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
							<label class="email_label" style="margin-bottom:10px">{{ __('Select Content Level') }}</label>
							<Select name="contentlevel" id="contentlevel" class="form-control @error('contentlevel') is-invalid @enderror" value="{{ old('contentlevel') }}" required autocomplete="contentlevel" autofocus>
								<option value="Easy" selected>Easy</option>
								<option value="Medium">Medium</option>
								<option value="Hard">Hard</option>
								<option value="Expert">Expert</option>
							</select>
							@error('contentlevel')
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
							<label class="email_label" style="margin-bottom:10px">{{ __('Content Level Value') }}</label>
							<input type="text" name="contentlevelValue" id="contentlevelValue" class="form-control @error('contentlevelValue') is-invalid @enderror" value="{{ old('contentlevelValue') }}" required onblur="validateValue(this)" />
								
							@error('contentlevelValue')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
				</div>
				<?php
if(!empty($courses))
{				 
	foreach($courses as $crs)
	{
?>
		<input type="checkbox" name="course[]" value="<?php echo $crs->course_id; ;?>" checked> <?php echo $crs->course_name; ?><br >
<?php		
	}
}
				?>
				
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>

<br /><br /><br /><br />
    </div>

</section>

<script type="text/javascript">
        tinymce.init({
            selector: '#activityContent',
            
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

function validateValue(myVal)
{
	//Set range on bases of level
	let min_value = 0;
	let max_value = 100;
	//Get selected level
	const level_mode = $("#contentlevel").val();
	//Get inserted weightage
	const weightage = $(myVal).val();
    //specify the lavel range
	switch(level_mode)
	{
		case 'Easy':  min_value=1;  max_value=25;break;
		case 'Medium':min_value=26; max_value=50;break;
		case 'Hard':  min_value=51; max_value=75;break;	
		case 'Expert':min_value=76; max_value=100;break;	
	}
	//Check if inserted weightage is between range
	if(weightage >= min_value && weightage <= max_value )
	{
		//all good. 
	}else{
            //insert weightage again.
		    $(this).val('');
		    $(this).focus();
		    alert("Conent level value "+weightage+" should be between "+min_value+" - "+max_value);
	     }
}

$(document).ready(function(){
	$('#submitbutton').click(function(){
		$('#teacher_form').submit();
	})
})
</script>

@endsection
    
