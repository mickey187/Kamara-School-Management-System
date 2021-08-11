@extends('layouts.master')
@section('content')
<div class="card card-orange ">
    <div class="card-header">
    <h3 class="card-title text-white"> <i class="nav-icon fas fa-users"></i> List of Student</h3>
    </div>
    <div class="card-body ">

    <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Full name</th>
                            <th>Sex</th>
                            <th>Grade</th>
                            <th>Section</th>
                            <th>Stream</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                            $counter = 0
                        ?>
                        @foreach ($student_list as $row)

                            <tr>
                                <td>{{$counter = $counter + 1}}</td>
                                <td>{{$row->student_id}}</td>
                                <td>{{$row->first_name.' '.$row->middle_name.' '.$row->last_name}}</td>
                                <td>{{$row->gender}}</td>
                                <td>{{$row->class_label}}</td>
                                <td>{{ $row->section_name }}</td>
                                <td>{{ $row->stream_type }}</td>
                                <td>
                                    @php
                                        $img = "storage/student_image/".$row->image;
                                    @endphp
                                    <a type="button" class="btn bg-green btn-sm"
                                    data-toggle="modal"
                                    data-target="#modal-student"
                                    data-detail1="
                                                {{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }},
                                                {{ $row->id }},
                                                {{ $row->gender }},
                                                {{ $img }},
                                                {{ $row->student_id }},
                                                {{ $row->class_label }},
                                                {{ $row->disablity }},
                                                {{ $row->medical_condtion }},
                                                {{ $row->blood_type }},
                                                {{ $row->transfer_reason }},
                                                {{ $row->suspension_status }},
                                                {{ $row->expulsion_status }},
                                                {{ $row->previous_special_education }},
                                                {{ $row->citizenship }},
                                                {{ $row->previous_school }},
                                                {{ $row->native_tongue }},
                                                {{ $row->birth_year }}

                                                {{-- {{ $row->emergency_contact_priority }} --}}
                                    ">
                                    <i class="fa fa-eye "></i></a>
                                    <a href="{{ url('edit_student_form/'.$row->id) }}" type="button" class="btn bg-primary btn-sm"><i class="fa fa-pen "></i></a>
                                    <a href="{{ url('studentParentList/'.$row->id) }}" class="fa fa-user btn bg-primary btn-sm"> parent</a>
                                    <a href="{{ url('marklist/'.$row->id) }}" class=" btn bg-primary btn-sm"><i class="fas fa-angle-double-right"></i> Mark List </a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
    </div>
</div>


<div class="modal fade card-outline " id="modal-student">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="card-header ">
            <h3 class="card-title" id="full_name"> Student Details</h3>
          </div>
        <div class="modal-body">
                    <div class="container">
                        <div class="main-body">
                              <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-column align-items-center text-center">
                                        <img class="rounded-circle" width="150" id="image" alt="User profile picture">
                                        {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> --}}
                                        <div class="mt-3">
                                          <h4 id="full_name"></h4>
                                          <p class="text-secondary mb-1" id="gender"></p>
                                          <p class="text-muted font-size-sm" id="grade"></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="card mb-3">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="full_name"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Student ID</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <h6 id="stID"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Grade</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="grade"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Birth Year</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="birth_year"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Citizenship</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="citizen"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Language</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="language"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Previous School</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="prev_school"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Education History</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="edu_history"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Expelsion Status</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="expulsion_status"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Suspension Status</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="suspension_status"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Transfer Reason</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="transfer_reason"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Disablity</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="disablity"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Medical Condtion</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="medical_condtion"></h6>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Blood Type</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 id="blood_type"></h6>
                                        </div>
                                      </div>
                                      {{-- <hr>
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <button class="btn btn-info " href="#">Edit</button>
                                        </div>
                                      </div> --}}
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                        </div>
        </div>
        <div class="modal-footer">

            <button type="close" data-dismiss="modal" class="btn btn-secondary float-right" name="delete" id="#2">Close</button>

        </div>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <div class="modal_delete">
        <div class="modal fade" id="modal_default">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Delete Subject</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p id="subjectid"></p>

                <p id="subjectname"></p>


                <span id="1" class="badge badge-primary"></span>
              </div>
              <form action="{{url('/deletesubject')}}" method="post">
                @csrf
              <div class="modal-footer justify-content-between">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="post" class="btn btn-danger" name="delete" id="#2">
                  Delete Subject</button>
                </form>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

        </div>




@endsection
