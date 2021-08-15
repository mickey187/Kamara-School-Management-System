@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/section_tab.css') }}">

</div>
</div>
                <div class="card card-orange">
                    <div class="card-header">
                      <h1 class="card-title text-white"><i class="nav-icon fas fa-user-edit"></i>Sectioning</h1>
                    </div>
                    <div class="container">
                        <div class="row">
                          <div class="col-xs-12 col-lg-12 ">
                            <nav>
                              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Section All</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sectioned Classes</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Unsectioned Classes</a>
                                <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Individualy Assign Section</a>
                              </div>
                            </nav>
                            <div class="col-12 tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                              <div class="col-12 tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <section>
                {{-- <form action="{{ url('setSection') }}" method="GET">
                                        @csrf --}}
                                        <div class="row col-6 m-2">
                                            {{-- <div> --}}
                                                <select name="class" class="form-control col-4 m-1" id="class">
                                                    @foreach ($class as $row)
                                                        <option value="{{ $row->id }}">{{ $row->class_label }}</option>
                                                    @endforeach
                                                </select>
                                            {{-- </div>
                                            <div> --}}
                                                <select name="stream" class="form-control col-4 m-1" id="stream">
                                                    @foreach ($stream as $row)
                                                        <option value="{{ $row->id }}">{{ $row->stream_type }}</option>
                                                    @endforeach
                                                </select>
                                                <input class="btn btn-primary col-4 m-1" type="button" id="searchStudentClass" value="List Students" >
                                            {{-- </div> --}}
                                        </div>
                                        {{-- <div class="form-group row m-4">
                                            <input class="btn btn-primary col-4" type="button" id="searchStudentClass" value="Find" >
                                        </div> --}}
                                        <div class="card col-5 ml-2">
                                            <div class=" m-3 flex" id="sections">

                                            </div>
                                        </div>

                                        <div class="row col-12" id="sectionningPage" style="display: none;">
                                            <div class="col-5">
                                                <select class="form-control mr-3" name="section_type" id="section_type" >
                                                    <option class="form-control" value="">  Select Type </option>
                                                    <option class="form-control" value="Alphabet"> Section by Alphabet </option>
                                                    <option value="RegistrationDate"> Section by Registration Date </option>
                                                    <option value="Custom"> Custom </option>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <input name="student_size" id="room_size" class="form-control" type="number" min="20" max="75" placeholder="section size %">
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control btn btn-primary" type="button" id="setSection" value="Set Section">
                                            </div>
                                        </div>
                                                            {{-- </form> --}}
                                        <br>
                                        <div class="col-12">
                                        <div style="display: none;" id="table1" class="table">
                                            <div class="row">
                                                <label class="ml-3 ">Total Number of Students</label>
                                                <div id="counter" class="">
                                                </div>
                                            </div>
                                            <table id="sectionTable1" class="table table-bordered table-striped table-sm" >
                                                <thead>
                                                    <tr>
                                                        <th>Student ID</th>
                                                        <th>Full Name</th>
                                                        <th>Grade</th>
                                                        <th>Stream</th>
                                                        <th>Section</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div style="display: none;" id="table2" class="table">
                                            <div class="row">
                                                 <label class="ml-3 ">Total Number of Students</label>
                                                <div id="counter2" class="">
                                                </div>
                                            </div>
                                                <div id="customSection" style="display: none;" class="customSection btn-group btn-group-toggle bg-light" data-toggle="buttons">
                                                    {{-- <div class="row m-1" > --}}
                                                        <label class="btn btn-secondary active">
                                                            <input type="radio" name="section" id="option1" autocomplete="off" value="A"> A
                                                        </label>
                                                        <label class="btn btn-secondary">
                                                            <input type="radio" name="section" id="option2" autocomplete="off" value="B"> B
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option3" autocomplete="off" value="C"> C
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option4" autocomplete="off" value="D"> D
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option5" autocomplete="off" value="E"> E
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option6" autocomplete="off" value="F"> F
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option7" autocomplete="off" value="G"> G
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option8" autocomplete="off" value="H"> H
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option9" autocomplete="off" value="I"> I
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option10" autocomplete="off" value="J"> J
                                                        </label>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="section" id="option11" autocomplete="off" value="K"> K
                                                        </label>

                                                    {{-- </div> --}}
                                                    {{-- <button class="btn btn-primary" onclick="addSectionSize()"><i class="fa fa-plus"> add section size</i></button> --}}
                                                </div>
                                                <div class="row" style="display: none;" id="assignCustomSection">
                                                    <input id="assignSectionForSelectedStudent" type="button" class="btn btn-success m-2" value="Assign Section">
                                                </div>
                                           </div>
                                            <table id="sectionTable2" class="table table-bordered table-striped table-sm" >
                                                <thead>
                                                    <tr>
                                                        <th>Student ID</th>
                                                        <th>Full Name</th>
                                                        <th>Grade</th>
                                                        <th>Stream</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                </section>
                              </div>
                              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <th>Classes</th>
                                        <th>Stream</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table id="example2" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <th>Classes</th>
                                        <th>Stream</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>                              </div>
                              <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <table id="example3" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <th>Student Id</th>
                                        <th>Full Name</th>
                                        <th>Class</th>
                                        <th>Stream</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                              </div>
                            </div>

                          </div>
                        </div>
                    </div>




                </div>
                </div>



                <div class="modal fade" id="setSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <p id="full_name"></p>
                            <p id="student_id"></p>
                            <p id="class_label"></p>
                            <p id="stream_type"></p>
                            <select class="form-control" id="section_id">
                                <option>select section</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="setSectionForOneStudent">Assign Section</button>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection
