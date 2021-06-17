@extends("front.master")
@section("title",'Contact | PN Education')

@section("content")

<!-- map section -->
		<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.6287734169687!2d78.20696011434966!3d26.208751696349736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3976c3a3faabd5e3%3A0x88d563b9d79500ed!2sPN%20INFOSYS!5e0!3m2!1sen!2sin!4v1615848330412!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
		<!-- end map section -->

		<!-- contact-section 
			================================================== -->
		<section class="contact-section">
			<div class="container">
				<div class="contact-box">
					<h1>Get in Touch</h1>
					<p>Someone finds it difficult to understand your creative idea? There is a better visualisation. Share your views with us, we’re looking forward to hear from you.</p>
					<form id="contact-form" method="post" action="{{url('front/add_contact')}}">

						@csrf
						
						<div class="row">
							<div class="col-md-6">
								<label for="name">Your Name (required)</label>
								<input name="name" id="name" type="text">
							</div>
							<div class="col-md-6">
								<label for="email">Your Email (required)</label>
								<input name="email" id="mail" type="text">
							</div>
						</div>
						<label for="phone_number">Your Phone Number</label>
						<input name="phone_number" id="tel-number" type="text">
						<label for="message">Your Message (required)</label>
						<textarea name="message" id="comment"></textarea>
						
						<input style="background-color: #2e3e77; color: white;" type="submit" name="submit" value="submit" class="btn">

						<div id="msg" class="message"></div>
					</form>
				</div>
			</div>
		</section>
		<!-- End contact section -->

		<!-- contact-info-section 
			================================================== -->
		<section class="contact-info-section">
			<div class="container">
				<div class="contact-info-box">

					@foreach($con as $c)

					<div class="row">

						<div class="col-lg-4 col-md-6">
							<div class="info-post">
								<div class="icon">
									<i style="color: #2e3e77;" class="fa fa-envelope-o"></i>
								</div>
								<div class="info-content">
									<p>
										Tel: {{$c->phone_number}}<br>
										E-Mail: <a href="#">{{$c->email}}</a>
									</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="info-post">
								<div class="icon">
									<i style="color: #2e3e77;" class="fa fa-map-marker"></i>
								</div>
								<div class="info-content">
									<p>
										{{$c->address}}
									</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="info-post">
								<div class="icon">
									<i style="color: #2e3e77;" class="fa fa-clock-o"></i>
								</div>
								<div class="info-content">
									<p>
										{{$c->office}}
									</p>
								</div>
							</div>
						</div>

					</div>

					@endforeach

				</div>
			</div>
		</section>
		<!-- End contact-info section -->

@endsection