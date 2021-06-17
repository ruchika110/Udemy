@extends("admin.master")

@section("content")

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDIT COURSES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
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
                   
               <form  method="post" action="{{url('admin/course/update')}}" enctype="multipart/form-data">

                  @csrf
                    <input type="hidden" name="id" value="{{$edit->id}}">

              Course Name:    
              <input class="form-control" type="text" name="name" value="{{$edit->name}}"><br>

              Course Description:
              <textarea class="form-control" type="text" name="description">{{$edit->description}}</textarea><br>

              Course Price:
              <input class="form-control" name="price" value="{{$edit->price}}"><br>

              Course Detail:
              <textarea class="form-control" name="detail">{{$edit->detail}}</textarea><br>

              Course Include:
              <textarea class="form-control" name="course_include">{{$edit->course_include}}</textarea><br>

              Course Content:
              <textarea class="form-control" name="course_content">{{$edit->course_content}}</textarea><br>

              Category:
              <select class="form-control" name="category">
                <option value="0">Select Category</option>
                <option value="Web Designing" @if($edit->category=='Web Designing') selected @endif>Web Designing</option>
                <option  value="Web Development" @if($edit->category=='Web Development') selected @endif>Web Development</option>
                <option value="Laravel" @if($edit->category=='Laravel') selected @endif>Laravel</option>
                <option value="Angular" @if($edit->category=='Angular') selected @endif>Angular</option>
                <option value="ReactJs" @if($edit->category=='ReactJs') selected @endif>ReactJs</option>
                <option value="NodeJs" @if($edit->category=='NodeJs') selected @endif>NodeJs</option>
                <option value="Python" @if($edit->category=='Python') selected @endif>Python</option>
                <option value="Other" @if($edit->category=='Other') selected @endif>Other</option>
              </select>

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