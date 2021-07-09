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
               <link rel="stylesheet" href="{{ asset('dist/css/employee.js') }}">  
                        <div class="formcontainer">
                            <!-- <div class="progress-bar-form">
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
                            </div> -->
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
                                        <div class="row col-12">
                                          <div class="col-6">
                                          <div class="field">
                                            <div class="label">First name</div>
                                            <input type="text" name="first_name" class="form-control" placeholder="First name" 
                                             @if(isset($edit_employee))
                                              value="{{$edit_employee->first_name}}" 
                                              @else
                                              value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                            <div class="label">Middle name</div>
                                            <input type="text" name="middle_name" class="form-control" placeholder="Middle name" 
                                             @if(isset($edit_employee))
                                             value="{{$edit_employee->middle_name}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                            <div class="label">Last name</div>
                                            <input type="text" name="last_name"  class="form-control" placeholder="Last name" 
                                             @if(isset($edit_employee))
                                               value="{{$edit_employee->last_name}}"
                                               @else
                                               value=""
                                            @endif
                                          >
                                          <br>
                                        </div>

                                      <div class="field">
                                            <div class="label">Gender</div>
                                            <select class="form-control" name="gender">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                  </select>
                                                  <br>
                                        </div>
                                          </div>
                                          <div class="col-6">
                                          <div class="field">
                                           <div class="label">Birth Date</div>
                                         <input type="text"  name="birth_date" class="form-control" id="birth_date" placeholder="Enter your birth date"
                                             @if(isset($edit_employee))
                                               value="{{$edit_employee->birth_date}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                     </div>

                                        <div class="field">
                                          <div class="label">Education Status</div>
                                          <input type="text" name="education_status" class="form-control" id="hired_date" placeholder="Enter your education status"
                                             @if(isset($edit_employee))
                                               value="{{$edit_employee->education_status}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                          <div class="label">nationality</div>
                                         <select id="nationality" name="nationality" class="form-control form-select" aria-label="Ethiopia" name="nationality">
                                              <option value="Ethiopia" selected>Ethiopia</option>
                                              <option value="kenya">kenya</option>
                                              <option value="somaliya">somaliya</option>
                                              <option value="uganda">uganda</option>
                                              <option value="syriya">syria</option>
                                          </select>
                                          <br>
                                        </div>

                                        <div class="field">
                                          <div class="label">Marriage Status</div>
                                            <select class="form-control" name="marriage_status">
                                                    <option>married</option>
                                                    <option>divorce</option>
                                                    <option>widow</option>
                                                  </select>   
                                                   <br>                                    
                                        </div>
                                          </div>
                                        </div>
                                        

                                       
                                       <div class="field ">
                                            <button value="1" class="nextBtn" type="button">Next</button>
                                        </div>

                                    </div>
                                    <div class="page">
                                        <div class="title">
                                            <div>
                                              Background info
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                        <div class="col-6">
                                         <div class="field">
                                          <div class="label">Hired Date</div>
                                          <input type="text" name="hired_date" class="form-control" id="hired_date" placeholder="Enter your hired date"
                                             @if(isset($edit_employee))
                                              value="{{$edit_employee->hired_date}}" 
                                              @else
                                              value=""
                                            @endif
                                            >
                                            <br>
                                        </div>

                                        <div class="field">
                                          <div class="label">Previous Employment</div>
                                           <input type="text" name="previous_employment" class="form-control" id="previous_employment" placeholder="Enter your previous employment"
                                             @if(isset($edit_employee))
                                              value="{{$edit_employee->previous_employment}}"
                                              @else
                                              value=""
                                            @endif
                                            >
                                            <br>
                                        </div>

                                        <div class="field">
                                          <div class="label">Special Skill</div>
                                          <input type="text" name="special_skill" class="form-control" id="special_skill" placeholder="Enter your special skill" 
                                             @if(isset($edit_employee))
                                               value="{{$edit_employee->special_skill}}"
                                               @else
                                               value=""
                                            @endif
                                            > 
                                            <br>
                                      </div>
                                        </div>
                                        <div class="col-6">
                                         <div class="field">
                                          <div class="label">Net Salary</div>
                                          <input type="text" name="net_salary" class="form-control" id="net_salary" placeholder="Enter your net salary"
                                             @if(isset($edit_employee))
                                               value="{{$edit_employee->net_salary}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                          <div class="label">Hire Type</div>
                                           <input type="text" name="hire_type" class="form-control" id="hire_type" placeholder="Enter your hire type"
                                             @if(isset($edit_employee))
                                               value="{{$edit_employee->hire_type}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                         <div class="field">
                                          <div class="label">Employee Religion</div>
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
                                            <br>
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
                                        <div class="row col-12">
                                        <div class="col-6">
                                         <div class="field">
                                          <div class="label">Job Trainning</div>
                                          <input type="text" name="job_trainning" class="form-control" id="job_trainning" placeholder="Enter your job trainning" 
                                          
                                             @if(isset($edit_employee))
                                             value="{{$edit_employee->job_trainning}}"
                                             @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                            
                                               <div class="field">
                                          <div class="label">Past Employment Place</div>
                                           <input type="text" name="past_employment_place" class="form-control" id="past_employment_place" placeholder="Enter your past employment place"
                                             @if(isset($edit_employee))
                                             value="{{$edit_job_experience->past_employee_place}}"
                                            @else
                                               value=""
                                             @endif
                                            >
                                            <br>
                                        </div>
                                         <div class="field">
                                          <div class="label">Emergency Contact</div>
                                           <input type="text" name="emergency_contact" class="form-control" id="emergency_contact" placeholder="Enter your past emergency contact name" 
                                             @if(isset($edit_employee))
                                               value="{{$edit_emp_emergency->contact_name}}"
                                               @else
                                               value=""
                                            @endif
                                            >    
                                            <br>
                                        </div>
                                        <div class="field">
                                          <div class="label">relation</div>
                                           <input type="text" name="relation" class="form-control" id="relation" placeholder="Enter your relation"
                                             @if(isset($edit_employee))
                                               value="{{$edit_emp_emergency->relation}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                    <div class="field">
                                          <div class="label">Past Job Position</div>
                                           <input type="text" name="past_job_position" class="form-control" id="past_job_position" placeholder="Enter your past job position"
                                             @if(isset($edit_employee))
                                               value="{{$edit_job_experience->past_job_position}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
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
                                      <br>
                                    </div>
                                        </div>
                                        <div class="col-6">
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
                                            <br>
                                    </div>

                                     <div class="field" id="Debut as a Teacher" >
                                          <div class="label">debut_as_a_teacher</div>
                                            <input  type="text" name="debut_as_a_teacher" class="form-control"  aria-describedby="debut_as_a_teacher" placeholder="Enter your debut as a teacher"
                                           
                                            @if(isset($job_position->position_name) == 'Teacher')
                                               value="{{$job_position->position_name}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                          </div>
                                           <div class="field" id="Field Of Study">
                                          <div class="label">field_of_study</div>
                                                <input type="text" name="field_of_study"  class="form-control" placeholder="Enter your field of study"
                                              
                                            @if(isset($job_position->position_name) == 'Teacher')
                                               value="{{job_position->position_name}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>

                                        <div class="field" id="Place Of Study">
                                          <div class="label">place_of_study</div>
                                          <input type="text" name="place_of_study"  class="form-control" placeholder="Enter your place of study"
                                          
                                            @if(isset($job_position->position_name) == 'Teacher')
                                               value = "{{$job_position->position_name}}"
                                               @else
                                               value = ""
                                            @endif
                                            >
                                            <br>

                                            </div>

                                      <div class="field" id="Date Of Study">
                                          <div class="label">date_of_study</div>
                                          <input type="date" name="date_of_study"  class="form-control" placeholder="Enter your date of study"
                                         
                                            @if(isset($job_position->position_name) == 'Teacher')
                                               value =  "{{$job_position->position_name}}"
                                               @else
                                               value = ""
                                            @endif
                                            >
                                            <br>
                                        </div>

                                        <div class="field" id="Teacher Traning Program">
                                                    <div class="label">teacher_traning_program</div>
                                                      <input type="text" name="teacher_traning_program"  class="form-control" placeholder="Enter your teacher training program"
                                                      
                                                          @if(isset($job_position->position_name) == 'Teacher')
                                                            value = "{{$job_position->position_name}}"
                                                            @else
                                                            value = ""
                                                          @endif
                                                          >
                                                          <br>
                                                  </div>
                                                      
                                                    <div class="field" id="Teacher Traning Year">
                                                    <div class="label">teacher_traning_year</div>
                                                          <input type="date" name="teacher_traning_year"  class="form-control" placeholder="Enter your teacher training year"
                                                        
                                                              @if(isset($job_position->position_name) == 'Teacher')
                                                                value = "{{$job_position->position_name}}"
                                                                @else
                                                                value = ""
                                                              @endif
                                                              >
                                                              <br>
                                                      </div>
                                                  
                                                  <div class="field" id="Teacher Traning Institute">
                                                    <div class="label">teacher_traning_institute</div>
                                                    <input type="text" name="teacher_traning_institute"  class="form-control" placeholder="Enter your teacher training institute"
                                                    @if(isset($job_position->position_name) == 'Teacher')
                                                                value = "{{$job_position->position_name}}"
                                                                @else
                                                                value = ""
                                                              @endif
                                                              >
                                                              <br>
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
                                        <div class="row col-12">
                                        <div class="col-6">
                                         <div class="field">
                                            <div class="label">City</div>
                                            <input type="text" name="City" class="form-control" placeholder="City"  
                                             @if(isset($edit_employee))
                                               value="{{$edit_address->city}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                            </div>
                                        <div class="field">
                                            <div class="label">Sub city</div>
                                            <input type="text" name="sub_city" class="form-control" placeholder="Subcity" 
                                            @if(isset($edit_employee))
                                               value="{{$edit_address->sub_city}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                            <div class="label">Kebele</div>
                                            <input type="text" required name="Kebele" class="form-control" placeholder="Kebele"
                                            @if(isset($edit_employee))
                                               value="{{$edit_address->Kebele}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                            <div class="label">House number</div>
                                            <input type="text" name="house_number" class="form-control" placeholder="House number" 
                                           @if(isset($edit_employee))
                                               value="{{$edit_address->house_number}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="field">
                                            <div class="label">P.O.Box</div>
                                            <input type="text" name="POBox" class="form-control" placeholder="P.O.Box" 
                                        @if(isset($edit_employee))
                                               value="{{$edit_address->POBox}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                            <div class="label">Email</div>
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                            @if(isset($edit_employee))
                                               value="{{$edit_address->email}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                            <div class="label">Phone</div>
                                            <input type="text" name="phone1" class="form-control" placeholder="Phone"
                                        @if(isset($edit_employee))
                                               value="{{$edit_address->phone1}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
                                        </div>
                                        <div class="field">
                                            <div class="label">Alternative Phone</div>
                                            <input type="text" name="phone2" class="form-control" placeholder="Alternative phone"
                                            @if(isset($edit_employee))
                                               value="{{$edit_address->phone2}}"
                                               @else
                                               value=""
                                            @endif
                                            >
                                            <br>
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