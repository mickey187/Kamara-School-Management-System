@extends('layouts.master')
@section('content')
<div class="card card-orange ">
    <div class="card-header">
    <h3 class="card-title text-white"> <i class="nav-icon fas fa-users"></i> Student Details </h3>
    </div>
    <div class="card-body ">
        <div class="container">
            <div class="main-body">
                  <div class="row gutters-sm">
                    <div class="col-md-3 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            {{-- <img class="rounded-circle" width="150" src="{{ $image }}" alt="User profile picture"> --}}
                            <img src="{{ asset('storage/student_image/'.$student_list->image)}}" {{-- alt="{{ $student->image }}"  --}} id="dsp-pro" class="img-fluid img-thumbnail" style="height: 210px;" alt="">

                            <div class="mt-3">
                              <h4>{{ $student_list->full_name }}</h4>
                              <h5>ID {{ $student_list->student_id }}</h5>
                              <p class="text-secondary mb-1" >{{ $student_list->gender }}</p>
                              <p class="text-muted font-size-sm" >{{ $student_list->class_label }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6 >{{ $student_list->full_name }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Student ID</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            <h6 >{{ $student_list->student_id }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Grade</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6 >{{ $student_list->class_label }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Birth Year</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6>{{ $student_list->birth_year }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Citizenship</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6 >{{ $student_list->citizenship }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Language</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6>{{ $student_list->native_tongue }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Previous School</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6>{{ $student_list->previous_school }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Education History</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6 >{{ $student_list->previous_school }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Expelsion Status</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6>{{ $student_list->expulsion_status }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Suspension Status</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6>{{ $student_list->suspension_status }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Transfer Reason</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6 >{{ $student_list->transfer_reason }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Disablity</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6>{{ $student_list->disablity }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Medical Condtion</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6>{{ $student_list->medical_condtion }}</h6>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Blood Type</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <h6>{{ $student_list->blood_type }}</h6>
                            </div>
                          </div>
                          {{-- <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <button class="btn btn-info " href="#">Edit</button>
                            </div>
                          </div> --}}
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
    </div>
</div>
@endsection
