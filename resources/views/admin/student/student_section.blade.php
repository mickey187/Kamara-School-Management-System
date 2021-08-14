@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

                <div class="card card-orange">
                    <div class="card-header">
                      <h1 class="card-title text-white"><i class="nav-icon fas fa-user-edit"></i>Sectioning</h1>
                    </div>

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
                </div>
                </div>
@endsection
