@extends('layouts.master')

@section('content')

<div class="card card-orange">
    <div class="card-header">

        <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
            <li class="nav-item">
              <a class="nav-link active text-bold" data-toggle="tab" href="#generate_schedule_tab" id="generate_schedule_tab_link" role="tab">Generate Schedule</a>
            </li>
    
            <li class="nav-item">
                <a class="nav-link text-bold" data-toggle="tab" href="#view_all_schedule_tab" id="view_all_schedule_tab_link" role="tab" id="view_payment_type_tab_link">View All Schedule</a>
              </li>
    
              <li class="nav-item">
                <a class="nav-link text-bold" data-toggle="tab" href="#view_individual_schedule_tab" role="tab" id="view_individual_schedule_tab_link">View Individual Schedule</a>
              </li>
    
           
    
          
          </ul>
        {{-- <div class="card-title text-white">
            <i class="nav-icon fa fa-calendar"></i> Schedule</h1>
        </div> --}}
    </div>

    <div class="card-body">
        <div class="tab-content text-center">
            <div class="tab-pane active" id="generate_schedule_tab">
                <div class="row justify-content-center">
                    <div class="col-6">

                        <button type="button" name="" id="new_schedule" class="btn btn-primary btn-lg btn-block">
                        <i class="fa fa-plus-square" aria-hidden="true"></i> Generate Schedule
                        </button>

                        {{-- <button type="button" name="" id="view_schedule" class="btn btn-primary btn-lg btn-block">
                        <i class="fa fa-eye" aria-hidden="true"></i> View Schedule
                        </button> --}}

                    </div>        
                </div>
            </div>

            
            <div class="tab-pane" id="view_all_schedule_tab">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped mt-5" id="view_schedule_table">
                            <thead>
                                <tr>
                                    <th>Class Label</th>
                                    <th>Stream Type</th>  
                                    <th>Section</th>
                                    <th>Subject</th>
                                    <th>Day</th>
                                    <th>Period Number</th>
                                </tr>
                            </thead>
                                <tbody>

                                </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane text-center" id="view_individual_schedule_tab">
                <p>Individual Schedule</p>

                <div class="row justify-content-center">
                    <div class="col-6">

                        <div class="form-group">
                            <label for="class_label_select">Select Class Label</label>
                            <select class="form-control"  id="class_label_select">
                                @foreach ($classes as $row)
                                    <option value="{{$row->id}}">{{$row->class_label}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="stream_select">Select Stream</label>
                            <select class="form-control"  id="stream_select">
                                @foreach ($stream as $row)
                                    <option value="{{$row->id}}">{{$row->stream_type}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="select_section">select Section</label>
                            <select class="form-control" id="select_section">
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                                <option value="d">d</option>
                                <option value="e">e</option>
                            </select>
                        </div>

                        <button type="button" name="" id="find_schedule" class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-search" aria-hidden="true"></i> Find Schedule
                        </button>

                        

                    </div>
                
                </div>
                    <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered table-striped mt-5" id="view_specific_schedule_table">
                                    <thead>
                                        <tr>
                                            <th>Class Label</th>
                                            <th>Stream Type</th>  
                                            <th>Section</th>
                                            <th>Subject</th>
                                            <th>Day</th>
                                            <th>Period Number</th>
                                        </tr>
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
@endsection