@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">

    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
            <h1 class="page_heading">Courses List</h1>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">

            <table class="table table-stripped table-hover primary-table mb-0">
                <thead class="text-center">
                    <tr>                                    
                        <th>Course Name</th>  
                        <th>Created By</th>  
                    </tr>
                </thead>
                <tbody class="text-center">
                   
                    @foreach ($courses as $key => $course) 
                    <tr>
                        <td>{{ $course->course_name }}</td> 
                        <td>{{ $course['user']->name }}</td> 
                        <!--<td>  <a href="{{ route('course.topics', ['course_id' => $course->course_id]) }}" > View Topic(s) </a>  </td>--> 
                      </tr>   
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
