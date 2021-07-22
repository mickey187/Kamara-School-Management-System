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
            <div class="row col-12">
                <div class="cpl-6 form-group ">
                    <label for="inputAddress2">Term</label>
                    <select name="semister" id="inputState" class="form-control">
                        @foreach ($semister as $row)
                            <option value="{{ $row->id }}"
                                @if ($row->current_semister == true)
                                    selected
                                @endif
                                >{{'Semister '.$row->semister.' '.$row->term }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 form-group pl-3">
                    <label for="inputEmail4">Academic Year</label>
                    <select name="academic_year" id="inputState" class="form-control" required>
                      {{-- @foreach ($classes as $class) --}}
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>

                      {{-- @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="col-12 row">
                <div class="form-group pl-3">
                    <label for="inputEmail4">Grade</label>
                    <select name="grade" id="inputState" class="form-control" required>
                      @foreach ($classes as $class)
                      <option value="{{ $class->id }}">{{$class->class_label}}</option>
                      @endforeach
                    </select>
              </div>
                <div class="col-4 form-group pl-3">
                  <label for="inputAddress">Section</label>
                  <select name="section" id="inputState" class="form-control" required>
                    <option selected>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    <option>E</option>
                    <option>F</option>
                  </select>
                </div>
                <div class="col-4 form-group pl-3">
                  <label for="inputAddress">Subject</label>
                  <select name="subject" id="inputState" class="form-control" required>
                    @foreach ($subject as $row)
                    <option value="{{ $row->id }}">{{ $row->subject_name }}</option>
                    @endforeach
                   </select>
                </div>
                <div class="col-4 form-group pl-3">
                  <label for="inputAddress2">Load</label>
                  <input name="testLoad" type="number" required min="5" max="50" placeholder="10%" class="form-control" id="inputAddress2">
                </div>

            </div>
            <div class="col-12 row">
                <div class="form-group pl-3">
                    <label for="inputAddress">Type</label>
                    <select name="assasment_type" id="inputState" class="form-control" required>
                      @foreach ($assasment as $row)
                      <option value="{{ $row->id }}">{{ $row->assasment_type }}</option>
                      @endforeach
                     </select>
                    </select>
                  </div>
                    <div class="form-group pl-3">
                      <label for="inputAddress"></label>
                    <input name="Excel" type="file" class="form-control file  border" id="exampleFormControlFile1" required>
                  </div>
                  <div form-group class="form-group pl-3">
                      <button class="btn btn-primary" type="submit">Import</button>
                  </div>
            </div>

            </div>

      </div>
    </form>
    </div>
</div>
@endsection
