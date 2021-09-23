var student_page = true;
var academic_page = false;
var parent_page = false;
var emergency_page = false;
var transport_page = false;

// Emergency Previous Button
$("#emergencyPreviousBtn").click(function (e) {
    e.preventDefault();
    $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
    $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
    $("#list_parent_info").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
    $("#list_emergency_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
    $("#list_transport").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
    $("#basic_student_info").hide();
    $("#academnic_background").hide();
    $("#parent_info").show();
    $("#emergency").hide();
    $("#transport").hide();
});

// Transportation Previous Button
$("#transportPreviousBtn").click(function (e) {
    e.preventDefault();
    $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
    $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
    $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
    $("#list_emergency_info").html('<a class="nav-link" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
    $("#list_transport").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
    $("#basic_student_info").hide();
    $("#academnic_background").hide();
    $("#parent_info").hide();
    $("#emergency").show();
    $("#transport").hide();
});
// Parent Previous Button
$("#parentInfoPreBtn").click(function (e) {
    e.preventDefault();
    $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
    $("#list_academnic_background").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
    $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
    $("#list_emergency_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
    $("#list_transport").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
    $("#basic_student_info").hide();
    $("#academnic_background").show();
    $("#parent_info").hide();
    $("#transport").hide();
});
// Accademic Background Button
$("#academnicBackgroundPreBtn").click(function (e) {
    e.preventDefault();
    $("#list_basic_student_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
    $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
    $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
    $("#list_emergency_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
    $("#list_transport").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
    $("#basic_student_info").show();
    $("#academnic_background").hide();
    $("#parent_info").hide();
    $("#transport").hide();
});









function basicStudentInfo(){
    if (academic_page && student_page && parent_page && emergency_page && transport_page) {
        $("#list_basic_student_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").show();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").hide();
    }else if(academic_page && student_page && parent_page && emergency_page){
        $("#list_basic_student_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").show();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").hide();
    }else if (academic_page && student_page && parent_page) {
        $("#list_basic_student_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").show();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").hide();
    }else if (academic_page && student_page) {
        $("#list_basic_student_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").show();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").hide();
    }


}

function accademicBackground(){

    if (academic_page && student_page && parent_page && emergency_page && transport_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").show();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").hide();
    }else if(academic_page && student_page && parent_page && emergency_page){
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").show();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").hide();
    }else if (academic_page && student_page && parent_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").show();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").hide();
    }else if (academic_page && student_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").show();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").hide();
    }



}

function parentInfo(){
    // $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
    // $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
    // $("#list_parent_info").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
    // $("#list_emergency_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
    // $("#list_transport").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
    // $("#basic_student_info").hide();
    // $("#academnic_background").hide();
    // $("#parent_info").show();
    // $("#transport").hide();
    // $("#emergency").hide();

    if (academic_page && student_page && parent_page && emergency_page && transport_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link  bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#emergency").hide();
        $("#transport").hide();
        $("#parent_info").show();
    }else if(academic_page && student_page && parent_page && emergency_page){
        $("#list_basic_student_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link  bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#emergency").hide();
        $("#transport").hide();
        $("#parent_info").show();
    }else if (academic_page && student_page && parent_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link  bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#emergency").hide();
        $("#transport").hide();
        $("#parent_info").show();
    }else if (academic_page && student_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link disabled " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link  bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#emergency").hide();
        $("#transport").hide();
        $("#parent_info").show();
    }
}

function transportInfo(){
    $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
    $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
    $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
    $("#list_emergency_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
    $("#list_transport").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
    $("#basic_student_info").hide();
    $("#academnic_background").hide();
    $("#parent_info").hide();
    $("#emergency").hide();
    $("#transport").show();
}

function emergencyInfo(){

    if (academic_page && student_page && parent_page && emergency_page && transport_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").show();
    }else if(academic_page && student_page && parent_page && emergency_page){
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").show();
    }else if (academic_page && student_page && parent_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").show();
    }else if (academic_page && student_page) {
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").hide();
        $("#emergency").show();
    }


    // $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
    // $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
    // $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
    // $("#list_emergency_info").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
    // $("#list_transport").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
    // $("#basic_student_info").hide();
    // $("#academnic_background").hide();
    // $("#parent_info").hide();
    // $("#transport").hide();
    // $("#emergency").show();
}
