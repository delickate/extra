@extends('layouts.app')
@section('content')

<section class="counts-container mb-3">
    
    <div class="row mb-3">
        <div class="col-lg-10 col-md-10 pagetitle ps-lg-0">            
                <h1 class="page_heading">Edit Role</h1>
<!--          <span class="page_sub_heading">*  Provincial government License FEE RS. 25,000/- and Renewal RS 15,000/-</span>-->
        </div>
        <div class="col-lg-2 col-md-2 pe-lg-0">
            @can('role-create')
<!--                <a href="{{ route('roles.create') }}" class="btn btn-adduser float-end"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Add Role</a>-->
            @endcan  
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

                <form method="POST" action="{{ route('roles.update' , $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="">Name</label>
                                <input value="{{ old('name', $role->name) }}" type="text" name="name" class="form-control" required>
                            </div>
                        </div>
<!--                        <div class="col-md-12">
                            <section class="row bg-gray" style="padding: 20px;">
                                <div class="col-md-3 form-group mb-md-0">
                                    <div class="roles_titles">Permissions</div>
                                    <ul class="list-unstyled">

                                        @foreach($permission as $value)
                                        <li class="list-item">
                                            <input name="permission[]" value="{{ $value->name }}" type="checkbox" @if( in_array($value->id, $rolePermissions) ) checked @endif
                                            > &nbsp; {{ $value->name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </section>
                        </div>-->

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

@endsection