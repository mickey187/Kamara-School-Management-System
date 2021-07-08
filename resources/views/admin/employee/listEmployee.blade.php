@extends('layouts.master')
@section('content')


<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Employee List</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">
 <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full name</th>
                    <th>Sex</th>
                    <th>Job Position</th>
                    <th>Hired Date</th>
                    <th>Hire Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emp_list as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->first_name.' '.$row->middle_name.' '.$row->last_name}}</td>
                        <td>{{$row->gender}}</td>
                        <td>{{$row->position_name}}</td>
                        <td>{{$row->hired_date}}</td>
                        <td>{{$row->hire_type}}</td>
                    
                         <td>
                        <button type="button" class="btn bg-orange btn-sm"><i class="fa fa-eye"></i></button>
                        <a href="{{ url('edit_employee/'.$row->id) }}" type="button" class="btn bg-blue btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="{{url('delete_employee/'.$row->id)}}" type="buttton"  class="btn bg-danger btn-sm"><i class="fa fa-trash"></i></a>
                        
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div> 
    </section>
</div>
</div>    
@endsection
