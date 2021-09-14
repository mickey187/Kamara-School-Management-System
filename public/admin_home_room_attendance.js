


var year_month =  $('#current_year_month').data('year_month');

getHomeRoomAttendance(year_month);

function getHomeRoomAttendance(year_month) { 

    $.ajax({
        type: "GET",
        url: "/getHomeRoomAttendance/"+year_month,
        data: "data",
        dataType: "json",
        success: function (data) {
            
            console.log(data);

            $("#home_room_attedance_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "teacher_id" },
                    { "data": "teacher_name" },
                    { "data": "class_label" },
                    { "data": "stream_type" },
                    { "data": "section_name" },
                    { "data": "status" }
                    
                   
                ],
                
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "order": [[ 3, "asc" ],[4, "asc"],[5, "asc"]],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#home_room_attedance_table_wrapper .col-md-6:eq(0)');
        }
    });
 }

 $('#show_homeroom_attendance_tab_link').click(function () { 
    var year_month =  $('#current_year_month').data('year_month');

    getHomeRoomAttendance(year_month);
     
 });