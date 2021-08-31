function getCourseLoad(id){

    $.ajax({
        type: 'GET',
        url: 'getCourseLoad/'+id,
        dataType : 'json',
        success:function (data) {
            row = '';
            row2 = '';
            // var data1 = JSON.parse(JSON.stringify(data.teacher_courses));
            console.log(data);
            data.forEach(d => {
               // alert("Teacher Courses "+d.stream)
                row+='<div class="col-4 mt-2">'+
                '<button class="col-12 btn" style="cursor: pointer;" onclick="getCourseLoadStudent(this);" value="'+d.id+','+d.class_id+','+d.section_label+','+d.teacher_id+','+d.stream_type+'">'+
                    '<div class="small-box bg-primary ">'+
                        '<div class="inner ">'+
                          '<label>'+d.class_label+' '+d.section_label+'</label><br>'+
                          '<label>'+d.subject_name+'</label><br>'+
                          '<label> Stream '+d.stream_type+'</label>'+
                          '</div>'+
                        '<div class="icon"><br>'+
                          '<i class="fas fa-users"></i>'+
                        '</div>'+
                        '<a  class="col-12 small-box-footer"'+
                               '>More info'+
                                '<i class="fas fa-arrow-circle-right"></i></a>'+
                    '</div>'+
                '</button>'+
                '</div>';
           });
           row2 += 'Dashboard / Course Load';
           generator =''
           $('#generator').html(generator);
           $('#teacherDashboardTitle').html(row2);
           $('#dashboard').html(row);
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
}

function getCourseLoadStudent(nb){
    var data = (nb.value).split(",");
    class_id = data[1];
    section = data[2];
    teacher_id = data[3];
    course_load_id = data[0];
    stream = data[4];
    getSubject = '';
   // alert(stream)
    // stream_id = data[4];
    //alert('class_id: '+class_id+' section: '+section+' teacher: '+teacher_id+' course load: '+course_load_id)
    $.ajax({
        type: 'GET',
        url: 'getCourseLoadStudent/'+teacher_id+'/'+section+'/'+class_id+'/'+course_load_id+'/'+stream,
        dataType : 'json',
        success:function (data) {
                var section1 = JSON.parse(JSON.stringify(data.section));
                var mark1 = JSON.parse(JSON.stringify(data.mark));
                var semister1 = JSON.parse(JSON.stringify(data.semister));
                var subject = JSON.parse(JSON.stringify(data.subject));
                getSubject = subject;
                // console.log("wwwwwwwwwwww "+getSubject);

               // var assasment_name = JSON.parse(JSON.stringify(data.assasment));
                var count = 1;
                row2 = '';
                console.log(data);
                row = '<div class="card  col-12">'+
                      '<section class="content">'+
                      '<div class="container-fluid">'+
                          '<h2 class="text-center display-4">Search</h2>'+
                          '<div class="row">'+
                              '<div class="col-md-8 offset-md-2">'+
                                  '<form action="simple-results.html">'+
                                      '<div class="input-group">'+
                                          '<input type="search" class="form-control form-control-lg" placeholder="Search Student By Name">'+
                                          '<div class="input-group-append">'+
                                              '<button type="submit" class="btn btn-lg btn-default">'+
                                                  '<i class="fa fa-search"></i>'+
                                              '</button>'+
                                          '</div>'+
                                      '</div>'+
                                  '</form>'+
                              '</div>'+
                          '</div>'+
                      '</div>'+
                  '</section><br>'+
                      '<div  class="card"><table class="table table-striped table-bordered table-xl"'+
                        '<thead class"bg-primary shadow">'+
                            '<th>No</th>'+
                            '<th>Full Name</th>'+
                            '<th>Gender</th>'+
                        '</thead>'+'<tbody>'

                section1.forEach(d => {
                    row+='<tr style="cursor: pointer; border: 1.5px solid #DCDCDC !important;" data-toggle="collapse" data-target="#demo1'+count+'" class="accordion-toggle shadow bg-white"  aria-expanded="false">'+
                            '<td>'+count+'</td>'+
                            '<td>'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                            '<td>'+d.gender+'</td>'+
                         '</tr>'+
                         '<td colspan="12" class="hiddenRow">'
                    semister1.forEach(d3 =>{
                        all_total = 0;
                        all_percent = 0;
                        style = '';
                        if(!d3.current_semister)
                            style='style="display:none;"';
                        row+='<div class="d-flex justify-content-center">'+
                        '<div '+style+' class="accordian-body collapse col-8" id="demo1'+count+'">'+
                        '<table class="table  table-striped table-sm">'+
                            '<thead class="text-dark">'+
                                '<div class="row  card-sm card  card-sm bg-secondary">'+
                                    '<div class="">'+
                                        '<h6 style="margin:10px;" class="float-left">Semister '+d3.semister+' '+d3.term+'</h6>'+
                                        '<button onclick="addMarkList(this);" value="'+d.studid+','+d.class_id+','+d3.id+','+subject+','+d.first_name+' '+d.middle_name+' '+d.last_name+','+d3.semister+d3.term+'" class="btn bg-white float-right btn-sm m-1"><i class="fa fa-plus"></button></i>'+
                                    '</div>'+
                                '</div>'+
                                '<tr >'+
                                    '<th class="text-center">Subject</th>'+
                                    '<th class="text-center">Assasment</th>'+
                                    '<th class="text-center">Mark</th>'+
                                    '<th class="text-center">Load</th>'+
                                    '<th class="text-center">Action</th>'+
                                '</tr>'+
                            '</thead>'+
                        '<tbody id="semister'+d3.id+"-"+d.ssection_id+'">'
                        console.log("inside out row id => "+d3.id+"-"+d.ssection_id)
                        mark1.forEach(d2 => {
                            all_semister=d2.semister+d2.term;
                            if(d2.student_id==d.student_id){
                                if(d3.semister+d3.term==all_semister){
                                        row+='<tr class="text-primary" id="'+d2.id+'">'+
                                            '<td class="text-center">'+ d2.subject_name+' </td>'+
                                            '<td class="text-center">'+d2.assasment_type+'</td>'+
                                            '<td class="text-center">'+d2.mark+'</td>'+
                                            '<td class="text-center">'+ d2.test_load+' </td>'+
                                            '<td class="text-center">'+
                                                '<button onclick="editMark(this)" value="'+d2.id+','+d2.assasment_type+','+d2.mark+','+ d2.test_load+','+d.first_name+' '+d.middle_name+' '+d.last_name+','+d2.subject_name+','+d3.semister+'-'+d3.term+'" class="btn btn-primary btn-sm m-1"> <i class="fas fa-pen"></i></button>'+
                                            '</td>'+
                                        '</tr>'
                                        all_percent = all_percent + d2.test_load;
                                        all_total = all_total + d2.mark;
                                }else{
                                }
                            }

                        });
                        row+= '<tr id="editTotalMl'+d3.semister+d3.term+'" class="text-primary  text-bold"><td colspan="2" class="text-right">Total</td><td colspan="3" class="text-left">'+all_total.toFixed(2)+'/'+all_percent+'</td></tr></tbody>'+
                        '</table>'+
                        '</div>'+
                         '</div> <input hidden type="text" id="total'+d3.semister+d3.term+'" value="'+d3.semister+d3.term+'"><input hidden type="text" id="percent'+d3.semister+d3.term+'" value="'+all_percent+'">'
                         all_total = 0;
                         all_percent = 0;
                    })
                    row+= '</td>'+
                            '</tr>'+
                            '</tr>'
                    count++;
               });
               row2 += 'Dashboard / Course Load / '+stream+' Section '+section;
               generator ='<button  class="shadow p-1 rounded  btn btn-primary btn-sm"'+
                                'data-toggle="modal"'+
                                'data-excel="'+class_id+','+stream+','+section+','+subject+'"'+
                                'data-target="#modal-generate-excel"'+
                            '>GENERATE MARK LIST <i class="fas fa-download"></i></button>'+
                        '<button  class="shadow p-1 ml-1  rounded  btn btn-success btn-sm"'+
                                'data-toggle="modal"'+
                                'data-excel2="'+class_id+','+stream+','+section+','+course_load_id+','+getSubject+'"'+
                                'data-target="#modal-import-excel"'+
                        '>UPLOAD MARK LIST <i class="fas fa-upload"></i></button>'

               row+='</tbody></table></div>';
               $('#teacherDashboardTitle').html(row2);
               $('#dashboard').html(row);
               $('#generator').html(generator);

            },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
}

function editMark(val){
    var splitter = (val.value.trim()).split(",");
    var id = splitter[0];
    var assasmentType = splitter[1];
    var mark = splitter[2];
    var load = splitter[3];
    var name = splitter[4];
    var subject = splitter[5];
    var total = splitter[6];
    $('#modal-editMark').click();
    $('#modal-editMark').modal('show');
    $("#modal-editMark").click(function () {
        var str = "Assasment : "+assasmentType
            + "Mark: " + mark
            + " Load: " + load;
        // $("#modal_body").html(str);
        //$("#assasment").html(assasmentType);
        $(".modal-header #title").html(name);
        $(".modal-body #assasment").val(assasmentType);
        // $(".modal-body #mark").text(mark);
        // $(".modal-body #load").text(load);
        $(".modal-body #mark").attr("value", mark);
        $(".modal-body #load").attr("value", load);
        $(".modal-body #aid").val(id);
        $(".modal-body #fullname").val(name);
        $(".modal-body #subject").val(subject);
        $(".modal-body #total").val(total);
        // $(".modal-body #load").val(load);
    });
    $('#modal-editMark').click();
}

function saveEditedValue(){
    var id = $("#aid").val().trim()
    var mark = $("#mark").val().trim()
    var load = $("#load").val().trim()
    var name = $('#fullname').val().trim()
    var assasment = $("#assasment").val().trim();
    var subject = $("#subject").val().trim();
    var total = $("#total").val().trim().split("-");
    var vl1 = $("#total"+total[0]+total[1]).val().trim()
    var vl2 = $("#percent"+total[0]+total[1]).val().trim()
    //alert(vl1+vl2);
    //alert('id: '+id+' Mark: '+ mark+ ' Load: '+ load+ ' Assasment: '+ assasment +' Name: '+name+' Subject: '+subject+' Total: '+total);
    $.ajax({
        type: 'GET',
        url: 'editMarkStudentList/'+id+'/'+mark+'/'+load+'/'+assasment,
        success:function(data){
            console.log(data)
           var row='';
           var row2='';
            row='<td class="text-center text-bold">'+subject+'</td><td class="text-center text-bold">'+assasment+'</td><td class="text-center text-bold">'+mark+'</td><td class="text-center text-bold">'+load+'</td>'+
            '<td class="text-center text-bold">'+
                '<button onclick="editMark(this)" value="'+id+','+assasment+','+mark+','+load+','+name+','+subject+'" class="btn btn-primary btn-sm m-1"> <i class="fas fa-pen"></i></button>'+
            '</td>'
            row2+= '<td colspan="2" class="text-right">Total</td><td colspan="3" class="text-left">Loading...</td>'
            $('#'+data).html(row);
            $('#editTotalMl'+vl1).html(row2);
            Swal.fire("Updated!", "You Updated Successfuly!", "success");
            closer();
        }
    })

}

function closer(){
    $('#modal-editMark').modal('hide');
}

function closeAddMl(){
    $('#modal-addMarkList').modal('hide');
}

function addMarkList(val){

    var splitter = (val.value.trim()).split(",");
    var student = splitter[0];
    var class_id = splitter[1];
    var semister = splitter[2];
    var subject = splitter[3];
    var name = splitter[4];
    var term = splitter[5];
    var mark_id = splitter[6];


//   alert(subject)
  //  alert('Student: '+student+' Class: '+class_id+' Semister: '+semister)
    $('#modal-addMarkList').modal('show');
    $("#modal-addMarkList").click(function () {
        $(".modal-body #student").val(student);
        $(".modal-body #class").val(class_id);
        $(".modal-body #subject").val(subject);
        $(".modal-body #semister").val(semister);
        $(".modal-body #name").val(name);
        $(".modal-body #term2").val(term);
    });
    $('#modal-addMarkList').click();
}

function sendMarkList(){
    var student = $("#student").val().trim();
    var class_id = $("#class").val().trim();
    var mark = $("#mark2").val().trim();
    var load = $("#load2").val().trim();
    var assasment = $("#assasment2").val().trim();
    var subject = $("#subject").val().trim();
    var semister = $("#semister").val().trim();
    var name = $("#name2").val().trim();
    var term = $("#term2").val().trim();
    console.log("First student id: "+student)
    console.log("First Semister: "+semister)

   // alert('Assasment: '+assasment+' student: '+student+' Class: '+class_id+' Load: '+load+' Mark: '+mark+' Subject: '+subject+' Semister'+semister)
   $.ajax({
       type: 'GET',
       url: 'singleAddMarkList/'+student+'/'+class_id+'/'+semister+'/'+assasment+'/'+subject+'/'+mark+'/'+load,
       success: function(data){
            // console.log(term)
            semid = 0;
            studid = 0;
            row = '';
            var mark = JSON.parse(JSON.stringify(data.mark));
            var new1 = JSON.parse(JSON.stringify(data.new));
            mark.forEach(d2 => {
                 console.log(d2.semid)
                 console.log("Old: "+d2.id)
                 console.log("New: "+new1)
                 console.log(semister)
                 semid = d2.semid;
                 studid = d2.student_id;
                 if(d2.semister+d2.term==term){
                        console.log("Second term "+term)
                        console.log("Second db term "+d2.semister+d2.term)
                        console.log("Second student id "+d2.student_id)
                            if(new1 == d2.id){
                                row+=
                                '<tr class="text-primary" id="'+d2.id+'">'+
                                    '<td class="text-center"><span class="badge badge-danger">New</span> '+ d2.subject_name+' </td>'+
                                    '<td class="text-center">'+d2.assasment_type+'</td>'+
                                    '<td class="text-center">'+d2.mark+'</td>'+
                                    '<td class="text-center">'+ d2.test_load+' </td>'+
                                    '<td class="text-center">'+
                                        '<button onclick="editMark(this)" value="'+d2.id+','+d2.assasment_type+','+d2.mark+','+ d2.test_load+','+name+','+d2.subject_name+','+d2.semister+'-'+d2.term+'" class="btn btn-primary btn-sm m-1"> <i class="fas fa-pen"></i></button>'+
                                    '</td>'+
                                '</tr>';
                            }else{
                            row+=
                            '<tr class="text-primary" id="'+d2.id+'">'+
                                '<td class="text-center">'+ d2.subject_name+' </td>'+
                                '<td class="text-center">'+d2.assasment_type+'</td>'+
                                '<td class="text-center">'+d2.mark+'</td>'+
                                '<td class="text-center">'+ d2.test_load+' </td>'+
                                '<td class="text-center">'+
                                    '<button onclick="editMark(this)" value="'+d2.id+','+d2.assasment_type+','+d2.mark+','+ d2.test_load+','+name+','+d2.subject_name+','+d2.semister+'-'+d2.term+'" class="btn btn-primary btn-sm m-1"> <i class="fas fa-pen"></i></button>'+
                                '</td>'+
                            '</tr>';
                            }
                    }
            });
                $('#semister'+semid+"-"+studid).html(row);
                console.log(+semid+"-"+studid);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                  })
                closeAddMl();

           // row2+= '<td colspan="2" class="text-right">Total</td><td colspan="3" class="text-left">Loading...</td>'

       }
   })
}



