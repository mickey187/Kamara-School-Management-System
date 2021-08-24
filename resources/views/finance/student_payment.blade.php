@extends('layouts.finance_view')
@section('content')

<div class="container-fluid">
    
    <div class="card card-orange">
        <div class="card-header">
          <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
            
            <li class="nav-item">
              <a class="nav-link active text-bold" data-toggle="tab" href="#registration" role="tab">Registration</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-bold" data-toggle="tab" href="#student_transport" role="tab" id="student_transport_tab_link">Transportation</a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-bold" data-toggle="tab" href="#student_tutorial" role="tab" id="student_tutorial_tab_link">Tutorial</a>
              </li>

            <li class="nav-item">
              <a class="nav-link text-bold" data-toggle="tab" href="#student_discount" role="tab" id="student_discount_tab_link">Discount</a>
            </li>

           <li class="nav-item">
              <a class="nav-link text-bold" data-toggle="tab" href="#student_trip" role="tab" id="student_school_trip_tab_link">Field Trip</a>
            </li>

           <li class="nav-item">
              <a class="nav-link text-bold" data-toggle="tab" href="#student_graduation" role="tab" id="student_graduation_tab_link">Graduation</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-bold" data-toggle="tab" href="#summer_camp" role="tab" id="student_summer_camp_tab_link">Summer Camp</a>
            </li>

          </ul>
        </div>
        <div class="card-body">
          <!-- Tab panes -->
          <div class="tab-content text-center">

            <div class="tab-pane active" id="registration" role="tabpanel">
              <p>Registration</p>
              <div class="row">
                <div class="col-6">

                  <div class="form-group">
                    <label for="search_input_for_registration">Search Student</label>
                        
                     <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Student ID" name="student_id" id="search_input_for_registration">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" id="search_btn_for_regsiter">
                            <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                     
                </div>

               

                <div class="form-group" id="payment_type_select_div">
                  <label for="payment_type_select">Select Payment Type</label>
                  <select name="payment_type_select" id="payment_type_select" class="form-control">
                    <option value=""hidden>Select Payment Type</option>
                    @foreach ($payment_type as $row)
                      <option value="{{$row->id}}">{{$row->payment_type}}</option>
                    @endforeach
                  </select>

                  <label for="Discount Percent" class="mt-3">Discount Percent %</label>
                  <input type="number" class="form-control mt-1" id="discount_percent" placeholder="discount percentage (optional)">
                </div>

                

                <div class="form-group mt-4">
                  <button class="btn btn-primary btn-block" id="register_student_for_payment">Register</button>
                </div>
                </div>

                <div class="col-6 mt-4">
                  <div class="form-group">
                    <div class="card" style="width: 28rem;" id="student_info_card">
                      <div class="card-body" id="card_register">
                        <div id="student_info_div">
      
                        </div>
                      
                      
                      </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="student_transport" role="tabpanel">
              <p>Student Transportation</p>
              <div class="row">
                <div class="col-12">
                  <table id="student_transport_table" class="table table-bordered table-striped">
                    <thead >
                      <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        {{-- <th>Payment Type</th> --}}
                        <th>Class Label</th>
                        <th>Discount</th>
                        <th>Amount</th>
                        <th>Action</th>
                      </tr>
                      </thead>
             
                  </table>
                </div>
              </div>


            </div>

            <div class="tab-pane" id="student_tutorial" role="tabpanel">
              <p>Student Tutorial</p>

              <div class="row">
                <div class="col-12">
                  <table id="student_tutorial_table" class="table table-bordered table-striped">
                    <thead >
                      <tr>
                        <tr>
                          <td>Student ID</td>
                          <td>Full Name</td>
                          <td>Class Label</td>
                          {{-- <td>Payment Type</td>                    --}}
                          <td>Discount</td>
                          <td>Amount</td>
                          <td>Action</td>
                        </tr>
                      </thead>
             
                  </table>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="student_discount" role="tabpanel">
              <p> Student Discount</p>
              <table id="student_discount_table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td>Student ID</td>
                    <td>Full Name</td>
                    <td>Class Label</td>
                    <td>Payment Type</td>                   
                    <td>Discount</td>
                    <td>Action</td>
                  </tr>
                </thead>

              </table>
            </div>

            <div class="tab-pane" id="student_trip" role="tabpanel">
              <p>Student Trip</p>
              <table id="student_school_trip_table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td>Student ID</td>
                    <td>Full Name</td>
                    <td>Class Label</td>
                    {{-- <td>Payment Type</td>                    --}}
                    <td>Discount</td>
                    <td>Amount</td>
                    <td>Action</td>
                  </tr>
                </thead>

              </table>
            </div>

            <div class="tab-pane" id="student_graduation" role="tabpanel">
              <p>
                Student Graduation

                <table id="student_graduation_table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td>Student ID</td>
                      <td>Full Name</td>
                      <td>Class Label</td>
                      {{-- <td>Payment Type</td>                    --}}
                      <td>Discount</td>
                      <td>Amount</td>
                      <td>Action</td>
                    </tr>
                  </thead>
  
                </table>
              </p>
            </div>

            <div class="tab-pane" id="summer_camp" role="tabpanel">
                <p>
                  Summer Camp
                </p>
                <table id="student_summer_camp_table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td>Student ID</td>
                      <td>Full Name</td>
                      <td>Class Label</td>
                      {{-- <td>Payment Type</td>                    --}}
                      <td>Discount</td>
                      <td>Amount</td>
                      <td>Action</td>
                    </tr>
                  </thead>
  
                </table>
              </div>

          </div>
        </div>
      </div>

      <div class="modal fade" id="view_transport_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Transportation Info Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_view_transport_info">
                  <h5 id="student_id_view" class="text-primary"></h5>
                  <h5 id="full_name_view" class="text-primary"></h5>
                  <h5 id="class_label_view" class="text-primary"></h5>
                  <h5 id="discount_view" class="text-primary"></h5>
                  <h5 id="amount_view" class="text-primary"></h5>
                  
                
                
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
              
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="edit_transport_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Transportation Info </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="card" style="width: 100%;">
                <div class="card-body" id="card_edit_transport_info">
                  <h5 id="student_id_edit" class="text-primary"></h5>
                  <h5 id="full_name_edit" class="text-primary"></h5>
                  <h5 id="class_label_edit" class="text-primary"></h5>
                  <h5 id="amount_edit" class="text-primary"></h5>
                  <div class="row no-gutters">
                    <div class="col-3">
                      <h5 class="text-primary">Discount Percent:</h5>
                    </div>

                    <div class="col-4">
                      <input type="text"  id="transport_discount_edit_input" class="form-control" placeholder="enter discount percent">
                    </div>
                  </div>
                  
                  
                
                
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="dismiss_edit_transport_modal">Cancel</button>
              <button type="button" id="btn_edit_transport" class="btn btn-info" >Save Changes</button>
              
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="delete_transport_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Transportation Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="card" style="width: 28rem;">
                <div class="card-body">
                  <h5 id="student_id_delete" class="text-primary"></h5>
                  <h5 id="full_name_delete" class="text-primary"></h5>
                  <h5 id="class_label_delete" class="text-primary"></h5>
                  <h5 id="discount_delete" class="text-primary"></h5>
                  <h5 id="amount_delete" class="text-primary"></h5>
                  
                
                
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete_transport_detail">Cancel</button>
              <button type="button" class="btn btn-danger" id="delete_transport_info_btn">Delete</button>
              
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="view_tutorial_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Tutorial Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="card" style="width: 28rem;">
                <div class="card-body">
                  <h5 id="student_id_tutorial_view" class="text-primary"></h5>
                  <h5 id="full_name_tutorial_view" class="text-primary"></h5>
                  <h5 id="class_label_tutorial_view" class="text-primary"></h5>
                  <h5 id="discount_tutorial_view" class="text-primary"></h5>
                  <h5 id="amount_tutorial_view" class="text-primary"></h5>
                  
                
                
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
              
              
            </div>
          </div>
        </div>
      </div>


      
  </div>

@endsection