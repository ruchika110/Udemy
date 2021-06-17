<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('backend/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Data Table LINKs-- -->
  <link rel="stylesheet" href="{{url('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- End Data Table-- -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar bg-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('backend/dist/img/download.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PN Education</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('backend/dist/img/1.jpeg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white">{{ Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-white"></i>
              <p class="text-white">
                Dashboard
              
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('admin/category')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/courses')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                 Courses
             </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/banner')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                 Banner
             </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('front/navbar')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Navbar/Footer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('front/online_course')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Online Courses
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/our_team')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Our Team
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/placement')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Placement
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/intern')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Intern
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/contact')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Contact
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/contact_data')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Contact Data
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('admin/notification')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Notification 
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('admin/workshop')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Workshop 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/coupon')}}" class="nav-link">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                Coupon 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"  
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="far fa-circle nav-icon text-white"></i>
              <p class="text-white">
                 {{ __('Logout') }}
             </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf 
            </form>
          </li>
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @section("content")

  @show


  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">PN Education</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('backend/dist/js/demo.js')}}"></script>
<!-- Data Tables Scripts -->
<script src="{{url('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- End Data table--- -->
</body>
</html>