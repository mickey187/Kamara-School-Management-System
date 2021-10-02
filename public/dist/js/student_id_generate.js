function studentIdFetchBtn() {

    student_id = $("#studentIdForDetail").val();
    swal.fire(student_id)
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
    $("#idGeneratePageList").html('');
    $('#idGeneratePageForClass').hide();
    $("#idGeneratPage").show();
    $("#idGeneratePageForAllClass").hide();
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
    $("#idGeneratePageList").html('');
    $("#idGeneratPage").hide();
    $("#idGeneratePageForAllClass").hide();
    $('#idGeneratePageForClass').show();

}

$("#classForId").change(function (e) {
    e.preventDefault();
    var class_id = $("#classForId").val();
    var stream_id =  $("#streamForId").val();
    if(!(class_id === "Choose class" || stream_id === "Choose stream")){
        fetchSectionForId(class_id,stream_id);
    }
});

$("#streamForId").change(function (e) {
    e.preventDefault();
    var class_id = $("#classForId").val();
    var stream_id =  $("#streamForId").val();
    if(!(class_id === "Choose class" || stream_id === "Choose stream")){
        fetchSectionForId(class_id,stream_id);
    }
});

function fetchSectionForId(class_id,stream_id){
    // swal.fire("Worked");
    $.ajax({
        type: "GET",
        url: "getCLassStreamSection2/"+class_id+"/"+stream_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            var option = '<option value="Choose section">Choose section</option>';
            response.forEach(element => {
                option += '<option value="'+element.section_name+'">'+element.section_name+'</option>';
            });
            $("#sectionForId").html(option);
        }
    });
}


$("#sectionForId").change(function (e) {
    e.preventDefault();
    var class_id = $("#classForId").val();
    var stream_id =  $("#streamForId").val();
    var section_name =  $("#sectionForId").val();
    if(!(class_id === "Choose class" || stream_id === "Choose stream" || section_name === "Choose section")){
        $.ajax({
            type: "GET",
            url: "checkIfIdGeneratedForClass/"+class_id+"/"+stream_id+"/"+section_name,
            data: "data",
            dataType: "json",
            success: function (response) {
                if(response===true){
                    var btn ='<button onclick="generateIdForOneClassBtn();" id="generateIdForOneClassBtn" class="btn btn-secondary m-2" disabled>Generate ID</button>'+
                            '<button onclick="downloadIdForOneClassBtn();" id="downloadIdForOneClassBtn" class="btn  btn-primary m-2" ><i class="fa fa-download"></i>Download</button>';
                        $("#idBtnList").html(btn);
                }else{
                    var btn ='<button onclick="generateIdForOneClassBtn();" id="generateIdForOneClassBtn" class="btn btn-success ">Generate</button>'+
                            '<button onclick="downloadIdForOneClassBtn();" id="downloadIdForOneClassBtn" class="btn  btn-secondary m-1" disabled><i class="fa fa-download"></i>Download</button>';
                        $("#idBtnList").html(btn);
                }
            }
        });
    }
});

function generateIdForOneClassBtn(){
    var class_id = $("#classForId").val();
    var stream_id = $("#streamForId").val();
    var section_label = $("#sectionForId").val();
    $.ajax({
        type: "GET",
        url: "generateOneClassIdCard/"+class_id+"/"+stream_id+"/"+section_label,
        dataType: "json",
        success: function (response) {
            // swal.fire(response);
            var btn ='<button onclick="generateIdForOneClassBtn();" id="generateIdForOneClassBtn" disabled class="btn btn-secondary" disabled>Generate ID</button>'+
                    '<button onclick="downloadIdForOneClassBtn()" id="downloadIdForOneClassBtn" class="btn  btn-primary m-2"  ><i class="fa fa-download"></i>Download</button>';
                    $("#idBtnList").html(btn);
        }
    });
    // window.location.href =  "generateOneClassIdCard/"+class_id+"/"+stream_id+"/"+section_label;

}

function downloadIdForOneClassBtn(){
    var class_id = $("#classForId").val();
    var stream_id = $("#streamForId").val();
    var section_label = $("#sectionForId").val();
    window.location.href =  "downloadOneClassIdCard/"+class_id+"/"+stream_id+"/"+section_label;
}

function idCardForAllClassBtn(){
    $("#idGeneratePageList").html('');
    $('#idGeneratePageForClass').hide();
    $("#idGeneratPage").hide();
    $("#idGeneratePageForAllClass").show();
}

function idCardForAllClass()
{
    $('#static_icon').hide();
    $('#title_for_spinner').html('Generating...');
    $('#anim_icon').show();


    $.ajax({
        type: "GET",
        url: "generateIDForAllClass",
        dataType: "json",
        success: function (response) {
            $('#static_icon').show();
            $('#anim_icon').hide();
            $('#title_for_spinner').html('Completed!');
        }
    });
}


$("#cancelIdGeneratingForAllClassBtn").click(function (e) {
    e.preventDefault();
    swal.fire('canceling Generating.');
    window.location.href = "cancelTheCurrentPtogram";
});
