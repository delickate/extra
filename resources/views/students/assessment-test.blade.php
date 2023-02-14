@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">
    
    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
          <h1 class="page_heading">Student Assessment Test</h1>
        </div>

      </div>
 

    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
        <form action="{{ route('save.assessment') }}" method="post">
            <input type="hidden" value="{{ $question_counts }}" name="question_counts">   
            <input type="hidden" value="{{ $type }}" name="type">   
            <input type="hidden" value="{{ $topic_id }}" name="topic_id">   
        @csrf
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>Assessment Test</h4><span>(Total {{ $question_counts }} MCQs)</span></div>
                    </div>
                @foreach ($test as $key => $t)   
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">Q. </h3>
                            <h5 class="mt-1 ml-2"> {{ $t->question_text }} ?</h5>
                        </div><div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="{{ $t->question_id }}" value="answer_1" required=""> <span>{{ $t->answer_1 }}</span>
                            </label>    
                        </div><div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="{{ $t->question_id }}" value="answer_2"> <span>{{ $t->answer_2 }}</span>
                            </label>    
                        </div><div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="{{ $t->question_id }}" value="answer_3"> <span>{{ $t->answer_3 }}</span>
                            </label>    
                        </div><div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="{{ $t->question_id }}" value="answer_4"> <span>{{ $t->answer_4 }}</span>
                            </label>    
                        </div></div>
                  @endforeach 
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                        <button class="btn btn-primary d-flex align-items-center btn-danger" type="reset"><i class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;Clear</button>
                        <button class="btn btn-primary border-success align-items-center btn-success" type="submit">Submit<i class="fa fa-angle-right ml-2"></i></button></div>
                </div>
          </form>
            </div>
        </div>
    </div>
  
    
</section>


<script type="text/javascript">
    $(document).ready(function () {
               
    })
</script>
@endsection
