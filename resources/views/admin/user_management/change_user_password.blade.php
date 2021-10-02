
@extends('layouts.master')

@section('content')

<div class="card card-orange">
    <div class="card-header">
        <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i>
            Password Reset    
        </h3>
    </div>

    <div class="card-body">
        
            <div class="row justify-content-center">
                <div class="col-6">
                    @if (isset($user_detail))

                    <form action="{{url('/account/changeUserPassword')}}" method="POST">
                    @csrf
                    <h3 class="text-success">User Account Password Reset</h3>
                        <h5 class="text-info mt-3">User Name: {{$user_detail->name}}</h5>
                        <h5 class="text-info mt-2">User ID: {{$user_detail->user_account_id}}</h5>
                        <h5 class="text-info mt-2">Email: {{$user_detail->email}}</h5>
                        <h5 class="text-info mt-2">Role: {{$user_detail->role_name}}</h5>
                        <label for="new_password mt-2" class="text-info">New Password: </label>
                        <div class="input-group">
                            <input type="password" autocomplete="off" placeholder="new password" id="new_password" class="form-control pwd mt-1" name="new_password">
                            <span class="input-group-btn mt-1">
                                <button class="btn btn-default reveal" type="button"><i class="fas fa-eye "></i></button>
                              </span>
                              
                        </div>
                        <div class="valid">
                            <small id="new_password_validation" class="text-danger"></small>
                        </div>
                            

                        <label for="#new_password" class="text-info mt-2">Confirm Password: </label>
                        <div class="input-group">
                            <input type="password" autocomplete="off" placeholder="confirm password" id="confirm_password" class="form-control mt-1" name="confirm_password">
                            
                        </div>
                            <small id="confirm_passowrd_validation" class="text-danger"></small>
                        <input type="text" name="user_table_id" value="{{$user_detail->user_table_id}}" hidden>
                        
                        
                        <button type="button"  name="change_password_btn" id="change_password_btn" class="btn btn-primary btn-md btn-block mt-3">Change Password</button>
                    </form>
                    
                    @endif
                </div>
            </div>
        </div>
   
</div>

@endsection