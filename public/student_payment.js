
$('#student_info_card').hide();
$('#payment_type_select_div').hide();
$('#register_student_for_payment').hide();
var student_id = null;
var stduent_table_id = null;
var class_id = null;


$('#search_btn_for_regsiter').click(function () { 
    var search_input_for_registration = $('#search_input_for_registration').val();
    $.ajax({
        type: "GET",
        url: "/finance/searchStudentForPaymentRegistration/"+search_input_for_registration,        
        dataType: "json",
        success: function (data) {
            
            data1 = JSON.parse(JSON.stringify(data.student_data));
            data2 = JSON.parse(JSON.stringify(data.payment_type_array));
            
            var payment_type_id = data2.flat();
            $("#payment_type_select").children('option').show();
            payment_type_id.forEach(d=>{
                payment_type_dropdown = $("#payment_type_select");
                payment_type_dropdown.find('option[value="'+d+'"]').hide();
            });
            
            var row = '';
            data1.forEach(d =>{
                student_id = d.student_id;
                class_id = d.class_id;
                stduent_table_id = d.student_table_id;
                
                row += '<h5 class="text-info">Student ID: '+d.student_id+'</h5>'+
                       '<h5 class="text-info">Full Name: '+d.full_name+'</h5>'+
                       '<h5 class="text-info">Class Label: '+d.class_label+'</h5>'

            });
            $('#student_info_card').show();
            $('#payment_type_select_div').show();
            $('#register_student_for_payment').show();
            $('#student_info_div').html(row);
            
        }
    });
    
});

$('#register_student_for_payment').click(function () { 
    var payment_type_select  = $('#payment_type_select').val();
    var payment_type = $('#payment_type_select option:selected').text();
    var discount_percent = $('#discount_percent').val();
    $.ajax({
        type: "GET",
        url: "/finance/registerStudentForPayment/"+student_id,
        data: {payment_type_select,class_id,stduent_table_id,discount_percent},
        dataType: "json",
        success: function (data) {
            if (data == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Registered for '+payment_type,
                  
                  });
            }

            else if(data == 'already exists'){
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning',
                  text: 'This student is already registered for '+payment_type,
                  
                });
              }
            
        },

        error:function(data){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
              })
        }
    });
    
});

$('#student_transport_tab_link').click(function () { 

    $.ajax({
        type: "GET",
        url: "/finance/showStudentsRegsiteredForTransport",
        data: "data",
        dataType: "json",
        success: function (data) {
            
            data.forEach(d =>{
                d.discount_percent = d.discount_percent+" %";
                Object.assign(d,{action:'<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_payment_type" '+
                'data-view_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
              
              '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_payment_type"'+ 
                   'data-delete_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>'
            });
            });
            console.log(data);
            $("#student_transport_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "stud_id" },
                    { "data": "full_name" },
                    // { "data": "payment_type" },
                    { "data": "class_label" },
                    {"data": "discount_percent"},
                    {"data": "amount"},
                    {"data": "action"},
                   
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

$('#student_discount_tab_link').click(function () { 
    
    $.ajax({
        type: "GET",
        url: "/finance/showStudentsWithDiscount",
        dataType: "json",
        success: function (data) {
            console.log(data);
            data.forEach(d=>{
                d.discount_percent = d.discount_percent+" %";
                Object.assign(d,{action: '<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_payment_type" '+
                'data-view_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
               'data-toggle="modal"'+ 
              'data-target="#edit_payment_type"'+
               'data-edit_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+                   
              '</button>'+' '+
               '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
               'data-target="#delete_payment_type"'+ 
                'data-delete_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fa fa-trash" aria-hidden="true"></i>'+
              '</button>'
                 });

            });
            $("#student_discount_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "student_id" },
                    { "data": "full_name" },
                    { "data": "class_label" },
                    {"data": "payment_type"},
                    {"data": "discount_percent"},
                    {"data": "action"},
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#student_discount_table_wrapper .col-md-6:eq(0)');
        }
    });
});

$('#student_school_trip_tab_link').click(function () { 
    $.ajax({
        type: "GET",
        url: "/finance/showStudentsRegisteredForSchoolTrip",        
        dataType: "json",
        success: function (data) {
            console.log(data);

            data.forEach(d => {

                d.discount_percent = d.discount_percent+" %";
                Object.assign(d,{action: '<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_payment_type" '+
                'data-view_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
               'data-toggle="modal"'+ 
              'data-target="#edit_payment_type"'+
               'data-edit_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+                   
              '</button>'+' '+
               '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
               'data-target="#delete_payment_type"'+ 
                'data-delete_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fa fa-trash" aria-hidden="true"></i>'+
              '</button>'

                });
            });
            $("#student_school_trip_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "student_id" },
                    { "data": "full_name" },
                    { "data": "class_label" },
                    {"data": "discount_percent"},
                    {"data": "amount"},
                    {"data": "action"},
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#student_school_trip_table_wrapper .col-md-6:eq(0)');
        }
    });
    
});

$('#student_graduation_tab_link').click(function () { 
    $.ajax({
        type: "GET",
        url: "/finance/showStudentsRegisteredForGraduation",        
        dataType: "json",
        success: function (data) {

            data.forEach(d => {
                d.discount_percent = d.discount_percent+" %";
                Object.assign(d,{action: '<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_payment_type" '+
                'data-view_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
               'data-toggle="modal"'+ 
              'data-target="#edit_payment_type"'+
               'data-edit_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+                   
              '</button>'+' '+
               '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
               'data-target="#delete_payment_type"'+ 
                'data-delete_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fa fa-trash" aria-hidden="true"></i>'+
              '</button>'

                });
            });
            
            $("#student_graduation_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "student_id" },
                    { "data": "full_name" },
                    { "data": "class_label" },
                    {"data": "discount_percent"},
                    {"data": "amount"},
                    {"data": "action"},
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#student_graduation_table_wrapper .col-md-6:eq(0)');
        }
    });
    
});

$('#student_summer_camp_tab_link').click(function () { 
    
    $.ajax({
        type: "GET",
        url: "/finance/showStudentsRegisteredForSummerCamp",
        dataType: "json",
        success: function (data) {


            data.forEach(d => {
                d.discount_percent = d.discount_percent+" %";
                Object.assign(d,{ action: '<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_payment_type" '+
                'data-view_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
               'data-toggle="modal"'+ 
              'data-target="#edit_payment_type"'+
               'data-edit_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+                   
              '</button>'+' '+
               '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
               'data-target="#delete_payment_type"'+ 
                'data-delete_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fa fa-trash" aria-hidden="true"></i>'+
              '</button>'

                });
            });
            $("#student_summer_camp_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "student_id" },
                    { "data": "full_name" },
                    { "data": "class_label" },
                    {"data": "discount_percent"},
                    {"data": "amount"},
                    {"data": "action"},
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#student_summer_camp_table_wrapper .col-md-6:eq(0)');
            
        }
    });
});

$('#student_tutorial_tab_link').click(function () { 
    $.ajax({
        type: "GET",
        url: "/finance/showStudentsRegisteredForTutorial",
        dataType: "json",
        success: function (data) {
            
            data.forEach(d => {
                d.discount_percent = d.discount_percent+" %";
                Object.assign(d,{ action: '<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_payment_type" '+
                'data-view_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+
               '<button class="btn btn-info btn-sm"'+
               'data-toggle="modal"'+ 
              'data-target="#edit_payment_type"'+
               'data-edit_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+                   
              '</button>'+' '+
               '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
               'data-target="#delete_payment_type"'+ 
                'data-delete_payment_type="'+d.id+','+d.payment_type+','+d.recurring_type+'">'+
                '<i class="fa fa-trash" aria-hidden="true"></i>'+
              '</button>'

                });
            });


            $("#student_tutorial_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "student_id" },
                    { "data": "full_name" },
                    { "data": "class_label" },
                    {"data": "discount_percent"},
                    {"data": "amount"},
                    {"data": "action"},
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#student_summer_camp_table_wrapper .col-md-6:eq(0)');
        }
    });
    
});