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
                Object.assign(d,{action:"<input type='checkbox' value="+d.student_id+" id="+d.student_id+" name='students' class='checkbox'>"});
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
                });
                $("#table1").show();
                $("#table2").hide();
                $("#sectionTable1").show();
                $("#sectionTable1").DataTable({
                    // "processing": true,
                    // "serverSide": true,
                    // "ajax":"/finance/showStudentsRegsiteredForTransport",
                    "destroy":true,
                    "data":data,
                    // "rowId": [{"data":"student_id"}],
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
                }).buttons().container().appendTo('#sectionTable1_wrapper .col-md-6:eq(0)');

               $('#counter').html(no);
               $('#sections').html(sec);
            }else{
                $("#sectionningPage").show();
                $("#table1").hide();
                $("#table2").show();
                $("#sectionTable2").show();
                $("#sectionTable2").DataTable({
                    "destroy":true,
                    "data":data,
                    "columns": [
                        { "data": "student_id" },
                        { "data": "full_name" },
                        { "data": "class_label" },
                        { "data": "stream_type"},
                        { "data": "action"},
                        // { "rowId": "student_id"},
                    ],
                    "rowId":"student_id",
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ordering": false,
                    // "dom":'',
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

                }).buttons().container().appendTo('#sectionTable2_wrapper .col-md-6:eq(0)');


                $('#counter2').html(no);
               $('#sections').html("<label class='text-danger' >Section Not Set For Selected Student!</label>");
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


// $('input[name="selectAllCheckBox"]:checked').each(function(){
//     // section += this.value+",";
//     alert("");
// });




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
    var section = [];
    var student = [];
    $('.customSection').each(function(){
        var the_val = jQuery('input:radio:checked').attr('value');
        section.push(the_val);
    })

    $('input[name="students"]:checked').each(function() {
        // alert("Student"+this.value);
        student.push(this.value)
     });
    //  alert(section);
    //  alert(student);
     $.ajax({
         type: "GET",
         url: "customSection/"+section+"/"+student,
         dataType: "json",
         success: function (response) {
            swal.fire(response);
         }
     });
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


$("#nav-profile-tab").click(function(){
    // $("#nav-profile").html("<label> Abraham </label>");
    $.ajax({
        type: "GET",
        url: "getSectionedClasses",
        dataType: "json",
        success: function (response) {
            console.log(response);
            $("#example1").DataTable({
                "destroy":true,
                "data":response,
                "columns": [
                    { "data": "class" },
                    { "data": "stream" },
                ],
                // "rowId":"student_id",
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                // "dom":'',
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            // swal.fire("OK");
        }
    });
})

$("#selectAllCheckBox").click(function (e) {
    e.preventDefault();
    alert("");
});




$('input[name=selectAllCheckBox]').change(function() {
    var size=0;
    if ($(this).is(':checked')) {
        $('input[name="studentCheckedList"]:not(:checked)').each(function(){
                $(this).attr('checked', "checked");
                size++;
        });
        $("#selctedStudentSize").html("Selected Student : "+size);
    } else {
        $('input[name="studentCheckedList"]:checked').each(function(){
                console.log(this.value)
                size--;
                $(this).attr('checked', false);
        });
        $("#selctedStudentSize").html("Selected Student : "+size);
    }
});



// $("sectionSizeLimit")
$( "#sectionSizeLimit" ).focusout(function() {
    var size=0;
    var student = [];
    $("#avelableSection2").hide();

    $('input[name="studentCheckedList"]:checked').each(function(){
        splitter = this.value.split(",");
        console.log(splitter[0])

        student.push(splitter[0]);
        size++;
    });
    var output = (Math.floor(size / parseInt( $(this).val() ) ) ).toFixed();
    var left = Math.floor(size % parseInt( $(this).val()));
    //  - parseInt($(this).val());
    $("#sectionList").html("<h3 class='text-success'> "+output+" Sections Available. </h3><h4 class='text-warning'>"+left+" Students do not have section.</h4><button onclick='setAnyway(this);' type='button' class='btn btn-success m-1' value='"+output+"-"+$(this).val()+"-"+student+"'>set anyway</button><button type='button' onclick='mergeAndSet(this)' class='btn btn-success m-1' value='"+output+"-"+$(this).val()+"-"+student+"'>merge "+left+" Students and set</button><button type='button' onclick='addNewSectionAndSet(this);' class='btn btn-success m-1' value='"+output+"-"+$(this).val()+"-"+student+"'>add a new section for "+left+" Students and set</button>");
  });


function addNewSectionAndSet(val) {
    splitter = (val.value).split("-");
    var student = splitter[2];
    var section = splitter[0];
    var size = splitter[1];
    var avalableSection = '';
    var alphabet = [ 'a', 'b', 'c', 'd', 'e',
    'f', 'g', 'h', 'i', 'j',
    'k', 'l', 'm', 'n', 'o',
    'p', 'q', 'r', 's', 't',
    'u', 'v', 'w', 'x', 'y',
    'z'
    ];
    $.ajax({
        type: "GET",
        url: "addNewSectionAndSetMode/"+student+"/"+section+"/"+size,
        dataType: "json",
        success: function (response) {
            // console.log(response);
                var getStudent = JSON.parse(JSON.stringify(response.getStudent));
                var size2 = [];
                    size2 = JSON.parse(JSON.stringify(response.size));
                var studentSize = JSON.parse(JSON.stringify(response.studentSize));
                    getStudent.forEach(d=> {
                        checkbox = ' <div class="form-check form-switch checkbox-xl">'+
                                    '<input name="studentCheckedList" value='+d.student_id+','+d.full_name+' type="checkbox" class="custom-control-input" id="checkbox-3" >'+
                                    '<label class="custom-control-label" for="checkbox-3"></label>'+
                                '</div>';
                    Object.assign(d,{action:"<input type='button' id="+d.class+" value='set section' name='students' data-toggle='modal' data-target='#setSectionModal' data-section="+d.student_id+","+d.full_name+" class='btn btn-success'>"});
                    // Object.assign(d,{select:checkbox});
                    Object.assign(d,{select:"<input name='studentCheckedList' value="+d.student_id+','+d.full_name+" type='checkbox' id='flexSwitchCheckChecked' class=''>"});
                    });
                    counter = counter+1;
                Swal.fire(size2.length+" Section Are Created Successfuly!");
                  $("#sectionList").html("<h3 class='text-success'> "+size2.length+" Sections are created. </h3><h4 class='text-warning'> Students do not have section.</h4>");
                    for (var i = 0; i < size2.length; i++){
                        // avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value="'+alphabet[i]+'">'+alphabet[i]+'</label>'
                        avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[i]+'>'+alphabet[i]+' -> '+size2[i]+' Students</label>'
                        $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                    }
                    avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[size2.length]+'>'+alphabet[size2.length]+' new section </label>'
                    $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                $("#avelableSection").html(avalableSection);
                    //   $("#avelableSection2").show();
                            // $("#sectionSizeLimit").hide();

                $("#example3").DataTable({
                    "destroy":true,
                    "pageLength": 50,
                    "data":getStudent,
                    "columns": [
                        { "data": "student_id" },
                        { "data": "full_name" },
                        { "data": "class_label" },
                        { "data": "stream_type" },
                        { "data": "action" },
                        { "data": "select" },
                    ],
                    // "rowId":"student_id",
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ordering": false,
                    // "dom":'',
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
                avalableSection = '';
                for (let i = 0; i < size2.length; i++) {
                    avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[i]+'> '+alphabet[i]+' -> '+size2[i]+' students </label>';
                    $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                }
                avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[size2.length]+'> '+alphabet[size2.length]+' -> new section </label>';
                $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                $("#setSectionForSelectedStudentButton").show();
                $("#avelableSection").html(avalableSection);
        }
    });
    // swal.fire(section);
}



  function mergeAndSet(val){
    splitter = (val.value).split("-");
    var student = splitter[2];
    var section = splitter[0];
    var size = splitter[1];
    var avalableSection = '';
    var alphabet = [ 'a', 'b', 'c', 'd', 'e',
    'f', 'g', 'h', 'i', 'j',
    'k', 'l', 'm', 'n', 'o',
    'p', 'q', 'r', 's', 't',
    'u', 'v', 'w', 'x', 'y',
    'z'
    ];
    $.ajax({
        type: "GET",
        url: "setSectionAndMergeMode/"+student+"/"+section+"/"+size,
        dataType: "json",
        success: function (response) {
            // console.log(response);
                var getStudent = JSON.parse(JSON.stringify(response.getStudent));
                var size2 = [];
                    size2 = JSON.parse(JSON.stringify(response.size));
                var studentSize = JSON.parse(JSON.stringify(response.studentSize));
                    getStudent.forEach(d=> {
                        checkbox = ' <div class="form-check form-switch checkbox-xl">'+
                                    '<input name="studentCheckedList" value='+d.student_id+','+d.full_name+' type="checkbox" class="custom-control-input" id="checkbox-3" >'+
                                    '<label class="custom-control-label" for="checkbox-3"></label>'+
                                '</div>';
                    Object.assign(d,{action:"<input type='button' id="+d.class+" value='set section' name='students' data-toggle='modal' data-target='#setSectionModal' data-section="+d.student_id+","+d.full_name+" class='btn btn-success'>"});
                    // Object.assign(d,{select:checkbox});
                    Object.assign(d,{select:"<input name='studentCheckedList' value="+d.student_id+','+d.full_name+" type='checkbox' id='flexSwitchCheckChecked' class=''>"});
                    });
                    counter = counter+1;
                Swal.fire(size2.length+" Section Are Created Successfuly!");
                  $("#sectionList").html("<h3 class='text-success'> "+size2.length+" Sections are created. </h3><h4 class='text-warning'> Students do not have section.</h4>");
                    for (let i = 0; i < size2.length; i++) {
                        // avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value="'+alphabet[i]+'">'+alphabet[i]+'</label>'
                        avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[i]+'>'+alphabet[i]+' -> '+size2[i]+' Students</label>'
                        $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                    }
                    avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[size.length]+'>'+alphabet[size.length]+' new section </label>'
                    $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                $("#avelableSection").html(avalableSection);
                    //   $("#avelableSection2").show();
                            // $("#sectionSizeLimit").hide();

                $("#example3").DataTable({
                    "destroy":true,
                    "pageLength": 50,
                    "data":getStudent,
                    "columns": [
                        { "data": "student_id" },
                        { "data": "full_name" },
                        { "data": "class_label" },
                        { "data": "stream_type" },
                        { "data": "action" },
                        { "data": "select" },
                    ],
                    // "rowId":"student_id",
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ordering": false,
                    // "dom":'',
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
                avalableSection = '';
                for (let i = 0; i < size2.length; i++) {
                    avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[i]+'> '+alphabet[i]+' -> '+size2[i]+' students </label>';
                    $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                }
                avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[size.length]+'> '+alphabet[size.length]+' -> new section </label>';
                $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                $("#setSectionForSelectedStudentButton").show();
                $("#avelableSection").html(avalableSection);
        }
    });
  }
  function setAnyway(val){
        var data = [];
        var alphabet = [ 'a', 'b', 'c', 'd', 'e',
        'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y',
        'z'
        ];
        var avalableSection = '';
        splitter = (val.value).split("-");
        data =splitter[2].split(",");
            $.ajax({
                type: "GET",
                url: "setSectionAnyWayMode/"+data+"/"+splitter[0]+"/"+splitter[1],
                dataType: "json",
                success: function (response) {
                    var getStudent = JSON.parse(JSON.stringify(response.getStudent));
                    var size = JSON.parse(JSON.stringify(response.size));
                        getStudent.forEach(d=> {
                            checkbox = ' <div class="form-check form-switch checkbox-xl">'+
                                        '<input name="studentCheckedList" value='+d.student_id+','+d.full_name+' type="checkbox" class="custom-control-input" id="checkbox-3" >'+
                                        '<label class="custom-control-label" for="checkbox-3"></label>'+
                                    '</div>';
                        Object.assign(d,{action:"<input type='button' id="+d.class+" value='set section' name='students' data-toggle='modal' data-target='#setSectionModal' data-section="+d.student_id+","+d.full_name+" class='btn btn-success'>"});
                        // Object.assign(d,{select:checkbox});
                        Object.assign(d,{select:"<input name='studentCheckedList' value="+d.student_id+','+d.full_name+" type='checkbox' id='flexSwitchCheckChecked' class=''>"});
                        });
                        counter = counter+1;
                    Swal.fire(size+" Section Are Created Successfuly!");
                      $("#sectionList").html("<h3 class='text-success'> "+size+" Sections are created. </h3><h4 class='text-warning'> Students do not have section.</h4>");
                        for (let i = 0; i < size; i++) {
                            // avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value="'+alphabet[i]+'">'+alphabet[i]+'</label>'
                            avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[i]+'>'+alphabet[i]+' -> '+splitter[1]+' Students</label>'
                            $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                        }
                        avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[size]+'>'+alphabet[size]+' new section </label>'
                        $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                    $("#avelableSection").html(avalableSection);
                        //   $("#avelableSection2").show();
                                // $("#sectionSizeLimit").hide();

                    $("#example3").DataTable({
                        "destroy":true,
                        "pageLength": 50,
                        "data":getStudent,
                        "columns": [
                            { "data": "student_id" },
                            { "data": "full_name" },
                            { "data": "class_label" },
                            { "data": "stream_type" },
                            { "data": "action" },
                            { "data": "select" },
                        ],
                        // "rowId":"student_id",
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                        "ordering": false,
                        // "dom":'',
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

                    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
                    avalableSection = '';
                    for (let i = 0; i < size; i++) {
                        avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[i]+'> '+alphabet[i]+' -> '+splitter[1]+' students </label>'
                        $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                    }
                    avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[size]+'> '+alphabet[size]+' -> new section </label>'
                    $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                    $("#setSectionForSelectedStudentButton").show();
                    $("#avelableSection").html(avalableSection);

                }
            });
  }

function setAutomatic() {

    var size=0;
    var student=[];
    var roomSize= $("#sectionSizeLimit2").val();;
    $('input[name="studentCheckedList"]:checked').each(function(){
        splitter= (this.value).split(",");
        student.push(splitter[0]);
        size++;
    });
    var alphabet = [ 'a', 'b', 'c', 'd', 'e',
    'f', 'g', 'h', 'i', 'j',
    'k', 'l', 'm', 'n', 'o',
    'p', 'q', 'r', 's', 't',
    'u', 'v', 'w', 'x', 'y',
    'z'
    ];

    console.log("student is: "+student);

    $.ajax({
        type: "GET",
        url: "setSectionAutoMode/"+student+"/"+size+"/"+roomSize,
        dataType: "json",
        success: function (response) {
            avalableSection = '';
            var getStudent = JSON.parse(JSON.stringify(response.getStudent));
            var size2 = [];
                size2 = JSON.parse(JSON.stringify(response.size));
            var studentSize = JSON.parse(JSON.stringify(response.studentSize));
                getStudent.forEach(d=> {
                    checkbox = ' <div class="form-check form-switch checkbox-xl">'+
                                '<input name="studentCheckedList" value='+d.student_id+','+d.full_name+' type="checkbox" class="custom-control-input" id="checkbox-3" >'+
                                '<label class="custom-control-label" for="checkbox-3"></label>'+
                            '</div>';
                Object.assign(d,{action:"<input type='button' id="+d.class+" value='set section' name='students' data-toggle='modal' data-target='#setSectionModal' data-section="+d.student_id+","+d.full_name+" class='btn btn-success'>"});
                // Object.assign(d,{select:checkbox});
                Object.assign(d,{select:"<input name='studentCheckedList' value="+d.student_id+','+d.full_name+" type='checkbox' id='flexSwitchCheckChecked' class=''>"});
                });
                counter = counter+1;
            Swal.fire(size2.length+" Section Are Created Successfuly!");
              $("#sectionList").html("<h3 class='text-success'> "+size2.length+" Sections are created. </h3><h4 class='text-warning'> Students do not have section.</h4>");
                for (let i = 0; i < size2.length; i++) {
                    // avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value="'+alphabet[i]+'">'+alphabet[i]+'</label>'
                    avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[i]+'>'+alphabet[i]+' -> '+size2[i]+' Students</label>'
                    $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                }
                avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[size2.length]+'>'+alphabet[size2.length]+' new section </label>'
                $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
            $("#avelableSection").html(avalableSection);
                //   $("#avelableSection2").show();
                        // $("#sectionSizeLimit").hide();

            $("#example3").DataTable({
                "destroy":true,
                "pageLength": 50,
                "data":getStudent,
                "columns": [
                    { "data": "student_id" },
                    { "data": "full_name" },
                    { "data": "class_label" },
                    { "data": "stream_type" },
                    { "data": "action" },
                    { "data": "select" },
                ],
                // "rowId":"student_id",
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                // "dom":'',
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
            avalableSection = '';
            for (let i = 0; i < size2.length; i++) {
                avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[i]+'> '+alphabet[i]+' -> '+size2[i]+' students </label>';
                $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
            }
            avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[size2.length]+'> '+alphabet[size2.length]+' -> new section </label>';
            $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
            $("#setSectionForSelectedStudentButton").show();
            $("#avelableSection").html(avalableSection);
        }
    });
}
function getSelectedStudentManualy(){

    var size=0;
    $('input[name="studentCheckedList"]:checked').each(function(){
        console.log(this.value)
        size++;
    });
    $("#selctedStudentSize").html("Selected Student : "+size);
    $("#selctedStudentSize2").html("Selected Student : "+size);

}




function getStudentList(val){
    // alert(val.value);
    spliter = (val.value).split(",");
    classes =  spliter[0];
    stream = spliter[1];
    // $("#").hide();
    // Swal.fire(stream);
    $.ajax({
        type: "GET",
        url: "setSectionForClass/"+classes+"/"+stream,
        dataType: "json",
        success: function (response) {
                $("#nav-about-tab").click();
                var getStudent = JSON.parse(JSON.stringify(response.getStudent));
                var section = JSON.parse(JSON.stringify(response.section));
                var avalableSection = '';

                console.log(section);
                getStudent.forEach(d=> {
                    checkbox = ' <div class="form-check form-switch checkbox-xl">'+
                                '<input name="studentCheckedList" value='+d.student_id+','+d.full_name+' type="checkbox" class="custom-control-input" id="checkbox-3" >'+
                                '<label class="custom-control-label" for="checkbox-3"></label>'+
                            '</div>';
                Object.assign(d,{action:"<input type='button' id="+d.class+" value='set section' name='students' data-toggle='modal' data-target='#setSectionModal' data-section="+d.student_id+","+d.full_name+" class='btn btn-success'>"});
                Object.assign(d,{select:"<input name='studentCheckedList' value="+d.student_id+','+d.full_name+" type='checkbox' id='flexSwitchCheckChecked' class=''>"});
                counter = counter+1;
            });

            $("#example02").show();
            $("#example3").DataTable({
                "destroy":true,
                "pageLength": 50,
                "data":getStudent,
                "columns": [
                    { "data": "student_id" },
                    { "data": "full_name" },
                    { "data": "class_label" },
                    { "data": "stream_type" },
                    { "data": "action" },
                    { "data": "select" },
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                // "dom":'',
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
            if(section.length >= 1){
                var alphabet = [ 'a', 'b', 'c', 'd', 'e',
                'f', 'g', 'h', 'i', 'j',
                'k', 'l', 'm', 'n', 'o',
                'p', 'q', 'r', 's', 't',
                'u', 'v', 'w', 'x', 'y',
                'z'
                ];
                    section.forEach(d=>{
                        avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+d.section+'> '+d.section+' -> '+d.size+' Students</label>'
                        $("#setSectionForSelectedStudent").html('<input id="setSectionForSelectedStudentButton" onclick="setSectionForSelectedStudentButton();" type="button" class="btn btn-success" value="set section" data-toggle="modal" data-target="#progressModal">');
                        $("#setSectionForSelectedStudentButton").show();
                    });
                    avalableSection += '<label class="btn btn-secondary active m-1"><input type="radio" name="section" id="option1" autocomplete="off" value='+alphabet[section.length]+'> '+alphabet[section.length]+' -> new section</label>'

            }else{
                    avalableSection += '<input onclick="getSelectedStudentManualy()" type="button" class="btn btn-secondary m-1" value="Set Section Manualy"  data-toggle="modal" data-target="#setSectionManualy"><input onclick="getSelectedStudentManualy()" type="button" class="btn btn-secondary m-1" value="Set Section Automaticaly"  data-toggle="modal" data-target="#setSctionAutomaticaly">';
                    $("#setSectionForSelectedStudentButton").hide();
                }
            $("#avelableSection").html(avalableSection);
        }
    });

}


function setSectionForSelectedStudentButton() {
    var section = '';
    var counter = 0;
    var total = 0;
    $('input[name="studentCheckedList"]:checked').each(function(){
        total++;
    });
    counter += parseFloat(100/total);
    $('.customSection').each(function(){
        var the_val = jQuery('input:radio:checked').attr('value');
        section = the_val
    })

    $('input[name="studentCheckedList"]:checked').each(function(){
        splitter = (this.value).split(",");
        var row='';
        $.ajax({
            type: "GET",
            url: "setSectionForSelectedStudent/"+splitter[0]+"/"+section,
            dataType: "json",
            success: function (response) {
                console.log(response);
                row+=   '<div class="progress">'+
                            '<div class="progress-bar" role="progressbar" style="width: '+parseInt(counter)+'%;" aria-valuenow="'+parseInt(counter)+'" aria-valuemin="0" aria-valuemax="100">'+parseInt(counter)+'%</div>'+
                        '</div>';
                        counter += parseFloat(100/total);
                        if(counter == 100){
                            swal.fire("Sectionning Complitted!")
                        }

                $("#setProgressBar").html(row);
            }
        });
    });
}



$("#nav-contact-tab").click(function(){
    $.ajax({
        type: "GET",
        url: "getNotSectionedClasses",
        dataType: "json",
        success: function (response) {
            response.forEach(d=> {
                Object.assign(d,{action:"<button onclick='getStudentList(this)' value='"+d.class+','+d.stream+"' name='students' class='btn btn-success m-1'>set section</button><input type='button' class='btn btn-success m-1' value='Go To Student'>"});
                counter = counter+1;
            });
            console.log(response);
            $("#example2").show();
            $("#example02").hide();
            $("#example2").DataTable({
                "destroy":true,
                "data":response,
                "columns": [
                    { "data": "class" },
                    { "data": "stream" },
                    { "data": "action" },
                ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        }
    });
});

$("#setSectionForOneStudent").click(function(){
    var student = $("#student_id").val();
    var section = $("#section_id").val();
    $.ajax({
        type: "GET",
        url: "assignSectionForStudent/"+student+"/"+section,
        dataType: "json",
        success: function (response) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Student Assigned SuccessFuly',
                showConfirmButton: false,
                timer: 1500
              });
        }
    });
})


function getStudents($val){
    swal.fire($val);
}


$('#modal-student').on('show.bs.modal', function(event) {

});
