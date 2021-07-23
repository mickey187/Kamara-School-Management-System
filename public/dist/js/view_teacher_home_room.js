$('#modal-dashboard').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var detail = button.data('detail3');
    var data = detail.split(",");
    if(data[0] == "My Student")
        $('#title').html(data[0]);
    else if(data[0] == "Home Room"){
        $('#title').html(data[0]);
        fetchCourseLoad(data[1].trim())
    }else if(data[0] == "Course Load"){
        $('#title').html(data[0]);
    }else if(data[0] == "Profile"){
        $('#title').html(data[0]);
        $('#full_name').html(data[1]);
    }
});

function fetchCourseLoad(id){
    // alert(id);
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
        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
}

function getHomeRoom(id){
    //alert(id);
    $.ajax({
        type: 'GET',
        url: 'getHomeRoom/'+(id),
        dataType : 'json',
        success:function (data) {
            row = '';
            console.log(data);
            data.forEach(d => {
               // alert(d.class_label);
                row+='<div class="col-4">'+
                '<button class="col-12 btn" style="cursor: pointer;" onclick="getHomeRoomStudent(this);" value="'+d.id+','+d.class_label+','+d.section+'">'+
                    '<div class="small-box bg-primary ">'+
                        '<div class="inner ">'+
                        '<label>'+d.class_label+' '+d.section+'</label><br>'+
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

function getHomeRoomStudent(nb){
    var data = (nb.value).split(",");
    teacher_id = data[0];
    section = data[2];
    class_name = data[1];
    // alert(data[0]);
    // alert(teacher_id+" "+section);
    $.ajax({
        type: 'GET',
        url: 'getHomeRoomStudent/'+teacher_id+'/'+section+'/'+class_name,
        dataType : 'json',
        success:function (data) {
            var section1 = JSON.parse(JSON.stringify(data.section));
            var mark1 = JSON.parse(JSON.stringify(data.mark));
            var semister1 = JSON.parse(JSON.stringify(data.semister));
            var count = 1;
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
                  '<div class="d-flex justify-content-center"><div class="col-12"><table id="example1" class="table table-striped table-lg"'+
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
                    subject = [];
                    all_total = 0;
                    all_percent = 0;
                    replace_td='';
                    row+='<div class="d-flex justify-content-center">'+
                    '<div class="accordian-body collapse col-8" id="demo1'+count+'">'+
                    '<table class="table  table-striped table-sm">'+
                        '<thead class="text-dark">'+
                            '<div class="card card-header card-sm bg-secondary"><h6>Semister '+d3.semister+' '+d3.term+'</h6></div>'+
                            '<tr >'+
                                '<th class="text-center">Subject</th>'+
                                '<th class="text-center">Total</th>'+
                            '</tr>'+
                        '</thead>'+
                    '<tbody>'
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
                                            console.log(total);
                                        }
                                    })
                                    row+=
                                    '<tr class="text-primary">'+
                                        '<td class="text-center">'+ d2.subject_name+' </td>'+
                                        '<td class="text-center">'+parseInt(total)+'/'+parseInt(percent)+'</td>'+
                                    '</tr>'
                                    all_total = all_total + total;
                                    all_percent = all_percent + 1;
                                    subject.push(d2.subject_name);
                                    console.log('-----------------------------');
                                }
                            }else{
                            }
                        }

                    });
                    subject = [];
                    row+= '<tr class="text-primary  text-bold"><td class="text-center">Average</td><td class="text-center">'+(all_total/all_percent).toFixed(2)+'</td></tr></tbody>'+
                    '</table></div>'+
                     '</div>'
                     all_percent = 0;
                     all_total = 0;
                })
                row+= '</td>'+
                        '</tr>'+
                        '</tr>'
                count++;
           });
           row+='</tbody></table></div></div></div>';
            $('#dashboard').html(row);
        },
        error:function (data) {
            console.log("it is not works fine");
        }
    });
}
