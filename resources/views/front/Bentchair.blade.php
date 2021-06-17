@extends("front.master")

@section("title" ,'All Workshops | PN-Education')

@section("content")

<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>All Bentchair Workshops</h1>
				<ul class="page-depth">
					<li><a href="index.html">PN-INFOSYS</a></li>
					<li><a href="teachers.html">Bentchair Workshops</a></li>
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
						
						@foreach($work as $s)
						
						<div class="col-lg-3 col-md-6">
							<div class="teacher-post">
								<a href="single-teacher.html">
									<img style="width:350px;height: 350px;" src="{{ url('/upload/'.$s->workshop_image) }}" alt="">
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