<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kamara School Management System | Dashboard</title>
    {{-- <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}"> --}}

    <link rel="shortcut icon" href="{{ asset('img/logos.png') }}" type="image/x-icon">
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
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <link rel="stylesheet" href="{{ asset('addclass.css') }}">

    <!-- DataTables -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}"> --}}
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
                        <span class="d-none d-sm-inline text-bold">Yohannes Kasse</span>
                    </a>
                    <ul class="mt-2 dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-orange">
                            <img src="{{ asset('img/default_picture.png') }}" class="img-circle" alt="User Image">

                            <p class="mt-0"> <span class="text-bold">Yohannes kassa</span> <br>
                                grade <br>
                                <span class="text"> section </span>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-6 text-left">
                                    <a href="#"><i class="fa fa-user"></i> My profile</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#"><i class="fa fa-sign-out-alt"></i> logout</a>
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
                            <a href="{{ url('dashboard') }}" class="nav-link active">
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



                        <!-- student -->

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Student
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('add_student')  }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Student</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('view_student')  }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Student</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('student_enrollment')  }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Enrollment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('sectionForm')  }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sectioning</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Teacher
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('listTeacher') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher List</p>
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
                                    <a href="{{ url('view_parents') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Parent List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    Employee
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/addEmployeeForm" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Employee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/listEmployee" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Employee List</p>
                                    </a>
                                </li>
                                    <li class="nav-item">
                                    <a href="/addTeacherForm" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Teacher</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/listTeacher" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teacher List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/addHomeRoom" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home Room</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Curriculum
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/addclasslabel" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Class Label</p>
                                    </a>
                                </li>

                                    <li class="nav-item">
                                        <a href="/viewclasslabel" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Class Label</p>
                                        </a>
                                    </li>
                                <li class="nav-item">
                                    <a href="/subject" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Subject</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/viewSubject" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Subjects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/indexAddClassSubject" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Class Subject</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/viewClassSubject" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Class Subject</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/addStream" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Stream</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/viewStream" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Stream</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('addSemister') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Semister</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('addMarkList') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Mark List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('Assasmentform') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Assasment</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/indexaddrole" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Role </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/viewrole" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Role </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-dollar-sign"></i>
                                <p>
                                    Finance
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('/indexAddPaymentType')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Payment Type</p>
                                    </a>
                                </li>

                                    <li class="nav-item">
                                        <a href="{{url('/viewPaymentType')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Payment Type</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                    <a href="{{url('/indexAddPaymentLoad')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Payment Load</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{url('/viewPaymentLoad')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Payment Load</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{url('indexAddTuitionPayment')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Tuiton Fee Payment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/viewTuitonPayment')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Tuiton Fee Payment</p>
                                    </a>
                                </li>

                         </ul>
                        </li>

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
                            @include('sweetalert::alert')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
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

    $('.select2').select2()
});
</script>

    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
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

     {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}





    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
    <!-- Page specific script -->

    {{-- <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script> --}}

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


       //  $('#modal_view').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget) // Button that triggered the modal
//   var detail = button.data('view')
//   // Extract info from data-* attributes
//   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//   var modal = $(this)
// //   modal.find('.modal-title').text('New message to ' + recipient)
//             var spit = detail.split(",");

// //var table = ('#example1').DataTable();
//   //modal.find('.modal-body p').text(detail)
//   modal.find('.modal-body #subjectid_view').text("subject id: "+spit[0]);
//   modal.find('.modal-body #stream_view').text("stream: "+spit[1]);
//   modal.find('.modal-body #subjectgroup_view').text("subject group: "+spit[2]);
//   modal.find('.modal-body #subjectname_view').text("subject name: "+spit[3]);
//   modal.find('.modal-footer button').val(spit[0])




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
</body>

</html>
