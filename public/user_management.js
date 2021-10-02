





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
               'data-target="#view_user_account_detail_modal"'+
                'data-view_user_id="'+d.user_id+'"'+
                'data-view_username="'+d.name+'"'+
                'data-view_user_rolename="'+d.role_name+'"'+
                'data-view_user_email="'+d.email+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#edit_user_account_detail_modal"'+
               'data-edit_user_id="'+d.user_id+'"'+
               'data-edit_username="'+d.name+'"'+
               'data-edit_user_rolename="'+d.role_name+'"'+
               'data-edit_user_role_id="'+d.role_id+'"'+
               'data-edit_user_email="'+d.email+'">'+
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

 $('#view_user_account_detail_modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('view_user_detail') // Extract info from data-* attributes
   $('#view_user_id').text("User ID: "+button.data('view_user_id'));
   $('#view_user_name').text("User Name: "+button.data('view_username'));
   $('#view_user_role').text("Role Name: "+button.data('view_user_rolename'));
   $('#view_user_email').text("User Email: "+button.data('view_user_email'));
    var modal = $(this)

    modal.find('.modal-body input').val(recipient)
  });


  

  $('#edit_user_account_detail_modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    // var recipient = button.data('view_user_detail') // Extract info from data-* attributes
   
    var modal = $(this)

    $('#edit_user_id').text("User ID: "+button.data("edit_user_id"));
    $('#edit_user_id').data("user_id", button.data("edit_user_id"));

    $('#edit_username_input').val(button.data("edit_username"));
    $('#edit_email_input').val(button.data("edit_user_email"));
    $('#select_role_for_edit').val(button.data("edit_user_role_id"));
    $('#user_id_input').val(button.data("edit_user_id"));

  

    $('#save_account_changes').click(function () { 

        var user_id = $('#edit_user_id').data("user_id");
        var new_username = $('#edit_username_input').val();
        var new_email = $('#edit_email_input').val();
        var new_role = $('#select_role_for_edit').val();
        

        $.ajax({
            type: "GET",
            url: "updateUserAccount/",
            data:{user_id, new_username, new_email, new_role},
            dataType: "json",
            success: function (data) {
                validation_status = JSON.parse(JSON.stringify(data.validation_status));
                update_status = JSON.parse(JSON.stringify(data.update_status));
                console.log(validation_status);
                console.log(update_status);

                if (validation_status == null && update_status == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Updated User Account Successfully',
                      
                      });
                }

                else if(validation_status != null && update_status == "failed"){
                    new_username_validation_message = '';
                    new_email_validation_message = '';

                    if (validation_status.new_username != undefined){
                        for (let index = 0; index < validation_status.new_username.length; index++) {
                        
                        new_username_validation_message += validation_status.new_username[index]+" ";
                        
                        }
                    $('#username_validation').removeAttr("hidden");
                    $('#username_validation').text(new_username_validation_message);
                    
                    }

                    if (validation_status.new_email != undefined) {
                        for (let index = 0; index < validation_status.new_email.length; index++) {
                        
                        new_email_validation_message += validation_status.new_email[index]+" ";
                        
                        }
                        $('#email_validation').removeAttr("hidden");
                        $('#email_validation').text(new_email_validation_message);
                        
                    }
                    

                    

                   
                    
                   

                    
                    console.log(validation_status);

                }
            }
        });
        
    });

    $(this).on('hide.bs.modal', function(){

        $('#username_validation').attr("hidden", "hidden");
        $('#email_validation').attr("hidden", "hidden");
        $('#save_account_changes').off('click');
    });

  })

  $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});

$('#change_password_btn').click(function () { 
        
         var new_password = $('#new_password').val();
         var confirm_password = $('#confirm_password').val();
         
         if (!new_password.length == "" && !confirm_password.length == "" ) {

            
            if (new_password.length >= 8 && confirm_password.length >= 8) {
                
                if (new_password === confirm_password) {

                    $("#new_password_validation").removeClass("text-danger");
                    $("#new_password_validation").addClass("text-success");
                    $("#new_password_validation").text("Valid Password!");

                    $("#confirm_passowrd_validation").removeClass("text-danger");
                    $("confirm_passowrd_validation").addClass("text-success");
                    $("#confirm_passowrd_validation").text("Password confirmed!");

                    $('#change_password_btn').attr("type", "submit");

                }

                else{
                    $("#new_password_validation").text("Valid Password!");
                    $("#confirm_passowrd_validation").text("Password does not match!");
                }
            }

            else{
                $("#new_password_validation").text("Password length can not be less than 8!");
                $("#confirm_passowrd_validation").text("Password length can not be less than 8!");  
            }
             
         }

         else{
            $("#new_password_validation").text("Field can not be empty!");
            $("#confirm_passowrd_validation").text("Field can not be empty!");
         }
         
});