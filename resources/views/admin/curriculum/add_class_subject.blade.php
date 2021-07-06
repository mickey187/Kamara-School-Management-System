@extends('layouts.master')
@section('content')


    <div class="card card-orange">
        <div class="card-header">
            <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> 
                @if (isset($cls_subject))
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
                
                @if (isset($cls_subject))
                    {{url('editClassSubjectValue/'.$id_cls)}}
                @else
                    {{url('addClassSubject')}}
                    
                @endif
                " method="post">
                    @csrf

                   
                   <div class="row">
                       <div class="col-6">                       
                   
                <div class="form-group">
                    <label>Select Class Label</label>
                    <select class="select2"
                    @if (!isset($cls_subject))
                    multiple="multiple"

                    @endif
                    
                     name="class_label[]" data-placeholder="Select Class" style="width: 100%;">
                      @foreach ($class_data as $row )
                      <option value="{{$row->id}}"
                        @if (isset($cls_subject))

                        @if ($row->id== $id_edit)
                        selected
                    @endif
                        @endif
                       
                         > {{$row->class_label}} </option>
                      @endforeach                                           
                    </select>
                  </div>
            </div>
        </div>

        <div class="row" style="margin-top: 10px">
            <div class="col-6">
                <div class="form-group">
                <label for="streams">Select Stream</label>
                <select name="stream" id="streams" class="form-control">
                    @foreach ($stream as $row )

                    <option value="{{$row->id}}"
                        @if (isset($cls_subject))
                        @if ($row->stream_type==$stream_edit)
                            selected
                        @endif
                            
                        @endif
                        >{{$row->stream_type}}</option>

                    @endforeach
                   
                </select>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="Select_Subject">Select Subject</label>
                    <select class="select2"
                    @if (!isset($cls_subject))
                    multiple="multiple"

                    @endif
                     name="subjects[]" data-placeholder="Select Class" style="width: 100%;" id="Select_Subject">
                        @foreach ($subject as $row )
                        <option value="{{$row->id}}"
                            @if (isset($cls_subject))
                                @if ($row->subject_name==$subject_edit)
                                    selected
                                @endif
                            @endif
                            >{{$row->subject_name}}</option>
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
