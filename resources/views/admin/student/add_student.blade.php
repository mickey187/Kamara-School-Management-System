@extends('layouts.master')
@section('content')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
<div class="formcontainer">
    <div class="form-outer">
        <div class="">
            <div class="card card-header bg-orange">
                <h3 class="card-title">Student Registration</h3>
            </div>
        </div><br>
        <form action="{{ url('new_student') }}" role="form" method="POST" enctype="multipart/form-data" onsubmit="return=fa">
            @csrf
            <div class="page slidePage">

                        <h3 class="text-center mb-5">Basic information</h3>


                <div class=" row col-12">
                    <div class="col-4">
                            <div class="field col-lg-12 col-sm-12">
                                <div class=" col-lg-12 col-md-6 col-sm-6 form-group">
                                    <img src="{{ asset('img/default_picture.png') }}" id="dsp-pro" class="img-fluid img-thumbnail" style="height: 200px;" alt="">
                                    <div class="custom-file input" >
                                    <input  type="file" name="image" class="custom-file-input" id="img-pro" required >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>

                                    <label class="custom-file-label" for="img-pro">Choose image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row field col-12" style="margin-top:50px;">
                                <div class="col-8">
                                    <div class="label">Academic Year</div>
                                        <select id="academic_year" name="academic_year" class="select2" >
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                    </select> <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                </div>
                                <div class="col-4">
                                    <div class="label">Avarage</div>
                                    <input type="number" id="average" name="average" class="form-control" placeholder="50.00" min="50" max="100">
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                </div>
                            </div>
                    </div>

                    <div class="row col-4">
                        <div class="col-12 ">
                            <div hidden>
                                <select name="role" class="form-control select2bs4">
                                    @foreach ($role as $row)
                                    <option @if ($row->role_name === 'Student')
                                        selected
                                    @endif value="{{ $row->id }}">{{ $row->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field col-12 ">
                                <div class="label">First name</div>
                                <input type="text" id="studentFirstName" name="firstName" class="form-control"

                                onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                placeholder="First name"  size="30" minlength="3" maxlength="21">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>

                            <div class="field col-sm-12 ">
                                <div class="label">Middle name</div>
                                <input type="text" id="studentMiddleName" name="middleName" class="form-control"
                                 placeholder="Middle name" required

                                  onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                               required size="30" minlength="3" maxlength="21">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>
                            <div class="field col-sm-12">
                                <div class="label">Last name</div>
                                <input type="text" id="studentLastName" name="lastName" class="form-control"
                                 placeholder="Last name" required

                                  onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '') "
                                onfocus="if (this.value == '') {this.value = '';}"
                                placeholder="First name" required size="30" minlength="3" maxlength="21">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>
                            <div class="field col-sm-12">
                                <div class="label">Birth date</div>
                                <input id="studentBirthDate" type="date" name="birthDate" class="form-control" data-target="#reservationdate" placeholder="Birth date" required/>
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>
                        </div>
                    </div>

                <div class="row col-4">
                    <div class="col-12">
                        <div class="field col-12">
                            <div class="label">Birth place</div>
                            <select id="studentBirthPlace" name="birthPlace" class="form-control select2bs4">
                                    <option selected="selected">Adama</option>
                                    <option>Harer</option>
                                    <option>Addis Ababa </option>
                                    <option>Hawada</option>
                                    <option>Bahir Dar</option>
                                    <option>Dilla</option>
                                    <option>Dire Dawa</option>
                                    </select>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field col-12">
                            <div class="label">Gender</div>
                            <select id="studentGender" name="gender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                    </select><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field col-12">
                            <div class="label">Citizenship</div>
                            <input id="studentCitizen" type="text" name="citizenship" class="form-control"
                            placeholder="Cityzenship"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field col-12 row">
                            <div class="col-4">
                                <div class="label">Grade</div>
                            <select  id="studentGrade" type="text" name="grade" class="form-control" placeholder="Grade">
                                <option> Grade</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{$class->class_label}}</option>
                                @endforeach
                            </select>
                            {{-- <input id="studentGrade" type="number" name="grade" class="form-control" placeholder="Grade"> --}}
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                            </div>
                            <div class="col-8">
                                <div class="label">Stream</div>
                            <select  id="studentStream" type="text" name="stream" class="form-control" placeholder="Grade"
                            onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                            >
                                <option>Stream</option>
                                @foreach ($streams as $stream)
                                    <option value="{{ $stream->id }}">{{$stream->stream_type }}</option>
                                @endforeach
                            </select>
                            {{-- <input id="studentGrade" type="number" name="grade" class="form-control" placeholder="Grade"> --}}
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                            </div>

                        </div>
                        <div class="field ">
                            <button id="studentBasic" value="2" class="stud_nextBtn btn btn-primary btn-lg" type="button">Next</button>
                        </div>
                    </div>
                </div>
                </div>




            </div>

            <div class="page">
                {{-- <div class="" style="margin-left: 15px;"> --}}
                    {{-- <div class="card card-header">
                        <h3 class="card-title float-right"> Background information</h3>
                    </div><br> --}}
                    <h3 class="text-center mb-5">Background information</h3>
                {{-- </div> --}}
                <div class="row col-12">
                    <div class="col-6">
                        <div class="field">
                            <div class="label">Previous School</div>
                            <input type="text" name="previousSchool" id="studentPreviousSchool" class="form-control"
                            placeholder="Previous School"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Transfer reason</div>
                            <input type="text" name="transferReason" id="studentTransferReason" class="form-control"
                            placeholder="Transfer reason"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Expelsion status</div>
                            <input type="text" name="expelsionStatus" id="studentExpelsiionStatus" class="form-control"
                            placeholder="Expelsion status"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="row col-12" style="padding-bottom: 10px;">
                            <div class="field col-6">
                                <div class="label">Sespension status</div>
                                <input type="text" name="sespensionStatus" id="studentSespensionStatus" class="form-control"
                                placeholder="Sespension status"

                                 onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                            </div>
                            <div class="field col-6">
                                <div class="label">Previous special education</div>
                                <input type="text" name="specialEducation" id="studentSpecialEducation" class="form-control"
                                placeholder="Previous special education"

                                 onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                            </div>
                        </div>



                    </div>

                    <div class="col-6">
                        <div class="field">
                            <div class="label">Native language</div>
                            <select name="language" id="studentNativeLanguage" class="form-control select2bs4" style="width: 100%;">
                                    <option selected="selected">Amharic</option>
                                    <option>Oromofaa</option>
                                    <option>Tiray</option>
                                    <option>English</option>
                                    <option>Sheko</option>
                                    <option>Somaligna</option>
                                    <option>guragegna</option>
                                    </select>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Disability</div>
                            <input type="text" name="disability" id="studentDisability" class="form-control"
                            placeholder="Disability"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                               size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Medical condtion</div>
                            <input type="text" name="medicalCondtion" id="studentMedicalCondition" class="form-control"
                            placeholder="Medical condtion"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Blood type</div>
                            <input type="text" name="bloodType" id="studentBloodType" class="form-control"
                            placeholder="Blood type"

                             {{-- onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                size="30" minlength="2" maxlength="21" --}}
                                >
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                    </div>
                </div>
                <div class="field btns">
                    <button type="button" class="btn btn-primary stud_prev-1 prev">Previous</button>
                    <button id ="studentBasic" type="button" class="btn btn-primary stud_next-1 next">Continue</button>
                    {{-- <button  type="submit" name="student" class="btn btn-primary stud_sub_next-1 next" value="student">Save</button> --}}
                </div>
            </div>
            <div class="page">
                {{-- <div class="" style="margin-left: 15px;">
                    <div class="card card-header">
                        <h3 class="card-title">Parent information</h3>
                    </div><br>
                </div> --}}
                <h3 class="text-center mb-5">Parent information</h3>

                <div class="row col-12">
                    <div class="col-6">
                        <div class="field ">
                            <div class="label">First name</div>
                            <input type="text" name="pFirstName" id="parentFirstName" class="form-control"
                            placeholder="First name"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i> <i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Middle name</div>
                            <input type="text" name="pMiddleName" id="parentMiddleName" class="form-control"
                            placeholder="Middle name"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == '') {this.value = '';}"
                                 size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Last name</div>
                            <input type="text" name="pLastName" id="parentLastName" class="form-control" placeholder="Last name"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == 'Type Letters Only') {this.value = '';}"
                               size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="field">
                            <div class="label">Gender</div>
                            <select name="pGender" id="parentGender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                    </select>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Relation</div>
                            <input type="text" name="pRelation" id="parentRelation" class="form-control"
                            placeholder="Relation"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == 'Type Letters Only') {this.value = '';}"
                               size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Emergency contact</div>
                            <input type="number" name="pEmergency" id="parentEmergencyContact" class="form-control"
                            placeholder="Transfer reason">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">School closure priority</div>
                            <input type="number" name="School_Closure_Priority" id="parentPriority" class="form-control" placeholder="School closure priority">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                    </div>
                </div>
                <div class="field btns">
                    <button type="button" class="btn btn-primary stud_prev-2 prev">Previous</button>
                    <button type="button" class="btn btn-primary stud_next-2 next">Next</button>
                </div>
            </div>
            <div class="page">
                {{-- <div class="" style="margin-left: 15px;">
                    <div class="card card-header">
                        <h3 class="card-title"> Contact Address</h3>
                    </div><br>
                </div> --}}
                <h3 class="text-center mb-5">Contact Address</h3>
                <div class="row col-12">
                    <div class="col-6">
                        <div class="field">
                            <div class="label">City</div>
                            <input type="text" name="city" id="parentCity" class="form-control"
                            placeholder="City"

                            onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == 'Type Letters Only') {this.value = '';}"
                               size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Sub city</div>
                            <input type="text" name="subcity" id="parentSubCity" class="form-control"
                            placeholder="Subcity"

                             onkeydown="return alphaOnly(event);"
                                onblur="if (this.value == '')"
                                onfocus="if (this.value == 'Type Letters Only') {this.value = '';}"
                               size="30" minlength="3" maxlength="21">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Kebele</div>
                            <input type="text" name="kebele" id="parentKebele" class="form-control" placeholder="Kebele">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">House number</div>
                            <input type="number" name="houseNumber" id="parentHouseNumber" class="form-control" placeholder="House number">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="field">
                            <div class="label">P.O.Box</div>
                            <input type="number" name="p_o_box" id="parentPOB" class="form-control" placeholder="P.O.Box">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Email</div>
                            <input type="email" name="email" id="parentEmail" class="form-control" placeholder="Email">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Phone</div>
                            <input type="number" name="phone1" id="parentPhone1" class="form-control" placeholder="Phone">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Alternative Phone</div>
                            <input type="number" name="phone2" id="parentPhone2" class="form-control" placeholder="Alternative phone">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
                        </div>
                    </div>
                </div>

                <div class="field btns">
                    <button  type="button" class="btn btn-primary stud_prev-3 prev">Previous</button>
                    <button type="submit" class="btn btn-primary stud_submitBtn ">submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
    <!-- /.card-body -->


@endsection
