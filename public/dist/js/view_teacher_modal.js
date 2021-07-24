$('#modal-class').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var detail = button.data('detail3');
    var modal = $(this);
    var split = detail.split(",");
    var class_Label = split[0].trim();
    var section = split[1].trim();
    console.log(class_Label+' '+section)
    modal.find('.modal-body #class').text(split[0]);
    modal.find('.modal-body #section').text(split[1]);

    $.ajax({
        type: 'GET',
        url: 'getClassSection/'+class_Label+'/'+section,
        dataType : 'json',
        success:function (data) {
          console.log(data);
          var row = '';
          var count = 1;
          data.forEach(d => {
            row+=   '<tr>'+
                        '<td>'+count+'</td>'+
                        '<td>'+d.student_id+'</td>'+
                        '<td>'+d.first_name+' '+d.middle_name+' '+d.last_name+'</td>'+
                        '<td>'+d.gender+'</td>'+
                        '<td><button onclick="callFunction('+d.id+');" class="m-1 btn btn-primary btn-sm">Marklist</button><button class="p-1 btn btn-primary btn-sm">parent</button></td'+
                    '</tr>';
                    count ++;

            });
            $('#listOfStudents').html(row);
        },
        error:function (data) {
            console.log('error');
        }
     });
});

function findMyStudent()
{
    var isHidden = document.getElementById('hideTable');
    var isOpen = document.getElementById('isOpen');
    if(isOpen.value == "true"){
        isHidden.style.display="none";
        isOpen.value = "false";
    }if(isOpen.value == "false"){
        isHidden.style.display="block";
        isOpen.value = "true";
    }
}

function callFunction($val){
    window.location.href = 'marklist/'+$val+''
}
