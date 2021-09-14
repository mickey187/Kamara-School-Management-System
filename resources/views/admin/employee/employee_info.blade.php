@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="card card-orange">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">

                <li class="nav-item">
                    <a class="nav-link active text-bold" data-toggle="tab" href="#add_job_position_tab" role="tab" id="add_job_position_tab_link">Add job position</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bold" data-toggle="tab" href="#view_job_position_tab" role="tab" id="view_job_position_tab_link">View job position</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bold" data-toggle="tab" href="#add_religion_tab" role="tab" id="add_religion_tab_link">Add religion</a>
                </li>

                <li class="nav-item>">
                    <a class="nav-link text-bold" data-toggle="tab" href="#view_religion_tab" role="tab" id="view_religion_tab_link"> view religion </a>
                </li>
            </ul>
        </div>
            <div class="card-body">
                <div class="tab-content text-center">
                    <div class="tab-pane active" id="add_job_position_tab" role="tabpanel">
                        
                        <div class="row d-flex justify-content-center mt-3">
                            <div class="col-6">
                             <div class="form-group">
                                    <label for="exampleFormControlInput1">Position Name</label>
                                     <input type="text" name ="position_name" class="form-control" id="position_name" placeholder="position Name"
                                            @if (isset($edit_emp_position))
                                                    value="{{$edit_emp_position->position_name}}"
                                                @endif>

                                                <div  id="job_position_error_message">
                                                  
                                                </div>
                                </div>

                          <div class="form-group">
                         <button type="button" class="btn btn-primary btn-md btn-block" id="position_btn">Submit</button>
                          </div>
                            </div>
                        </div>
                    </div>

                       <div class="tab-pane" id="view_job_position_tab" role="tabpanel">
                        <p>View position</p>
                        <div class="row">
                            <div class="col-12">
                                <table id="view_position_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>position name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                         </div> 

                <div class="tab-pane" id="add_religion_tab" role="tabpanel">
                        <label for="">Add religion</label>
                        <div class="row d-flex justify-content-center mt-3">
                            <div class="col-6">
                    <div class="form-group">
                       
                        <input type="text"  name ="religion_name"  class="form-control"
                            id="religion_name"
                             @if (isset($edit_employee_religion))
                                value="{{$edit_employee_religion->religion_name}}"
                             @endif>

                        <div id="employee_religion_error_message">

                        </div>
                </div>

                <div class="form-group">
                     <button type="button" name="" id="religion_btn" class="btn btn-primary btn-md btn-block mt-3">submit</button>
                </div>
                            </div>
                        </div>
                    </div>

               <div class="tab-pane" id="view_religion_tab" role="tabpanel">
                        <p>View religion</p>
                        <div class="row">
                            <div class="col-12">
                                <table id="view_religion_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>religion ID</th>
                                            <th>religion Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>

             <div class="modal fade" id="view_job_position_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="card" style="width: 28rem;">
                    <div class="card-body" id="card-register">
                        <h4 id="position_id_view" class="text-primary"></h4>
                        <h4 id="position_name_view" class="text-primary"></h4>
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>

       <div class="modal fade" id="edit_job_position_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit job position</h5>
              
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-8">
                  <div class="form-group">

                <label for="job_position_edit"> Edit position</label>
                <input type="text" name="employee_position" id="job_position_edit" class="form-control"  placeholder="position">
               </div>
              </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_edit_job_position_modal">Cancel</button>
              <button type="button" class="btn btn-info" id="save_changes_position_name">Save Changes</button>
            </div>
          
        </div>
      </div>     
       </div>      

             <div class="modal fade" id="delete_position_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="position_id_delete"></p>
                    <p id="position_name_delete"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="cancel_delete_position" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delete_position" name="delete_btn">Delete</button>

                </div>
            </div>
          </div>
         </div> 
         
       <div class="modal fade" id="view_religion_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View religion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_register">
              <h5 class="text-primary" id="religion_id_view"></h5>
              <h5 class="text-primary" id="religion_name_view"></h5>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>   

      <div class="modal fade" id="edit_religion_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit employee religion</h5>
              
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-8">
                  <div class="form-group">

                <label for="religion_edit"> Edit religion</label>
                <input type="text" name="employee_religion" id="religion_edit" class="form-control"  placeholder="religion">
               </div>
              </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_edit_religion_modal">Cancel</button>
              <button type="button" class="btn btn-info" id="save_changes_religion_name">Save Changes</button>
            </div>
          
        </div>
      </div>     
       </div>
      
        <div class="modal fade" id="delete_religion_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete religion </h5>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="text-primary" id="delete_religion_id"></h5>
              <h5 class="text-primary" id="delete_religion_name"></h5>
               
              </div>
        
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete_religion_modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="delete_religion">Delete religion</button>
            </div>
          </div>
        </div>
      </div>
     </div>

@endsection