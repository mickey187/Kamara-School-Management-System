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
                        <div class="col-6 form">
                            <div class="form-group">
                                <label>Add Semister</label>
                                <input class="form-control" type="text" name="semister" placeholder="semister">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Add Term</label>
                                    <input class="form-control" type="text" name="term" placeholder="Term">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="select_class">Select Class Label</label>
                                <select class="form-control select2" name="year"  data-placholder="year">
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md btn-block" >Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                <div class="table">
                    <table id="example1"  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Semister</th>
                                <th>Term</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 0;
                            ?>
                            @foreach ($semister as $row)
                                <tr>
                                    <td>{{ $count = $count + 1 }}</td>
                                    <td>{{ $row->semister }}</td>
                                    <td>{{ $row->term }}</td>
                                    <td>{{ $row->year }}</td>
                                </tr>
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
