@extends("admin.master")

@section("content")

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT NAVBAR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">NAVBAR</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!--data table-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                   
               <form  method="post" action="{{url('front/update')}}" enctype="multipart/form-data">

                  @csrf
                    <input type="hidden" name="id" value="{{$edit->id}}">

              Email:    
              <input class="form-control" type="text" name="email" value="{{$edit->email}}"><br>

              Phone Number:
              <input class="form-control" type="text" name="phone_number" value="{{$edit->phone_number}}"><br>

              Address:
              <input class="form-control" type="text" name="address" value="{{$edit->address}}"><br>

              Description:
              <textarea class="form-control" type="text" name="description">{{$edit->description}}</textarea><br>

              Image:
              <img src="{{ url('/upload/'.$edit->image) }}" style="height: 150px; width: 150px; border-radius: 60px;"><br>
              <input class="form-control" type="file" name="image"><br>

               <input class="form-control btn btn-success" type="submit" name="update" value="UPDATE">
        </form> 

               </form> 
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

<!-- ------End Data Table------- -->

  </div>

  <!-- /.content-wrapper -->
 
  </body>
  </html>

@endsection