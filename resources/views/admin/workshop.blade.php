@extends("admin.master");
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Worshop</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Worshop</li>
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
                <h3 class="card-title">Add Worshop</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add Worshop</a>
</div>
              </div>
              <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
                 @endif
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Action</th>             
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                    <tr class="bg-light">
                      <td>{{$d->workshop_title}}</td>
                      <td><img src="{{ url('/upload/'.$d->workshop_image) }}" style="height: 100px; width: 120px; border-radius: 100%;"></td>
                      <td>
                        <a href="{{url('admin/workshop/edit/'.$d->id)}}">Edit</a>
                        <a href="{{url('admin/workshop/delete/'.$d->id)}}">Delete</a>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
                
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

    <!--modal form-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Workshop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h1>Add Workshop</h1>
<form method="post" action="{{url('admin/workshop/save')}}" enctype="multipart/form-data">
  @csrf
  Workshop Title:
                    <select class="form-control" name="workshop_title">
                        <option value="0">Select Company</option>
                        <option value="Xiaomi MI Company">Xiaomi MI Company</option>
                        <option value="Bentchair Company">Bentchair Company</option>
                        <option value="MPCT College">MPCT College</option>
                        <option value="RJIT College">RJIT College</option>
                    </select><br>
  Image:
   <input type="file" name="workshop_image" class="form-control"><br><br>
  
   <input type="submit" class="btn-btn-primary bg-primary" name="submit" value="submit">

 </form>
</div>
  </div>
</div>
   </div>
  </div>
  <!-- /.content-wrapper -->


@endsection