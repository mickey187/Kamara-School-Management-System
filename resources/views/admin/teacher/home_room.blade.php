@extends('layouts.master')
@section('content')


<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Home Room Teacher</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">
<div class="container-fluid mt-3">
<form>
  <div class="row"> <!-- first row -->

    <div class="col-md-5">
      <div class="form-group">
          <label for="class">class</label>
          <input type="text" name="class" id="class" class="form-control" placeholder="Enter your class">
      </div>
    </div> <!-- end the first column -->

    <div class="col-md-5">
      <div class="form-group">
          <label for="section">section</label>
          <input type="text" name="section" id="section" class="form-control" placeholder="Enter your section">
      </div>
    </div> <!-- end the second column -->

  </div> <!-- end the first row -->

  <div class="row"> <!-- second row -->
    <div class="col-md-5">
      <div class="form-group">
          <label for="">stream</label>
          <input type="text" name="stream" id="stream" class="form-control" placeholder="Enter your stream">
      </div>
    </div> <!-- end the first column -->

     <div class="col-md-5">
      <div class="form-group">
          <label for="employee">employee</label>
          <input type="text" name="employee" id="employee" class="form-control" placeholder="Enter employee">
      </div>
    </div> <!-- end the second column -->

  </div> <!-- end the second row -->

  <div class="row"> <!-- third row -->

    <div class="col-md-5"><!-- end the first column -->
      <div class="form-group">
          <label for="attendance">attendance</label>
          <input type="text" name="attendance" id="attendance" class="form-control" placeholder="Enter student attendance">
      </div>
      <div class="col-md-5">
    <div class="form-group">
         <input type="submit" class="btn btn-primary"> 
    </div>
    </div> <!-- end the second column -->
  </div>
  </div>
</form>
</div> <!-- end container -->
    </section>
  </div>
</div>

@endsection