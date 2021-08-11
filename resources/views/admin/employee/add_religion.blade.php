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
        <form  id="religion_form" action="
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
                <div class="field">
               <div class="label"> Add Religion </div>
                <input type="text"  name ="employee_religion"  class="form-control"
                 id="employee_religion"
                  

                   oninput="checkInput()"
                  onkeydown="return alphaOnly(event);"
                  onblur="if (this.value == '')"
                   onfocus="if (this.value == '') {this.value = '';}"
                   placeholder="religion Name" required size="30" minlength="3" maxlength="21"


                @if (isset($edit_employee_religion))
                    value="{{$edit_employee_religion->religion_name}}"
                @endif
                ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i> <i class="fas fa-exclamation-circle"></i> <small>error message message appear here</small>
              </div>
              </div>
              <button type="button"  id="submit12" class="btn btn-primary btn-md">
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