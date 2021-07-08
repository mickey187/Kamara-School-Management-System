@extends('layouts.master')
@section('content')


                <div class="card card-orange">
                    <div class="card-header">
                      <h1 class="card-title text-white"><i class="nav-icon fas fa-user-plus"></i> Student Enrolment </h1>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="formcontainer">

                            <div class="form-outer">
                                <form action="find_student" method="GET">
                                    @csrf
                                    <div class=" centered">
                                            <div class="col-12 text-lg ">Student ID </div><br>
                                            <div class="row col-12">

                                               <div class="col-9">
                                                    <input type="number" name="student_id" class="form-control text-sm " placeholder="student id">
                                                </div>
                                                <div class="col-3">
                                                    <button class="btn btn-primary btn-md col-6" type="submit">Find</button>
                                                </div>

                                            </div>
                                    </div>

                                </form>
                            </div>
                            <br>
                            @if (isset($student))
                            <form action="{{ url('register/'.$student->id) }}" method="GET">
                                <div>
                                    <div class="callout callout-info row col-12">
                                        <h5><i class="fas fa-info"></i> Student Information</h5>

                                       <div class="col-2" >
                                            <div class=" col-12 form-group float-left">
                                                @if ($student->image)
                                                <img src="{{ asset('storage/student_image/'.$student->image)}}" id="dsp-pro" class="img-fluid img-thumbnail" style="height: 210px;" alt="">
                                                @else
                                                <img src="{{ asset(' https://peggyfoundation.org/wp-content/uploads/2015/10/PersonPlaceholder-01.png')}}" id="dsp-pro" class="img-fluid img-thumbnail" style="height: 210px;" alt="">
                                                @endif
                                            </div>
                                       </div>
                                       <div class="row col-9" style="display: flex; padding:20px;">
                                           <br>
                                           <span> <label> NAME </label> {{ $student->first_name.' '.$student->middle_name.' '.$student->last_name }}</span><br>
                                           <span> <label>   ID </label>{{ ' KA/'.$student->student_id }}</span>
                                           <span><label>Grade </label>
                                            @if (isset($class))
                                               {{ $class->class_label." Section " }}</span>
                                            @else
                                                {{ $student->class }}</span>
                                            @endif
                                            <span> <label> Status </label>{{ ' KA/'.$student->status }}</span>
                                            <div class="form-group  col-sm-3">
                                                <span><label for="exampleFormControlSelect1">Academic Year </label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="academic_year">
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                </select>
                                            </span><br>
                                            </div>
                                       </div><button class="btn btn-primary btn-lg col-3" type="submit">Register</button>
                                    </div>

                                </div>
                            </form>
                            @endif
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <!-- general form elements disabled -->


@endsection
