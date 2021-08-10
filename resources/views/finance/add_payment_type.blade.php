@extends('layouts.finance_view')
@section('content')


<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Add Stream</h3>
  </div>
  <div class="card-body">
    <section class="content">
      <div class="container-fluid mt-3">

{{-- <form action="{{url('finance/addPaymentType')}}" method="post">
    @csrf --}}
    <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">Payment Type</label>
            <input type="text" name ="payment_type" class="form-control" id="payment_type" 
            placeholder="Payment Type">
          </div>

          <div class="form-group">
            <label for="select_recurring">Select Recurring</label>
            <select name="recurring_type" id="select_recurring" class="form-control">
              <option value="recurring">Recurring</option>
              <option value="non-recurring">Non Recurring</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary btn-md" id="add_payment_type">Submit</button>
        </div>
      </div>

      
{{-- </form> --}}
<div class="row mt-5">
        <div class="col-12">
          <table id="example1" class="table table-bordered table-striped">
            <thead >
              <tr>
                <th>id</th>
                <th>payment type</th>
                <th>recurring type</th>
                <th>action</th>
              </tr>
              </thead>
              <tbody id="table_body">
                @foreach ($view_payment_type as $row)
                  <tr id="{{$row->id}}">
                  <td>{{$row->id}}</td>
                  <td>{{$row->payment_type}}</td>
                  <td>{{$row->recurring_type}}</td>
                  <td>
                    <button class="btn btn-success btn-sm"
                    data-toggle="modal" 
                   data-target="#view_payment_type" 
                   data-view_payment_type="{{$row->id}},{{$row->payment_type}},{{$row->recurring_type}}">
                     <i class="fa fa-eye" aria-hidden="true"></i>
                   
                   </button>

                   <button class="btn btn-info btn-sm"
                    data-toggle="modal" 
                   data-target="#edit_payment_type" 
                    data-edit_payment_type="{{$row->id}},{{$row->payment_type}},{{$row->recurring_type}}">
                     <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                   
                   </button>

                   <button class="btn btn-danger btn-sm" data-toggle="modal" 
                   data-target="#delete_payment_type" 
                    data-delete_payment_type="{{$row->id}},{{$row->payment_type}},{{$row->recurring_type}}">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    
                  </button>
                  </td>
                </tr>
                @endforeach
                
                
                
              </tbody>
          </table>
        </div>
      </div>


      <div class="modal fade" id="view_payment_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">View Payment Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="card" style="width: 28rem;">
                <div class="card-body" id="card_register">
                  <h5 id="payment_type_id" class="text-primary"></h5>
                  <h5 id="payment_types" class="text-primary"></h5>
                  <h5 id="recurring_type" class="text-primary"></h5>
                  
                
                
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
              
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="edit_payment_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Payment Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-8">

                    <div class="form-group">
                <label for="payment_type_edit">Payment Type</label>
                <input type="text" class="form-control" id="payment_type_edit" placeholder="Payment Type">

                
              </div>
              
              <div class="form-group">
                <select name="recurring_type" id="select_recurring_edit" class="form-control">
                  <option value="recurring">Recurring</option>
                  <option value="non-recurring">Non Recurring</option>
                </select>
              </div>
                </div>
              </div>

            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cance_edit_modal">Cancel</button>
              <button type="button" class="btn btn-info" id="save_changes" >Save Changes</button>
              
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="delete_payment_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Payment Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <h5 id="payment_type_id_delete" class="text-primary"></h5>
                  <h5 id="payment_types_delete" class="text-primary"></h5>
                  <h5 id="recurring_type_delete" class="text-primary"></h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="cancel_delete_modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="delete_payment_type">Delete</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>    
</section>
</div>
</div>

@endsection