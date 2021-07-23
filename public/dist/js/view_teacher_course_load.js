
function getCourseLoad(id){
    $.ajax({
        type: 'GET',
        url: 'getCourseLoad/'+id,
        dataType : 'json',
        success:function (data) {
            row = '';
            row2 = '';
            var data1 = JSON.parse(JSON.stringify(data.teacher_courses));
            console.log(data1);
            data1.forEach(d => {
                row+='<div class="col-4">'+
                '<button class="col-12 btn" style="cursor: pointer;" onclick="getCourseLoadStudent(this);" value="'+d.id+','+d.class_id+','+d.section+','+d.teacher_id+'">'+
                    '<div class="small-box bg-primary ">'+
                        '<div class="inner ">'+
                          '<label>'+d.class_label+' '+d.section+'</label><br>'+
                          '<label>'+d.subject_name+'</label>'+
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
    //alert('class_id: '+class_id+' section: '+section+' teacher: '+teacher_id+' course load: '+course_load_id)
    $.ajax({
        type: 'GET',
        url: 'getCourseLoadStudent/'+teacher_id+'/'+section+'/'+class_id+'/'+course_load_id,
        dataType : 'json',
        success:function (data) {
                var section1 = JSON.parse(JSON.stringify(data.section));
                var mark1 = JSON.parse(JSON.stringify(data.mark));
                var semister1 = JSON.parse(JSON.stringify(data.semister));
                var count = 1;
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
                      '<div  class="card"><table  class="table table-striped table-lg"'+
                        '<thead>'+
                            '<th>No</th>'+
                            '<th>Full Name</th>'+
                            '<th>Gender</th>'+
                        '</thead>'+'<tbody>'

                section1.forEach(d => {
                    row+='<tr style="cursor: pointer;" data-toggle="collapse" data-target="#demo1'+count+'" class="accordion-toggle"  aria-expanded="false">'+
                            '<td>'+count+'</td>'+
                            '<td>'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                            '<td>'+d.gender+'</td>'+
                         '</tr>'+
                         '<td colspan="12" class="hiddenRow">'
                    semister1.forEach(d3 =>{
                        all_total = 0;
                        all_percent = 0;
                        row+='<div class="d-flex justify-content-center">'+
                        '<div class="accordian-body collapse col-8" id="demo1'+count+'">'+
                        '<table class="table  table-striped table-sm">'+
                            '<thead class="text-dark">'+
                                '<div class="row card card-header card-sm bg-secondary"><div class="float-left "><h6 >Semister '+d3.semister+' '+d3.term+'</h6></div>'+
                                // '<div class="float-right"><button class="btn btn-primary m-1"><i class="fa fa-plus"></button></i></div>'+
                                '</div>'+
                                '<tr >'+
                                    '<th class="text-center">Subject</th>'+
                                    '<th class="text-center">Assasment</th>'+
                                    '<th class="text-center">Mark</th>'+
                                    '<th class="text-center">Load</th>'+
                                    '<th class="text-center">Action</th>'+
                                '</tr>'+
                            '</thead>'+
                        '<tbody>'
                        mark1.forEach(d2 => {
                            all_semister=d2.semister+d2.term;
                            if(d2.student_id==d.student_id){
                                if(d3.semister+d3.term==all_semister){
                                        row+=
                                        '<tr class="text-primary" id="'+d2.id+'">'+
                                            '<td class="text-center">'+ d2.subject_name+' </td>'+
                                            '<td class="text-center">'+d2.assasment_type+'</td>'+
                                            '<td class="text-center">'+d2.mark+'</td>'+
                                            '<td class="text-center">'+ d2.test_load+' </td>'+
                                            '<td class="text-center">'+
                                                '<button onclick="editMark(this)" value="'+d2.id+','+d2.assasment_type+','+d2.mark+','+ d2.test_load+','+d.first_name+' '+d.middle_name+' '+d.last_name+','+d2.subject_name+'" class="btn btn-primary btn-sm m-1"> <i class="fas fa-pen"></i></button>'+
                                            '</td>'+
                                        '</tr>'
                                        all_percent = all_percent + d2.test_load;
                                        all_total = all_total + d2.mark;
                                }else{
                                }
                            }

                        });
                        row+= '<tr class="text-primary  text-bold"><td colspan="2" class="text-right">Total</td><td colspan="3" class="text-left">'+all_total.toFixed(2)+'/'+all_percent+'</td></tr></tbody>'+
                        '</table>'+
                        '</div>'+
                         '</div>'
                         all_total = 0;
                         all_percent = 0;
                    })
                    row+= '</td>'+
                            '</tr>'+
                            '</tr>'
                    count++;
               });
               row+='</tbody></table></div>';
                $('#dashboard').html(row);
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
    $('#modal-editMark').modal('show');
    $("#modal-editMark").click(function () {
        var str = "Assasment : "+assasmentType
            + "Mark: " + mark
            + " Load: " + load;
        // $("#modal_body").html(str);
        //$("#assasment").html(assasmentType);
        $(".modal-header #title").html(name);

        $(".modal-body #assasment").val(assasmentType);
        $(".modal-body #mark").attr("value", mark);
        $(".modal-body #load").attr("value", load);
        $(".modal-body #aid").val(id);
        $(".modal-body #fullname").val(name);
        $(".modal-body #subject").val(subject);
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
    // alert('id: '+id+' Mark: '+ mark+ ' Load: '+ load+ ' Assasment: '+ assasment +' Name: '+name);
    $.ajax({
        type: 'GET',
        url: 'editMarkStudentList/'+id+'/'+mark+'/'+load+'/'+assasment,
        success:function(data){
            console.log(data)
           var row='';
            row='<td class="text-center">'+subject+'</td><td class="text-center">'+assasment+'</td><td class="text-center">'+mark+'</td><td class="text-center">'+load+'</td>'+
            '<td class="text-center">'+
                '<button onclick="editMark(this)" value="'+id+','+assasment+','+mark+','+load+','+name+','+subject+'" class="btn btn-primary btn-sm m-1"> <i class="fas fa-pen"></i></button>'+
            '</td>'
            $('#'+data).html(row);
            swal("Updated!", "You Updated Successfuly!", "success");
            closer();
        }
    })

}

function closer(){
    $('#modal-editMark').modal('hide');
}
