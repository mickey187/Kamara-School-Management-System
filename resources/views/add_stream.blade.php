@extends('layouts.master')
@section('content')

<section class="content">
    <div class="container-fluid mt-3">
      <!-- SELECT2 EXAMPLE -->
      
       
        <form action="addStream" method="post">
          @csrf      
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Stream Name</label>
                <input type="text" name ="streamname" class="form-control" id="exampleFormControlInput1" placeholder="Stream Name">
              </div>
              <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div>
          </div>
        </form>
            
         
       
       
        
      
      
    </div>
    
  </section>
@endsection