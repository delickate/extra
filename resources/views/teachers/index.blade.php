@extends('layouts.app')

@section('content')
<style>
    #alertError,#alertSuccess{
        display:none;
    }
</style>
<section class="search_filters mt-4">
    
    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
          <h1 class="page_heading">Registration of New License</h1>
        </div>
        @if ( Auth::user()->hasRole('company') )
        <div class="col-lg-4 col-md-4">
          <a href="{{ route('companies.create') }}" class="btn btn-lg btn-adduser float-end">New Registration</a>
        </div>
        
        @endif
    </div>
        
    <div class="row mb-3">
        <div id="alertError" class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            Could not reach server, please try again later.
        </div>

        <div id="alertSuccess" class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <span id="ajaxMessage">Company status has been successfully updated!</span>
        </div>
    </div>
    
    
    <div class="card">
                        
<!--        <div class="card-body pb-0">
            <div class="row">
              <div class="col-lg-4 col-md-4 mb-3">
                <select class="form-select">
                  <option>Division</option>
                  <option>Division 1</option>
                  <option>Division 2</option>
                </select>
              </div>
              <div class="col-lg-4 col-md-4 mb-3">
                <select class="form-select">
                  <option>District</option>
                  <option>District 1</option>
                  <option>District 2</option>
                </select>
              </div>
              <div class="col-lg-4 col-md-4 mb-3">
                <select class="form-select">
                  <option>Role</option>
                  <option>Role 1</option>
                  <option>Role 2</option>
                </select>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-lg-4 col-md-4 mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
              <div class="col-lg-4 col-md-4 mb-3">
                <input type="text" name="cnic" class="form-control" placeholder="CNIC">
              </div>
              <div class="col-lg-4 col-md-4 mb-3">
                <button class="btn btn-primary btn-search">Search</button>
              </div>
            </div>
          </div>-->

        
            <div class="table-responsive">
                
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
                @endif
                
                <table class="table table-stripped table-hover primary-table mb-0">
                            <thead class="text-center">
                                <tr>                                    
                                        <th>Company Name</th>  
                                        <th>Case Type</th>  
                                        <th>Current Status</th>
                                    @if( Auth::user()->hasRole('company') )                                        
                                        <th>Download Challan</th>
                                    @endif
                                    
                                    @if ( Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('home-department') )                                                                                                                                                        
                                        <th>Challan Generated</th>  
                                        <th>Payment Status</th>
                                        <th>Credential Report</th>
                                    @endif                                                                                                          
                                        <th>Action</th>                                                                                                            
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                if (count($data) > 0) {
                                    $serial = $data->perPage() * ($data->currentPage() - 1); //get the start integer
                                    $serial++;
                                }
                                ?>
                                @foreach ($data as $key => $shelterhome) 
                                <tr>
                                    <td>{{ $shelterhome->company_name }}</td> 
                                    <td>{{ $shelterhome->case_type }}</td>
                                    
                                    <td class="text-center">
                                        <span class="btn btn-sm white-color btn-outline-danger pb-1 pr-1 pl-1 pt-1">
                                            
                                            @if ($shelterhome->license_status === 1)
                                                Approved by SS
                                            @elseif ( $shelterhome->as_approval == 1 )
                                                Approved by AS
                                            @elseif ( $shelterhome->ds_approval == 1 )
                                                Approved by DS   
                                            @elseif ( $shelterhome->so_approval == 1 )
                                                Approved by SO
                                            @elseif ( $shelterhome->is_payment_submitted == 0 )    
                                                Payment Pending
                                            @elseif ( $shelterhome->is_payment_submitted == 1 )    
                                                Home Department
                                            @elseif ( $shelterhome->license_status == 1 )
                                                Approve
                                            @else
                                                Applicant
                                            @endif                                                                                        
                                            
                                        </span>
                                    </td>
                                    
                                    @if( Auth::user()->hasRole('company') )
                                        
                                        @if($shelterhome->is_challan_generated == '1')                                    
                                            <td>
                                                <a href="{{ asset('/images/Payment Challan.pdf') }}" download> <img style="width:75px;height:30px;" src="{{ asset('/images/pdf.png') }}" alt="PDF"> </a>
                                            </td>
                                        @else
                                            <td> Pending </td>
                                        @endif
                                    @endif 
                                                                        
                                                                        
                                    @if ( Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('home-department') || Auth::user()->hasRole('so') || Auth::user()->hasRole('ds') || Auth::user()->hasRole('as') || Auth::user()->hasRole('ss') )  
                                        
                                        @if( Auth::user()->hasRole('home-department') || Auth::user()->hasRole('super-admin'))
                                            <td>                                        
                                                {{ ($shelterhome->is_challan_generated == 1 ? 'Yes' : 'No')  }}
                                            </td> 
                                        @endif
                                        
                                        @if ( Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('home-department') )
                                            @if($shelterhome->is_payment_submitted == '1')
                                            <td class="text-center">
                                                <span class="btn btn-sm white-color btn-outline-success pb-1 pr-1 pl-1 pt-1" >Paid</span>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <span class="btn btn-sm white-color btn-outline-danger pb-1 pr-1 pl-1 pt-1" >  {{ ( $shelterhome->is_challan_generated == 1 ? 'Unpaid': 'Pending') }} </span>
                                            </td>
                                            @endif   
                                        @endif
                                          
                                        @if ( Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('home-department') )
                                        <td class="text-center">
                                            @if($shelterhome->dom_credential_report != '')
                                          
                                                <a href="{{ asset($shelterhome->dom_credential_report) }}" download> <img style="width:75px;height:30px;" src="{{ asset('/images/pdf.png') }}" alt="PDF"> </a>
                                            
                                            @else
                                           
                                                <span class="btn btn-sm white-color btn-outline-danger pb-1 pr-1 pl-1 pt-1" > Pending </span>
                                           
                                            @endif   
                                        </td>
                                        @endif
                                        
                                                                                
<!--                                        @if( $shelterhome->ss_approval == 'reject' )
                                            <td><i class="bi bi-chat-dots btn-outline-danger remarks" data-remarks='{{ $shelterhome->ss_remarks }}'></i></td>
                                        @elseif( $shelterhome->ss_approval == 'approve' )
                                            <td><i class="bi bi-check2-square btn-outline-success"></i></td>  
                                        @else
                                            <td><i class="bi bi-three-dots"></i></td>
                                        @endif-->
                                        
                                    @endif                                                                           
                                    
<!--                                    <td>{{ $loop->iteration }}</td>-->
<!--                                    <td title="{{ $serial }}">{{ $serial++ }} </td> -->
<!--                                    <td>{{ $shelterhome->user->cnic }}</td> -->
<!--                                    <td>{{ $shelterhome->district->district_name }}</td>-->
<!--                                    <td>{{ $shelterhome->user->name }}</td>-->
<!--                                    <td>
                                        <a class="icon" href="#" data-bs-toggle="dropdown">
                                          <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                          <li><a class="dropdown-item" href="{{ route('companies.delete',$shelterhome->company_id) }}">Delete</a></li>
                                          <li><a class="dropdown-item" href="{{ route('companies.show',$shelterhome->company_id) }}">View</a></li>
                                          <li><a class="dropdown-item" href="{{ route('companies.edit',$shelterhome->company_id) }}">Edit</a></li>
                                        </ul>
                                    </td> -->                                   
                                                                         
                                    <td>
                                        
                                        <a class="dropdown-item1" style="display: table-cell;  padding: 10px;  text-align: center;" href="{{ route('companies.show',$shelterhome->company_id) }}"> View Details
<!--                                            <i class="bi bi-eye-fill"></i>-->
                                        </a>
                                                                                                                        
                                        @if( Auth::user()->hasRole('home-department') || Auth::user()->hasRole('supper-admin') )
                                        <a class="dropdown-item1 generateChallan" style="display: table-cell;  padding: 10px;  text-align: center;" href="#" data-id="{{ $shelterhome->company_id }}" data-user="{{ $shelterhome->created_by }}" data-name="{{ $shelterhome->company_name }}"> 
                                            Generate Challan
                                        </a>
                                        <a class="dropdown-item1 generateNotify" style="display: table-cell;  padding: 10px;  text-align: center;" href="{{ route('generatenotify', $shelterhome->company_id) }}" data-id="{{ $shelterhome->company_id }}" data-user="{{ $shelterhome->created_by }}" data-name="{{ $shelterhome->company_name }}"> 
                                            Submit Notify
                                        </a>
                                        @endif
                                        
                                        @if( Auth::user()->hasRole('so') || Auth::user()->hasRole('ds') || Auth::user()->hasRole('as') || Auth::user()->hasRole('ss') )  
                                        <a class="dropdown-item1 generateNotify2" style="display: table-cell;  padding: 10px;  text-align: center;" href="{{ route('generatenotify', $shelterhome->company_id) }}" data-id="{{ $shelterhome->company_id }}" data-user="{{ $shelterhome->created_by }}" data-name="{{ $shelterhome->company_name }}"> 
                                            View Noting
                                        </a>
                                        @endif
                                        
                                        @if( Auth::user()->hasRole('home-department') || Auth::user()->hasRole('supper-admin') || Auth::user()->hasRole('so') || Auth::user()->hasRole('ds') || Auth::user()->hasRole('as') || Auth::user()->hasRole('ss') )
                                        <a class="dropdown-item1 applicationObjection" style="display: table-cell;  padding: 10px;  text-align: center;" href="#" data-id="{{ $shelterhome->company_id }}" data-user="{{ $shelterhome->created_by }}" data-name="{{ $shelterhome->company_name }}"> 
                                            Objection on Application
                                        </a>                                        
                                        @endif
                                        
                                        <a class="dropdown-item1 applicationLog" style="display: table-cell;  padding: 10px;  text-align: center;" href="{{ route('logs', $shelterhome->company_id) }}" data-id="{{ $shelterhome->company_id }}" data-user="{{ $shelterhome->created_by }}" data-name="{{ $shelterhome->company_name }}"> 
                                            View Allegations
                                        </a>
                                        
                                         @if( Auth::user()->hasRole('ss') )
                                            <a class="dropdown-item1 approveFile" style="display: table-cell;  padding: 10px;  text-align: center;" href="#" data-id="{{ $shelterhome->company_id }}" data-user="{{ $shelterhome->created_by }}" data-name="{{ $shelterhome->company_name }}"> 
                                               Approve Application
                                           </a>
                                         @else
                                            <a class="dropdown-item1 moveFile" style="display: table-cell;  padding: 10px;  text-align: center;" href="#" data-id="{{ $shelterhome->company_id }}" data-user="{{ $shelterhome->created_by }}" data-name="{{ $shelterhome->company_name }}"> 
                                                Move File
                                            </a>
                                         @endif
<!--                                    <a class="dropdown-item1" style="color: #013F6A; font-size: 14px;" href="{{ route('companies.delete',$shelterhome->company_id) }}"><i class="bi bi-x-square-fill"></i></a>-->
                                                                           
                                                                                                                            
                                        @if( $shelterhome->is_challan_generated == '1' && Auth::user()->hasRole('company') )  
                                            <a class="dropdown-item1 uploadChallan" style="display: table-cell;  padding: 10px;  text-align: center;" href="#" data-id="{{ $shelterhome->company_id }}" data-name="{{ $shelterhome->company_name }}" data-challan_generated_by="{{ $shelterhome->challan_generated_by }}"> Upload Paid Challan </a>
                                        @endif
                                       
                                        @if(Auth::user()->hasRole('dom') && $shelterhome->dom_credential_report == '' )  
                                            <a class="dropdown-item1 uploadCredential" style="display: table-cell;  padding: 10px;  text-align: center;" href="#" data-id="{{ $shelterhome->company_id }}" data-name="{{ $shelterhome->company_name }}" data-challan_generated_by="{{ $shelterhome->challan_generated_by }}">
                                                Upload Credential Report
                                            </a>
                                        @endif
                                        
                                        @if(Auth::user()->hasRole('home-department') && $shelterhome->dom_credential_report != '' )  
                                            <a class="dropdown-item1 viewCredential" style="display: table-cell;  padding: 10px;  text-align: center;" href="{{ route('viewcredentialreport', $shelterhome->company_id) }}" data-id="{{ $shelterhome->company_id }}" data-name="{{ $shelterhome->company_name }}" data-challan_generated_by="{{ $shelterhome->challan_generated_by }}">
                                                View Credential Report
                                            </a>
                                        @endif
<!--                                    <a class="dropdown-item" href="{{ route('companies.edit',$shelterhome->company_id) }}"><i class="bi bi-pencil-square"></i></a>                                      -->
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
    
    
<!--    <div class="col-md-12 no-rounded mb-5 text-white">
        <div class="row ">
            <div class="col-md-12 text-center mb-3">
                <h2 class="page-title">Registration of New License</h2>
            </div>           
        </div>
        <div class="row">
            <p></p>
        </div>
    </div>-->
<!--    <div class="bg-white" style="padding: 10px 0;">
        <section class="listing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12 text-right mb-3">
                            <a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary"> New Registration </a>
                        </div>
                        
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>

                        @endif

                        <table id="shelterhomes_listing" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th> 
                                    <th>CNIC</th> 
                                    <th>District Name</th>
                                    <th>Company Name</th>
                                    <th>NTN No. </th> 
                                    <th>Case Type</th>  
                                    <th>Remarks</th>                
                                    <th>Current Status</th>
                                    <th>Created By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
//                                if (count($data) > 0) {
//                                    $serial = $data->perPage() * ($data->currentPage() - 1); //get the start integer
//                                    $serial++;
//                                }
                                ?>
                                @foreach ($data as $key => $shelterhome) 
                                <tr>
                                    {{--<td>{{ $loop->iteration }}</td>--}}
                                    <td title="{{ $serial }}">{{ $serial++ }} </td> 
                                    <td>{{ $shelterhome->user->cnic }}</td> 
                                    <td>{{ $shelterhome->district->district_name }}</td>
                                    <td>{{ $shelterhome->company_name }}</td>
                                    <td>{{ $shelterhome->ntn_number }}</td>
                                    <td>{{ $shelterhome->case_type }}</td> <td>{{ $shelterhome->remarks }}</td>
                                    <td class="text-center"><span class="bg-danger pb-1 pr-1 pl-1 pt-1">{{ ($shelterhome->status=='1' ? 'Pending':'Approve') }}</span></td>
                                    <td>{{ $shelterhome->user->name }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-primary btn-sm mr-1"
                                               href="{{ route('companies.edit',$shelterhome->company_id) }}">Edit </a>
                                            <a class="btn btn-primary btn-sm ml-1"
                                               href="{{ route('companies.show',$shelterhome->company_id) }}">View </a>
                                        </div>                    
                                        <div class="btn-group" role="group" aria-label="Basic example">  
                                            {{ Form::open(['method' => 'DELETE','route' => ['companies.destroy', $shelterhome->company_id],'style'=>'display:inline']) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                                            {{ Form::close() }}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
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
                </div>

            </div>
        </section>
    </div>-->
</section>

<div class="modal fade" id="objectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Allegations Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#objectionModal').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="messageForm">
          <div class="form-group">
            <label for="company-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="company_name" readonly="readonly">
            <input type="hidden" class="form-control" id="company_id" name="company_id" >
            <input type="hidden" class="form-control" id="company_approval" name="company_approval" >
<!--            <input type="hidden" class="form-control" id="approval_from" name="approval_from" >-->
            <input type="hidden" class="form-control" id="company_user" name="company_user" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Allegations Message:</label>
            <textarea class="form-control required" name="allegations" id="allegations" autofocus required ></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#objectionModal').modal('hide');">Close</button>
        <button type="button" class="btn btn-primary btn-submit-approval">Send message</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadChallanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bank Deposit Slip</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#uploadChallanModal').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="uploadChallanForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="upload-company-name" class="col-form-label">Company:</label>
            <input type="text" class="form-control" id="upload_company_name" name="upload_company_name" readonly="readonly">
            <input type="hidden" class="form-control" id="upload_company_id" name="upload_company_id" >
            <input type="hidden" class="form-control" id="challan_generated_by" name="challan_generated_by" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Upload Paid Slip:</label>
            <input type="file" required name="upload_paid_challan" id="upload_paid_challan" class="form-control" accept="image/gif, image/jpg, image/jpeg, image/png, application/pdf" value="{{old('upload_paid_challan')}}">
                 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#uploadChallanModal').modal('hide');">Close</button>
        <button type="button" class="btn btn-primary btn-submit-slip">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadCredentialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload credential report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#uploadCredentialModal').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="uploadCredentialForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="upload-company-name" class="col-form-label">Company:</label>
            <input type="text" class="form-control" id="credential_company_name" name="credential_company_name" readonly="readonly">
            <input type="hidden" class="form-control" id="credential_company_id" name="credential_company_id" >
            <input type="hidden" class="form-control" id="credential_generated_by" name="credential_generated_by" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Upload Credential Report</label>
            <input type="file" required name="dom_credential_report" id="dom_credential_report" class="form-control" accept="image/gif, image/jpg, image/jpeg, image/png, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" value="{{old('dom_credential_report')}}">
                 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#uploadCredentialModal').modal('hide');">Close</button>
        <button type="button" class="btn btn-primary btn-submit-credential">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="remarksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Allegations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#remarksModal').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="remarksForm" enctype="multipart/form-data">
          <div class="form-group">            
            <input type="hidden" class="form-control" id="remarks_company_id" name="remarks_company_id" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Rejection Remarks:</label>
            <textarea id="remarks" name="remarks"></textarea>
                 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#remarksModal').modal('hide');">Close</button>
<!--        <button type="button" class="btn btn-primary btn-submit-remarks">Submit</button>-->
      </div>
    </div>
  </div>
</div>
.
<div class="modal fade" id="moveFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">File ready to move</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#moveFileModal').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="moveForm" enctype="multipart/form-data">
          <div class="form-group">            
            <input type="hidden" class="form-control" id="move_company_id" name="move_company_id" >
          </div>
          <div class="form-group">
            <label for="move-text" class="col-form-label">Move To: </label>
            
            <fieldset id="group2">
                @if( Auth::user()->hasRole('company') )
                    <input type="radio" checked="" value="home-department" name="move_to" id="home"> Home Department <br>
                @elseif( Auth::user()->hasRole('home-department') )
                    <input type="radio" checked="" value="dom" name="move_to" id="dom"> DOM <br>      
                    <input type="radio" value="so" name="move_to" id="so"> SO <br>      
                    <input type="radio" value="ds" name="move_to" id="ds"> DS <br>
                    <input type="radio" value="as" name="move_to" id="as"> AS <br>
                    <input type="radio" value="ss" name="move_to" id="ss"> SS <br>
                @elseif( Auth::user()->hasRole('dom') )
                    <input type="radio" checked="" value="home-department" name="move_to" id="dom"> Home Department <br>   
                @elseif( Auth::user()->hasRole('so') )
                    <input type="radio" value="ds" name="move_to" id="ds"> DS <br>
                    <input type="radio" value="as" name="move_to" id="as"> AS <br>
                    <input type="radio" value="ss" name="move_to" id="ss"> SS <br>
                @elseif( Auth::user()->hasRole('ds') )                    
                    <input type="radio" value="as" name="move_to" id="as"> AS <br>
                    <input type="radio" value="ss" name="move_to" id="ss"> SS <br>
                @elseif( Auth::user()->hasRole('as') ) 
                    <input type="radio" value="ss" name="move_to" id="ss"> SS <br>
                @elseif( Auth::user()->hasRole('ss') ) 
                    <input type="radio" value="approved" name="move_to" id="approved"> Approve File <br>
                @endif
            </fieldset>
                 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#moveFileModal').modal('hide');">Close</button>
        <button type="button" class="btn btn-primary btn-submit-move">Submit</button>
      </div>
    </div>
  </div>
</div>


<script>
            
    $(document).ready(function(){
        
        $('.moveFile').click(function(){
            
            if( confirm('Are you sure?') ){  
                var move_company_id = $(this).data("id");
                 $('#move_company_id').val(move_company_id); 
                $('#moveFileModal').modal('show');
            }else{
                return false;
            } 
        });
        $('.approveFile').click(function(e){
            
            if( confirm('Are you sure?') ){  
                var move_company_id = $(this).data("id");
                var fd = new FormData(document.getElementById("uploadChallanForm"));
                //fd.append("label", "WEBUPLOAD");
                fd.append("move_company_id", move_company_id);
                fd.append("move_to", 'approved');
                $.ajax({
                  url: "{{ route('ajaxmove.post') }}",
                  type: "POST",
                  data: fd,
                  enctype: 'multipart/form-data',
                  processData: false,  // tell jQuery not to process the data
                  contentType: false   // tell jQuery not to set contentType
                }).done(function( data ) {
                    console.log("PHP Output:");
                    console.log( data );
                    $('#alertSuccess').show(); //or fadeIn
                    setTimeout(function() {
                      $("#alertSuccess").hide(); //or fadeOut
                    }, 5000);
                }).fail(function (data) {
                    $('#alertError').show(); //or fadeIn
                    setTimeout(function() {
                      $("#alertError").hide(); //or fadeOut
                    }, 5000);
                });            
                e.preventDefault();
                }else{
                    return false;
                } 
        });
        
        
        $('.generateChallan').click(function(){
            
            if( confirm('Are you sure?') ){    
                
                var formData = {
                        company_id: $(this).data("id"),
                        company_name: $(this).data("name"),
                        user_id: $(this).data("user")                        
                    };
                
                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajaxgeneratechallan.post') }}",
                    data: formData,
                    dataType: "json",
                    encode: true,
                    success:function(data){
                        
                        $('#ajaxMessage').html("Challan is generated and submitted successfuly.");
                        
                        $('#alertSuccess').show(); //or fadeIn
                        setTimeout(function() {
                          $("#alertSuccess").hide(); //or fadeOut
                        }, 5000);
                    }
                }).fail(function (data) {
                    $('#alertError').show(); //or fadeIn
                    setTimeout(function() {
                      $("#alertError").hide(); //or fadeOut
                    }, 5000);
                });

            }else{
                return false;
            } 
        });
        
        $('.uploadChallan').click(function(){
            
            if( confirm('Are you sure?') ){            

                var upload_company_id = $(this).data("id");
                var upload_company_name = $(this).data("name");      
                var challan_generated_by = $(this).data("challan_generated_by");

                $('#upload_company_name').val(upload_company_name);
                $('#upload_company_id').val(upload_company_id);  
                $('#challan_generated_by').val(challan_generated_by);  
                

                $('#uploadChallanModal').modal('show');
                $("#upload_paid_challan").focus();


            }else{
                return false;
            } 
        });
        $('.uploadCredential').click(function(){
            
            if( confirm('Are you sure?') ){            

                var upload_company_id = $(this).data("id");
                var upload_company_name = $(this).data("name");      
                var challan_generated_by = $(this).data("challan_generated_by");

                $('#credential_company_name').val(upload_company_name);
                $('#credential_company_id').val(upload_company_id);  
                $('#credential_generated_by').val(challan_generated_by);  
                

                $('#uploadCredentialModal').modal('show');
                $("#upload_paid_challan").focus();


            }else{
                return false;
            } 
        });
    });
    
    $('#uploadChallanForm').validate({
        rules: {            
            "upload_paid_challan": {
                required: true,
                extension: "jep|jpeg|png|jpg",
                maxsize: 5000000,
            }
        }
    });
    $('#uploadCredentialForm').validate({
        rules: {            
            "dom_credential_report": {
                required: true,
                extension: "jep|jpeg|png|jpg|pdf|msword|docx",
                maxsize: 5000000,
            }
        }
    });
    $('#moveForm').validate({
        rules: {            
            "move_to": {
                required: true,
            }
        }
    });
    
    $(".remarks").click(function (e){
        var remarks = $(this).data("remarks");
        $('#remarks').html(remarks);
        $('#remarksModal').modal('show');
    });
    
    $(".btn-submit-slip").click(function(e){
      
        if($("#uploadChallanForm").valid()){
            e.preventDefault();
            var upload_company_id = $("input[name=upload_company_id]").val();
            var upload_company_name = $("input[name=upload_company_name]").val();
            var challan_generated_by = $("input[name=challan_generated_by]").val();

            var fd = new FormData(document.getElementById("uploadChallanForm"));
            fd.append("label", "WEBUPLOAD");
            fd.append("upload_company_id", upload_company_id);
            fd.append("upload_company_name", upload_company_name);
            fd.append("challan_generated_by", challan_generated_by);
            $.ajax({
              url: "{{ route('ajaxuploadslip.post') }}",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                console.log("PHP Output:");
                console.log( data );
                $('#alertSuccess').show(); //or fadeIn
                setTimeout(function() {
                  $("#alertSuccess").hide(); //or fadeOut
                }, 5000);
            }).fail(function (data) {
                $('#alertError').show(); //or fadeIn
                setTimeout(function() {
                  $("#alertError").hide(); //or fadeOut
                }, 5000);
            });            

            $('#uploadChallanModal').modal('hide');
        }
        return false;
        
    });
    $(".btn-submit-credential").click(function(e){
      
        if($("#uploadCredentialForm").valid()){
            e.preventDefault();
            var credential_company_id = $("input[name=credential_company_id]").val();
            var credential_company_name = $("input[name=credential_company_name]").val();
//            var credential_generated_by = $("input[name=credential_generated_by]").val();

            var fd = new FormData(document.getElementById("uploadCredentialForm"));
            fd.append("label", "WEBUPLOAD");
            fd.append("credential_company_id", credential_company_id);
            fd.append("credential_company_name", credential_company_name);
//            fd.append("challan_generated_by", challan_generated_by);
            $.ajax({
              url: "{{ route('ajaxuploadcredential.post') }}",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                console.log("PHP Output:");
                console.log( data );
                $('#alertSuccess').show(); //or fadeIn
                setTimeout(function() {
                  $("#alertSuccess").hide(); //or fadeOut
                }, 5000);
            }).fail(function (data) {
                $('#alertError').show(); //or fadeIn
                setTimeout(function() {
                  $("#alertError").hide(); //or fadeOut
                }, 5000);
            });            

            $('#uploadCredentialModal').modal('hide');
        }
        return false;
        
    });
    
     $(".btn-submit-move").click(function(e){
        if($("#moveForm").valid()){
            e.preventDefault();
             var move_to = $("input[name=move_to]:checked").val();
             var move_company_id = $("input[name=move_company_id]").val();
            var fd = new FormData(document.getElementById("uploadChallanForm"));
            //fd.append("label", "WEBUPLOAD");
            fd.append("move_company_id", move_company_id);
            fd.append("move_to", move_to);
            $.ajax({
              url: "{{ route('ajaxmove.post') }}",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                console.log("PHP Output:");
                console.log( data );
                $('#alertSuccess').show(); //or fadeIn
                setTimeout(function() {
                  $("#alertSuccess").hide(); //or fadeOut
                }, 5000);
            }).fail(function (data) {
                $('#alertError').show(); //or fadeIn
                setTimeout(function() {
                  $("#alertError").hide(); //or fadeOut
                }, 5000);
            });            

            $('#moveFileModal').modal('hide');
        }
        return false;
        
    });
    
    
</script>

<script>
    $(".applicationObjection").bind("click", function() {
        
        if( confirm('Are you sure?') ){
                         
            var company_id = $(this).data("id");
            var company_name = $(this).data("name");
            var company_user = $(this).data("user");
            
            var company_approval = 'reject';

            $('#allegations').val('');
            $('#company_approval').val(company_approval);
            $('#company_name').val(company_name);
            $('#company_id').val(company_id);
            $('#company_user').val(company_user);
            //$('#approval_from').val('home');

            $('#objectionModal').modal('show');
            $("#message").focus();                                              
            
        }else{
            $(this).val('');
        }                                            
    });
                
</script>
<script>
    $(".so_approval").bind("change", function() {
        var opt_value = this.value;

        if( confirm('Are you sure?') ){
            switch (opt_value) {
                case "approve":
                                        
                    var formData = {
                        company_id: $(this).data("id"),
                        company_name: $(this).data("name"),
                        allegations: '',
                        company_approval: opt_value,
                        approval_from: 'so',
                    };

                    submitApproval(formData);                                        
                    
                    break;
                case "reject":   
                    var company_id = $(this).data("id");
                    var company_name = $(this).data("name");
                    var company_approval = opt_value;
                    
                    $('#allegations').val('');
                    $('#company_approval').val(company_approval);
                    $('#company_name').val(company_name);
                    $('#company_id').val(company_id);
                    $('#approval_from').val('so');
                    
                    $('#objectionModal').modal('show');
                    $("#message").focus();
                    break;                                       
            }
        }else{
            $(this).val('');
        }                                            
    });
</script>
<script>
    $(".ds_approval").bind("change", function() {
        var opt_value = this.value;

        if( confirm('Are you sure?') ){
            switch (opt_value) {
                case "approve":
                                        
                    var formData = {
                        company_id: $(this).data("id"),
                        company_name: $(this).data("name"),
                        allegations: '',
                        company_approval: opt_value,
                        approval_from: 'ds',
                    };

                    submitApproval(formData);                                        
                    
                    break;
                case "reject":   
                    var company_id = $(this).data("id");
                    var company_name = $(this).data("name");
                    var company_approval = opt_value;
                    
                    $('#allegations').val('');
                    $('#company_approval').val(company_approval);
                    $('#company_name').val(company_name);
                    $('#company_id').val(company_id);
                    $('#approval_from').val('ds');
                    
                    $('#objectionModal').modal('show');
                    $("#message").focus();
                    break;                                       
            }
        }else{
            $(this).val('');
        }                                            
    });
</script>
<script>
    $(".ds_approval").bind("change", function() {
        var opt_value = this.value;

        if( confirm('Are you sure?') ){
            switch (opt_value) {
                case "approve":
                                        
                    var formData = {
                        company_id: $(this).data("id"),
                        company_name: $(this).data("name"),
                        allegations: '',
                        company_approval: opt_value,
                        approval_from: 'ds',
                    };

                    submitApproval(formData);                                        
                    
                    break;
                case "reject":   
                    var company_id = $(this).data("id");
                    var company_name = $(this).data("name");
                    var company_approval = opt_value;
                    
                    $('#allegations').val('');
                    $('#company_approval').val(company_approval);
                    $('#company_name').val(company_name);
                    $('#company_id').val(company_id);
                    $('#approval_from').val('ds');
                    
                    $('#objectionModal').modal('show');
                    $("#message").focus();
                    break;                                       
            }
        }else{
            $(this).val('');
        }                                            
    });
</script>
<script>
    $(".as_approval").bind("change", function() {
        var opt_value = this.value;

        if( confirm('Are you sure?') ){
            switch (opt_value) {
                case "approve":
                                        
                    var formData = {
                        company_id: $(this).data("id"),
                        company_name: $(this).data("name"),
                        allegations: '',
                        company_approval: opt_value,
                        approval_from: 'as',
                    };

                    submitApproval(formData);                                        
                    
                    break;
                case "reject":   
                    var company_id = $(this).data("id");
                    var company_name = $(this).data("name");
                    var company_approval = opt_value;
                    
                    $('#allegations').val('');
                    $('#company_approval').val(company_approval);
                    $('#company_name').val(company_name);
                    $('#company_id').val(company_id);
                    $('#approval_from').val('as');
                    
                    $('#objectionModal').modal('show');
                    $("#message").focus();
                    break;                                       
            }
        }else{
            $(this).val('');
        }                                            
    });
</script>
<script>
    $(".ss_approval").bind("change", function() {
        var opt_value = this.value;

        if( confirm('Are you sure?') ){
            switch (opt_value) {
                case "approve":
                                        
                    var formData = {
                        company_id: $(this).data("id"),
                        company_name: $(this).data("name"),
                        allegations: '',
                        company_approval: opt_value,
                        approval_from: 'ss',
                    };

                    submitApproval(formData);                                        
                    
                    break;
                case "reject":   
                    var company_id = $(this).data("id");
                    var company_name = $(this).data("name");
                    var company_approval = opt_value;
                    
                    $('#allegations').val('');
                    $('#company_approval').val(company_approval);
                    $('#company_name').val(company_name);
                    $('#company_id').val(company_id);
                    $('#approval_from').val('ss');
                    
                    $('#objectionModal').modal('show');
                    $("#message").focus();
                    break;                                       
            }
        }else{
            $(this).val('');
        }                                            
    });
</script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-submit-approval").click(function(e){
  
        e.preventDefault();
          
        var formData = {
            company_id: $("input[name=company_id]").val(),
            allegations: $("#allegations").val(),
            company_approval: $("input[name=company_approval]").val(),
//            approval_from: $("input[name=approval_from]").val(),
            company_user: $("input[name=company_user]").val(),
        };
        
        submitApproval(formData);
        $('#objectionModal').modal('hide');
  
    });
    
    function submitApproval(formData){
        $.ajax({
            type: 'POST',
            url: "{{ route('ajaxapproval.post') }}",
            data: formData,
            dataType: "json",
            encode: true,
            success:function(data){
                $('#alertSuccess').show(); //or fadeIn
                setTimeout(function() {
                  $("#alertSuccess").hide(); //or fadeOut
                }, 5000);
            }
        }).fail(function (data) {
            $('#alertError').show(); //or fadeIn
            setTimeout(function() {
              $("#alertError").hide(); //or fadeOut
            }, 5000);
        });
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        // $('#shelterhomes_listing').DataTable();
        //$('#zone_id').trigger('change');
        //circles
        $('#zone_id').on('change', function (e) {
            var zone_id = e.target.value;
            if (zone_id == '')
                return false;
            $.ajax({
                url: "{{ route('circles') }}",
                type: "POST",
                data: {
                    zone_id: zone_id
                },
                success: function (data) {
                    $('#circle_id').empty();
                    if (data.shelterhomes.length > 0) {
                        $('#circle_id').append('<option value="">Select</option>');
                    }

                    $.each(data.shelterhomes, function (index, shelterhome) {
                        $('#circle_id').append('<option  value="' + shelterhome.id + '">' + shelterhome.name + '</option>');
                    })
                }
            })
        });
        //divisions
        $('#circle_id').on('change', function (e) {
            var circle_id = e.target.value;
            if (circle_id == '')
                return false;
            $.ajax({
                url: "{{ route('divisions') }}",
                type: "POST",
                data: {
                    circle_id: circle_id
                },
                success: function (data) {
                    $('#division_id').empty();
                    if (data.shelterhomes.length > 0) {
                        $('#division_id').append('<option value="">Select</option>');
                    }

                    $.each(data.shelterhomes, function (index, shelterhome) {
                        $('#division_id').append('<option  value="' + shelterhome.id + '">' + shelterhome.name + '</option>');
                    })
                }
            })
        });
        //canals
        $('#division_id').on('change', function (e) {
            var division_id = e.target.value;
            if (division_id == '')
                return false;
            $.ajax({
                url: "{{ route('canals') }}",
                type: "POST",
                data: {
                    division_id: division_id
                },
                success: function (data) {
                    $('#canal_id').empty();
                    if (data.shelterhomes.length > 0) {
                        $('#canal_id').append('<option value="">Select</option>');
                    }

                    $.each(data.shelterhomes, function (index, shelterhome) {
                        $('#canal_id').append('<option  value="' + shelterhome.id + '">' + shelterhome.name + '</option>');
                    })
                }
            })
        });
    })
</script>
@endsection
