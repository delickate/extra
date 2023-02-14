@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">

    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
            <h1 class="page_heading">My Course Topics</h1>
        </div>
        
    </div>

    <div class="card">


        <div class="table-responsive">

            <table class="table table-stripped table-hover primary-table mb-0">
                <thead class="text-center">
                    <tr>                                    
                        <th>Topic Name</th>  
                        <th>Topic Level</th>  
                        <th width='70%' wirth>About Topic </th>  
                        <th>View</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                    $pre_test = 1
                    @endphp
                    @foreach ($topics as $key => $topic) 
                    <tr>
                        <td>{{ $topic->topic_name }}</td> 
                        <td>{{ ucfirst($topic->leval_name) }}</td> 
                        <td>{{ $topic->topic_text }}</td> 
                        <td class="text-center">
                           
                            @if($topic->is_latest == 1)
                            <a href="{{ route('topic.activity', ['topic_id' => $topic->topic_id]) }}" > View Activities </a>  
                            @elseif($pre_test == 1)
                            @php
                            $pre_test = 0
                            @endphp
                            <a href="{{ route('course.topics.test', ['type' => 'pre' , 'topic_id' => $topic->topic_id]) }}" > Pre Test </a> 
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
