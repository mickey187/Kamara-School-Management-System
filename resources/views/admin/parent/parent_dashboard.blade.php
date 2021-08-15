@extends('layouts.parent_master')
@section('content')


{{-- <div class="card card-orange ">
    <div class="card-header">
    <h3 class="card-title text-white"> <i class="nav-icon fas fa-users"></i> Dashboard</h3>
    </div>
    <div class="card-body "> --}}


        <div class="card card-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-orange">
              <div class="widget-user-image">
                @if (isset($student_info))
                  @foreach ($student_info as $key)
                      <img class="img-rounded elevation-2"  src="{{asset('img/786562_people_512x512.png')}}" alt="User Avatar" style="width: 100px; height:100px">
                  @endforeach 
                  @else
                  <img class="img-circle elevation-2" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
                @endif
                
              </div>
              <!-- /.widget-user-image -->
              @if (isset($student_info))
              @foreach ($student_info as $key)
                  <h3 class="widget-user-username text-white ml-3">{{$key->full_name}}</h3>
                  <h5 class="widget-user-desc text-white ml-3">{{$key->class_label}}</h5>
              @endforeach              
                @else
                <h3 class="widget-user-username text-white">Default</h3>
                  <h5 class="widget-user-desc text-white">Default</h5>
              @endif
              
            </div>
            <div class="card-footer p-0">
           <div class="row m-3">
               <div class="col-4">
                <div class="small-box bg-success">
                    <div class="inner">
                      <h3>86<sup style="font-size: 20px">%</sup></h3>

                      <p >Student Score</p>
                    </div>
                    <div class="icon" style="color: white">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
               </div>

               <div class="col-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                      <h3 style="color: whitesmoke">2</h3>

                      <p style="color: whitesmoke">Attendance Missed</p>
                    </div>
                    <div class="icon" style="color:whitesmoke">
                        <i class="fas fa-school"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
               </div>

               <div class="col-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{$unpaid_bill_counter}}</h3>

                      <p>Unpaid Bills</p>
                    </div>
                    <div class="icon" style="color: white">
                        <i class="fas fa-comments-dollar"></i>
                    </div>
                    <a href="/viewParentPaymentDetail" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
               </div>
           </div>
            </div>
          </div>

    {{-- </div>
</div> --}}
@endsection
