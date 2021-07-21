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

            <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_register">
                
                <button class="btn btn-sm btn-success" id="register_transport">Register</button>
                </div>
                </div>
           


          
        </div>
      </div>


    </div>    
</section>
</div>
</div>

@endsection