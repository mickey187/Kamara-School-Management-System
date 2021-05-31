@extends('layouts.master')

@section('content')

<section class="content">
    <div class="container-fluid mt-3">

        <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>id</th>
              <th>stream_type</th>              
              <th>created_at</th>
              <th>updated_at</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($streams as $row)
                    
                
            <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->stream_type}}</td>              
              <td>{{$row->created_at}}</td>
              <td>{{$row->updated_at}}</td>                              
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>id</th>
                <th>stream_type</th>               
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            </tfoot>
            
    </div>
      
    
</section>

@endsection