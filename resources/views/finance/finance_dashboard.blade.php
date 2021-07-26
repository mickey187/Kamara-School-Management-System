@extends('layouts.finance_view')
@section('content')

<div class="card card-orange">
    <div class="card-header">
      <h3 class="card-title"> <i class="fas fa-tachometer-alt"></i> Finance Dashboard</h3>
  </div>
  <div class="card-body">
    <section class="content">
      <div class="container-fluid mt-3">


    <div class="row">
        <div class="col-lg-4 col-6">
          
            <div class="small-box bg-success" role="button">
                <div class="inner">
                  <h3>{{$total_value." Birr"}}</h3>
  
                  <p>Toatal Payments Collected <br> This Month</p>
                </div>
                <div class="icon">
                    <i class="fas fa-coins"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              

        </div>

        <div class="col-lg-4 col-6">

            <div class="small-box bg-warning" role="button">
                <div class="inner">
                  <h3>{{$total_value." Birr"}}</h3>
  
                  <p>Toatal Payments Collected <br>This Month</p>
                </div>
                <div class="icon">
                    <i class="fas fa-coins"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              

        </div>

        <div class="col-lg-4 col-6">

            <div class="small-box bg-danger" role="button">
                <div class="inner">
                  <h3>{{$total_value." Birr"}}</h3>
  
                  <p>Toatal Payments Collected <br>This Month</p>
                </div>
                <div class="icon">
                    <i class="fas fa-coins"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              

        </div>
    </div>


  </div>    
</section>
</div>
</div>
    <script>
      $("#btn").click(function (e) { 
        e.preventDefault();
        alert("hello mate")
       // $('#nav_finance').click();
        
        
      });
    </script>
@endsection