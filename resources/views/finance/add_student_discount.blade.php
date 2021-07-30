@extends('layouts.finance_view')
@section('content')

<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> 
        Add Student Discount
        
    
    </h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">                 
        
          
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                  <label for="">Search Student</label>
                      
                   <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." name="student_id" id="search_input">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" id="search">
                          <i class="fa fa-search"></i>
                      </button>
                    </span>
                  </div>
                   
              </div>

              <div class="form-group" id="stud_name">

              </div>

              

              <table id="example2" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          
                          <th>Class Label</th>
                          <th>Payment Type</th>
                          <th>Amount</th>
                          <th>Action</th>
                      </tr>
                      <tbody id="table_data">
                          
                      </tbody>
                  </thead>
              </table>

              <div class="modal fade" id="add_discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">

                            
                     <h5 id="pay_type" class="text-info"></h5>
                        <h5 id="amount" class="text-info"></h5>
                        <form action="{{url('finance/addStudentDiscount')}}" method="post">
                            @csrf
                        <div class="form-group">
                          <label for="d_percent">Enter Discount in Percent(%)</label>
                          <input type="hidden" name="student_id" id="student_id">
                          <input type="hidden" name="payment_load_id" id="load_id">
                          <input type="number" name="discount_amount" id="d_percent" class="form-control" placeholder="Enter Discount">
                          
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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