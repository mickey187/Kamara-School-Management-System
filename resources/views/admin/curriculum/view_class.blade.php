@extends('layouts.master')

@section('content')

<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> View Class</h3>
  </div>
  <div class="card-body">
    <section class="content">
        <div class="container-fluid mt-3">
    
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  {{-- <th>id</th> --}}
                  <th>class label</th>
                  <th>section </th>
                  <th>subject name</th>
                  <th>stream</th>
                  
                  
                  {{-- <th>created_at</th>
                  <th>updated_at</th> --}}
                </tr>
                </thead>
                <tbody>
                    @foreach ($class_detail as $row)
                        
                    
                <tr>
                  {{-- <td>{{$row->id}}</td> --}}
                  <td>{{$row->class_label}}</td>
                  <td>{{$row->section}}</td>
                  <td>{{$row->subject_name}}</td>
                  <td>{{$row->stream_type}}</td>
                  
                  
                  {{-- <td>{{$row->created_at}}</td>
                  <td>{{$row->updated_at}}</td>                               --}}
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    {{-- <th>id</th> --}}
                    <th>class label</th>
                    <th>section</th>
                    <th>subject name</th>
                    <th>stream</th>
                    
                    
                    {{-- <th>created_at</th>
                    <th>updated_at</th> --}}
                </tr>
                </tfoot>
                
        </div>
          
        
    </section>
    
  </div>
  </div


@endsection