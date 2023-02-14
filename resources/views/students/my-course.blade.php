@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">

    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
            <h1 class="page_heading">My Course</h1>
        </div>
       
    </div>

    <div class="card">

       


        <div class="table-responsive">

            <table class="table table-stripped table-hover primary-table mb-0">
                <thead class="text-center">
                    <tr>                                    
                        <th>Course Name</th>  
                       
                        <th>Topic(s)</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    //   if (count($data) > 0) {
                    //  $serial = $data->perPage() * ($data->currentPage() - 1); //get the start integer
                    //   $serial++;
                    // }
                    ?>
                    @foreach ($courses as $key => $shelterhome) 

                    @php
                    $is_enrolled = false;
                    @endphp
                    

                    <tr>
                        <td>{{ $shelterhome->course_name }}</td> 
                      
                        <!--<td>{{ dateConv($shelterhome->created_at) }}</td>-->
                        <td class="text-center">
                            @if (Auth::user()->hasRole('student') )
                            <a href="{{ route('course.studenttopics', ['course_id' => $shelterhome->course_id]) }}" > Start Course  </a>  
                            @endif
                        </td>   


                      
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
