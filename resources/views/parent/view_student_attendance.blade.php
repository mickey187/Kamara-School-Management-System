@extends('layouts.parent_master')

@section('content')

<div class="container-fluid">
    <div class="card card-orange">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                
                <li class="nav-item ethio-month">
                    <a class="nav-link active text-bold " id="ethio_month1"  data-toggle="tab" href="#" role="tab" data-month="{{$year_month[1]}}">መስከረም</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link text-bold " id="ethio_month1"  data-toggle="tab" href="#" role="tab" data-month="{{$year_month[1]}}">መስከረም</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month2" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[2]}}">ጥቅምት</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month3"  data-toggle="tab" href="#" role="tab" data-month="{{$year_month[3]}}">ህዳር</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month4" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[4]}}">ታህሳስ</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month5" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[5]}}">ጥር</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month6" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[6]}}">የካቲት</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month7" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[7]}}">መጋቢት</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month8" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[8]}}">ሚያዚያ</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month9" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[9]}}">ግንቦት</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month10" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[10]}}">ሰኔ</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month11" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[11]}}">ሃምሌ</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month12" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[12]}}">ነሃሴ</a>
                </li>

                <li class="nav-item ethio-month">
                    <a class="nav-link  text-bold " id="ethio_month13" data-toggle="tab" href="#" role="tab" data-month="{{$year_month[13]}}">ጷግሜ</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content text-center">
                <div class="tab-pane active" id="">

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p id="current_year_month" hidden>{{$current_year_month}}</p>

                    {{-- <span id="warning" class="badge badge-pill badge-primary">NOT</span> --}}
                        
                    
                    {{-- <table class="table table-bordered table-striped" id="view_attendance_for_parent_table_this_month">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center" >
                                    <h5 id="student_attendance_table_header_this_month" class="text-primary"></h5>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">
                           
                            @foreach ($current_month_attendance_data as $row)
                            <tr>
                                <td>{{$row->date}}</td>
                                <td>{{$row->status}}</td>
                            </tr>
                        @endforeach

                      
                        </tbody>
                    </table> --}}

                    <table class="table table-bordered table-striped" id="view_attendance_for_parent_table">
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center" >
                                    <h5 id="student_attendance_table_header" class="text-primary"></h5>
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    


@endsection