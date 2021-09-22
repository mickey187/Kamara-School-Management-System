@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('dist/css/add_student.css') }}">

@section('content')
    <div class="card">
            <div class="card-header bg-orange">
                <label class="card-title text-white">Student Registration</label>
            </div>
            <div class="card-body">
                {{-- <div class="container box"> --}}

                        <ul class="nav nav-tabs " >
                            <li class="nav-item mr-1" id="list_basic_student_info" >
                                <a class="nav-link active_tab1 " style="border: 1px solid #ccc; cursor:pointer;"  onclick="basicStudentInfo();">Basic Student Information</a>
                            </li>
                            <li class="nav-item mr-1"  id="list_academnic_background">
                                <a class="nav-link  bg-light disabled" style="border: 1px solid #ccc;  cursor:default;pointer-events:none;"  onclick="accademicBackground();">Academic Background</a>
                            </li>
                            <li class="nav-item mr-1" id="list_parent_info">
                                <a class="nav-link  bg-light" style="border: 1px solid #ccc;  cursor:default;pointer-events:none;" onclick="parentInfo();">Parent Information</a>
                            </li>
                            <li class="nav-item mr-1" id="list_emergency_info">
                                <a class="nav-link  bg-light" style="border: 1px solid #ccc;  cursor:default;pointer-events:none;" disabled onclick="emergencyInfo();">Emergency Information</a>
                            </li>
                            <li class="nav-item mr-1" id="list_transport">
                                <a class="nav-link  bg-light" style="border: 1px solid #ccc;  cursor:default;pointer-events:none;" disabled onclick="transportInfo();">Transportation</a>
                            </li>
                        </ul>
                    <div class="tab-content">
                        <form action="{{ url('new_student') }}" role="form" method="POST" enctype="multipart/form-data" onsubmit="return=fa"  >
                            @csrf
                            <div class="tab-pane active mt-2" id="basic_student_info">
                                <div class="card card-default">
                                    <div class="card-header bg-light">Basic student information</div>
                                    <div class="card-body">
                                        <div class="row col-12">
                                            <div class="col-3"><hr>
                                                <div class=" row col-lg-12 col-md-12 col-sm-12 form-group mt-2">
                                                        <img src="{{ asset('img/default_picture.png') }}" id="dsp-pro" class="img-fluid img-thumbnail ml-5 mr-5 mb-2" style="height: 200px;" alt="">
                                                    <div class="custom-file input col-12 mt-2" >
                                                        <input  type="file" name="image" class="custom-file-input " id="img-pro">
                                                        <label class="custom-file-label" for="img-pro">choose</label>
                                                    </div>
                                                    {{-- <div class="col-lg-12"> --}}

                                                    {{-- </div> --}}
                                                </div><hr>
                                            </div>
                                            <div class="col-9">
                                                <div class="row col-12">
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">First name</div>
                                                            <input type="text" id="student_page_first_name_id" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="studentFirstName" maxlength="15" minlength="2" placeholder="required*" required class="form-control">
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Middle name</div>
                                                            <input type="text" id="student_page_middle_name_id" onkeypress="return /[a-z]/i.test(event.key)" name="studentMiddleName" placeholder="required*" required class="form-control">
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Last name</div>
                                                            <input type="text" id="student_page_last_name_id" name="studentLastName" placeholder="required*" required class="form-control">
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Gender</div>
                                                            <select  id="student_page_gender_id" name="studentGender" data-placeholder="required*" required class="select2 form-control" >
                                                                <option></option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Birth date</div>
                                                            <input type="date" id="student_page_birthdate_id" name="studentBirthDate" placeholder="required*" value="" required class="form-control">
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Citizenship</div>
                                                            <input id="student_page_citizen_id" type="text" name="studentCitizenship" placeholder="optional" class="form-control">
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-12">
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Day care program</div>
                                                            <select id="student_page_daycareprogram_id" style="width: 100%;" name="studentDayCareProgram" data-placeholder="required*" required class="form-control select2">
                                                                <option></option>
                                                                <option>Yes</option>
                                                                <option>No</option>
                                                            </select>
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Student kinder garten</div>
                                                            <select id="student_page_kindergarten_id" style="width: 100%;" name="studentKindergarten" data-placeholder="required*" required class="form-control select2">
                                                                <option></option>
                                                                <option>Yes</option>
                                                                <option>No</option>
                                                            </select>
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2 ">
                                                            <div class="label">Native language</div>
                                                            <select name="studentLanguage" id="student_page_nativlanguage_id"
                                                                    class="form-control select2"
                                                                    style="width: 100%;"
                                                                    {{-- multiple multiple data-live-search="true" --}}
                                                                    data-placeholder="required*"
                                                                    required
                                                                    >
                                                                    <option></option>
                                                                    <option>Amharic</option>
                                                                    <option>Oromofaa</option>
                                                                    <option>Tiray</option>
                                                                    <option>English</option>
                                                                    <option>Sheko</option>
                                                                    <option>Somaligna</option>
                                                                    <option>guragegna</option>
                                                            </select>
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-12">

                                                    <div class="col-4">
                                                        <div class="form-group mt-2 ">
                                                            <div class="label">Country of birth</div>
                                                            <input id="student_page_country_of_birth_id" type="text" name="studentCountryOfBirth" placeholder="optional" class="form-control">
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">state of birth</div>
                                                            <input id="student_page_state_of_birth_id" type="text" name="studentStateOfBirth" placeholder="optional" class="form-control">
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">unit of birth</div>
                                                            <input id="student_page_unit_of_birth_id" type="text" name="studentUnitOfBirth" placeholder="optional" class="form-control">
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>

                                                </div>
                                                    <div class="row col-12">
                                                        <div class="form-group col-4 mt-2">
                                                            <div class="label">Academic year</div>
                                                            <select  id="student_page_academic_year_id" name="studentAcademicYear" data-placeholder="required*" required class="select2 form-control m-2" >
                                                                <option selected value="{{    \Andegna\DateTimeFactory::now()->getYear(); }}" >EC {{    \Andegna\DateTimeFactory::now()->getYear(); }}</option>
                                                                <option value="{{    \Andegna\DateTimeFactory::now()->getYear()+1; }}">EC {{    \Andegna\DateTimeFactory::now()->getYear()+1; }}</option>
                                                                <option value="{{    \Andegna\DateTimeFactory::now()->getYear()+2; }}">EC {{    \Andegna\DateTimeFactory::now()->getYear()+2; }}</option>
                                                                <option value="{{    \Andegna\DateTimeFactory::now()->getYear()+3; }}">EC {{    \Andegna\DateTimeFactory::now()->getYear()+3; }}</option>
                                                                <option value="{{    \Andegna\DateTimeFactory::now()->getYear()+4; }}">EC {{    \Andegna\DateTimeFactory::now()->getYear()+4; }}</option>
                                                            </select>
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Grade</div>
                                                            <select  id="student_page_grade_id" style="width: 100%;" type="text" name="studentGrade" class="form-control select2" data-placeholder="required*" required>
                                                                <option></option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}">{{$class->class_label}}</option>
                                                                @endforeach
                                                            </select>
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mt-2">
                                                            <div class="label">Stream</div>
                                                            <select  id="student_page_stream_id" style="width: 100%;" type="number" name="studentStream" class="form-control select2" data-placeholder="required*" required>
                                                                <option></option>
                                                                @foreach ($streams as $stream)
                                                                    <option value="{{ $stream->id }}">{{$stream->stream_type }}</option>
                                                                @endforeach
                                                            </select>
                                                            <small style="color:#fff;">error message</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                        <div class="float-right mr-5">
                                            <input type="button" class="btn btn-primary co1-12" id="basicStudentInfoBtn" value="NEXT">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;" class="tab-pane active mt-2" id="academnic_background">
                                <div class="card card-default">
                                    <div class="card-header bg-light">Academic background</div>
                                        <div class="card-body">
                                            <div class="row col-12">
                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Transfer reason</div>
                                                        <input id="academic_page_transferreason_id" maxlength="15" minlength="3" type="text"  name="academicTransferReason" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Suspension status</div>
                                                        <input id="academic_page_suspension_id" type="text" maxlength="15" minlength="3" name="academicSuspension" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Expulsion status</div>
                                                        <input id="academic_page_expulsion_id" type="text" maxlength="15" minlength="3" name="academicExpulsion" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Special Education</div>
                                                        <input id="academic_page_specialeducation_id" type="text" maxlength="15" minlength="3" name="academicSpecialEducation" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Previous school</div>
                                                        <input id="academic_page_previousschool_id" type="text" name="academicPreviousSchool" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Previous school city</div>
                                                        <input id="academic_page_previousschoolcity_id" type="text" name="academicPreviousSchoolCity" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">

                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Previous school state</div>
                                                        <input id="academic_page_previousschoolstate_id" type="text" name="academicPreviousSchoolState" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Previous school country</div>
                                                        <input id="academic_page_previousschoolcountry_id" type="text" name="academicPreviousSchoolCountry" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Medical condtion</div>
                                                        <input id="academic_page_medicalcondtion_id" type="text" name="academicMedicalCondtion" placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">

                                                <div class="col-4">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Blood type</div>
                                                        <select id="academic_page_bloodtype_id" type="text" style="width: 100%;" name="academicBloodType" class="form-control select2" placeholder="optional" data-placeholder="optional">
                                                            <option></option>
                                                            <option>A</option>
                                                            <option>B</option>
                                                            <option>AB</option>
                                                            <option>O</option>
                                                            <option>A+</option>
                                                            <option>B+</option>
                                                            <option>AB+</option>
                                                            <option>O+</option>
                                                            <option>A-</option>
                                                            <option>B-</option>
                                                            <option>AB-</option>
                                                            <option>O-</option>
                                                        </select>
                                                            <small style="color:#fff;">error message</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-12">

                                            </div>
                                            <div class="float-right mr-5">
                                                <input type="button" class="btn btn-secondary" id="academnicBackgroundPreBtn" value="PREVIOUS">
                                                <input type="button" class="btn btn-primary" id="academnicBackgroundBtn" value="NEXT">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </div>
                            <div style="display: none;" class="tab-pane mt-2" id="parent_info">
                                <div class="card card-default">
                                    <div class="card-header bg-light">Parent information</div>
                                    <div class="card-body">
                                        <div class="row col-12">
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">First name</div>
                                                    <input type="text" id="parent_first_name_id" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="parentFirstName" placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="parent_middle_name_id" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="parentFirstName" placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="parent_last_name_id" onkeypress="return /[a-zA-Z]/i.test(event.key)" placeholder="required*" name="parentLastName" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Gender</div>
                                                    <select id="parent_gender_id" style="width: 100%;" name="parentGender" class="form-control select2" data-placeholder="required*" required>
                                                        <option value=""></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-3">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Relation</div>
                                                        <input type="text" id="parent_relation_id"  name="parentRelation" placeholder="required*" required class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                           </div>
                                            <div class="col-3">
                                                    <div class="form-group mt-2">
                                                        <div class="label">School closure priority</div>
                                                        <input type="number" min="0" max="10" maxlength="2" id="parent_school_closure_priority_id" name="parentSchoolClosurePriority"  placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                            </div>
                                            <div class="col-3">
                                                    <div class="form-group mt-2">
                                                        <div class="label">Emergency contact priority</div>
                                                        <input type="number" id="parent_emeregency_contact_priority_id" min="0" max="10" maxlength="2" name="parentEmergencyContactPriority"  placeholder="optional" class="form-control">
                                                        <small style="color:#fff;">error message</small>
                                                    </div>
                                            </div>

                                        </div>
                                        <h5> Address</h5>
                                        <hr>
                                        <div class="row col-12">
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Kebele</div>
                                                    <input type="text" id="parent_kebele_id" name="parentKebele"  maxlength="15"  placeholder="require*" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Unit</div>
                                                    <input type="text" id="parent_unit_id" name="parentUnit" maxlength="15"  placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">State</div>
                                                    <input type="text" id="parent_state_id" name="parentState" maxlength="15"  placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Country</div>
                                                    <input type="text" id="parent_country_id" name="parentCountry" maxlength="15"  placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row col-12">
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Email</div>
                                                    <input type="email" id="parent_email_id" name="parentEmail" maxlength="30" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">P.O.Box</div>
                                                    <input type="number" id="parent_p_o_box_id"  maxlength="11" name="parentPOBOX" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">House number</div>
                                                    <input type="number" id="parent_house_no_id" maxlength="6" max="10" min="1" name="parentHouseNo" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Home phone number</div>
                                                    <input type="text" maxlength="13" id="parent_home_phone_no_id" name="parentHomePhoneNo" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        <div class="row col-12">
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label"> Phone (Mobile) number</div>
                                                    <input type="text" maxlength="10" id="parent_mobile_phone_no_id" name="parentMobilePhoneNo" placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Work phone number</div>
                                                    <input type="text" id="parent_work_phone_no_id"  maxlength="13" name="parentWorkPhoneNo" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="card card-default">
                                                <div class="card-header bg-light">Guardian Information</div>
                                                <div class="card-body">
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">First name</div>
                                                                <input type="text" id="parent_first_name_id2" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="parentFirstName2" placeholder="optional" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Middle name</div>
                                                                <input type="text" id="parent_middle_name_id2" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="parentMiddleName2" placeholder="optional" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Last name</div>
                                                                <input type="text" id="parent_last_name_id2" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="parentLastName2" placeholder="optional" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Gender</div>
                                                                <select id="parent_gender_id2" style="width: 100%;" name="parentGender2" class="form-control select2" data-placeholder="optional">
                                                                    <option value=""></option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                                <div class="form-group mt-2">
                                                                    <div class="label">Relation</div>
                                                                    <input type="text" id="parent_relation_id2" name="parentRelatiom2" placeholder="optional" class="form-control">
                                                                    <small style="color:#fff;">error message</small>
                                                                </div>
                                                       </div>
                                                        <div class="col-3">
                                                                <div class="form-group mt-2">
                                                                    <div class="label">School closure priority</div>
                                                                    <input type="text" id="parent_school_closure_priority_id2" name="parentSchoolClosurePriority2" placeholder="optional" class="form-control">
                                                                    <small style="color:#fff;">error message</small>
                                                                </div>
                                                        </div>
                                                        <div class="col-3">
                                                                <div class="form-group mt-2">
                                                                    <div class="label">Emergency contact priority</div>
                                                                    <input type="text" id="parent_emeregency_contact_priority_id2" name="parentEmergencyContactPriority2" placeholder="optional" class="form-control">
                                                                    <small style="color:#fff;">error message</small>
                                                                </div>
                                                        </div>

                                                    </div>
                                                    <h5> Address</h5>
                                                    <hr>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Kebele</div>
                                                                <input type="text" id="parent_kebele_id2" placeholder="optional" name="parentKebele2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Unit</div>
                                                                <input type="text" id="parent_unit_id2" maxlength="20" placeholder="optional" name="parentUnit2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">State</div>
                                                                <input type="text" id="parent_state_id2" maxlength="20"  placeholder="optional" name="parentState2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Country</div>
                                                                <input type="text" id="parent_country_id2" maxlength="20" placeholder="optional" name="parentCountry2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Email</div>
                                                                <input type="email" id="parent_email_id2" maxlength="30" placeholder="optional" name="parentEmail2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">P.O.Box</div>
                                                                <input type="number" id="parent_p_o_box_id2"  placeholder="optional" name="parentPOBOX2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">House number</div>
                                                                <input type="number" id="parent_house_no_id2" placeholder="optional" name="parentHomeNo2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Home phone number</div>
                                                                <input type="text" id="parent_home_phone_no_id2" maxlength="13" placeholder="optional" name="parentHomePhoneNo2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label"> Phone (Mobile) number</div>
                                                                <input type="text" id="parent_mobile_phone_no_id2" maxlength="10" placeholder="optional" name="parentMobilePhoneNo2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Work phone number</div>
                                                                <input type="text" id="parent_work_phone_no_id2" maxlength="13" placeholder="optional" name="parentWorkPhoneNo2" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card card-default">
                                                <div class="card-header bg-light">Parent 3 Information</div>
                                                <div class="card-body">
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">First name</div>
                                                                <input type="text" id="parent_first_name_id3" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="parentFirstName3" placeholder="optional" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Middle name</div>
                                                                <input type="text" id="parent_middle_name_id3" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="parentMiddleName3" placeholder="optional" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Last name</div>
                                                                <input type="text" id="parent_last_name_id3" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="parentLastName3" placeholder="optional" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Gender</div>
                                                                <select id="parent_gender_id3" style="width: 100%;" name="parentGender3" class="form-control select2" data-placeholder="optional">
                                                                    <option value=""></option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                                <div class="form-group mt-2">
                                                                    <div class="label">Relation</div>
                                                                    <input type="text" id="parent_relation_id3" maxlength="20" name="parentRelation3" placeholder="optional" class="form-control">
                                                                    <small style="color:#fff;">error message</small>
                                                                </div>
                                                       </div>
                                                        <div class="col-3">
                                                                <div class="form-group mt-2">
                                                                    <div class="label">School closure priority</div>
                                                                    <input type="number" id="parent_school_closure_priority_id3" name="parentSchoolClosurePriority3" placeholder="optional" class="form-control">
                                                                    <small style="color:#fff;">error message</small>
                                                                </div>
                                                        </div>
                                                        <div class="col-3">
                                                                <div class="form-group mt-2">
                                                                    <div class="label">Emergency contact priority</div>
                                                                    <input type="number" id="parent_emeregency_contact_priority_id3" name="parentEmergencyContactPriority3" placeholder="optional" class="form-control">
                                                                    <small style="color:#fff;">error message</small>
                                                                </div>
                                                        </div>

                                                    </div>
                                                    <h5> Address</h5>
                                                    <hr>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Kebele</div>
                                                                <input type="text" id="parent_kebele_id3" placeholder="optional" name="parentKebele3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Unit</div>
                                                                <input type="text" id="parent_unit_id3" maxlength="20" placeholder="optional" name="parentUnit3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">State</div>
                                                                <input type="text" id="parent_state_id3" maxlength="20" placeholder="optional" name="parentState3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Country</div>
                                                                <input type="text" id="parent_country_id3" maxlength="20" placeholder="optional" name="parentCountry3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Email</div>
                                                                <input type="email" id="parent_email_id3" maxlength="30" placeholder="optional" name="parentEmail3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">P.O.Box</div>
                                                                <input type="number" id="parent_p_o_box_id3" max="6" placeholder="optional" name="parentPOBOX3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">House number</div>
                                                                <input type="number" id="parent_house_no_id3" placeholder="optional" name="parentHomeNo3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Home phone number</div>
                                                                <input type="text" id="parent_home_phone_no_id3" placeholder="optional" name="parentHomePhoneNo3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label"> Phone (Mobile) number</div>
                                                                <input type="text" id="parent_mobile_phone_no_id3" placeholder="optional" name="parentMobilePhoneNo3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group mt-2">
                                                                <div class="label">Work phone number</div>
                                                                <input type="text" id="parent_work_phone_no_id3" placeholder="optional" name="parentWorkPhoneNo3" class="form-control">
                                                                <small style="color:#fff;">error message</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="float-right mr-5">
                                            <input type="button" class="btn btn-secondary" id="parentInfoPreBtn" value="PREVIOUS">
                                            <input type="button" class="btn btn-primary" id="parentInfoBtn" value="NEXT">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;" class="tab-pane active mt-2" id="emergency">
                                <div class="card card-default">
                                    <div class="card-header bg-light">Emergency Information</div>
                                    <div class="card-body">

                                        <div class="row col-12">
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">First name</div>
                                                    <input type="text" id="emergency_first_name_id" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyFirstName" placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="emergency_middle_name_id" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyMiddleName"  placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="emergency_last_name_id" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyLastName"  placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Gender</div>
                                                    <select  id="emergency_gender_id" style="width: 100%;" name="emergencyGender" data-placeholder="required*" required class="form-control select2" >
                                                        <option></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Phone number</div>
                                                    <input type="text" id="emergency_phone_no_id" maxlength="13" name="emergencyPhoneNo"  placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Emergency 2</h5>
                                        <div class="row col-12">
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">First name</div>
                                                    <input type="text" id="emergency_first_name_id2" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyFirstName2"  placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="emergency_middle_name_id2" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyMiddleName2" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="emergency_last_name_id2" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyLastName2" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Gender</div>
                                                    <select  id="emergency_gender_id2" style="width: 100%;" name="emergencyGender2" data-placeholder="optional" class="form-control select2" >
                                                        <option></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Phone number</div>
                                                    <input type="text" id="emergency_phone_no_id2"  maxlength="13" name="emergencyPhoneNo2" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Emergency 3</h5>
                                        <div class="row col-12">
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">First name</div>
                                                    <input type="text" id="emergency_first_name_id3" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyFirstName3" placeholder="optional"  class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="emergency_middle_name_id3" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyMiddleName3" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="emergency_last_name_id3" onkeypress="return /[a-zA-Z]/i.test(event.key)" maxlength="20" name="emergencyLastName3" placeholder="optional"  class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Gender</div>
                                                    <select  id="emergency_gender_id3" style="width: 100%;" maxlength="20" name="emergencyGender3" data-placeholder="optional" class="form-control select2" >
                                                        <option></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Phone number</div>
                                                    <input type="text" id="emergency_phone_no_id3"  maxlength="13" maxlength="20" name="emergencyPhoneNo3" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="float-right mr-5">
                                            <input type="button" class="btn btn-secondary" id="emergencyPreviousBtn" value="PREVIOUS">
                                            <input type="button" class="btn btn-primary" id="emergencyNextBtn" value="NEXT">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;" class="tab-pane active mt-2" id="transport">
                                <div class="card card-default">
                                    <div class="card-header bg-light">Transportation</div>
                                    <div class="card-body">
                                        <div class="row col-12">
                                            <div class="col-3">
                                                <div class="form-group mt-2">
                                                    <div class="label">Transport type</div>
                                                    <select id="transport_type_id" style="width: 100%;"  name="transportType" class="form-control select2" data-placeholder="required*" required>
                                                        <option></option>
                                                        <option>School Service</option>
                                                        <option>Private Service</option>
                                                        <option>With gourdian on foot</option>
                                                        <option>Without gourdian on foot</option>
                                                    </select>
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Student pickup guardian</h5>
                                        <div class="row col-12">
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">First name</div>
                                                    <input type="text" id="transport_first_name_id" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportFirstName" placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="transport_middle_name_id" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportMiddleName" placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="transport_last_name_id" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportLastName" placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Gender</div>
                                                    <select id="transport_gender_id" style="width: 100%;" name="transportGender" data-placeholder="required*" required class="form-control select2">
                                                        <option></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Phone number</div>
                                                    <input type="text" id="transport_phone_no_id" maxlength="13" name="transportPhoneNo"  placeholder="required*" required class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Student pickup guardian 2</h5>
                                        <div class="row col-12">
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">First name</div>
                                                    <input type="text" id="transport_first_name_id2" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportFirstName2"  placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="transport_middle_name_id2" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportMiddleName2" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="transport_last_name_id2" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportLastName2" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Gender</div>
                                                    <select id="transport_gender_id2" style="width: 100%;" name="transportGender2" data-placeholder="optional" class="form-control select2">
                                                        <option></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Phone number</div>
                                                    <input type="text" id="transport_phone_no_id2" maxlength="13" placeholder="optional" maxlength="13"  name="transportPhoneNo2" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>Student pickup guardian 3</h5>
                                        <div class="row col-12">
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">First name</div>
                                                    <input type="text" id="transport_first_name_id3" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportFirstName3" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="transport_middle_name_id3" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportMiddleName3" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="transport_last_name_id3" maxlength="20" onkeypress="return /[a-zA-Z]/i.test(event.key)" name="transportLastName3" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Gender</div>
                                                    <select id="transport_gender_id3" style="width: 100%;" name="transportGender3" data-placeholder="optional" class="form-control select2">
                                                        <option></option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mt-2">
                                                    <div class="label">Phone number</div>
                                                    <input type="text" id="transport_phone_no_id3" maxlength="13" name="transportPhoneNo3" placeholder="optional" class="form-control">
                                                    <small style="color:#fff;">error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="float-right mr-5">
                                            <input type="button" class="btn btn-secondary" id="transportPreviousBtn" value="PREVIOUS">
                                            <input type="submit" class="btn btn-primary"  value="SUBMIT">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                {{-- </div> --}}
            </div>
            <div class="card-footer"></div>
    </div>

@endsection
