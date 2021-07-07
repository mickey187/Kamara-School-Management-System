@extends('layouts.master')
@section('content')
{{-- https://peggyfoundation.org/wp-content/uploads/2015/10/PersonPlaceholder-01.png' --}}
<br>
<div class="callout callout-info ">
    <div class="row">
        <div class="col-lg-3" style="max-width: 18%;">
        <div class="col-lg-12 col-sm-12">
                <div class=" col-lg-12 col-md-6 col-sm-6 form-group">
                    @if ($student->image)
                    <img src="{{ asset('storage/student_image/'.$student->image)}}" {{-- alt="{{ $student->image }}"  --}} id="dsp-pro" class="img-fluid img-thumbnail" style="height: 210px;" alt="">
                    @else
                    <img src="{{ asset(' https://peggyfoundation.org/wp-content/uploads/2015/10/PersonPlaceholder-01.png')}}" id="dsp-pro" class="img-fluid img-thumbnail" style="height: 210px;" alt="">
                    @endif
                </div>
        </div>
    </div>
    <div class="col-lg-9"><br>
        <h5><i class="fas fa-info"></i> Student Information</h5>
        <label>  ID </label><span>{{ ' KA/'.$student->student_id }}</span><br>
        <label>NAME </label> <span>{{ $student->first_name.' '.$student->middle_name.' '.$student->last_name }}</span><br>
        <label>Grade </label>
        <span>
            @if (isset($class))
                <span>{{ $class->class_label." Section ".$section->section }}</span><br>
            @else
                <span> Not Set</span><br>
            @endif
        </span><br>
    </div>


</div>
</div>
<div class="card card-orange card-sm">
    <div class="card-header header-sm ">
        <h3 class="card-title text-white"> <i class="nav-icon fas fa-users"></i> Parent List </h3>

        <a href="{{ url('newParent/'.$student->id) }}" type="button" class="float-right btn btn-secondary text-white btn-sm">
            Add parent </a>

    </div>
    <div class="card-body ">
        <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full name</th>
                    <th>Sex</th>
                    <th>Relation</th>
                    <th>Phone</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($parent_list as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->relation }}</td>
                        <td>{{ $row->phone_number }}</td>
                        <td>{{ $row->school_closur_priority }}</td>
                        <td>
                            <a type="button" class="btn bg-green btn-sm"
                            data-toggle="modal"
                            data-target="#modal-parent"
                            data-detail2="
                                        {{ $row->first_name.' '.$row->middle_name.' '.$row->last_name }},
                                        {{ $row->id }},
                                        {{ $row->gender }},
                                        {{ $row->relation }},
                                        {{ $row->school_closur_priority }},
                                        {{ $row->emergency_contact_priority }}
                             "><i class="fa fa-eye"></i></a>
                            <a href="#" type="button" class="btn bg-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-phone"></i></a>
                            <a href="#" type="button" class="btn bg-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-envelope"></i></a>
                            <a href="{{ url('updateParent/'.$row->id) }}" type="button" class="btn bg-primary btn-sm"><i class="fa fa-pen"></i></a>
                            <a href="{{ url('delete_parent/'.$row->id) }}" type="button" class=" btn bg-danger btn-sm "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>


                    @endforeach

            </tbody>
        </table>
    <!-- /.card-body -->
    </div>
</div>


<div class="modal fade card-outline " id="modal-parent">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
            <div class="card-header  bg-primary">
                <h3 class="card-title">Parent Details</h3>
            </div>
            <div class="modal-body">
                <h3 class="profile-username text-center" id="full_name"></h3>
                <p class="text-muted text-center" id="gender">Gender</p>
                <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>ID</b> <p id="id" class="">Not Set</p>
                        </li>
                        <li class="list-group-item">
                        <b>Relation</b> <p id="relation" class="">Not Set</p>
                        </li>
                        <li class="list-group-item">
                        <b>Priority</b> <p id="priority" class="">Not Set</p>
                        </li>
                        <li class="list-group-item">
                        <b>Phone</b> <p id="phone" class="">Not Set</p>
                        </li>
                </ul>
            </div>
        <div class="modal-footer">
                <button href="" class=" btn bg-primary btn-sm"> More</button>
                <button href="" type="button" class="btn bg-primary btn-sm"><i class="fa fa-pen "></i></button>
            <button type="close" data-dismiss="modal" class="btn btn-secondary float-right" name="delete" id="#2">Close</button>

        </div>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>

@endsection
