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
                <input type="text" name ="assasment_type" class="form-control" id="exampleFormControlInput1" placeholder="Assasment label">

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
                            <button class="btn btn-success btn-sm"
                            data-toggle="modal"
                            data-target="#view_stream"
                            data-view_stream="{{$row->id}},{{$row->assasment_type}}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
                            <a name="edit_ubject" id="" class="btn btn-info btn-sm" href="{{ url('editstream/'.$row->id) }}" role="button">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>

                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete_stream"
                                data-delete_stream="{{$row->id}},{{$row->assasment_type}}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
               
                </table>
            </div>
          </div>


        </form>
    </div>
  </section>
</div>
</div>


@endsection
