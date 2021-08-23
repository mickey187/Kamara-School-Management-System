@extends('layouts.master')
@section('content')

<div class="card card-orange">
    <div class="card-header">
      <h1 class="card-title text-white"><i class="nav-icon fa fa-calendar"></i> Schedule</h1><div id="generator" class="float-right">Generate Schedule</div>
    </div>
    <div id="scheduleContainer" class="row col-12 m-5">
        <div class="form-group col-6">
            {{-- <form action="addSchedule" method="GET" > --}}
                {{-- @csrf --}}
                <div class="m-2">
                    <select id="select_class_for_schedule" class="form-control">
                        <option >select class</option>
                            @foreach ($classes as $row)
                                <option value="{{ $row->id }}">{{ $row->class_label }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="m-2">
                    <select id="select_stream_for_schedule" class="form-control">
                        <option>select stream</option>
                        @foreach ($stream as $row)
                            <option value="{{ $row->id }}">{{ $row->stream_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="sectionList">

                </div>
                <div class="m-2">
                    <select id="select_subject_for_schedule" class="form-control">
                        <option>select subject</option>
                        @foreach ($subject as $row)
                            <option value="{{ $row->id }}">{{ $row->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="m-2">
                    <select id="select_day_for_schedule" class="form-control">
                        <option value="">select Day</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </div>
                <div class="container m-1" style=" padding-top: 40px;  ">
                    <div class="row">
                        <div class="col-xs-3 col-xs-offset-3">Period
                            <div class="input-group number-spinner">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" data-dir="dwn"><span class="glyphicon glyphicon-minus fa fa-plus"></span></button>
                                </span>
                                <input id="select_period_for_schedule" type="text" class="border border-secondary text-center" value="1">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" data-dir="up"><span class="glyphicon glyphicon-plus fa fa-plus"></span></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="button" id="insertSchedule" value="Add" class="btn btn-primary m-1 col-6">
                </div>
            {{-- </form> --}}
        </div>
        <div class="col-6">
            <div class="col-6" style="margin-top: 20px;">
                <a  style="cursor: pointer;"
                            data-toggle="modal"
                                            data-card1="'+class_name+','+stream+','+section+','+teacher_id+'"
                                            data-target="#modal-schedule"
                                            onclick="generateScheduleModal();">
                    <div class="small-box bg-primary">
                        <div class="inner p-3">
                          <p>Generate Schedule</p><br>
                        </div>
                        <div class="icon"><br>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <a  class="small-box-footer">More info
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </a>
                      </div>
                </a>
            </div>
            <div class="col-6" style="margin-top: 20px;">
                <a  style="cursor: pointer;" onclick="viewSchedule();">
                    <div class="small-box bg-primary">
                        <div class="inner p-3">
                          <p>View Schedule</p><br>
                        </div>
                        <div class="icon"><br>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <a  class="small-box-footer">More info
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </a>
                      </div>
                </a>
            </div>
        </div>

    </div>

</div>





<div class="modal_class">
    <div class="modal fade" id="modal-schedule">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Generate Schedule</h4>
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="m-2">
                        <select class="select2" multiple data-placeholder="Select classes" style="width: 100%;">
                                @foreach ($classes as $row)
                                    <option value="{{ $row->id }}">{{ $row->class_label }}</option>
                                @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                      </div>
    </div>
</div> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>

@endsection
