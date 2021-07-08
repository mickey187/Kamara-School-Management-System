@extends('layouts.master')
@section('content')


<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Subject Group</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">                 
        <form action="addsubjectgroup" method="post">
          @csrf      
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Suject Group</label>
                <input type="text" name ="subjectgroup" class="form-control" id="exampleFormControlInput1" placeholder="Subject Group">
              </div>
              <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div>
          </div>
        </form>                                                  
    </div>    
  </section>
</div>
</div>


@endsection