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
               {{-- <link rel="stylesheet" href="{{ asset('dist/js/employee.js') }}">   --}}
                        <div class="formcontainer">
                          {{--    <div class="progress-bar-form">
                                <div class="step">
                                    <p>Basic</p>
                                    <div class="bullet"><span>1</span></div>
                                    <div class="check fas fa-check"></div>
                                </div>
                                <div class="step">
                                    <p>Background</p>
                                    <div class="bullet"><span>2</span></div>
                                    <div class="check fas fa-check"></div>
                                </div>

                                <div class="step">
                                    <p>job_info</p>
                                    <div class="bullet"><span>3</span></div>
                                    <div class="check fas fa-check"></div>
                                </div>

                                <div class="step">
                                    <p>address info</p>
                                    <div class="bullet"><span>4</span></div>
                                    <div class="check fas fa-check"></div>
                                </div>
                            </div> --}}
                            <div class="form-outer">
                                <form action="
                                @if(isset($edit_employee)){{
                                    url('update_employee/'.$edit_employee->id)
                                }}@else{{
                                    url('addEmployee')
                                }}@endif" method="GET">
                                  @csrf
                                    <div class="page slidePage">
                                        <div class="title">
                                            <div>
                                                Basic information
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-6">
                                            
                                          <div class="form-group">
                                            <label for="first_name" class="form-label float-left" >First Name</label>
                                            <input type="text"  name="first_name" class="form-control" placeholder="First Name" value="@if(isset($edit_employee)){{
                                              $edit_employee->first_name
                                           }}@endif"
                                             
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="middle_name" class="form-label float-left">Middle name</label>
                                            <input type="text" id="middle_name" name="middle_name" class="form-control" placeholder="Middle name" 
                                            value="@if(isset($edit_employee)){{$edit_employee->middle_name}}@endif">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name" class="form-label float-left">Last name</label>
                                            <input type="text" id="last_name" name="last_name"  class="form-control" placeholder="Last name" 
                                            value="@if(isset($edit_employee)){{$edit_employee->last_name}}@endif">
                                        </div>

                                      <div class="form-group">
                                            <label class="form-label float-left">Gender</label>
                                            <select class="form-control form-select" name="gender">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                  </select>
                                        </div>
                                          </div>
                                          <div class="col-6">
                                          <div class="form-group">
                                           <label class="form-label float-left">Birth Date</label>
                                         <input type="text"  name="birth_date" class="form-control" id="birth_date" placeholder="Enter your birth date"
                                          value="@if(isset($edit_employee)){{$edit_employee->birth_date}}@endif">
                                     </div>

                                        <div class="form-group">
                                          <label class="form-label float-left">Education Status</label>
                                          <input type="text" name="education_status" class="form-control" id="hired_date" placeholder="Enter your education status"
                                          value="@if(isset($edit_employee)){{$edit_employee->education_status}}@endif">
                                        </div>
                                        <div class="form-group">
                                          <label class="form-label float-left">nationality</label>
                                         <select id="nationality" name="nationality" class="form-control form-select" aria-label="Ethiopia" name="nationality">
                                              <option value="Ethiopia" selected>Ethiopia</option>
                                              <option value="kenya">kenya</option>
                                              <option value="somaliya">somaliya</option>
                                              <option value="uganda">uganda</option>
                                              <option value="syriya">syria</option>
                                          </select>
                                        </div>

                                        <div class="form-group">
                                          <label class="form-label float-left">Marriage Status</label>
                                            <select class="form-control form-select" name="marriage_status">
                                                    <option>married</option>
                                                    <option>divorce</option>
                                                    <option>widow</option>
                                                  </select>                                        
                                        </div>
                                          </div>
                                        </div>
                                        

                                       
                                       <div class="field ">
                                            <button value="1" class="nextBtn btn-prrimary" type="button">Next</button>
                                        </div>

                                    </div>
                                    <div class="page">
                                        <div class="title">
                                            <div>
                                              Background info
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-6">
                                         <div class="form-group">
                                          <label class="form-label float-left">Hired Date</label>
                                          <input type="text" name="hired_date" class="form-control" id="hired_date" placeholder="Enter your hired date"
                                           value="@if(isset($edit_employee)){{$edit_employee->hired_date}}@endif">
                                        </div>

                                        <div class="form-group">
                                          <label class="form-label float-left">Previous Employment</label>
                                           <input type="text" name="previous_employment" class="form-control" id="previous_employment" placeholder="Enter your previous employment"
                                           value="@if(isset($edit_employee)){{
                                               $edit_employee->previous_employment}}@endif">
                                        </div>

                                        <div class="form-group">
                                          <label class="form-label float-left">Special Skill</label>
                                          <input type="text" name="special_skill" class="form-control" id="special_skill" placeholder="Enter your special skill" 
                                          value="@if(isset($edit_employee)){{$edit_employee->special_skill}}@endif"> 
                                      </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="form-group">
                                          <label class="form-label float-left">Net Salary</label>
                                          <input type="text" name="net_salary" class="form-control" id="net_salary" placeholder="Enter your net salary" 
                                          value="@if(isset($edit_employee)){{$edit_employee->net_salary}}@endif">
                                        </div>
                                        <div class="form-group">
                                          <label class="form-label float-left">Hire Type</label>
                                           <input type="text" name="hire_type" class="form-control" id="hire_type" placeholder="Enter your hire type"
                                           value="@if(isset($edit_employee)){{$edit_employee->hire_type}}@endif">
                                        </div>
                                         <div class="form-group">
                                          <label class="form-label float-left">Employee Religion</label>
                                             <select id="employee_religion" name="employee_religion" class="form-control form-select" aria-label="employee_religion" name="employee_religion">
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
                                        </div>
                                        </div>
                                        </div>
                                       

                                       
                                        <div class="field btns">
                                            <button type="button" class="prev-1 prev">Prev-1</button>
                                            <button type="button" class="next-1 next">Next-1</button>
                                        </div>
                                    </div>
                                        <div class="page">
                                        <div class="title">
                                            <div>
                                             employee job info
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-6">
                                         <div class="form-group">
                                          <label class="form-label float-left">Job Trainning</label>
                                          <input type="text" name="job_trainning" class="form-control" id="job_trainning" placeholder="Enter your job trainning" 
                                          value="@if(isset($edit_employee)){{$edit_employee->job_trainning}}@endif">
                                        </div>
                                            
                                               <div class="form-group">
                                          <label class="form-label float-left">Past Employment Place</label>
                                           <input type="text" name="past_employment_place" class="form-control" id="past_employment_place" placeholder="Enter your past employment place" 
                                           value="@if(isset($edit_employee)){{$edit_job_experience->past_employee_place}}@endif">
                                        </div>
                                         <div class="form-group">
                                          <label class="form-label float-left">Emergency Contact</label>
                                           <input type="text" name="emergency_contact" class="form-control" id="emergency_contact" placeholder="Enter your past emergency contact name" 
                                           value="@if(isset($edit_employee)){{$edit_emp_emergency->contact_name}}@endif">    
                                        </div>
                                        <div class="form-group">
                                          <label class="form-label float-left">relation</label>
                                           <input type="text" name="relation" class="form-control" id="relation" placeholder="Enter your relation"
                                           value="@if(isset($edit_employee)){{$edit_emp_emergency->relation}}@endif">
                                        </div>
                                    <div class="form-group">
                                          <label class="form-label float-left">Past Job Position</label>
                                           <input type="text" name="past_job_position" class="form-control" id="past_job_position" placeholder="Enter your past job position" 
                                           value="@if(isset($edit_employee)){{$edit_job_experience->past_job_position}}@endif">
                                        </div>
                                  
                                        <div class="form-group">
                                      <label class="form-label float-left">Role</label>
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
                                    </div>
                                        </div>
                                        <div class="col-6">
                                           <div class="form-group">   
                                            
                                           <label class="form-label float-left">Job Position</label>
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
                                    </div>

                                     <div class="form-group" id="Debut as a Teacher" >
                                          <label class="form-label float-left">debut_as_a_teacher</label>
                                            <input  type="text" name="debut_as_a_teacher" class="form-control"  aria-describedby="debut_as_a_teacher" placeholder="Enter your debut as a teacher"
                                            value="@if(isset($edit_job_position->position_name) == 'Teacher'){{$edit_job_position->position_name}}@endif">
                                          </div>
                                           <div class="form-group" id="Field Of Study">
                                          <label class="form-label float-left">field_of_study</label>
                                                <input type="text" name="field_of_study"  class="form-control" placeholder="Enter your field of study"
                                              value="@if(isset($edit_job_position->position_name) == 'Teacher'){{$edit_job_position->position_name}}@endif">
                                        </div>

                                        <div class="form-group" id="Place Of Study">
                                          <label class="form-label float-left">place_of_study</label>
                                          <input type="text" name="place_of_study"  class="form-control" placeholder="Enter your place of study"
                                          value="@if(isset($edit_job_position->position_name) == 'Teacher'){{$edit_job_position->position_name}}@endif">
                                            </div>

                                      <div class="form-group" id="Date Of Study">
                                          <label class="form-label float-left">date_of_study</label>
                                          <input type="date" name="date_of_study"  class="form-control" placeholder="Enter your date of study"
                                          value="@if(isset($edit_job_position->position_name) == 'Teacher'){{$edit_job_position->position_name}}@endif">
                                        </div>

                                        <div class="form-group" id="Teacher Traning Program">
                                                    <label class="form-label float-left">teacher_traning_program</label>
                                                      <input type="text" name="teacher_traning_program"  class="form-control" placeholder="Enter your teacher training program"
                                                      value="@if(isset($edit_job_position->position_name) == 'Teacher'){{$edit_job_position->position_name}}@endif">
                                                  </div>
                                                      
                                                    <div class="form-group" id="Teacher Traning Year">
                                                    <label class="form-label float-left">teacher_traning_year</label>
                                                          <input type="date" name="teacher_traning_year"  class="form-control" placeholder="Enter your teacher training year"
                                                          value="@if(isset($edit_job_position->position_name) == 'Teacher'){{$edit_job_position->position_name}}@endif">
                                                      </div>
                                                  
                                                  <div class="form-group" id="Teacher Traning Institute">
                                                    <label class="form-label float-left">teacher_traning_institute</label>
                                                    <input type="text" name="teacher_traning_institute"  class="form-control" placeholder="Enter your teacher training institute"
                                                    value="@if(isset($edit_job_position->position_name) == 'Teacher'){{$edit_job_position->position_name}}@endif">
                                                  </div>
                                        </div>
                                        </div>
                                        
                                         
                                         <div class="field btns">
                                            <button type="button" class="prev-2 prev">Prev-2</button>
                                            <button type="button" class="next-2 next">Next-2</button>
                                        </div>
                                        </div>

                                    <div class="page">
                                        <div class="title">
                                            <div>
                                                Address info
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-6">
                                         <div class="form-group">
                                            <label class="form-label float-left">City</label>
                                            <input type="text" name="City" class="form-control" placeholder="City" 
                                             value="@if(isset($edit_employee)){{$edit_address->city}}@endif">
                                            </div>
                                        <div class="form-group">
                                            <label class="form-label float-left">Sub city</label>
                                            <input type="text" name="sub_city" class="form-control" placeholder="Subcity" 
                                             value="@if(isset($edit_employee)){{$edit_address->subcity}}@endif">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label float-left">Kebele</label>
                                            <input type="text" required name="Kebele" class="form-control" placeholder="Kebele"
                                              value="@if(isset($edit_employee)){{$edit_address->kebele}}@endif">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label float-left">House number</label>
                                            <input type="text" name="house_number" class="form-control" placeholder="House number"
                                             value="@if(isset($edit_employee)){{number_format($edit_address->house_number)}}@endif">
                                        </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                            <label class="form-label float-left">P.O.Box</label>
                                            <input type="text" name="POBox" class="form-control" placeholder="P.O.Box"
                                             value="@if(isset($edit_employee)){{$edit_address->P_o_box}}@endif">
                                        </div>
                                        <div class="formg-group">
                                            <label class="form-label float-left">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                             value="@if(isset($edit_employee)){{$edit_address->email}}@endif">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label float-left">Phone</label>
                                            <input type="text" name="phone1" class="form-control" placeholder="Phone"
                                             value="@if(isset($edit_employee)){{$edit_address->phone_number}}@endif">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label float-left">Alternative Phone</label>
                                            <input type="text" name="phone2" class="form-control" placeholder="Alternative phone"
                                            value="@if(isset($edit_employee)){{$edit_address->alternative_phone_number}}@endif">
                                        </div>
                                        </div>
                                        </div>
                                       
                                      
                                        <div class="field btns">
                                            <button type="button" class="prev-3 prev">Prev-3</button>
                                            <button type="submit" class=" submitBtn ">submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            </section>
                            </div>
                            </div>
                   

@endsection