$("#searchStudentClass").click(function () {
    var class_id = $("#class").val();
    var stream_id = $("#stream").val();
    fetch(class_id, stream_id);

});

function fetch(class_id, stream_id) {

    $.ajax({
        type: 'GET',
        url: 'fetchStudent/'+class_id+'/'+stream_id,
        dataType : 'json',

        success:function (data) {
            var rows = '';
            var counter = 0;
            data.forEach(d => {
                counter = counter+1;
                no = '<div class="ml-3 text-danger"><p>'+counter+'<p></div>'
                rows += '<tr>'+
                        // '<td>'+d.first_name +' '+ d.middle_name+ ' ' +d.last_name+'</td>'
                        '<td>'+d.student_id+'</td>'+
                        '<td>'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                        '<td>'+d.class_label+'</td>'+
                        '<td>'+d.stream_type+'</td>'+
                        '<td>'+
                        // '<button class="btn btn-success btn-sm"  data-toggle="modal"'+
                        // 'data-target="#add_discount" data-disount_data="'+student_id+','+d.load_id+','+d.payment_type+','+d.amount+'" >'+
                        // '<i class="fas fa-percent"></i>'+
                        // '</button>'+
                        '</td>'
                        '</tr>'
           });

           $('#student_list').html(rows);
           $('#counter').html(no);
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
}
