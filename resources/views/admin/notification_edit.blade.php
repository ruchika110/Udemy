@extends("admin.master")

@section("content")

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT NOTIFICATION</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Notification</li>
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
                   
               <form  method="post" action="{{url('admin/notification/update')}}">

                  @csrf
                    <input type="hidden" name="id" value="{{$edit->id}}">

              Notification    
              <textarea class="form-control" name="notification">{{$edit->notification}}</textarea><br>

              Start Date:
              <input class="form-control" type="date" name="start_date" value="{{$edit->start_date}}"><br>

              End Date:
              <input class="form-control" type="date" name="end_date" value="{{$edit->end_date}}"><br>

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