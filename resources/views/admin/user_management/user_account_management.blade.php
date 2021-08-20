@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="card card-orange">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                <li class="nav-item">
                    <a class="nav-link active text-bold" data-toggle="tab" href="#add_role_tab" role="tab">Add Role</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  text-bold" data-toggle="tab" href="#view_role_tab" role="tab" id="view_role_tab_link">View Role</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  text-bold" data-toggle="tab" href="#add_account_tab" role="tab" id="add_account_tab_link">Add Account</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  text-bold" data-toggle="tab" href="#view_account_tab" role="tab" id="view_account_tab_link">View Account</a>
                </li>

            </ul>
        </div>
            <div class="card-body">
                <div class="tab-content text-center">
                    <div class="tab-pane active" id="add_role_tab" role="tabpanel">
                        
                        <div class="row d-flex justify-content-center mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Add Role</label>
                                    <input type="text" name="" id="input_role" placeholder="Enter Role Name" class="form-control">
                                </div>
                                <div class="form-group">
                                  <button type="button" class="btn btn-primary btn-md btn-block" id="add_role_btn">Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="view_role_tab" role="tabpanel">
                        <p>View Role</p>
                        <div class="row">
                            <div class="col-12">
                                <table id="view_role_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Role ID</th>
                                            <th>Role Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                  </table>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="add_account_tab" role="tabpanel">
                        <label for="">Add Account</label>
                        <div class="row d-flex justify-content-center mt-3">
                            <div class="col-6">
                                <label for="user_name_input">User Name</label>

                                <div class="form-group">
                                    <input type="text" name="" id="user_name_input" class="form-control" placeholder="Enter User Name">
                                </div>

                                <label for="email_input">Email</label>

                                <div class="form-group">
                                    <input type="email" name="" id="email_input" class="form-control" placeholder="Enter Email" autocomplete="nope">
                                </div>

                                <label for="user_password_input">Password</label>

                                <div class="form-group">
                                    <input type="password"  id="user_password_input" class="form-control" autocomplete="new-password">
                                </div>

                                <label for="role_select">Choose Role</label>

                                <div class="form-group">
                                    <select name="" id="role_select" class="form-control">

                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="button" name="" id="add_account_btn" class="btn btn-primary btn-md btn-block mt-3">Add Account</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="view_account_tab" role="tabpanel">
                        <p>View Accounts</p>
                        <div class="row">
                            <div class="col-12">
                                <table id="user_account_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        

    </div>
</div>
{{-- <div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> User Account Management</h3>
  </div>
  <div class="card-body">
    <section class="content">
      <div class="container-fluid mt-3">
          <div class="row">
              <div class="col-6">
                  <div class="form-group">
                      <label for="">Add Role</label>
                      <input type="text" name="" id="input_role" placeholder="Enter Role" class="form-control">
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary btn-md btn-block">Submit</button>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_detail as $row)
                        <tr>
                            <td>{{$row->user_id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->role_name}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>

                                <button type="button" class="btn btn-info btn-sm">
                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                </button>

                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>

                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
    </section>
  </div>
</div> --}}
@endsection