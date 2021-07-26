@extends('layouts.student_view_dashboard')
@section('content')

<div class="card card-orange">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-tachometer-alt"></i>Dashboard</h3>
    </div>
    <div class="card-body">
        <section class="content">
            <div class="conatiner-fluid mt-3">
           

                <div class="row">
                    <div class="col-lg-2 col-6">

                    
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>1556</h3>
          
                          <p>Students grade</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                      <!-- small box -->
                      <div class="small-box bg-orange">
                        <div class="inner">
                          <h3>350</h3>
          
                          <p>Student mark</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info
                      ">
                        <div class="inner">
                          <h3>200</h3>
          
                          <p>Attendance</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-6">
                      <!-- small box -->
                      <div class="small-box bg-orange">
                        <div class="inner">
                          <h3>65</h3>
          
                          <p>View Attendance</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                   
            </div>
                         

            </div>
        </section>
    </div>

</div>
@endsection