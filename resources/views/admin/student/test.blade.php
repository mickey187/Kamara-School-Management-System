@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

<form action="{{ Route('newStudent') }}" method="GET">
        <nav>
            <div class="nav nav-tabs bg-orange text-white" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-student-tab" data-bs-toggle="tab" data-bs-target="#nav-student" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Student</button>
            <button class="nav-link" id="nav-background-tab" data-bs-toggle="tab" data-bs-target="#nav-background" type="button" role="tab" aria-controls="nav-background" aria-selected="false">Background </button>
            <button class="nav-link" id="nav-guardian-tab" data-bs-toggle="tab" data-bs-target="#nav-guardian" type="button" role="tab" aria-controls="nav-guardian" aria-selected="false">Guardian </button>
            </div>

        </nav>
            <div class="tab-content" id="nav-tabContent"><br>

                <div class="tab-pane fade show active " id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab">
                    <div class="row col-sm-12">
                        {{-- Student form start --}}

                        <div class="col-sm-6">
                            <div class="col-sm-12 row" style="text-align:center;">
                                <div class="card" style="display: inline-block;margin: 0 auto;padding: 3px;">
                                    <div class="card-header">
                                        <h3 class="card-title">Student Basic</h3>
                                    </div>
                                        <div class="col-lg-12 ">
                                            <div class="field col-12 form-group">
                                                <div class=" col-lg-12 col-md-6 col-sm-6 form-group">
                                                    <img src="{{ asset('img/logo.png') }}" id="dsp-pro" class="img-fluid img-thumbnail img-circle" style="height: 100px;margin:5px;" alt="">
                                                    <div class="custom-file">
                                                    <input type="file" name="image" style="height: 30px;" class="custom-file-input input-sm" id="img-pro" required >
                                                    <label class="custom-file-label float-left" for="img-pro">Choose image </label>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="field col-6">
                                                        <div class="label float-left">First name*</div>
                                                        <input type="text" name="firstName"  class="form-control col-sm-*" placeholder="">
                                                    </div>
                                                    <div class="field col-sm-6">
                                                        <div class="label float-left">Father name*</div>
                                                        <input type="text" name="middleName"  class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top:5px;">
                                                    <div class="field col-sm-6">
                                                        <div class="label float-left text-sm">Grand Father name*</div>
                                                        <input type="text" name="lastName" class="form-control"  placeholder="">
                                                    </div>
                                                    <div class="field col-sm-6">
                                                        <div class="label  float-left text-sm">Birth date</div>
                                                        <input type="date" name="birthDate" class="form-control" data-target="#reservationdate" placeholder="Birth date" />
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:5px;">
                                                    <div class="field col-sm-6">
                                                        <div class="label float-left text-sm">Gender*</div>
                                                        <select name="gender"  class="form-control">
                                                                <option><h6>Male</h6></option>
                                                                <option>Female</option>
                                                            </select>
                                                    </div>
                                                    <div class="field col-sm-6">
                                                        <div class="label float-left text-sm">Citizenship</div>
                                                        <input type="text"  name="citizenship" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top:5px;">
                                                    <div class="field col-sm-6">
                                                        <div class="label float-left text-sm">Birth place</div>
                                                        <select name="birthPlace" class="form-control select2bs4" >
                                                                <option selected="selected">Adama</option>
                                                                <option>Harer</option>
                                                                <option>Addis Ababa </option>
                                                                <option>Hawada</option>
                                                                <option>Bahir Dar</option>
                                                                <option>Dilla</option>
                                                                <option>Dire Dawa</option>
                                                            </select>
                                                    </div>
                                                    <div class="field col-sm-6">
                                                        <div class="label float-left text-sm">Native language</div>
                                                        <select name="language" class="form-control select2bs4" >
                                                                <option selected="selected">Amharic</option>
                                                                <option>Oromofaa</option>
                                                                <option>Tiray</option>
                                                                <option>English</option>
                                                                <option>Sheko</option>
                                                                <option>Somaligna</option>
                                                                <option>guragegna</option>
                                                            </select>
                                                    </div>
                                                </div>

                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Student form end --}}
                            {{-- Student Academic form start --}}
                            <div class="col-sm-6">
                                <div class="col-sm-12 row" style="text-align:center;">
                                    <div class="card" style="display: inline-block;margin: 0 auto;padding: 3px;">
                                        <div class="card-header">
                                            <h3 class="card-title">Academic Status</h3>
                                        </div><br>
                                        <div class="row col-sm-12">
                                            <div class="field col-sm-6">
                                                <div class="label float-left text-sm">Grade</div>
                                                <input type="number" name="grade" class="form-control" placeholder=""> </div>
                                            <div class="field col-sm-6">
                                                <div class="label float-left text-sm">Avarage</div>
                                                <input type="number" name="avg" class="form-control"  placeholder="">
                                            </div>
                                        </div><br>
                                    </div>
                                </div>
                                <div class="row col-sm-12">
                                    <div class="row  float-right" style="margin-top: 15px; margin-left:1px;">
                                        <button type="button" class=" btn btn-primary col-sm-12 float-right">Continue</button>
                                    </div>
                                </div>
                            </div>

                        {{-- Student Academic form end --}}

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-background" role="tabpanel" aria-labelledby="nav-background-tab">

                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="col-sm-12 row" style="text-align:center;">
                                <div class="card" style="display: inline-block;margin: 0 auto;padding: 3px;">
                                    <div class="card-header">
                                        <h3 class="card-title">Student Background</h3>
                                    </div><br>
                                    <div class="row col-sm-12" >
                                        <div class="field col-sm-6">
                                            <div class="label  float-left text-sm">Previous School</div>
                                            <input type="text" name="previousSchool" class="form-control" placeholder="">
                                        </div>
                                        <div class="field col-sm-6" >
                                            <div class="label  float-left text-sm">Transfer reason</div>
                                            <input type="text" name="transferReason" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row col-sm-12" style="margin-top: 5px;">
                                        <div class="field  col-sm-6">
                                            <div class="label float-left text-sm">Expelsion status</div>
                                            <input type="text" name="expelsionStatus" class="form-control" placeholder="">
                                        </div>
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">Sespension status</div>
                                            <input type="text" name="sespensionStatus" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row col-sm-12" style="margin-top: 10px;">
                                        <div class="field">
                                            <div class="label float-left text-sm">Previous special education</div>
                                            <input type="text" name="specialEducation" class="form-control" placeholder="">
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="col-sm-12 row" style="text-align:center;">
                                <div class="card" style="display: inline-block;margin: 0 auto;padding: 3px;">
                                    <div class="card-header">
                                        <h3 class="card-title">Medical</h3>
                                    </div><br>
                                    <div class="field col-sm-12" >
                                        <div class="label float-left text-sm">Disability</div>
                                        <input type="text" name="disability" class="form-control" placeholder="">
                                    </div>
                                    <div class="field col-sm-12" style="margin-top: 5px;">
                                        <div class="label float-left text-sm">Medical condtion</div>
                                        <input type="text" name="medicalCondtion" class="form-control" placeholder="">
                                    </div>
                                    <div class="field col-sm-12" style="margin-top: 5px;">
                                        <div class="label float-left text-sm">Blood type</div>
                                        <input type="text" name="bloodType" class="form-control" placeholder="">
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-12">
                            <div class="row  float-right" style="margin-top: 15px; margin-left:1px;">
                                <button type="button" class=" btn btn-primary col-sm-12 float-right">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-guardian" role="tabpanel" aria-labelledby="nav-guardian-tab">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="col-sm-12 row" style="text-align:center;">
                                <div class="card" style="display: inline-block;margin: 0 auto;padding: 3px;">
                                    <div class="card-header">
                                        <h3 class="card-title"> Parent information</h3>
                                    </div><br>
                                    <div class="row col-sm-12">
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">First name</div>
                                            <input type="text" name="pFirstName" class="form-control" placeholder="">
                                        </div>
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">Middle name</div>
                                            <input type="text" name="pMiddleName" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row col-sm-12">
                                        <div class="field">
                                            <div class="label float-left text-sm">Last name</div>
                                            <input type="text" name="pLastName" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row col-sm-12">
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">Gender</div>
                                            <select name="pGender" class="form-control">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                        </div>
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">Relation</div>
                                            <input type="text" name="pRelation" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row col-sm-12">
                                        <div class="field  col-sm-6">
                                            <div class="label float-left text-sm">Emergency contact</div>
                                            <input type="number" name="pEmergency" class="form-control" placeholder="">
                                        </div>
                                        <div class="field  col-sm-6">
                                            <div class="label float-left text-sm">School closure priority</div>
                                            <input type="number" name="School_Closure_Priority" class="form-control" placeholder="">
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                        {{-- Guardian Address Start --}}
                        <div class="col-sm-6">
                            <div class="col-sm-12 row" style="text-align:center;">
                                <div class="card" style="display: inline-block;margin: 0 auto;padding: 3px;">
                                    <div class="card-header">
                                        <h3 class="card-title">Parent Background</h3>
                                    </div><br>

                                    <div class="row col-sm-12">
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">City</div>
                                            <input type="text" name="city" class="form-control" placeholder=""> </div>
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">Sub city</div>
                                            <input type="text" name="subcity" class="form-control"  placeholder="">
                                        </div>
                                    </div>

                                    <div class="row col-sm-12">
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">Kebele</div>
                                            <input type="text"  name="kebele" class="form-control"  placeholder="">
                                        </div>
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">House number</div>
                                            <input type="number"  name="houseNumber" class="form-control"  placeholder="">
                                        </div>
                                    </div>

                                    <div class="row col-sm-12">
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">P.O.Box</div>
                                            <input type="number"  name="p_o_box" class="form-control"  placeholder="">
                                        </div>
                                        <div class="field col-sm-6">
                                            <div class="label float-left text-sm">Email</div>
                                            <input type="email"  name="email" class="form-control"  placeholder="">
                                        </div>
                                    </div>

                                    <div class="row col-lg-12">
                                        <div class="field float-left col-lg-6">
                                            <div class="label float-left text-sm">Phone</div>
                                            <input type="number"  name="phone1" class="form-control" placeholder="">
                                        </div>
                                        <div class="field col-lg-6">
                                            <div class="label float-left text-sm">Alternative Phone</div>
                                            <input type="number"  name="phone2" class="form-control" placeholder="">
                                        </div><br>
                                    </div>
                                    <br>
                                </div>
                                <div class="row  float-right" style="margin-top: 15px; margin-left:1px;">
                                    <input type="submit" class="btn btn-primary col-sm-12" value="submit">
                                </div>
                            </div>
                        </div>

                        {{-- Guardian Address End --}}

                    </div>
                </div>
            </div>
        </form>

@endsection

