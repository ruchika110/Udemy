@extends("front.master")
@section("title",'Team | PN Education')

@section("content")

		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Intern</h1>
				<ul class="page-depth">
					<li><a href="index.html">PN Infosys</a></li>
					<li><a href="teachers.html">Intern</a></li>
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

						@foreach($i as $intern)

						<div class="col-lg-3 col-md-6">
							<div class="teacher-post">
								<a href="single-teacher.html">
									<img style="height: 300px;" src="{{ url('/upload/'.$intern->image) }}" alt="">
									<div class="hover-post">
										<h2>{{$intern->name}}</h2>
										<h2>{{$intern->company_name}}</h2>
										<h2>{{$intern->designation}}</h2>
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
 