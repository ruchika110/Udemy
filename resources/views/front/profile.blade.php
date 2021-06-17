@extends("front.master")
@section("title",'profile | pneducation')

@section("content")
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <?php $count=0; ?>
                @foreach($data as $d)
                @if((Auth::user()->name==$d->name)&&($count==0))
                <div class="col-md-10 table-bordered bg-light" style="margin: 20px;padding: 40px;">
                    <h4><span style="border-bottom: 2px solid black"><i class="fa fa-user-circle" aria-hidden="true"></i> User Profile </span></h4><br>
                    <div class="row">
                    <div class="col-md-6">
                    @if(Auth::check())
                    <h6>Name:</h6><h6 class="text-primary">{{ Auth::user()->name }}</h6>
                    <h6>Email:</h6><h6 class="text-primary">{{ Auth::user()->email }}</h6>
                    @endif
                    <h6>Address:</h6><h6 class="text-primary">{{$d->address}}</h6>
                    <h6>Contact No:</h6><h6 class="text-primary">{{$d->phone}}</h6>
                    </div>
                    <div class="col-md-4">
                    <h6>City:</h6><h6 class="text-primary">{{$d->city}}</h6> 
                    <h6>State:</h6><h6 class="text-primary">{{$d->state}}</h6>
                    <h6>Pincode:</h6><h6 class="text-primary">{{$d->pincode}}</h6>
                    <h6>Country:</h6><h6 class="text-primary">{{$d->country}}</h6>
                    </div>
                    </div>
                    <?php $count+=1; ?> 
                    <div class="row mt-2">
                        <div class="col-md-2 mt-2">
                        <button class="btn btn-success">            
                        <a href="{{url('front/profile/user_order_data/'.$d->user_id)}}"><span class="text-white">Your Orders</span></a>
                        </button><br>
                    </div>
                    <div class="col-md-3 mt-2">
                        <button class="btn btn-success">            
                        <a href=""><span class="text-white">Update Password</span></a>
                        </button>
                    </div>
                    </div>       
                </div>
                @endif
                @if((($data!=null)||($data==null))&&($count!=1))
                <div class="col-md-10 table-bordered bg-light" style="margin: 20px;padding: 40px;">
                    <h4><span style="border-bottom: 2px solid black"><i class="fa fa-user-circle" aria-hidden="true"></i> User Profile Details </span></h4><br>
                    <div class="row">
                    <div class="col-md-6">
                    @if(Auth::check())
                    <h6>Name:</h6><h6 class="text-primary">{{ Auth::user()->name }}</h6>
                    <h6>Email:</h6><h6 class="text-primary">{{ Auth::user()->email }}</h6>
                    @endif
                    </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-2">
                        <button class="btn btn-success">            
                        <a href="{{url('front/profile/user_order_data')}}"><span class="text-white">Your Orders</span></a>
                        </button><br>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success">            
                        <a href=""><span class="text-white">Update Password</span></a>
                        </button>
                    </div>
                    </div>       
                </div>
                @endif
                @endforeach
                <div class="col-md-1"></div>
                
            </div>
        </div>
    </div>

@endsection