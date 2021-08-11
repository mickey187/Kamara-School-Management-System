


$('#add_paymnet_load_btn').click(function () { 
   var payment_type_selected = $('#payment_type').val();
   var class_selected = $('#class_id').val();
   var payment_amount = $('#payment_amount').val();
$.ajax({
    type: "GET",
    url: "/finance/addPaymentLoad/"+class_selected,
    data: {payment_type_selected,payment_amount},
    dataType: "json",
    success: function (data) {
        data1 = JSON.parse(JSON.stringify(data.status));
        data2 = JSON.parse(JSON.stringify(data.payment_load));
        console.log(data2);
        if (data1 == "success") {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Added Successfully!',
              
              });
        }


        
    }
});
    
});

$('#view_payment_load_modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('view_payment_load') // Extract info from data-* attributes
    var data = recipient.split(",");

    $('#payment_load_id_view').text("ID: "+[data[0]]);
    $('#payment_type_view').text("Payment Type: "+data[1])
    $('#class_label_view').text("Class Label: "+data[2]);
    $('#amount_view').text("Amount: "+data[3]);
    var modal = $(this)
    
  });


  $('#edit_payment_load_modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('edit_payment_load') // Extract info from data-* attributes
    var data = recipient.split(",");
    
    $('#payment_type_edit').val(data[1]); 
    $('#class_id_edit_val').val(data[2]);
    $('#payment_amount_edit').val(data[3]);

    $('#save_changes_payment_load').click(function () { 
        var payment_type_edit = $('#payment_type_edit').val(); 
        var class_id_edit_val = $('#class_id_edit_val').val();
        var payment_amount_edit = $('#payment_amount_edit').val();
        var load_id = data[0];

        $.ajax({
            type: "GET",
            url: "/finance/editPaymentLoad",
            data: {load_id,payment_type_edit,class_id_edit_val,payment_amount_edit},
            dataType: "json",
            success: function (response) {
                if (response == "success") {
                    $('#cancel_edit_payment_load_modal').click();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Edited Successfully!',
                      
                      });
                }
                
            }
        });

        
    });

    var modal = $(this)
    
  });

  $('#delete_payment_load_modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('delete_payment_load_modal'); // Extract info from data-* attributes
    var data = recipient.split(",");
    $('#payment_load_id_delete').text("ID: "+[data[0]]);
    $('#payment_type_delete').text("Payment Type: "+data[1])
    $('#class_label_delete').text("Class Label: "+data[2]);
    $('#amount_delete').text("Amount: "+data[3]);
    

    $('#delete_payment_load').click(function () {
        
        
         var load_id_delete = data[0];
         
        
        $.ajax({
            type: "GET",
            url: "/finance/deletePaymentLoad",
            data: {load_id_delete},
            dataType: "json",
            success: function (response) {
                if (response == "success") {
                    $('#cancel_delete_payment_load_modal').click();
                      
                    Swal.fire({
                        icon: 'info',
                        title: 'Deleted',
                        text: 'One item deleted!',
                      
                      });
                };
                
            }
        });

        
        
    });
    
    var modal = $(this)
    
  });