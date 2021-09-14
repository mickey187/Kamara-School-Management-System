@extends('layouts.master')
@section('content')


 <div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt">
    @if(isset($edit_employee))
        </i>Edit Employee</h3>
     @else
        </i>Add Job position</h3>
    @endif

</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">                 
        <form action="
        @if (isset($edit_emp_position))
        {{url('/editPositionValue/'.$edit_emp_position->id)}}
        @else
        {{url('/addJobPosition')}}
        @endif
        "method="get">
          @csrf      
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Position Name</label>
                <input type="text" name ="position_name" class="form-control" id="employee_position2" placeholder="position Name"
               @if (isset($edit_emp_position))
                    value="{{$edit_emp_position->position_name}}"
                @endif> 

              
                 @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>            
                  @endif
            </div>
          </div>
            </div>
              <button type="submit"  class="btn btn-primary btn-md">
                                @if (isset($edit_emp_position))
                                Save Changes
                                @else
                                Save              
              @endif
            </button>         
        </form>                                                  
    </div>    
  </section>
</div>
</div>



@endsection