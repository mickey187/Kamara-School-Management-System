@extends('layouts.master')
@section('content')

<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> View Payment Load</h3>
  </div>
  <div class="card-body">
    <section class="content">
        <div class="container-fluid mt-3">
    
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Payment Type</th>  
                  <th>Class Label</th>                   
                  <th>Amount in Birr</th>  
                  <th>Action</th>  
                                                                                        
                </tr>
                </thead>
                <tbody>
                    @foreach ($payment_load as $row)                                            
                <tr>
                  <td>{{$row->load_id}}</td> 
                  <td>{{$row->payment_type}}</td>                   
                  <td>{{$row->class_label}}</td>    
                  <td>{{$row->amount}}</td>     
                              
                  <td>

                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view_class_label" data-view_class_label="">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>

                    <a name="edit_class_label" id="" class="btn btn-info btn-sm" href="" role="button"> 
                      <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_class_label" data-delete_class_label="">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                  </td>  
                                                                                                                                                
                </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>        
                  <th>id</th>             
                  <th>class label</th>   
                  <th>stream</th>                 
                  <th>action</th>                                                                                
                </tr>
                </tfoot> --}}
            </table>


            <div class="modal fade" id="view_class_label" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Class Label</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="class_label_id"></p>
                    <p id="class_label_name"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="delete_class_label" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="class_label_id_delete"></p>
                    <p id="class_label_name_delete"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancel_delete_class_label" data-dismiss="modal">Cancel</button>
                    <form action="{{url('/deleteclasslabel')}}" method="POST">
                      @csrf

                    <button type="submit" class="btn btn-danger" id="delete_class_label_btn" name="delete_btn">Delete</button>
                   
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