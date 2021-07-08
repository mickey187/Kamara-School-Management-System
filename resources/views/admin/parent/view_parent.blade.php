@extends('layouts.master')
@section('content')
<div class="card card-orange ">
    <div class="card-header">
    <h3 class="card-title text-white"> <i class="nav-icon fas fa-users"></i> Parent List</h3>
    </div>
    <div class="card-body ">
        <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full name</th>
                    <th>Sex</th>
                    <th>Relation</th>
                    <th>Priority</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parent_list as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->first_name.' '.$row->middle_name.' '.$row->last_name}}</td>
                        <td>{{$row->gender}}</td>
                        <td>{{$row->relation}}</td>
                        <td>{{$row->school_closur_priority}}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone_number }}</td>
                        <td>
                            <button type="button" class="btn bg-green btn-sm"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn bg-primary btn-sm"><i class="fa fa-pen"></i></button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    <!-- /.card-body -->
    </div>
</div>
@include('sweetalert::alert')
@endsection
