@extends('layouts.master')

@section('content')



<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> View Subjects</h3>
  </div>
  <div class="card-body">
    <section class="content">
        <div class="container-fluid mt-3">
    
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
  </div


@endsection