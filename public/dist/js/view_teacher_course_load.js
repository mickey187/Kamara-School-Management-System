
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
                          '<p>'+d.class_label+' '+d.section+'</p><br>'+
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
                      '<div class="card card-header bg-orange col-12">List of Students</div>'+
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
                      '<div class="card"><table id="example1" class="table table-striped table-lg"'+
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
                                    '<th class="text-center">Load</th>'+
                                    '<th class="text-center">Mark</th>'+
                                    '<th class="text-center">Action</th>'+
                                '</tr>'+
                            '</thead>'+
                        '<tbody>'
                        mark1.forEach(d2 => {
                            all_semister=d2.semister+d2.term;
                            if(d2.student_id==d.student_id){
                                if(d3.semister+d3.term==all_semister){
                                        row+=
                                        '<tr class="text-primary">'+
                                            '<td class="text-center">'+ d2.subject_name+' </td>'+
                                            '<td class="text-center">'+d2.assasment_type+'</td>'+
                                            '<td class="text-center">'+ d2.test_load+' </td>'+
                                            '<td class="text-center">'+d2.mark+'</td>'+
                                            '<td class="text-center">'+
                                                '<button class="btn btn-primary btn-sm m-1"> <i class="fas fa-pen"></i></button>'+
                                            '</td>'+
                                        '</tr>'
                                }else{
                                }
                            }

                        });
                        row+= '</tbody>'+
                        '</table>'+
                        '</div>'+
                         '</div>'
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
