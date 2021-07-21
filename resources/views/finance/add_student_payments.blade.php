@extends('layouts.finance_view')
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
                  <th>Full Name</th> 
                  
                  <th>Action</th>             
                  
                </tr>
                </thead>
                <tbody>
                    @foreach ($student_data as $row)
                        
                    
                <tr>
                  <td>{{$row->student_id}}</td>
                  <td>{{$row->first_name."  ".$row->middle_name."  ".$row->last_name}}</td>
                  
                   
                  <td>
                    <button class="btn btn-success btn-sm"
                    data-toggle="modal" 
                   data-target="#view_payment_history" 
                    data-payment_history="{{$row->id}}">
                     <i class="fa fa-eye" aria-hidden="true"></i>
                   
                   </button>
                   
                   

                   <button class="btn btn-info btn-sm" data-toggle="modal" 
                   data-target="#make_payment" 
                    data-payment_data="{{$row->student_id}},{{$row->class_id}},{{$row->first_name."  ".$row->middle_name."  ".$row->last_name}},{{$row->id}},{{$row->discount}}">
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
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View Payment History </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12">
                          
                          <table class="table table-bordered table-striped mt-5" id="example3">
                            <thead>
                              <tr>
                                <th>name</th>
                                <th>payment type</th>            
                                <th>amount</th>  
                                <th>payment month</th>
                                                                                                      
                              </tr>
                              </thead>
                              <tbody id="payment_history">
     
                              </tbody>
                          </table>
                        </div>
                      </div>
                      
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
                    <form action="{{url('/addStudentPayment')}}" method="post">
                      @csrf
                    <div class="modal-body">
                      <div class="row">
                          <div class="col-6">

                            <h4 id="student_id" class="text-primary"></h4>
                            <h4 id="student_name" class="text-info"></h4>
                            

                            <label for="payment_type">Select Payment Type</label>
                            <div class="form-group">
                                <select name="select_payment_type" id="payment_type" class="form-control">
                                  <option hidden value="none" >Select Payment Type</option>
                                  <option value="total">Total Payment</option>
                                  @foreach ($payment_type as $row )
                                    <option value="{{$row->id}}">{{$row->payment_type}}</option>
                                  @endforeach
                                  
                                </select>

                            </div>

                            <label for="#payment_load">Amount to be Payed for</label>
                            <div class="form-group" id="payment_load">

                            </div>

                            <label for="select_month">Select Recurring Month</label>
                            <div class="form-group">
                              <input type="month" name="month" id="select_month">
                            </div>

                            

                           
                          </div>
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">Cancel</button>
                      <button type="button" class="btn btn-success" id="pay_total" >Pay Total</button>
                      <button type="submit" class="btn btn-primary" id="submit_payment" name="submit" >Submit</button>
                    
                    </div>
                  </form>
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