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

    <h1 style="padding-left: 20px;">Edit Coupon Details</h1><br><br>
    <div style="padding-left: 20px;padding-right: 70px;">
      <form method="post" action="{{url('admin/coupon/update')}}">
      @csrf
      <input type="hidden" name="id" value="{{$edit->id}}">
    Coupon Code:
      <input type="text" name="coupon_code" value="{{$edit->coupon_code}}" class="form-control"><br>
    Amount:
      <input type="text" name="amount" value="{{$edit->amount}}" class="form-control"><br>
    Amount Type: 
                    <select class="form-control" name="amount_type">
                        <option value="0">Select Type</option>
                        <option value="percentage"
                        @if($edit->amount_type=='percentage')selected
                           @endif
                           >Percentage</option>
                        <option value="fixed"
                        @if($edit->amount_type=='fixed')selected
                           @endif
                           >Fixed</option>
                    </select><br>
  
  Expiry Date:
   <input type="date" name="expiry_date" value="{{$edit->expiry_date}}" class="form-control"><br><br>

        <input type="submit" class="btn-btn-primary" name="update" value="update"><br><br>

 </form>
    
    </div>

  </div>
  <!-- /.content-wrapper -->


@endsection