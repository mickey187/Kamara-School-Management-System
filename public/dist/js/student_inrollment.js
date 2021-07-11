const input = document.getElementById("inroll_id");
const findButton = document.getElementById("enroll_student");

findButton.addEventListener("click", function() {
    fetchStudent(input.value);
    
})

function fetchStudent(id) {
    $.ajax({
        type: 'GET',
        url: 'findStudent/'+id,
        dataType : 'json',

        success:function (data) {
           var rows = '';
           var student = '';
           var image = '';
            console.log(data);

           data.forEach(d => {

                  rows+=
                  '<td>'+d.id+ '</td>'+
                  '<td>'+d.student_id+'</td>'+
                  '<td>'+d.first_name+' '+d.middle_name+' '+ d.last_name+'</td>'+
                  '<td>'+d.gender+'</td>'+
                  '<td>'+d.class+'</td>'+
                  '<td>'+d.gender+'</td>'+
                  '<td>'+d.gender+'</td>'+
                  '<td> <input class="btn btn-primary" type="button" value="add"> </td>';
                  student+=
                        '<span>'+'<label>  Name </label>'+
                         ' '+d.first_name+' '
                            +d.middle_name+' '
                            +d.last_name+
                        '</span>'+
                        '<br><span>'+' <label>  ID </label> KA/'
                            +d.student_id+
                        '</span>'+
                        '<br><span>'+' <label>  Grade </label> KA/'
                            +d.student_id+
                        '</span>'+
                        '<br><span>'+' <label>  Status </label> KA/'
                            +d.student_id+
                        '</span>'+
                        '<select class="col-6 form-control" id="exampleFormControlSelect1" name="academic_year">'+
                        ' <option value="2020">2020</option>'+
                        ' <option value="2020">2019</option>'+
                        ' <option value="2020">2018</option>'+
                        ' <option value="2020">2017</option>'+
                        '</select>'+
                        '<br><input class="btn btn-primary btn-lg" type="button" value="Register">'
                        ;
                   image+=
                        '<img src="'+'storage/student_image/'+d.image+'" id="dsp-pro" class="img-fluid img-thumbnail" style="height: 210px;" alt="'+d.image+'">';
           });
        $('#student_data').html(rows);
        $('#student_detal').html(student);
        $('#student_image').html(image);


        },
        error:function (data) {

        }
     });
  }
