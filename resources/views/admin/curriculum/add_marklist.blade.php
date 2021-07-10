@extends('layouts.master')
@section('content')
<div class="card card-orange">
    <div class="card-header">
        <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Mark list</h3>
    </div>
    <div class="card-body ">
        <form class="col-6">
        <div class="row h-100 justify-content-center align-items-center">
                <div class="form-group ">
                  <label for="inputEmail4">Grade</label>
                  <select id="inputState" class="form-control">
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                  </select>
                </div>
                <div class="form-group ">

                </div>
              <div class="form-group pl-3">
                <label for="inputAddress">Section</label>
                <select id="inputState" class="form-control">
                  <option selected>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                  <option>E</option>
                  <option>F</option>
                </select>
              </div>
              <div class="form-group pl-3">
                <label for="inputAddress2">Load</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder=>
              </div>
                <div class="form-group pl-3">
                  <label for="inputAddress">Type</label>
                  <select id="inputState" class="form-control">
                    <option selected>Final Exam</option>
                    <option>Mid Exam</option>
                    <option>Assesment</option>
                  </select>
                </div>
                  <div class="form-group pl-3">
                  <input type="file" class="form-control-file  border" id="exampleFormControlFile1">
                </div>
                <div class="pl-3">
                    <button class="btn btn-primary" type="submit">Import</button>
                </div>
      </div>
    </form>
    </div>
</div>
@endsection
