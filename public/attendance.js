
var current_date_global = null;
var today_date_cookie_global = null;
$(window).on("load", function () {
    $.ajax({
    type: "GET",
    url: "/generateAttendanceList",
    dataType: "json",
    success: function (data) {
        console.log(data);
        var section_data = JSON.parse(JSON.stringify(data.section));
        var current_date = JSON.parse(JSON.stringify(data.current_date));
        var today_date_cookie = JSON.parse(JSON.stringify(data.today_date_cookie));
        today_date_cookie_global = today_date_cookie;
        current_date_global = current_date;
        section_data.forEach(d => {
            Object.assign(d,{action:     '<div class="form-check">'+
            '<input class="form-check-input" type="radio" data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'" data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="present" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',present" name="'+d.student_table_id+'" id="'+d.student_table_id+'present" checked>'+
            '<label class="form-check-label mr-5" for="flexRadioDefault1">Present</label>'+
            
            '<input class="form-check-input" type="radio" data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'"  data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="absent" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',absent" name="'+d.student_table_id+'" id="'+d.student_table_id+'absent">'+
            '<label class="form-check-label mr-5" for="flexRadioDefault2">Absent</label>'+
            
            '<input class="form-check-input" type="radio" data-student_table_id="'+d.student_table_id+'" data-student_id="'+d.student_table_id+'"  data-class_id="'+d.class_id+'" data-stream_id="'+d.stream_id+'" data-section_name="'+d.section_name+'" data-status="leave" value="'+d.student_table_id+','+d.class_id+','+d.stream_id+','+d.section_name+',leave" name="'+d.student_table_id+'" id="'+d.student_table_id+'leave">'+
            '<label class="form-check-label mr-5" for="flexRadioDefault3">Leave</label>'+
            '</div>'
             
         
    
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
});

$('#view_attendance_tab_link').click(function () { 
    var today = new Date().toISOString().split('T')[0]
    console.log(today);
    $.ajax({
        type: "GET",
        url: "/viewAttendance/"+current_date_global,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#date_header').text("Attendance for date: "+today_date_cookie_global);
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
                    //{ "data": "action" }
                    
                   
                ],
               "paging": false,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_attendance_table_wrapper .col-md-6:eq(0)');
        }
    });
    
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
  if ($(this).val()== '') {
      
  }
  else{
    var date_string = $('#ethio_date_inline_view').val();
    var date_full = date_string.split('/');
    var date_now = date_full[0];
    var date_month = date_full[1];
    var year = date_full[2];
    var date_format = year+"-"+date_month+"-"+date_now;
    // alert(date_format);

    $.ajax({
        type: "GET",
        url: "/viewAttendanceForSpecificDate/"+date_format,
    
        dataType: "json",
        success: function (data) {

            $('#view_attendance_table tbody').empty();

            var student_attendance_data = JSON.parse(JSON.stringify(data.student_attendance));
            var status = JSON.parse(JSON.stringify(data.status));

            
            if (status == "success") {
                $('#date_header').text("Attendance for date: "+date_format);
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Found Attendance Record for Date: '+date_format,
                  
                  });

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
                    //{ "data": "action" }
                    
                   
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
  });

