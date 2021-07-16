@extends('layouts.master')
@section('content')


 <div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt">
    @if(isset($edit_employee))
        </i>Edit Employee</h3>
     @else
        </i>Add Religion</h3>
    @endif

</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">                 
        <form action="
        @if (isset($edit_employee_religion))
        {{url('editReligionValue/'.$edit_employee_religion->id)}}
        @else
        {{url('addReligion')}}
        @endif
        "method="get">
          @csrf      
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">religion Name</label>
                <input type="text" name ="employee_religion" class="form-control" id="employee_religion" placeholder="religion Name"
                @if (isset($edit_employee_religion))
                    value="{{$edit_employee_religion->religion_name}}"
                @endif
                >
              </div>
              <button type="submit" class="btn btn-primary btn-md">
                                @if (isset($edit_employee_religion))
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