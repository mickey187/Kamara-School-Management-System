@extends('layouts.finance_view')
@section('content')


<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Stream</h3>
  </div>
  <div class="card-body">
    <section class="content">
      <div class="container-fluid mt-3">

<form action="{{url('/addPaymentType')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Payment Type</label>
            <input type="text" name ="payment_type" class="form-control" id="exampleFormControlInput1" 
            placeholder="Payment Type">
          </div>

          <div class="form-group">
            <label for="select_recurring">Select Recurring</label>
            <select name="recurring_type" id="select_recurring" class="form-control">
              <option value="recurring">Recurring</option>
              <option value="non-recurring">Non Recurring</option>
            </select>
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