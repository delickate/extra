@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">

    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
            <h1 class="page_heading">Student List</h1>
        </div>
     
    </div>

    <div class="card">

        
        <div class="table-responsive">

            <table class="table table-stripped table-hover primary-table mb-0">
                <thead class="text-center">
                    <tr>                                    
                        <th>Student Name</th>  
                        <th>Father Name</th>
                        <th>Assessment Level</th>  
                        <th>Learning Path</th>  
                        <th>Email</th>  
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                   
                    @foreach ($students as $key => $shelterhome) 
              <?php 
              
              ?>

                    <tr>
                        <td> @if ( isset($students[$key]['user']->name)) {{ ucfirst($students[$key]['user']->name)  }} @endif </td> 
                        <td> @if ( isset($students[$key]['user']->father_name)) {{ ucfirst($students[$key]['user']->father_name)  }} @endif </td> 
                        <!--<td> @if ( isset($students[$key]['user']->leval_name)) {{ ucfirst($students[$key]['user']->leval_name)  }} @endif </td>--> 
                        <td> {{ ucfirst($shelterhome->leval_name) }} </td> 
                        <td> {{ studentPath($shelterhome['level_id']) }} </td> 
                        <td> @if ( isset($students[$key]['user']->email)) {{ ucfirst($students[$key]['user']->email)  }} @endif </td> 
                        <td> @if ( isset($students[$key]['user']->mobile)) {{ ucfirst($students[$key]['user']->mobile)  }} @endif </td> 
                       
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
</script>
@endsection
