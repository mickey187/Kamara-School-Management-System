@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

                <div class="card card-orange">
                    <div class="card-header">
                      <h1 class="card-title text-white"><i class="nav-icon fas fa-user-edit"></i> Edit student profile</h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="formcontainer">

                            <div class="form-outer">
                                @foreach ($stud as $student)
                                <form action="{{url('edit_student_value/'.$student->id)}}" method="POST">
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
                                                    <input type="text" id="studentFirstName" name="firstName" class="form-control" placeholder="First name" value="{{$student->first_name}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                                </div>
                                                <div class="field">
                                                    <div class="label">Middle name</div>
                                                    <input type="text" id="studentMiddleName" name="middleName" class="form-control" placeholder="Middle name" value="{{$student->middle_name}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="field">
                                                    <div class="label">Last name</div>
                                                    <input type="text" id="studentLastName" name="lastName" class="form-control" placeholder="Last name" value="{{$student->last_name}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                                </div>

                                                <div class="field">
                                                    <div class="label">Gender</div>
                                                    <select id="studentGender" name="gender" class="form-control">
                                                        <option
                                                            @if ($student->gender=='Male')
                                                                {{'selected'}}
                                                            @endif
                                                        >Male</option>

                                                        <option

                                                            @if ($student->gender=='Female')
                                                                {{'selected'}}
                                                            @endif
                                                        >Female</option>
                                                          </select>
                                                          <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                                </div>
                                            </div>
                                        </div>

                                        <div value="edit" class="field ">
                                            <button type="button" class="nextBtn btn btn-primary" value="1">Next</button>
                                        </div>

                                    </div>


                                    <div class="page">

                                        <div class="title">
                                            <div>
                                                Background information
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-6">
                                                <div class="field">
                                                    <div class="label">Birth date</div>
                                                    <input type="date" name="birthDate" class="form-control" data-target="#reservationdate" placeholder="Birth date" value="{{$student->birth_year}}"/>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                                </div>

                                                <div class="field">
                                                    <div class="label">Birth place</div>
                                                    <select name="birthPlace" class="form-control select2bs4" style="width: 100%;">
                                                            <option selected="selected">Alabama</option>
                                                            <option>Alaska</option>
                                                            <option>California</option>
                                                            <option>Delaware</option>
                                                            <option>Tennessee</option>
                                                            <option>Texas</option>
                                                            <option>Washington</option>
                                                    </select>
                                                          <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                                        </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="field">
                                                    <div class="label">Native language</div>
                                                    <select name="language" class="form-control select2bs4" style="width: 100%;">
                                                            <option selected="selected">Alabama</option>
                                                            <option>Alaska</option>
                                                            <option>California</option>
                                                            <option>Delaware</option>
                                                            <option>Tennessee</option>
                                                            <option>Texas</option>
                                                            <option>Washington</option>
                                                          </select>
                                                          <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                                </div>

                                                <div class="field">
                                                    <div class="label">Citizenship</div>
                                                    <input type="text" name="citizenship" class="form-control" placeholder="Cityzenship" value="{{$student->citizenship}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="field btns">
                                            <button type="button" class="prev-1 prev  btn btn-primary">Previous</button>
                                            <button type="button" class="next-1 next  btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                    <div class="page">
                                        <div class="title">
                                            <div>
                                                History
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                            <div class="col-6">
                                                <div class="field">
                                                    <div class="label">Previous School</div>
                                                    <input type="text" name="previousSchool" class="form-control" placeholder="Previous School" value="{{$student->previous_school}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                                </div>
                                                <div class="field">
                                                    <div class="label">Transfer reason</div>
                                                    <input type="text" name="transferReason" class="form-control" placeholder="Transfer reason" value="{{$student->transfer_reason}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                                </div>
                                                <div class="field">
                                                    <div class="label float-right">Previous special education</div>
                                                    <input type="text" name="specialEducation" class="form-control" placeholder="Previous special education" value="{{$student->previous_special_education}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="field">
                                                    <div class="label">Expelsion status</div>
                                                    <input type="text" name="expelsionStatus" class="form-control" placeholder="Expelsion status" value="{{$student->expulsion_status}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                                </div>
                                                <div class="field">
                                                    <div class="label">Sespension status</div>
                                                    <input type="text" name="sespensionStatus" class="form-control" placeholder="Sespension status" value="{{$student->suspension_status}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                                </div>

                                            </div>


                                        </div>




                                        <div class="field btns">
                                            <button type="button" class="prev-2 prev  btn btn-primary">Previous</button>
                                            <button type="button" class="next-2 next  btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                    <div class="page">
                                        <div class="title">
                                            <div>
                                                Medical information
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                            <div class="row col-6">
                                                <div class="field">
                                                    <div class="label">Disability</div>
                                                    <input type="text" name="disability" class="form-control" placeholder="Disability" value="{{$student->disablity}}">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                                </div>
                                                <div class="field">
                                                    <div class="label">Medical condtion</div>
                                                    <input type="text" name="medicalCondtion" class="form-control" placeholder="Medical condtion" value="{{$student->medical_condtion}}">
                                                     <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                                </div>
                                            </div>
                                            <div class="row col-6">

                                            <div class="field">
                                                <div class="label">Blood type</div>
                                                <input type="text" name="bloodType" class="form-control" placeholder="Blood type" value="{{$student->blood_type}}">
                                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                            </div>
                                            </div>

                                        </div>





                                        <div class="field btns">
                                            <button  type="button" class="prev-3 prev  btn btn-primary">Previous</button>
                                            <button type="submit" class=" submitBtn  btn btn-primary">submit</button>
                                        </div>
                                    </div>

                                </form>
                                @endforeach
                            </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <!-- general form elements disabled -->


@endsection
