@extends('layouts.master')
@section('content')

<div class="card card-orange">
  <div class="card-header">
    <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i>
      @if (isset($editSubject))
       {{'Edit'}}
      @else
       {{'Add'}}
    @endif  Subject</h3>
</div>
<div class="card-body">
  <section class="content">
    <div class="container-fluid mt-3">
      <!-- SELECT2 EXAMPLE -->

        <!-- /.card-header -->
        <form action="
          @if (isset($editSubject))
        {{url('editsubjectvalue/'.$editSubject->id)}}
       @else
        {{url('/addsubject')}}
     @endif " method="POST">
          @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                     

                      </div>

                      <div class="form-group">
                        <label for="subjectName">Subject Name</label>
                        <input type="text" name ="subject_name" class="form-control"  id="subjectName" placeholder="Subject Name"
                         @if (isset($editSubject))
                         value="{{$editSubject->subject_name}}"

                     @endif  >

                       @if ($errors->any())                  
                  
                      <div class="alert alert-danger">
                          <ul>
                          @foreach ($errors->get('subject_name') as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                      </div>
                  @endif

                      </div>
                      <button type="submit" id="saveSubjectz" class="btn btn-primary btn-md btn-block">
                        @if (isset($editSubject))
                        Save Changes

                        @else
                        Save
                      @endif </button>

                </div>

            </div>
          </form>







        <!-- /.card-body -->
        <div class="card-footer mt-3">

        </div>


    </div>

  </section>
</div>
</div


@endsection
