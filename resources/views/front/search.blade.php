@extends("front.master")
@section("title",'courses | pneducation')

@section("content")

<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>PNINFOSYS</h1>
				<ul class="page-depth">
					<li><a href="index.html">Search</a></li>
					<li><a href="courses.html">Results</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- courses-section 
			================================================== -->
		<section class="courses-section">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-10">
						<div class="courses-top-bar">
							<div class="courses-view">
								<a href="" class="grid-btn">
									<i class="fa fa-search" aria-hidden="true"></i>
								</a>
								<a href="" class="grid-btn active">
									<i class="fa fa-check" aria-hidden="true"></i>
								</a>
								<span>Showing all possible search results for you</span>
							</div>
							
						</div>
						@if(count($result) === 0)
                          <p>no result found for your search..</p>
						@else
						 @foreach($result as $r)
						<div class="course-post list-style">
							<div class="course-thumbnail-holder">
								<a href="{{url('front/course_detail/'.$r->id)}}">
									<img src="{{ url('/upload/'.$r->image) }}" alt="">
								</a>
							</div>
							<div class="course-content-holder">
								<div class="course-content-main">
									<h2 class="course-title">
										<a href="{{url('front/course_detail/'.$r->id)}}">{{$r->name}}</a>
									</h2>
									
									<p>{{$r->description}}</p>
								</div>
								<div class="course-content-bottom">
									<div class="course-price">
										<span>Rs{{$r->price}}</span>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
						@endif

					</div>
					<div class="col-md-2"></div>

				</div>
						
			</div>
		</section>
		<!-- End courses section -->


@endsection