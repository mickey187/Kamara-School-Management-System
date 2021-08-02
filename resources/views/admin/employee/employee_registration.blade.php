@extends('layouts.master')
@section('content')



        <div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt">
    @if(isset($edit_employee))
        </i>Edit Employee</h3>
     @else
        </i>Add Employee</h3>
    @endif

</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">
               <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
               
                        <div class="formcontainer">
                            <div class="form-outer">



                                <form action="
                                @if(isset($edit_employee)){{
                                    url('update_employee/'.$edit_employee->id)
                                }}@else{{
                                    url('addEmployee')
                                }}@endif" method="GET">
                                  @csrf
                                    <div class="page slidePage">
                                        <div class="" style="margin-left: 15px;">
                                            <div class="card card-header bg-light">
                                                <h3 class="card-title float-right"> Basic information</h3>
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-4">
                                                <div class="field">
                                                    <div class="label">First name</div>
                                                    <input type="text" id="first_name" name="first_name" class="form-control" 
                                                    
                                                       onkeydown="return alphaOnly(event);"
                                                        onblur="if (this.value == '')"
                                                        onfocus="if (this.value == '') {this.value = '';}"
                                                        placeholder="First name" required size="30" minlength="3" maxlength="21"

                                                    @if(isset($edit_employee))
                                                        value="{{ $edit_employee->first_name }}"
                                                    @else
                                                        value=""
                                                    @endif
                                                    ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>

                                                </div>
                                                <div class="field">
                                                    <div class="label">Birth Date</div>
                                                    <input type="date"  name="birth_date" class="form-control" id="birth_date" 
                                                    placeholder="Enter your birth date"

                                                        onkeydown="return alphaOnly(event);"
                                                        onblur="if (this.value == '')"
                                                        onfocus="if (this.value == '') {this.value = '';}"
                                                        required size="30" minlength="3" maxlength="21"

                                                        @if(isset($edit_employee))
                                                        value="{{ $edit_employee->birth_date }}"
                                                        @else
                                                            value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>
                                                <div class="field">
                                                    <div class="label">Education Status</div>
                                                    <input type="text" id="education_status" name="education_status" class="form-control" id="hired_date" 
                                                    placeholder="Enter your education status"

                                                        onkeydown="return alphaOnly(event);"
                                                        onblur="if (this.value == '')"
                                                        onfocus="if (this.value == '') {this.value = '';}"
                                                        required size="30" minlength="3" maxlength="21"

                                                        @if(isset($edit_employee))
                                                            value="{{ $edit_employee->education_status }}"
                                                        @else
                                                            value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>


                                            </div>
                                            <div class="col-4">
                                                <div class="field">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="middle_name" name="middle_name" class="form-control"
                                                     placeholder="Middle name"

                                                        onkeydown="return alphaOnly(event);"
                                                        onblur="if (this.value == '')"
                                                        onfocus="if (this.value == '') {this.value = '';}"
                                                        required size="30" minlength="3" maxlength="21"

                                                    @if(isset($edit_employee))
                                                    value="{{ $edit_employee->middle_name }}"
                                                    @else
                                                        value=""
                                                    @endif
                                                    ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                                <div class="field">
                                                    <div class="label">Gender</div>
                                                    <select id="gender" class="form-control" name="gender">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>

                                                </div>


                                                           <div class="field">
                                                            <div class="label">Citizenship</div>
                                                               <input id="citizen" type="text" name="citizen" class="form-control"
                                                                placeholder="Cityzenship"

                                                                    onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                                     @if(isset($edit_employee))
                                                                            value="{{ $edit_employee->citizen  }}"
                                                                        @else
                                                                            value=""
                                                                        @endif>
                                                               <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                             </div>
                                                         </div>
                                          <div class="col-4">
                                                <div class="field">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="last_name" name="last_name"  class="form-control" 
                                                    placeholder="Last name"

                                                      onkeydown="return alphaOnly(event);"
                                                      onblur="if (this.value == '')"
                                                      onfocus="if (this.value == '') {this.value = '';}"
                                                      required size="30" minlength="3" maxlength="21"

                                                    @if(isset($edit_employee))
                                                        value="{{ $edit_employee->last_name  }}"
                                                    @else
                                                        value=""
                                                    @endif
                                                    ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                                <div class="field">
                                                    <div class="label">Marriage Status</div>
                                                        <select id="marriage_status" class="form-control" name="marriage_status">
                                                                <option>married</option>
                                                                <option>divorce</option>
                                                                <option>widow</option>
                                                            </select>
                                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>

                                                </div>
                                                <div class="field">
                                                    <div class="label">Hired Date</div>
                                                    <input type="date" name="hired_date" class="form-control" id="hired_date" 
                                                    placeholder="Enter your hired date"

                                                     onkeydown="return alphaOnly(event);"
                                                    onblur="if (this.value == '')"
                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                    required size="30" minlength="3" maxlength="21"

                                                    @if(isset($edit_employee))
                                                        value="{{ $edit_employee->hired_date }}"
                                                    @else
                                                        value=""
                                                    @endif
                                                    ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                          </div>
                                        </div>
                                       <div class="field ">
                                            <button value="1" class="Emp_nextBtn btn btn-primary" type="button">Next</button>
                                        </div>

                                    </div>
                                    <div class="page">
                                        <div class="" style="margin-left: 15px;">
                                            <div class="card card-header bg-light">
                                                <h3 class="card-title float-right"> Background info</h3>
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-4">
                                                <div class="field">
                                                    <div class="label">Job Trainning</div>
                                                    <input type="text" id="job_trainning" name="job_trainning" class="form-control"  
                                                    placeholder="Enter your job trainning"

                                                     onkeydown="return alphaOnly(event);"
                                                    onblur="if (this.value == '')"
                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                    required size="30" minlength="3" maxlength="21"

                                                       @if(isset($edit_employee))
                                                         value="{{ $edit_employee->job_trainning }}"
                                                       @else
                                                          value=""
                                                      @endif
                                                      ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>
                                                <div class="field">
                                                    <div class="label">Previous Employment</div>
                                                    <input type="text" id="previous_employment" name="previous_employment" class="form-control" 
                                                     placeholder="Enter your previous employment"

                                                      onkeydown="return alphaOnly(event);"
                                                      onblur="if (this.value == '')"
                                                      onfocus="if (this.value == '') {this.value = '';}"
                                                     required size="30" minlength="3" maxlength="21"

                                                        @if(isset($edit_employee))
                                                        value="{{ $edit_employee->previous_employment }}"
                                                        @else
                                                        value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>

                                                <div class="field">
                                                    <div class="label">Special Skill</div>
                                                    <input type="text" id="special_skill" name="special_skill" class="form-control" 
                                                     placeholder="Enter your special skill"

                                                      onkeydown="return alphaOnly(event);"
                                                       onblur="if (this.value == '')"
                                                       onfocus="if (this.value == '') {this.value = '';}"
                                                       required size="30" minlength="3" maxlength="21"

                                                        @if(isset($edit_employee))
                                                        value="{{ $edit_employee->special_skill }}"
                                                        @else
                                                        value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="field">
                                                    <div class="label">Net Salary</div>
                                                    <input type="text" id="net_salary" name="net_salary" class="form-control"  
                                                    placeholder="Enter your net salary"

                                                     onkeydown="return alphaOnly(event);"
                                                     onblur="if (this.value == '')"
                                                     onfocus="if (this.value == '') {this.value = '';}"
                                                    required size="30" minlength="3" maxlength="21"

                                                        @if(isset($edit_employee))
                                                        value="{{ $edit_employee->net_salary }}"
                                                        @else
                                                        value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>
                                                <div class="field">
                                                    <div class="label">Hire Type</div>
                                                    <input type="text" id="hire_type" name="hire_type" class="form-control"  
                                                    placeholder="Enter your hire type"

                                                     onkeydown="return alphaOnly(event);"
                                                     onblur="if (this.value == '')"
                                                     onfocus="if (this.value == '') {this.value = '';}"
                                                     required size="30" minlength="3" maxlength="21"

                                                        @if(isset($edit_employee))
                                                        value="{{ $edit_employee->hire_type }}"
                                                        @else
                                                        value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>
                                                <div class="field">
                                                <div class="label">Employee Religion</div>
                                                    <select id="employee_religion" name="employee_religion" class="form-control form-select" aria-label="employee_religion" >
                                                        @foreach( $edit_all as $row )
                                                        {{$row->religion_name}}
                                                            <option value="{{ $row->id }}"
                                                            @if(isset($edit_employee))
                                                            @if($row->id == $edit_employee->employee_religion_id )
                                                                selected
                                                                @endif
                                                                @endif
                                                        >{{$row->religion_name}}</option>

                                                        @endforeach
                                                    </select>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>

                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="field">
                                                    <div class="label">Emergency Contact</div>
                                                     <input type="text" id="emergency_contact" name="emergency_contact" class="form-control"  
                                                     placeholder="Enter your past emergency contact name"

                                                      onkeydown="return alphaOnly(event);"
                                                      onblur="if (this.value == '')"
                                                      onfocus="if (this.value == '') {this.value = '';}"
                                                       required size="30" minlength="3" maxlength="21"

                                                      @if(isset($edit_employee))
                                                         value="{{  $edit_employee->contact_name }}"
                                                      @else
                                                          value=""
                                                      @endif
                                                      ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>
                                                  <div class="field">
                                                    <div class="label">relation</div>
                                                     <input type="text" id="relation" name="relation" class="form-control"
                                                       placeholder="Enter your relation"

                                                        onkeydown="return alphaOnly(event);"
                                                         onblur="if (this.value == '')"
                                                          onfocus="if (this.value == '') {this.value = '';}"
                                                           required size="30" minlength="3" maxlength="21"

                                                       @if(isset($edit_employee))
                                                         value="{{ $edit_employee->relation }}"
                                                       @else
                                                        value=""
                                                      @endif
                                                      ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>
                                              <div class="field">
                                                    <div class="label">Past Job Position</div>
                                                     <input type="text" id="past_job_position" name="past_job_position" class="form-control" 
                                                     placeholder="Enter your past job position"

                                                                    onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                      @if(isset($edit_employee))
                                                         value="{{ $edit_employee->past_job_position }}"
                                                      @else
                                                         value=""
                                                      @endif
                                                      ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="field btns">
                                            <button type="button" class="Emp_prev-1 prev btn btn-primary">Previous</button>
                                            <button type="button" class="Emp_next-1 next btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                        <div class="page">
                                        <div class="" style="margin-left: 15px;">
                                            <div class="card card-header bg-light">
                                                <h3 class="card-title float-right">  employee job info</h3>
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                             <div class="col-4">
                                               

                                                <div class="field">
                                                    <div class="label">Past Employment Place</div>
                                                    <input type="text" id="past_employment_place" name="past_employment_place" class="form-control"
                                                      placeholder="Enter your past employment place"

                                                                     onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                        @if(isset($edit_employee))
                                                        value="{{  $edit_employee->past_employee_place }}"
                                                        @else
                                                            value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                                <div class="field">
                                                <div class="label">Role</div>
                                                    <select id="role_selecter" name="employee_role" class="form-control form-select" aria-label="employee_role" name="employee_role">
                                                            @foreach($edit_all_role as $row)
                                                            {{$row->role_name}}
                                                            <option value="{{$row->id}}"
                                                            @if(isset($edit_employee))
                                                                @if($row->id == $edit_employee->role_id)
                                                                selected
                                                                @endif
                                                                @endif
                                                                >{{$row->role_name}}</option>
                                                                @endforeach
                                                    </select>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>

                                                    <div class="field">
                                                    <div class="label">Job Position</div>
                                                    <select id="job_position_selecter" name="job_position" class="form-control form-select" aria-label="job_position" name="job_position">
                                                        @foreach( $job_position as $row )
                                                        {{ $row->position_name }}
                                                        <option value="{{ $row->id }}"
                                                        @if(isset($edit_employee) )
                                                            @if( $row->id == $edit_employee->employee_job_position_id )
                                                                selected
                                                            @endif
                                                        @endif
                                                        >{{ $row->position_name }}</option>
                                                        @endforeach

                                                    </select>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>

                                                </div>
                                            </div>
                                            </div>
                                        <div class="row col-8">
                                            <div class="col-4">
                                                {{-- <div class="field">
                                                    <div class="label">Job Position</div>
                                                    <select id="job_position_selecter" name="job_position" class="form-control form-select" aria-label="job_position" name="job_position">
                                                        @foreach( $job_position as $row )
                                                        {{ $row->position_name }}
                                                        <option value="{{ $row->id }}"
                                                        @if(isset($edit_employee) )
                                                            @if( $row->id == $edit_employee->employee_job_position_id )
                                                                selected
                                                            @endif
                                                        @endif
                                                        >{{ $row->position_name }}</option>
                                                        @endforeach

                                                    </select>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                                </div> --}}

                                                <div class="field" id="debut_as_a_teacher" >
                                                    <div class="label">debut_as_a_teacher</div>
                                                        <input  type="date" name="debut_as_a_teacher" id="debut_as_a_teacher_val" class="form-control"  aria-describedby="debut_as_a_teacher"
                                                         placeholder="Enter your debut as a teacher"

                                                                    onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                        @if(isset($teacher))
                                                        value="{{ $teacher->debut_as_a_teacher }}"
                                                        @else
                                                        value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                                <div class="field" id="field_of_study">
                                                    <div class="label">field_of_study</div>
                                                            <input type="text" name="field_of_study" id="field_of_study_val"  class="form-control"
                                                             placeholder="Enter your field of study"

                                                                    onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                        @if(isset($teacher))
                                                        value="{{ $teacher->field_of_study }}"
                                                        @else
                                                            value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                                                                                <div class="field" id="teacher_traning_program">
                                                    <div class="label">teacher_traning_program</div>
                                                    <input type="text" name="teacher_traning_program" id="teacher_traning_program_val"  class="form-control" 
                                                    placeholder="Enter your teacher training program"

                                                                     onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                        @if(isset($teacher))
                                                            value="{{ $teacher->teacher_traning_program }}"
                                                            @else
                                                            value=""
                                                            @endif
                                                            ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="field" id="place_of_study">
                                                    <div class="label">place_of_study</div>
                                                    <input type="text" name="place_of_study" id="place_of_study_val"  class="form-control"
                                                     placeholder="Enter your place of study"

                                                                     onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                        @if(isset($teacher))
                                                        value="{{ $teacher->place_of_study }}"
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>

                                                <div class="field" id="date_of_study">
                                                    <div class="label">date_of_study</div>
                                                    <input type="date" name="date_of_study" id="date_of_study_val"  class="form-control" 
                                                    placeholder="Enter your date of study"

                                                                     onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                        @if(isset($teacher))
                                                        value="{{ $teacher->date_of_study }}"
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>


                                            </div>
                                            <div class="col-4">
                                                <div class="field" id="teacher_traning_year">
                                                    <div class="label">teacher_traning_year</div>
                                                        <input type="date" name="teacher_traning_year" id="teacher_traning_year_val"  class="form-control"
                                                         placeholder="Enter your teacher training year"

                                                                     onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                            @if(isset($teacher))
                                                                value="{{  $teacher->teacher_traning_year }}"
                                                            @else
                                                                value=""
                                                            @endif
                                                            ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                                <div class="field" id="teacher_traning_institute">
                                                    <div class="label">teacher_traning_institute</div>
                                                    <input type="text" name="teacher_traning_institute" id="teacher_traning_institute_val"  class="form-control" 
                                                    placeholder="Enter your teacher training institute"

                                                                    onkeydown="return alphaOnly(event);"
                                                                    onblur="if (this.value == '')"
                                                                    onfocus="if (this.value == '') {this.value = '';}"
                                                                    required size="30" minlength="3" maxlength="21"

                                                        @if(isset($teacher))
                                                        value="{{ $teacher->teacher_traning_institute }}"
                                                        @else
                                                        value=""
                                                        @endif
                                                        ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                         <div class="field btns">
                                            <button type="button" class="Emp_prev-2 prev btn btn-primary">Previous</button>
                                            <button type="button" class="Emp_next-2 next btn btn-primary">Next</button>
                                        </div>
                                        </div>

                                    <div class="page">
                                        <div class="" style="margin-left: 15px;">
                                            <div class="card card-header bg-light">
                                                <h3 class="card-title float-right"> Address info</h3>
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                        <div class="col-4">
                                         <div class="field">
                                            <div class="label">City</div>
                                            <input type="text" id="city" name="City" class="form-control" 
                                            placeholder="City"

                                                 onkeydown="return alphaOnly(event);"
                                                 onblur="if (this.value == '')"
                                                onfocus="if (this.value == '') {this.value = '';}"
                                                required size="30" minlength="3" maxlength="21"

                                             @if(isset($edit_employee))
                                               value="{{ $edit_employee->city }}"
                                               @else
                                               value=""
                                            @endif
                                            ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                        </div>
                                        <div class="field">
                                            <div class="label">Sub city</div>
                                            <input type="text" id="sub_city" name="sub_city" class="form-control"
                                             placeholder="Subcity"

                                              onkeydown="return alphaOnly(event);"
                                             onblur="if (this.value == '')"
                                             onfocus="if (this.value == '') {this.value = '';}"
                                             required size="30" minlength="3" maxlength="21"
                                                                    
                                             @if(isset($edit_employee))
                                               value="{{ $edit_employee->subcity }}"
                                               @else
                                               value=""
                                            @endif
                                            ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                        </div>
                                        <div class="field">
                                            <div class="label">Kebele</div>
                                            <input type="text" required name="Kebele" id="kebele"  class="form-control" placeholder="Kebele"
                                             @if(isset($edit_employee))
                                                value="{{ $edit_employee->kebele }}"
                                               @else
                                               value=""
                                            @endif
                                            ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                        </div>

                                        </div>

                                        <div class="col-4">
                                            <div class="field">
                                                <div class="label">House number</div>
                                                <input type="text" id="house_number" required name="house_number" class="form-control" placeholder="House number"
                                                 @if(isset($edit_employee))
                                                   value="{{ number_format($edit_employee->house_number) }}"
                                                   @else
                                                   value=""
                                                @endif
                                                ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                            </div>

                                          <div class="field">
                                            <div class="label">P.O.Box</div>
                                            <input type="text" id="POBox" required name="POBox" class="form-control" placeholder="P.O.Box"
                                             @if(isset($edit_employee))
                                               value="{{ $edit_employee->p_o_box }}"
                                               @else
                                               value=""
                                            @endif
                                            ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                        </div>
                                        <div class="field">
                                            <div class="label">Email</div>
                                            <input type="email" id="email" required name="email" class="form-control" placeholder="Email"
                                             @if(isset($edit_employee))
                                               value="{{ $edit_employee->email }}"
                                               @else
                                               value=""
                                            @endif
                                            ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                        </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="field">
                                                <div class="label">Phone</div>
                                                <input type="text" id="phone1" required name="phone1" class="form-control" placeholder="Phone"
                                                 @if(isset($edit_employee))
                                                   value="{{ $edit_employee->phone_number }}"
                                                   @else
                                                   value=""
                                                @endif
                                                ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                            </div>
                                            <div class="field">
                                                <div class="label">Alternative Phone</div>
                                                <input type="text" id="phone2" required name="phone2" class="form-control" placeholder="Alternative phone"
                                                 @if(isset($edit_employee))
                                                   value="{{ $edit_employee->alternative_phone_number }}"
                                                 @else
                                                    value=""
                                                @endif
                                                ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                                            </div>
                                        </div>
                                        </div>


                                        <div class="field btns">
                                            <button type="button" class="Emp_prev-3 prev btn btn-primary">Previous</button>
                                            <button type="submit" id="addBtn" class=" submitBtn btn btn-primary">submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            </section>
                            </div>
                            </div>


@endsection
