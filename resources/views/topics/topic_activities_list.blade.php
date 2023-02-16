@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">

    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
            <h1 class="page_heading">Course Activities</h1>
			<a  href="{{ route('teacher.addcontent', ['topic_id' => $topic_id]) }}">Add Content</a>
			
        </div>
    </div>

    <div class="card">


        <div class="table-responsive">

            <table class="table table-stripped table-hover primary-table mb-0">
                <thead class="text-center">
                    <tr>                                    
                        <th>Activity Name</th>  
                        <th>Activity Type </th>  
                        <th>View</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    //   if (count($data) > 0) {
                    //  $serial = $data->perPage() * ($data->currentPage() - 1); //get the start integer
                    //   $serial++;
                    // }
                    ?>
                    @foreach ($activities as $key => $topic) 
                    <tr>
                        <td>{{ $topic->activity_name }}</td> 
                        <td>{{ ucfirst($topic->activity_type) }}</td> 
                        <td class="text-center">
                          <a href="{{ route('topic.activity', ['topic_id' => $topic->activity_id]) }}" > Activity Details </a>  
                        </td> 
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
