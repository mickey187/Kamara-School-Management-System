@extends('layouts.master')

@section('content')

<section class="content">
    <div class="container-fluid mt-3">

        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>id</th>
              <th>stream_id</th>
              <th>subject_group</th>
              <th>subject_name</th>
              <th>created_at</th>
              <th>updated_at</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($subject_list as $row)
                    
                
            <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->stream_id}}</td>
              <td>{{$row->subject_group}}</td>
              <td>{{$row->subject_name}}</td>
              <td>{{$row->created_at}}</td>
              <td>{{$row->updated_at}}</td>                              
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>id</th>
                <th>stream_id</th>
                <th>subejct_group</th>
                <th>subject_name</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            </tfoot>
            
    </div>
      
    
</section>

@endsection