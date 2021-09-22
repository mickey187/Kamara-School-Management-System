var academic_page_transferreason_check = true;
var academic_page_suspension_check = true;
var academic_page_expulsion_check = true;
var academic_page_specialeducation_check = true;
var academic_page_previousschool_check = true;
var academic_page_previousschoolcity_check = true;
var academic_page_previousschoolstate_check = true;
var academic_page_previousschoolcountry_check = true;
var academic_page_medicalcondtion_check = true;
var academic_page_bloodtype_check = true;

var academic_page_transferreason = document.getElementById('academic_page_transferreason_id');
var academic_page_suspension = document.getElementById('academic_page_suspension_id');
var academic_page_expulsion = document.getElementById('academic_page_expulsion_id');
var academic_page_specialeducation = document.getElementById('academic_page_specialeducation_id');
var academic_page_previousschool = document.getElementById('academic_page_previousschool_id');
var academic_page_previousschoolcity = document.getElementById('academic_page_previousschoolcity_id');
var academic_page_previousschoolstate = document.getElementById('academic_page_previousschoolstate_id');
var academic_page_previousschoolcountry = document.getElementById('academic_page_previousschoolcountry_id');
var academic_page_medicalcondtion = document.getElementById('academic_page_medicalcondtion_id');
var academic_page_bloodtype = document.getElementById('academic_page_bloodtype_id');

$( "#academic_page_transferreason_id" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(academic_page_transferreason);
        academic_page_transferreason_check = true;
    }else if($(this).val().length < 3){
        setErorFor2(academic_page_transferreason,'transfer reason require at least 3 letters!.');
        academic_page_transferreason_check = false;
    }else{
        setSuccessFor2(academic_page_transferreason);
        academic_page_transferreason_check = true;
    }
})

$( "#academic_page_suspension_id" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(academic_page_suspension);
        academic_page_suspension_check = true;
    }else if($(this).val().length < 3){
        setErorFor2(academic_page_suspension,'suspension reason require at least 3 letters!.');
        academic_page_suspension_check = false;
    }else{
        setSuccessFor2(academic_page_suspension);
        academic_page_suspension_check = true;
    }
})
$( "#academic_page_expulsion_id" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(academic_page_expulsion);
        academic_page_expulsion_check = true;
    }else if($(this).val().length < 3){
        setErorFor2(academic_page_expulsion,'expulsion reason require at least 3 letters!.');
        academic_page_expulsion_check = false;
    }else{
        setSuccessFor2(academic_page_expulsion);
        academic_page_expulsion_check = true;
    }
})
$( "#academic_page_specialeducation_id" ).focusout(function() {
    if($("#academic_page_specialeducation_id" ).val().length === 0){
        setNormalFor2(academic_page_specialeducation);
        academic_page_specialeducation_check = true;
    }else if($("#academic_page_specialeducation_id" ).val().length < 3){
        setErorFor2(academic_page_specialeducation,'special education require at least 3 letters!.');
        academic_page_specialeducation_check = false;
    }else{
        setSuccessFor2(academic_page_specialeducation);
        academic_page_specialeducation_check = true;
    }
})
$( "#academic_page_previousschool_id" ).focusout(function() {
    if($("#academic_page_previousschool_id" ).val().length === 0){
        setNormalFor2(academic_page_previousschool);
        academic_page_previousschool_check = true;
    }else if($("#academic_page_previousschool_id" ).val().length < 3){
        setErorFor2(academic_page_previousschool,'previous school require at least 3 letters!.');
        academic_page_previousschool_check = false;
    }else{
        setSuccessFor2(academic_page_previousschool);
        academic_page_previousschool_check = true;
    }
})
$( "#academic_page_previousschoolcity_id" ).focusout(function() {
    if($("#academic_page_previousschoolcity_id" ).val().length === 0){
        setNormalFor2(academic_page_previousschoolcity);
        academic_page_previousschoolcity_check = true;
    }else if($("#academic_page_previousschoolcity_id" ).val().length < 3){
        setErorFor2(academic_page_previousschoolcity,'previous school city require at least 3 letters!.');
        academic_page_previousschoolcity_check = false;
    }else{
        setSuccessFor2(academic_page_previousschoolcity);
        academic_page_previousschoolcity_check = true;
    }
})

$( "#academic_page_previousschoolstate_id" ).focusout(function() {
    if($("#academic_page_previousschoolstate_id" ).val().length === 0){
        setNormalFor2(academic_page_previousschoolstate);
        academic_page_previousschoolstate_check = true;
    }else if($("#academic_page_previousschoolstate_id" ).val().length < 3){
        setErorFor2(academic_page_previousschoolstate,'previous school state require at least 3 letters!.');
        academic_page_previousschoolstate_check = false;
    }else{
        setSuccessFor2(academic_page_previousschoolstate);
        academic_page_previousschoolstate_check = true;
    }
})
$( "#academic_page_previousschoolcountry_id" ).focusout(function() {
    if($("#academic_page_previousschoolcountry_id" ).val().length === 0){
        setNormalFor2(academic_page_previousschoolcountry);
        academic_page_previousschoolcountry_check = true;
    }else if($("#academic_page_previousschoolcountry_id" ).val().length < 3){
        setErorFor2(academic_page_previousschoolcountry,'previous school country require at least 3 letters!.');
        academic_page_previousschoolcountry_check = false;
    }else{
        setSuccessFor2(academic_page_previousschoolcountry);
        academic_page_previousschoolcountry_check = true;
    }
})
$( "#academic_page_medicalcondtion_id" ).focusout(function() {
    if($("#academic_page_medicalcondtion_id" ).val().length === 0){
        setNormalFor2(academic_page_medicalcondtion);
        academic_page_medicalcondtion_check = true;
    }else if($("#academic_page_medicalcondtion_id" ).val().length < 3){
        setErorFor2(academic_page_medicalcondtion,'student medical condtion require at least 3 letters!.');
        academic_page_medicalcondtion_check = false;
    }else{
        setSuccessFor2(academic_page_medicalcondtion);
        academic_page_medicalcondtion_check = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#academic_page_bloodtype_id").select2("close");
        if($('#academic_page_bloodtype_id').val().length === 0){
            // setErorForSelect(student_gender,'blood type is required!.');
            academic_page_bloodtype_check = true;
        }else{
            setSuccessForselect(academic_page_bloodtype);
            academic_page_bloodtype_check = true;
        }
    }

});

$("#academic_page_bloodtype_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(academic_page_bloodtype);
        academic_page_bloodtype_check = true;
});
// Accademic Background Next Button
$("#academnicBackgroundBtn").click(function (e) {
    if(
        academic_page_transferreason_check &
        academic_page_suspension_check &
        academic_page_expulsion_check &
        academic_page_specialeducation_check &
        academic_page_previousschool_check &
        academic_page_previousschoolcity_check &
        academic_page_previousschoolstate_check &
        academic_page_previousschoolcountry_check &
        academic_page_medicalcondtion_check
        // true
        ){
        e.preventDefault();
        parent_page = true;
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

            // $("#list_basic_student_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
            // $("#list_academnic_background").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
            // $("#list_parent_info").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
            // $("#list_emergency_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
            // $("#list_transport").html('<a class="nav-link  bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
            // $("#basic_student_info").hide();
            // $("#academnic_background").hide();
            // $("#emergency").hide();
            // $("#transport").hide();
            // $("#parent_info").show();


    }else{
        if($('#academic_page_transferreason_id').val().length === 0){
            setNormalFor2(academic_page_transferreason);
            academic_page_transferreason_check = true;
        }else if($('#academic_page_transferreason_id').val().length < 3 & $(this).val().length != 0){
            setErorFor2(academic_page_transferreason,'transfer reason require at least 3 letters!.');
            academic_page_transferreason_check = false;
        }else{
            setSuccessFor2(academic_page_transferreason);
            academic_page_transferreason_check = true;
        }
        if($('#academic_page_suspension_id').val().length === 0){
            setNormalFor2(academic_page_suspension);
            academic_page_suspension_check = true;
        }else if($('#academic_page_suspension_id').val().length < 3){
            setErorFor2(academic_page_suspension,'suspension reason require at least 3 letters!.');
            academic_page_suspension_check = false;
        }else{
            setSuccessFor2(academic_page_suspension);
            academic_page_suspension_check = true;
        }
        if($("#academic_page_specialeducation_id" ).val().length === 0){
            setNormalFor2(academic_page_specialeducation);
            academic_page_specialeducation_check = true;
        }else if($("#academic_page_specialeducation_id" ).val().length < 3){
            setErorFor2(academic_page_specialeducation,'special education require at least 3 letters!.');
            academic_page_specialeducation_check = false;
        }else{
            setSuccessFor2(academic_page_specialeducation);
            academic_page_specialeducation_check = true;
        }
        if($("#academic_page_previousschool_id").val().length === 0){
            setNormalFor2(academic_page_previousschool);
            academic_page_previousschool_check = true;
        }else if($("#academic_page_previousschool_id" ).val().length < 3){
            setErorFor2(academic_page_previousschool,'previous school require at least 3 letters!.');
            academic_page_previousschool_check = false;
        }else{
            setSuccessFor2(academic_page_previousschool);
            academic_page_previousschool_check = true;
        }
        if($("#academic_page_previousschoolcity_id" ).val().length === 0){
            setNormalFor2(academic_page_previousschoolcity);
            academic_page_previousschoolcity_check = true;
        }else if($("#academic_page_previousschoolcity_id" ).val().length < 3){
            setErorFor2(academic_page_previousschoolcity,'previous school city require at least 3 letters!.');
            academic_page_previousschoolcity_check = false;
        }else{
            setSuccessFor2(academic_page_previousschoolcity);
            academic_page_previousschoolcity_check = true;
        }

        if($("#academic_page_previousschoolstate_id" ).val().length === 0){
            setNormalFor2(academic_page_previousschoolstate);
            academic_page_previousschoolstate_check = true;
        }else if($("#academic_page_previousschoolstate_id" ).val().length < 3){
            setErorFor2(academic_page_previousschoolstate,'previous school state require at least 3 letters!.');
            academic_page_previousschoolstate_check = false;
        }else{
            setSuccessFor2(academic_page_previousschoolstate);
            academic_page_previousschoolstate_check = true;
        }
        if($("#academic_page_previousschoolcountry_id" ).val().length === 0){
            setNormalFor2(academic_page_previousschoolcountry);
            academic_page_previousschoolcountry_check = true;
        }else if($("#academic_page_previousschoolcountry_id" ).val().length < 3){
            setErorFor2(academic_page_previousschoolcountry,'previous school country require at least 3 letters!.');
            academic_page_previousschoolcountry_check = false;
        }else{
            setSuccessFor2(academic_page_previousschoolcountry);
            academic_page_previousschoolcountry_check = true;
        }
        if($("#academic_page_medicalcondtion_id" ).val().length === 0){
            setNormalFor2(academic_page_medicalcondtion);
            academic_page_medicalcondtion_check = true;
        }else if($("#academic_page_medicalcondtion_id" ).val().length < 3){
            setErorFor2(academic_page_medicalcondtion,'student medical condtion require at least 3 letters!.');
            academic_page_medicalcondtion_check = false;
        }else{
            setSuccessFor2(academic_page_medicalcondtion);
            academic_page_medicalcondtion_check = true;
        }
    }
});

$(document).ready(function () {
    $("#academic_page_transferreason_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#academic_page_suspension_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#academic_page_expulsion_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#academic_page_specialeducation_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#academic_page_previousschool_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#academic_page_previousschoolcity_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#academic_page_previousschoolstate_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#academic_page_previousschoolcountry_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#academic_page_medicalcondtion_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
});
