@extends('layouts.master')
@section('content')
<div class="card card-orange">
        <div class="card-header">
            <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i>Add Semister</h3>
        </div>
        <div class="card-body ">
          <section class="content">
            <div class="container-fluid mt-3">
                <form action="{{url('addSemisterI')}}">
                    @csrf
                    <div class="row" style="margin-top: 10px">
                        <div class="row col-12 form">
                            <div class="col-4form-group">
                                <label>Add Semister</label>
                                <input class="form-control" type="text" name="semister" placeholder="semister">
                            </div>
                            <div class="col-4 form-group">
                                <div class="form-group">
                                    <label>Add Term</label>
                                    <input class="form-control" type="text" name="term" placeholder="Term">
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="row col-6">
                                    <div class="form-group"><br>
                                        <button type="submit" class="btn btn-primary btn-md btn-block" >Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pl-3">
                            <label for="inputEmail4">Grade</label>
                            <select name="grade" id="inputState" class="form-control">
                              @foreach ($semister as $row)
                              <option  value="{{ $row->id }}"
                                @if ($row->current_semister==true)
                                    selected
                                @endif
                                >{{'Semister '.$row->semister.' '.$row->term}}</option>
                              @endforeach
                            </select>
                          </div>
                </form>
                <div class="table">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Semister</th>
                                <th>Term</th>
                            </tr>
                        </thead>
                        <tbody id="semister_page">
                            <?php
                                $count = 0;
                                $isCurrent = false;
                            ?>
                            @foreach ($semister as $row)
                            @if ($row->current_semister == true)
                                <?php
                                    $isCurrent = 'true';
                                ?>
                                <tr class="bg-secondary ">
                                    <td class="">{{ $count = $count + 1 }}</td>
                                    <td>{{ $row->semister }}</td>
                                    <td>{{ $row->term }}</td>
                                </tr>
                            @else
                                <?php
                                    $isCurrent = 'false';
                                ?>
                                <tr>
                                    <td>{{ $count = $count + 1 }}</td>
                                    <td>{{ $row->semister }}</td>
                                    <td>{{ $row->term }}</td>
                                </tr>
                            @endif

                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>

          </section>
    </div>
</div>

@endsection
