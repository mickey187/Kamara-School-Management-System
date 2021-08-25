
//  $(window).on("load", function () { 
     

    
// var current_year_month = null;

//     $.ajax({
//         type: "GET",
//         url: "/getCurrentYearMonthForParentAttendance",

//         dataType: "json",
//         success: function (data) {
//            // alert(data)
//            current_year_month = data;
//         }
//     });
// //     var current_year_month = $('#current_year_month').text(textString);
// //     alert(current_year_month);
//     $.ajax({
//         type: "GET",
//         url: "/viewStudentAttendanceForMonth/"+current_year_month,
//         dataType: "json",
//         success: function (data) {
//             alert(data)
//             if (data.length === 0) {
//                 Swal.fire({
//                     icon: 'warning',
//                     title: 'NOT FOUND',
//                     text: 'Attendance for Month is NOT Available',
                  
//                   });
//             } else{

//             var student_name = null;
//             var student_id = null;
//             var class_label = null;
//             var section = null;
//             data.forEach(element => {
//                 student_name = element.full_name;
//                 student_id = element.student_id;
//                 class_label = element.class_label;
//                 section = element.section_name;


//             });

//             $('#student_attendance_table_header').text(student_name+" "+class_label+" "+section );
//             $("#view_attendance_for_parent_table").DataTable({
//                 // "processing": true,
//                 // "serverSide": true,
//                 // "ajax":"/finance/showStudentsRegsiteredForTransport",
//                 "destroy":true,
//                 "data":data,
//                 "paging":false,
//                 "columns": [
//                     { "data": "date" },
//                     { "data": "status" },
                    
                   
                   
//                 ],
//                 "responsive": true,
//                 "lengthChange": false,
//                 "autoWidth": false,
//                 "ordering": false,
//                 "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//             }).buttons().container().appendTo('#view_attendance_for_parent_table_wrapper .col-md-6:eq(0)');

//             $('#view_attendance_for_parent_table tbody tr td').each(function () { 

//                 if ($(this).text() == "present") {
//                    $(this).prev().addClass("text-success ");
//                     $(this).addClass("badge badge-success ");
                    
//                     //alert($(this).text());
//                 }

//                 else if($(this).text() == "absent"){
//                    $(this).prev().addClass("text-danger ");
//                     $(this).addClass("badge badge-danger ");
//                 }

//                 else if($(this).text() == "leave"){
//                    $(this).prev().addClass("text-warning ");
//                     $(this).addClass("badge badge-warning ");
//                 }
               
//              })
//             }
           
//         }
//     });


//  });
// $("#view_attendance_for_parent_table_this_month").DataTable({
//     "responsive": true,
//     "lengthChange": false,
//     "autoWidth": false,
//     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
// }).buttons().container().appendTo('#view_attendance_for_parent_table_this_month_wrapper .col-md-6:eq(0)');

// if ($('#view_attendance_for_parent_table_this_month tbody tr').length == 0) {
//     $('#view_attendance_for_parent_table_this_month').hide();
//     $('##view_attendance_for_parent_table_this_month_wrapper').hide();
//     $('#view_attendance_for_parent_table').hide();
// }

// else{
//     $('#warning').hide();
// }






     var current_year_month = $('#current_year_month').text();
 $('.ethio-month a[data-month="'+current_year_month+'"]').click();
  

$('.ethio-month a').click(function () { 
    //  alert($(this).data('month'));
    var year_month = $(this).data('month');
    $.ajax({
        type: "GET",
        url: "/viewStudentAttendanceForMonth/"+year_month,
        dataType: "json",
        success: function (data) {
            
            if (data.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'NOT FOUND',
                    text: 'Attendance for Month is NOT Available',
                  
                  });
            } else{

            var student_name = null;
            var student_id = null;
            var class_label = null;
            var section = null;
            data.forEach(element => {
                student_name = element.full_name;
                student_id = element.student_id;
                class_label = element.class_label;
                section = element.section_name;


            });

            $('#student_attendance_table_header').text(student_name+" "+class_label+" "+section );
            $("#view_attendance_for_parent_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "paging":false,
                "columns": [
                    { "data": "date" },
                    { "data": "status" },
                    
                   
                   
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_attendance_for_parent_table_wrapper .col-md-6:eq(0)');

            $('#view_attendance_for_parent_table tbody tr td').each(function () { 

                if ($(this).text() == "present") {
                   $(this).prev().addClass("text-success ");
                    $(this).addClass("badge badge-success ");
                    
                    //alert($(this).text());
                }

                else if($(this).text() == "absent"){
                   $(this).prev().addClass("text-danger ");
                    $(this).addClass("badge badge-danger ");
                }

                else if($(this).text() == "leave"){
                   $(this).prev().addClass("text-warning ");
                    $(this).addClass("badge badge-warning ");
                }
               
             })
            }
           
        }
    });
 });