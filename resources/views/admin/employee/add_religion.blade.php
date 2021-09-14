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
        {{url('/editReligionValue/'.$edit_employee_religion->id)}}
        @else
        {{url('/addReligion')}}
        @endif
        "method="get">
          @csrf      
          <div class="row">
            <div class="col-6">

               @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>
                  @endif

              <div class="form-group">
                
               <label for="exampleFormControlInput1"> Add Religion </label>
                <input type="text"  name ="religion_name"  class="form-control"
                 id="employee_religion"
                @if (isset($edit_employee_religion))
                    value="{{$edit_employee_religion->religion_name}}"
                @endif>
              
              </div>
              <button type="submit"  class="btn btn-primary btn-md">
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