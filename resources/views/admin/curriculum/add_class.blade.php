@extends('layouts.master')
@section('content')


    <div class="card card-orange">
        <div class="card-header">
            <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Class</h3>
        </div>
        <div class="card-body ">
          <section class="content">
            <div class="container-fluid mt-3">
    
    
    
                <form action="addClass" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Class </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="class_label"
                                    name="class_label">
                                    <option value="KG 1">KG 1</option>
                                    <option value="KG 2">KG 2</option>
                                    <option value="KG 3">KG 3</option>
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 2">Grade 2</option>
                                    <option value="Grade 3">Grade 3</option>
                                    <option value="Grade 4">Grade 4</option>
                                    <option value="Grade 5">Grade 5</option>
                                    <option value="Grade 6">Grade 6</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 8">Grade 8</option>
                                    <option value="Grade 9">Grade 9</option>
                                    <option value="Grade 10">Grade 10</option>
                                    <option value="Grade 11">Grade 11</option>
                                    <option value="Grade 12">Grade 12</option>
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Section </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="select_section">
                                    <option value="1">Section A</option>
                                    <option value="2">Section B</option>
                                    <option value="3">Section C</option>
                                    <option value="4">Section D</option>
                                    <option value="5">Section E</option>
                                    <option value="6">Section F</option>
    
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Stream </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="stream_id">
                                    @foreach ($stream_data as $row)
                                        <option value="{{ $row->id }}">{{ $row->stream_type }}</option>
                                    @endforeach
    
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Subject</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="select_subject">
                                    @foreach ($data as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->subject_name . ' for ' . $row->subject_group }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
    
                        </div>
    
    
    
                    </div>
    
                </form>
            </div>
    
    
        </section
        </div>
    </div>
    >
@endsection
