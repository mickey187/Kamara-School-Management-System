function studentIdFetchBtn() {

    student_id = $("#studentIdForDetail").val();
    $.ajax({
        type: "GET",
        url: "getStudentDetail/"+student_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response);
            page='<div class="col-12"><div class="row card col-12">'+
                    '<span> <h4>ID - '+response.student_id+'</h4></span>'+
                    '<span> <h4>Name - '+response.full_name+'</h4></span>'+
                    '<span> <h4>Gender -'+response.gender+'</h4></span>'+
                    '<span> <h4>Grade - '+response.class_label+'</h4></span>'+
                    '<span> <h4>Stream - '+response.stream_type+'</h4></span>'+
                    '<span> <h4>Section - '+response.section_name+'</h4></span>'+
                    '<button class="btn btn-success" value ="'+response.student_id+'" onclick="generateSingleId(this);">Generate ID</button>'+
                '</div></div>';
         $("#idGeneratePageList").html(page);
        }
    });
}

function singleStudentIdBtn(){
    $("#idGeneratePageList").hide();
    $("#idGeneratPage").show();
    page='<div class="row col-12">'+
            '<input type="number" placeholder="ID" id="studentIdForDetail" class="form-control col-6 m-1">'+
            '<input type="button" value="fetch" onclick="studentIdFetchBtn();" class="btn btn-success col-1 m-1">'+
         '</div>';

         $("#idGeneratPage").html(page);
}

function generateSingleId(val){
    student_id = val.value;

        $.ajax({
            type: "GET",
            url: "generateOneIdForSingleID/"+student_id,
            data: "data",
            dataType: "json",
            success: function (response) {
                swal.fire("ID Generated Successfuly");
                var page = '<div class="m-2">'+
                                '<button value="'+response+'" onclick="downloadSingleId(this);" class="btn btn-primary shadow"><i class="fas fa-download"></i>download</button>'+
                           '</div>';
                $("#idGeneratePageList").html(page);
            }
        });
}
function downloadSingleId(val){
    window.location = 'downloadSingleStudentId/'+val.value;
}
function singleClassIdBtn(){
    $("#idGeneratePageList").show();
    $("#idGeneratPage").hide();
    $.ajax({
        type: "GET",
        url: "getCLassStreamSection",
        data: "data",
        dataType: "json",
        success: function (response) {
            swal.fire(response);
            var page =  '<div class="m-2">'+
                            '<select class="form-control">'+
                                '<></>'+
                            '</select>'+
                        '</div>';
            $("#idGeneratePageList").html(page);
        }
    });
}
