@extends('layouts.master')
@section('content')
<div class="card">
<div class="col-12 col-sm-12">
  <div class="card card-orange card-tabs">
    <div class="card-header p-0 pt-1">
      <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
        <li class="pt-2 px-3"><h3 class="card-title">MarkList</h3></li>
        <li class="nav-item">
          <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Quarter1</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-two-tabContent">
        <div class="callout callout-info ">
            <div class="row">
                <div class="col-lg-3" >
                    <div class="col-lg-12 col-sm-12">
                        <div>
                            <label> NAME:</label>   {{ $student->first_name.' '.$student->middle_name.' '.$student->last_name }}
                         </div>
                        <div>
                            <label> ID:</label>  {{ $student->student_id }}
                        </div>
                        <div>
                            <label> GENDER:</label>  {{ $student->gender }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    <table class="table table-bordered table-striped">
            <thead>
                <tr class="info">
                    <th>No.</th>
                    <th>Assasment</th>
                    <th>Mark</th>
                    <th>Subject</th>
                    <th>Test Load</th>
                    <th>action</th>

                </tr>
            </thead>

            <tbody>
                <?php
                    $counter = 0;
                    ?>
                @foreach ($mark as $row)
                    {{-- <tr data-toggle="collapse"  class="accordion-toggle " data-target="#demo10"></i></button></td> --}}
                    <td>{{ $counter = $counter+1 }}</td>
                    <td>{{ $row->assasment_type }}</td>
                    <td>{{ $row->mark }}</td>
                    <td>{{ $row->subject_name }}</td>
                    <td>{{ $row->test_load }}</td>
                    <td><button class="btn btn-sm btn-success"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                        <button class="btn btn-sm btn-info "><span><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></button>
                        <button class="btn btn-sm btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                    </tr>
                @endforeach
            </tbody>
            </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>












@endsection
