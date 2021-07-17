$('#modal-teacher-home-room').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('teacher2')
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1])
    modal.find('.modal-footer button').val(detail);

    $.ajax({
        type: 'GET',
        url: 'getHomeRoom/'+(split[1].trim()),
        dataType : 'json',
        success:function (data) {
            row = '';
             console.log(data);
            data.forEach(d => {
                row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+
                '<td><button onclick="deleteHomeRoom(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
                '</tr>'
           });
            $('#homeroom').html(row);
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
    $.ajax({
        type: 'GET',
        url: 'deleteHomeRoom/'+deleteID,
        dataType : 'json',
        success:function (data) {
            row = '';
             console.log(data);
            data.forEach(d => {
                row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+
                '<td><button onclick="deleteHomeRoom(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
                '</tr>'
           });
            $('#homeroom').html(row);

        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
}


$("#assignTeacherHomeRoom").click(function () {
    var section = '';
    var counter=0;
    var assignSection =  $('input[name="feature"]:checked').each(function(){
        section += this.value+",";
   });
    var assignClass = $("#singleClassId2").val();
    var assignSubject = $("#selectedSubject2").val();
    var teacher_id = (document.getElementById('teacher_id2').textContent).trim();

    alert("Teacher ID:"+teacher_id+' '+"section:"+section+" Grade ID:"+assignClass);

    $.ajax({
        type: 'GET',
        url: 'SetHomeRoom/'+teacher_id+'/'+section+'/'+assignClass,
        dataType : 'json',
        success:function (data) {
            console.log(data);
            var data1 = JSON.parse(JSON.stringify(data.datac));
            var data2 = JSON.parse(JSON.stringify(data.status));
            // console.log(data1);
            // console.log(data2);
             row = '';
                data1.forEach(d => {
                    row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+'</td>'+
                    '<td><button onclick="deleteHomeRoom(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
                    '</tr>'
               });
               $('#homeroom').html(row);
               section = '';
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });

});
