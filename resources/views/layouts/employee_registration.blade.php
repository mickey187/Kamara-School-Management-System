@extends('layouts.master')
@section('content')

<section class="content">
    <div class="container-fluid mt-3">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Employee Registration Form</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        
        <form>
        <div class="form-group">
    <label for="first_name">first_name</label>
    <input type="text" class="form-control" id="first_name" aria-describedby="first_name" placeholder="Enter your first name">
     </div>
  <div class="form-group">
       <label for="middle_name">middle name</label>
       <input type="text" class="form-control" id="middle_name" placeholder="Enter your middle name">
  </div>
  <div class="form-group">
    <label for="last_name">last name</label>
    <input type="text" class="form-control" id="last_name" placeholder="Enter your last name"><br/>
  </div>
<div class="form-group">
    <label>Gender</label><br/>
    <label class="radio-inline"> <input type="radio"  name="gender">Female</label>
    <label class="radio-inline"><input type="radio" name="gender">Male</label></div>
</div>
   <div class="form-group">
    <label for="birth_date">birth_date</label>
    <input type="text" class="form-control" id="birth_date" placeholder="Enter your birth date">
   </div>
<div class="form-group">
    <label for="hired_date">hired_date</label>
    <input type="text" class="form-control" id="hired_date" placeholder="Enter your hired date">
</div>
<div class="form-group">
    <label for="education_status">education_status</label>
    <input type="text" class="form-control" id="education_status" placeholder="Enter your education status"> 
</div>
<div class="form-group">
    <label>Marriage_status</label><br/>
    <label class="radio-inline"> <input type="radio"  name="marriage_status">married</label>
    <label class="radio-inline"><input type="radio" name="marriage_status">divorce</label>
        <label class="radio-inline"><input type="radio" name="marriage_status">widow</label>
  </div>
<div class="form-group">
    <label for="previous_employment">previous_employment</label>
    <input type="text" class="form-control" id="previous_employment" placeholder="Enter your previous employment"> 
</div>
<div class="form-group">
    <label for="special_skill">special_skill</label>
    <input type="text" class="form-control" id="special_skill" placeholder="Enter your special skill"> 
</div>
<div class="form-group">
    <label for="net_salary">net_salary</label>
    <input type="text" class="form-control" id="net_salary" placeholder="Enter your net salary"> 
</div>
<div class="form-group">
    <label for="job_trainning">job_trainning</label>
    <input type="text" class="form-control" id="job_trainning" placeholder="Enter your job trainning"> 
</div>
</div>

  <br/><button type="submit" class="btn btn-primary">Submit</button>   
        </form>
        </div>
    </div>
  </section>
@endsection