@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

                <div class="card card-orange">
                    <div class="card-header">
                      <h1 class="card-title text-white"><i class="nav-icon fas fa-user-edit"></i>Sectioning</h1>
                    </div>
                    <div class="row col-12">
                        <div class="form-group  col-12">
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

                            <input class="btn btn-primary" type="button" id="searchStudentClass" value="Find" >
                        </div>
                    </div>

                    <div class="col-6">
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
