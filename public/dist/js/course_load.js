$("#selectedStream").change(function () {
    var splitter = ($(this).val()).split(",");
    var stream_id = splitter[0];
    var class_id = splitter[1];
    var select = '';
    //  swal.fire(stream_id+" : "+class_id);
    $.ajax({
        type: "GET",
        url: "getSectionForSelectedStream/"+class_id+"/"+stream_id,
        dataType: "json",
        success: function (response) {
            console.log(response);
            select +='<option>Select Section..</option>'
            response.forEach(element => {
                select += '<option value="'+element.section_name+'">'+element.section_name+'</option>'
            });
            $("#selectedSection2").html(select);
        }
    });

});


$("#addCourseLoad").click(function (e) {
    e.preventDefault();
    var splitter = $("#selectedStream").val().split(",");
    var class_id = $("#singleClassId").val();
    var stream_id = splitter[0];
    var section = $("#selectedSection2").val();
    var subject = $("#selectedSubject").val();
    var teacher_id = (document.getElementById('teacher_id').textContent).trim();
    console.log("class: "+class_id+" Stream: "+stream_id+" Section: "+section+" Subject: "+subject+" Teacher ID: "+teacher_id)
    $.ajax({
        type: "GET",
        url: "getCourseLoadData/"+teacher_id+"/"+class_id+"/"+stream_id+"/"+section+"/"+subject,
        dataType: "json",
        success: function (response) {
            console.log(response);
            if(response === 'Alerady Exist!'){
                swal.fire('Alerady Exist!');
            }else{
                swal.fire('Inserted Successfuly');
                response.forEach(element => {
                    Object.assign(element,{action:'<button onclick="editCourseLoad(this)" class="btn btn-info btn-sm m-1" type="button" value="'+element.id+'">Edit</button><button onclick="deleteCourseLoad(this);" class="btn btn-danger btn-sm m-1"  value="'+element.id+'">Delete</button>'})
                });
                $("#course_load_table").DataTable({
                    "destroy":true,
                    "pageLength": 50,
                    "data":response,
                    "columns": [
                        { "data": "class_label" },
                        { "data": "stream_type" },
                        { "data": "section_label" },
                        { "data": "subject_name" },
                        { "data": "action" },
                    ],
                    // "rowId":"student_id",
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ordering": false,
                    // "dom":'',
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                }).buttons().container().appendTo('#course_load_table_wrapper .col-md-6:eq(0)');
            }
        }
    });
});


function deleteCourseLoad(id){
    deleteID = id.value.trim();

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
                url: 'deleteCourseLoad/'+deleteID,
                dataType : 'json',
                success:function (response) {
                    console.log(response);

                        swal.fire('Deleted Successfuly');
                        response.forEach(element => {
                            Object.assign(element,{action:'<button onclick="editCourseLoad(this)" class="btn btn-info btn-sm m-1" type="button" value="'+element.id+'">Edit</button><button onclick="deleteCourseLoad(this);" class="btn btn-danger btn-sm m-1"  value="'+element.id+'">Delete</button>'})
                        });
                        $("#course_load_table").DataTable({
                            "destroy":true,
                            "pageLength": 50,
                            "data":response,
                            "columns": [
                                { "data": "class_label" },
                                { "data": "stream_type" },
                                { "data": "section_label" },
                                { "data": "subject_name" },
                                { "data": "action" },
                            ],
                            // "rowId":"student_id",
                            "responsive": true,
                            "lengthChange": false,
                            "autoWidth": false,
                            "ordering": false,
                            // "dom":'',
                            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                        }).buttons().container().appendTo('#course_load_table_wrapper .col-md-6:eq(0)');

                },
                error:function (response) {
                    console.log("it is not works fine");
                }
            });
        }
      })
}

function editCourseLoad(val){
    swal.fire(val.value);
}
