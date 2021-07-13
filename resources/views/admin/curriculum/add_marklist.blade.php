@extends('layouts.master')
@section('content')
<div class="card card-orange">
    <div class="card-header">
        <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Mark list</h3>
    </div>
    <div class="card-body ">
        <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row h-100 justify-content-center align-items-center">
            <div class="form-group ">
                <label for="inputAddress2">Term</label>
                <input name="term" type="number" min="1" max="4" class="form-control" id="inputAddress2" placeholder="term">
              </div>
            <div class="form-group pl-3">
                  <label for="inputEmail4">Grade</label>
                  <select name="grade" id="inputState" class="form-control">
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{$class->class_label}}</option>
                @endforeach
                  </select>
                </div>
              <div class="form-group pl-3">
                <label for="inputAddress">Section</label>
                <select name="section" id="inputState" class="form-control">
                  <option selected>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                  <option>E</option>
                  <option>F</option>
                </select>
              </div>
              <div class="form-group pl-3">
                <label for="inputAddress">Subject</label>
                <select name="subject" id="inputState" class="form-control">
                  @foreach ($subject as $row)
                  <option value="{{ $row->id }}">{{ $row->subject_name }}</option>
                  @endforeach
                 </select>
              </div>
              <div class="form-group pl-3">
                <label for="inputAddress2">Load</label>
                <input name="testLoad" type="number" min="5" max="50" class="form-control" id="inputAddress2">
              </div>
              <div class="form-group pl-3">
                  <label for="inputAddress">Type</label>
                  <select name="assasment_type" id="inputState" class="form-control">
                    @foreach ($assasment as $row)
                    <option value="{{ $row->id }}">{{ $row->assasment_type }}</option>
                    @endforeach
                   </select>
                  </select>
                </div>
                  <div class="form-group pl-3">
                    <label for="inputAddress"></label>
                  <input name="Excel" type="file" class="form-control file  border" id="exampleFormControlFile1">
                </div>
                <div form-group class="form-group pl-3">
                    <button class="btn btn-primary" type="submit">Import</button>
                </div>
      </div>
    </form>
    </div>
</div>
@endsection
