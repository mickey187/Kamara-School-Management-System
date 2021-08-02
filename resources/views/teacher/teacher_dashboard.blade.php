@extends('teacher.teacher_master')
@section('content_teacher')

{{-- <H3>Hellow Teacher</H3> --}}
{{-- @foreach ($employee as $row)
   Name: <label> {{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }}</label>
@endforeach --}}

<div class="row card  d-flex justify-content-center  ">
    <div class="card-header bg-orange "><label class="text-white text-lg" id="teacherDashboardTitle">Dashboard</label> <div id="generator" class="float-right"></div></div>
<div class="d-flex justify-content-center ">
<div class="col-12 row " id="dashboard">
    <div class="col-lg-3" style="margin-top: 20px;">
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
    <div class="col-lg-3" style="margin-top: 20px;">
        <a style="cursor: pointer;" onclick="getHomeRoom('{{ $employee->id }}');" >
            <div class="small-box bg-primary">
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
    <div class="col-lg-3" style="margin-top: 20px;">
        <a style="cursor: pointer;" onclick="getCourseLoad('{{ $employee->id }}');" >

            <div class="small-box bg-primary">
                <div class="inner p-3">
                  <p>My Classes</p><br>
                </div>
                <div class="icon"><br>
                  <i class="fas fa-book"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
        </a>
    </div>
    <div class="col-lg-3" style="margin-top: 20px;">
        <a href="#" data-toggle="modal"
                    data-detail3="Profile,{{ $employee->id }}"
                    data-target="#modal-dashboard">
            <div class="small-box bg-primary">
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
                        <p id="full_name"></p>
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


<div class="modal fade" id="modal-editMark" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div id="title">Edit Mark List</div>
          <button type="button" onclick="closer()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <div id="modal_body"></div> --}}
            <div class="row col-12 form-group">
                <div class="col-4">
                    <label>Assasment</label>
                    <input type="text" disabled class="form-control" id="assasment">
                </div>
                <div class="col-4">
                    <label>Mark</label>
                    <input type="text"  class="form-control" id="mark">
                </div>
                <div class="col-4">
                    <label>Test Load</label>
                    <input type="text"  class="form-control" id="load">
                    <input type="text" hidden class="form-control" id="aid">
                    <input type="text" hidden class="form-control" id="fullname">
                    <input type="text" hidden class="form-control" id="subject">
                    <input type="text" hidden class="form-control" id="total">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="closer()" class="btn btn-secondary" data-dismiss="modal-editMark">Close</button>
          <button type="button" onclick="saveEditedValue()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- /.modal-dialog -->
<div class="modal_class">
    <div class="modal fade" id="modal-addMarkList">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="title">Add Mark List</h4>
                    <button type="button" onclick="closeAddMl()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row col-12 form-group">
                        <div class="col-4">
                            <label>Assasment</label>
                            <select  class="form-control" id="assasment2">
                                @foreach ($assasment as $row)
                                    <option value="{{ $row->id }}">{{ $row->assasment_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Mark</label>
                            <input type="number"  class="form-control" id="mark2">
                        </div>
                        <div class="col-4">
                            <label>Test Load</label>
                            <input type="number"  class="form-control" id="load2">
                            <input type="text" hidden class="form-control" id="class">
                            <input type="text" hidden class="form-control" id="student">
                            <input type="text" hidden class="form-control" id="semister">
                            <input type="text" hidden class="form-control" id="subject">
                            <input type="text" hidden class="form-control" id="name2">
                            <input type="text" hidden class="form-control" id="term2">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="closeAddMl()" class="btn btn-secondary" data-dismiss="modal-editMark">Close</button>
                    <button type="button" onclick="sendMarkList()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.modal-dialog-Generate Excel File -->
<div class="modal_class">
    <div class="modal fade" id="modal-generate-excel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="title">Excel File Generator</h4>
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row col-12 form-group">
                        <div class="col-6">
                            <label>Assasment</label>
                            <select  class="form-control" id="generateAs">
                                @foreach ($assasment as $row)
                                    <option value="{{ $row->assasment_type }}">{{ $row->assasment_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label>Test Load</label>
                            <input type="Number"  class="form-control" id="courseExcel">
                            <input hidden type="text"  class="form-control" id="classExcel">
                            <input hidden type="text"  class="form-control" id="generateSub">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="generateMarkList()" class="btn btn-primary">Generate</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- import Excel file modal--}}
<div class="modal_class">
    <div class="modal fade" id="modal-import-excel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="title">Import Excel</h4>
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ url('importExcel') }}" method="POST" enctype="multipart/form-data">
                    <div class="row col-12 form-group">
                        {{-- @csrf --}}
                        {{-- <input type="text" name="_import" id="import"> --}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input hidden type="text" name="data" id="exportdata">
                        <div class="col-12">
                            <input id="input-id" name="exel" type="file" class="file"  data-allowed-file-extensions='["csv", "xlsx","xls"]'>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Promote Student Modal --}}
<div class="modal_class">
    <div class="modal fade" id="modal-promote-student">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="title">Promote Students</h4>
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row col-12 form-group">
                        <div class="col-12">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
