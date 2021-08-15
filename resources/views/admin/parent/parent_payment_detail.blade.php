@extends('layouts.parent_master')
@section('content')


<div class="container-fluid">
    <div class="card card-orange">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                <li class="nav-item">
                    <a class="nav-link active text-bold" data-toggle="tab" href="#unpaid_bill_tab" role="tab">Unpaid Bills</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-bold" data-toggle="tab" href="#payment_history_tab" role="tab" id="payment_history_link">Payment History</a>
                </li>

            </ul>
        </div>

        <div class="card-body">
            <div class="tab-content text-center">
                <div class="tab-pane active" role="tabpanel" id="unpaid_bill_tab">
                    <p>Unpaid Bills</p>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped" id="unpaid_bill_table">
                                <thead>
                                    <tr>
                                        <th>Payment Type</th>
                                        <th>Amount</th>
                                        <th>Month</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unpaid_bills as $key)
                                        @foreach ($key as $key2 )
                                            <tr>
                                                <td>{{$key2["payment_type"]}}</td>
                                                <td>{{$key2["amount_payed"]}}</td>
                                                <td>{{$key2["payment_month"]}}</td>
                                                <td>{{$key2["status"]}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" role="tabpanel" id="payment_history_tab">
                    <p>Paid Bills</p>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Payment Type</th>
                                        <th>Amount</th>
                                        <th>FS Number</th>
                                        <th>Month</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result_history as $key)
                                    
                                    
                                    <tr>
                                        <td>{{$key["first_name"]." ".$key["middle_name"]." ".$key["last_name"]}}</td>
                                        <td>{{$key["payment_type"]}}</td>
                                        <td>{{$key["amount_payed"]}}</td>
                                        <td>{{$key["fs_number"]}}</td>
                                        <td>{{$key["payment_month"]}}</td>

                                    </tr>
                                    
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>

@endsection