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
                  <th>Class Label</th>
                  
                  <th>Action</th>             
                  
                </tr>
                </thead>
                <tbody>
                    @foreach ($student_data as $row)
                        
                    
                <tr>
                  <td>{{$row->student_id}}</td>
                  <td>{{$row->first_name."  ".$row->middle_name."  ".$row->last_name}}</td>
                  <td>{{$row->class_label}}</td>
                  
                   
                  <td>
                    <button class="btn btn-success btn-sm"
                    data-toggle="modal" 
                   data-target="#view_payment_history" 
                    data-payment_history="{{$row->student_table_id}}">
                     <i class="fa fa-eye" aria-hidden="true"></i>
                   
                   </button>
                   
                   

                   <button class="btn btn-info btn-sm" data-toggle="modal" 
                   data-target="#make_payment" 
                    data-payment_data="{{$row->student_id}},{{$row->class_id}},{{$row->first_name."  ".$row->middle_name."  ".$row->last_name}},{{$row->student_table_id}}">
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
                                 

                            <div class="col-md-12">
                              <div class="card card-warning collapsed-card">
                                <div class="card-header">
                                  <h3 class="card-title">Unpaid Bills <span id="num_of_unpaid_bill" class="badge badge-danger">4</span></h3>
                  
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                  </div>
                                  <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="unpaid_bill" style="display: none;">
                                  <table class="table table-bordered table-striped mt-5" id="example3">
                                    <thead>
                                      <tr>
                                        
                                        <th>payment type</th>            
                                        <th>amount</th>  
                                        <th>unpaid month</th>
                                        <th>status</th>
                                                                                                              
                                      </tr>
                                      </thead>
                                      <tbody id="unpaid_payment">
             
                                      </tbody>
                                  </table>
                                </div>
                                <!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                            </div>
                          
                          <table class="table table-bordered table-striped mt-5" id="example3">
                            <thead>
                              <tr>
                                <th>name</th>
                                <th>payment type</th>            
                                <th>amount</th>
                                <th>fs number</th>  
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
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Make Payment  </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    {{-- <form action="{{url('finance/addStudentPayment')}}" method="post">
                      @csrf --}}
                    <div class="modal-body">
                      <div class="row">
                          <div class="col-6">

                            
                            

                            <label for="payment_type">Select Payment Type</label>
                            <div class="form-group">
                                <select name="select_payment_type" id="payment_type" class="form-control">
                                  <option hidden value="none" id="none">Select Payment Type</option>
                                  <option value="total">Total Payment</option>
                                  @foreach ($payment_type as $row )
                                    <option value="{{$row->id}}">{{$row->payment_type}}</option>
                                  @endforeach
                                  
                                </select>

                            </div>

                            <label for="fs_number_input">Enter FS Number</label>
                            <div class="form-group">
                              <input type="number" class="form-control" placeholder="Enter FS Number" id="fs_number_input" name="fs_number">
                            
                              <small id="validation_message_for_fs_num_input"></small>
                            </div>

                            

                            {{-- <label for="select_month">Select Recurring Month</label>
                            <div class="form-group">
                              <input type="month" name="month" id="select_month" class="form-control">
                            </div> --}}

                            {{-- <div class="row">
                              <div class="col-6"> --}}
                                <div class="row">
                                  <div class="col-12">

                                     <label for=""> Select Month</label>
                                <div class="input-group">
                                <input type="text" id="year_month" class="form-control" readonly value="****-**">
                              
                                <div class="input-group-append">
                                <button type="button" id="calendar" class="btn btn-primary"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></button>
                              </div> 
                              
                              </div>

                                <table  id="ehtio_month_picker" style=" width:100%; border: 1px solid black; border-collapse: collapse">
                                <thead>
                                  <tr style="border: 1px solid black;">
                                    
                                    <th class="text-center">
                                      <button class="btn btn-primary btn-sm" id="last_year"><i class="fas fa-arrow-circle-left"></i></button>
                                    </th>
                                    <th class="text-center">
                                     {{-- <h5>  --}}
                                      <h6><span class="badge badge-primary" id="month"></span> <span class="badge badge-primary" id="year">2013</span> <span class="badge badge-primary">ዓ.ም</span></h6>
                                    {{-- </h5> --}}
                                    
                                    </th>
                                    
                                    <th class="text-center">
                                      <button class="btn btn-primary btn-sm" id="next_year"><i class="fas fa-arrow-circle-right"></i></button>
                                    </th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  {{-- first row --}}
                                  
                                  <tr >
                                    <td><button class="btn btn-outline-primary text-center" style="width: 100px" value="01" id="month1">መስከረም</button></td>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="02" id="month2">ጥቅምት</button></td>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="03" id="month3">ህዳር</button></td>
                                    
                                  </tr>
                                  {{-- second row --}}
                                  <tr>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="04" id="month4">ታህሳስ</button></td>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="05" id="month5">ጥር</button></td>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="06" id="month6">የካቲት</button></td>
                                  </tr>
                                  {{-- third row --}}
                                  <tr>
                                    
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="07" id="month7">መጋቢት</button></td>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="08" id="month8">ሚያዚያ</button></td>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="09" id="month9">ግንቦት</button></td>
                                    
                                  </tr>
                                  {{-- fourth row --}}
                                  <tr>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="10" id="month10">ሰኔ</button></td><br>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="11" id="month11">ሃምሌ</button></td>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="12" id="month12">ነሃሴ</button></td>
                                    
                                  </tr>

                                  <tr>
                                    <td><button class="btn btn-outline-primary" style="width: 100px" value="13" id="month13">ጷግሜ</button></td>
                                    
                                  </tr>
                                
                                </tbody>
                              </table>
                                  </div>
                                </div>
                               
                            
                                
                              {{-- </div>
                            </div> --}}

                           

                           
                          </div>

                          <div class="col-6">
                            <h5>Payment Detail</h5>
                            <div class="card">
                              <div class="card-body" >
                               
                                <h4 id="student_id" class="text-info mt-3 ml-3"></h4>
                                <h4 id="student_name" class="text-info mt-1 ml-3"></h4>

                                <label for="" class="ml-3">Amount to be Payed for</label>
                            <div class="form-group" id="individual_load" class="ml-3">

                            </div>
                            <div class="form-group" id="payment_load" class="ml-3">

                            </div>
                             

                          </div>
                        </div>

                          </div>
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">Cancel</button>
                      <button type="button" class="btn btn-success" id="pay_total" >Pay Total</button>
                      <button type="submit" class="btn btn-primary" id="submit_payment" name="submit" >Submit</button>
                    
                    </div>
                  {{-- </form> --}}
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