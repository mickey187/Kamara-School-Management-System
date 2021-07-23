@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

                <div class="card card-orange">
                    <div class="card-header">
                      <h1 class="card-title text-white"><i class="nav-icon fas fa-user-edit"></i>Sectioning</h1>
                    </div>

                    <form action="{{ url('setSection') }}" method="GET">
                        @csrf
                        <div class="row col-12">

                            <select name="class" class="form-control col-4 m-3" id="class">
                                @foreach ($class as $row)
                                <option value="{{ $row->id }}">{{ $row->class_label }}</option>
                                @endforeach
                            </select>
                            <select name="stream" class="form-control col-4 m-3" id="stream">
                                @foreach ($stream as $row)
                                <option value="{{ $row->id }}">{{ $row->stream_type }}</option>
                                @endforeach
                            </select>
                            <div class="form-group m-3">
                                <input class="btn btn-primary" type="button" id="searchStudentClass" value="Find" >
                            </div>
                        </div>
                        <div class="row col-12 m-3 flex" id="sections">

                        </div>
                        <div class="row col-12">

                                <div class="col-5">
                                    <select class="form-control mr-3" name="section_type" id="section_type">
                                        <option class="form-control" value="Alphabet"> Section by Alphabet </option>
                                        <option value="RegistrationDate"> Section by Registration Date </option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <input name="student_size" class="form-control" type="number" min="20" max="75" placeholder="section size %">
                                </div>
                                <div class="col-4">
                                    <input class="form-control btn btn-primary" type="submit" value="Set Section">
                                </div>
                        </div>
                    </form>
                    <br>
                    <div class="col-12">
                    <div class="table">
                        <div class="row">
                             <label class="ml-3 ">Total Number of Students</label>
                            <div id="counter" class="">
                            </div>
                        </div>

                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Full Name</th>
                                    <th>Grade</th>
                                    <th>Stream</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="student_list">
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
                </div>

                <div class="form">
                    <form action="{{ url('sample_student') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="form form-control-file" type="file" name="excel">
                        <input type="submit" value="Insert Student">
                    </form>
                </div>
@endsection
