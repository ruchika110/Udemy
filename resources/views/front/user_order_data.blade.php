@extends("front.master")
@section("title",'order data | pneducation')

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
                  <th>#</th>
                  <th>Details</th>
                  <th>Course Order Date</th>
                  <th>Course Order status</th>
                  <th>Product Status</th>
                  <th>Payment Method</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php $i= 1; ?>
                  @foreach($data as $d)
                    <tr class="bg-light">
                      <td>{{$i++}}</td>
                      <td>
                        <b>Order no#:</b>{{$d->id}}<br>
                        <b>Name:</b>{{$d->name}}<br>
                        <b>Email:</b>{{$d->user_email}}
                      </td>
                      <td>{{$d->created_at}}</td>
                      <td>{{$d->order_status}}</td>
                      <td>{{$d->payment_status}}</td>
                      <td>{{$d->payment_method}}</td>
                      <td><a href="{{url('front/view_order/'.$d->id)}}">
                            <input class="btn-danger mb-2" type="submit" name="submit" value="View">
                          </a>
                     <a href="{{url('front/invoice/'.$d->id)}}">
                            <input class="btn-danger" type="submit" name="submit" value="Invoice">
                          </a>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
                
              </table>
            </div>
            <div class="col-md-2"></div>
        </div>     
    </div>
  </div>




@endsection