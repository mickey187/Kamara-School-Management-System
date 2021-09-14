


$('#new_schedule').click(function () { 

   $.ajax({
       type: "GET",
       url: "/generateNewSchedule",
       dataType: "json",
       success: function (data) {
           console.log(data);
       }
   });
    
});

$('#view_all_schedule_tab_link').click(function () { 
    
    $.ajax({
        type: "GET",
        url: "/getGeneratedSchedule",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#view_schedule_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "class_label" },
                    { "data": "stream_type" },
                    { "data": "section_label" },
                    { "data": "subject_name" },
                    { "data": "day" },
                    { "data": "period_number" }
                    
                   
                ],
                
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "order": [[ 3, "asc" ],[4, "asc"],[5, "asc"]],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_schedule_table_wrapper .col-md-6:eq(0)');
        }
    });
});

$('#find_schedule').click(function () { 
   
    var class_id = $('#class_label_select').val();
    var stream_id = $('#stream_select').val();
    var section_name = $('#select_section').val();

   // alert(class_id+" - "+stream_id+" - "+section_name)

    $.ajax({
        type: "GET",
        url: "getScheduleForSpecificeSection/"+class_id+"/"+stream_id+"/"+section_name,
        dataType: "json",
        success: function (data) {
            console.log(data);
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'New Schedule Generated!',
              
              });
            $("#view_specific_schedule_table").DataTable({
                // "processing": true,
                // "serverSide": true,
                // "ajax":"/finance/showStudentsRegsiteredForTransport",
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "class_label" },
                    { "data": "stream_type" },
                    { "data": "section_label" },
                    { "data": "subject_name" },
                    { "data": "day" },
                    { "data": "period_number" }
                    
                   
                ],
                
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_specific_schedule_table_wrapper .col-md-6:eq(0)');
        }
    });
});