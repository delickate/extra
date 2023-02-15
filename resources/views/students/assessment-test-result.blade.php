@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">
    
    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
          <h1 class="page_heading">Student Assessment Result ({{ $result->topic_name }})</h1>
        </div>

      </div>
 

    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
        
            </div>
        </div>
    </div>
  <div class="p-16 bg-surface-secondary">
  <div class="row">
    <div class="col-lg-4 mx-auto">
      <!-- Component -->
      <div class="card shadow">
        <div class="card-body">
          <div class="d-flex justify-content-center">
            <a href="#" class="avatar avatar-xl rounded-circle">
              <img alt="..." src="https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=472&q=80">
            </a>
          </div>
          <div class="text-center my-6">
            <!-- Title -->
            <!--<a href="#" class="d-block h5 mb-0">Julienne Moore</a>-->
            <!-- Subtitle -->
            <span class="d-block text-sm text-muted"></span>
           
          </div>
          <!-- Stats -->
          <div class="d-flex">
            <div class="col-4 text-center">
              <a href="#" class="h4 font-bolder mb-0">{{$result->scour }} %</a>
              <span class="d-block text-sm">Obtained </span>
            </div>
            <div class="col-4 text-center">
              <a href="#" class="h4 font-bolder mb-0">{{ ucfirst($result->leval_name)}}</a>
              <span class="d-block text-sm">level </span>
            </div>
            <div class="col-4 text-center">
              <?php 
//echo "<pre>"; print_r($result); die();
              //dd($result);
              ?>
               @if($result->type_of_assessment == 'post' && $result->scour < 33)
               <a href="{{ route('topic.activity', ['topic_id' => $result->topic_idFK]) }}" style="margin-top: 10px" class="h4 font-bolder mb-0 btn btn-success">Re-start Activity</a>
                @elseif($result->type_of_assessment == 'pre')
                <a href="{{ route('topic.activity', ['topic_id' => $result->topic_idFK]) }}" style="margin-top: 10px" class="h4 font-bolder mb-0 btn btn-success">Start Activity</a>
              @elseif($result->type_of_assessment == 'post')
                <a href="{{ route('course.topics', ['course_id' => $result->course_idFK]) }}" style="margin-top: 10px" class="h4 font-bolder mb-0 btn btn-success">Activity List</a>
               @endif  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    
</section>


<script type="text/javascript">
    $(document).ready(function () {
               
    })
</script>
@endsection
