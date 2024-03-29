@extends('layouts.master')
@section('content')

<div class="card card-orange">
    <div class="card-header" id="dashboardTitle">
        <h3 class="card-title"><i class="fas fa-tachometer-alt"></i>Dashboard</h3>
    </div>
    <div class="card-body">
        <section class="content" id="dashboardSection">
            <div class="conatiner-fluid mt-3">
                <div class="row">
                    <div class="col-lg-4 col-6">


                      <!-- small box -->
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>{{$number_of_students}}</h3>

                          <p>Total Students</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>{{$number_of_employees}}</h3>

                          <p>Employee</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info
                      ">
                        <div class="inner">
                          <h3>{{$number_of_teachers}}</h3>

                          <p>Teachers</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    {{-- <div class="col-lg-2 col-6">
                      <!-- small box -->
                      <div class="small-box bg-orange">
                        <div class="inner">
                          <h3>65</h3>

                          <p>Parents</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div> --}}
                    <!-- ./col -->
                    {{-- <div class="col-lg-2 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info
                        ">
                          <div class="inner">
                            <h3>200</h3>
                    <p>Permission</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> --}}

            {{-- <div class="col-lg-2 ">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h3>350</h3>

                  <p>Add Event</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> --}}
        </div>


        {{-- <div class="row col-12" > --}}

                <div class="row justify-content-center">
                  <div class="col-8 ">
                    <div class="card card-secondary">
                      <div class="card-header">
                        <h3 class="card-title">Student's Gender</h3>

                        <div class="card-tools">

                        </div>
                      </div>
                      <div class="card-body">
                        <canvas id="student_gender_chart" width="400" height="180"></canvas>
                      </div>
                      <!-- /.card-body -->
                    </div>
                  </div>
                  {{-- <div class="card card-secondary col-6">
                    <div class="card-header">
                      <h3 class="card-title">Student Status</h3>
                      <div class="card-tools">
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div> --}}


                </div>
            {{-- </div> --}}
        </section>
    </div>
</div>


<!-- /.modal-dialog-Import Excel File -->

@endsection
