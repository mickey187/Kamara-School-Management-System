@extends('layouts.master')
@section('content')

<section class="content">
    <div class="container-fluid mt-3">
      <!-- SELECT2 EXAMPLE -->
      
        <!-- /.card-header -->
        <form action="addsubject" method="post">
          @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Subject Group </label>
                        <select class="form-control" id="exampleFormControlSelect1" name = "subjectgroup">
                          <option>Select Subject Group</option>
                          <option value="KG 1 - KG 3">KG 1 - KG 3</option>
                          <option value="Grade 1 - Grade 4">Grade 1 - Grade 4</option>
                          <option value="Grade 5 - Grade 8">Grade 5 - Grade 8</option>   
                          <option value="Grade 9 - Grade 12">Grade 9 - Grade 12</option>                     
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlInput1">Subject Name</label>
                        <input type="text" name ="subjectname" class="form-control" id="exampleFormControlInput1" placeholder="Subject Name">
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Stream</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="stream_id">
                          @foreach ($stream_data as $row)
                          <option value="{{$row->id}}">{{$row->stream_type}}</option>  
                          @endforeach
                                                                                                  
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary btn-md">Submit</button>
                     
                </div>
              
            </div>
          </form>
        
          

          
          
         
        
        <!-- /.card-body -->
        <div class="card-footer mt-3">
          
        </div>
      
     
    </div>
    
  </section>
@endsection