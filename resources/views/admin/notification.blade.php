@extends("admin.master")
@section("content")

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Notification</h1>
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
    
   <!---- data table------>

   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                  <a class="btn btn-success btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add Notification</a>
</div>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-striped bg-light">
                <thead>
                <tr class="text-success text-center">
                  <th scope="col">Notification</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Action</th>
                  
                </tr>
                </thead>

                @foreach($display as $d)
                    
                    <tr>
                      <td>{{$d->notification}}</td>
                      <td>{{$d->start_date}}</td>
                      <td>{{$d->end_date}}</td>
                      <td>

                          <a href="{{url('admin/notification/edit/'.$d->id)}}"><input class="btn btn-success" type="submit" name="edit" value="Edit" style="width: 70px;"></a>
                          
                          <a href="{{url('admin/notification/delete/'.$d->id)}}"><input class="btn btn-danger" type="submit" name="delete" value="Delete"></a>
                      
                      </td>
                @endforeach
                

                

                <tbody>
                
                

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!------modal form----->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @if(session('message'))

    <p class ="alert alert-success">
        {{session('message')}}
    </p>
          
  @endif

        <form  method="post" action="{{url('admin/notification/save')}}">

           @csrf
    
              Notification:   
              <textarea class="form-control" name="notification"></textarea><br>

              Start Date:
              <input class="form-control" type="date" name="start_date"><br>

              End Date:
              <input class="form-control" type="date" name="end_date"><br>

              <input class="form-control btn btn-success" type="submit" name="submit">
        </form> 
</div>
  </div>
</div>
   </div>
   
    <!----end modal form------>

   <!----end data table------>
    
  </div>
  <!-- /.content-wrapper -->

 @endsection