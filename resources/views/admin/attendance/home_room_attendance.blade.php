@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="card card-orange">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                <li class="nav-item">
                    <a class="nav-link active text-bold"data-toggle="tab" role="tab" href="#show_homeroom_attendance_tab" id="show_homeroom_attendance_tab_link">Home Room Teachers Attendance</a>
                </li>

            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content text-center">
                <button type="button" class="btn btn-primary"> <i class="fa fa-refresh" aria-hidden="true"></i> </button>
                <h4 id="current_year_month" data-year_month="{{$current_year_month}}" class="text-primary text-bold">{{$current_date}}</h4>
                <div class="tab-pane active" id="show_homeroom_attendance_tab">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped" id="home_room_attedance_table">
                                <thead>
                                    <tr>
                                        <th>Teacher ID</th>
                                        <th>Teacher Name</th>                            
                                        <th>Class Label</th>
                                        <th>Stream</th>
                                        <th>Section</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection