
var request_array = [];
var payment_type ;
var select_recurring;

$('#add_payment_type').click(function () { 
    
     payment_type  = $('#payment_type').val();
     select_recurring = $('#select_recurring').val();
    
    request_array['payment_type'] = payment_type;
    request_array['recurring_type'] = select_recurring;
    console.log(request_array);
    $.ajax({
        type: 'GET',
        url: '/finance/addPaymentType',
        data:  {payment_type, select_recurring},
        dataType: 'json',
        cache: false,
        success: function (data) {
          //var data1 = Object.entries(data);
          var data1 = JSON.parse(JSON.stringify(data.success));
          var data2 = JSON.parse(JSON.stringify(data.view_payment_type));

          if (data1 == "success") {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Added Successfully!',
              
              });
          }
            var flat = data2.flat();
            console.log(flat);
             var table = $('#example1').DataTable();
            
            //$(rowNode).css( 'color', 'red' ).animate( { color: 'black' } );
            
            
            console.log(flat);
            var rows = '';
            
            flat.forEach(d => {
                 table.row.add([d.id,d.payment_type,d.recurring_type,
                    '<button class="btn btn-success btn-sm"'+
                    'data-toggle="modal"'+ 
                   'data-target="#view_payment_type" '+
                    'data-view_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                     '<i class="fa fa-eye" aria-hidden="true"></i>'+             
                   '</button>'+
                   '<button class="btn btn-info btn-sm"'+
                   'data-toggle="modal"'+ 
                  'data-target="#edit_payment_type"'+
                   'data-edit_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                    '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+                   
                  '</button>'+

                  '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_payment_type"'+ 
                   'data-delete_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>']).draw().node().id = d.id;
               // rows += 
                // '<tr class="table-success">'+                
                // '<td>'+d.id +'</td>'+
                // '<td>'+d.payment_type +'</td>'+
                // '<td>'+d.recurring_type +'</td>'+
                // '<td>'+
                // '<button class="btn btn-success btn-sm"'+
                //     'data-toggle="modal"'+ 
                //    'data-target="#view_payment_type" '+
                //     'data-view_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                //      '<i class="fa fa-eye" aria-hidden="true"></i>'+             
                //    '</button>'+

                //    '<button class="btn btn-info btn-sm"'+
                //     'data-toggle="modal"'+ 
                //    'data-target="#edit_payment_type"'+
                //     'data-edit_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                //      '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+                   
                //    '</button>'+

                //    '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                //    'data-target="#delete_payment_type"'+ 
                //     'data-delete_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                //     '<i class="fa fa-trash" aria-hidden="true"></i>'+
                //   '</button>'+

                //  '</td>'+
                // '</tr>'
            });           
           // $('#table_body').prepend(rows);
           
            
        }
    });
    

});

$('#view_payment_type').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('view_payment_type') // Extract info from data-* attributes
    var data = recipient.split(",");
    
    $('#payment_type_id').text("ID: "+data[0]);
    $('#payment_types').text("Payment Type: "+data[1]);
    $('#recurring_type').text("Recurring Type: "+data[2]);
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    // modal.find('.modal-body input').val(recipient)
  });

  $('#edit_payment_type').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('edit_payment_type') // Extract info from data-* attributes
    var data = recipient.split(",");
     
    
    $('#payment_type_edit').val(data[1]);
    $('#select_recurring_edit').val(data[2]);


    $('#save_changes').click(function () { 
        var payment_type_id = data[0];
        var payment_type_edit = $('#payment_type_edit').val();
        var select_recurring_edit =  $('#select_recurring_edit').val();
        $.ajax({
            type: "GET",
            url: "/finance/editPaymentType",
            data: {payment_type_id,payment_type_edit,select_recurring_edit},
            dataType: "json",
            success: function (response) {
                if (response == "success") {
                    $('#cance_edit_modal').click();
                    
                        
                   
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
    // modal.find('.modal-title').text('New message to ' + recipient)
    // modal.find('.modal-body input').val(recipient)
  });

  $('#delete_payment_type').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('delete_payment_type') // Extract info from data-* attributes
    var data = recipient.split(",");
    
    $('#payment_type_id_delete').text("ID: "+data[0]);
    $('#payment_types_delete').text("Payment Type: "+data[1]);
    $('#recurring_type_delete').text("Recurring Type: "+data[2]);

    $('#delete_payment_type').click(function () { 
        var payment_type_id = data[0];
        $.ajax({
            type: "GET",
            url: "/finance/deletePaymentType",
            data: {payment_type_id},
            dataType: "json",
            success: function (response) {
                if (response == "deleted") {
                    $('#cancel_delete_modal').click();
                    
                        
                   
                    Swal.fire({
                        icon: 'info',
                        title: 'Deleted',
                        text: 'One item deleted!',
                      
                      });

                    //   var table = $('#example1').DataTable();
                    //   table.row.remove('#'+payment_type_id).draw();
                      $('#example1').DataTable().row('#'+payment_type_id).remove().draw();
                      
                }
            }
        });
        
    });
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    // modal.find('.modal-body input').val(recipient)
  });
  