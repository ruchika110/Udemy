@extends("admin.master")
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <h1 style="padding-left: 20px;">Edit Workshop Details</h1><br><br>
    <div style="padding-left: 20px;padding-right: 70px;">
      <form method="post" action="{{url('admin/workshop/update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$edit->id}}">

                     Workshop Title:
                    <select class="form-control" name="workshop_title">
                        <option value="Xiaomi MI Company"
                        @if($edit->workshop_title=='Xiaomi MI Company')selected
                           @endif
                           >Xiaomi MI Company</option>
                        <option value="Bentchair Company"
                        @if($edit->workshop_title=='Bentchair Company')selected
                           @endif
                           >Bentchair Company</option>
                        <option value="MPCT College"
                        @if($edit->workshop_title=='MPCT College')selected
                           @endif
                           >MPCT College</option>
                        <option value="RJIT College"
                        @if($edit->workshop_title=='RJIT College')selected
                           @endif
                           >RJIT College</option>
                    </select><br>
  Image:
      <input type="file" name="workshop_image" class="form-control"><br><br>

      <img src="{{ url('/upload/'.$edit->workshop_image) }}" style="height: 150px; width: 150px; border-radius: 100%;"><br>

        <input type="submit" class="btn-btn-primary" name="update" value="update"><br><br>

 </form>
    
    </div>

  </div>
  <!-- /.content-wrapper -->


@endsection