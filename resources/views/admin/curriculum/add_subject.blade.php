@extends('layouts.master')
@section('content')

<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> 
      @if (isset($editSubject))
       {{'Edit'}}
      @else
       {{'Add'}}
    @endif  Subject</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">
      <!-- SELECT2 EXAMPLE -->
      
        <!-- /.card-header -->
        <form action=" 
          @if (isset($editSubject))
        {{url('editsubjectvalue/'.$editSubject->id)}}
       @else
        {{url('addsubject')}}
     @endif " method="post">
          @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Subject Group </label>
                        <select class="form-control" id="exampleFormControlSelect1" name = "subjectgroup">
                          <option>Select Subject Group</option>
                          @foreach ($subject_group as $row )
                            <option value="{{$row->id}}" 
                              @if (isset($editSubject))
                              @if ($editSubject->subject_group_id==$row->id)
                              {{'selected'}}
                              @endif
                             @endif
                            >

                            {{$row->subject_group}}</option>
                          @endforeach                                                                     
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlInput1">Subject Name</label>
                        <input type="text" name ="subjectname" class="form-control"
                         @if (isset($editSubject))
                         value="{{$editSubject->subject_name}}"               
                        
                     @endif   id="exampleFormControlInput1" placeholder="Subject Name">
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Stream</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="stream_id">
                          @foreach ($stream_data as $row)
                          <option value="{{$row->id}}"
                            @if (isset($editSubject))
                            @if ($editSubject->stream_id==$row->id)
                            {{'selected'}}
                            @endif
                           @endif
                            >
                            {{$row->stream_type}}
                          
                          </option>  
                          @endforeach
                                                                                                  
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary btn-md">
                        @if (isset($editSubject))
                        Save Changes

                        @else
                        Save
                      @endif </button>
                     
                </div>
              
            </div>
          </form>
        
          

          
          
         
        
        <!-- /.card-body -->
        <div class="card-footer mt-3">
          
        </div>
      
     
    </div>
    
  </section>
</div>
</div


@endsection