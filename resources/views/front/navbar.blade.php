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
            <h1 class="m-0 text-dark">Navbar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Navbar</li>
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
                  <a class="btn btn-success btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add Navbar</a>
</div>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-striped bg-light">
                <thead>
                <tr class="text-success text-center">
                  <th scope="col">Sr No.</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Address</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                  
                </tr>
                </thead>
                <tbody>
                
                @foreach($disp as $key=>$d)
                    
                    <tr class="text-center">
                    
                      <td scope="col">{{$key+1}}</td>
                      <td scope="col">{{$d->email}}</td>
                      <td scope="col">{{$d->phone_number}}</td>
                      <td scope="col">{{$d->address}}</td>
                      <td scope="col">{{$d->description}}</td>
                      <td scope="col"><img src="{{ url('/upload/'.$d->image) }}" style="height: 150px; width: 150px; border-radius: 60px;"></td>

                      <td scope="col">

                          <a href="{{url('front/navbar_edit/'.$d->id)}}"><input class="btn btn-success" type="submit" name="edit" value="Edit" style="width: 70px;"></a><br><br>
                          <a href="{{url('front/delete/'.$d->id)}}"><input class="btn btn-danger" type="submit" name="delete" value="Delete"></a>
                      
                      </td>
                    </tr>

                @endforeach
                

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
        <h5 class="modal-title" id="exampleModalLabel">Add Navbar</h5>
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

        <form  method="post" action="{{url('front/save')}}" enctype="multipart/form-data">

           @csrf
    
              Email    
              <input class="form-control" type="text" name="email"><br>

              Phone Number:
              <input class="form-control" type="text" name="phone_number"><br>

              Address:
              <input class="form-control" type="text" name="address"><br>

              Description:
              <textarea class="form-control" type="text" name="description"></textarea><br>

              Image:
              <input class="form-control" type="file" name="image"><br>

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