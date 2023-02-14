@extends('layouts.app')

@section('content')

<section class="search_filters mt-4">

    <div class="row mb-3">
        <div class="col-lg-8 col-md-8 pagetitle">
            <h1 class="page_heading">Course Activities</h1>
        </div>
       
    </div>

    <div class="card">
<section class="section profile">
	<div class="row">
		<div class="col-xl-12">
			<div class="card-">
				<div class="card-body pt-3">
<!--					<ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">Overview</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">Edit Profile</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings" aria-selected="false" tabindex="-1" role="tab">Settings</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" tabindex="-1" role="tab">Change Password</button>
						</li>
					</ul>-->
					<div class="tab-content pt-2">
						<div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
							<h5 class="card-title">Activitiy</h5>
							<p class="small fst-italic">{{ $activities[0]->activity_name }}</p>
							<h5 class="card-title">Activity Text</h5>
							<p class="small fst-italic">{{ $activities[0]->activity_text }}</p>
						
                                                         @if ($activities[0]->activity_type == 'image')
                                                         <h5 class="card-title">Activity Image</h5>
							<p class="small fst-italic">
                                                          
                                                            <img src="{{ URL::to('/') }}/RehnumaiLms/{{$activities[0]->activity_link}}">
                                                        </p>
                                                         @endif
                                                         @if ($activities[0]->activity_type == 'video')
                                                         <h5 class="card-title">Activity Video</h5>
							<p class="small fst-italic">
                                                            <iframe width="560" height="315" src="{{ $activities[0]->activity_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                           
                                                            <!--<iframe width="560" height="315" src="https://www.youtube.com/embed/BWrHzRS0j-M?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                                        </p>
                                                         @endif
					</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
       


    </div>
 <div class="card">
 <div class="card-body">
            <div class="text-center">
                {!! $activities->links() !!}
                @if(empty($activities->hasMorePages()))
                 <a href="{{ route('course.topics.test', ['type' => 'post' , 'topic_id' => $topic_id]) }}" class="btn btn-primary">Post Test</a>
                  @endif
            </div>
        </div>
        </div>


</section>


<script type="text/javascript">
    $(document).ready(function () {

    })
</script>
<style>
    .pagination .page-item a.page-link {
    border-radius: 1px !important;
    width: auto;
    height: auto;
    background: #013F6A;
    color: #fff;
    line-height: 1;
    padding: 8px 15px;
}
</style>
@endsection
