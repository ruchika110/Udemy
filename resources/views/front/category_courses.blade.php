@extends('front.master')

@section("title",'Courses | PN Infosys Edu.')

@section('content')

<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Courses</h1>
				<ul class="page-depth">
					<li><a href="index.html">Home</a></li>
					<li><a href="courses.html">Courses</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- courses-section 
			================================================== -->
		<section class="courses-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="courses-top-bar">
							<div class="courses-view">
								<a href="#" class="grid-btn active">
									<i class="fa fa-th-large" aria-hidden="true"></i>
								</a>
								<a href="#" class="grid-btn">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</a>
								<span>Showing all 9 results</span>
							</div>
							<form class="search-course">
								<input type="search" name="search" id="search_course" placeholder="Search Courses..." />
								<button type="submit">
									<i class="material-icons">search</i>
								</button>
							</form>
						</div>

						<div class="row">

							@foreach($show as $s)

							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="course-post">
									<div class="course-thumbnail-holder">
										<a href="{{url('front/course_detail/'.$s->id)}}">
											<img style="width: 250px; height: 200px;" src="{{ url('/upload/'.$s->image) }}" alt="">
										</a>
									</div>
									<div class="course-content-holder">
										<div class="course-content-main">
											<h2 class="course-title">
												<a href="{{url('front/course_detail/'.$s->id)}}">{{$s->name}}</a>
											</h2>
											<div class="course-rating-teacher">
												<div class="star-rating has-ratings" title="Rated 5.00 out of 5">
													<span style="width:100%">
														<span class="rating">5.00</span>
														<span class="votes-number">1 Votes</span>
													</span>
												</div>
												<a href="#" class="course-loop-teacher">Vikas Jain</a>
											</div>
										</div>
										<div class="course-content-bottom">
											<div class="course-students">
												<i class="material-icons">group</i>
												<span>64</span>
											</div>
											<div class="course-price">
												<span>£244</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							@endforeach

						</div>
					</div>

					<div class="col-lg-4">
						<div class="sidebar">

							<div class="category-widget widget">
								<h2>Product categories</h2>
								<ul class="category-list">
									<li><a href="#">Design</a></li>
									<li><a href="#">Photography</a></li>
									<li><a href="#">Technology</a></li>
									<li><a href="#">Web Design</a></li>
									<li><a href="#">Web Development</a></li>
								</ul>
							</div>

							<div class="products-widget widget">
								<h2>Products</h2>
								<ul class="products-list">
									@foreach($show as $s)
									<li>
										<a href="single-course.html"><img src="{{ url('/upload/'.$s->image) }}" alt=""></a>
										<div class="list-content">
											<h3><a href="single-course.html">{{$s->name}}</a></h3>
											<span>{{$s->price}}</span>
										</div>
									</li>
									@endforeach
								</ul>
							</div>


							<div class="ads-widget widget">
								<a href="#">
									<img src="upload/blog/ad-banner.jpg" alt="">
								</a>
							</div>

						</div>
					</div>

				</div>
						
			</div>
		</section>
		<!-- End courses section -->

		@endsection