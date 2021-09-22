var student_first_name_check = false;
var student_middle_name_check = false;
var student_last_name_check = false;
var student_gender_check = false;
var student_birthdate_check = false;
var student_citizen_check = false;
var student_daycare_program_check = false;
var student_kindergarten_check = false;
var student_language_check = false;
var student_grade_check = false;
var student_stream_check = false;
var student_page_academic_year_check = true;
var student_page_country_of_birth_check = false;
var student_page_state_of_birth_check = false;
var student_page_unit_of_birth_check = false;


var student_first_name = document.getElementById('student_page_first_name_id');
var student_middle_name = document.getElementById('student_page_middle_name_id');
var student_last_name = document.getElementById('student_page_last_name_id');
var student_gender = document.getElementById('student_page_gender_id');
var student_birthdate = document.getElementById('student_page_birthdate_id');
var student_citizen = document.getElementById('student_page_citizen_id');
var student_daycare_program = document.getElementById('student_page_daycareprogram_id');
var student_kindergarten = document.getElementById('student_page_kindergarten_id');
var student_language = document.getElementById('student_page_nativlanguage_id');
var student_grade = document.getElementById('student_page_grade_id');
var student_stream = document.getElementById('student_page_stream_id');

var student_page_country_of_birth = document.getElementById('student_page_country_of_birth_id');
var student_page_state_of_birth = document.getElementById('student_page_state_of_birth_id');
var student_page_unit_of_birth = document.getElementById('student_page_unit_of_birth_id');
var student_page_academic_year = document.getElementById('student_page_academic_year_id');



function setErorFor2(input, message) {
    const formControll = input.parentElement;
    const small2 = formControll.querySelector('small');
    const input2 = formControll.querySelector('input');
    small2.innerText = message;
    small2.style.color = "#d9534f";
    input2.style.border = "1px solid #d9534f";
}
function setSuccessFor2(input) {
    const formControll = input.parentElement;
    const small2 = formControll.querySelector('small');
    const input2 = formControll.querySelector('input');
    small2.style.color = "#fff";
    input2.style.border = "1px solid #5cb85c ";
}

function setErorForSelect(input, message) {
    const formControll = input.parentElement;
    const small2 = formControll.querySelector('small');
    const input2 = formControll.querySelector('select');
    small2.innerText = message;
    small2.style.color = "#d9534f";

}
function setSuccessForselect(input) {
    const formControll = input.parentElement;
    const small2 = formControll.querySelector('small');
    const input2 = formControll.querySelector('select');
    small2.style.color = "#fff";

}

function setNormalFor2(input){
    const formControll = input.parentElement;
    const small2 = formControll.querySelector('small');
    const input2 = formControll.querySelector('input');
    small2.style.color = "#fff";
    input2.style.border = "1px solid #D3D3D3 ";
}

$( "#student_page_first_name_id" ).focusout(function() {
    if($(this).val().length === 0){
        setErorFor2(student_first_name,'first name is required!.');
        student_first_name_check = false;
    }else if($(this).val().length < 2){
        setErorFor2(student_first_name,'first name require at least 2 letters!.');
        student_first_name_check = false;
    }else{
        setSuccessFor2(student_first_name);
        student_first_name_check = true;
    }
})

$( "#student_page_middle_name_id" ).focusout(function() {
    if($(this).val().length === 0){
        setErorFor2(student_middle_name,'middle name is required!.');
        student_middle_name_check = false;

    }else if($(this).val().length < 2){
        setErorFor2(student_middle_name,'middle name require at least 2 letters!.');
        student_middle_name_check = false;

    }else{
        setSuccessFor2(student_middle_name);
        student_middle_name_check = true;
    }
})

$( "#student_page_last_name_id" ).focusout(function() {
    if($(this).val().length === 0){
        setErorFor2(student_last_name,'last name is required!.');
        student_last_name_check = false;

    }else if($(this).val().length < 2){
        setErorFor2(student_last_name,'last name require at least 2 letters!.');
        student_last_name_check = false;

    }else{
        setSuccessFor2(student_last_name);
        student_last_name_check = true;

    }
})

$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#student_page_gender_id").select2("close");
        if($('#student_page_gender_id').val().length === 0){
            setErorForSelect(student_gender,'gender is required!.');
            student_gender_check = false;
        }else{
            setSuccessForselect(student_gender);
            student_gender_check = true;

        }
    }

});

$("#student_page_gender_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(student_gender);
        student_gender_check = true;

});



$( "#student_page_birthdate_id" ).focusout(function() {
    if($(this).val().length === 0){
        setErorFor2(student_birthdate,'Birth date is required!.');
        student_birthdate_check = false;

    }else{
        setSuccessFor2(student_birthdate);
        student_birthdate_check = true;

    }
})

$( "#student_page_citizen_id" ).focusout(function() {
    if($(this).val().length > 15 & $(this).val().length != 0){
        setErorFor2(student_citizen,'citizen maximum letter is 15!.');
        student_citizen_check = false;

    }else if($(this).val().length < 3 & $(this).val().length != 0){
        setErorFor2(student_citizen,'citizen require at least 3 letters!.');
        student_citizen_check = false;

    }else if($(this).val().length === 0){
        setNormalFor2(student_citizen);
    }
    else{
        setSuccessFor2(student_citizen);
        student_citizen_check = true;

    }
})

$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#student_page_daycareprogram_id").select2("close");
        if($('#student_page_daycareprogram_id').val().length === 0){
            setErorForSelect(student_daycare_program,'daycare program is required!.');
            student_daycare_program_check = false;

        }else{
            setSuccessForselect(student_daycare_program);
            student_daycare_program_check = true;

        }
    }

});

$("#student_page_daycareprogram_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(student_daycare_program);
        student_daycare_program_check = true;

});

$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#student_page_kindergarten_id").select2("close");
        if($('#student_page_kindergarten_id').val().length === 0){
            setErorForSelect(student_kindergarten,'kinder garten is required!.');
            student_kindergarten_check = false;

        }else{
            setSuccessForselect(student_kindergarten);
            student_kindergarten_check = true;

        }
    }

});

$("#student_page_kindergarten_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(student_kindergarten);
        student_kindergarten_check = true;
});



$("#student_page_nativlanguage_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(student_language);
        student_language_check = true;

});

$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#student_page_nativlanguage_id").select2("close");
        if($('#student_page_nativlanguage_id').val().length === 0){
            setErorForSelect(student_language,'language is required!.');
            student_language_check = false;

        }else{
            setSuccessForselect(student_language);
            student_language_check = true;

        }
    }

});

$("#student_page_grade_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(student_grade);
        student_grade_check = true;

});

$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#student_page_grade_id").select2("close");
        if($('#student_page_grade_id').val().length === 0){
            setErorForSelect(student_grade,'grade is required!.');
            student_grade_check = false;

        }else{
            setSuccessForselect(student_grade);
            student_grade_check = true;

        }
    }

});

$("#student_page_stream_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(student_stream);
        student_stream_check = true;

});

$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#student_page_stream_id").select2("close");
        if($('#student_page_stream_id').val().length === 0){
            setErorForSelect(student_stream,'stream is required!.');
            student_stream_check = false;

        }else{
            setSuccessForselect(student_stream);
            student_stream_check = true;

        }
    }
});

$("#student_page_academic_year_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(student_page_academic_year);
        student_page_academic_year_check = true;

});

$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#student_page_academic_year_id").select2("close");
            setSuccessForselect(student_page_academic_year);
            student_page_academic_year_check = true;
    }
});

$( "#student_page_country_of_birth_id" ).focusout(function() {
    if($("#student_page_country_of_birth_id").val().length === 0){
        setErorFor2(student_page_country_of_birth,'country of birth is required!.');
        student_page_country_of_birth_check = false;

    }else if($("#student_page_country_of_birth_id").val().length < 2){
        setErorFor2(student_page_country_of_birth,'country of birth require at least 2 letters!.');
        student_page_country_of_birth_check = false;

    }else{
        setSuccessFor2(student_page_country_of_birth);
        student_page_country_of_birth_check = true;
    }
})



$( "#student_page_state_of_birth_id" ).focusout(function() {
    if($("#student_page_state_of_birth_id").val().length === 0){
        setErorFor2(student_page_state_of_birth,'state is required!.');
        student_page_state_of_birth_check = false;

    }else if($("#student_page_state_of_birth_id").val().length < 2){
        setErorFor2(student_page_state_of_birth,'state require at least 2 letters!.');
        student_page_state_of_birth_check = false;

    }else{
        setSuccessFor2(student_page_state_of_birth);
        student_page_state_of_birth_check = true;
    }
})

$( "#student_page_unit_of_birth_id" ).focusout(function() {
    if($("#student_page_unit_of_birth_id").val().length === 0){
        setErorFor2(student_page_unit_of_birth,'unit is required!.');
        student_page_unit_of_birth_check = false;

    }else if($("#student_page_unit_of_birth_id").val().length < 2){
        setErorFor2(student_page_unit_of_birth,'unit require at least 2 letters!.');
        student_page_unit_of_birth_check = false;

    }else{
        setSuccessFor2(student_page_unit_of_birth);
        student_page_unit_of_birth_check = true;
    }
})

// Basic Student Info Next Button
$("#basicStudentInfoBtn").click(function (e) {
    if(
        student_first_name_check &
        student_middle_name_check &
        student_last_name_check &
        student_gender_check &
        student_birthdate_check &
        student_citizen_check &
        student_daycare_program_check &
        student_kindergarten_check &
        student_page_academic_year_check &
        student_page_country_of_birth_check &
        student_page_state_of_birth_check &
        student_page_unit_of_birth_check &
        student_language_check &
        student_grade_check &
        student_stream_check
        // true
        ){
        e.preventDefault();
        academic_page = true;
        if (academic_page && student_page && parent_page && emergency_page && transport_page) {
            $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
            $("#list_academnic_background").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
            $("#list_parent_info").html('<a class="nav-link  bg-light " style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="parentInfo();">Parent Information</a>');
            $("#list_emergency_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="emergencyInfo();">Emergency Information</a>');
            $("#list_transport").html('<a class="nav-link  bg-light " style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="transportInfo();">Transportation</a>');
            $("#basic_student_info").hide();
            $("#transport").hide();
            $("#emergency").hide();
            $("#parent_info").hide();
            $("#academnic_background").show();
        }else if(academic_page && student_page && parent_page && emergency_page){
            $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
            $("#list_academnic_background").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
            $("#list_parent_info").html('<a class="nav-link  bg-light " style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="parentInfo();">Parent Information</a>');
            $("#list_emergency_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="emergencyInfo();">Emergency Information</a>');
            $("#list_transport").html('<a class="nav-link  bg-light disabled" style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="transportInfo();">Transportation</a>');
            $("#basic_student_info").hide();
            $("#transport").hide();
            $("#emergency").hide();
            $("#parent_info").hide();
            $("#academnic_background").show();
        }else if (academic_page && student_page && parent_page) {
            $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
            $("#list_academnic_background").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
            $("#list_parent_info").html('<a class="nav-link  bg-light" style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="parentInfo();">Parent Information</a>');
            $("#list_emergency_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="emergencyInfo();">Emergency Information</a>');
            $("#list_transport").html('<a class="nav-link  bg-light disabled" style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="transportInfo();">Transportation</a>');
            $("#basic_student_info").hide();
            $("#transport").hide();
            $("#emergency").hide();
            $("#parent_info").hide();
            $("#academnic_background").show();
        }else if (academic_page && student_page) {
            $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
            $("#list_academnic_background").html('<a class="nav-link  " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
            $("#list_parent_info").html('<a class="nav-link  bg-light disabled" style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="parentInfo();">Parent Information</a>');
            $("#list_emergency_info").html('<a class="nav-link bg-light disabled" style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="emergencyInfo();">Emergency Information</a>');
            $("#list_transport").html('<a class="nav-link  bg-light disabled" style="border: 1px solid #ccc; cursor:default; cursor-event:none;" onclick="transportInfo();">Transportation</a>');
            $("#basic_student_info").hide();
            $("#transport").hide();
            $("#emergency").hide();
            $("#parent_info").hide();
            $("#academnic_background").show();
        }


    }else{
        if($('#student_page_first_name_id').val().length === 0){
            setErorFor2(student_first_name,'first name is required!.');
            student_first_name_check = false;
        }else if($('#student_page_first_name_id').val().length < 2){
            setErorFor2(student_first_name,'first name require at least 2 letters!.');
            student_first_name_check = false;

        }else{
            setSuccessFor2(student_first_name);
            student_first_name_check = true;

        }
        if($('#student_page_middle_name_id').val().length === 0){
            setErorFor2(student_middle_name,'middle name is required!.');
            student_middle_name_check = false;
        }else if($('#student_page_middle_name_id').val().length < 2){
            setErorFor2(student_middle_name,'middle name require at least 2 letters!.');
            student_middle_name_check = false;

        }else{
            setSuccessFor2(student_middle_name);
            student_middle_name_check = true;

        }
        if($('#student_page_last_name_id').val().length === 0){
            setErorFor2(student_last_name,'last name is required!.');
            student_last_name_check = false;
        }else if($('#student_page_last_name_id').val().length < 2){
            setErorFor2(student_last_name,'last name require at least 2 letters!.');
            student_last_name_check = false;

        }else{
            setSuccessFor2(student_last_name);
            student_last_name_check = true;

        }
        if($('#student_page_gender_id').val().length === 0){
            setErorForSelect(student_gender,'gender is required!.');
            student_gender_check = false;
        }else{
            setSuccessForselect(student_gender);
            student_gender_check = true;

        }
        if($('#student_page_birthdate_id').val().length === 0){
            setErorFor2(student_birthdate,'Birth date is required!.');
            student_birthdate_check = false;
        }else{
            setSuccessFor2(student_birthdate);
            student_birthdate_check = true;

        }
        if($('#student_page_citizen_id').val().length > 15 & $('#student_page_citizen_id').val().length != 0){
            setErorFor2(student_citizen,'citizen maximum letter is 15!.');
            student_citizen_check = false;
        }else if($('#student_page_citizen_id').val().length < 3 & $('#student_page_citizen_id').val().length != 0){
            setErorFor2(student_citizen,'citizen require at least 3 letters!.');
            student_citizen_check = false;

        }else if($('#student_page_citizen_id').val().length === 0){
            setNormalFor2(student_citizen);
            student_citizen_check = true;
        }else{
            setSuccessFor2(student_citizen);
            student_citizen_check = true;
        }
        if($('#student_page_daycareprogram_id').val().length === 0){
            setErorForSelect(student_daycare_program,'daycare program is required!.');
            student_daycare_program_check = false;
        }else{
            setSuccessForselect(student_daycare_program);
            student_daycare_program_check = true;

        }
        if($('#student_page_kindergarten_id').val().length === 0){
            setErorForSelect(student_kindergarten,'kinder garten is required!.');
            student_kindergarten_check = false;
        }else{
            setSuccessForselect(student_kindergarten);
            student_kindergarten_check = true;

        }
        if($('#student_page_nativlanguage_id').val().length === 0){
            setErorForSelect(student_language,'language is required!.');
            student_language_check = false;
        }else{
            setSuccessForselect(student_language);
            student_language_check = true;
        }
        if($('#student_page_grade_id').val().length === 0){
            setErorForSelect(student_grade,'grade is required!.');
            student_grade_check = false;
        }else{
            setSuccessForselect(student_grade);
            student_grade_check = true;

        }
        if($('#student_page_stream_id').val().length === 0){
            setErorForSelect(student_stream,'stream is required!.');
            student_stream_check = false;
        }else{
            setSuccessForselect(student_stream);
            student_stream_check = true;

        }
        if($("#student_page_country_of_birth_id").val().length === 0){
            setErorFor2(student_page_country_of_birth,'country of birth is required!.');
            student_page_country_of_birth_check = false;

        }else if($("#student_page_country_of_birth_id").val().length < 2){
            setErorFor2(student_page_country_of_birth,'country of birth require at least 2 letters!.');
            student_page_country_of_birth_check = false;

        }else{
            setSuccessFor2(student_page_country_of_birth);
            student_page_country_of_birth_check = true;
        }
        if($("#student_page_state_of_birth_id").val().length === 0){
            setErorFor2(student_page_state_of_birth,'state is required!.');
            student_page_state_of_birth_check = false;

        }else if($("#student_page_state_of_birth_id").val().length < 2){
            setErorFor2(student_page_state_of_birth,'state require at least 2 letters!.');
            student_page_state_of_birth_check = false;

        }else{
            setSuccessFor2(student_page_state_of_birth);
            student_page_state_of_birth_check = true;
        }
        if($("#student_page_unit_of_birth_id").val().length === 0){
            setErorFor2(student_page_unit_of_birth,'unit is required!.');
            student_page_unit_of_birth_check = false;

        }else if($("#student_page_unit_of_birth_id").val().length < 2){
            setErorFor2(student_page_unit_of_birth,'unit require at least 2 letters!.');
            student_page_unit_of_birth_check = false;

        }else{
            setSuccessFor2(student_page_unit_of_birth);
            student_page_unit_of_birth_check = true;
        }
    }

});


