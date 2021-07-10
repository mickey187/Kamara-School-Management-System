@extends('layouts.master')
@section('content')


                <div class="card card-orange">
                    <div class="card-header">
                      <h1 class="card-title text-white"><i class="nav-icon fas fa-user-plus"></i> Student Enrolment </h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <div class="callout callout-info row col-12">
                                <h5><i class="fas fa-info"></i> Student Information</h5>
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Full name</th>
                                            <th>Sex</th>
                                            <th>Grade</th>
                                            <th>Section</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($students as $row)
                                            <tr id="student_data">
                                                @php
                                                 $img = "storage/student_image/".$row->image;
                                                @endphp
                                                <td></td>
                                                <td>{{ $row->student_id }}</td>
                                                <td>{{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }}</td>
                                                <td>{{ $row->gender }}</td>
                                                <td>{{ $row->class_label }}</td>
                                                <td></td>
                                                <td>{{ $row->pass_fail_status }}</td>
                                                <td><div id="register">
                                                    <button type="button"
                                                    @if ( $row->pass_fail_status == "on load")
                                                        class="btn bg-danger btn-sm"
                                                    @else
                                                        class="btn bg-primary btn-sm"
                                                    @endif
                                                        data-toggle="modal"
                                                        data-target="#modal-student-enroll"
                                                        data-detail1="
                                                                {{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }},
                                                                {{ $row->id }},
                                                                {{ $row->gender }},
                                                                {{ $img }},
                                                                {{ $row->class_label }},
                                                                {{ $row->stream_type }}
                                                                    "
                                                                @if ( $row->pass_fail_status == "Registered")
                                                                    disabled
                                                                @endif
                                                                    >
                                                                @if ( $row->pass_fail_status == "on load")
                                                                    Register
                                                                @else
                                                                    Registered
                                                                @endif

                                                    </button>
                                                    </div>
                                                    </td>
                                            </tr>
                                        @endforeach
                                        <div class="col-2" >
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="modal fade card-outline " id="modal-student-enroll">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="card-header  bg-primary">
                            <h3 class="card-title">Student Details</h3>
                          </div>
                        <div class="modal-body">

                                <div class="text-center">
                                    <img class="profile-user-img img-fluid " style="width:200px;height:150px;" id="image" alt="User profile picture">
                                  </div>
                                  <div class="container h-100">
                                      <div class="row h-100 justify-content-center align-items-center">
                                          <div class="col-12">
                                            <table class="col-12">
                                                <tr>
                                                    <td ><p class=" text-right text-muted ">Name:</p> </td>
                                                    <td><p class="  " id="full_name"></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p class=" text-right text-muted  ">Gender: </p></td>
                                                    <td><p class="  " id="gender"></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p class=" text-right text-muted  ">Grade: </p></td>
                                                    <td><p class="  " id="grade"></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p class=" text-right text-muted  ">Stream: </p></td>
                                                    <td><p class=" " id="stream_type"></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p class=" text-right text-muted "> Transfered From:</p></td>
                                                    <td><p class="  " id="from"></p></td>
                                                </tr>
                                                <tr>
                                                    <td><p class=" text-right text-muted  "> Transfered To:</p></td>
                                                    <td><p class=" " id="to"></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                  </div>
                                   <select class="form-select">
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                    </select><br>
                                    <div id="register1" hidden><p id="id"></p></div>
                                    <button onclick="register(this);" type="button" class="col-6 btn btn-primary"  value="" >Register</button>
                        </div>
                        <div class="modal-footer">

                            <button type="close" data-dismiss="modal" class="btn btn-secondary float-right" name="delete" id="#2">Close</button>

                        </div>

                        </div>
                      </div>
                      <!-- /.modal-content -->
                </div>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


@endsection
