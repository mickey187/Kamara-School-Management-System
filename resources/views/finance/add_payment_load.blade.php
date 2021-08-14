@extends('layouts.finance_view')
@section('content')


<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Payment Load</h3>
  </div>
  <div class="card-body">
    <section class="content">
      <div class="container-fluid mt-3">

{{-- <form action="{{url('finance/addPaymentLoad')}}" method="post">
    @csrf --}}
    <div class="row">
        <div class="col-6">
         
          {{-- <div class="form-group">
            <label for="exampleFormControlInput1">Payment Type</label>
            <select name="select_payment_type" id="payment_type" class="form-control">
                @foreach ($payment_type as $row)
                    <option value="{{$row->id}}">{{$row->payment_type}}</option>
                @endforeach
            </select>

          </div> --}}

          <div class="form-group">
              <label for="">Select Class</label>
            <select  id="class_id" class="select2" multiple="multiple" style="width: 100%"data-placeholder="Select Class" name="select_classes[]">
                @foreach ($class as $row)
                    <option value="{{$row->id}}">{{$row->class_label}}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
              <label for="">Enter Amount in Birr</label>
              <input type="text" class="form-control" placeholder="Enter Amount" name="payment_amount" id="payment_amount">
          </div>


          <button type="submit" class="btn btn-primary btn-md" id="add_paymnet_load_btn">Submit</button>
        </div>
      </div>
{{-- </form> --}}

<div class="row mt-5">
  <div class="col-12">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Payment Type</th>  
        <th>Class Label</th>                   
        <th>Amount in Birr</th>  
        <th>Action</th>  
                                                                              
      </tr>
      </thead>
      <tbody>
          @foreach ($payment_load as $row)                                            
      <tr>
        <td>{{$row->load_id}}</td> 
        <td>{{$row->payment_type}}</td>                   
        <td>{{$row->class_label}}</td>    
        <td>{{$row->amount}}</td>     
                    
        <td>

          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view_payment_load_modal" 
          data-view_payment_load="{{$row->load_id}},{{$row->payment_type}},{{$row->class_label}},{{$row->amount}}">
              <i class="fa fa-eye" aria-hidden="true"></i>
          </button>

          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_payment_load_modal" 
          data-edit_payment_load="{{$row->load_id}},{{$row->payment_type_id}},{{$row->class_id}},{{$row->amount}}">
              <i class="fas fa-pencil-alt" aria-hidden="true"></i>
          </button>

            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_payment_load_modal" 
            data-delete_payment_load_modal="{{$row->load_id}},{{$row->payment_type}},{{$row->class_label}},{{$row->amount}}">
              <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
        </td>  
                                                                                                                                      
      </tr>
      @endforeach
  </tbody>
  {{-- <tfoot>
      <tr>        
        <th>id</th>             
        <th>class label</th>   
        <th>stream</th>                 
        <th>action</th>                                                                                
      </tr>
      </tfoot> --}}
  </table>
  </div>
</div>

<div class="modal fade" id="view_payment_load_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Payment Load</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card" style="width: 28rem;">
          <div class="card-body" id="card_register">
        <h5 class="text-primary" id="payment_load_id_view"></h5>
        <h5 class="text-primary" id="payment_type_view"></h5>
        <h5 class="text-primary" id="class_label_view"></h5>
        <h5 class="text-primary" id="amount_view"></h5>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="edit_payment_load_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Payment Load</h5>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label for="payment_type_edit">Select Payment Type</label>
              <select name="select_payment_type" id="payment_type_edit" class="form-control">
          @foreach ($payment_type as $row)
              <option value="{{$row->id}}">{{$row->payment_type}}</option>
          @endforeach
      </select>
            </div>

            <div class="form-group">
              <label for="">Select Class</label>
            <select  id="class_id_edit_val" class="form-control" placeholder="Select Class" name="select_classes[]">
                @foreach ($class as $row)
                    <option value="{{$row->id}}">{{$row->class_label}}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Enter Amount in Birr</label>
            <input type="text" class="form-control" placeholder="Enter Amount" name="payment_amount" id="payment_amount_edit">
        </div>
            
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel_edit_payment_load_modal">Cancel</button>
        <button type="button" class="btn btn-success" id="save_changes_payment_load">Save Changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete_payment_load_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Payment Load</h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card" style="width: 28rem;">
          <div class="card-body" id="card_register">
        <h5 class="text-primary" id="payment_load_id_delete"></h5>
        <h5 class="text-primary" id="payment_type_delete"></h5>
        <h5 class="text-primary" id="class_label_delete"></h5>
        <h5 class="text-primary" id="amount_delete"></h5>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete_payment_load_modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="delete_payment_load">Delete Payment Load</button>
      </div>
    </div>
  </div>
</div>

    </div>    
</section>
</div>
</div>

@endsection