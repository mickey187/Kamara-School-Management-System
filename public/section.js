$("#searchStudentClass").click(function () {
    var class_id = $("#class").val();
    var stream_id = $("#stream").val();
    //alert(class_id+" = "+ stream_id);
    fetch(class_id, stream_id);

});

function fetch(class_id, stream_id) {
    $("#room_size").hide();
    $("#setSection").hide();
    $.ajax({
        type: 'GET',
        url: 'fetchStudent/'+class_id+'/'+stream_id,
        dataType : 'json',
        success:function (data) {
            var rows = '';
            var sec = '';
            var counter = 0;
            var section = JSON.parse(JSON.stringify(data.sections));
            var status = JSON.parse(JSON.stringify(data.status));
            var data = JSON.parse(JSON.stringify(data.classes));
            data.forEach(d=> {
                Object.assign(d,{action:"<input type='checkbox'>"});
                counter = counter+1;
                no = '<div class="ml-3 text-danger"><p class="text-bold">'+counter+'<p></div>'
            });
            // Swal.fire(
            //     'Registered Successfully!',
            //   );
            // console.log(status)
            console.log(data)
            if(status == 'true'){
                $("#sectionningPage").hide();
                section.forEach(d =>{
                    sec +=  '<label class="PillList-item">'+
                            '<input id="selectedSection" type="checkbox" name="feature" checked disabled value="'+d+'">'+
                            '<span class="PillList-label" > Section '+d+
                            '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                            '</span>'+
                            '</label>'
                })


                $("#table1").show();
                $("#table2").hide();
                $("#sectionTable1").show();
                $("#sectionTable1").DataTable({
                    // "processing": true,
                    // "serverSide": true,
                    // "ajax":"/finance/showStudentsRegsiteredForTransport",
                    "destroy":true,
                    "data":data,
                    "columns": [
                        { "data": "student_id" },
                        { "data": "full_name" },
                        { "data": "class_label" },
                        {"data": "stream_type"},
                        {"data": "section_name"},
                        // {"data": "action"},

                    ],
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ordering": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                }).buttons().container().appendTo('#student_graduation_table_wrapper .col-md-6:eq(0)');

               $('#counter').html(no);
               $('#sections').html(sec);
            }else{
                $("#sectionningPage").show();
                $("#table1").hide();
                $("#table2").show();
                $("#sectionTable2").show();
                $("#sectionTable2").DataTable({
                    // "processing": true,
                    // "serverSide": true,
                    // "ajax":"/finance/showStudentsRegsiteredForTransport",
                    "destroy":true,
                    "data":data,
                    "columns": [
                        { "data": "student_id" },
                        { "data": "full_name" },
                        { "data": "class_label" },
                        {"data": "stream_type"},
                        // {"data": "section_name"},
                        {"data": "action"},

                    ],
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ordering": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                }).buttons().container().appendTo('#student_graduation_table_wrapper .col-md-6:eq(0)');
                $('#counter2').html(no);
               $('#sections').html("<label class='text-danger' >Section Not Set For Selected Student!</label>");

            //    $('#sections').html(sec);
            }

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
                splitterStream = d.split("-");

                //console.log(d);
                rows += '<label class="PillList-item">'+
                        '<input id="selectedSection" type="checkbox" name="feature" value="'+d+'">'+
                        '<span class="PillList-label" >'+'Stream '+splitterStream[0]+' Section '+splitterStream[1]+
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

    console.log("Teacher ID:"+teacher_id+' '+"section:"+section+" Grade ID:"+assignClass+" Subjects ID:"+assignSubject);

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
            //    swal.fire("Class Assigned Seccessfuly","success")
               Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Course Assigned Successfuly',
                showConfirmButton: false,
                timer: 1500
              });
            }else{
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'These Course Already Assigned!',
                    showConfirmButton: false,
                    timer: 1500
                  });
                // alert("Already Assigned")
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


$("#section_type").change(function(){
    class_name = $("#class").val();
    stream_name = $("#stream").val();
    if($("#section_type").val() === "Custom"){
        $("#room_size").hide();
        $("#setSection").hide();
        $("#customSection").show();
        $("#assignCustomSection").show();
    }else if($("#section_type").val() === "Alphabet"){
        $("#room_size").show();
        $("#setSection").show();
        $("#customSection").hide();
        $("#assignCustomSection").hide();

    }else if($("#section_type").val() === "RegistrationDate"){
        $("#room_size").show();
        $("#setSection").show();
        $("#customSection").hide();
        $("#assignCustomSection").hide();

    }else if($("#section_type").val() === ""){
        $("#room_size").hide();
        $("#setSection").hide();
        $("#customSection").hide();
        $("#assignCustomSection").hide();

    }
});
$("#assignSectionForSelectedStudent").click(function (e) {
    e.preventDefault();
    $('.customSection').each(function(){
        var the_val = jQuery('input:radio:checked').attr('value');
        alert("Section "+the_val);
    })
});

$("#setSection").click(function(){
    class_name = $("#class").val();
    stream_name = $("#stream").val();
    section = $("#section_type").val();
    room = $("#room_size").val();
$.ajax({
    type: "GET",
    url: "setSection/"+class_name+"/"+stream_name+"/"+section+"/"+room,
    dataType: "JSON",
    success: function (response) {
        swal.fire("Sectioning Complited","success");
        var section = JSON.parse(JSON.stringify(response.sections));
        var status = JSON.parse(JSON.stringify(response.status));
        var data = JSON.parse(JSON.stringify(response.classes));
        swapClass(section,status,data);
    }
});
})

function swapClass(section,status,data){
    var rows = '';
    var sec = '';
    var counter = 0;
    console.log(status)
    console.log(data)
    if(status == 'true'){
        section.forEach(d =>{
            sec +=  '<label class="PillList-item">'+
                    '<input id="selectedSection" type="checkbox" name="feature" checked disabled value="'+d+'">'+
                    '<span class="PillList-label" > Section '+d+
                    '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                    '</span>'+
                    '</label>'
        })
        data.forEach(d => {
            counter = counter+1;
            no = '<div class="ml-3 text-danger"><p class="text-bold">'+counter+'<p></div>'
            rows += '<tr>'+
                    '<td>'+d.student_id+'</td>'+
                    '<td>'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                    '<td>'+d.class_label+'</td>'+
                    '<td>'+d.stream_type+'</td>'+
                    '<td>'+d.section_name+'</td>'+
                    '<td>'+
                    '</td>'
                    '</tr>'
       });

       $('#student_list').html(rows);
       $('#counter').html(no);
       $('#sections').html(sec);
    }else{
        data.forEach(d => {
            counter = counter+1;
            no = '<div class="ml-3 text-danger"><p class="text-bold">'+counter+'<p></div>'
            rows += '<tr>'+
                    '<td>'+d.student_id+'</td>'+
                    '<td>'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                    '<td>'+d.class_label+'</td>'+
                    '<td>'+d.stream_type+'</td>'+
                    '<td>'+d.section_name+'</td>'+
                    '<td>'+
                    '<button class="btn btn-success btn-sm"  data-toggle="modal"'+
                    'data-target="#add_discount" " >'+
                    '<i class="fas fa-percent"></i>'+
                    '</button>'+
                    '</td>'
                    '</tr>'
       });
       $('#student_list').html(rows);
       $('#counter').html(no);
       $('#sections').html("Section Not Set For Selected Student!");
    }

}
