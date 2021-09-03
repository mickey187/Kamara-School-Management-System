$('#modal-dashboard').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var detail = button.data('detail3');
    var data = detail.split(",");
});

function fetchCourseLoad(id){
   modal();
    $.ajax({
        type: 'GET',
        url: 'getHomeRoom/'+(id),
        dataType : 'json',
        success:function (data) {
            row = '';
            console.log(data);
            data.forEach(d => {
                row+='<div class="col-lg-4">'+
                        '<a href="#"'+
                            '<div class="small-box bg-primary">'+
                                '<div class="inner p-3">'+
                                ' <p> '+ d.class_label+'  Section '+d.section+'</p><br'+
                                '</div>'+
                                '<div class="icon"><br>'+
                                '<i class="fas fa-chalkboard-teacher"></i>'+
                                '</div>'+
                            '</div>'+
                        '</a>'+
                     '</div>'
           });
            $('#classes').html(row);
            loadingModalHide();
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
}

function getHomeRoom(id){
    // alert(id);

    modal();
    $.ajax({
        type: 'GET',
        url: 'getHomeRoom/'+(id),
        dataType : 'json',
        success:function (data) {
            row = '';
            row2 = '';
            console.log(data);
            data.forEach(d => {
                // alert(d.id);
                row+='<div class="col-4 mt-2">'+
                '<button class="col-12 btn" style="cursor: pointer;" onclick="getHomeRoomStudent(this);" value="'+d.employee_id+','+d.class_label+','+d.section+','+d.stream+','+d.class_id+','+d.stream_id+'">'+
                    '<div class="small-box bg-primary ">'+
                        '<div class="inner ">'+
                        '<label>'+d.class_label+' '+d.section+'</label><br>'+
                        '<label>Stream '+d.stream+'</label><br>'+
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
            loadingModalHide();
            row2 += 'Dashboard / Home Room';
            generator =''
            $('#generator').html(generator);
            $('#teacherDashboardTitle').html(row2);
            $('#dashboard').html(row);
        },
        error:function (data) {
            console.log("it is not works fine");
            loadingModalHide();
        }
    });

}

function getHomeRoomStudent(nb){
    var data = (nb.value).split(",");
    teacher_id = data[0];
    section = data[2];
    class_name = data[1];
    stream = data[3];
    class_id_new = data[4];
    stream_id_new = data[5];
    modal();
    $.ajax({
        type: 'GET',
        url: 'getHomeRoomStudent/'+teacher_id+'/'+section+'/'+class_name+'/'+stream,
        dataType : 'json',
        success:function (data) {
            var section1 = JSON.parse(JSON.stringify(data.section));
            var mark1 = JSON.parse(JSON.stringify(data.mark));
            var semister1 = JSON.parse(JSON.stringify(data.semister));
            var count = 1;
            row2 = '';
            console.log(data);
            row = '<div class=" card col-12">'+
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
                  '<div class="d-flex justify-content-center"><div class="col-12"><table id="example1"  class="table shadow table-striped table-bordered table-xl"'+
                    '<thead class"card bg-primary ">'+
                        '<th class="text-center">No</th>'+
                        '<th class="text-center">Full Name</th>'+
                        '<th class="text-center">Gender</th>'+
                        '<th class="text-center"><button onclick="setAvarageForClass(this)"  class="shadow btn btn-secondary btn-sm" value="'+section+","+class_name+","+stream+'"'+

                        '> set current semister average </button></th>'+
                        '<th class="text-center">Status</th>'+
                    '</thead>'+'<tbody>'

            section1.forEach(d => {
                newSemister = 0;
                avarage = d.avarage;
                if(d.status === "pass"){
                    row+='<tr style="cursor: pointer; border: 1.5px solid #228B22 !important;" data-toggle="collapse" data-target="#demo1'+count+'" class="accordion-toggle shadow bg-success  bordered border-success"  aria-expanded="false">'+
                                '<td class="text-center">'+count+'</td>'+
                                '<td class="text-center">'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                                '<td class="text-center">'+d.gender+'</td>'+
                                '<td class="text-center">'+avarage+'</td>'+
                                '<td class="text-center">'+d.status+'</td>'+
                            '</tr>'+
                            '<td colspan="12" class="hiddenRow">';
                }else if(d.status === "fail"){
                    row+='<tr style="cursor: pointer; border: 1.5px solid #FF3030 !important;" data-toggle="collapse" data-target="#demo1'+count+'" class="accordion-toggle shadow  bg-white"  aria-expanded="false">'+
                                '<td class="text-center">'+count+'</td>'+
                                '<td class="text-center">'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                                '<td class="text-center">'+d.gender+'</td>'+
                                '<td class="text-center">'+avarage+'</td>'+
                                '<td class="text-center">'+d.status+'</td>'+
                            '</tr>'+
                            '<td colspan="12" class="hiddenRow">';
                }else{
                        row+='<tr style="cursor: pointer; border: 1.5px solid #DCDCDC !important;" data-toggle="collapse" data-target="#demo1'+count+'" class="accordion-toggle shadow bg-white"  aria-expanded="false">'+
                                '<td class="text-center">'+count+'</td>'+
                                '<td class="text-center">'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                                '<td class="text-center">'+d.gender+'</td>'+
                                '<td class="text-center">'+avarage+'</td>'+
                                '<td class="text-center">'+d.status+'</td>'+
                            '</tr>'+
                            '<td colspan="12" class="hiddenRow">';
                }
                semister1.forEach(d3 =>{
                    subject = [];
                    all_total = 0;
                    all_percent = 0;
                    replace_td='';
                    style = '';
                    if(!d3.current_semister)
                        style='style="display:none;"';
                    row+='<div class="d-flex justify-content-center">'+
                    '<div '+style+' class="accordian-body collapse col-8" id="demo1'+count+'">'+
                    '<table class="table bordered table-striped table-sm">'+
                        '<thead class="text-dark">'+
                            '<div class="row card-sm card  card-sm bg-secondary">'+
                                '<div class="">'+
                                        '<h6 style="margin:10px;" class="float-left">Semister '+d3.semister+' '+d3.term+'</h6>'+
                                '</div>'+
                           '</div>'+
                            '<tr >'+
                                '<th class="text-center">Subject</th>'+
                                '<th class="text-center">Total</th>'+
                            '</tr>'+
                        '</thead>'+
                    '<tbody>';
                    mark1.forEach(d2 => {
                        all_semister=d2.semister+d2.term;
                        if(d2.student_id==d.student_id){
                            if(d3.semister+d3.term==all_semister){
                                total = 0;
                                percent = 0;
                                count2 =0;
                                if(subject.indexOf(d2.subject_name) > -1){
                                }else{
                                    mark1.forEach(total_mark=>{
                                        if(total_mark.student_id+total_mark.semister+
                                            total_mark.term+
                                            total_mark.subject_name==d2.student_id+all_semister+
                                            d2.subject_name)
                                        {
                                            total = total + total_mark.mark;
                                            percent = percent + total_mark.test_load;
                                            console.log("Total: "+total);
                                        }
                                    });
                                    if(parseFloat(percent) > 100){
                                        total = (parseFloat(total).toFixed(2) * 100) / parseFloat(percent).toFixed(2);
                                        row+=
                                        '<tr class="text-primary">'+
                                            '<td class="text-center">'+ d2.subject_name+' </td>'+
                                            '<td class="text-center">'+parseFloat(total).toFixed(2)+'/'+100+'</td>'+
                                        '</tr>';
                                    }else{
                                        row+=
                                        '<tr class="text-primary">'+
                                            '<td class="text-center">'+ d2.subject_name+' </td>'+
                                            '<td class="text-center">'+parseFloat(total).toFixed(2)+'/'+parseFloat(percent)+'</td>'+
                                        '</tr>';
                                    }

                                    all_total = all_total + total;
                                    all_percent = all_percent + 1;
                                    subject.push(d2.subject_name);
                                    console.log('-----------------------------');
                                }
                            }else{
                            }
                        }

                    });

                    if(newSemister==0){
                        row+= '<tr class="text-primary  text-bold"><td class="text-center">Average</td><td class="text-center">'+parseFloat(all_total / subject.length).toFixed(2)+'</td></tr></tbody>'+
                        '</table></div>'+
                         '</div>'
                         newSemister = newSemister + 1;

                    }else if(newSemister==1){
                        row+= '<tr class="text-primary  text-bold"><td class="text-center">Average</td><td class="text-center">'+parseFloat(all_total / subject.length).toFixed(2)+'</td></tr></tbody>'+
                        '</table></div>'+
                         '</div>'
                         newSemister = newSemister + 1;

                    }else if(newSemister==2){
                        row+= '<tr class="text-primary  text-bold"><td class="text-center">Average</td><td class="text-center">'+parseFloat(all_total/subject.length).toFixed(2)+'</td></tr></tbody>'+
                        '</table></div>'+
                         '</div>'
                         newSemister = newSemister + 1;

                    }else if(newSemister==3){
                        row+= '<tr class="text-primary  text-bold"><td class="text-center">Average</td><td class="text-center">'+parseFloat(all_total/subject.length).toFixed(2)+'</td></tr></tbody>'+
                        '</table></div>'+
                         '</div>'
                         newSemister = newSemister + 1;

                    }
                    subject = [];
                     all_percent = 0;
                     all_total = 0;
                });
                row+= '</td>'+
                        '</tr>'+
                        '</tr>'
                count++;
           });
           row+='</tbody></table></div></div></div>';
           row2 += 'Dashboard / Home Room / '+stream+' Section '+section;
           generator = '<a class="shadow btn btn-sm btn-primary text-bold" href="/indexAttendance">Attendance</a> ';
           generator +=  '<button class="shadow p-1 rounded m-1 btn btn-primary btn-sm"'+
                                'data-toggle="modal"'+
                                'data-card1="'+class_name+','+stream+','+section+','+teacher_id+'"'+
                                'data-target="#modal-generate-card"'+
                        '>Generate Card <i class="fas fa-card"></i></button>'+
                        '<button  class="shadow p-1 rounded  btn btn-primary btn-sm"'+
                                'data-toggle="modal"'+
                                'data-excel=""'+
                                'data-target="#modal-promote-student"'+
                        '>Promote Students <i class="fas fa-exchange-alt"></i></button>';
           $('#teacherDashboardTitle').html(row2);
           $('#generator').html(generator);
           $('#dashboard').html(row);
           loadingModalHide();
        },
        error:function (data) {
            console.log("it is not works fine");
            loadingModalHide();
        }
    });

    $('#modal-promote-student').on('show.bs.modal', function(event) {
        var modal = $(this)
        modal.find('.modal-body #teacher_id').val(teacher_id);
        modal.find('.modal-body #section_name').val(section);
        modal.find('.modal-body #stream').val(stream);
        modal.find('.modal-body #class1').val(class_name);
    });

}


function setAvarageForClass(val){
    modal();
    $.ajax({
        type: "GET",
        url: "setAvarageForClass/"+val.value,
        dataType: "json",
        success: function (response) {
            console.log(response);
            swal.fire("response");
            loadingModalHide();
        }
    });

}
