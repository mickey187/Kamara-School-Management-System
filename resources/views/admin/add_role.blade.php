@extends('layouts.master')
@section('content')


<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> 
        @if (isset($edit_subject))
            Edit Role
            @else
            Add Role
        @endif
           </h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">                 
        <form action="
        @if (isset($edit_role))
            
            {{url('editrolevalue/'.$edit_role->id)}}
            @else
            {{url('addrole')}}
        @endif "
         method="get">
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
                <label for="exampleFormControlInput1">rol Name</label>
                <input type="text" name ="role_name" class="form-control" id="rolename" placeholder="role Name"
                @if (isset($edit_role))
                    value="{{$edit_role->role_name}}"
                @endif
                >
              </div>
              <button type="submit" class="btn btn-primary btn-md">
                                @if (isset($edit_role))
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