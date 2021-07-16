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
        {{url('editPositionValue/'.$edit_emp_position->id)}}
        @else
        {{url('addJobPosition')}}
        @endif
        "method="get">
          @csrf      
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Position Name</label>
                <input type="text" name ="employee_position" class="form-control" id="employee_position" placeholder="position Name"
                @if (isset($edit_emp_position))
                    value="{{$edit_emp_position->position_name}}"
                @endif
                >
              </div>
              <button type="submit" class="btn btn-primary btn-md">
                                @if (isset($edit_emp_position))
                                Save Changes
                                @else
                                Save              
              @endif
            </button>
            </div>
          </div>
        </form>                                                  
    </div>    
  </section>
</div>
</div>



@endsection