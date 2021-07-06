@extends('layouts.master')

@section('content')

<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> View Stream</h3>
  </div>
  <div class="card-body">
    <section class="content">
        <div class="container-fluid mt-3">
    
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>stream_type</th> 
                  <th>action</th>             
                  
                </tr>
                </thead>
                <tbody>
                    @foreach ($streams as $row)
                        
                    
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->stream_type}}</td>   
                  <td>
                    <button class="btn btn-success btn-sm"
                    data-toggle="modal" 
                   data-target="#view_stream" 
                    data-view_stream="{{$row->id}},{{$row->stream_type}}">
                     <i class="fa fa-eye" aria-hidden="true"></i>
                   
                   </button>
                   
                   <a name="edit_ubject" id="" class="btn btn-info btn-sm" href="{{ url('editsubject/'.$row->id) }}" role="button"> 
                   <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>

                   <button class="btn btn-danger btn-sm" data-toggle="modal" 
                   data-target="#delete_stream" 
                    data-delete_stream="{{$row->id}},{{$row->stream_type}}">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    
                  </button>
                  </td>           
                  
                </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th>id</th>
                    <th>stream_type</th>               
                    
                </tr>
                </tfoot> --}}
            </table>

            <div class="modal fade" id="view_stream" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Class Labels  git is a monster</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="stream_id"></p>
                    <p id="stream_type"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="delete_stream" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="stream_id_delete"></p>
                    <p id="stream_type_delete"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancel_delete_class_label" data-dismiss="modal">Cancel</button>
                    <form action="{{url('/deletestream')}}" method="POST">
                      @csrf

                    <button type="submit" class="btn btn-danger" id="delete_stream_id" name="delete_stream_btn">Delete</button>
                   
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