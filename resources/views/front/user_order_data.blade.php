@extends("front.master")
@section("title",'Order Data | pneducation')

@section("content")
  
  <div class="container-fluid">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-2"></div>
  			<div class="col-md-8 table-responsive" style="margin-top: 30px;">
  				<h4><span style="border-bottom: 2px solid black"><i class="fa fa-user-circle" aria-hidden="true"></i> User Order Details </span></h4><br>
  		<table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Course Name</th>
                  <th>Course Quantity</th>
                  <th>Course Price</th>
                  <th>Course Image</th>
                  <th>Total</th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                  @if(Auth::user()->name==$d->name)
                    <tr class="bg-light">
                      <td>{{$d->name}}</td>
                      <td>{{$d->course_name}}</td>
                      <td>{{$d->course_quantity}}</td>
                      <td>{{$d->course_price}}</td>
                      <td><img src="{{ url('/upload/'.$d->image) }}" style="height: 100px; width: 120px; border-radius: 100%;"></td>
                      <td>{{$d->course_price*$d->course_quantity}}</td>
                    </tr>
                  @endif
                  @endforeach

                </tbody>
                
              </table>
            </div>
            <div class="col-md-2"></div>
        </div>     
  	</div>
  </div>




@endsection