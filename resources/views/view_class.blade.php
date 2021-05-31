@extends('layouts.master')

@section('content')

<section class="content">
    <div class="container-fluid mt-3">

        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>id</th>
              <th>suject_id</th>
              <th>stream_id</th>
              <th>section_id</th>
              <th>class_label</th>
              <th>created_at</th>
              <th>updated_at</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($classes as $row)
                    
                
            <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->suject_id}}</td>
              <td>{{$row->stream_id}}</td>
              <td>{{$row->section_id}}</td>
              <td>{{$row->class_label}}</td>
              <td>{{$row->created_at}}</td>
              <td>{{$row->updated_at}}</td>                              
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>id</th>
                <th>suject_id</th>
                <th>stream_id</th>
                <th>section_id</th>
                <th>class_label</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            </tfoot>
            
    </div>
      
    
</section>

@endsection