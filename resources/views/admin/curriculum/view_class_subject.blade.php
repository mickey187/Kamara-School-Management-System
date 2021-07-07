@extends('layouts.master')

@section('content')

<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> View Class</h3>
  </div>
  <div class="card-body">
    <section class="content">
        <div class="container-fluid mt-3">
   
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Class Label</th>  
                  <th>Stream</th>                
                  <th>Subject</th>
                  
                  <th>Action</th>                                                      
                </tr>
                </thead>
                <tbody>
                  @foreach ($class_data as $row )
                    <tr>
                      <td>{{$row->class_label}}</td>
                      <td>{{$row->stream_type}}</td>
                      <td>{{$row->subject_name}}</td>
                      
                      <td>
                        <button class="btn btn-success btn-sm"
                        data-toggle="modal" 
                       data-target="#modal_view_cls" 
                        data-view="{{$row->cls_sub_id}},{{$row->class_label}},{{$row->subject_name}}">
                         <i class="fa fa-eye" aria-hidden="true"></i>
                       
                       </button>
                       
                       <a name="edit_ubject" id="" class="btn btn-info btn-sm" href="{{url('editClassSubject/'.$row->cls_sub_id.'/'.$row->sub_id)}}" role="button"> 
                       <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
   
                       <button class="btn btn-danger btn-sm" data-toggle="modal" 
                       data-target="#modal_delete_cls" 
                        data-delete="{{$row->cls_sub_id}},{{$row->class_label}},{{$row->subject_name}}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        
                      </button>
                      </td>

                      
                    </tr>
                  @endforeach

                 
                    
                   
            </tbody>
            {{-- <tfoot>
                <tr>                    
                    <th>Class Label</th>                    
                    <th>Subject</th>
                    <th>Stream</th>
                    <th>Action</th>                                                           
                </tr>
                </tfoot> --}}
            </table>
               
                  <div class="modal fade" id="modal_view_cls">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">View Subject</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p id="id_view"></p>
                          <p id="class_label_view"></p>            
                          <p id="subject_view"></p>
                          <p id="stream_view"></p>
                          
                          
                          
                        </div>
                        
                        <div class="modal-footer justify-content-between">
                          
                          
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="post" class="btn btn-success" id="#ok" data-dismiss="modal" >
                            Ok</button>
                          
                          
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                </div>


                <div class="modal fade" id="modal_delete_cls">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header"> 
                        <h4 class="modal-title">Delete Class Subject</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                        <p id="id_delete"></p>                   
                        <p id="class_label_delete"></p>            
                          <p id="subject_delete"></p>
                          <p id="stream_delete"></p>
                      </div>
                      
                      <div class="modal-footer justify-content-between">
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <form action="{{url('/delete_class_subject')}}" method="POST">
                          @csrf
                        <button type="submit" class="btn btn-danger" name="cls_subject" id="#delete_class_subject">
                          Delete Class Subject </button>
                        </form>
                        
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>

              
                
        
          
        
    </section>
    
  </div>
  </div


@endsection