var emergency_first_name_check = false;
var emergency_middle_name_check = false;
var emergency_last_name_check = false;
var emergency_gender_check = false;
var emergency_phone_no_check = false;

var emergency_first_name_check2 = true;
var emergency_middle_name_check2 = true;
var emergency_last_name_check2 = true;
var emergency_gender_check2 = true;
var emergency_phone_no_check2 = true;

var emergency_first_name_check3 = true;
var emergency_middle_name_check3 = true;
var emergency_last_name_check3 = true;
var emergency_gender_check3 = true;
var emergency_phone_no_check3 = true;

var emergency_first_name = document.getElementById('emergency_first_name_id');
var emergency_middle_name = document.getElementById('emergency_middle_name_id');
var emergency_last_name = document.getElementById('emergency_last_name_id');
var emergency_gender = document.getElementById('emergency_gender_id');
var emergency_phone_no = document.getElementById('emergency_phone_no_id');

var emergency_first_name2 = document.getElementById('emergency_first_name_id2');
var emergency_middle_name2 = document.getElementById('emergency_middle_name_id2');
var emergency_last_name2 = document.getElementById('emergency_last_name_id2');
var emergency_gender2 = document.getElementById('emergency_gender_id2');
var emergency_phone_no2 = document.getElementById('emergency_phone_no_id2');

var emergency_first_name3 = document.getElementById('emergency_first_name_id3');
var emergency_middle_name3 = document.getElementById('emergency_middle_name_id3');
var emergency_last_name3 = document.getElementById('emergency_last_name_id3');
var emergency_gender3 = document.getElementById('emergency_gender_id3');
var emergency_phone_no3 = document.getElementById('emergency_phone_no_id3');




$( "#emergency_first_name_id" ).focusout(function() {
    if($("#emergency_first_name_id").val().length === 0){
        setErorFor2(emergency_first_name,'first name is required!.');
        emergency_first_name_check = false;
    }else if($("#emergency_first_name_id").val().length < 3){
        setErorFor2(emergency_first_name,'first name require at least 3 letters!.');
        emergency_first_name_check = false;
    }else{
        setSuccessFor2(emergency_first_name);
        emergency_first_name_check = true;
    }
})
$( "#emergency_middle_name_id" ).focusout(function() {
    if($("#emergency_middle_name_id").val().length === 0){
        setErorFor2(emergency_middle_name,'middle name is required!.');
        emergency_middle_name_check = false;
    }else if($("#emergency_middle_name_id").val().length < 3){
        setErorFor2(emergency_middle_name,'middle name require at least 3 letters!.');
        emergency_middle_name_check = false;
    }else{
        setSuccessFor2(emergency_middle_name);
        emergency_middle_name_check = true;
    }
})
$( "#emergency_last_name_id" ).focusout(function() {
    if($("#emergency_last_name_id").val().length === 0){
        setErorFor2(emergency_last_name,'last name is required!.');
        emergency_last_name_check = false;
    }else if($("#emergency_last_name_id").val().length < 3){
        setErorFor2(emergency_last_name,'last name require at least 3 letters!.');
        emergency_last_name_check = false;
    }else{
        setSuccessFor2(emergency_last_name);
        emergency_last_name_check = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#emergency_gender_id").select2("close");
        if($('#emergency_gender_id').val().length === 0){
            setErorForSelect(emergency_gender,'gender is required!.');
            emergency_gender_check = false;
        }else{
            setSuccessForselect(emergency_gender);
            emergency_gender_check = true;

        }
    }

});

$("#emergency_gender_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(emergency_gender);
        emergency_gender_check = true;
});

$( "#emergency_phone_no_id" ).focusout(function() {
    if($("#emergency_phone_no_id").val().length === 0){
        setErorFor2(emergency_phone_no,'phone number is required!.');
        emergency_phone_no_check = false;
    }else if($("#emergency_phone_no_id").val().length != 13 && $(this).val().length != 10){
        setErorFor2(emergency_phone_no,'phone number must be 10 0r 13 digits!.');
        emergency_phone_no_check = false;
    }else{
        setSuccessFor2(emergency_phone_no);
        emergency_phone_no_check = true;
    }
})


// Emergency 2




$( "#emergency_first_name_id2" ).focusout(function() {
    if($("#emergency_first_name_id2").val().length === 0){
        setNormalFor2(emergency_first_name2);
        emergency_first_name_check2 = true;
    }else if($("#emergency_first_name_id2").val().length < 3){
        setErorFor2(emergency_first_name2,'first name require at least 3 letters!.');
        emergency_first_name_check2 = false;
    }else{
        setSuccessFor2(emergency_first_name2);
        emergency_first_name_check2 = true;
    }
})
$( "#emergency_middle_name_id2" ).focusout(function() {
    if($("#emergency_middle_name_id2").val().length === 0){
        setNormalFor2(emergency_middle_name2);
        emergency_middle_name_check2 = true;
    }else if($("#emergency_middle_name_id2").val().length < 3){
        setErorFor2(emergency_middle_name2,'middle name require at least 3 letters!.');
        emergency_middle_name_check2 = false;
    }else{
        setSuccessFor2(emergency_middle_name2);
        emergency_middle_name_check2 = true;
    }
})
$( "#emergency_last_name_id2" ).focusout(function() {
    if($("#emergency_last_name_id2").val().length === 0){
        setNormalFor2(emergency_last_name2);
        emergency_last_name_check2 = true;
    }else if($("#emergency_last_name_id2").val().length < 3){
        setErorFor2(emergency_last_name2,'last name require at least 3 letters!.');
        emergency_last_name_check2 = false;
    }else{
        setSuccessFor2(emergency_last_name2);
        emergency_last_name_check2 = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#emergency_gender_id2").select2("close");
        if($('#emergency_gender_id2').val().length === 0){
            emergency_gender_check2 = true;
        }else{
            setSuccessForselect(emergency_gender2);
            emergency_gender_check2 = true;

        }
    }

});

$("#emergency_gender_id2").change(function (e) {
    e.preventDefault();
        setSuccessForselect(emergency_gender2);
        emergency_gender_check2 = true;
});

$( "#emergency_phone_no_id2" ).focusout(function() {
    if($("#emergency_phone_no_id2").val().length === 0){
        setNormalFor2(emergency_phone_no2);
        emergency_phone_no_check2 = true;
    }else if($("#emergency_phone_no_id2").val().length != 13 && $(this).val().length != 10){
        setErorFor2(emergency_phone_no2,'phone number must be 10 0r 13 digits!.');
        emergency_phone_no_check2 = false;
    }else{
        setSuccessFor2(emergency_phone_no2);
        emergency_phone_no_check2 = true;
    }
})



// Emergency 3




$( "#emergency_first_name_id3" ).focusout(function() {
    if($("#emergency_first_name_id3").val().length === 0){
        setNormalFor2(emergency_first_name3);
        emergency_first_name_check3 = true;
    }else if($("#emergency_first_name_id3").val().length < 3){
        setErorFor2(emergency_first_name3,'first name require at least 3 letters!.');
        emergency_first_name_check3 = false;
    }else{
        setSuccessFor2(emergency_first_name3);
        emergency_first_name_check3 = true;
    }
})
$( "#emergency_middle_name_id3" ).focusout(function() {
    if($("#emergency_middle_name_id3").val().length === 0){
        setNormalFor2(emergency_middle_name3);
        emergency_middle_name_check3 = true;
    }else if($("#emergency_middle_name_id3").val().length < 3){
        setErorFor2(emergency_middle_name3,'middle name require at least 3 letters!.');
        emergency_middle_name_check3 = false;
    }else{
        setSuccessFor2(emergency_middle_name3);
        emergency_middle_name_check3 = true;
    }
})
$( "#emergency_last_name_id3" ).focusout(function() {
    if($("#emergency_last_name_id3").val().length === 0){
        setNormalFor2(emergency_last_name3);
        emergency_last_name_check3 = true;
    }else if($("#emergency_last_name_id3").val().length < 3){
        setErorFor2(emergency_last_name3,'last name require at least 3 letters!.');
        emergency_last_name_check3 = false;
    }else{
        setSuccessFor2(emergency_last_name3);
        emergency_last_name_check3 = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#emergency_gender_id3").select2("close");
        if($('#emergency_gender_id3').val().length === 0){
            emergency_gender_check3 = true;
        }else{
            setSuccessForselect(emergency_gender3);
            emergency_gender_check3 = true;

        }
    }

});

$("#emergency_gender_id3").change(function (e) {
    e.preventDefault();
        setSuccessForselect(emergency_gender3);
        emergency_gender_check3 = true;
});

$( "#emergency_phone_no_id3" ).focusout(function() {
    if($("#emergency_phone_no_id3").val().length === 0){
        setNormalFor2(emergency_phone_no3);
        emergency_phone_no_check3 = true;
    }else if($("#emergency_phone_no_id3").val().length != 13 && $(this).val().length != 10){
        setErorFor2(emergency_phone_no3,'phone number must be 10 0r 13 digits!.');
        emergency_phone_no_check3 = false;
    }else{
        setSuccessFor2(emergency_phone_no3);
        emergency_phone_no_check3 = true;
    }
})


// Emergency Next Button
$("#emergencyNextBtn").click(function (e) {
    if (
        emergency_first_name_check &
        emergency_middle_name_check &
        emergency_last_name_check &
        emergency_gender_check &
        emergency_phone_no_check &

        emergency_first_name_check2 &
        emergency_middle_name_check2 &
        emergency_last_name_check2 &
        emergency_gender_check2 &
        emergency_phone_no_check2 &

        emergency_first_name_check3 &
        emergency_middle_name_check3 &
        emergency_last_name_check3 &
        emergency_gender_check3 &
        emergency_phone_no_check3
        // true
        ) {
            transport_page = true;
        e.preventDefault();
        $("#list_basic_student_info").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;" onclick="basicStudentInfo();">Basic Student Information</a>');
        $("#list_academnic_background").html('<a class="nav-link bg-light " style="border: 1px solid #ccc; cursor:pointer;"  onclick="accademicBackground();">Academic Background</a>');
        $("#list_parent_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="parentInfo();">Parent Information</a>');
        $("#list_emergency_info").html('<a class="nav-link bg-light" style="border: 1px solid #ccc; cursor:pointer;" onclick="emergencyInfo();">Emergency Information</a>');
        $("#list_transport").html('<a class="nav-link " style="border: 1px solid #ccc; cursor:pointer;" onclick="transportInfo();">Transportation</a>');
        $("#basic_student_info").hide();
        $("#academnic_background").hide();
        $("#parent_info").hide();
        $("#transport").show();
        $("#emergency").hide();
        emergency_page = true;
    }else{
        if($("#emergency_first_name_id").val().length === 0){
            setErorFor2(emergency_first_name,'first name is required!.');
            emergency_first_name_check = false;
        }else if($("#emergency_first_name_id").val().length < 3){
            setErorFor2(emergency_first_name,'first name require at least 3 letters!.');
            emergency_first_name_check = false;
        }else{
            setSuccessFor2(emergency_first_name);
            emergency_first_name_check = true;
        }
        if($("#emergency_middle_name_id").val().length === 0){
            setErorFor2(emergency_middle_name,'middle name is required!.');
            emergency_middle_name_check = false;
        }else if($("#emergency_middle_name_id").val().length < 3){
            setErorFor2(emergency_middle_name,'middle name require at least 3 letters!.');
            emergency_middle_name_check = false;
        }else{
            setSuccessFor2(emergency_middle_name);
            emergency_middle_name_check = true;
        }
        if($("#emergency_last_name_id").val().length === 0){
            setErorFor2(emergency_last_name,'last name is required!.');
            emergency_last_name_check = false;
        }else if($("#emergency_last_name_id").val().length < 3){
            setErorFor2(emergency_last_name,'last name require at least 3 letters!.');
            emergency_last_name_check = false;
        }else{
            setSuccessFor2(emergency_last_name);
            emergency_last_name_check = true;
        }
        if($('#emergency_gender_id').val().length === 0){
            setErorForSelect(emergency_gender,'gender is required!.');
            emergency_gender_check = false;
        }else{
            setSuccessForselect(emergency_gender);
            emergency_gender_check = true;

        }
        if($("#emergency_phone_no_id").val().length === 0){
            setErorFor2(emergency_phone_no,'phone number is required!.');
            emergency_phone_no_check = false;
        }else if($("#emergency_phone_no_id").val().length != 13 && $(this).val().length != 10){
            setErorFor2(emergency_phone_no,'phone number must be 10 0r 13 digits!.');
            emergency_phone_no_check = false;
        }else{
            setSuccessFor2(emergency_phone_no);
            emergency_phone_no_check = true;
        }
        if($("#emergency_first_name_id2").val().length === 0){
            setNormalFor2(emergency_first_name2);
            emergency_first_name_check2 = true;
        }else if($("#emergency_first_name_id2").val().length < 3){
            setErorFor2(emergency_first_name2,'first name require at least 3 letters!.');
            emergency_first_name_check2 = false;
        }else{
            setSuccessFor2(emergency_first_name2);
            emergency_first_name_check2 = true;
        }
        if($("#emergency_middle_name_id2").val().length === 0){
            setNormalFor2(emergency_middle_name2);
            emergency_middle_name_check2 = true;
        }else if($("#emergency_middle_name_id2").val().length < 3){
            setErorFor2(emergency_middle_name2,'middle name require at least 3 letters!.');
            emergency_middle_name_check2 = false;
        }else{
            setSuccessFor2(emergency_middle_name2);
            emergency_middle_name_check2 = true;
        }
        if($("#emergency_last_name_id2").val().length === 0){
            setNormalFor2(emergency_last_name2);
            emergency_last_name_check2 = true;
        }else if($("#emergency_last_name_id2").val().length < 3){
            setErorFor2(emergency_last_name2,'last name require at least 3 letters!.');
            emergency_last_name_check2 = false;
        }else{
            setSuccessFor2(emergency_last_name2);
            emergency_last_name_check2 = true;
        }
        if($('#emergency_gender_id2').val().length === 0){
            emergency_gender_check2 = true;
        }else{
            setSuccessForselect(emergency_gender2);
            emergency_gender_check2 = true;
        }
        if($("#emergency_phone_no_id2").val().length === 0){
            setNormalFor2(emergency_phone_no2);
            emergency_phone_no_check2 = true;
        }else if($("#emergency_phone_no_id2").val().length != 13 && $(this).val().length != 10){
            setErorFor2(emergency_phone_no2,'phone number must be 10 0r 13 digits!.');
            emergency_phone_no_check2 = false;
        }else{
            setSuccessFor2(emergency_phone_no2);
            emergency_phone_no_check2 = true;
        }
        if($("#emergency_first_name_id3").val().length === 0){
            setNormalFor2(emergency_first_name3);
            emergency_first_name_check3 = true;
        }else if($("#emergency_first_name_id3").val().length < 3){
            setErorFor2(emergency_first_name3,'first name require at least 3 letters!.');
            emergency_first_name_check3 = false;
        }else{
            setSuccessFor2(emergency_first_name3);
            emergency_first_name_check3 = true;
        }
        if($("#emergency_middle_name_id3").val().length === 0){
            setNormalFor2(emergency_middle_name3);
            emergency_middle_name_check3 = true;
        }else if($("#emergency_middle_name_id3").val().length < 3){
            setErorFor2(emergency_middle_name3,'middle name require at least 3 letters!.');
            emergency_middle_name_check3 = false;
        }else{
            setSuccessFor2(emergency_middle_name3);
            emergency_middle_name_check3 = true;
        }
        if($("#emergency_last_name_id3").val().length === 0){
            setNormalFor2(emergency_last_name3);
            emergency_last_name_check3 = true;
        }else if($("#emergency_last_name_id3").val().length < 3){
            setErorFor2(emergency_last_name3,'last name require at least 3 letters!.');
            emergency_last_name_check3 = false;
        }else{
            setSuccessFor2(emergency_last_name3);
            emergency_last_name_check3 = true;
        }
        if($('#emergency_gender_id3').val().length === 0){
            emergency_gender_check3 = true;
        }else{
            setSuccessForselect(emergency_gender3);
            emergency_gender_check3 = true;

        }
    }
});


$(document).ready(function () {

    $("#emergency_phone_no_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });


    $("#emergency_phone_no_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });

    $("#emergency_phone_no_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });

});
