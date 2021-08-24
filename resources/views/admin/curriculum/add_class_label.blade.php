@extends('layouts.master')
@section('content')

<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i>@if (isset($class_label))
      Edit Class Label
      @else
      Add Class Label
    @endif</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">
        <form action="

        @if (isset($class_label))
          {{url('editclasslabelvalue/'.$class_label->id)}}

          @else
          {{url('addclasslabel')}}
        @endif "
         method="post">
          @csrf

          <div class="row">
            <div class="col-6">

                

              <div class="form-group">
                <label for="addClass">Add Class Label</label>
                <input type="text" name ="class_label" class="form-control" id="addClass" placeholder="Class label"
                @if (isset($class_label))
                  value="{{$class_label->class_label}}"

                @endif  >

                @if ($errors->any())
                
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->get('class_label') as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>
                  @endif

              </div>
              <div class="col-6">
                <div class="form-group">
                    <label for="addPriority">Add Priority</label>
                    <input type="number" name ="class_priority" min="1" max="15" class="form-control" id="addPriority" placeholder="priority" >

                    @if ($errors->any())
                
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->get('class_priority') as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>
                  @endif

                  </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-6">

              <button type="submit" id="addClassBtn" class="btn btn-primary btn-md btn-block">
                @if (isset($class_label))
                Save Changes

                @else
                Submit
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
