
$('#add_role_btn').click(function(){
var role_name = $('#input_role').val();
$.ajax({
    type: "GET",
    url: "/account/addRole/"+role_name,
    dataType: "json",
    success: function (data) {
        if (data == "success") {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Added '+role_name+' Role',
              
              });
        
        }
        else if(data == "already exists"){
            Swal.fire({
                icon: 'warning',
                title: 'Duplicate!',
                text: role_name+' already exists',
                
              });
        }
        else if(data == "failed"){
            Swal.fire({
                icon: 'error',
                title: 'Failed to Add'+ role_name,
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
              });
        }
    }, error: function (data) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
          });
    }
});
});

$('#view_role_tab_link').click(function () { 
    $.ajax({
        type: "GET",
        url: "/account/viewRole",
        dataType: "json",
        success: function (data) {
            data.forEach(d =>{
                d.discount_percent = d.discount_percent+" %";
                Object.assign(d,{action:'<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_transport_modal" '+
                'data-view_transport_detail="'+d.id+','+d.role_name+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#edit_transport_modal"'+
                'data-edit_transport_detail="'+d.id+','+d.role_name+'">'+
                 '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+             
               '</button>'+' '+
              
              '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_transport_modal"'+ 
                   'data-delete_transport_detail="'+d.id+','+d.role_name+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>'
            });
            });

            $("#view_role_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "id" },
                    { "data": "role_name" },
                    { "data": "action" },
                    
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_role_table_wrapper .col-md-6:eq(0)');

        },error: function (data) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
              });
          }
    });
    
});

$('#add_account_tab_link').click(function () { 
    
    $.ajax({
        type: "GET",
        url: "/account/viewRole",
        dataType: "json",
        success: function (data) {
            $('#role_select').empty();
            data.forEach(element => {
                $('#role_select').append('<option value="'+element.id+'">'+
                                           element.role_name+'</option>');
            });
        }
    });
    
});

$('#add_account_btn').click( function () { 

    var user_name = $('#user_name_input').val();
    var email = $('#email_input').val();
    var role_id = $('#role_select').val();
    var user_password = $('#user_password_input').val();
    var role_name = $('#role_select :selected').text();

    $.ajax({
        type: "GET",
        url: "/account/createAccount/"+user_name+"/"+email+"/"+role_id+"/"+user_password,
        dataType: "json",
        success: function (data) {
            if (data == "user already exists") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Something went wrong',
                    text: 'User with this email already exists!...',
                    
                  });
            }
            else if(data == "success"){
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Added '+user_name+' with '+role_name+' Role',
                  
                  });
            }
        }
    });
 });

 $('#view_account_tab_link').click(function () { 
     $.ajax({
         type: "GET",
         url: "/account/viewUserAccount",
         dataType: "json",
         success: function (data) {
             console.log(data);
            data.forEach(d =>{
                Object.assign(d,{action:'<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_transport_modal" '+
                'data-view_transport_detail="'+d.user_id+','+d.name+','+d.role_name+','+d.email+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#edit_transport_modal"'+
                'data-edit_transport_detail="'+d.user_id+','+d.name+','+d.role_name+','+d.email+'">'+
                 '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+             
               '</button>'+' '+
              
              '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_transport_modal"'+ 
                   'data-delete_transport_detail="'+d.user_id+','+d.name+','+d.role_name+','+d.email+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>'
            });
            });

            $("#user_account_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "user_id" },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "role_name" },
                    { "data": "action" }
                    
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#user_account_table_wrapper .col-md-6:eq(0)');
         }
     });
     
 });