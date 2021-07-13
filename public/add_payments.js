$('#make_payment').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('payment_data') // Extract info from data-* attributes
    
    var modal = $(this)

   

    data_array = recipient.split(",");

    modal.find('.modal-footer #submit_payment').val(data_array[3])

    $('#payment_type').on('change', function() {
      payment_type_id = $(this).find(":selected").val() ;
      console.log(data_array[3])
      fetchPaymentLoad(data_array[1],payment_type_id,data_array[3]);
      
  });
      payment_type_id = $("#payment_type option").filter(":selected").val();
      
    

    
    modal.find('.modal-body #student_id').text("Student ID: "+data_array[0])
    modal.find('.modal-body #student_name').text("Student Name: "+data_array[2])
  })
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
                 rows += '<h3 class ="text-success">'+d.payment_type+' '+d.amount+' birr'+ '</h3>'+
                          '<input value="'+d.load_id+'" hidden name="load_id">' +
                          '<input value="'+d.amount+'" hidden name="amount">' 
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