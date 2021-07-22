
var send_pay_total_detail = [];
var student_id_for_total_payment = null;
// the below code launches make payment modal
$('#make_payment').on('show.bs.modal', function (event) {
  
  


    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('payment_data') // Extract info from data-* attributes
    $('#payment_type').attr('selected', 'none');
    $('#payment_load').empty();
    $('#submit_payment').hide();
    $('#pay_total').hide();

    
    var modal = $(this)

    

    data_array = recipient.split(",");

    modal.find('.modal-footer #submit_payment').val(data_array[3])

    $('#payment_type').on('change', function() {
      payment_type_id = $(this).find(":selected").val();

      if (payment_type_id == 'total') {

        
        fetchTotalPaymentLoad(data_array[1],data_array[3]);
        console.log("selected total");
        $('#pay_total').show();
        $('#submit_payment').hide();
        
      }

      else{
      
      console.log(data_array[3])
      fetchPaymentLoad(data_array[1],payment_type_id,data_array[3]);
      $('#submit_payment').show();
      $('#pay_total').hide();
      }
      
  });
     // payment_type_id = $("#payment_type option").filter(":selected").val();

     
      
    

    
    modal.find('.modal-body #student_id').text("Student ID: "+data_array[0])
    modal.find('.modal-body #student_name').text("Student Name: "+data_array[2])
  })


  function fetchTotalPaymentLoad(class_id,stud_id){
    $.ajax({
      type: 'GET',
      url: '/fetchTotalPaymentLoad/'+class_id+'/'+stud_id,
      dataType: 'json',
      success: function (data) {
        var rows = '';
        
        console.log(data);
        var data1 = JSON.parse(JSON.stringify(data.result_load));
        //console.log(data1);
       // Array.prototype.push.apply(send_pay_total_detail, data1);
       send_pay_total_detail = data1.slice();

        student_id_for_total_payment = stud_id;
       
        data1.forEach(payment_load =>{
          hidden_select = '<div class="form-group">'+
                          '<select name="select_payment_type" id="payment_type_total" name="pay_type[]"class="form-control" multiple hidden>'+
                          '<option value="'+payment_load+'"selected></option>'+
                          '</select>'+
                           '</div>'

        });
        
        var data2 = JSON.parse(JSON.stringify(data.total_load));
            data2.forEach(d=>{
              rows = '<h3 class ="text-success">Total: '+d.total_load+' Birr</h3>';
            })
        //var rows = '<h3 class ="text-success">Total: '+data2+' Birr</h3>';
        $('#payment_load').html(rows);

        // $('#pay_total').click(function () { 
        //   var month = $('#select_month').val();
        //   $.ajax({
        //     type: 'GET',
        //     url: '/makeTotalPayment/'+stud_id+'/'+month,
        //     data: {'detail':data1},
        //     dataType:'json',
        //     success: function (response) {

        //       // $('.close').click();
        //       // Swal.fire(
        //       //   'Payed Successfully!',
                
        //       // );
             
              
        //     }
        //   });
           
        //  });
        
      }
    });
  }


  function fetchPaymentLoad(class_id, pay_type, stud_id) {
    $.ajax({
        type: 'GET', 
        url: 'fetchload/'+class_id+'/'+pay_type+'/'+stud_id,
        dataType : 'json',
        
        success:function (data) {
           var rows = '';
            console.log(data);
            
            data.forEach(d => {
               
                // rows+= 
                if (d.amount == 'already payed') {
                  rows += '<h3 class ="text-success">'+d.payment_type+': '+d.amount+ '</h3>'+
                          '<input value="'+d.load_id+'" hidden name="load_id">' +
                          '<input value="'+d.amount+'" hidden name="amount">' 
                  
                }
                else{
                 rows += '<h3 class ="text-success">'+d.payment_type+': '+d.amount+' birr'+ '</h3>'+
                          '<input value="'+d.load_id+'" hidden name="load_id">' +
                          '<input value="'+d.amount+'" hidden name="amount">' 
                        }
           });
          $('#payment_load').html(rows);
           
        },
        error:function (data) {

        }
     }); 
  }



  $('#view_payment_history').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('payment_history') // Extract info from data-* attributes

    
    
    var stud_id = recipient;
    fetchPaymentHistory(stud_id);
    var modal = $(this)
    modal.find('.modal-title').text("Payment History")
    modal.find('.modal-body input').val(recipient)



  });






 function fetchPaymentHistory(stud_id) {

    $.ajax({
      type: 'GET', 
      url: 'fetchpaymenthistory/'+stud_id,
      dataType : 'json',
      
      success:function (data) {
         var rows = '';
          console.log(data);
           data.forEach(d => {
             
              // rows+= 
               rows += '<tr>'+
                       '<td>'+d.first_name +' '+ d.middle_name +' '+ d.last_name +'</td>'+
                       '<td>'+d.payment_type +'</td>'+
                       '<td>'+d.amount_payed +'</td>'+
                       '<td>'+d.payment_month +'</td>'+
                       '</tr>'
                       
         });
        $('#payment_history').html(rows);
         
      },
      error:function (data) {

      }
   });
  }

 


  $('#pay_total').click(function () { 
    var month = $('#select_month').val();
   // console.log(student_id_for_total_payment+' '+month);
    $.ajax({
      type: 'GET',
      url: '/makeTotalPayment/'+student_id_for_total_payment+'/'+month,
      data: {'detail':send_pay_total_detail},
      dataType:'json',
      cache: false,
      success: function (response) {
        console.log(response);
       
       
        
        Swal.fire(
          'Payed Successfully!',
          
        );
        $('.close').click();
        
        //$('#view_payment_history').modal('show')
       // location.reload();
       
        
      }
    });
     
   });