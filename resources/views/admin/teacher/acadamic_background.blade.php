@extends('..layouts.master')
@section('content')



     <div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Employee List</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">    
        <form>
        
 <div class="form-group">
      <label for="field_of_study">field_of_study</label>
      <input type="text" class="form-control" id="field_of_study" aria-describedby="field_of_study" placeholder="Enter your field of study">
    </div>
    <div class="form-group">
      <label for="place_of_study">place_of_study</label>
      <input type="text" class="form-control" id="place_of_study" aria-describedby="place_of_study" placeholder="Enter your place of study">
    </div>
     <div class="form-group">
      <label for="date_of_study">date_of_study</label>
      <input type="text" class="form-control" id="date_of_study" aria-describedby="date_of_study" placeholder="Enter your date of study">
    </div>

           
 <div class="form-group">
      <label for="teacher_traning_program">teacher_traning_program</label>
      <input type="text" class="form-control" id="teacher_traning_program" aria-describedby="teacher_traning_program" placeholder="Enter your teacher traning program">
    </div>
    <div class="form-group">
      <label for="teacher_traning_year">teacher_traning_year</label>
      <input type="text" class="form-control" id="teacher_traning_year" aria-describedby="teacher_traning_year" placeholder="Enter your teacher traning year">
    </div>
     <div class="form-group">
      <label for="teacher_traning_institute">date_of_study</label>
      <input type="text" class="form-control" id="teacher_traning_institute" aria-describedby="teacher_traning_institute" placeholder="Enter your teacher traning institute">
    </div>

        </form>
    </div>
  </section>
</div>
     </div>
@endsection