var counter = 5;
function studentSkill(){
    $("#dashboardSection").hide();
    var title = '<h3 class="card-title"><i class="fas fa-tachometer-alt"></i>Dashboard / Student Skill</h3>';
    var body = '<div class="col-12 row">';
            body += '<div class="form-group col-12">';
                body += '<form method="GET" action="addStudentTraits">';
                    body += '<div class="row col-5">';
                    body += '<input id="trait" type="text" name="trait[]" class="form-control m-1" multiple placeholder="Trait Name">';
                    // body += '<a id="addInput" style="cursor:pointer" class="col-2"><i class="fa fa-plus m-1" aria-hidden="true"></i></a>';
                    body += '</div>';
                    body += '<input onclick="addTrait()" type="button" class="btn btn-primary m-1" value="Add">';
                body += '</form>';
            body += '</div>';
        body += '</div>';

    $("#dashboardTitle").html(title);
    $("#dashboardSection").html(body);
    $("#dashboardSection").show();
}

function addTrait(){
    $.ajax({
        type: "GET",
        url: "addStudentTraits/"+$("#trait").val(),
        dataType: "json",
        success: function (response) {
            console.log(response);
            swal.fire("Data inserted Succesfuly","Success");
        }
    });
}
