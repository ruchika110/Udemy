@extends('front.master')

@section("title",'Courses | PN Infosys Edu.')

@section('content')

<div class="row">
	<div class="col-md-4"></div>
			<div class="col-md-4">
				<br><br>
<form method="post" action="{{url('front/login_save')}}">
	@csrf

	Email:
	<input class="form-control" type="text" name="email" placeholder="Enter Email">
	<br>

	Password:
	<input class="form-control" type="password" name="password" placeholder="Password">
	<br>

	<input type="hidden" name="role" value="1">

	<input class="btn btn-success" type="submit" name="submit" value="Login">
	<br><br>
</form>

<input class="btn btn-success" type="submit" name="submit" value="Create an Account">
	<br><br>

	<div class="text-center p-t-12">
            <span class="txt1">
              Forgot
            </span>
            <a class="txt2" href="{{url('front/forgot_password')}}">
              Username / Password?
            </a>
          </div>

<a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary">
            <strong>Login With Google</strong></a><br><br>

<a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-danger">
            <strong>Login With Facebook</strong></a><br><br>

</div><!-----end col-md-4----->
<div class="col-md-4"></div>
</div><!-----end row----->

@endsection