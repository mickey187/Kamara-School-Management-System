@extends('layouts.master')
@section('content')


    <div class="card card-orange">
        <div class="card-header">
            <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> 
                @if (isset($edit_cls_sub))
                   {{' Edit Subjects for Class'}}
                    @else
                    {{'Add Subjects for Class'}}
                @endif
               
            
            </h3>
        </div>
        <div class="card-body ">
          <section class="content">
            <div class="container-fluid mt-3">
    
    
    
                <form action="
                
                @if (isset($edit_cls_sub))
                    {{url('/editClassSubjectValue/'.$edit_cls_sub['id'])}}
                @else
                    {{url('/addClassSubject')}}
                    
                @endif
                " method="get">
                    @csrf

                   
                   <div class="row">
                       <div class="col-6">   

                        @if ($errors->any())                  
                  
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>
                  @endif
                           
                        {{-- {{$edit_cls_sub['class_id']}} --}}
                   
                <div class="form-group">
                    <label for="select_class">Select Class Label</label>
                    <select class="select2" name="classs_label"  data-placholder="Class"  style="width: 100%;" id="select_class"
                     @if (!isset($edit_cls_sub))
                     multiple="multiple"
                     @endif>
                    
                    @foreach ($class_data as $row)
                      <option value="{{$row->id}}"  
                      @if (isset($edit_cls_sub))
                          @if ($row->id == $edit_cls_sub['class_id'])
                              selected
                          @endif
                      @endif>{{$row->class_label}} </option>     
                    @endforeach                                           
                    </select>
                  </div>
            </div>
        </div>

        <div class="row" style="margin-top: 10px">
            <div class="col-6">
                <div class="form-group">
                <label for="streams">Select Stream</label>
                <select name="streams_type" id="streams" class="form-control">
                    @foreach ($stream as $row )

                    <option value="{{$row->id}}"
                         @if (isset($edit_cls_sub))
                            @if ( $row->id == $edit_cls_sub['stream_id'])
                           selected
                       @endif
                    @endif>{{$row->stream_type}}</option>

                    @endforeach
                   
                </select>
            </div>
            </div>
        </div> 

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Select_Subject">Select Subject</label>
                    <select class="select2" name="subjects_name"  data-placeholder="just ok" style="width: 100%;" id="Select_Subject"
                        @if (!isset($edit_cls_sub))
                        multiple="multiple"
                        @endif>
                        @foreach ($subject as $row )
                        <option value="{{$row->id}}"
                              @if (isset($edit_cls_sub))
                                 @if ($row->id == $edit_cls_sub['subject_id'])
                                selected
                            @endif
                        @endif>{{$row->subject_name}}</option>
                        @endforeach                                           
                      </select>
                    </div>
            </div>
        </div>
                                  
                           <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-md btn-block" >Submit</button>
                                </div>
                                
                            </div>
                            
                        </div>

                        
                            
                          
    
                </form>
            </div>
        </div>
    
    </section>
    </div>
    </div>

@endsection
