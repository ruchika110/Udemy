<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<link rel="icon" href="https://firebasestorage.googleapis.com/v0/b/pn-images.appspot.com/o/logo%2Fcolorlogo.png?alt=media&token=0386f0aa-e1e1-4950-924f-3eedaa82d967">

	<title>@yield("title")</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="{{url('css/studiare-assets.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/font-awesome/font-awesome.min.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/elegant-icons/style.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/iconfont/material-icons.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script> $(document).ready(function(){ $('#mymodel').modal('show');}); </script>

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<div class="top-line bg-#2e3e77;">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">

							@foreach($disp as $m)

							<p><i class="material-icons">phone</i> <span>{{$m->phone_number}}</span></p>
							<p><i class="material-icons">email</i> <span>{{$m->email}}</span></p>

							@endforeach

							@if(Auth::check())
							<p><i class="fa fa-user" aria-hidden="true"></i> <span>welcome {{ Auth::user()->name }}</span></p>
							@endif

							
						</div>
						<div class="col-lg-6">
							<div class="right-top-line">
								<ul class="top-menu">
									@if(Auth::check())
									<li><a href="{{url('front/profile')}}">Account</a></li>
									@endif
									<li><a href="about.html">About</a></li>
									<li><a href="blog.html">News</a></li>
								</ul>
								<button class="search-icon">
									<i class="material-icons open-search">search</i> 
									<i class="material-icons close-search">close</i>
								</button>
								@if(Auth::check())
                                <a href="{{url('front/cart')}}">
								<button class="shop-icon">
									<i class="material-icons">shopping_cart</i>
									<?php $count=0; ?>
									@foreach($cart as $car)
									@if(Auth::user()->email==$car->user_email)
									<?php $count+=1; ?>
									<span class="studiare-cart-number"><?php echo $count;?></span>
									@endif
									@endforeach
									@if(($cart!=null)||($cart==null))
									<span class="studiare-cart-number"><?php echo $count;?></span>
									@endif
								</button>
								</a>
								@endif
								
								@if(Auth::check())

								@else
								<?php $session_id = Session::getId(); ?>
								<a href="{{url('front/cart')}}">
								<button class="shop-icon">
									<i class="material-icons">shopping_cart</i>
									<?php $countt=0; ?>
									@foreach($cart as $car)
									@if($car->session_id==$session_id)
									<?php $countt+=1; ?>
									<span class="studiare-cart-number"><?php echo $countt;?></span>
									@endif
									@endforeach
									@if(($cart!=null)||($cart!=null))
									<span class="studiare-cart-number"><?php echo $countt;?></span>
									@endif
								</button>
							    </a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>

			<form class="search_bar" method="post" action="{{url('front/search')}}">
				@csrf
				<div class="container">
					<input type="search" class="search-input" name="search" placeholder="What are you looking for...">
					<button type="submit" class="submit">
						<i class="material-icons">search</i>
					</button>
				</div>
			</form>
			@if(session('message'))

         <p class ="alert alert-success text-center">
          {{session('message')}}
         </p>
          
            @endif


			<nav class="navbar navbar-expand-lg navbar-light bg-info">
				<div class="container">

					<a class="navbar-brand" href="index.html">

						@foreach($disp as $m)

						<img style="width: 240px; height: 65px;" src="{{ url('/upload/'.$m->image) }}">

						@endforeach

						
					</a>

					<a href="#" class="mobile-nav-toggle"> 
						<span></span>
					</a>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="drop-link">
								<a class="active" href="{{url('/')}}">Home</a>
							</li>
							<li class="drop-link">
								<a href="{{url('front/category/courses')}}">Courses</a>
							</li>
							
							<li>
							<a href="{{url('front/our_team')}}">Our Team</a>
						</li>

						<li class="drop-link">
								<a href="#">Workshop <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown">
									<li>
										<a href="{{url('front/Xiaomi')}}">Xiaomi MI Company</a>
									</li>
									<li>
										<a href="{{url('front/Bentchair')}}">Bentchair Company</a>
									</li>
									<li>
										<a href="{{url('front/MPCT')}}">MPCT College</a>
									</li>
									<li>
										<a href="{{url('front/RJIT')}}">RJIT College</a>
									</li>
								</ul>
							</li>

						<li>
							<a href="{{url('front/interns')}}">Intern</a>
						</li>
					    <li>
					    	<a href="{{url('front/placements')}}">Placement</a>
					    </li>
						<li>
							<a href="{{url('front/contact')}}">Contact</a>
						</li>
          </li>

          @if(Auth::check())
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"  
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
             
              <input style="margin-left: 50px; background-color: #2e3e77; color: white; " class="btn btn-info" type="button" value="Logout">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf 
            </form>
          </li>
          @endif

						</ul>
						<a href="{{url('front/signup')}}" class="register-modal-opener"><input style="background-color: #2e3e77; color: white;" class="btn" type="submit" name="submit" value="Signup"></a>

						@if(Auth::check())

						@else
						<a href="{{url('front/login')}}" class="register-modal-opener"><input style="margin-left: 20px; background-color: #2e3e77; color: white;" class="btn" type="submit" name="submit" value="Login"></a>
						@endif

					</div>
				</div>
			</nav>

			<div class="mobile-menu">
				<div class="search-form-box">
					<form class="search-form">
						<input type="search" class="search-field" placeholder="Enter keyword...">
						<button type="submit" class="search-submit">
							<i class="material-icons open-search">search</i> 
						</button>
					</form>
				</div>
				<div class="shopping-cart-box">
					<a class="shop-icon" href="cart.html">
						<i class="material-icons">shopping_cart</i>
						Cart
						<span class="studiare-cart-number">0</span>
					</a>
				</div>
				<nav class="mobile-nav">
					<ul class="mobile-menu-list">
						<li>
							<a href="index.html">Home</a>
						</li>
						
						<li>
							<a href="courses.html">Courses</a>
						</li>
						<li>
							<a href="our_team.html">Our Team</a>
						</li>
						<li class="drop-link">
								<a href="#">Workshop <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown">
									<li>
										<a href="{{url('front/Xiaomi')}}">Xiaomi MI Company</a>
									</li>
									<li>
										<a href="{{url('front/Bentchair')}}">Bentchair Company</a>
									</li>
									<li>
										<a href="{{url('front/MPCT')}}">MPCT College</a>
									</li>
									<li>
										<a href="{{url('front/RJIT')}}">RJIT College</a>
									</li>
								</ul>
							</li>
						<li>
							<a href="intern.html">Intern</a>
						</li>
					    <li>
					    	<a href="placement.html">Placement</a>
					    </li>
						<li>
							<a href="contact.html">Contact</a>
						</li>

					</ul>
				</nav>
			</div>

		</header>
		<!-- End Header -->

		@section('content')

		@show

		<!-- footer 
			================================================== -->
		<footer>
			<div class="container">

				<div class="up-footer">
					<div class="row">

						@foreach($disp as $m)

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget text-widget">
								<a href="index.html" class="footer-logo">
									<img style="width: 280px; height: 80px;" src="{{ url('/upload/'.$m->image) }}">
								</a>
								<p>{{$m->description}}</p>
								<ul>
									<li>
										<div class="contact-info-icon">
											<i class="material-icons">location_on</i>
										</div>
										<div class="contact-info-value">{{$m->address}}</div>
									</li>
									<li>
										<div class="contact-info-icon">
											<i class="material-icons">phone_android</i>
										</div>
										<div class="contact-info-value">{{$m->phone_number}}</div>
									</li>
								</ul>
							</div>
						</div>

						@endforeach

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget quick-widget">
								<h2>Quick Links</h2>
								<ul class="quick-list">
									<li><a href="contact.html">Contact</a></li>
									<li><a href="pricing.html">Pricing Packages</a></li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="courses.html">Courses</a></li>
									<li><a href="blog.html">News</a></li>
									<li><a href="index.html">Home</a></li>
									<li><a href="#">Sample Page</a></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget subscribe-widget">
								<h2>Newsletter</h2>
								<p>Don’t miss anything, sign up now and keep informed about our company.</p>
								<div class="newsletter-form">
									<input class="form-control" type="email" name="EMAIL" placeholder="Enter Your E-mail" required="">
									<input type="submit" value="Subscribe">
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>

			<div class="footer-copyright copyrights-layout-default">
				<div class="container">
					<div class="copyright-inner">
						<div class="copyright-cell"><span class="highlight">PN Infosys</span>. Created by Ruchika Verma</div>
						<div class="copyright-cell">
							<ul class="studiare-social-links">
								<li><a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->

	
	<script src="{{url('js/studiare-plugins.min.js')}}"></script>
	<script src="{{url('js/jquery.countTo.js')}}"></script>
	<script src="{{url('js/popper.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="{{url('js/gmap3.min.js')}}"></script>
	<script src="{{url('js/script.js')}}"></script>

	<script>
		var tpj=jQuery;
		var revapi202;
		tpj(document).ready(function() {
			if (tpj("#rev_slider_202_1").revolution == undefined) {
				revslider_showDoubleJqueryError("#rev_slider_202_1");
			} else {
				revapi202 = tpj("#rev_slider_202_1").show().revolution({
					sliderType: "standard",
					jsFileLocation: "js/",
					dottedOverlay: "none",
					delay: 5000,
					navigation: {
						keyboardNavigation: "off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation: "off",
						onHoverStop: "off",
						arrows: {
					        enable: true,
					        style: 'gyges',
					        left: {
					            container: 'slider',
					            h_align: 'left',
					            v_align: 'center',
					            h_offset: 20,
					            v_offset: -60
					        },
					 
					        right: {
					            container: 'slider',
					            h_align: 'right',
					            v_align: 'center',
					            h_offset: 20,
					            v_offset: -60
					        }
					    },
						touch: {
							touchenabled: "on",
							swipe_threshold: 75,
							swipe_min_touches: 50,
							swipe_direction: "horizontal",
							drag_block_vertical: false
						},
						bullets: {
 
					        enable: false,
					        style: 'persephone',
					        tmp: '',
					        direction: 'horizontal',
					        rtl: false,
					 
					        container: 'slider',
					        h_align: 'center',
					        v_align: 'bottom',
					        h_offset: 0,
					        v_offset: 55,
					        space: 7,
					 
					        hide_onleave: false,
					        hide_onmobile: false,
					        hide_under: 0,
					        hide_over: 9999,
					        hide_delay: 200,
					        hide_delay_mobile: 1200
 						}
					},
					responsiveLevels: [1210, 1024, 778, 480],
					visibilityLevels: [1210, 1024, 778, 480],
					gridwidth: [1210, 1024, 778, 480],
					gridheight: [700, 700, 600, 600],
					lazyType: "none",
					parallax: {
						type: "scroll",
						origo: "slidercenter",
						speed: 1000,
						levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
						type: "scroll",
					},
					shadow: 0,
					spinner: "off",
					stopLoop: "off",
					stopAfterLoops: -1,
					stopAtSlide: -1,
					shuffle: "off",
					autoHeight: "off",
					fullScreenAutoWidth: "off",
					fullScreenAlignForce: "off",
					fullScreenOffsetContainer: "",
					fullScreenOffset: "0px",
					disableProgressBar: "on",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll: "off",
						nextSlideOnWindowFocus: "off",
						disableFocusListener: false,
					}
				});
			}
		}); /*ready*/
	</script>	

	
</body>
</html>