@extends('layouts.master')
@section('content')

   
 
<div class="card">
  <div class="card-header text-center bg-orange">
   Import Grade
  </div>

   <div class="card">
<div class="card-body">
               
<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">

  
      <form class="col-6">
       
          <div class="form-group ">
            <label for="inputEmail4">Grade</label>
            <select id="inputState" class="form-control">
              <option selected>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
          </div>
          <div class="form-group ">
           
          </div>
       
        
        <div class="form-group">
          <label for="inputAddress">Section</label>
          <select id="inputState" class="form-control">
            <option selected>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            <option>F</option>
          </select>
        </div> 
        
        
        <div class="form-group ">
          <label for="inputAddress2">Load</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder=>
        </div>
        
        
          <div class="form-group ">
            <label for="inputAddress">Type</label>
            <select id="inputState" class="form-control">
              <option selected>Final Exam</option>
              <option>Mid Exam</option>
              <option>Assesment</option>
            </select>
          </div> 
         
          
        

            <div class="form-group ">
            <input type="file" class="form-control-file border" id="exampleFormControlFile1">
          </div>
      
         
        
      
      
       <button class="btn btn-primary" type="submit">Import</button> 
      </form>
</div>
  
</div>
</div>
   

</div>




<div class="col-12 col-sm-12">
  <div class="card card-orange card-tabs">
    <div class="card-header p-0 pt-1">
      <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
        <li class="pt-2 px-3"><h3 class="card-title">MarkList</h3></li>
        <li class="nav-item">
          <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Quarter1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Quarter2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Quarter3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Quarter4</a>
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