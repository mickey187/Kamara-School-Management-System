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
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                <th></th>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>Assesment</th>
                <th>MidExam</th>
                <th>Final Exam</th>
                <th>total(100%)</th>
                <th>
                  <button class="btn btn-sm btn-success"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
              </th>


              </tr>
          </thead>

          <tbody>


              <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                 <td><button class="btn btn-default btn-xs"><i class="fas fa-sort-down"></i></button></td>
                 <td>1. </td>
                 <td>Abeselom abebe tadesse ghjjmnh </td>
                  <td>66</td>
                  <td>30</td>
                  <td>40</td>
                  <td>99</td>

              </tr>

              <tr>
                  <td colspan="12" class="hiddenRow">
                                  <div class="accordian-body collapse" id="demo1">
                    <table class="table table-bordered table-striped">
                            <thead>
                              <tr class="info">
                                                           <th>No.</th>
                                                          <th>Class work</th>
                                                          <th>Home Work</th>
                                                          <th>Assignment</th>
                                                          <th>Quize</th>
                                                          <th>W.S</th>

                                                            <th>action</th>
                                                            <th>
                                                                <button class="btn btn-sm btn-success"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
                                                            </th>
                                                      </tr>
                                                  </thead>

                                                  <tbody>

                              <tr data-toggle="collapse"  class="accordion-toggle " data-target="#demo10">
                                                          <td>1.</td>
                                                          <td contenteditable="true"> 5</td>
                                                          <td>5</td>
                                                          <td>10 </td>
                                                          <td> 3</td>
                                                          <td>6</td>

                                                          <td><button class="btn btn-sm btn-success"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                                         <button class="btn btn-sm btn-info "><span><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></button>
                                                         <button class="btn btn-sm btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                                         <th>
                                                          <button class="btn btn-sm btn-success"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
                                                      </th>
                                                        </tr>

                                                       <tr>


                              <tr>
                                                           <td>2.</td>
                                                          <td>3</td>
                                                          <td>8</td>
                                                          <td>2</td>
                                                          <td>6 </td>
                                                          <td>9</td>

                                                          <td><button class="btn btn-sm btn-success"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                                              <button class="btn btn-sm btn-info "><span><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></button>
                                                              <button class="btn btn-sm btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button>
                                                              <th>
                                                                <button class="btn btn-sm btn-success"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
                                                            </th>
                                                          </td>



                                                      </tr>


                              <tr>
                                                           <td>3.</td>
                                                          <td>3</td>
                                                          <td>2</td>
                                                          <td>7 </td>
                                                          <td>5</td>
                                                          <td>6</td>

                                                          <td><button class="btn btn-sm btn-success"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                                              <button class="btn btn-sm btn-info "><span><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></button>
                                                              <button class="btn btn-sm btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                                              <th>
                                                                <button class="btn btn-sm btn-success"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
                                                            </th>

                                                      </tr>


                              <tr>
                                  <td>4.</td>
                                  <td>3</td>
                                  <td>2</td>
                                  <td>7 </td>
                                  <td>5</td>
                                  <td>6</td>

                                  <td><button class="btn btn-sm btn-success"><span><i class="fa fa-eye" aria-hidden="true"></i></span></button>
                                      <button class="btn btn-sm btn-info "><span><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></button>
                                      <button class="btn btn-sm btn-danger"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button></td>
                                      <th>
                                        <button class="btn btn-sm btn-success"><span><i class="fa fa-plus" aria-hidden="true"></i></span></button>
                                    </th>
                                                      </tr>


                            </tbody>

                         </table>

                    </div>
                </td>
              </tr>



                                                      </tbody>
      </table>



      </div>
    </div>
    <!-- /.card -->
  </div>
</div>












@endsection
