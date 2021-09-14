

var current_date_global = null;
var today_date_cookie_global = null;
var isCurrentDateAttendanceAvailable = null;
$(window).on("load", function () {
    var class_id = $('#attendance_data').data("class_id");
    var stream_id = $('#attendance_data').data("stream_id");
    var section = $('#attendance_data').data("section");
    $.ajax({
    type: "GET",
    url: "/generateAttendanceList/"+class_id+"/"+stream_id+"/"+section,
    dataType: "json",
    success: function (data) {
        
        console.log(data);
        var section_data = JSON.parse(JSON.stringify(data.section));
        var current_date = JSON.parse(JSON.stringify(data.current_date));
        var today_date_cookie = JSON.parse(JSON.stringify(data.today_date_cookie));
        today_date_cookie_global = today_date_cookie;
        current_date_global = current_date;
        section_data.forEach(d => {
            Object.assign(d,{action:  
            '<div class="d-flex flex-row">'+
            '<div class="custom-control custom-radio">'+
            '<input type="radio" data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'" data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="present" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',present" name="'+d.student_table_id+'" id="'+d.student_table_id+'present" checked  class="custom-control-input ">'+
            '<label class="custom-control-label pl-4"  for="'+d.student_table_id+'present">Present</label>'+
            '</div>'+

            '<div class="custom-control custom-radio">'+
            '<input type="radio"  data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'"  data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="absent" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',absent" name="'+d.student_table_id+'" id="'+d.student_table_id+'absent" class="custom-control-input">'+
            '<label class="custom-control-label pl-4"  for="'+d.student_table_id+'absent">Absent</label>'+
            '</div>'+

            '<div class="custom-control custom-radio">'+
            '<input type="radio" data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'"  data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="leave" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',leave" name="'+d.student_table_id+'" id="'+d.student_table_id+'leave" class="custom-control-input">'+
            '<label class="custom-control-label pl-4"  for="'+d.student_table_id+'leave">Leave</label>'+
            '</div>'+
            '</div>'
            

          
             
            //       '<div class="custom-control custom-radio">'+
            // '<input class="custom-control-input"   type="radio" data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'" data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="present" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',present" name="'+d.student_table_id+'" id="'+d.student_table_id+'present" checked>'+
            // '<label class="custom-control-label mr-5" for="'+d.student_table_id+'present">Present</label>'+
            
            // '<input class="custom-control-input mr-5 "  type="radio" data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'"  data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="absent" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',absent" name="'+d.student_table_id+'" id="'+d.student_table_id+'absent">'+
            // '<label class="custom-control-label mr-5" for="'+d.student_table_id+'absent">Absent</label>'+
            
            // '<input class="custom-control-input"  type="radio" data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'"  data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="leave" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',leave" name="'+d.student_table_id+'" id="'+d.student_table_id+'leave">'+
            // '<label class="custom-control-label mr-5" for="'+d.student_table_id+'leave">Leave</label>'+
            // '</div>'
         
    
            });
        });

        $("#attendance_table").DataTable({
            // "processing": true,
            // "serverSide": true,
            // "ajax":"/finance/showStudentsRegsiteredForTransport",
            "destroy":true,
            "data":section_data,
            "rowId":"student_id",
            "columns": [
                { "data": "student_id" },
                { "data": "full_name" },
                { "data": "class_label" },
                { "data": "section_name" },
                { "data": "action" }
                
               
            ],
           "paging": false,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#attendance_table_wrapper .col-md-6:eq(0)');

    }
});
});

$('#submit_attendance').click(function () { 
    var table = $('#attendance_table').DataTable();
    // var data = table
    // .rows()
    // .data();
    // console.log(data);
   if ($('#ethio_date_inline').val() != "") {
        

    

    var date_format = null;
    var student_status_arr = new Array();
    
    $('#attendance_table tbody tr td ').find('input[type="radio"]:checked').prop("checked",true).each(function () {
        //console.log($(this).val());
        
        //console.log(student_status_arr);
        //var d = table.row(this).data();
        //console.log(d);
        var student_attendance_data = new Object();
        student_attendance_data.student_table_id = $(this).data('student_table_id');
        student_attendance_data.class_id = $(this).data('class_id');
        student_attendance_data.stream_id = $(this).data('stream_id');
        student_attendance_data.section_name = $(this).data('section_name');
        student_attendance_data.status = $(this).data('status');
        
        var date_string = $('#ethio_date_inline').val().replace(/\//g, '-')
        var date_full = date_string.split('-');
        var date_now = date_full[0];
        var date_month = date_full[1];
        var year = date_full[2]; 
        student_attendance_data.date = year+"-"+date_month+"-"+date_now;
        date_format = year+"-"+date_month+"-"+date_now;

        student_status_arr.push(student_attendance_data);

        console.log(student_status_arr);
      });
//var attendance_date = $('#choose_date').val();
      $.ajax({
          type: "GET",
          url: "/submitAttendance",
          data: {student_status_arr},
          dataType: "json",
          success: function (data) {
         
            

              console.log("ayoooooooo");
              console.log(data);
              if (data == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Submitted Attendance for Date: '+date_format,
                  
                  });

                  
              }
              else if(data == "failed"){
                Swal.fire({
                    icon: 'warning',
                    title: 'Failed to submit Attendance',
                    text: 'Please try again!',
                  
                  });
                  }

                  else if(data == "duplicate"){
                    Swal.fire({
                        icon: 'warning',
                        title: 'Duplicate',
                        text: 'Attendance for this Date is Already Submitted!',
                      
                      });
                      }

                  else if(data == null){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="">Why do I have this issue?</a>'
                      });
                  }
          }, error: function (error) { 
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
              });
           }
      });

    }

    else{
        
        Swal.fire({
            icon: 'warning',
            title: 'DATE CAN NOT BE EMPTY',
            text: 'Please enter DATE!',
          
          });
    }
});

$('#view_attendance_tab_link').click(function () { 
    var today = new Date().toISOString().split('T')[0]
    var class_id = $('#attendance_data').data("class_id");
    var stream_id = $("#attendance_data").data("stream_id");
    var section = $("#attendance_data").data("section");

    temp_date = current_date_global.split("-");
    new_date_format = temp_date[2]+"/"+temp_date[1]+"/"+temp_date[0];
    $('#ethio_date_inline_view').val(new_date_format);
    // alert(class_id+"-"+stream_id+"-"+section+"-"+current_date_global);
    console.log(today);
    viewAttendanceForSpecificDate();
    isCurrentDateAttendanceAvailable = true;
  /*  $.ajax({
        type: "GET",
        url: "/viewAttendance/"+class_id+"/"+stream_id+"/"+section+"/"+current_date_global,
        dataType: "json",
        success: function (data) {
            console.log(data);

            if (data.length == 0) {
                $('#date_header').text("Attendance for date: "+today_date_cookie_global+" NOT FOUND");
            }

            else {

            
            $('#date_header').text("Attendance for date: "+today_date_cookie_global);
            data.forEach(d => {
                Object.assign(d, { action:
                   '<button class="btn btn-success btn-sm" data-full_name="'+d.full_name+'"'+
                   'data-student_id="'+d.student_id+'" data-class_label="'+d.class_label+'"'+
                   'data-stream_type="'+d.stream_type+'"'+
                   'data-section="'+d.section_name+'"'+
                   'data-acedemic_calendar="'+d.academic_calendar+'"'+
                   'data-semister_id="'+d.semister_id+'"'+
                   'data-date="'+d.date+'"'+
                   'data-status="'+d.status+'"'+
                   'data-toggle="modal"'+
                   'data-target="#view_attendance_for_specific_student"'+
                   '><i class="fa fa-eye" aria-hidden="true"></i>'+
                   '</button>'+' '+

                   '<button class="btn btn-info btn-sm" data-full_name="'+d.full_name+'"'+
                   'data-student_id="'+d.student_id+'" data-class_label="'+d.class_label+'"'+
                   'data-student_table_id="'+d.student_table_id+'"'+
                   'data-class_id="'+d.class_id+'"'+
                   'data-stream_id="'+d.stream_id+'"'+
                   'data-stream_type="'+d.stream_type+'"'+
                   'data-section="'+d.section_name+'"'+
                   'data-academic_calendar="'+d.academic_calendar+'"'+
                   'data-semister_id="'+d.semister_id+'"'+
                   'data-date="'+d.date+'"'+
                   'data-status="'+d.status+'"'+
                   'data-toggle="modal"'+
                   'data-target="#edit_attendance_for_specific_student"'+
                   '><i class="fa fa-pencil" aria-hidden="true"></i>'+
                   '</button>'
                    
                 });
            });
            console.log(data);
            $("#view_attendance_table").DataTable({
                "destroy":true,
                "data":data,
                "rowId":"student_id",
                "columns": [
                    { "data": "student_id" },
                    { "data": "full_name" },
                    { "data": "class_label" },
                    { "data": "section_name" },
                    { "data": "status"},
                    { "data": "action" }
                    
                   
                ],
               "paging": false,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_attendance_table_wrapper .col-md-6:eq(0)');

            }
        }
    }); */
    
});

$(function () { 
 var calendar = $.calendars.instance('ethiopian','am');
 $('#ethio_date_inline').calendarsPicker({calendar: calendar});
//  $('#ethio_date').calendarsPicker({calendar: calendar, onSelect: showDate});
});

// function showDate(date) {
// 	alert('The date chosen is ' + date);
// }
$(function () { 
    var calendar = $.calendars.instance('ethiopian','am');
    $('#ethio_date_inline_view').calendarsPicker({calendar: calendar});
   //  $('#ethio_date').calendarsPicker({calendar: calendar, onSelect: showDate});
   });
$('#ethio_date_inline_view').on("change", function () {

    viewAttendanceForSpecificDate();
    isCurrentDateAttendanceAvailable = false;
//   console.log("clicked it");
//   if ($(this).val()== '') {
      
//   }
//   else{
//     var date_string = $('#ethio_date_inline_view').val();
//     var date_full = date_string.split('/');
//     var date_now = date_full[0];
//     var date_month = date_full[1];
//     var year = date_full[2];
//     var date_format = year+"-"+date_month+"-"+date_now;
//     // alert(date_format);
//     var class_id = $('#attendance_data').data("class_id");
//     var stream_id = $("#attendance_data").data("stream_id");
//     var section = $("#attendance_data").data("section");

//     $.ajax({
//         type: "GET",
//         url: "/viewAttendanceForSpecificDate/"+class_id+"/"+stream_id+"/"+section+"/"+date_format,
    
//         dataType: "json",
//         success: function (data) {

//             $('#view_attendance_table tbody').empty();


//             var student_attendance_data = JSON.parse(JSON.stringify(data.student_attendance));
//             var status = JSON.parse(JSON.stringify(data.status));

            
//             if (status == "success") {
//                 $('#date_header').text("Attendance for date: "+date_format);
                

//                student_attendance_data.forEach(d => {

//                 Object.assign(d, { action:
//                     '<button class="btn btn-success btn-sm" data-full_name="'+d.full_name+'"'+
//                     'data-student_id="'+d.student_id+'" data-class_label="'+d.class_label+'"'+
//                     'data-stream_type="'+d.stream_type+'"'+
//                     'data-section="'+d.section_name+'"'+
//                     'data-acedemic_calendar="'+d.academic_calendar+'"'+
//                     'data-semister_id="'+d.semister_id+'"'+
//                     'data-date="'+d.date+'"'+
//                     'data-status="'+d.status+'"'+
//                     'data-toggle="modal"'+
//                     'data-target="#view_attendance_for_specific_student"'+
//                     '><i class="fa fa-eye" aria-hidden="true"></i>'+
//                     '</button>'+' '+
 
//                     '<button class="btn btn-info btn-sm" data-full_name="'+d.full_name+'"'+
//                     'data-student_id="'+d.student_id+'" data-class_label="'+d.class_label+'"'+
//                     'data-student_table_id="'+d.student_table_id+'"'+
//                     'data-class_id="'+d.class_id+'"'+
//                     'data-stream_id="'+d.stream_id+'"'+
//                     'data-stream_type="'+d.stream_type+'"'+
//                     'data-section="'+d.section_name+'"'+
//                     'data-academic_calendar="'+d.academic_calendar+'"'+
//                     'data-semister_id="'+d.semister_id+'"'+
//                     'data-date="'+d.date+'"'+
//                     'data-status="'+d.status+'"'+
//                     'data-toggle="modal"'+
//                     'data-target="#edit_attendance_for_specific_student"'+
//                     '><i class="fa fa-pencil" aria-hidden="true"></i>'+
//                     '</button>'
                     
//                   });

                    
//                 });
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Success',
//                     text: 'Found Attendance Record for Date: '+date_format,
                  
//                   });

//                  $("#view_attendance_table").DataTable({
//                 "destroy":true,
//                 "data":student_attendance_data,
//                 "rowId":"student_id",
//                 "columns": [
//                     { "data": "student_id" },
//                     { "data": "full_name" },
//                     { "data": "class_label" },
//                     { "data": "section_name" },
//                     { "data": "status"},
//                     { "data": "action" }
                    
                   
//                 ],
//                "paging": false,
//                 "responsive": true,
//                 "lengthChange": false,
//                 "autoWidth": false,
//                 "ordering": false,
//                 "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//             }).buttons().container().appendTo('#view_attendance_table_wrapper .col-md-6:eq(0)');
//             }

//             else if(status == "failed"){
//                 $('#date_header').text("Attendance Record For This Date NOT FOUND");
//                 Swal.fire({
//                     icon: 'warning',
//                     title: 'Attendance Record for Date: '+date_format+" NOT FOUND",
//                     text: 'Please submit Attendance first and try again!',
                  
//                   });
//             }

           
           
//         }
//     });
//   }
  });


//   modals js

$('#view_attendance_for_specific_student').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var student_id = button.data('student_id');// Extract info from data-* attributes
    var full_name = button.data('full_name');
    var class_label = button.data('class_label');
    var stream_type = button.data('stream_type');
    var section = button.data('section');
    var date = button.data('date');
    var status = button.data('status');

    $('#view_attendance_student_id').text("Student ID: "+student_id);
    $('#view_attendance_full_name').text("Full Name: "+full_name);
    $('#view_attendance_class_label').text("Class Label: "+class_label);
    $('#view_attendance_stream_type').text("Stream Type: "+stream_type);
    $('#view_attendance_section').text("Section: "+section);
    $('#view_attendance_date').text("Date: "+date);
    $('#view_attendance_status').text("Status: "+status);

    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    // modal.find('.modal-body input').val(recipient)
  })

  $('#edit_attendance_for_specific_student').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var student_id = button.data('student_id');// Extract info from data-* attributes
    var student_table_id = button.data('student_table_id');
    var full_name = button.data('full_name');
    var class_label = button.data('class_label');
    var class_id = button.data('class_id');
    var stream_id = button.data('stream_id');
    var stream_type = button.data('stream_type');
    var section = button.data('section');
    var academic_calendar = button.data('academic_calendar');
    var semister_id = button.data('semister_id');
    var date = button.data('date');
    var status = button.data('status');

    $('#edit_attendance_student_id').text("Student ID: "+student_id);
    $('#edit_attendance_full_name').text("Full Name: "+full_name);
    $('#edit_attendance_class_label').text("Class Label: "+class_label);
    $('#edit_attendance_stream_type').text("Stream Type: "+stream_type);
    $('#edit_attendance_section').text("Section: "+section);
    $('#edit_attendance_date').text("Date: "+date);
    $('#edit_attendance_status').text("Status: "+status);

    
   
    var modal = $(this)
    $('#edit_attendance_btn').click(function () { 
        // alert(academic_calendar);
        var new_status = $('#edit_student_attendance_status').val();
        alert(new_status);
$.ajax({
    type: "GET",
    url: "/editStudentAttendanceForSpecificDate/"+student_table_id+"/"+class_id+"/"+stream_id+"/"+section+"/"+academic_calendar+"/"+semister_id+"/"+date+"/"+status+"/"+new_status,
    dataType: "json",
    success: function (data) {

        if (data == "success") {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Edited Attendance of '+full_name+' to '+new_status+' for Date: '+date,
              
              });

              $('#cancel_edit_attendance_modal').click();
        }
        $('#view_attendance_tab_link').click();
    }
});        
    });
    // modal.find('.modal-title').text('New message to ' + recipient)
    // modal.find('.modal-body input').val(recipient)

    $(this).on('hide.bs.modal', function(){
        $('#edit_attendance_btn').off('click');
    });
  });


  function viewAttendanceForSpecificDate() { 
    console.log("clicked it");
    if ($('#ethio_date_inline_view').val() == '') {
        
    }
    else{
      var date_string = $('#ethio_date_inline_view').val();
      var date_full = date_string.split('/');
      var date_now = date_full[0];
      var date_month = date_full[1];
      var year = date_full[2];
      var date_format = year+"-"+date_month+"-"+date_now;
      // alert(date_format);
      var class_id = $('#attendance_data').data("class_id");
      var stream_id = $("#attendance_data").data("stream_id");
      var section = $("#attendance_data").data("section");
  
      $.ajax({
          type: "GET",
          url: "/viewAttendanceForSpecificDate/"+class_id+"/"+stream_id+"/"+section+"/"+date_format,
      
          dataType: "json",
          success: function (data) {
  
              $('#view_attendance_table tbody').empty();
  
  
              var student_attendance_data = JSON.parse(JSON.stringify(data.student_attendance));
              var status = JSON.parse(JSON.stringify(data.status));
  
              
              if (status == "success") {
                  $('#date_header').text("Attendance for date: "+date_format);
                  
  
                 student_attendance_data.forEach(d => {
  
                  Object.assign(d, { action:
                      '<button class="btn btn-success btn-sm" data-full_name="'+d.full_name+'"'+
                      'data-student_id="'+d.student_id+'" data-class_label="'+d.class_label+'"'+
                      'data-stream_type="'+d.stream_type+'"'+
                      'data-section="'+d.section_name+'"'+
                      'data-acedemic_calendar="'+d.academic_calendar+'"'+
                      'data-semister_id="'+d.semister_id+'"'+
                      'data-date="'+d.date+'"'+
                      'data-status="'+d.status+'"'+
                      'data-toggle="modal"'+
                      'data-target="#view_attendance_for_specific_student"'+
                      '><i class="fa fa-eye" aria-hidden="true"></i>'+
                      '</button>'+' '+
   
                      '<button class="btn btn-info btn-sm" data-full_name="'+d.full_name+'"'+
                      'data-student_id="'+d.student_id+'" data-class_label="'+d.class_label+'"'+
                      'data-student_table_id="'+d.student_table_id+'"'+
                      'data-class_id="'+d.class_id+'"'+
                      'data-stream_id="'+d.stream_id+'"'+
                      'data-stream_type="'+d.stream_type+'"'+
                      'data-section="'+d.section_name+'"'+
                      'data-academic_calendar="'+d.academic_calendar+'"'+
                      'data-semister_id="'+d.semister_id+'"'+
                      'data-date="'+d.date+'"'+
                      'data-status="'+d.status+'"'+
                      'data-toggle="modal"'+
                      'data-target="#edit_attendance_for_specific_student"'+
                      '><i class="fa fa-pencil" aria-hidden="true"></i>'+
                      '</button>'
                       
                    });
  
                      
                  });
                  if (!isCurrentDateAttendanceAvailable) {
                      Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Found Attendance Record for Date: '+date_format,
                    
                    });
                  }
                  
  
                   $("#view_attendance_table").DataTable({
                  "destroy":true,
                  "data":student_attendance_data,
                  "rowId":"student_id",
                  "columns": [
                      { "data": "student_id" },
                      { "data": "full_name" },
                      { "data": "class_label" },
                      { "data": "section_name" },
                      { "data": "status"},
                      { "data": "action" }
                      
                     
                  ],
                 "paging": false,
                  "responsive": true,
                  "lengthChange": false,
                  "autoWidth": false,
                  "ordering": false,
                  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
              }).buttons().container().appendTo('#view_attendance_table_wrapper .col-md-6:eq(0)');
              }
  
              else if(status == "failed"){
                  $('#date_header').text("Attendance Record For This Date NOT FOUND");
                  Swal.fire({
                      icon: 'warning',
                      title: 'Attendance Record for Date: '+date_format+" NOT FOUND",
                      text: 'Please submit Attendance first and try again!',
                    
                    });
              }
  
             
             
          }
      });
    }
   }
