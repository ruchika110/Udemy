@extends("front.master")
@section("title",'Team | PN Education')

@section("content")

		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Our Team</h1>
				<ul class="page-depth">
					<li><a href="index.html">PN Infosys</a></li>
					<li><a href="teachers.html">Our Team</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- teachers-section 
			================================================== -->
		<section class="teachers-section">
			<div class="container">
				<div class="teachers-box">
					<div class="row">

						@foreach($t as $team)

						<div class="col-lg-3 col-md-6">
							<div class="teacher-post">
								<a href="single-teacher.html">
									<img style="height: 300px;" src="{{ url('/upload/'.$team->image) }}" alt="">
									<div class="hover-post">
										<h2>{{$team->name}}</h2>
										<span>{{$team->description}}</span>
									</div>
								</a>
							</div>
						</div>

						@endforeach
						
					</div>
					
				</div>	
			</div>
		</section>
		<!-- End teachers section -->

@endsection
 