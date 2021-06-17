@extends("front.master")
@section("title",'Home | PN Education')

@section("content")

<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">

				<h1>{{$show->name}}</h1>
				<ul class="page-depth">
					<li><a href="index.html">PN Infosys</a></li>
					<li><a href="courses.html">Courses</a></li>
					<li><a href="single-course.html">{{$show->name}}</a></li>
				</ul>

			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- single-course-section 
			================================================== -->
		<section class="single-course-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">

						<div class="single-course-box">

							<!-- single top part -->
							<div class="product-single-top-part">
								<div class="product-info-before-gallery">
									<div class="course-author before-gallery-unit">
										<div class="icon">
											<i class="material-icons">account_box</i>
										</div>
										<div class="info">
											<span class="label">Teacher</span>
											<div class="value">
												<a href="single-teacher.html">PN Infosys</a>
											</div>
										</div>
									</div>
									<div class="course-category before-gallery-unit">
										<div class="icon">
											<i class="material-icons">bookmark_border</i>
										</div>
										<div class="info">
											<span class="label">Category</span>
											<div class="value">
												<a href="#">Design <span>/</span></a>
												<a href="#">Web Design</a>
											</div>
										</div>
									</div>
									<div class="course-rating before-gallery-unit">
										<div class="star-rating has-ratings">
											<span class="rating">4.50</span>
											<span class="votes-number">2 Votes</span>

										</div>
									</div>
								</div>
								<div class="course-single-gallery">
									<img src="upload/courses/4.jpg" alt="">
								</div>

							</div>

							<!-- single course content -->
							<div class="single-course-content">
								<img src="{{ url('/upload/'.$show->image) }}" alt="">
								<br>
								<br>
								<h2>Course Detail</h2>
								<p>{{$show->detail}}</h2>
								
								<h2>Course Description</h2>
								<p>{{$show->description}}</p>

								<h2>Course Content</h2>
								<p>{{$show->course_content}}</p>

							</div>
							<!-- end single course content -->

							<!-- course reviews -->
							<div class="course-reviews">
								<div class="course-review-title">
									<h3>
										<i class="material-icons">chat_bubble_outline</i>
										Student Reviews
									</h3>
								</div>
								<?php
								$i1=0;
								$i2=0;
								$i3=0;
								$i4=0;
								$i5=0;
								$per=0;
								$avg=0;
								$sum=0;
								?>
								<div class="course-reviews-inner">
									<div class="ratings-box">
										<div class="detailed-rating">
											<p>Detailed Rating</p>
											<div class="detailed-box">
												<ul class="detailed-lines">
													<li>
														<span>5 Stars</span>
														@foreach($rate as $a)
														@if($a->course_id==$show->id)
														@if($a->rating=='5')
														  <?php $i5++; ?>
														@endif
														@endif
														@endforeach
														<?php $per=($i5*100)/$show->count();
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo $per; ?>%"></span>
														</div>
														<span><?php echo $i5; ?></span>
													</li>
													<li>
														<span>4 Stars</span>
														@foreach($rate as $a)
														@if($a->course_id==$show->id)
														@if($a->rating=='4')
														  <?php $i4++; ?>
														@endif
														@endif
														@endforeach
														<?php $per=($i4*100)/$show->count();
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo $per; ?>%"></span>
														</div>
														<span><?php echo $i4; ?></span>
													</li>
													<li>
														<span>3 Stars</span>
														@foreach($rate as $a)
														@if($a->course_id==$show->id)
														@if($a->rating=='3')
														  <?php $i3++; ?>
														@endif
														@endif
														@endforeach
														<?php $per=($i3*100)/$show->count();
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo $per; ?>%"></span>
														</div>
														<span><?php echo $i3; ?></span>
													</li>
													<li>
														<span>2 Stars</span>
														@foreach($rate as $a)
														@if($a->course_id==$show->id)
														@if($a->rating=='2')
														  <?php $i2++; ?>
														@endif
														@endif
														@endforeach
														<?php $per=($i2*100)/$show->count();
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo $per; ?>%"></span>
														</div>
														<span><?php echo $i2; ?></span>
													</li>
													<li>
														<span>1 Stars</span>
														@foreach($rate as $a)
														@if($a->course_id==$show->id)
														@if($a->rating=='1')
														  <?php $i1++; ?>
														@endif
														@endif
														@endforeach
														<?php $per=($i1*100)/$show->count();
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo $per; ?>%"></span>
														</div>
														<span><?php echo $i1; ?></span>
													</li>
												</ul>
											</div>
										</div>

										<div class="rating-average">
											<p>Average rating</p>
											<div class="average-box">
												<?php $avg= ($i1*1)+($i2*2)+($i3*3)+($i4*4)+($i5*5);
												$sum =$i1+$i2+$i3+$i4+$i5;
												if($sum==0){
													$sum=1;
												}
												$avg= $avg/$sum;
												?>
												<span class="num"><?php echo number_format($avg,1); ?></span>
												<span class="ratings">
													@for($i=1;$i<=round($avg);$i++)
													<i class="fa fa-star"></i>
													@endfor
												</span>
												<?php $count_num=0; ?>
												@foreach($rate as $rat)
										        @if($rat->course_id==$show->id)
												  <?php $count_num+=1; ?>
												@endif
												@endforeach
												<span class="txt"><?php echo $count_num; ?> Ratings</span>
											</div>
										</div>
									</div>
							
									<ul class="comments">
										@foreach($rate as $rat)
										@if($rat->course_id==$show->id)
										<li>
											<div class="image-holder">
												<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/1024px-User_icon_2.svg.png" alt="">
											</div>
											<div class="comment-content">
												@foreach($user as $usr)
												@if($rat->user_id==$usr->id)
												<h2>
													{{$usr->name}}
													<span class="rating">
														@for($i=1;$i<=($rat->rating);$i++)
														<i class="fa fa-star"></i>
														@endfor
													</span>
												</h2>
												@endif
												@endforeach
												<p>{{$rat->message}}</p>
											</div>
										</li>
										@endif
										@endforeach
										
									</ul>
									@if(Auth::check())
									<form class="add-review" method="post" action="{{url('front/review-rating/insert')}}">
										@csrf
										<input type="hidden" id="first-name" name="user_id" value="{{ Auth::user()->id }}" />
										<input type="hidden" id="first-name" name="course_id" value="{{$show->id}}" />
										<h1>Add a Review</h1>
										<label>Your rating</label>
										<select name="rating">
											<option>Rate...</option>
											<option value="5">Perfect</option>
											<option value="4">Good</option>
											<option value="3">Average</option>
											<option value="2">Not that bad</option>
											<option value="1">Very Poor</option>
										</select>
										<label>Your Review</label>
										<textarea name="message"></textarea>
										<button type="submit">Submit</button>
									</form>
									@endif
								</div>
							</div>
							<!-- end course reviews -->

						</div>

					</div>



					<div class="col-lg-4">

						<!-----Add to cart----->

					<form method="post" action="{{url('add_cart')}}">
						@csrf
						<input type="hidden" name="course_id" value="{{$show->id}}">

						<input type="hidden" name="course_name" value="{{$show->name}}">

						<input type="hidden" name="course_image" value="{{$show->image}}">

						<input type="hidden" name="course_price" value="{{$show->price}}">
					
						<div class="sidebar">
							<div class="widget course-widget">
								<p class="price">
									<span class="price-label">Price</span>
									<span class="amount">{{$show->price}}</span>
								</p>
								
								<center>
									<input style="width: 300px; height: 43px; border-radius: 20px;" class="btn btn-danger" type="submit" name="submit" value="Add to Cart"></a></center><br>

								<center>
									<input style="width: 300px; height: 43px; border-radius: 20px;" class="btn btn-outline-info" type="submit" name="submit" value="Buy Now"></a></center><br>

								<div class="product-meta-info-list">
									<h3>Course Features</h3>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">language</i>
										</div>
										<div class="value">Language: English</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">access_time</i>
										</div>
										<div class="value">7 hours on-demand video</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">playlist_add_check</i>
										</div>
										<div class="value">11 Lessons</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">spellcheck</i>
										</div>
										<div class="value">Study Level: Intermediate</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">terrain</i>
										</div>
										<div class="value">Certificate of Completion</div>
									</div>
								</div>
								<ul class="share-list">
									<li><span>Share:</span></li>
									<li><a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
									<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							
						</form>

				<!----end add to cart----->
					</div>

				</div>
						
			</div>
		</section>
		<!-- End single-course section -->


@endsection