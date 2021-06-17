@extends("admin.master");
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View User Course Ordered</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> User Details
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                
                <div class="col-sm-8 invoice-col">
                 <?php $count=0; ?>
                  @foreach($data as $d)
                  @foreach($course_user as $c)
                  @if($c->id==$d->course_order_id&&$count==0)
                  <address>
                  	<?php $count+=1; ?>
                    <strong>Name:</strong> {{$c->name}}<br>
                    <strong>Address: </strong>  {{$c->address}}
                    {{$c->city}} {{$c->state}} {{$c->pincode}}<br>
                    <strong>Email: </strong>  {{$c->user_email}}
                  </address>
                  @endif
                  @endforeach
                  @endforeach
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
         
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                      <th scope="col">Course Qty</th>
                      <th scope="col">Course Name</th>
                      <th scope="col">Course-id</th>
                      <th scope="col">Description</th>
                      <th scope="col">Course Image</th>
                      <th scope="col">Course Price</th>
                    </tr>
                    </thead>
                    <?php $total_amount=0; ?>
                    @foreach($data as $d)
                    <?php $total_amount=$total_amount+($d->course_price*$d->course_quantity); ?>
                    <tbody>
                    <tr class="text-center">
                      <td scope="col"> {{ $d->course_quantity }} </td>
                      <td scope="col"> {{ $d->course_name }} </td>
                      <td scope="col"> {{ $d->course_id }} </td>
                      <td scope="col"> {{ $d->order_note }} </td>
                      <td scope="col"> 
                        <img src="{{ url('/upload/'.$d->image) }}" style="height: 80px; width: 80px; border-radius: 100%;">
                      </td>
                      <td scope="col">{{ $d->course_price }}</td>
                    </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                
                <div class="col-6"></div>

                <div class="col-6">
                  
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo $total_amount; ?></td>
                      </tr>
                     
                        <?php $count=0; ?>
                        @foreach($data as $d)
                        @foreach($course_user as $c)
                        @if($c->id==$d->course_order_id&&$count==0)
                        <?php $count+=1; ?>
                        <tr>
                        <th>Coupan Code:</th>
                        <td>{{$c->coupan_code}}</td>
                        </tr>
                        <tr>
                        <th>Coupan Amount:</th>
                        <td>{{$c->coupan_amount}}</td>
                        </tr>
                        <tr>
                        <th>Total:</th>
                        <td>{{$c->total}}</td>
                        </tr> 
                        @endif
                        @endforeach
                        @endforeach
                     
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


@endsection