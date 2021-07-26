@extends('layouts.master')
@section('content')


<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Teacher List</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">

 <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>full name</th>
                    <th>field of study</th>
                    <th>place of study</th>
                    <th>year of study</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teach_list as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->first_name.' '.$row->middle_name.' '.$row->last_name}}</td>
                        <td>{{$row->field_of_study}}</td>
                        <td>{{$row->place_of_study}}</td>
                        <td>{{$row->date_of_study}}</td>
                         <td>
                        <button type="button" class="btn bg-primary btn-sm"
                            data-toggle="modal"
                            data-target="#modal-teacher"
                            data-teacher="
                                        {{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }},
                                        {{ $row->id }}
                                        ">
                                        <i class="fa fa-pen">Assign Classes</i></button>
                            <button type="button" class="btn bg-primary btn-sm"
                                data-toggle="modal"
                                data-target="#modal-teacher-home-room"
                                data-teacher2="
                                {{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }},
                                {{ $row->id }}
                                "
                            ><i class="fa fa-pen">Assign Home Room</i></button>
                        {{-- <a href="{{ url('edit_teacher/'.$row->id) }}" type="button" class="btn bg-blue btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="{{ url('delete_teacher/'.$row->id)}}" type="button" class="btn bg-danger btn-sm"><i class="fa fa-trash"></i></a> --}}
                    </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
</div>
</section>
</div>
</div>
    <div class="modal_teacher">
        <div class="modal fade " id="modal-teacher">
          <div class="modal-dialog modal-lg">
            <div class="modal-content ">
              <div class="modal-header">
                <h4 class="modal-title">Assign Classes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X
                </button>
              </div>
              <div class="modal-body col-12">
                <div class="row col-12 form-group">
                    <div class="col-1 text-lg float-right"><label>Name</label> </div>
                    <div class="col-4 float-left"><h3 class="text-lg" id="full_name" ></h3></div>
                    <div id="teacher_id" class="float-left" hidden ><h3 class="text-lg" id="id" ></h3></div>
                </div>
                   {{-- <p class="text-primary float-left" type="button"  onclick="unhide();"><i class="fas fa-arrow-alt-circle-down"></i></p> --}}
                <div style="display: block" id="add_mode">
                    <div class=" row col-12">
                        <div class="col-5">
                            Assign Class
                            <div class="col-12">
                                    <div class="form-group">
                                        <select class=" form-control"name="class" id="singleClassId" >
                                            @foreach ( $class as $row )
                                                <option value="{{ $row->id }}">{{ $row->class_label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="col-5">
                            Assign Subject
                            <div class="form-group">
                                <select class="form-control" id="selectedSubject" >
                                    @foreach ( $subject as $row )
                                        <option value="{{ $row->id }}">{{ $row->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" col-2"><br>
                            <div class="form-group">
                                <input type="button" class="btn btn-primary form-control" value="Add" id="assignTeacherToClsss">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12" id="listOfsections">
                            </div>
                        </div>

                    </div>
                </div>
                {{-- <p class="text-primary float-left" type="button"  onclick="colapse();"><i class="fas fa-arrow-alt-circle-up"></i></p> --}}
                <div class="col-4 text-lg float-left">Teacher Classes </div>

                <div class="row col-12 form-group">
                    <div class="col-12 float-left" >
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <th>Grade</th>
                                <th>Section</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="courseLoad">
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->

            </div>
        </div>
    </div>



    {{-- HOome Room --}}

    <div class="modal_teacher2">
        <div class="modal fade " id="modal-teacher-home-room">
          <div class="modal-dialog modal-lg">
            <div class="modal-content ">
              <div class="modal-header">
                <h4 class="modal-title">Home Room</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X
                </button>
              </div>
              <div class="modal-body col-12">
                <div class="row col-12 form-group">
                    <div class="col-1 text-lg float-right"><label>Name</label> </div>
                    <div class="col-4 float-left"><h3 class="text-lg" id="full_name" ></h3></div>
                    <div id="teacher_id2" class="float-left" hidden ><h3 class="text-lg" id="id" ></h3></div>
                    <div id="teacher_id3" class="float-left" hidden ><h3 class="text-lg" id="section" ></h3></div>
                    <div id="teacher_id4" class="float-left" hidden ><h3 class="text-lg" id="stream" ></h3></div>

                </div>
                <div style="display: block" id="add_mode">
                    <div class=" row col-12">
                        <div class="col-5">
                            Assign Class
                            <div class="col-12">
                                    <div class="form-group">
                                        <select class=" form-control"name="class" id="singleClassId2" >
                                            @foreach ( $class as $row )
                                                <option value="{{ $row->id }}">{{ $row->class_label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                        {{-- <div class="col-5">
                            Assign Subject
                            <div class="form-group">
                                <select class="form-control" id="selectedSubject2" >
                                    @foreach ( $subject as $row )
                                        <option value="{{ $row->id }}">{{ $row->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class=" col-2"><br>
                            <div class="form-group">
                                <input type="button" class="btn btn-primary form-control" value="Add" id="assignTeacherHomeRoom">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12" id="listOfsections2">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-4 text-lg float-left">Home Room</div>

                <div class="row col-12 form-group">
                    <div class="col-12 float-left" >
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <th>Grade</th>
                                <th>Section</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="homeroom">
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>


@endsection
