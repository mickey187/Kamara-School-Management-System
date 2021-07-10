@extends('layouts.master')
@section('content')


<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Stream</h3>
  </div>
  <div class="card-body">
    <section class="content">
      <div class="container-fluid mt-3">


    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student ID</th>
                  <th>First Name</th> 
                  <th>Middle Name</th>   
                  <th>Last Name</th>
                  <th>Action</th>             
                  
                </tr>
                </thead>
                <tbody>
                    @foreach ($student_data as $row)
                        
                    
                <tr>
                  <td>{{$row->student_id}}</td>
                  <td>{{$row->first_name}}</td>
                  <td>{{$row->middle_name}}</td>
                  <td>{{$row->last_name}}</td>
                   
                  <td>
                    <button class="btn btn-success btn-sm"
                    data-toggle="modal" 
                   data-target="#view_payment_history" 
                    data-="">
                     <i class="fa fa-eye" aria-hidden="true"></i>
                   
                   </button>
                   
                   

                   <button class="btn btn-info btn-sm" data-toggle="modal" 
                   data-target="#make_payment" 
                    data-payment_data="{{$row->student_id}},{{$row->first_name}},{{$row->middle_name}},{{$row->last_name}}">
                    <i class="fa fa-dollar-sign"></i>
                    
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

            
            <div class="modal fade" id="view_payment_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View Payment History </h5>
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


              <div class="modal fade" id="make_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Make Payment  </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                          <div class="col-6">

                            <p id="student_id"></p>
                            <p id="student_name"></p>
                            

                            <label for="payment_type">Select Payment Type</label>
                            <div class="form-group">
                                <select name="select_payment_type" id="payment_type" class="form-select">
                                  <option value="">m</option>
                                </select>

                            </div>

                            <label for="amount">Enter Amount</label>
                            <div class="form-group">
                                <input type="text" name="payment_amount" id="amount" class="form-control" placeholder="Enter Amount">
                            </div>

                            <label for="date">Select Date</label>
                            <div class="form-group">
                                <input type="date" name="payment_date" id="date" class="form-control" >
                            </div>
                          </div>
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
          
        </div>
      </div>


    </div>    
</section>
</div>
</div>

@endsection