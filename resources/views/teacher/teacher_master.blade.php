<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kamara School Management System | Dashboard</title>
    {{-- <script src="{{asset('plugins/pace-progress/pace.min.js')}}"></script>
     <link rel="stylesheet" href="{{asset('plugins/pace-progress/themes/red/pace-theme-material.css')}}"> --}}
     <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}

    <link rel="shortcut icon" href="{{ asset('img/logos.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/loading_modal.css') }}" >
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">

    <!-- select2  -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('main.css') }}">

    <link rel="stylesheet" href="{{ asset('addclass.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" /> --}}
    <!-- DataTables -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" crossorigin="anonymous"> --}}

<!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

<!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
<!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->

{{-- ethio calendar --}}
<link rel="stylesheet" href="{{asset('plugins/AmharicDatepickerCalendar-master/css/redmond.calendars.picker.css')}}">
<!-- the fileinput plugin styling CSS file -->
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
        {{-- <?php
            // $user_id =  Auth::id();
            // $user = User::find($user_id);
            // $employee = employee::where('employee_id',$user->user_id)->first();
        ?> --}}
<body  class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="AdminLTELogo"
                height="150" width="150">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <h2 class="text-bold">Kamara School</h2>
            </ul>




            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('img/default_picture.png') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        sender name
                                    </h3>
                                    <p class="text-sm">massage hint </p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>


                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown user-menu">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{ asset('img/default_picture.png') }}" class="user-image" alt="User Image">
                        <span class="d-none d-sm-inline text-bold">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="mt-2 dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-orange">
                            <img src="{{ asset('img/default_picture.png') }}" class="img-circle" alt="User Image">

                            <p class="mt-0"> <span class="text-bold">{{ Auth::user()->name }}</span> <br>
                                grade <br>
                                <span class="text"> section </span>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-6 text-left">
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-detail3="Profile,{{ $employee->id }}"
                                        data-target="#modal-dashboard"><i class="fa fa-user" ></i>My profile</button>
                                </div>


                                <div class="col-6 text-right">
                                    {{-- <a href="{{route('logout')}}"><i class="fa fa-sign-out-alt"></i> logout</a> --}}
                                    <form action="{{url('/logout')}}" method="post">
                                        @csrf
                                        <input type="submit" value="logout" class="btn btn-secondary">
                                    </form>
                                </div>

                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-lightblue elevation-4">
            <!-- Brand Logo -->

            <div class="brand-links text-center m-0 p-0 ">
                <a href="#">
                    <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo"
                        class="brand-images  mt-2 mb-1 img-circle elevation-1" />
                </a>
            </div>



            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <div class="user-panel mt-1 mb-1 d-flex">
                    <span class="info text-black-50"> Navigation </span>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ url('teacherDashBoard') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">

                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../pages/mailbox/mailbox.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inbox</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../pages/mailbox/compose.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Compose</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../pages/mailbox/read-mail.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Read</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                   My Class
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a onclick="getCourseLoad('{{ $employee->id }}');" style="cursor: pointer;" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Course Load</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  onclick="getHomeRoom('{{ $employee->id }}');"  style="cursor: pointer;" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home Room</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"
                                        data-toggle="modal"
                                        data-detail3="Profile,{{ $employee->id }}"
                                        data-target="#modal-dashboard"
                                    >
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Parents
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Parent List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- End of teacher --}}
                        <hr>
                        <li class="nav-header">MISCELLANEOUS</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-green"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>log-out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper  background_master">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->

            <!-- /.content -->


            <section class="content mt-3">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            {{-- @include('sweetalert::alert') --}}
                            @yield('content_teacher')
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </div>
    <div class="modal fade bd-example-modal-lg" id="loading_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="width: 48px">
                <span class="fa fa-spinner fa-spin fa-3x"></span>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://hawisoftware.com.et">hawisoftware.com.et</a></strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
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

    {{-- <script src="sweetalert2.min.js"></script> --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->

<!-- select 2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
$(function() {

    $('.select2').select2();
});
</script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }} "></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }} "></script>
    <!-- jQuery Knob Chart -->
    <script src=" {{ asset('plugins/jquery-knob/jquery.knob.min.js') }} "></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('section.js') }}"></script>



    <!-- view class js -->
    <script src="{{ asset('view_subject.js') }}"></script>

    <!-- view role js -->
    <script src="{{ asset('view_role.js') }}"></script>

    <!-- view class label js -->
    <script src="{{ asset('view_class_label.js') }}"></script>

     <!-- view_class_subject js -->
     <script src="{{ asset('view_class_subject.js') }}"></script>

     <!-- view stream js -->
     <script src="{{ asset('view_stream.js') }}"></script>


     <!-- add payments js -->
     <script src="{{ asset('add_payments.js') }}"></script>

      <!-- student discount js -->
      <script src="{{ asset('student_discount.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('dist/js/addclass.js')}}"></script>
    {{-- <script src="{{ asset('dist/js/employee.js') }}"></script> --}}
    <script src="{{ asset('dist/js/parent_modal.js') }}"></script>
    <script src="{{ asset('dist/js/student_modal.js') }}"></script>
    <script src="{{ asset('dist/js/student_enroll_model.js') }}"></script>
    <script src="{{ asset('dist/js/script.js') }}"></script>
    <script src="{{ asset('dist/js/delete_parent_modal.js') }}"></script>
    <script src="{{ asset('dist/js/teacher.js') }}"></script>
    <script src="{{ asset('dist/css/checkbox.css') }}"></script>
    <script src="{{ asset('dist/js/teacher_home_room.js') }}"></script>
    <script src="{{ asset('dist/js/semister_status.js') }}"></script>
    <script src="{{ asset('dist/js/view_teacher_modal.js') }}"></script>
    <script src="{{ asset('dist/js/view_teacher_home_room.js') }}"></script>
    <script src="{{ asset('dist/js/view_teacher_course_load.js') }}"></script>
    <script src="{{ asset('dist/js/modal_generate_excel.js') }}"></script>
    <script src="{{ asset('dist/js/loading_modal.js') }}"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    {{-- <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.js') }}"></script> --}}
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script> --}}
    <!-- Page specific script -->

    {{-- <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script> --}}

    <script src="{{ asset('attendance.js')}}"></script>

    {{-- ethio calendar --}}

    {{-- <script  src="js/jquery.calendars.js"></script>
    <script  src="js/jquery.calendars.plus.js"></script>
    <script  src="js/jquery.calendars.picker.js"></script>
    <script  src="js/jquery.calendars.ethiopian.js"></script>
    <script  src="js/jquery.calendars.ethiopian-am.js"></script>
    <script  src="js/jquery.calendars.picker-am.js"></script> --}}

    <script src="{{asset('plugins/AmharicDatePickerCalendar-master/js/jquery.plugin.js')}}"></script>
    <script src="{{asset('plugins/AmharicDatepickerCalendar-master/js/jquery.calendars.js')}}"></script>
    <script src="{{asset('plugins/AmharicDatePickerCalendar-master/js/jquery.calendars.plus.js')}}"></script>
    <script src="{{asset('plugins/AmharicDatePickerCalendar-master/js/jquery.calendars.picker.js')}}"></script>
    <script src="{{asset('plugins/AmharicDatePickerCalendar-master/js/jquery.calendars.ethiopian.js')}}"></script>
    <script src="{{asset('plugins/AmharicDatePickerCalendar-master/js/jquery.calendars.ethiopian-am.js')}}"></script>

    {{-- <script src="{{asset('plugins/AmharicDatePickerCalendar-master/js/jquery.calendars.picker-am.js')}}"></script> --}}

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


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
    <script>
        $(function () {
          $("#img-pro").change(function(){
            var reader = new FileReader();
            reader.onload = function(image){
              $("#dsp-pro").attr('src',image.target.result);
            }
            reader.readAsDataURL(this.files[0]);
          });
          $("#dsp-pro").click(function () {
            $("#img-pro").click();
          });
        })
      </script>
      {{-- <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
      {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script> --}}

      <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
          wish to resize images before upload. This must be loaded before fileinput.min.js -->
      <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/piexif.min.js" type="text/javascript"></script>

      <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
          This must be loaded before fileinput.min.js -->
      <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/sortable.min.js" type="text/javascript"></script>

      <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
          dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

      <!-- the main fileinput plugin script JS file -->
      <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/fileinput.min.js"></script>

      <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
      <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/themes/fas/theme.min.js"></script -->

      <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
      <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/locales/LANG.js"></script>
</body>

</html>
