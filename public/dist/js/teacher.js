

$('#modal-teacher').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('teacher')
    // alert(detail);
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1]);
    modal.find('.modal-footer button').val(detail);
    // modal();
    $.ajax({
        type: 'GET',
        url: 'getCourseLoad/'+(split[1].trim()),
        dataType : 'json',
        success:function (response) {
            // swal.fire('Inserted Successfuly');
            response.forEach(element => {
                Object.assign(element,{action:'<button onclick="editCourseLoad(this);" class="btn btn-info btn-sm m-1" type="button" value="'+element.id+'">Edit</button><button onclick="deleteCourseLoad(this);" class="btn btn-danger btn-sm m-1"  value="'+element.id+'">Delete</button>'})
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
            // loadingModalHide();
        },
        error:function (data) {
            console.log("it is not works fine");
            // loadingModalHide();
        }
     });
})

function unhide(){
  // alert('');
    document.getElementById('add_mode').style.display = 'block';
}
function colapse(){
    // alert('');
      document.getElementById('add_mode').style.display = 'none';
}


function checkBox($val){
    teacher_id = $val.value;
    status = $val.checked;
    // alert(teacher_id);
    // alert(status);
modal();
    $.ajax({
        type: 'GET',
        url: 'setHomeRoom/'+teacher_id+'/'+status,
        dataType : 'json',
        success:function (data) {
            console.log(data);
            row = '';
            data.forEach(d => {
                row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+'</td>'+'<td>'+d.subject_name+'</td>'+
                '<td><button onclick="deleteAssignClass(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
                '</tr>';
           });
           $('#courseLoad').html(row);
           loadingModalHide();
        },
        error:function (data) {
            console.log("it is not works fine");
            loadingModalHide();
        }
     });
}



$("#promoteStudentModal").click(function(){
    var teacher = $("#teacher_id").val();
    var section = $("#section_name").val()
    var stream = $("#stream").val()
    var clas = $("#class1").val()
    modal();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, just promote my student!'
        }).then((result) => {
            if (result.isConfirmed) {
                // swal.fire(teacher+" section: "+section+" stream: "+stream+" class: "+clas);
                $.ajax({
                    type: "GET",
                    url: "promoteStudentToNextClass/"+clas+"/"+stream+"/"+section+"/"+teacher_id,
                    data: "data",
                    dataType: "json",
                    success: function (response) {
                        loadingModalHide();
                        swal.fire('Promoted!',response,'success');
                    }
                });
            };
        });
});

// $("#generate_one_year_card").click(function(){
//     get_term = $("#get_term").val();
//     class_id = $("#class_id").val();
//     $.ajax({
//         type: "GET",
//         url: "generateTotalCard/"+get_term+"/"+class_id,
//         data: "data",
//         dataType: "json",
//         success: function (response) {
//             swal.fire(response);

//         }
//     });
// });
// Pace.on("start", function(){
//     modal();
// });
// Pace.on("done", function(){
//     loadingModalHide();
// });
$("#generate_one_year_card").click(function(){

})


function moreAssasment()
{
        var courseLoad = ($("#courseExcel").val()).trim();
        var data = ($("#classExcel").val()).split(",");
        var assasment = ($("#generateAs").val()).trim();
        var subject = (data[3]).trim();
        // alert(data);
        assasment ='';
    // assasment = '<div class="col-6">'+
    //                 '<label>Assasment</label>'+
    //                 '<select  class="form-control" id="generateAs">'+
    //                 '</select>'+
    //             '</div>';
    // assasment += '<div class="col-4">'+
    //                 '<label>Test Load</label>'+
    //                 '<input type="Number"  class="form-control" id="courseExcel">'+
    //                 '<input hidden type="text"  class="form-control" id="classExcel">'+
    //                 '<input hidden type="text"  class="form-control" id="generateSub">';
    //             '</div>';
    assasment += '<div class="row col-12"> <input id="numberOfAssasmentField" type="number" class="col-2 form-control" min="1" max="15" placeholder="size"> <input onclick="prepareAssasmentBtn();" type="button" class="btn btn-secondary btn-sm m-1" value="prepare"></div>'
    // assasment += '<button class="col-2 btn btn-danger btn-sm"><i class=" btn-danger fa fa-trash"> </i></button>';

    $("#more_assasment").html(assasment);
    $("#moreItem").hide();
}


