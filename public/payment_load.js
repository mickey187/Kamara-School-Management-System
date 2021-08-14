
$('#add_payment_load_tab_link').click(function () { 
    $.ajax({
        type: "GET",
        url: "/finance/fetchPaymentLoadDetail",
        data: "data",
        dataType: "json",
        success: function (data) {
            $('#payment_type_select').empty()
            console.log(data);
            payment_type = JSON.parse(JSON.stringify(data.payment_type));
            class_detail = JSON.parse(JSON.stringify(data.class_detail));
            console.log(payment_type);
            payment_type.forEach(element => {
               
                $('#payment_type_select').append('<option value="'+element.id+'">'+
                                       element.payment_type+'</option>');
                                  
                                  
               
            });
            class_detail.forEach(element => {
                $('#class_id').append('<option value="'+element.id+'">'+
                element.class_label+'</option>');
            });
        }
    });
    
});


$('#add_paymnet_load_btn').click(function () { 
   var payment_type_selected = $('#payment_type_select').val();
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

$('#view_payment_load_tab_link').click(function () { 

    $.ajax({
        type: "GET",
        url: "/finance/viewPaymentLoad",
        dataType: "json",
        success: function (data) {
            console.log(data);
            data.forEach(d => {
               
                Object.assign(d,{action: '<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_payment_load_modal" '+
                'data-view_payment_load="'+d.payment_load_id+','+d.payment_type+','+d.class_label+','+d.amount+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
               'data-toggle="modal"'+ 
              'data-target="#edit_payment_load_modal"'+
               'data-edit_payment_load="'+d.payment_load_id+','+d.payment_type_id+','+d.class_id+','+d.amount+'">'+
                '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+                   
              '</button>'+' '+
               '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
               'data-target="#delete_payment_load_modal"'+ 
                'data-delete_payment_load_modal="'+d.payment_load_id+','+d.payment_type_id+','+d.class_id+','+d.amount+'">'+
                '<i class="fa fa-trash" aria-hidden="true"></i>'+
              '</button>'
                 });
            });

            $("#view_payment_load_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "payment_load_id" },
                    { "data": "payment_type" },
                    { "data": "class_label" },
                    { "data": "amount"},
                    { "data": "action"},
                   
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#student_transport_table_wrapper .col-md-6:eq(0)');
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
    var pay_type_id = data[1];
    var class_id = data[2];
    var amount = data[3];
   
    


        $.ajax({
            type: "GET",
            url: "/finance/fetchPaymentLoadDetail",
            data: "data",
            dataType: "json",
            success: function (data) {
                $('#payment_type_edit_load').empty();
                $('#class_id_edit_val').empty();
                console.log(data);
                payment_type = JSON.parse(JSON.stringify(data.payment_type));
                class_detail = JSON.parse(JSON.stringify(data.class_detail));
                console.log(payment_type);
                payment_type.forEach(element => {
                   
                    $('#payment_type_edit_load').append('<option value="'+element.id+'">'+
                                           element.payment_type+'</option>');
                                      
                                      
                   
                });
                class_detail.forEach(element => {
                    $('#class_id_edit_val').append('<option value="'+element.id+'">'+
                    element.class_label+'</option>');
                });

                $('#payment_type_edit_load').val(pay_type_id); 
                $('#class_id_edit_val').val(class_id);
                $('#payment_amount_edit').val(amount);
            }
        });
        
        

     

    $('#save_changes_payment_load').click(function () { 
        var payment_type_edit = $('#payment_type_edit_load').val(); 
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