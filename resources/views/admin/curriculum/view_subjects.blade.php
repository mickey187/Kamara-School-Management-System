@extends('layouts.master')

@section('content')



<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> View Subjects</h3>
  </div>



  <div class="card-body">

    <div class="col-xs-12 col-lg-12 col-sm-12 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-Subject-tab" data-toggle="tab" href="#nav-Subject" role="tab" aria-controls="nav-Subject" aria-selected="true">Subject</a>
            <a class="nav-item nav-link" id="nav-Subject-group-tab" data-toggle="tab" href="#nav-Subject-group" role="tab" aria-controls="nav-Subject-group" aria-selected="false">Subject Group</a>
            <a class="nav-item nav-link" id="nav-Subject-period-tab" data-toggle="tab" href="#nav-Subject-period" role="tab" aria-controls="nav-Subject-period" aria-selected="false">Subject Period</a>
          </div>
        </nav>
        <div class="col-12 tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="col-12 tab-pane fade show active" id="nav-Subject" role="tabpanel" aria-labelledby="nav-Subject-tab">
                <section class="content">
                    <div class="container-fluid mt-3" id="subject_table">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>id</th>
                              <th>subject name</th>
                              <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject_list as $row)

                            <tr>
                              <td>{{$row->id}}</td>
                              <td>{{$row->subject_name}}</td>



                              <td>
                                <button class="btn btn-success btn-sm"
                                 data-toggle="modal"
                                data-target="#modal_view"
                                 data-view="{{$row->id}},{{$row->stream_type}},{{$row->subject_name}}">
                                  <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                                <a name="edit_ubject" id="" class="btn btn-info btn-sm" href="{{ url('editsubject/'.$row->id) }}" role="button">
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>

                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#modal_default"
                                 data-detail="{{$row->id}},{{$row->subject_name}}">
                                 <i class="fa fa-trash" aria-hidden="true"></i>

                               </button>
                                {{-- <a name="delete_subject" id="" class="btn btn-danger btn-sm" href="#" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a> --}}
                              </td>



                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>id</th>
                               <th>subject name</th>
                                <th>action</th>

                            </tr>
                            </tfoot>
                        </table>

                        <div class="modal_delete">
                          <div class="modal fade" id="modal_default">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Delete Subject</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p id="subjectid"></p>

                                  <p id="subjectname"></p>


                                  <span id="1" class="badge badge-primary"></span>
                                </div>
                                <form action="{{url('/deletesubject')}}" method="post">
                                  @csrf
                                <div class="modal-footer justify-content-between">

                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                  <button type="post" class="btn btn-danger" name="delete" id="#2">
                                    Delete Subject</button>
                                  </form>

                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->

                          </div>


                            <div class="view">
                              <div class="modal fade" id="modal_view">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">View Subject</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p id="subjectid_view"></p>
                                      <p id="subjectname_view"></p>


                                      <span id="1" class="badge badge-primary"></span>
                                    </div>

                                    <div class="modal-footer justify-content-between">

                                      {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> --}}
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                      <button type="post" class="btn btn-success" id="#ok" data-dismiss="modal" >
                                        Ok</button>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                            </div>
                          </div>
                    </div>
                </section>
            </div>
            <div class="col-12 tab-pane fade show active" id="nav-Subject-group" role="tabpanel" aria-labelledby="nav-Subject-group-tab">
                <div class="mr-1">
                    <input type="button" class="btn btn-primary" id="swapTableWithDiv" value="Assign Subject Group">
                    <section>
                        <hr>
                        <div class="row col-12">
                            <div class="col-8">
                                <div class="card"  id="class_list">
                                    <div class="card-header">Classes</div>
                                    <div class="card-body">
                                        @foreach ($classes as $class)
                                        <label class="PillList-item">
                                            <input id="selectedSection" type="checkbox" name="class" value="{{ $class->id }}">
                                            <span class="PillList-label" >{{ $class->class_label }}
                                            <span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>
                                            </span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="card" id="subject_list">
                                    <div class="card-header">Subjects</div>
                                    <div class="card-body">
                                        @foreach ($subjects as $subject)
                                        <label class="PillList-item ">
                                            <input id="selectedSection" type="checkbox" name="subject" value="{{ $subject->id }}">
                                            <span class="PillList-label" >{{ $subject->subject_name }}
                                            <span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>
                                            </span>
                                        </label>
                                        @endforeach
                                    </div>
                                    <input class="btn btn-primary" id="addSubjectToClass" type="button" value="Add Subject">
                                </div>
                            </div>
                            <div class="col-4" id="subject_group_list">
                                <div class="card">
                                    <div class="card-header">
                                        Assign Subjects
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid mt-3" id="subject_table">
                                            <table id="example11" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Grade</th>
                                                        <th>Subject</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="subjectGroupBody">

                                                    @foreach ($subject_group as $group)
                                                        <tr>
                                                            <td></td>
                                                            <td>{{  $group->class_label }}</td>
                                                            <td>{{  $group->subject_name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                </div>
            </div>
            <div class="col-12 tab-pane fade show active" id="nav-Subject-period" role="tabpanel" aria-labelledby="nav-Subject-period-tab">

            </div>
        </div>
    </div>



  </div>
  </div


@endsection
