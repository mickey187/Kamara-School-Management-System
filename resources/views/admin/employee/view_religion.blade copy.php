@extends('layouts.master')

@section('content')

<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> View Religion</h3>
  </div>
  <div class="card-body">
    <section class="content">
        <div class="container-fluid mt-3">
    
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Religion Name</th>              
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($view_religion as $row)                                           
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->religion_name}}</td>
                  <td>
                
                    <button class="btn btn-success btn-sm" 
                    data-toggle="modal" 
                    data-target="#view_religion" 
                    data-religion="{{$row->id}},{{$row->religion_name}}">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>

                     <a href="{{ url('editReligion/'.$row->id) }}" type="button" class="btn bg-blue btn-sm"><i class="fa fa-pen"></i></a>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_religion" data-role_delete="{{$row->id}},{{$row->religion_name}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                
                </td>              
                                                
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Religion Name</th>    
                    <th>Action</th>               
                    
                </tr>
                </tfoot>
            </table>



            <div class="modal fade" id="view_religion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Religion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="religion_id"></p>
                    <p id="religion_name"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="delete_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Religion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="religion_id_delete"></p>
                    <p id="religion_name_delete"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancel_delete_religion" data-dismiss="modal">Cancel</button>
                    <form action="{{url('/delete_religion')}}" method="get">
                      @csrf

                    <button type="submit" class="btn btn-danger" id="delete_religion_btn" name="delete_btn">Delete</button>
                   
                  </form>
                  </div>
                </div>
              </div>
            </div>
                
        </div>
          
        
    </section>
    
  </div>
  </div


@endsection