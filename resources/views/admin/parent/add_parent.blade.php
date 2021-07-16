
@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

<div class="card card-orange">
    <div class="card-header">
      <h1 class="card-title  text-white"><i class="nav-icon fas @if (isset($parent_update_list))
        {{'fa-user-edit'}}
    @else
        {{'fa-users'}}
    @endif  "></i>
        @if (isset($parent_update_list))
            {{'Edit parent profile'}}
        @else
            {{'New parent registration form'}}
        @endif  </h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="formcontainer">
            <div class="form-outer">
                {{-- parent_update_list {{ url('addNewParent/'.$id ) }} --}}
                <form action="
                @if (isset($parent_update_list))
                {{url('insertUpdatedParent/'.$parent_update_list->id)}}
               @else
                {{url('addNewParent/'.$id)}}
               @endif
                " method="GET">
                    @csrf
                    <div class="page slidePage">
                        <div class="row col-12">
                            <div class="col-4">
                                <div class="field">
                                    <div class="label">First name</div>
                                    <input type="text" name="firstName" class="form-control" placeholder="First name"
                                    @if (isset($parent_update_list))
                                    value="{{$parent_update_list->first_name}}"
                                    @endif
                                   >
                                   <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                                <div class="field">
                                    <div class="label">Middle name</div>
                                    <input type="text" name="middleName" class="form-control" placeholder="Middle name"
                                    @if (isset($parent_update_list))
                                    value="{{$parent_update_list->middle_name}}"
                                    @endif
                                    >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                                <div class="field">
                                    <div class="label">Last name</div>
                                    <input type="text" name="lastName" class="form-control" placeholder="Last name"
                                    @if (isset($parent_update_list))
                                    value="{{$parent_update_list->last_name}}"
                                    @endif
                                    >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="field">
                                    <div class="label">Gender</div>
                                    <select name="gender" class="form-control">
                                            <option
                                            @if (isset($parent_update_list))
                                                @if ($parent_update_list->gender=='Male')
                                                {{'selected'}}
                                                @endif
                                            @endif
                                            >Male</option>

                                            <option
                                            @if (isset($parent_update_list))
                                                @if ($parent_update_list->gender=='Female')
                                                {{'selected'}}
                                                @endif
                                            @endif
                                            >Female</option>
                                          </select>
                                          <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                                <div class="field">
                                    <div class="label">Relation</div>
                                    <input type="text" name="pRelation" class="form-control" placeholder="Relation"
                                    @if (isset($parent_update_list))
                                    value="{{$parent_update_list->relation}}"
                                    @endif
                                    >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                                <div class="field">
                                    <div class="label">Emergency contact</div>
                                    <input type="number" name="pEmergency" class="form-control" placeholder="Transfer reason"
                                    @if (isset($parent_update_list))
                                    value="{{$parent_update_list->emergency_contact_priority}}"
                                    @endif
                                    >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="field">
                                    <div class="label">School closure priority</div>
                                    <input type="number" name="School_Closure_Priority" class="form-control" placeholder="School closure priority"
                                    @if (isset($parent_update_list))
                                    value="{{$parent_update_list->school_closur_priority}}"
                                    @endif
                                    ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row col-12">
                            <div class="col-4">
                                <div class="field">
                                    <div class="label">P.O.Box</div>
                                    <input type="number" name="p_o_box" class="form-control" placeholder="P.O.Box"
                                    @if (isset($parent_update_list))
                                    value="{{$update_address->p_o_box}}"
                                    @endif
                                    >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>
                                </div>
                                <div class="field">
                                    <div class="label">Email</div>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                    @if (isset($parent_update_list))
                                    value="{{$update_address->email}}"
                                    @endif>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                                <div class="field">
                                    <div class="label">Phone</div>
                                    <input type="number" name="phone1" class="form-control" placeholder="Phone"
                                    @if (isset($parent_update_list))
                                    value="{{$update_address->phone_number}}"
                                    @endif>

                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="field">
                                    <div class="label">City</div>
                                    <input type="text" name="city" class="form-control" placeholder="City"
                                    @if (isset($parent_update_list))
                                    value="{{$update_address->city}}"
                                    @endif
                                    ><i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                 </div>
                                <div class="field">
                                    <div class="label">Sub city</div>
                                    <input type="text" name="subcity" class="form-control" placeholder="Subcity"
                                    @if (isset($parent_update_list))
                                    value="{{$update_address->subcity}}"
                                    @endif
                                    >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                                <div class="field">
                                    <div class="label">Kebele</div>
                                    <input type="text" name="kebele" class="form-control" placeholder="Kebele"
                                    @if (isset($parent_update_list))
                                    value="{{$update_address->kebele}}"
                                    @endif
                                    >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="field">
                                    <div class="label">Alternative Phone</div>
                                    <input type="number" name="phone2" class="form-control" placeholder="Alternative phone"
                                    @if (isset($parent_update_list))
                                    value="{{$update_address->alternative_phone_number}}"
                                    @endif>

                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                                <div class="field">
                                    <div class="label">House number</div>
                                    <input type="number" name="houseNumber" class="form-control" placeholder="House number"
                                    @if (isset($parent_update_list))
                                    value="{{$update_address->house_number}}"
                                    @endif
                                    >
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>  <small>error message message appear here</small>

                                </div>
                            </div>
                        </div>


                        <div class="form">
                            <button  type="submit" class=" btn btn-primary ">submit</button>
                        </div>
                    </div>

                </form>
            </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <!-- general form elements disabled -->


@endsection
