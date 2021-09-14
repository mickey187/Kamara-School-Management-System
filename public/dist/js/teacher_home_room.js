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
    // modal();
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
            // loadingModalHide();
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
            // modal();
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
                    loadingModalHide();
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
                    // loadingModalHide();
                }
             });

        }
      })

}



$('#modal-generate-card').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('card1')
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #class_id').val(detail)
});

$("#homeRoomClass").change(function (e) {
    e.preventDefault();
    var class_id = this.value;
    // modal();
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
            // loadingModalHide();
        }
    });
});

$("#homeRoomStream").change(function (e) {
    e.preventDefault();
    var stream_id = this.value;
    var class_id = $("#homeRoomClass").val();
    // modal();
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
            // loadingModalHide();
        }
    });
});

$("#addHomeRoom").click(function (e) {
    e.preventDefault();
    var teacher = (document.getElementById('teacher_id2').textContent).trim();
    var section = $("#homeRoomSection").val();
    var class_id = $("#homeRoomClass").val();
    var stream_id = $("#homeRoomStream").val();
    // modal();
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
            // loadingModalHide();
        }
    });
});



function editHomeRoom(val){
    console.log(val.value);
}
