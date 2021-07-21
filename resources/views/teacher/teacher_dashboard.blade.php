@extends('teacher.teacher_master')
@section('content_teacher')

{{-- <H3>Hellow Teacher</H3> --}}
{{-- @foreach ($employee as $row)
   Name: <label> {{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }}</label>
@endforeach --}}
<hr>
<div class="col-12 row" id="dashboard">
    <div class="col-lg-3">
        <a style="cursor: pointer;" onclick="getHomeRoom1();">
            <div class="small-box bg-primary">
                <div class="inner p-3">
                  <p>My Students</p><br>
                </div>
                <div class="icon"><br>
                  <i class="fas fa-users"></i>
                </div>
                <a  class="small-box-footer"
                       >More info
                        <i class="fas fa-arrow-circle-right"></i></a>
              </div>
        </a>
    </div>
    <div class="col-lg-3">
        <a style="cursor: pointer;" onclick="getHomeRoom('{{ $employee->id }}');" >
            <div class="small-box bg-info">
                <div class="inner p-3">
                  <p>Home Room</p><br>
                </div>
                <div class="icon"><br>
                  <i class="fas fa-home"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
        </a>
    </div>
    <div class="col-lg-3">
        <a style="cursor: pointer;" onclick="getCourseLoad('{{ $employee->id }}');" >
            <div class="small-box bg-red">
                <div class="inner p-3">
                  <p>Course Load</p><br>
                </div>
                <div class="icon"><br>
                  <i class="fas fa-book"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
        </a>
    </div>
    <div class="col-lg-3">
        <a href="#" data-toggle="modal"
                    data-detail3="Profile,{{ $employee->id }}"
                    data-target="#modal-dashboard">
            <div class="small-box bg-green">
                <div class="inner p-3">
                  <p>Profile</p><br>
                </div>
                <div class="icon"><br>
                  <i class="fas fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </a>
    </div>
</div>


<!-- /.modal-dialog -->
<div class="modal_class">
    <div class="modal fade" id="modal-dashboard">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <section class="content"> --}}
                    <div class="row col-lg-12 text-center" id="classes">

                    </div>
                    {{-- </section> --}}
                    <br><br>
                    <div class="modal-footer justify-content-between">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
