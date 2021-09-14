@extends('layouts.finance_view')
@section('content')

<div class="container-fluid">
  <div class="card card-orange">
    <div class="card-header">
      <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
        <li class="nav-item">
          <a class="nav-link active text-bold" data-toggle="tab" href="#add_payment_type_tab" role="tab">Add Payment Type</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-bold" data-toggle="tab" href="#view_payment_type_tab" role="tab" id="view_payment_type_tab_link">View Payment Type</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-bold" data-toggle="tab" href="#add_payment_load" role="tab" id="add_payment_load_tab_link">Add Payment Load</a>
          </li>

        <li class="nav-item">
          <a class="nav-link text-bold" data-toggle="tab" href="#view_payment_load" role="tab" id="view_payment_load_tab_link">View Payment Load</a>
        </li>

      
      </ul>
    </div>

    <div class="card-body">
      <div class="tab-content text-center">
        <div class="tab-pane active" id="add_payment_type_tab">
          

          <div class="row d-flex justify-content-center mt-3">
            <div class="col-6">
             
              <div class="form-group">
                <label for="exampleFormControlInput1">Payment Type</label>
                <input type="text" name ="payment_type" class="form-control" id="payment_type" 
                placeholder="Payment Type">
              </div>
    
              <div class="form-group">
                <label for="select_recurring">Select Recurring</label>
                <select name="recurring_type" id="select_recurring" class="form-control">
                  <option value="recurring">Recurring</option>
                  <option value="non-recurring">Non Recurring</option>
                </select>
              </div>
              <button  class="btn btn-primary btn-block btn-md" id="add_payment_type">Submit</button>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="view_payment_type_tab">
          <p>View Payment Type</p>
          <div class="row mt-5">
            <div class="col-12">
              <table id="view_payment_type_table" class="table table-bordered table-striped">
                <thead >
                  <tr>
                    <th>id</th>
                    <th>payment type</th>
                    <th>recurring type</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody id="table_body">
                    {{-- @foreach ($view_payment_type as $row)
                      <tr id="{{$row->id}}">
                      <td>{{$row->id}}</td>
                      <td>{{$row->payment_type}}</td>
                      <td>{{$row->recurring_type}}</td>
                      <td>
                        <button class="btn btn-success btn-sm"
                        data-toggle="modal" 
                       data-target="#view_payment_type_modal" 
                       data-view_payment_type="{{$row->id}},{{$row->payment_type}},{{$row->recurring_type}}">
                         <i class="fa fa-eye" aria-hidden="true"></i>
                       
                       </button>
    
                       <button class="btn btn-info btn-sm"
                        data-toggle="modal" 
                       data-target="#edit_payment_type" 
                        data-edit_payment_type="{{$row->id}},{{$row->payment_type}},{{$row->recurring_type}}">
                         <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                       
                       </button>
    
                       <button class="btn btn-danger btn-sm" data-toggle="modal" 
                       data-target="#delete_payment_type" 
                        data-delete_payment_type="{{$row->id}},{{$row->payment_type}},{{$row->recurring_type}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        
                      </button>
                      </td>
                    </tr>
                    @endforeach --}}
                    
                    
                    
                  </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="add_payment_load">
          <p>Add Payment Load</p>
          <div class="row">
            <div class="col-6">
             
              <div class="form-group">
                <label for="exampleFormControlInput1">Payment Type</label>
                <select name="select_payment_type" id="payment_type_select" class="form-control">
                    {{-- @foreach ($payment_type as $row) --}}
                        {{-- <option value="1">Peaches</option> --}}
                    {{-- @endforeach --}}
                </select>
    
              </div>
    
              <div class="form-group">
                  <label for="">Select Class</label>
                <select  id="class_id" class="select2" multiple="multiple" style="width: 100%"data-placeholder="Select Class" name="select_classes[]">
                    {{-- @foreach ($class as $row) --}}
                        <option value=""></option>
                    {{-- @endforeach --}}
                </select>
              </div>
    
              <div class="form-group">
                  <label for="">Enter Amount in Birr</label>
                  <input type="text" class="form-control" placeholder="Enter Amount" name="payment_amount" id="payment_amount">
              </div>
    
    
              <button type="submit" class="btn btn-primary btn-block btn-md" id="add_paymnet_load_btn">Submit</button>
            </div>
          </div>
        </div>

        <div class="tab-pane" id="view_payment_load">
          <p>View Payment Load</p>
          <table class="table table-bordered table-striped" id="view_payment_load_table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Payment Type</th>
                <th>Class Label</th>
                <th>Amount in Birr</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>






      <div class="modal fade" id="view_payment_type_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Payment Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_register">
                  <h5 id="payment_type_id" class="text-primary"></h5>
                  <h5 id="payment_types" class="text-primary"></h5>
                  <h5 id="recurring_type" class="text-primary"></h5>
                  
                
                
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
              
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="edit_payment_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Payment Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-8">

                    <div class="form-group">
                <label for="payment_type_edit">Payment Type</label>
                <input type="text" class="form-control" id="payment_type_edit" placeholder="Payment Type">

                
              </div>
              
              <div class="form-group">
                <select name="recurring_type" id="select_recurring_edit" class="form-control">
                  <option value="recurring">Recurring</option>
                  <option value="non-recurring">Non Recurring</option>
                </select>
              </div>
                </div>
              </div>

            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cance_edit_modal">Cancel</button>
              <button type="button" class="btn btn-info" id="save_changes" >Save Changes</button>
              
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="delete_payment_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Payment Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <h5 id="payment_type_id_delete" class="text-primary"></h5>
                  <h5 id="payment_types_delete" class="text-primary"></h5>
                  <h5 id="recurring_type_delete" class="text-primary"></h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete_modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="delete_payment_type">Delete</button>
              
            </div>
          </div>
        </div>
      </div>
   



      <div class="modal fade" id="view_payment_load_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Payment Load</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_register">
              <h5 class="text-primary" id="payment_load_id_view"></h5>
              <h5 class="text-primary" id="payment_type_view"></h5>
              <h5 class="text-primary" id="class_label_view"></h5>
              <h5 class="text-primary" id="amount_view"></h5>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      

      <div class="modal fade" id="edit_payment_load_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Payment Load</h5>
              
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-8">
                  <div class="form-group">
                    <label for="payment_type_edit">Select Payment Type</label>
                    <select name="select_payment_type" id="payment_type_edit_load" class="form-control">
                {{-- @foreach ($payment_type as $row)
                    <option value="{{$row->id}}">{{$row->payment_type}}</option>
                @endforeach --}}
            </select>
                  </div>
      
                  <div class="form-group">
                    <label for="">Select Class</label>
                  <select  id="class_id_edit_val" class="form-control" placeholder="Select Class" name="select_classes[]">
                      {{-- @foreach ($class as $row)
                          <option value="{{$row->id}}">{{$row->class_label}}</option>
                      @endforeach --}}
                  </select>
                </div>
      
                <div class="form-group">
                  <label for="">Enter Amount in Birr</label>
                  <input type="text" class="form-control" placeholder="Enter Amount" name="payment_amount" id="payment_amount_edit">
              </div>
                  
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel_edit_payment_load_modal">Cancel</button>
              <button type="button" class="btn btn-success" id="save_changes_payment_load">Save Changes</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="delete_payment_load_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Payment Load</h5>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_register">
              <h5 class="text-primary" id="payment_load_id_delete"></h5>
              <h5 class="text-primary" id="payment_type_delete"></h5>
              <h5 class="text-primary" id="class_label_delete"></h5>
              <h5 class="text-primary" id="amount_delete"></h5>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete_payment_load_modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="delete_payment_load">Delete Payment Load</button>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection