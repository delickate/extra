@extends('layouts.app')
@section('content')

<section class="counts-container mb-3">
    
    <div class="row mb-3">
        <div class="col-lg-10 col-md-10 pagetitle ps-lg-0">            
                <h1 class="page_heading">Roles Listing</h1>
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
        <div class="row">
          <div class="col-md-12">


            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif


            <table id="roles_listing" class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
<!--                  <th>Permissions</th>-->
<!--                  <th width="280px">Action</th>-->
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $role)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $role->name }}</td>
<!--                  <td>
                    @if(!empty($role->permissions))
                    @foreach($role->permissions as $p)
                    <label class="badge badge-success">{{ $p->name }}</label>
                    @endforeach
                    @endif
                  </td>-->

<!--                  <td>
                    @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @endcan

                    @can('role-delete')
                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!} --}}
                    {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                    {{-- {!! Form::close() !!} --}}
                    @endcan
                  </td>-->
                </tr>
                @endforeach

              </tbody>
            </table>

          </div>
        </div>
      </div>
            </div>
        </div>
  </div>
    
    </section>
  

<script type="text/javascript">
  $(document).ready(function() {
    $('#roles_listing').DataTable();
  })
</script>
@endsection