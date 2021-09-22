var transport_type_check = false;
var transport_first_name_check = false;
var transport_middle_name_check = false;
var transport_last_name_check = false;
var transport_gender_check = false;
var transport_phone_no_check = false;

var transport_first_name_check2 = true;
var transport_middle_name_check2 = true;
var transport_last_name_check2 = true;
var transport_gender_check2 = true;
var transport_phone_no_check2 = true;

var transport_first_name_check3 = true;
var transport_middle_name_check3 = true;
var transport_last_name_check3 = true;
var transport_gender_check3 = true;
var transport_phone_no_check3 = true;

var transport_type = document.getElementById('transport_type_id');


var transport_first_name = document.getElementById('transport_first_name_id');
var transport_middle_name = document.getElementById('transport_middle_name_id');
var transport_last_name = document.getElementById('transport_last_name_id');
var transport_gender = document.getElementById('transport_gender_id');
var transport_phone_no = document.getElementById('transport_phone_no_id');

var transport_first_name2 = document.getElementById('transport_first_name_id2');
var transport_middle_name2 = document.getElementById('transport_middle_name_id2');
var transport_last_name2 = document.getElementById('transport_last_name_id2');
var transport_gender2 = document.getElementById('transport_gender_id2');
var transport_phone_no2 = document.getElementById('transport_phone_no_id2');

var transport_first_name3 = document.getElementById('transport_first_name_id3');
var transport_middle_name3 = document.getElementById('transport_middle_name_id3');
var transport_last_name3 = document.getElementById('transport_last_name_id3');
var transport_gender3 = document.getElementById('transport_gender_id3');
var transport_phone_no3 = document.getElementById('transport_phone_no_id3');


$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#transport_type_id").select2("close");
        if($('#transport_type_id').val().length === 0){
            setErorForSelect(transport_type,'transport type is required!.');
            transport_type_check = false;
        }else{
            setSuccessForselect(transport_type);
            transport_type_check = true;

        }
    }

});

$("#transport_type_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(transport_type);
        transport_type_check = true;
});


$( "#transport_first_name_id" ).focusout(function() {
    if($("#transport_first_name_id").val().length === 0){
        setErorFor2(transport_first_name,'first name is required!.');
        transport_first_name_check = false;
    }else if($("#transport_first_name_id").val().length < 3){
        setErorFor2(transport_first_name,'first name require at least 3 letters!.');
        transport_first_name_check = false;
    }else{
        setSuccessFor2(transport_first_name);
        transport_first_name_check = true;
    }
})
$( "#transport_middle_name_id" ).focusout(function() {
    if($("#transport_middle_name_id").val().length === 0){
        setErorFor2(transport_middle_name,'middle name is required!.');
        transport_middle_name_check = false;
    }else if($("#transport_middle_name_id").val().length < 3){
        setErorFor2(transport_middle_name,'middle name require at least 3 letters!.');
        transport_middle_name_check = false;
    }else{
        setSuccessFor2(transport_middle_name);
        transport_middle_name_check = true;
    }
})
$( "#transport_last_name_id" ).focusout(function() {
    if($("#transport_last_name_id").val().length === 0){
        setErorFor2(transport_last_name,'last name is required!.');
        transport_last_name_check = false;
    }else if($("#transport_last_name_id").val().length < 3){
        setErorFor2(transport_last_name,'last name require at least 3 letters!.');
        transport_last_name_check = false;
    }else{
        setSuccessFor2(transport_last_name);
        transport_last_name_check = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#transport_gender_id").select2("close");
        if($('#transport_gender_id').val().length === 0){
            setErorForSelect(transport_gender,'gender is required!.');
            transport_gender_check = false;
        }else{
            setSuccessForselect(transport_gender);
            transport_gender_check = true;

        }
    }

});

$("#transport_gender_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(transport_gender);
        transport_gender_check = true;
});

$( "#transport_phone_no_id" ).focusout(function() {
    if($("#transport_phone_no_id").val().length === 0){
        setErorFor2(transport_phone_no,'phone number is required!.');
        transport_phone_no_check = false;
    }else if($("#transport_phone_no_id").val().length != 13 && $(this).val().length != 10){
        setErorFor2(transport_phone_no,'phone number must be 10 0r 13 digits!.');
        transport_phone_no_check = false;
    }else{
        setSuccessFor2(transport_phone_no);
        transport_phone_no_check = true;
    }
})


// Transport 2




$( "#transport_first_name_id2" ).focusout(function() {
    if($("#transport_first_name_id2").val().length === 0){
        setNormalFor2(transport_first_name2);
        transport_first_name_check2 = true;
    }else if($("#transport_first_name_id2").val().length < 3){
        setErorFor2(transport_first_name2,'first name require at least 3 letters!.');
        transport_first_name_check2 = false;
    }else{
        setSuccessFor2(transport_first_name2);
        transport_first_name_check2 = true;
    }
})
$( "#transport_middle_name_id2" ).focusout(function() {
    if($("#transport_middle_name_id2").val().length === 0){
        setNormalFor2(transport_middle_name2);
        transport_middle_name_check2 = true;
    }else if($("#transport_middle_name_id2").val().length < 3){
        setErorFor2(transport_middle_name2,'middle name require at least 3 letters!.');
        transport_middle_name_check2 = false;
    }else{
        setSuccessFor2(transport_middle_name2);
        transport_middle_name_check2 = true;
    }
})
$( "#transport_last_name_id2" ).focusout(function() {
    if($("#transport_last_name_id2").val().length === 0){
        setNormalFor2(transport_last_name2);
        transport_last_name_check2 = true;
    }else if($("#transport_last_name_id2").val().length < 3){
        setErorFor2(transport_last_name2,'last name require at least 3 letters!.');
        transport_last_name_check2 = false;
    }else{
        setSuccessFor2(transport_last_name2);
        transport_last_name_check2 = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#transport_gender_id2").select2("close");
        if($('#transport_gender_id2').val().length === 0){
            transport_gender_check2 = true;
        }else{
            setSuccessForselect(transport_gender2);
            transport_gender_check2 = true;

        }
    }

});

$("#emergency_gender_id2").change(function (e) {
    e.preventDefault();
        setSuccessForselect(transport_gender2);
        transport_gender_check2 = true;
});

$( "#transport_phone_no_id2" ).focusout(function() {
    if($("#transport_phone_no_id2").val().length === 0){
        setNormalFor2(transport_phone_no2);
        transport_phone_no_check2 = true;
    }else if($("#transport_phone_no_id2").val().length != 13 && $(this).val().length != 10){
        setErorFor2(transport_phone_no2,'phone number must be 10 0r 13 digits!.');
        transport_phone_no_check2 = false;
    }else{
        setSuccessFor2(transport_phone_no2);
        transport_phone_no_check2 = true;
    }
})



// Transport 3





$( "#transport_first_name_id3" ).focusout(function() {
    if($("#transport_first_name_id3").val().length === 0){
        setNormalFor2(transport_first_name3);
        transport_first_name_check3 = true;
    }else if($("#transport_first_name_id3").val().length < 3){
        setErorFor2(transport_first_name3,'first name require at least 3 letters!.');
        transport_first_name_check3 = false;
    }else{
        setSuccessFor2(transport_first_name3);
        transport_first_name_check3 = true;
    }
})
$( "#transport_middle_name_id3" ).focusout(function() {
    if($("#transport_middle_name_id3").val().length === 0){
        setNormalFor2(transport_middle_name3);
        transport_middle_name_check3 = true;
    }else if($("#transport_middle_name_id3").val().length < 3){
        setErorFor2(transport_middle_name3,'middle name require at least 3 letters!.');
        transport_middle_name_check3 = false;
    }else{
        setSuccessFor2(transport_middle_name3);
        transport_middle_name_check3 = true;
    }
})
$( "#transport_last_name_id3" ).focusout(function() {
    if($("#transport_last_name_id3").val().length === 0){
        setNormalFor2(transport_last_name3);
        transport_last_name_check3 = true;
    }else if($("#transport_last_name_id3").val().length < 3){
        setErorFor2(transport_last_name3,'last name require at least 3 letters!.');
        transport_last_name_check3 = false;
    }else{
        setSuccessFor2(transport_last_name3);
        transport_last_name_check3 = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#transport_gender_id3").select2("close");
        if($('#transport_gender_id3').val().length === 0){
            transport_gender_check3 = true;
        }else{
            setSuccessForselect(transport_gender3);
            transport_gender_check3 = true;

        }
    }

});

$("#emergency_gender_id3").change(function (e) {
    e.preventDefault();
        setSuccessForselect(transport_gender3);
        transport_gender_check3 = true;
});

$( "#transport_phone_no_id3" ).focusout(function() {
    if($("#transport_phone_no_id3").val().length === 0){
        setNormalFor2(transport_phone_no3);
        transport_phone_no_check3 = true;
    }else if($("#transport_phone_no_id3").val().length != 13 && $(this).val().length != 10){
        setErorFor2(transport_phone_no3,'phone number must be 10 0r 13 digits!.');
        transport_phone_no_check3 = false;
    }else{
        setSuccessFor2(transport_phone_no3);
        transport_phone_no_check3 = true;
    }
})





// // Emergency Next Button
// $("#emergencyNextBtn").click(function (e) {
//     e.preventDefault();

//     if (
//         false
//         ) {

//     }else{
        if($('#transport_type_id').val().length === 0){
            setErorForSelect(transport_type,'Transport type is required!.');
            transport_type_check = false;
        }else{
            setSuccessForselect(transport_type);
            transport_type_check = true;

        }
        if($("#transport_first_name_id").val().length === 0){
            setErorFor2(transport_first_name,'first name is required!.');
            transport_first_name_check = false;
        }else if($("#transport_first_name_id").val().length < 3){
            setErorFor2(transport_first_name,'first name require at least 3 letters!.');
            transport_first_name_check = false;
        }else{
            setSuccessFor2(transport_first_name);
            transport_first_name_check = true;
        }
        if($("#transport_middle_name_id").val().length === 0){
            setErorFor2(transport_middle_name,'middle name is required!.');
            transport_middle_name_check = false;
        }else if($("#transport_middle_name_id").val().length < 3){
            setErorFor2(transport_middle_name,'middle name require at least 3 letters!.');
            transport_middle_name_check = false;
        }else{
            setSuccessFor2(transport_middle_name);
            transport_middle_name_check = true;
        }
        if($("#transport_last_name_id").val().length === 0){
            setErorFor2(transport_last_name,'last name is required!.');
            transport_last_name_check = false;
        }else if($("#transport_last_name_id").val().length < 3){
            setErorFor2(transport_last_name,'last name require at least 3 letters!.');
            transport_last_name_check = false;
        }else{
            setSuccessFor2(transport_last_name);
            transport_last_name_check = true;
        }
        if($('#transport_gender_id').val().length === 0){
            setErorForSelect(transport_gender,'gender is required!.');
            transport_gender_check = false;
        }else{
            setSuccessForselect(transport_gender);
            transport_gender_check = true;

        }
        if($("#transport_phone_no_id").val().length === 0){
            setErorFor2(transport_phone_no,'phone number is required!.');
            transport_phone_no_check = false;
        }else if($("#transport_phone_no_id").val().length != 13 && $(this).val().length != 10){
            setErorFor2(transport_phone_no,'phone number must be 10 0r 13 digits!.');
            transport_phone_no_check = false;
        }else{
            setSuccessFor2(transport_phone_no);
            transport_phone_no_check = true;
        }





        if($("#transport_first_name_id2").val().length === 0){
            setNormalFor2(transport_first_name2);
            transport_first_name_check2 = true;
        }else if($("#transport_first_name_id2").val().length < 3){
            setErorFor2(transport_first_name2,'first name require at least 3 letters!.');
            transport_first_name_check2 = false;
        }else{
            setSuccessFor2(transport_first_name2);
            transport_first_name_check2 = true;
        }
        if($("#transport_middle_name_id2").val().length === 0){
            setNormalFor2(transport_middle_name2);
            transport_middle_name_check2 = true;
        }else if($("#transport_middle_name_id2").val().length < 3){
            setErorFor2(transport_middle_name2,'middle name require at least 3 letters!.');
            transport_middle_name_check2 = false;
        }else{
            setSuccessFor2(transport_middle_name2);
            transport_middle_name_check2 = true;
        }
        if($("#transport_last_name_id2").val().length === 0){
            setNormalFor2(transport_last_name2);
            transport_last_name_check2 = true;
        }else if($("#transport_last_name_id2").val().length < 3){
            setErorFor2(transport_last_name2,'last name require at least 3 letters!.');
            transport_last_name_check2 = false;
        }else{
            setSuccessFor2(transport_last_name2);
            transport_last_name_check2 = true;
        }
        if($('#transport_gender_id2').val().length === 0){
            transport_gender_check2 = true;
        }else{
            setSuccessForselect(transport_gender2);
            transport_gender_check2 = true;

        }
        if($("#transport_phone_no_id2").val().length === 0){
            setNormalFor2(transport_phone_no2);
            transport_phone_no_check2 = true;
        }else if($("#transport_phone_no_id2").val().length != 13 && $(this).val().length != 10){
            setErorFor2(transport_phone_no2,'phone number must be 10 0r 13 digits!.');
            transport_phone_no_check2 = false;
        }else{
            setSuccessFor2(transport_phone_no2);
            transport_phone_no_check2 = true;
        }


        if($("#transport_first_name_id3").val().length === 0){
            setNormalFor2(transport_first_name3);
            transport_first_name_check3 = true;
        }else if($("#transport_first_name_id3").val().length < 3){
            setErorFor2(transport_first_name3,'first name require at least 3 letters!.');
            transport_first_name_check3 = false;
        }else{
            setSuccessFor2(transport_first_name3);
            transport_first_name_check3 = true;
        }
        if($("#transport_middle_name_id3").val().length === 0){
            setNormalFor2(transport_middle_name3);
            transport_middle_name_check3 = true;
        }else if($("#transport_middle_name_id3").val().length < 3){
            setErorFor2(transport_middle_name3,'middle name require at least 3 letters!.');
            transport_middle_name_check3 = false;
        }else{
            setSuccessFor2(transport_middle_name3);
            transport_middle_name_check3 = true;
        }
        if($("#transport_last_name_id3").val().length === 0){
            setNormalFor2(transport_last_name3);
            transport_last_name_check3 = true;
        }else if($("#transport_last_name_id3").val().length < 3){
            setErorFor2(transport_last_name3,'last name require at least 3 letters!.');
            transport_last_name_check3 = false;
        }else{
            setSuccessFor2(transport_last_name3);
            transport_last_name_check3 = true;
        }
        if($('#transport_gender_id3').val().length === 0){
            transport_gender_check3 = true;
        }else{
            setSuccessForselect(transport_gender3);
            transport_gender_check3 = true;

        }
        if($("#transport_phone_no_id3").val().length === 0){
            setNormalFor2(transport_phone_no3);
            transport_phone_no_check3 = true;
        }else if($("#transport_phone_no_id3").val().length != 13 && $(this).val().length != 10){
            setErorFor2(transport_phone_no3,'phone number must be 10 0r 13 digits!.');
            transport_phone_no_check3 = false;
        }else{
            setSuccessFor2(transport_phone_no3);
            transport_phone_no_check3 = true;
        }
//     }
// });


$(document).ready(function () {

    $("#transport_phone_no_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });


    $("#transport_phone_no_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });

    $("#transport_phone_no_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });



});
