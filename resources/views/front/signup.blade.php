@extends('front.master')

@section("title",'Courses | PN Infosys Edu.')

@section('content')

<div class="row">
	<div class="col-md-4"></div>
			<div class="col-md-4">
				<br><br>

<form method="post" action="{{url('front/signup_save')}}">
	@csrf
	Name:
	<input class="form-control" type="text" name="name" placeholder="Enter Name">
	<br>

	Email:
	<input class="form-control" type="text" name="email" placeholder="Enter Email">
	<br>

	Password:
	<input class="form-control" type="password" name="password" placeholder="Password">
	<br>

	<input class="btn btn-success" type="submit" name="submit" value="Submit">
	<br><br>
	</div><!-----end col-md-4----->
<div class="col-md-4"></div>
</div><!-----end row----->
</form>

@endsection