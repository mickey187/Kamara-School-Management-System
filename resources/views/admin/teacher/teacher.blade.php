@extends('layouts.master')
@section('content')


<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i>Add Teacher</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">
               <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
                        <div class="formcontainer">
                            <div class="form-outer">
                                <form action="addTeacher" method="GET">
                                  @csrf
                                    <div class="page slidePage">
                                        <div class="title">
                                            <div>
                                               Teacher Name
                                            </div>
                                        </div>
                                       <div class="field nextBtn">
                                            <button type="button">Next</button>
                                        </div>

                                    </div>
                                    <div class="page">
                                        <div class="title">
                                            <div>
                                              Debut As a Teacher
                                            </div>
                                        </div>
                                         <div class="field">
                                          <div class="label">debut_as_a_teacher</div>
                                            <input type="text" name="debut_as_a_teacher" class="form-control" id="id" aria-describedby="debut_as_a_teacher" placeholder="Enter your debut as a teacher">
                                          </div>
                                        <div class="field btns">
                                            <button type="button" class="prev-1 prev">Prev-1</button>
                                            <button type="button" class="next-1 next">Next-1</button>
                                        </div>
                                    </div>
                                        <div class="page">
                                        <div class="title">
                                            <div>
                                             Academic Background Info
                                            </div>
                                        </div>
                                         <div class="field">
                                          <div class="label">field_of_study</div>
                                            <input type="text" name="field_of_study" id="field_of_study" class="form-control" placeholder="Enter your field of study">
                                        </div>

                                        <div class="field">
                                          <div class="label">place_of_study</div>
                                          <input type="text" name="place_of_study" id="place_of_study" class="form-control" placeholder="Enter your place of study">
                                            </div>

                                      <div class="field">
                                          <div class="label">date_of_study</div>
                                          <input type="date" name="date_of_study" id="date_of_study" class="form-control" placeholder="Enter your date of study">
                                        </div>
                                         <div class="field btns">
                                            <button type="button" class="prev-2 prev">Prev-2</button>
                                            <button type="button" class="next-2 next">Next-2</button>
                                        </div>
                                        </div>

                                    <div class="page">
                                        <div class="title">
                                            <div>
                                              Teacher training Info
                                            </div>
                                        </div>
                                        <div class="field">
                                                    <div class="label">teacher_traning_program</div>
                                                      <input type="text" name="teacher_traning_program" id="teacher_traning_program" class="form-control" placeholder="Enter your teacher training program">
                                                  </div>

                                                    <div class="field">
                                                    <div class="label">teacher_traning_year</div>
                                                          <input type="date" name="teacher_traning_year" id="teacher_traning_year" class="form-control" placeholder="Enter your teacher training year">
                                                      </div>

                                                  <div class="field">
                                                    <div class="label">teacher_traning_institute</div>
                                                    <input type="text" name="teacher_traning_institute" id="teacher_traning_institute" class="form-control" placeholder="Enter your teacher training institute">
                                                  </div>
                                        <div class="field btns">
                                            <button type="button" class="prev-3 prev">Prev-3</button>
                                            <button type="submit" class=" submitBtn ">submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </section>
                        </div>
                        </div>
            @endsection

