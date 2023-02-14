@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">
    
    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
          <h1 class="page_heading">Student Dashboard</h1>
        </div>

      </div>
    
    <div class="card">                                
            <div class="table-responsive">
                
                <main id="main" class="main">
              <section class="counts-container mb-3">
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <a href="#">
                  <div class="card info-card bg-green">
                    <div class="card-body">
                      <div class="box-container">
                        <div class="box green mb-2">
                          <img src="{{ asset('img/icon1.png') }}">
                        </div>
                        <div class="counts">
                          <h6>{{ $total_count }}</h6>
                          <p class="heading">Course Enrollments </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                  </div>
                                    
                </div>
              </section>              
            </main>
                                               
              </div>        
    </div>
    
    
</section>


<script type="text/javascript">
    $(document).ready(function () {
               
    })
</script>
@endsection
