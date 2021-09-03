@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="card card-orange">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">

                <li class="nav-item">
                    <a class="nav-link active text-bold" data-toggle="tab" href="#add_class_label_tab" role="tab">Add Class Label</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bold" data-toggle="tab" href="#view_class_label_tab" role="tab" id="view_class_label_tab_link">View Class label</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bold" data-toggle="tab" href="#add_subject_tab" role="tab">Add Subject</a>
                </li>

                <li class="nav-item>">
                    <a class="nav-link text-bold" data-toggle="tab" href="#view_subject_tab" role="tab" id="view_subject_tab_link"> view subject </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bold" data-toggle="tab" href="#add_stream_tab" role="tab">Add stream</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bold" data-toggle="tab" href="#view_stream_tab" role="tab" id="view_stream_tab_link">View stream</a>
                </li>

            </ul>
        </div>
            <div class="card-body">
                <div class="tab-content text-center">
                    <div class="tab-pane active" id="add_class_label_tab" role="tabpanel">
                        
                        <div class="row d-flex justify-content-center mt-3">
                            <div class="col-6">
                             <div class="form-group">
                                    <label for="addClass">Add Class Label</label>
                                     <input type="text" name ="class_label" class="form-control" id="class_label" placeholder="Class label"
                                        @if (isset($class_label))
                                        value="{{$class_label->class_label}}"

                                        @endif  >

                                        @if ($errors->any())
                                        
                                            <div class="alert alert-danger">
                                                <ul>
                                                @foreach ($errors->get('class_label') as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                </div>

                <div class="col-6">
                <div class="form-group">
                    <label for="addPriority">Add Priority</label>
                    <input type="number" name ="class_priority" min="1" max="15" class="form-control" id="priority" placeholder="priority" >

                    @if ($errors->any())
                
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->get('class_priority') as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>
                  @endif

                  </div>
              </div>

                      <div class="form-group">
                     <button type="button" class="btn btn-primary btn-md btn-block" id="addClass">Submit</button>
                          </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="view_class_label_tab" role="tabpanel">
                        <p>View class</p>
                        <div class="row">
                            <div class="col-12">
                                <table id="view_class_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>class id</th>
                                            <th>Class name</th>
                                            <th>class priority</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                  </table>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="add_subject_tab" role="tabpanel">
                        <label for="">Add Subject</label>
                        <div class="row d-flex justify-content-center mt-3">
                            <div class="col-6">
                    <div class="form-group">
                       
                        <input type="text" name ="subject_name" class="form-control"  id="subject_name" placeholder="Subject Name"
                         @if (isset($editSubject))
                         value="{{$editSubject->subject_name}}"

                     @endif  >

                       @if ($errors->any())                  
                  
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->get('subject_name') as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>
                  @endif

                      </div>

                                <div class="form-group">
                                    <button type="button" name="" id="saveAllSubject" class="btn btn-primary btn-md btn-block mt-3">submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="view_subject_tab" role="tabpanel">
                        <p>View subject</p>
                        <div class="row">
                            <div class="col-12">
                                <table id="view_subject_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>subject ID</th>
                                            <th>subject Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        
                    </div>

                    <div class="tab-pane" id="add_stream_tab" role="tabpanel">
                        <div class="row d-flex justify-content-center mt-3">
                    <div class="col-6">
                    <div class="form-group">

                <label for="exampleFormControlInput1">Stream Name</label>
                <input type="text" name ="stream_type" class="form-control" id="stream_type" 
                placeholder="Stream Name"
                @if (isset($stream))
                  value="{{$stream->stream_type}}"
                @endif>

                @if ($errors->any())                  
                  
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->get('stream_type') as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>
                  @endif
              </div>

               <div class="form-group">
                       <button type="button" name="" id="addStreames" class="btn btn-primary btn-md btn-block mt-3">submit</button>
                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="view_stream_tab" role="tabpanel">
                        <p>View stream</p>
                        <div class="row">
                            <div class="col-12">
                                <table id="view_stream_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>stream ID</th>
                                            <th>stream Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>

             <div class="modal fade" id="view_class_label_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View class labe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="card" style="width: 28rem;">
                    <div class="card-body" id="card-register">
                        <h4 id="class_label_id_view" class="text-primary"></h4>
                        <h4 id="class_label_name_view" class="text-primary"></h4>
                        <h4 id="class_priority_view" class="text-primary"></h4>
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div> 
            
       <div class="modal fade" id="edit_class_label_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit class label</h5>
              
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-8">
                  <div class="form-group">

                <label for="class_label_edit"> Edit class</label>
                <input type="text" name="class_label" id="class_label_edit" class="form-control"  placeholder="class">
                
                <label for="priority_edit">edit priority</label>
                <input type="number" name="class_priority" id="priority_edit" class="form-control" placeholder="priority">
               </div> 
              </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_class_label_modal">Cancel</button>
              <button type="button" class="btn btn-info" id="save_changes_class_label">Save Changes</button>
            </div>      
        </div>
      </div>     
       </div> 

        <div class="modal fade" id="delete_class_label_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="class_label_id_delete"></p>
                    <p id="class_label_delete"></p>
                    <p id="class_priority_delete"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="cancel_delete_class_label" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete_class" name="delete_btn">Delete</button>
                </div>
            </div>
          </div>
         </div> 

        <div class="modal fade" id="view_subject_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View subject</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_register">
              <h5 class="text-primary" id="subject_id_view"></h5>
              <h5 class="text-primary" id="subject_name_view"></h5>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>   

      <div class="modal fade" id="edit_subject_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit subject</h5>
              
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-8">
                  <div class="form-group">

                <label for="edit_subject"> Edit religion</label>
                <input type="text" name="subject" id="edit_subject" class="form-control"  placeholder="subject">
               </div>
              </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_edit_subject_modal">Cancel</button>
              <button type="button" class="btn btn-info" id="save_changes_subject">Save Changes</button>
            </div>
          
        </div>
      </div>     
       </div>
      
        <div class="modal fade" id="delete_subject_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete subject </h5>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="text-primary" id="delete_subject_id"></h5>
              <h5 class="text-primary" id="delete_subject_name"></h5>
               
              </div>
        
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete_subject_modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="delete_subject">Delete subject</button>
         </div>
          </div>
        </div>
        </div>

         <div class="modal fade" id="view_streamm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View stream</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_register">
              <h5 class="text-primary" id="stream_id_view"></h5>
              <h5 class="text-primary" id="stream_name_view"></h5>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>   

      <div class="modal fade" id="edit_stream_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit stream</h5>
              
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-8">
                  <div class="form-group">

                <label for="edit_stream"> Edit religion</label>
                <input type="text" name="subject" id="edit_stream" class="form-control"  placeholder="stream">
               </div>
              </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_edit_stream_modal">Cancel</button>
              <button type="button" class="btn btn-info" id="save_changes_stream">Save Changes</button>
            </div>
          
        </div>
      </div>     
       </div>
      
        <div class="modal fade" id="delete_stream_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete stream </h5>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="text-primary" id="delete_stream_id"></h5>
              <h5 class="text-primary" id="delete_stream_name"></h5>
               
              </div>
        
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete_stream_modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="delete_stream">Delete stream</button>
         </div>
          </div>
        </div>
        </div>
     </div>
            

@endsection