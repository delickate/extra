@extends('layouts.app')


@section('content')

<section class="counts-container mb-3">
    
    <div class="row mb-3">
        <div class="col-lg-10 col-md-10 pagetitle ps-lg-0">
          <h1 class="page_heading">Profile </h1>
        </div>
        <div class="col-lg-2 col-md-2 pe-lg-0">
        </div>
    </div>
        
    <div class="row">
        <div class="card">
            <div class="card-body">
        
            <div class="container-fluid">
         

                <form method="POST" action="{{ route('teacher.updates', $old->user_id) }}">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required value="{{old('name',$old->name)}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" disabled="" class="form-control" value="{{old('email',$old->email)}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Phone</label>
                                <input type="text" name="mobile" class="form-control" value="{{old('mobile',$old->mobile)}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" disabled="" value="{{old('username',$old->username)}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Subject</label>
                                <select class="form-control" id="province" name="subject_idFK">
                                    <option>--Select--</option>
                                    @foreach($subjects as $p)
                                    <option {{ $p->subject_id  ==  $old->subject_idFK ? "selected" : "" }} value="{{ $p->subject_id }}">{{ $p->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                
                        <div class="col-md-5 form-group">
                            <button style="margin-top:25px" type="submit" class="btn btn-success btn-block">Submit</button>
							<p class="text-left register mb-0">   <a href="{{ route('changepassword') }}" class="ps-2">Change Password</a> </p>
                        </div>
                    </div>
                    <form>
            </div>
    </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    $(document).ready(function() {
        
    });
</script>


@endsection
