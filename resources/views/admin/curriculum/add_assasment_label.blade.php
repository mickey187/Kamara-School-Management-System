@extends('layouts.master')
@section('content')

<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i>
      Assasment
    </h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">
        <form action="{{url('addAssasment')}}" method="GET">
          @csrf
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleFormControlInput1">Add Assasment Label</label>
                <input type="text" name ="assasment_type" class="form-control" id="assasment_type" placeholder="Assasment label">

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
           <div class="row">
            <div class="col-6">

              <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
            </div>
            <div class="container-fluid mt-3">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>id</th>
                      <th>assasment_type</th>
                      <th>action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($assasment as $row)
                        <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->assasment_type}}</td>
                        <td>
                            <a class="btn btn-success btn-sm"
                            data-toggle="modal"
                            data-target="#view_assasment_type"
                            data-view_assasment_type="{{$row->id}},{{$row->assasment_type}}">
                            <i class="fa fa-eye" ></i>
                        </a>
                            <a href="{{url ('edit_assasment_type_value/'.$row->id)}}" type="button" class="btn bg-blue btn-sm"><i class="fa fa-pen"></i></a>                          
                            
                            <a class="btn btn-danger btn-sm" 
                                data-toggle="modal"
                                data-target="#delete_assasment"
                                data-delete_assasment="{{$row->id}},{{$row->assasment_type}}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
               
                </table>

               <div class="modal fade" id="view_assasment_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View assasment </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="assasment_id"></p>
                    <p id="assasment_type"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>

                 <div class="modal fade" id="delete_assasment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete assasment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                    <p id="assasment_id_delete"></p>
                    <p id="assasment_type_delete"></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancel_delete_assasment_type" data-dismiss="modal">Cancel</button>
                    <form action="{{url('/delete_assasment')}}" method="get">
                      @csrf

                    <button type="submit" class="btn btn-danger" id="delete_assasment_btn" name="delete_btn">Delete</button>
                   
                  </form>
                  </div>
                </div>
              </div>
            </div>

            </div>
          </div>


        </form>
    </div>
  </section>
</div>
</div>


@endsection
