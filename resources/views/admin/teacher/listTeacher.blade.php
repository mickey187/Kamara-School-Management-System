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
                         <td>
                        <button type="button" class="btn bg-orange btn-sm"><i class="fa fa-eye"
                            data-toggle="modal"
                            data-target="#modal-teacher"
                            data-teacher="
                                        {{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }},
                                        {{ $row->id }},"
                                        ></i></button>
                        <a href="{{ url('edit_teacher/'.$row->id) }}" type="button" class="btn bg-blue btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="{{ url('delete_teacher/'.$row->id)}}" type="button" class="btn bg-danger btn-sm"><i class="fa fa-trash"></i></a>
                        <a href="{{ url('teacher_classes/'.$row->id)}}" type="button" class="btn bg-primary btn-sm"></i>classes</a>
                    </td>
                         </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
</div>
</section>
</div>
</div>
  <div>
    <div class="modal_teacher">
        <div class="modal fade" id="modal-teacher">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Teacher</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
                <div class="modal-body">
                    <div><p id="id" ></p></div>
                    <div><p id="full_name" ></p></div>
                    <span id="1" class="badge badge-primary"></span>
                </div>

                  <div class="modal-footer justify-content-between">
                    <p id="id"></p>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                    </div>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->

            </div>
  </div>

@endsection
