@extends('layouts.master')
@section('content')


<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Payment Load</h3>
  </div>
  <div class="card-body">
    <section class="content">
      <div class="container-fluid mt-3">

<form action="{{url('/addPaymentLoad')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">

          <div class="form-group">
            <label for="exampleFormControlInput1">Payment Type</label>
            <select name="select_payment_type" id="payment_type" class="form-control">
                @foreach ($payment_load as $row)
                    <option value="{{$row->id}}">{{$row->payment_type}}</option>
                @endforeach
            </select>

          </div>

          <div class="form-group">
              <label for="">Select Class</label>
            <select name="select_class" id="class_id" class="form-control">
                @foreach ($class as $row)
                    <option value="{{$row->id}}">{{$row->class_label}}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
              <label for="">Enter Amount in Birr</label>
              <input type="text" class="form-control" placeholder="Enter Amount" name="payment_amount">
          </div>


          <button type="submit" class="btn btn-primary btn-md">Submit</button>
        </div>
      </div>
</form>

    </div>    
</section>
</div>
</div>

@endsection