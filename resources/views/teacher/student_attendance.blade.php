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
                    <p id="attendance_data" data-class_id="{{$class_id}}" data-stream_id="{{$stream_id}}" data-section="{{$section}}" hidden></p>

                    <div class="row">
                        <div class="col-12">
                           <div class="row">
                               <div class="col-6">
                                   <label for="">Choose Date</label>
                               
                                <input type="text" name="" autocomplete="off" id="ethio_date_inline" class="form-control mb-5" placeholder="choose date">
                                
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
                            <input type="text" name="" autocomplete="off" id="ethio_date_inline_view" class="form-control mb-5" placeholder="choose date" autocomplete="nope">
                        </div>
                    </div>

                    

                    
                    <table id="view_attendance_table" class="table table-bordered table-striped mt-5">
                        <thead>
                            <tr>
                                <th colspan="6"> <h5 id="date_header" class="text-primary"></h5> </th>
                            </tr>
                            <tr>
                                <th>Student ID</th>
                                <th>Full Name</th>
                                <th>Class Label</th>
                                <th>Section</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>



    {{-- modals --}}

    
{{-- view_attendance_for_specific_student modal --}}
<div class="modal fade" id="view_attendance_for_specific_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="view_attendance_modal_header">View Attendance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5 class="text-success" id="view_attendance_student_id"></h5>
          <h5 class="text-success" id="view_attendance_full_name"></h5>
          <h5 class="text-success" id="view_attendance_class_label"></h5>
          <h5 class="text-success" id="view_attendance_stream_type"></h5>
          <h5 class="text-success" id="view_attendance_section"></h5>
          <h5 class="text-success" id="view_attendance_date"></h5>
          <h5 class="text-success" id="view_attendance_status"></h5>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

{{-- edit_attendance_for_specific_student --}}

<div class="modal fade" id="edit_attendance_for_specific_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit_attendance_modal_header">Edit Attendance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5 class="text-success" id="edit_attendance_student_id"></h5>
            <h5 class="text-success" id="edit_attendance_full_name"></h5>
            <h5 class="text-success" id="edit_attendance_class_label"></h5>
            <h5 class="text-success" id="edit_attendance_stream_type"></h5>
            <h5 class="text-success" id="edit_attendance_section"></h5>
            <h5 class="text-success" id="edit_attendance_date"></h5>
            <select name="edit_student_attendance_status" id="edit_student_attendance_status" class="form-control">
                <option value="present">Present</option>
                <option value="absent">Absent</option>
                <option value="leave">Leave</option>
            </select>
            {{-- <h5 class="text-success" id="view_attendance_status"></h5> --}}
        
        </div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel_edit_attendance_modal">Cancel</button>
          <button type="button" class="btn btn-info" data-dismiss="modal" id="edit_attendance_btn">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection