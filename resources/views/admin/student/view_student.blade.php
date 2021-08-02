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
                                                {{ $row->class_label }}
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
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="card-header  bg-primary">
            <h3 class="card-title">Student Registration</h3>
          </div>
        <div class="modal-body">

                <div class="text-center">
                    <img class="profile-user-img img-fluid " id="image" alt="User profile picture">
                  </div>
                  <h3 class="profile-username text-center" id="full_name"></h3>
                  <p class="text-muted text-center" id="gender"></p>
                    <ul class="list-group list-group-unbordered mb-3">
                            <li class="">
                            <b>ID</b> <p id="stID" class="">Not Set</p>
                            </li>
                            <li class="">
                            <b>Grade</b> <p id="grade">
                            </li>
                            <li class="">
                            <b>Section</b> <a class="text-center">Not Set</a>
                            </li>
                    </ul>

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
          <div class="modal-dialog">
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
