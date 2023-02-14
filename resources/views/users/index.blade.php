
@extends('layouts.app')


@section('content')
<section class="search_filters mt-4">
    
    <div class="row mb-3">
        <div class="col-lg-10 col-md-10 pagetitle ps-lg-0">
          <h1 class="page_heading">User Management</h1>
        </div>
        <!--<div class="col-lg-2 col-md-2 pe-lg-0">
          <a href="{{ route('users.create') }}" class="btn btn-adduser float-end">New User</a>
        </div>-->
      </div>
    
    <div class="card">                       
                
            <div class="table-responsive">
                
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
                @endif
                
                <table class="table table-stripped table-hover primary-table mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Roles</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                
                                @foreach ($data as $key => $user)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $user->name }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td>{{ $user->username }}</td>
                                      <td>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success" style="color:green;">{{ $v }}</label>
                                        @endforeach
                                        @endif
                                      </td>
                                      <td style="width: 200px">                 
                                        @if($user->is_deleted == 0)

                                        <?php $rowRoleID = $objController->checkUserRole($user->user_id) ?>                                                                                                                  
                                                                                
                                        
                                        @if($isSuperAdminRole)
                                        <a class="dropdown-item" href="{{ route('users.edit',$user->user_id) }}"><i class="bi bi-pencil-square"></i></a>
                                        <a class="dropdown-item1" onclick="confirmDeleteOperation()" style="color: #013F6A; font-size: 14px;" href="{{ route('users.delete',$user->user_id) }}"><i class="bi bi-x-square-fill"></i></a>
<!--                                        <a class="dropdown-item" style="color: #013F6A; font-size: 14px;" href="{{ route('users.show',$user->user_id) }}"><i class="bi bi-eye-fill"></i></a>-->
                                        @endif

                                        @endif

                                        @if($user->is_deleted)
                                        <spam style="color: red">Deleted Record</spam>
                                        @endif
                                      </td>
                                    </tr>
                                    @endforeach                                                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                  <td colspan="9" class="pagination float-end">
                                    <div class="col-md-7 col-sm-12 right">
                                        <div class=" pull-right" id="pagination">
                                            @if(count($data) > 0)
                                            {!!
                                            $data->appends(
                                            [
                                                'district_id'=> 22,
                                                'division_id'=> 1
                                            ]
                                            )->links('pagination::bootstrap-4')
                                            !!}
                                            @endif
                                        </div>
                                    </div>
                                  </td>                                  
                                </tr>
                              </tfoot>
                        </table>                                
              </div>
        
    </div>
        
</section>


<script type="text/javascript">
  function confirmDeleteOperation() {
    if (confirm('Are you sure you want to delete this user?'))
      return true;
    else
      return false;
  }
</script>


<link rel="stylesheet" type="text/css" href="{{ asset('css/component-chosen.css') }}">
<script src="{{ asset('js/chosen.jquery.min.js') }}"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('#users_listing').DataTable();
  });

  
  
</script>
@endsection
