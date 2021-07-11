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
                        <button  class="btn btn-success btn-sm" 
                        data-target="#modal_view_employee" 
                        data-toggle="modal"
                        data-employee_data="{{$row->id}},{{$row->first_name.' '.$row->middle_name.' '.$row->last_name}},{{$row->position_name}}">
                        <i class="fa fa-eye" aria-hidden="true"></i></button>

                        <a href="{{ url('edit_employee/'.$row->id) }}" type="button" class="btn bg-blue btn-sm"><i class="fa fa-pen"></i></a>

                         <button class="btn btn-danger btn-sm" data-toggle="modal" 
                            data-target="#delete_employee" 
                            data-detail=""
                            data-delete_employee_data="{{$row->id}},{{$row->first_name.' '.$row->middle_name.' '.$row->last_name}},
                            {{$row->position_name}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            
                   </button>
                    <!-- <a name="delete_employee" id="" class="btn btn-danger btn-sm" href="#" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                 

                        <!-- <a href="{{url('delete_employee/'.$row->id)}}" type="buttton"  class="btn bg-danger btn-sm"><i class="fa fa-trash"></i></a> -->
                     
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

      
                 
                  <div class="modal fade" id="modal_view_employee">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">View Employee</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p id="id"></p>
                          <p id="full_name"></p>            
                          <p id="job_position_view"></p>
                        
                          
                          
                         
                        </div>
                        
                        <div class="modal-footer justify-content-between">
                          
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>  -->
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="post" class="btn btn-success" id="#ok" data-dismiss="modal" >
                            Ok</button>
                          
                          
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                </div>


                <div class="modal_delete">
              <div class="modal fade" id="delete_employee">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header"> 
                      <h4 class="modal-title">Delete Employee</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                          <p id="ident"></p>
                          <p id="employee_name"></p>            
                          <p id="employee_job_position"></p>
                      
                      
                      <span id="1" class="badge badge-primary"></span>
                    </div>
                    <form action="{{url('/removeEmployee($id)')}}" method="get">
                      @csrf
                    <div class="modal-footer justify-content-between">
                      
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="get" class="btn btn-danger" name="delete" id="#3">
                        Delete Employee</button>
                      </form>
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            
              </div>

            
    </div> 
    </section>
</div>
</div>    
@endsection
