$('#modal-teacher-home-room').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('teacher2')
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1])
    modal.find('.modal-body #section').text(split[2])
    modal.find('.modal-body #stream').text(split[3])
    modal.find('.modal-footer button').val(detail);

    $.ajax({
        type: 'GET',
        url: 'getHomeRoom/'+(split[1].trim()),
        dataType : 'json',
        success:function (response) {
            console.log(response);
            // home_room_table
            response.forEach(element => {
                Object.assign(element,{action:'<button onclick="editHomeRoom(this)" class="btn btn-info btn-sm m-1" type="button" value="'+element.id+'">Edit</button><button onclick="deleteHomeRoom(this);" class="btn btn-danger btn-sm m-1"  value="'+element.id+'">Delete</button>'})
            });
            $("#home_room_table").DataTable({
                "destroy":true,
                "pageLength": 50,
                "data":response,
                "columns": [
                    { "data": "class_label" },
                    { "data": "stream" },
                    { "data": "section" },
                    { "data": "action" },
                ],
                // "rowId":"student_id",
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                // "dom":'',
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#home_room_table_wrapper .col-md-6:eq(0)');
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });

})


function deleteHomeRoom($val)
{
     deleteID = $val.value.trim();
    //alert(deleteID);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: 'deleteHomeRoom/'+deleteID,
                dataType : 'json',
                success:function (response) {
                    console.log(response);
                    // home_room_table
                    response.forEach(element => {
                        Object.assign(element,{action:'<button onclick="editCourseLoad(this)" class="btn btn-info btn-sm m-1" type="button" value="'+element.id+'">Edit</button><button onclick="deleteHomeRoom(this);" class="btn btn-danger btn-sm m-1"  value="'+element.id+'">Delete</button>'})
                    });
                    $("#home_room_table").DataTable({
                        "destroy":true,
                        "pageLength": 50,
                        "data":response,
                        "columns": [
                            { "data": "class_label" },
                            { "data": "stream" },
                            { "data": "section" },
                            { "data": "action" },
                        ],
                        // "rowId":"student_id",
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                        "ordering": false,
                        // "dom":'',
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    }).buttons().container().appendTo('#home_room_table_wrapper .col-md-6:eq(0)');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Successfuly Removed',
                        showConfirmButton: false,
                        timer: 1500
                      });
                },
                error:function (data) {
                    console.log("it is not works fine");
                }
             });

        }
      })

}


// $("#assignTeacherHomeRoom").click(function () {
//     var section = '';
//     var counter=0;
//     var assignSection =  $('input[name="feature"]:checked').each(function(){
//         section = this.value;
//    });
//     var assignClass = $("#singleClassId2").val();
//     var assignSubject = $("#selectedSubject2").val();
//     var teacher_id = (document.getElementById('teacher_id2').textContent).trim();
//     var stream =  (document.getElementById('teacher_id4').textContent).trim();
//     console.log("Teacher ID:"+teacher_id+' '+"section:"+section+" Grade ID:"+assignClass+" Stream: "+stream);

//     $.ajax({
//         type: 'GET',
//         url: 'setHomeRoom/'+teacher_id+'/'+section+'/'+assignClass+"/"+stream,
//         dataType : 'json',
//         success:function (data) {
//             console.log(data);
//             var data1 = JSON.parse(JSON.stringify(data.datac));
//             var data2 = JSON.parse(JSON.stringify(data.status));
//              row = '';
//                 data1.forEach(d => {
//                     row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+'</td>'+
//                     '<td><button onclick="deleteHomeRoom(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
//                     '</tr>'
//                });
//                $('#homeroom').html(row);
//                section = '';
//                Swal.fire({
//                 position: 'top-end',
//                 icon: 'success',
//                 title: 'Home Room Assigned Successfuly',
//                 showConfirmButton: false,
//                 timer: 1500
//               })
//         },
//         error:function (data) {
//             console.log("it is not works fine");
//         }
//      });

// });

$('#modal-generate-card').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('card1')
    // alert(detail);
    var modal = $(this)
    var split = detail.split(",")
    // alert(split[2])
    modal.find('.modal-body #class_id').val(detail)
});

$("#homeRoomClass").change(function (e) {
    e.preventDefault();
    var class_id = this.value;
    $.ajax({
        type: "GET",
        url: "getHomeRoomStream/"+class_id,
        dataType: "json",
        success: function (response) {
            console.log(response);
            var select = '';
            select += '<option>select stream</option>';
            response.forEach(element => {
                select += '<option value="'+element.stream_id+'">'+element.stream_type+'</option>'
            });
            $("#homeRoomStream").html(select);
        }
    });
});

$("#homeRoomStream").change(function (e) {
    e.preventDefault();
    var stream_id = this.value;
    var class_id = $("#homeRoomClass").val();
    $.ajax({
        type: "GET",
        url: "getHomeRoomSection/"+class_id+"/"+stream_id,
        dataType: "json",
        success: function (response) {
            console.log(response);
            var select = '';
                select += '<option>select section</option>';
            response.forEach(element => {
                select += '<option value="'+element.section_name+'">'+element.section_name+'</option>'
            });
            $("#homeRoomSection").html(select);
        }
    });
});

$("#addHomeRoom").click(function (e) {
    e.preventDefault();
    var teacher = (document.getElementById('teacher_id2').textContent).trim();
    var section = $("#homeRoomSection").val();
    var class_id = $("#homeRoomClass").val();
    var stream_id = $("#homeRoomStream").val();
    $.ajax({
        type: "GET",
        url: "setHomeRoom/"+teacher+"/"+section+"/"+class_id+"/"+stream_id,
        dataType: "json",
        success: function (response) {
            console.log(response);
            if(response ==="Already Exist!"){
                swal.fire("Already Exist!");
            }else{
                response.forEach(element => {
                    Object.assign(element,{action:'<button onclick="editHomeRoom(this)" class="btn btn-info btn-sm m-1" type="button" value="'+element.id+'">Edit</button><button onclick="deleteHomeRoom(this);" class="btn btn-danger btn-sm m-1"  value="'+element.id+'">Delete</button>'})
                });
                swal.fire("Successfuly Assigned!");

                $("#home_room_table").DataTable({
                    "destroy":true,
                    "pageLength": 50,
                    "data":response,
                    "columns": [
                        { "data": "class_label" },
                        { "data": "stream" },
                        { "data": "section" },
                        { "data": "action" },
                    ],
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ordering": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                }).buttons().container().appendTo('#home_room_table_wrapper .col-md-6:eq(0)');
            }
        }
    });
});


// function deleteHomeRoom(val){
//     console.log(val.value);
// }

function editHomeRoom(val){
    console.log(val.value);
}
