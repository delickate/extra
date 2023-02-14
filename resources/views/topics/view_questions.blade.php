@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">

    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
            <h1 class="page_heading">Questions</h1>
			 
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
<p><a href="{{ url('/student/course/topics/1') }}" class="btn btn-primary">Back</a></p>
            <table class="table table-stripped table-hover primary-table mb-0" id="datatable_simple">
                <thead class="text-center">
                    <tr>                                    
                        <th>Question Id</th>  
                        <th>Question Title</th>  
                        
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                    $pre_test = 1
                    @endphp
                    @foreach ($questions as $key => $qes) 
                    <tr>
                        <td>{{ $qes->activity_id }}</td> 
                        <td>{{ $qes->activity_name }}</td> 
                         
                    @endforeach

                </tbody>
                <tfoot>

                </tfoot>
            </table>                                
        </div>

    </div>



</section>


<script type="text/javascript">
    $(document).ready(function () {

    })

    $(document)
  .ready(function () {
    $('#datatable_simple')
      .DataTable();
  });
</script>
@endsection
