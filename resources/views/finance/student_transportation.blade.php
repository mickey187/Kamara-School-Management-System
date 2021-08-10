@extends('layouts.finance_view')
@section('content')

<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i>Student Transport</h3>
  </div>
  <div class="card-body">
    <section class="content">
      <div class="container-fluid mt-3">


    <div class="row">
        <div class="col-6">
            
            <div class="form-group">
                <label for="">Search Student</label>
                    
                 <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for..." name="student_id" id="search_input_transport">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="search_transport">
                        <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
                 
            </div>

            <div class="form-group" id="stud_name">

            </div>

            <div class="card" style="width: 28rem;" id="outer_card">
                <div class="card-body" id="card_register">
                  <div id="inner_div">

                  </div>
                
                <button class="btn btn-sm btn-success" id="register_transport">Register</button>
                </div>
                </div>
           


                <button type="button" name="" id="show_student_transport_list" class="btn btn-primary btn-md mt-5">Show students registered for Transportation</button>
        </div>
      </div>

      <div class="row mt-5" id="student_tranport_div">
        <div class="col-12">
          
          <table id="example1" class="table table-bordered table-striped ">
            <thead>
            <tr>
              <th>Student ID</th>
              <th>Full Name</th> 
              <th>Class Label</th>
              <th>Transport Fee</th>
              
              <th>Action</th>             
              
            </tr>
            </thead>
            <tbody>
                @foreach ($student_transport as $row)
                    
                
            <tr>
              <td>{{$row->student_id}}</td>
              <td>{{$row->first_name.' '.$row->middle_name.' '.$row->last_name}}</td>
              <td>{{$row->class_label}}</td>
              <td>{{$row->amount}}</td>
              
               
              <td>
                <button class="btn btn-success btn-sm"
                data-toggle="modal" 
                data-target="#view_payment_history" 
                data-payment_history="">
                 <i class="fa fa-eye" aria-hidden="true"></i>
               
               </button>
               
               

               <button class="btn btn-info btn-sm" data-toggle="modal" 
               data-target="#make_payment" 
                data-payment_data="">
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
        </div>
      </div>


    </div>    
</section>
</div>
</div>

@endsection