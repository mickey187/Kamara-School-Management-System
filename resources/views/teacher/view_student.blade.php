@extends('teacher.teacher_master')
@section('content_teacher')
<div class="card card-orange ">
    <div class="card-header">
    <h3 class="card-title text-white"> <i class="nav-icon fas fa-users"></i> List of Student</h3>
    </div>
    <div class="card-body ">
        <div class="row text-center">
            <?php
                $section = '';
                ?>
            @foreach ($courses as $key => $val)
                @foreach ($val as $row)
                    @if ($section == '' && $section !== $row->section_name)
                        <?php
                        $section = $row->section_name;
                        ?>
                        <div class="col-lg-3">
                            <a href="#"
                                data-toggle="modal"
                                data-target="#modal-class"
                                data-detail3="
                                            {{$row->class_label}},
                                            {{$row->section_name}}">
                                <div class="small-box bg-primary">
                                    <div class="inner p-3">
                                        <p> {{ $row->class_label }} Section {{ $key }}</p><br>
                                    </div>
                                    <div class="icon"><br>
                                      <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                  </div>
                            </a>
                        </div>
                    @endif
                @endforeach
                <?php
                 $section = '';
                 ?>
            @endforeach
        </div>
    </div>
</div>

    <!-- /.modal-dialog -->
    <div class="modal_class">
        <div class="modal fade" id="modal-class">
          <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">List Of Students</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="content">
                        <div class="container-fluid">
                            <h2 class="text-center display-4">Search</h2>
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <form action="simple-results.html">
                                        <div class="input-group">
                                            <input type="search" class="form-control form-control-lg" placeholder="Search Student By Name">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-lg btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <br>
                    {{-- <br> <p onclick="findMyStudent();" style="cursor: pointer;" class="text-primary">all students</p> --}}
                    <div >
                        <input id="isOpen" class="" type="text" hidden value="false">
                        <table   class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Full name</th>
                                    <th>Sex</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="listOfStudents">

                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>

                </div>
                <div class="modal-footer justify-content-between">
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->

        </div>
    </div>

<!-- Modal -->
<!-- View Student -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection
