@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
<div class="formcontainer">
    <div class="form-outer">
        <div class="">
            <div class="card card-header bg-orange">
                <h3 class="card-title">Student Registration</h3>
            </div>
        </div><br>
        <form action="{{ url('newStudent') }}" role="form" method="POST" enctype="multipart/form-data" onsubmit="return=fa">
            @csrf
            <div class="page slidePage">
                <div class="row col-12">
                    <div class="" style="margin-left: 15px;">
                        <div class="card card-header">
                            <h3 class="card-title">Basic information</h3>
                        </div><br>
                    </div>
                    <div class="col-4">
                        <div class="col-12">
                            <div class="col-lg-12 col-sm-12">
                                <div class=" col-lg-12 col-md-6 col-sm-6 form-group">
                                    <img src="{{ asset('img/logo.png') }}" id="dsp-pro" class="img-fluid img-thumbnail" style="height: 210px;" alt="">
                                    <div class="custom-file input" >
                                    <input type="file" name="image" class="custom-file-input" id="img-pro" required ><i class="fas fa-check-circle"></i>- <small>error message</small>
                                    <label class="custom-file-label" for="img-pro">Choose image </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-4">
                        <div class="col-12 ">
                            <div class="field col-12 ">
                                <div class="label">First name</div>
                                <input type="text" id="studentFirstName" name="firstName" class="form-control" placeholder="First name" required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>

                            <div class="field col-sm-12 ">
                                <div class="label">Middle name</div>
                                <input type="text" id="studentMiddleName" name="middleName" class="form-control" placeholder="Middle name" required>
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>
                            <div class="field col-sm-12">
                                <div class="label">Last name</div>
                                <input type="text" id="studentLastName" name="lastName" class="form-control" placeholder="Last name" required>
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>
                            <div class="field col-sm-12">
                                <div class="label">Birth date</div>
                                <input id="studentBirthDate" type="date" name="birthDate" class="form-control" data-target="#reservationdate" placeholder="Birth date" required/>
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
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
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field col-12">
                            <div class="label">Gender</div>
                            <select id="studentGender" name="gender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                    </select><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field col-12">
                            <div class="label">Citizenship</div>
                            <input id="studentCitizen" type="text" name="citizenship" class="form-control" placeholder="Cityzenship">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field col-12">
                            <div class="label">Grade</div>
                            <input id="studentGrade" type="number" name="grade" class="form-control" placeholder="Grade">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                    </div>
                </div>
                </div>


                <div class="field ">
                    <button id="studentBasic" value="2" class="nextBtn btn btn-primary btn-lg" type="button">Next</button>
                </div>

            </div>

            <div class="page">
                <div class="row col-12">
                    <div class="" style="margin-left: 15px;">
                        <div class="card card-header">
                            <h3 class="card-title float-right"> Background information</h3>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="field">
                            <div class="label">Previous School</div>
                            <input type="text" name="previousSchool" class="form-control" placeholder="Previous School">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Transfer reason</div>
                            <input type="text" name="transferReason" class="form-control" placeholder="Transfer reason">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Expelsion status</div>
                            <input type="text" name="expelsionStatus" class="form-control" placeholder="Expelsion status">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="row col-12" style="padding-bottom: 10px;">
                            <div class="field col-6">
                                <div class="label">Sespension status</div>
                                <input type="text" name="sespensionStatus" class="form-control" placeholder="Sespension status">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>
                            <div class="field col-6">
                                <div class="label">Previous special education</div>
                                <input type="text" name="specialEducation" class="form-control" placeholder="Previous special education">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                            </div>
                        </div>



                    </div>

                    <div class="col-6">
                        <div class="field">
                            <div class="label">Native language</div>
                            <select name="language" class="form-control select2bs4" style="width: 100%;">
                                    <option selected="selected">Amharic</option>
                                    <option>Oromofaa</option>
                                    <option>Tiray</option>
                                    <option>English</option>
                                    <option>Sheko</option>
                                    <option>Somaligna</option>
                                    <option>guragegna</option>
                                    </select>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Disability</div>
                            <input type="text" name="disability" class="form-control" placeholder="Disability">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Medical condtion</div>
                            <input type="text" name="medicalCondtion" class="form-control" placeholder="Medical condtion">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Blood type</div>
                            <input type="text" name="bloodType" class="form-control" placeholder="Blood type">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                    </div>
                </div>
                <div class="field btns">
                    <button type="button" class="btn btn-primary prev-1 prev">Previous</button>
                    <button id ="studentBasic" type="button" class="btn btn-primary next-1 next">Continue</button>
                    <button  type="submit" name="student" class="btn btn-primary next-1 next" value="student">Save</button>
                </div>
            </div>
            <div class="page">
                <div class="row col-12">
                    <div class="" style="margin-left: 15px;">
                        <div class="card card-header">
                            <h3 class="card-title">Parent information</h3>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="field ">
                            <div class="label">First name</div>
                            <input type="text" name="pFirstName" class="form-control" placeholder="First name" >
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Middle name</div>
                            <input type="text" name="pMiddleName" class="form-control" placeholder="Middle name">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Last name</div>
                            <input type="text" name="pLastName" class="form-control" placeholder="Last name">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="field">
                            <div class="label">Gender</div>
                            <select name="pGender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                    </select>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Relation</div>
                            <input type="text" name="pRelation" class="form-control" placeholder="Relation">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Emergency contact</div>
                            <input type="number" name="pEmergency" class="form-control" placeholder="Transfer reason">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">School closure priority</div>
                            <input type="number" name="School_Closure_Priority" class="form-control" placeholder="School closure priority">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                    </div>
                </div>
                <div class="field btns">
                    <button type="button" class="btn btn-primary prev-2 prev">Previous</button>
                    <button type="button" class="btn btn-primary next-2 next">Next</button>
                </div>
            </div>
            <div class="page">
                <div class="row col-12">
                    <div class="" style="margin-left: 15px;">
                        <div class="card card-header">
                            <h3 class="card-title"> Contact Address</h3>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="field">
                            <div class="label">City</div>
                            <input type="text" name="city" class="form-control" placeholder="City">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Sub city</div>
                            <input type="text" name="subcity" class="form-control" placeholder="Subcity">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Kebele</div>
                            <input type="text" name="kebele" class="form-control" placeholder="Kebele">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">House number</div>
                            <input type="number" name="houseNumber" class="form-control" placeholder="House number">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="field">
                            <div class="label">P.O.Box</div>
                            <input type="number" name="p_o_box" class="form-control" placeholder="P.O.Box">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Email</div>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Phone</div>
                            <input type="number" name="phone1" class="form-control" placeholder="Phone">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                        <div class="field">
                            <div class="label">Alternative Phone</div>
                            <input type="number" name="phone2" class="form-control" placeholder="Alternative phone">
                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                        </div>
                    </div>
                </div>

                <div class="field btns">
                    <button  type="button" class="btn btn-primary prev-3 prev">Previous</button>
                    <button type="submit" class="btn btn-primary submitBtn ">submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
    <!-- /.card-body -->


@endsection
