@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('dist/css/add_student.css') }}">

@section('content')
    <div class="card">
            <div class="card-header bg-orange">
                <label class="card-title">Student Registration</label>
            </div>
            <div class="card-body">
                <div class="container box">
                    <form action="" method="post"  id="register_form">
                        <ul class="nav nav-tabs " >
                            <li class="nav-item mr-1" >
                                <a class="nav-link active_tab1 " style="border: 1px solid #ccc;" id="list_basic_student_info">Basic Student Information</a>
                            </li>
                            <li class="nav-item mr-1">
                                <a class="nav-link  bg-light" style="border: 1px solid #ccc;" id="list_academnic_background">Academic Background</a>
                            </li>
                            <li class="nav-item mr-1">
                                <a class="nav-link  bg-light" style="border: 1px solid #ccc;" id="list_parent_info">Parent Information</a>
                            </li>
                            <li class="nav-item mr-1">
                                <a class="nav-link  bg-light" style="border: 1px solid #ccc;" id="list_address">Address</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="basic_student_info">
                                <div class="card card-default">
                                    <div class="card-header bg-light">Basic Info</div>
                                    <div class="card-body">
                                        <div class="row col-12">
                                            <div class="col-2">
                                                <div class=" col-lg-12 col-md-6 col-sm-6 form-group">
                                                        <img src="{{ asset('img/default_picture.png') }}" id="dsp-pro" class="img-fluid img-thumbnail m-2" style="height: 200px;" alt="">
                                                    <div class="custom-file input m-2" >
                                                        <input  type="file" name="image" class="custom-file-input" id="img-pro" required >
                                                        <label class="custom-file-label" for="img-pro">Choose </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="row col-12">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">First name</div>
                                                            <input type="text" id="studentFirstName" name="firstName" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Middle name</div>
                                                            <input type="text" id="studentMiddleName" name="middleName" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Last name</div>
                                                            <input type="text" id="studentLastName" name="lastName" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Gender</div>
                                                            <select id="studentGender" name="gender" class="form-control">
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-12">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Birth date</div>
                                                            <input type="text" id="studentBirthPlace" name="birthPlace" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Citizenship</div>
                                                            <input id="studentCitizen" type="text" name="citizenship" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Grade</div>
                                                            <select  id="studentGrade" type="text" name="grade" class="form-control" placeholder="Grade">
                                                                <option> Grade</option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}">{{$class->class_label}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="label">Stream</div>
                                                        <select  id="studentStream" type="number" name="stream" class="form-control" placeholder="Grade">
                                                            <option>Stream</option>
                                                            @foreach ($streams as $stream)
                                                                <option value="{{ $stream->id }}">{{$stream->stream_type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row col-12">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Country of Birth</div>
                                                            <input type="text" id="studentBirthPlace" name="birthPlace" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Day care program</div>
                                                            <select id="studentGender" name="gender" class="form-control">
                                                                <option>Yes</option>
                                                                <option>No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <div class="label">Student kinder garten</div>
                                                            <input id="studentCitizen" type="text" name="citizenship" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="label">Native language</div>
                                                        <select name="language" id="studentNativeLanguage" class="form-control select2" style="width: 100%;" multiple>
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
                                            </div>
                                        </div>
                                        <div class="row col-12 justify-content-center">
                                            <div>
                                                <input type="button" class="btn btn-primary" id="basicStudentInfoBtn" value="NEXT">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="academnic_background">
                                <div class="tab-pane active" id="basic_student_info">
                                    <div class="card card-default">
                                        <div class="card-header bg-light">Academic Background</div>
                                        <div class="card-body">
                                            <div class="row col-12">
                                                <div class="col-10">
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">First name</div>
                                                                <input type="text" id="studentFirstName" name="firstName" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Middle name</div>
                                                                <input type="text" id="studentMiddleName" name="middleName" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Last name</div>
                                                                <input type="text" id="studentLastName" name="lastName" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Gender</div>
                                                                <select id="studentGender" name="gender" class="form-control">
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Birth date</div>
                                                                <input type="text" id="studentBirthPlace" name="birthPlace" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Citizenship</div>
                                                                <input id="studentCitizen" type="text" name="citizenship" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Grade</div>
                                                                <select  id="studentGrade" type="text" name="grade" class="form-control" placeholder="Grade">
                                                                    <option> Grade</option>
                                                                    @foreach ($classes as $class)
                                                                        <option value="{{ $class->id }}">{{$class->class_label}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="label">Stream</div>
                                                            <select  id="studentStream" type="number" name="stream" class="form-control" placeholder="Grade">
                                                                <option>Stream</option>
                                                                @foreach ($streams as $stream)
                                                                    <option value="{{ $stream->id }}">{{$stream->stream_type }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Country of Birth</div>
                                                                <input type="text" id="studentBirthPlace" name="birthPlace" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Day care program</div>
                                                                <select id="studentGender" name="gender" class="form-control">
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Student kinder garten</div>
                                                                <input id="studentCitizen" type="text" name="citizenship" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="label">Native language</div>
                                                            <select name="language" id="studentNativeLanguage" class="form-control select2" style="width: 100%;" multiple>
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
                                                </div>
                                            </div>
                                            <div class="row col-12 justify-content-center">
                                                <div>
                                                    <input type="button" class="btn btn-secondary" id="academicBackgroundPreBtn" value="PREVIOUS">
                                                    <input type="button" class="btn btn-primary" id="academnicBackgroundBtn" value="NEXT">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                            </div>
                            <div class="tab-pane " id="parent_info">
                                <div class="tab-pane " id="basic_student_info">
                                    <div class="card card-default">
                                        <div class="card-header bg-light">Parent Information</div>
                                        <div class="card-body">
                                            <div class="row col-12">

                                                <div class="col-10">
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">First name</div>
                                                                <input type="text" id="studentFirstName" name="firstName" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Middle name</div>
                                                                <input type="text" id="studentMiddleName" name="middleName" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Last name</div>
                                                                <input type="text" id="studentLastName" name="lastName" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Gender</div>
                                                                <select id="studentGender" name="gender" class="form-control">
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Birth date</div>
                                                                <input type="text" id="studentBirthPlace" name="birthPlace" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Citizenship</div>
                                                                <input id="studentCitizen" type="text" name="citizenship" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Grade</div>
                                                                <select  id="studentGrade" type="text" name="grade" class="form-control" placeholder="Grade">
                                                                    <option> Grade</option>
                                                                    @foreach ($classes as $class)
                                                                        <option value="{{ $class->id }}">{{$class->class_label}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="label">Stream</div>
                                                            <select  id="studentStream" type="number" name="stream" class="form-control" placeholder="Grade">
                                                                <option>Stream</option>
                                                                @foreach ($streams as $stream)
                                                                    <option value="{{ $stream->id }}">{{$stream->stream_type }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Country of Birth</div>
                                                                <input type="text" id="studentBirthPlace" name="birthPlace" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Day care program</div>
                                                                <select id="studentGender" name="gender" class="form-control">
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <div class="label">Student kinder garten</div>
                                                                <input id="studentCitizen" type="text" name="citizenship" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="label">Native language</div>
                                                            <select name="language" id="studentNativeLanguage" class="form-control select2" style="width: 100%;" multiple>
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
                                                </div>
                                            </div>
                                            <div class="row col-12 justify-content-center">
                                                Parent
                                                <div>
                                                    <input type="button" class="btn btn-secondary" id="parentInfoPreBtn" value="PREVIOUS">
                                                    <input type="button" class="btn btn-primary" id="parentInfoBtn" value="NEXT">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="address">
                                Address
                                <div class="row col-12 justify-content-center">
                                    <div>
                                        <input type="button" class="btn btn-secondary" id="addressPreBtn" value="PREVIOUS">
                                        <input type="button" class="btn btn-primary" id="addressBtn" value="NEXT">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer"></div>
    </div>
@endsection
