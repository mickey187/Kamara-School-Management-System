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
                <label for="exampleFormControlInput1">Add Class Label</label>
                <input type="text" name ="class_label" class="form-control" id="exampleFormControlInput1" placeholder="Class label"
                @if (isset($class_label))
                  value="{{$class_label->class_label}}"
          
                @endif  >
              </div>
              
            </div>
                                                
          </div>

          {{-- <div class="row" style="margin-top: 10px">
            <div class="col-6">
                <div class="form-group">
                <label for="streams">Select Stream</label>
                <select name="stream" id="streams" class="form-select">
                    @foreach ($stream as $row )

                    <option value="{{$row->id}}">{{$row->stream_type}}</option>                                                  
                      
                    @endforeach
                   
                </select>
            </div>
            </div>
        </div> --}}

          

          
          
          <div class="row">
            <div class="col-6">
              
              <button type="submit" class="btn btn-primary btn-md btn-block">
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