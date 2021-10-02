@extends('layouts.master')
@section('content')

    <div class="card card-orange">
        <div class="card-header">
            <h1 class="card-title text-white"><i class="fas fa-id-card"></i> Generate Student ID </h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4" style="margin-top: 20px;">
                    <a  style="cursor: pointer;"
                    onclick="singleStudentIdBtn();"
                    data-toggle="modal"
                    data-card1="'+class_name+','+stream+','+section+','+teacher_id+'"
                    data-target="#idGeneratrModal"
                    >
                        <div class="small-box bg-primary">
                            <div class="inner p-3">
                              <p>Generate ID For Single Student</p><br>
                            </div>
                            <div class="icon" style="color:white"><br>
                                <i class="fas fa-id-card"></i>
                            </div>
                            <a  class="small-box-footer">
                                <i class="fas fa-id-card"></i>
                            </a>
                          </div>
                    </a>
                </div>
                <div class="col-4" style="margin-top: 20px;">
                    <a  style="cursor: pointer;"
                     onclick="singleClassIdBtn();"
                    data-toggle="modal"
                    data-card1="'+class_name+','+stream+','+section+','+teacher_id+'"
                    data-target="#idGeneratrModal"
                    >
                        <div class="small-box bg-primary">
                            <div class="inner p-3">
                              <p>Generate ID For Specific Classes</p><br>
                            </div>
                            <div class="icon" style="color:white"><br>
                                <i class="fas fa-id-card"></i>
                            </div>
                            <a  class="small-box-footer">
                                <i class="fas fa-id-card"></i>
                            </a>
                          </div>
                    </a>
                </div>
                <div class="col-4" style="margin-top: 20px;">
                    <a  style="cursor: pointer;"
                        onclick="idCardForAllClassBtn();"
                        data-toggle="modal"
                        data-card3=""
                        data-target="#idGeneratrModal"
                    >
                        <div class="small-box bg-primary">
                            <div class="inner p-3">
                              <p>Generate ID For All Classes</p><br>
                            </div>
                            <div class="icon" style="color:white"><br>
                                <i class="fas fa-id-card"></i>
                            </div>
                            <a  class="small-box-footer">
                                <i class="fas fa-id-card"></i>
                            </a>
                          </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="idGeneratrModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Generate ID</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div id="idGeneratPage">

                </div><br>
                <div id="idGeneratePageList">

                </div>
                <div id="idGeneratePageForClass" class="col-6 ">
                    <div class="m-2">
                        <select id="classForId" style="width: 100%;" class="form-control select2 ">
                            <option>Choose class</option>
                            @foreach ($class as $row)
                                <option value="{{ $row->id }}">{{ $row->class_label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-2">
                        <select id="streamForId" style="width: 100%;" class="form-control select2">
                            <option>Choose stream</option>
                            @foreach ($stream as $row)
                                <option value="{{ $row->id }}">{{ $row->stream_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-2">
                        <select id="sectionForId" style="width: 100%;" class="form-control select2">
                            <option value="Choose section">Choose section</option>
                        </select>
                    </div>
                    <div class="ml-2 mt-5" id="idBtnList">
                        <button id="generateIdForOneClassBtn" class="btn btn-disabled btn-secondary" disabled>Generate</button>
                        <button id="downloadIdForOneClassBtn" class="btn btn-disabled btn-secondary" disabled><i class="fa fa-download"></i>Download</button>
                    </div>
                </div>
                <div id="idGeneratePageForAllClass" class="row justify-content-center">

                    <div class="col-6" style="margin-top: 20px;">
                        <a  style="cursor: pointer;"
                            onclick="idCardForAllClass();"
                        >
                            <div class="small-box bg-primary">
                                <div class="inner p-3">
                                  <p id="title_for_spinner">Generate id for all student</p><br>
                                </div>
                                <div class="icon" style="color:white"><br>
                                    <i id="static_icon" class="fas fa-cogs"></i>
                                    {{-- <div class="fa-3x"> --}}
                                        <i id="anim_icon" style="display: none;" class="fas fa-cogs fa-spin"></i>
                                      {{-- </div> --}}
                                </div>
                                <a class="small-box-footer">
                                    <i class="fas fa-cogs"></i>
                                </a>
                              </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelIdGeneratingForAllClassBtn" class="btn btn-danger" >cancel</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
