@extends('layouts.app')


@section('content')

<section class="counts-container mb-3">
    
    <div class="row mb-3">
        <div class="col-lg-10 col-md-10 pagetitle ps-lg-0">
          <h1 class="page_heading">Add User </h1>
<!--          <span class="page_sub_heading">*  Provincial government License FEE RS. 25,000/- and Renewal RS 15,000/-</span>-->
        </div>
        <div class="col-lg-2 col-md-2 pe-lg-0">
<!--            <button  type="submit" class="btn btn-adduser float-end">Submit</button>-->
        </div>
    </div>
        
    <div class="row">
        <div class="card">
            <div class="card-body">
        
            <div class="container-fluid">
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

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required value="{{old('name')}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" required value="{{old('username')}}">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Province</label>
                                <select class="form-control" id="province" name="province_id" readonly>
                                    <option>--Select--</option>
                                    @foreach($provinces as $p)
                                    <option {{ $p->id  ==  6 ? "selected" : "" }} value="{{ $p->id }}">{{ $p->province_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">District</label>
                                <select class="form-control" id="district" name="district">
                                    <option>--Select--</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Password</label>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="">Confirm Password</label>
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <section class="row bg-gray" style="padding: 20px;">
                                <div class="col-md-3 form-group mb-md-0">
                                    <div class="roles_titles">Roles</div>
                                    <ul class="list-unstyled">

                                        @foreach($roles as $r)
                                            @if($r->id != 1)
                                                <li class="list-item">
                                                    <input name="roles" value="{{ $r->id }}" type="radio"> &nbsp; {{ $r->name }}
                                                </li>
                                            @endif

                                        @endforeach
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                        </div>

                        <div class="col-md-3 form-group">
                            <button style="margin-top:25px" type="submit" class="btn btn-success btn-block">Submit</button>
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
        // $('#province').on('change', function(e) {
            var province_id = 6;
            $.ajax({
                url: "{{ route('district') }}",
                type: "POST",
                data: {
                    province_id: province_id
                },
                success: function(data) {
                    $('#district').empty();
                    $.each(data.districts, function(index, district) {
                        $('#district').append('<option value="' + district.district_id + '">' + district.district_name + '</option>');
                    })
                }
            })
        // });

    });
</script>


@endsection
