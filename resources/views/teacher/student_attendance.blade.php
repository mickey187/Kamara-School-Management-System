@extends('teacher.teacher_master')

@section('content_teacher')

<div class="container-fluid">
    <div class="card card-orange">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                <li class="nav-item">
                    <a class="nav-link active text-bold" data-toggle="tab" href="#add_attendance_tab" id="add_attendance_tab_link" role="tab">Add Attendance</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bold" data-toggle="tab" href="#view_attendance_tab" id="view_attendance_tab_link" role="tab">View Attendance</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="add_attendance_tab" role="tabpanel">
                    <p>Add Attendance</p>

                    <div class="row">
                        <div class="col-12">
                           <div class="row">
                               <div class="col-6">
                                   <label for="">Choose Date</label>
                               
                                <input type="text" name="" id="ethio_date_inline" class="form-control mb-5" placeholder="choose date">
                                
                               </div>
                           </div>

                           <table id="attendance_table" class="table table-bordered table-striped mt-5">
                               <thead>
                                   
                                       <tr>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Class Label</th>
                                        <th>Section</th>
                                        <th>Action 
                                            <button type="button" id="submit_attendance" class="btn btn-primary">
                                                 <i class="fa fa-upload" aria-hidden="true"></i> 
                                            </button></th>
                                       </tr>
                                   
                               </thead>
                               <tbody>
                                {{-- @foreach ($section as $row)
                                    <tr>
                                        <td>{{$row->student_id}}</td>
                                        <td>{{$row->class_label}}</td>
                                        <td>{{$row->section_name}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach --}}
                               </tbody>
                           </table>
                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="view_attendance_tab" role="tabpanel">
                    <p>View Attendance</p>

                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="" id="ethio_date_inline_view" class="form-control mb-5" placeholder="choose date" autocomplete="nope">
                        </div>
                    </div>

                    

                    
                    <table id="view_attendance_table" class="table table-bordered table-striped mt-5">
                        <thead>
                            <tr>
                                <th colspan="5"> <h5 id="date_header" class="text-primary"></h5> </th>
                            </tr>
                            <tr>
                                <th>Student ID</th>
                                <th>Full Name</th>
                                <th>Class Label</th>
                                <th>Section</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection