$('#modal-teacher').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('teacher')
    // alert(detail);
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1]);
    modal.find('.modal-footer button').val(detail);
    $.ajax({
        type: 'GET',
        url: 'getCourseLoad/'+(split[1].trim()),
        dataType : 'json',
        success:function (data) {
            row = '';
            row2 = '';
            var data1 = JSON.parse(JSON.stringify(data.teacher_courses));
            var data2 = JSON.parse(JSON.stringify(data.hoom_room));
            console.log(data1);
            console.log(data2);
            data1.forEach(d => {
                row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+'</td>'+'<td>'+d.subject_name+'</td>'+
                '<td><button onclick="deleteAssignClass(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
                '</tr>'
           });

            data2.forEach(d => {
                row2 += '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+'</td>';
            });

           $('#courseLoad').html(row);
           $('#home_room').html(row2);
        },
        error:function (data) {
            console.log("it is not works fine");
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

function deleteAssignClass(id){
    deleteID = id.value.trim();
    // alert(deleteID);
    // swal.fire("Cancelled", "Your imaginary file is safe :)", "error");

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
                success:function (data) {
                    console.log(data);
                    row = '';
                    data.forEach(d => {
                        row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+'</td>'+'<td>'+d.subject_name+'</td>'+
                        '<td><button onclick="deleteAssignClass(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
                        '</tr>'
                });
                $('#courseLoad').html(row);
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                // alert("Class Removed Seccessfuly")

                },
                error:function (data) {
                    console.log("it is not works fine");
                }
            });
        }
      })

    // $.ajax({
    //     type: 'GET',
    //     url: 'deleteCourseLoad/'+deleteID,
    //     dataType : 'json',
    //     success:function (data) {
    //         console.log(data);
    //         row = '';
    //         data.forEach(d => {
    //             row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+'</td>'+'<td>'+d.subject_name+'</td>'+
    //             '<td><button onclick="deleteAssignClass(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
    //             '</tr>'
    //        });
    //        $('#courseLoad').html(row);
    //        alert("Class Removed Seccessfuly")

    //     },
    //     error:function (data) {
    //         console.log("it is not works fine");
    //     }
    //  });
}

function checkBox($val){
    teacher_id = $val.value;
    status = $val.checked;
    // alert(teacher_id);
    // alert(status);

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
                '</tr>'
           });
           $('#courseLoad').html(row);
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
}


$('#wordgenerator').click(function(){
    $.ajax({
        type: 'GET',
        url: 'generatedox',
        dataType : 'json',
        success:function (data) {
            console.log(data);
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
});
