@extends('teacher.teacher_master')
@section('content_teacher')
<div class="card">
<div class="col-12 col-sm-12">
  <div class="card card-orange card-tabs">
    <div class="card-header p-0 pt-1">
      <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
        <li class="pt-2 px-3"><h3 class="card-title">MarkList</h3></li>
        <li class="nav-item">
          <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">2013</a>
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
        <?php
            $counter = 0;
            $isSame = '';
        ?>
        @foreach ($total_term as $per)
        <br>
        <div class="card callout callout-info">
            <table  class="table  table-striped">
                <thead>
                    <tr>
                        <th colspan="6">{{ $per }}</th>
                    </tr>
                    <tr class="info">
                        <th>No</th>
                        <th>Subject</th>
                        <th>Total</th>
                        {{-- <th>action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $counter2 = 0;
                        $subject = '';
                        ?>
                    @foreach ($mark as $row)
                        @if ($per =='Semister '.$row->semister.' '. $row->term)
                        @if ($subject == $row->subject_name)
                            @continue
                        @else
                        <tr style="cursor: pointer;" data-toggle="collapse" data-target="#demo1{{$counter2.$row->semister.$row->term}}" class="accordion-toggle">
                            <td>{{ $counter = $counter+1 }}</td>
                            <?php
                                $total = 0;
                                $persent = 0;
                                    foreach ($mark as $row3){
                                        if ($per=='Semister '.$row3->semister.' '. $row3->term) {
                                            if ($row->subject_name == $row3->subject_name) {
                                                $total = $total + $row3->mark;
                                                $persent = $persent + $row3->test_load;
                                            }
                                        }
                                    }
                            ?>
                            <td>{{ $row->subject_name }}</td>
                            <td>{{ $total.'/'.$persent }}</td>
                        </tr>
                        <tr>
                            <td colspan="12" class="hiddenRow">
                                <div class="accordian-body collapse" id="demo1{{$counter2.$row->semister.$row->term}}">
                                    <table class="table  table-striped table-primary">
                                        <thead>
                                            <tr class="info">
                                                <th>No</th>
                                                <th>Assignment</th>
                                                <th>Mark</th>
                                                <th>Subject</th>
                                                <th>Load</th>
                                                <th>Edit</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                        @foreach ($mark as $rm)
                                        @if ($rm->subject_name == $row->subject_name)
                                        <tr>
                                            <td></td>
                                            <td>{{ $rm->assasment_type }}</td>
                                            <td>{{ $rm->mark }}</td>
                                            <td>{{ $rm->subject_name }} </td>
                                            <td>{{ $rm->test_load }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info "><span><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></button>
                                            </td>
                                        </tr>
                                        @endif

                                        <?php
                                        $counter2 = $counter2 + 1;
                                        ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <?php
                            $subject = $row->subject_name
                        ?>
                        @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
            <?php
            $counter = 0;
        ?>
        </div>
        @endforeach
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection
