$("#searchStudentClass").click(function () {
    var class_id = $("#class").val();
    var stream_id = $("#stream").val();
    //alert(class_id+" = "+ stream_id);
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
                        '<td>'+d.section_name+'</td>'+
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


$("#singleClassId").change(function () {
    var class_id = $("#singleClassId").val();

    $.ajax({
        type: 'GET',
        url: 'findSection/'+class_id,
        dataType : 'json',
        success:function (data) {
            console.log(data);
            var rows = '';
            var size = '';
            var count = 0;
            data.forEach(d => {
                //console.log(d);
                rows += '<label class="PillList-item">'+
                        '<input id="selectedSection" type="checkbox" name="feature" value="'+d+'">'+
                        '<span class="PillList-label" > Section '+d+
                        '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                        '</span>'+
                        '</label>'
                        count = count + 1;
           });
           size = '<div> <input id="dSize" class="" type="text" value="'+count+'"></div>';
           $('#listOfsections').html(rows);
           $('#size').html(size);
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
});


$("#assignTeacherToClsss").click(function () {
    var section = '';
    var counter=0;
    var assignSection =  $('input[name="feature"]:checked').each(function(){
         section += this.value+",";
    });
    var assignClass = $("#singleClassId").val();
    var assignSubject = $("#selectedSubject").val();
    var teacher_id = (document.getElementById('teacher_id').textContent).trim();

   // alert("Teacher ID:"+teacher_id+' '+"section:"+section+" Grade ID:"+assignClass+" Subjects ID:"+assignSubject);

    $.ajax({
        type: 'GET',
        url: 'setCourseLoad/'+teacher_id+'/'+section+'/'+assignClass+'/'+assignSubject,
        dataType : 'json',
        success:function (data) {
            console.log(data);
            var data1 = JSON.parse(JSON.stringify(data.datac));
            var data2 = JSON.parse(JSON.stringify(data.status));
            row = '';
            if(data2 == "Inserted"){
                data1.forEach(d => {
                    row+= '<tr><td>'+d.class_label+' </td>'+' <td>'+d.section+'</td>'+'<td>'+d.subject_name+'</td>'+
                    '<td><button onclick="deleteAssignClass(this);" type="button" class="m-1  btn-danger btn-sm" value="'+d.id+'"><i class="fa fa-trash"></i> </button></td>'+
                    '</tr>'
               });
               $('#courseLoad').html(row);
               alert("Class Assigned Seccessfuly")
            }else{
                alert("Already Assigned")
            }

        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });

});



$("#singleClassId2").change(function () {
    var class_id = $("#singleClassId2").val();
    //alert(class_id);
    $.ajax({
        type: 'GET',
        url: 'findSection/'+class_id,
        dataType : 'json',
        success:function (data) {
            console.log(data);
            var rows = '';
            var size = '';
            var count = 0;
            data.forEach(d => {
                rows += '<label class="PillList-item">'+
                        '<input id="selectedSection" type="checkbox" name="feature" value="'+d+'">'+
                        '<span class="PillList-label" > Section '+d+
                        '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                        '</span>'+
                        '</label>'
                        count = count + 1;
           });
           size = '<div> <input id="dSize" class="" type="text" value="'+count+'"></div>';
           $('#listOfsections2').html(rows);
           $('#size').html(size);
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
});
