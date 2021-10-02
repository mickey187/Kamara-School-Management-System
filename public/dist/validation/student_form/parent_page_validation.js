var parent_first_name_check = false;
var parent_middle_name_check = false;
var parent_last_name_check = false;
var parent_gender_check = false;
var parent_relation_check = false;
var parent_schoolclosurepriority_check = true;
var parent_emeregency_contact_priority_check = true;
var parent_kebele_check = false;
var parent_unit_check = true;
var parent_state_check = true;
var parent_country_check = true;
var parent_email_check = true;
var parent_p_o_box_check = true;
var parent_house_no_check = true;
var parent_home_phone_no_check = true;
var parent_mobile_phone_no_check = false;
var parent_work_phone_no_check = true;

var parent_first_name_check2 = true;
var parent_middle_name_check2 = true;
var parent_last_name_check2 = true;
var parent_gender_check2 = true;
var parent_relation_check2 = true;
var parent_schoolclosurepriority_check2 = true;
var parent_emeregency_contact_priority_check2 = true;
var parent_kebele_check2 = true;
var parent_unit_check2 = true;
var parent_state_check2 = true;
var parent_country_check2 = true;
var parent_email_check2 = true;
var parent_p_o_box_check2 = true;
var parent_house_no_check2 = true;
var parent_home_phone_no_check2 = true;
var parent_mobile_phone_no_check2 = true;
var parent_work_phone_no_check2 = true;

var parent_first_name_check3 = true;
var parent_middle_name_check3 = true;
var parent_last_name_check3 = true;
var parent_gender_check3 = true;
var parent_relation_check3 = true;
var parent_schoolclosurepriority_check3 = true;
var parent_emeregency_contact_priority_check3 = true;
var parent_kebele_check3 = true;
var parent_unit_check3 = true;
var parent_state_check3 = true;
var parent_country_check3 = true;
var parent_email_check3 = true;
var parent_p_o_box_check3 = true;
var parent_house_no_check3 = true;
var parent_home_phone_no_check3 = true;
var parent_mobile_phone_no_check3 = true;
var parent_work_phone_no_check3 = true;


var parent_first_name = document.getElementById('parent_first_name_id');
var parent_middle_name = document.getElementById('parent_middle_name_id');
var parent_last_name = document.getElementById('parent_last_name_id');
var parent_gender = document.getElementById('parent_gender_id');
var parent_relation = document.getElementById('parent_relation_id');
var parent_schoolclosurepriority = document.getElementById('parent_school_closure_priority_id');
var parent_emeregency_contact_priority = document.getElementById('parent_emeregency_contact_priority_id');
var parent_kebele = document.getElementById('parent_kebele_id');
var parent_unit = document.getElementById('parent_unit_id');
var parent_state = document.getElementById('parent_state_id');
var parent_country = document.getElementById('parent_country_id');
var parent_email = document.getElementById('parent_email_id');
var parent_p_o_box = document.getElementById('parent_p_o_box_id');
var parent_house_no = document.getElementById('parent_house_no_id');
var parent_home_phone_no = document.getElementById('parent_home_phone_no_id');
var parent_mobile_phone_no = document.getElementById('parent_mobile_phone_no_id');
var parent_work_phone_no = document.getElementById('parent_work_phone_no_id');
// Second Parent variable
var parent_first_name2 = document.getElementById('parent_first_name_id2');
var parent_middle_name2 = document.getElementById('parent_middle_name_id2');
var parent_last_name2 = document.getElementById('parent_last_name_id2');
var parent_gender2 = document.getElementById('parent_gender_id2');
var parent_relation2 = document.getElementById('parent_relation_id2');
var parent_schoolclosurepriority2 = document.getElementById('parent_school_closure_priority_id2');
var parent_emeregency_contact_priority2 = document.getElementById('parent_emeregency_contact_priority_id2');
var parent_kebele2 = document.getElementById('parent_kebele_id2');
var parent_unit2 = document.getElementById('parent_unit_id2');
var parent_state2 = document.getElementById('parent_state_id2');
var parent_country2 = document.getElementById('parent_country_id2');
var parent_email2 = document.getElementById('parent_email_id2');
var parent_p_o_box2 = document.getElementById('parent_p_o_box_id2');
var parent_house_no2 = document.getElementById('parent_house_no_id2');
var parent_home_phone_no2 = document.getElementById('parent_home_phone_no_id2');
var parent_mobile_phone_no2 = document.getElementById('parent_mobile_phone_no_id2');
var parent_work_phone_no2 = document.getElementById('parent_work_phone_no_id2');
// Third parent variable
var parent_first_name3 = document.getElementById('parent_first_name_id3');
var parent_middle_name3 = document.getElementById('parent_middle_name_id3');
var parent_last_name3 = document.getElementById('parent_last_name_id3');
var parent_gender3 = document.getElementById('parent_gender_id3');
var parent_relation3 = document.getElementById('parent_relation_id3');
var parent_schoolclosurepriority3 = document.getElementById('parent_school_closure_priority_id3');
var parent_emeregency_contact_priority3 = document.getElementById('parent_emeregency_contact_priority_id3');
var parent_kebele3 = document.getElementById('parent_kebele_id3');
var parent_unit3 = document.getElementById('parent_unit_id3');
var parent_state3 = document.getElementById('parent_state_id3');
var parent_country3 = document.getElementById('parent_country_id3');
var parent_email3 = document.getElementById('parent_email_id3');
var parent_p_o_box3 = document.getElementById('parent_p_o_box_id3');
var parent_house_no3 = document.getElementById('parent_house_no_id3');
var parent_home_phone_no3 = document.getElementById('parent_home_phone_no_id3');
var parent_mobile_phone_no3 = document.getElementById('parent_mobile_phone_no_id3');
var parent_work_phone_no3 = document.getElementById('parent_work_phone_no_id3');
// First Parent Focus listener
$( "#parent_first_name_id" ).focusout(function() {
    if($("#parent_first_name_id").val().length === 0){
        setErorFor2(parent_first_name,'first name is required!.');
        parent_first_name_check = false;
    }else if($("#parent_first_name_id").val().length < 3){
        setErorFor2(parent_first_name,'first name require at least 3 letters!.');
        parent_first_name_check = false;
    }else{
        setSuccessFor2(parent_first_name);
        parent_first_name_check = true;
    }
})
$( "#parent_middle_name_id" ).focusout(function() {
    if($("#parent_middle_name_id").val().length === 0){
        setErorFor2(parent_middle_name,'middle name is required!.');
        parent_middle_name_check = false;
    }else if($("#parent_middle_name_id").val().length < 3){
        setErorFor2(parent_middle_name,'middle name require at least 3 letters!.');
        parent_middle_name_check = false;
    }else{
        setSuccessFor2(parent_middle_name);
        parent_middle_name_check = true;
    }
})
$( "#parent_last_name_id" ).focusout(function() {
    if($("#parent_last_name_id").val().length === 0){
        setErorFor2(parent_last_name,'last name is required!.');
        parent_last_name_check = false;
    }else if($("#parent_last_name_id").val().length < 3){
        setErorFor2(parent_last_name,'last name require at least 3 letters!.');
        parent_last_name_check = false;
    }else{
        setSuccessFor2(parent_last_name);
        parent_last_name_check = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#parent_gender_id").select2("close");
        if($('#parent_gender_id').val().length === 0){
            setErorForSelect(parent_gender,'gender is required!.');
            parent_gender_check = false;
        }else{
            setSuccessForselect(parent_gender);
            parent_gender_check = true;

        }
    }

});

$("#parent_gender_id").change(function (e) {
    e.preventDefault();
        setSuccessForselect(parent_gender);
        parent_gender_check = true;

});
$( "#parent_relation_id" ).focusout(function() {
    if($("#parent_relation_id").val().length === 0){
        setErorFor2(parent_relation,'relation is required!.');
        parent_relation_check = false;
    }else if($("#parent_relation_id").val().length < 3){
        setErorFor2(parent_relation,'relation require at least 3 letters!.');
        parent_relation_check = false;
    }else{
        setSuccessFor2(parent_relation);
        parent_relation_check = true;
    }
})

$( "#parent_school_closure_priority_id" ).focusout(function() {
    if($("#parent_school_closure_priority_id").val().length === 0){
        setNormalFor2(parent_schoolclosurepriority);
        parent_schoolclosurepriority_check = true;
    }else if($("#parent_school_closure_priority_id").val().length > 2){
        setErorFor2(parent_schoolclosurepriority,'priority require maximum 2 digits!.');
        parent_schoolclosurepriority_check = false;
    }else{
        setSuccessFor2(parent_schoolclosurepriority);
        parent_schoolclosurepriority_check = true;
    }
})
$( "#parent_emeregency_contact_priority_id" ).focusout(function() {
    if($("#parent_emeregency_contact_priority_id").val().length === 0){
        setNormalFor2(parent_emeregency_contact_priority);
        parent_emeregency_contact_priority_check = true;
    }else if($("#parent_emeregency_contact_priority_id").val().length > 2){
        setErorFor2(parent_emeregency_contact_priority,'priority require maximum 2 digits!.');
        parent_emeregency_contact_priority_check = false;
    }else{
        setSuccessFor2(parent_emeregency_contact_priority);
        parent_emeregency_contact_priority_check = true;
    }
})
$( "#parent_kebele_id" ).focusout(function() {
    if($("#parent_kebele_id").val().length === 0){
        setErorFor2(parent_kebele,'kebele is required!.');
        parent_kebele_check = false;
    }else if($("#parent_kebele_id").val().length > 11){
        setErorFor2(parent_kebele,'kebele is require maximum 10 letters!.');
        parent_kebele_check = false;
    }else{
        setSuccessFor2(parent_kebele);
        parent_kebele_check = true;
    }
})
$( "#parent_unit_id" ).focusout(function() {
    if($("#parent_unit_id").val().length === 0){
        setNormalFor2(parent_unit);
        parent_unit_check = true;
    }else if($("#parent_unit_id").val().length < 3){
        setErorFor2(parent_unit,'Unit is require minmum 3 letters!.');
        parent_unit_check = false;
    }else{
        setSuccessFor2(parent_unit);
        parent_unit_check = true;
    }
})
$( "#parent_state_id" ).focusout(function() {
    if($("#parent_state_id").val().length === 0){
        setNormalFor2(parent_state);
        parent_state_check = true;
    }else if($("#parent_state_id").val().length < 3){
        setErorFor2(parent_state,'state is require minmum 3 letters!.');
        parent_state_check = false;
    }else{
        setSuccessFor2(parent_state);
        parent_state_check = true;
    }
})
$( "#parent_country_id" ).focusout(function() {
    if($("#parent_country_id").val().length === 0){
        setNormalFor2(parent_country);
        parent_country_check = true;
    }else if($("#parent_country_id").val().length < 3){
        setErorFor2(parent_country,'country is require minmum 3 letters!.');
        parent_country_check = false;
    }else{
        setSuccessFor2(parent_country);
        parent_country_check = true;
    }
})
$( "#parent_email_id" ).focusout(function() {
    if($("#parent_email_id").val().length === 0){
        setNormalFor2(parent_email);
        parent_email_check = true;
    }else if($("#parent_email_id").val().length < 5){
        setErorFor2(parent_email,'email is require minmum 5 letters!.');
        parent_email_check = false;
    }else{
        setSuccessFor2(parent_email);
        parent_email_check = true;
    }
})
$( "#parent_p_o_box_id" ).focusout(function() {
    if($( "#parent_p_o_box_id" ).val().length === 0){
        setNormalFor2(parent_p_o_box);
        parent_p_o_box_check = true;
    }else if($( "#parent_p_o_box_id" ).val().length > 11 ){
        setErorFor2(parent_p_o_box,'b.o.box is require maximum 6 digits!.');
        parent_p_o_box_check = false;
    }else{
        setSuccessFor2(parent_p_o_box);
        parent_p_o_box_check = true;
    }
})
$( "#parent_house_no_id" ).focusout(function() {
    if($("#parent_house_no_id").val().length === 0){
        setNormalFor2(parent_house_no);
        parent_house_no_check = true;
    }else if($("#parent_house_no_id").val().length > 6 ){
        setErorFor2(parent_house_no,'house number is require maximum 6 digits!.');
        parent_house_no_check = false;
    }else{
        setSuccessFor2(parent_house_no);
        parent_house_no_check = true;
    }
})
$( "#parent_home_phone_no_id" ).focusout(function() {
    if($("#parent_home_phone_no_id").val().length === 0){
        setNormalFor2(parent_home_phone_no);
        parent_home_phone_no_check = true;
    }else if($("#parent_home_phone_no_id").val().length != 13){
        setErorFor2(parent_home_phone_no,'home phone number must be 13 digits!.');
        parent_home_phone_no_check = false;
    }else{
        setSuccessFor2(parent_home_phone_no);
        parent_home_phone_no_check = true;
    }
})
$( "#parent_mobile_phone_no_id" ).focusout(function() {
    if($("#parent_mobile_phone_no_id").val().length === 0){
        setErorFor2(parent_mobile_phone_no,'mobile phone number required!.');
        parent_mobile_phone_no_check = false;
    }else if($("#parent_mobile_phone_no_id").val().length != 10){
        setErorFor2(parent_mobile_phone_no,'phone number must be 10 digits!.');
        parent_mobile_phone_no_check = false;
    }else{
        setSuccessFor2(parent_mobile_phone_no);
        parent_mobile_phone_no_check = true;
    }
})
$( "#parent_work_phone_no_id" ).focusout(function() {
    if($("#parent_work_phone_no_id").val().length === 0){
        setNormalFor2(parent_work_phone_no);
        parent_work_phone_no_check = true;
    }else if($("#parent_work_phone_no_id").val().length != 13 && $(this).val().length != 10){
        setErorFor2(parent_work_phone_no,'phone number must be 10 0r 13 digits!.');
        parent_work_phone_no_check = false;
    }else{
        setSuccessFor2(parent_work_phone_no);
        parent_work_phone_no_check = true;
    }
})













// -------------------------------------------
// parent two
// -------------------------------------------

$( "#parent_first_name_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_first_name2);
        parent_first_name_check2 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_first_name2,'first name require at least 3 letters!.');
        parent_first_name_check2 = false;
    }else{
        setSuccessFor2(parent_first_name2);
        parent_first_name_check2 = true;
    }
})
$( "#parent_middle_name_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_middle_name2);
        parent_middle_name_check2 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_middle_name2,'middle name require at least 3 letters!.');
        parent_middle_name_check2 = false;
    }else{
        setSuccessFor2(parent_middle_name2);
        parent_middle_name_check2 = true;
    }
})
$( "#parent_last_name_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_last_name2);
        parent_last_name_check2 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_last_name2,'last name require at least 3 letters!.');
        parent_last_name_check2 = false;
    }else{
        setSuccessFor2(parent_last_name2);
        parent_last_name_check2 = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#parent_gender_id2").select2("close");
        if($('#parent_gender_id2').val().length === 0){
            setErorForSelect(parent_gender2,'');
            parent_gender_check2 = true;
        }else{
            setSuccessForselect(parent_gender2);
            parent_gender_check2 = true;

        }
    }

});

$("#parent_gender_id2").change(function (e) {
    e.preventDefault();
        setSuccessForselect(parent_gender2);
        parent_gender_check2 = true;

});
$( "#parent_relation_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_relation2);
        parent_relation_check2 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_relation2,'relation require at least 3 letters!.');
        parent_relation_check2 = false;
    }else{
        setSuccessFor2(parent_relation2);
        parent_relation_check2 = true;
    }
})
$( "#parent_school_closure_priority_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_schoolclosurepriority2);
        parent_schoolclosurepriority_check2 = true;
    }else if($(this).val().length > 2){
        setErorFor2(parent_schoolclosurepriority2,'priority require maximum 2 digits!.');
        parent_schoolclosurepriority_check2 = false;
    }else{
        setSuccessFor2(parent_schoolclosurepriority2);
        parent_schoolclosurepriority_check2 = true;
    }
})
$( "#parent_emeregency_contact_priority_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_emeregency_contact_priority2);
        parent_emeregency_contact_priority_check2 = true;
    }else if($(this).val().length > 2){
        setErorFor2(parent_emeregency_contact_priority2,'priority require maximum 2 digits!.');
        parent_emeregency_contact_priority_check2 = false;
    }else{
        setSuccessFor2(parent_emeregency_contact_priority2);
        parent_emeregency_contact_priority_check2 = true;
    }
})
$( "#parent_kebele_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_kebele2);
        parent_kebele_check2 = true;
    }else if($(this).val().length > 11){
        setErorFor2(parent_kebele2,'kebele is require maximum 10 letters!.');
        parent_kebele_check2 = false;
    }else{
        setSuccessFor2(parent_kebele2);
        parent_kebele_check2 = true;
    }
})
$( "#parent_unit_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_unit2);
        parent_unit_check2 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_unit2,'Unit is require minmum 3 letters!.');
        parent_unit_check2 = false;
    }else{
        setSuccessFor2(parent_unit2);
        parent_unit_check2 = true;
    }
})
$( "#parent_state_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_state2);
        parent_state_check2 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_state2,'state is require minmum 3 letters!.');
        parent_state_check2 = false;
    }else{
        setSuccessFor2(parent_state2);
        parent_state_check2 = true;
    }
})
$( "#parent_country_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_country2);
        parent_country_check2 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_country2,'country is require minmum 3 letters!.');
        parent_country_check2 = false;
    }else{
        setSuccessFor2(parent_country2);
        parent_country_check2 = true;
    }
})
$( "#parent_email_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_email2);
        parent_email_check2 = true;
    }else if($(this).val().length < 5){
        setErorFor2(parent_email2,'email is require minmum 5 letters!.');
        parent_email_check2 = false;
    }else{
        setSuccessFor2(parent_email2);
        parent_email_check2 = true;
    }
})
$( "#parent_p_o_box_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_p_o_box2);
        parent_p_o_box_check2 = true;
    }else if($(this).val().length > 6 ){
        setErorFor2(parent_p_o_box2,'b.o.box is require maximum 6 digits!.');
        parent_p_o_box_check2 = false;
    }else{
        setSuccessFor2(parent_p_o_box2);
        parent_p_o_box_check2 = true;
    }
})
$( "#parent_house_no_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_house_no2);
        parent_house_no_check2 = true;
    }else if($(this).val().length > 6 ){
        setErorFor2(parent_house_no2,'house number is require maximum 6 digits!.');
        parent_house_no_check2 = false;
    }else{
        setSuccessFor2(parent_house_no2);
        parent_house_no_check2 = true;
    }
})
$( "#parent_home_phone_no_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_home_phone_no2);
        parent_home_phone_no_check2 = true;
    }else if($(this).val().length != 13){
        setErorFor2(parent_home_phone_no2,'home phone number must be 13 digits!.');
        parent_home_phone_no_check2 = false;
    }else{
        setSuccessFor2(parent_home_phone_no2);
        parent_home_phone_no_check2 = true;
    }
})
$( "#parent_mobile_phone_no_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setErorFor2(parent_mobile_phone_no2,'mobile phone is required!.');
        parent_mobile_phone_no_check2 = false;
    }else if($(this).val().length != 10){
        setErorFor2(parent_mobile_phone_no2,'phone number must be 10 digits!.');
        parent_mobile_phone_no_check2 = false;
    }else{
        setSuccessFor2(parent_mobile_phone_no2);
        parent_mobile_phone_no_check2 = true;
    }
})
$( "#parent_work_phone_no_id2" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_work_phone_no2);
        parent_work_phone_no_check2 = true;
    }else if($(this).val().length != 13 && $(this).val().length != 10){
        setErorFor2(parent_work_phone_no2,'phone number must be 10 0r 13 digits!.');
        parent_work_phone_no_check2 = false;
    }else{
        setSuccessFor2(parent_work_phone_no2);
        parent_work_phone_no_check2 = true;
    }
})














// -------------------------------------------
// parent three
// -------------------------------------------

$( "#parent_first_name_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_first_name3);
        parent_first_name_check3 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_first_name3,'first name require at least 3 letters!.');
        parent_first_name_check3 = false;
    }else{
        setSuccessFor2(parent_first_name3);
        parent_first_name_check3 = true;
    }
})
$( "#parent_middle_name_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_middle_name3);
        parent_middle_name_check3 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_middle_name3,'middle name require at least 3 letters!.');
        parent_middle_name_check3 = false;
    }else{
        setSuccessFor2(parent_middle_name3);
        parent_middle_name_check3 = true;
    }
})
$( "#parent_last_name_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_last_name3);
        parent_last_name_check3 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_last_name3,'last name require at least 3 letters!.');
        parent_last_name_check3 = false;
    }else{
        setSuccessFor2(parent_last_name3);
        parent_last_name_check3 = true;
    }
})
$(document).on("mouseleave", ".select2-container", function(e) {
    if ($(e.toElement || e.relatedTarget).closest(".select2-container").length == 0) {
        $("#parent_gender_id3").select2("close");
        if($('#parent_gender_id3').val().length === 0){
            setErorForSelect(parent_gender3,'');
            parent_gender_check3 = true;
        }else{
            setSuccessForselect(parent_gender3);
            parent_gender_check3 = true;

        }
    }

});

$("#parent_gender_id3").change(function (e) {
    e.preventDefault();
        setSuccessForselect(parent_gender3);
        parent_gender_check3 = true;

});
$( "#parent_relation_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_relation3);
        parent_relation_check3 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_relation3,'relation require at least 3 letters!.');
        parent_relation_check3 = false;
    }else{
        setSuccessFor2(parent_relation3);
        parent_relation_check3 = true;
    }
})
$( "#parent_school_closure_priority_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_schoolclosurepriority3);
        parent_schoolclosurepriority_check3 = true;
    }else if($(this).val().length > 2){
        setErorFor2(parent_schoolclosurepriority3,'priority require maximum 2 digits!.');
        parent_schoolclosurepriority_check3 = false;
    }else{
        setSuccessFor2(parent_schoolclosurepriority3);
        parent_schoolclosurepriority_check3 = true;
    }
})
$( "#parent_emeregency_contact_priority_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_emeregency_contact_priority3);
        parent_emeregency_contact_priority_check3 = true;
    }else if($(this).val().length > 2){
        setErorFor2(parent_emeregency_contact_priority3,'priority require maximum 2 digits!.');
        parent_emeregency_contact_priority_check3 = false;
    }else{
        setSuccessFor2(parent_emeregency_contact_priority3);
        parent_emeregency_contact_priority_check3 = true;
    }
})
$( "#parent_kebele_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_kebele3);
        parent_kebele_check3 = true;
    }else if($(this).val().length > 11){
        setErorFor2(parent_kebele3,'kebele is require maximum 10 letters!.');
        parent_kebele_check3 = false;
    }else{
        setSuccessFor2(parent_kebele3);
        parent_kebele_check3 = true;
    }
})
$( "#parent_unit_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_unit3);
        parent_unit_check3 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_unit3,'Unit is require minmum 3 letters!.');
        parent_unit_check3 = false;
    }else{
        setSuccessFor2(parent_unit3);
        parent_unit_check3 = true;
    }
})
$( "#parent_state_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_state3);
        parent_state_check3 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_state3,'state is require minmum 3 letters!.');
        parent_state_check3 = false;
    }else{
        setSuccessFor2(parent_state3);
        parent_state_check3 = true;
    }
})
$( "#parent_country_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_country3);
        parent_country_check3 = true;
    }else if($(this).val().length < 3){
        setErorFor2(parent_country3,'country is require minmum 3 letters!.');
        parent_country_check3 = false;
    }else{
        setSuccessFor2(parent_country3);
        parent_country_check3 = true;
    }
})
$( "#parent_email_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_email3);
        parent_email_check3 = true;
    }else if($(this).val().length < 5){
        setErorFor2(parent_email3,'email is require minmum 5 letters!.');
        parent_email_check3 = false;
    }else{
        setSuccessFor2(parent_email3);
        parent_email_check3 = true;
    }
})
$( "#parent_p_o_box_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_p_o_box3);
        parent_p_o_box_check3 = true;
    }else if($(this).val().length > 6 ){
        setErorFor2(parent_p_o_box3,'b.o.box is require maximum 6 digits!.');
        parent_p_o_box_check3 = false;
    }else{
        setSuccessFor2(parent_p_o_box3);
        parent_p_o_box_check3 = true;
    }
})
$( "#parent_house_no_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_house_no3);
        parent_house_no_check3 = true;
    }else if($(this).val().length > 6 ){
        setErorFor2(parent_house_no3,'house number is require maximum 6 digits!.');
        parent_house_no_check3 = false;
    }else{
        setSuccessFor2(parent_house_no3);
        parent_house_no_check3 = true;
    }
})
$( "#parent_home_phone_no_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_home_phone_no3);
        parent_home_phone_no_check3 = true;
    }else if($(this).val().length != 13){
        setErorFor2(parent_home_phone_no3,'home phone number must be 13 digits!.');
        parent_home_phone_no_check3 = false;
    }else{
        setSuccessFor2(parent_home_phone_no3);
        parent_home_phone_no_check3 = true;
    }
})
$( "#parent_mobile_phone_no_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_mobile_phone_no3);
        parent_mobile_phone_no_check3 = true;
    }else if($(this).val().length != 10){
        setErorFor2(parent_mobile_phone_no3,'phone number must be 10 digits!.');
        parent_mobile_phone_no_check3 = false;
    }else{
        setSuccessFor2(parent_mobile_phone_no3);
        parent_mobile_phone_no_check3 = true;
    }
})
$( "#parent_work_phone_no_id3" ).focusout(function() {
    if($(this).val().length === 0){
        setNormalFor2(parent_work_phone_no3);
        parent_work_phone_no_check3 = true;
    }else if($(this).val().length != 13 && $(this).val().length != 10){
        setErorFor2(parent_work_phone_no3,'phone number must be 10 0r 13 digits!.');
        parent_work_phone_no_check3 = false;
    }else{
        setSuccessFor2(parent_work_phone_no3);
        parent_work_phone_no_check3 = true;
    }
})


// Parent Next Button
$("#parentInfoBtn").click(function (e) {
    e.preventDefault();
    if(
//         parent_first_name_check &
//         parent_middle_name_check &
//         parent_last_name_check &
//         parent_gender_check &
//         parent_relation_check &
//         parent_schoolclosurepriority_check &
//         parent_emeregency_contact_priority_check &
//         parent_kebele_check &
//         parent_unit_check &
//         parent_state_check &
//         parent_country_check &
//         parent_email_check &
//         parent_p_o_box_check &
//         parent_house_no_check &
//         parent_home_phone_no_check &
//         parent_mobile_phone_no_check &
//         parent_work_phone_no_check &
// // // parent 2
//         parent_first_name_check2 &
//         parent_middle_name_check2 &
//         parent_last_name_check2 &
//         parent_gender_check2 &
//         parent_relation_check2 &
//         parent_schoolclosurepriority_check2 &
//         parent_emeregency_contact_priority_check2 &
//         parent_kebele_check2 &
//         parent_unit_check2 &
//         parent_state_check2 &
//         parent_country_check2 &
//         parent_email_check2 &
//         parent_p_o_box_check2 &
//         parent_house_no_check2 &
//         parent_home_phone_no_check2 &
//         parent_mobile_phone_no_check2 &
//         parent_work_phone_no_check2 &
// // // parent 3
//         parent_first_name_check3 &
//         parent_middle_name_check3 &
//         parent_last_name_check3 &
//         parent_gender_check3 &
//         parent_relation_check3 &
//         parent_schoolclosurepriority_check3 &
//         parent_emeregency_contact_priority_check3 &
//         parent_kebele_check3 &
//         parent_unit_check3 &
//         parent_state_check3 &
//         parent_country_check3 &
//         parent_email_check3 &
//         parent_p_o_box_check3 &
//         parent_house_no_check3 &
//         parent_home_phone_no_check3 &
//         parent_mobile_phone_no_check3 &
//         parent_work_phone_no_check3
        true
        ){
            emergency_page = true;

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
        // parent_page = true;
    }else{
        if($("#parent_first_name_id").val().length === 0){
            setErorFor2(parent_first_name,'first name is required!.');
            parent_first_name_check = false;
        }else if($("#parent_first_name_id").val().length < 3){
            setErorFor2(parent_first_name,'first name require at least 3 letters!.');
            parent_first_name_check = false;
        }else{
            setSuccessFor2(parent_first_name);
            parent_first_name_check = true;
        }
        if($("#parent_middle_name_id").val().length === 0){
            setErorFor2(parent_middle_name,'middle name is required!.');
            parent_middle_name_check = false;
        }else if($("#parent_middle_name_id").val().length < 3){
            setErorFor2(parent_middle_name,'middle name require at least 3 letters!.');
            parent_middle_name_check = false;
        }else{
            setSuccessFor2(parent_middle_name);
            parent_middle_name_check = true;
        }
        if($("#parent_last_name_id").val().length === 0){
            setErorFor2(parent_last_name,'last name is required!.');
            parent_last_name_check = false;
        }else if($("#parent_last_name_id").val().length < 3){
            setErorFor2(parent_last_name,'last name require at least 3 letters!.');
            parent_last_name_check = false;
        }else{
            setSuccessFor2(parent_last_name);
            parent_last_name_check = true;
        }
        if($('#parent_gender_id').val().length === 0){
            setErorForSelect(parent_gender,'gender is required!.');
            parent_gender_check = false;
        }else{
            setSuccessForselect(parent_gender);
            parent_gender_check = true;
        }
        if($("#parent_relation_id").val().length === 0){
            setErorFor2(parent_relation,'relation is required!.');
            parent_relation_check = false;
        }else if($("#parent_relation_id").val().length < 3){
            setErorFor2(parent_relation,'relation require at least 3 letters!.');
            parent_relation_check = false;
        }else{
            setSuccessFor2(parent_relation);
            parent_relation_check = true;
        }
        if($("#parent_school_closure_priority_id").val().length === 0){
            setNormalFor2(parent_schoolclosurepriority);
            parent_schoolclosurepriority_check = true;
        }else if($("#parent_school_closure_priority_id").val().length > 2){
            setErorFor2(parent_schoolclosurepriority,'priority require maximum 2 digits!.');
            parent_schoolclosurepriority_check = false;
        }else{
            setSuccessFor2(parent_schoolclosurepriority);
            parent_schoolclosurepriority_check = true;
        }
        if($("#parent_emeregency_contact_priority_id").val().length === 0){
            setNormalFor2(parent_emeregency_contact_priority);
            parent_emeregency_contact_priority_check = true;
        }else if($("#parent_emeregency_contact_priority_id").val().length > 2){
            setErorFor2(parent_emeregency_contact_priority,'priority require maximum 2 digits!.');
            parent_emeregency_contact_priority_check = false;
        }else{
            setSuccessFor2(parent_emeregency_contact_priority);
            parent_emeregency_contact_priority_check = true;
        }
        if($("#parent_kebele_id").val().length === 0){
            setErorFor2(parent_kebele,'kebele is required!.');
            parent_kebele_check = false;
        }else if($("#parent_kebele_id").val().length > 11){
            setErorFor2(parent_kebele,'kebele is require maximum 10 letters!.');
            parent_kebele_check = false;
        }else{
            setSuccessFor2(parent_kebele);
            parent_kebele_check = true;
        }
        if($("#parent_unit_id").val().length === 0){
            setNormalFor2(parent_unit);
            parent_unit_check = true;
        }else if($("#parent_unit_id").val().length < 3){
            setErorFor2(parent_unit,'Unit is require minmum 3 letters!.');
            parent_unit_check = false;
        }else{
            setSuccessFor2(parent_unit);
            parent_unit_check = true;
        }
        if($("#parent_state_id").val().length === 0){
            setNormalFor2(parent_state);
            parent_state_check = true;
        }else if($("#parent_state_id").val().length < 3){
            setErorFor2(parent_state,'state is require minmum 3 letters!.');
            parent_state_check = false;
        }else{
            setSuccessFor2(parent_state);
            parent_state_check = true;
        }
        if($("#parent_country_id").val().length === 0){
            setNormalFor2(parent_state);
            parent_state_check = true;
        }else if($("#parent_country_id").val().length < 3){
            setErorFor2(parent_state,'state is require minmum 3 letters!.');
            parent_state_check = false;
        }else{
            setSuccessFor2(parent_state);
            parent_state_check = true;
        }
        if($("#parent_email_id").val().length === 0){
            setNormalFor2(parent_email);
            parent_email_check = true;
        }else if($("#parent_email_id").val().length < 5){
            setErorFor2(parent_email,'email is require minmum 5 letters!.');
            parent_email_check = false;
        }else{
            setSuccessFor2(parent_email);
            parent_email_check = true;
        }
        if($( "#parent_p_o_box_id" ).val().length === 0){
            setNormalFor2(parent_p_o_box);
            parent_p_o_box_check = true;
        }else if($( "#parent_p_o_box_id" ).val().length > 11 ){
            setErorFor2(parent_p_o_box,'b.o.box is require maximum 6 digits!.');
            parent_p_o_box_check = false;
        }else{
            setSuccessFor2(parent_p_o_box);
            parent_p_o_box_check = true;
        }
        if($("#parent_house_no_id").val().length === 0){
            setNormalFor2(parent_house_no);
            parent_house_no_check = true;
        }else if($("#parent_house_no_id").val().length > 6 ){
            setErorFor2(parent_house_no,'house number is require maximum 6 digits!.');
            parent_house_no_check = false;
        }else{
            setSuccessFor2(parent_house_no);
            parent_house_no_check = true;
        }
        if($("#parent_home_phone_no_id").val().length === 0){
            setNormalFor2(parent_home_phone_no);
            parent_home_phone_no_check = true;
        }else if($("#parent_home_phone_no_id").val().length != 13){
            setErorFor2(parent_home_phone_no,'home phone number must be 13 digits!.');
            parent_home_phone_no_check = false;
        }else{
            setSuccessFor2(parent_home_phone_no);
            parent_home_phone_no_check = true;
        }
        if($("#parent_mobile_phone_no_id").val().length === 0){
            setErorFor2(parent_mobile_phone_no,'mobile phone number is required!.');
            parent_mobile_phone_no_check = false;
        }else if($("#parent_mobile_phone_no_id").val().length != 10){
            setErorFor2(parent_mobile_phone_no,'phone number must be 10 digits!.');
            parent_mobile_phone_no_check = false;
        }else{
            setSuccessFor2(parent_mobile_phone_no);
            parent_mobile_phone_no_check = true;
        }
        if($("#parent_work_phone_no_id").val().length === 0){
            setNormalFor2(parent_work_phone_no);
            parent_work_phone_no_check = true;
        }else if($("#parent_work_phone_no_id").val().length != 13 && $(this).val().length != 10){
            setErorFor2(parent_work_phone_no,'phone number must be 10 0r 13 digits!.');
            parent_work_phone_no_check = false;
        }else{
            setSuccessFor2(parent_work_phone_no);
            parent_work_phone_no_check = true;
        }

// Parent Two (2)

        if($("#parent_first_name_id2").val().length === 0){
            setNormalFor2(parent_first_name2);
            parent_first_name_check2 = true;
        }else if($("#parent_first_name_id2").val().length < 3){
            setErorFor2(parent_first_name2,'first name require at least 3 letters!.');
            parent_first_name_check2 = false;
        }else{
            setSuccessFor2(parent_first_name2);
            parent_first_name_check2 = true;
        }
        if($("#parent_middle_name_id2").val().length === 0){
            setNormalFor2(parent_middle_name2);
            parent_middle_name_check2 = true;
        }else if($("#parent_middle_name_id2").val().length < 3){
            setErorFor2(parent_middle_name2,'middle name require at least 3 letters!.');
            parent_middle_name_check2 = false;
        }else{
            setSuccessFor2(parent_middle_name2);
            parent_middle_name_check2 = true;
        }
        if($("#parent_last_name_id2").val().length === 0){
            setNormalFor2(parent_last_name2);
            parent_last_name_check2 = true;
        }else if($("#parent_last_name_id2").val().length < 3){
            setErorFor2(parent_last_name2,'last name require at least 3 letters!.');
            parent_last_name_check2 = false;
        }else{
            setSuccessFor2(parent_last_name2);
            parent_last_name_check2 = true;
        }
        if($('#parent_gender_id2').val().length === 0){
            parent_gender_check2 = true;
        }else{
            setSuccessForselect(parent_gender2);
            parent_gender_check2= true;
        }
        if($("#parent_relation_id2").val().length === 0){
            setNormalFor2(parent_relation2);
            parent_relation_check2 = true;
        }else if($("#parent_relation_id2").val().length < 3){
            setErorFor2(parent_relation2,'relation require at least 3 letters!.');
            parent_relation_check2 = false;
        }else{
            setSuccessFor2(parent_relation2);
            parent_relation_check2 = true;
        }
        if($("#parent_school_closure_priority_id2").val().length === 0){
            setNormalFor2(parent_schoolclosurepriority2);
            parent_schoolclosurepriority_check2 = true;
        }else if($("#parent_school_closure_priority_id2").val().length > 2){
            setErorFor2(parent_schoolclosurepriority2,'priority require maximum 2 digits!.');
            parent_schoolclosurepriority_check2 = false;
        }else{
            setSuccessFor2(parent_schoolclosurepriority2);
            parent_schoolclosurepriority_check2 = true;
        }
        if($("#parent_emeregency_contact_priority_id2").val().length === 0){
            setNormalFor2(parent_emeregency_contact_priority2);
            parent_emeregency_contact_priority_check2 = true;
        }else if($("#parent_emeregency_contact_priority_id2").val().length > 2){
            setErorFor2(parent_emeregency_contact_priority2,'priority require maximum 2 digits!.');
            parent_emeregency_contact_priority_check2 = false;
        }else{
            setSuccessFor2(parent_emeregency_contact_priority2);
            parent_emeregency_contact_priority_check2 = true;
        }
        if($("#parent_kebele_id2").val().length === 0){
            setNormalFor2(parent_kebele2);
            parent_kebele_check2 = true;
        }else if($("#parent_kebele_id2").val().length > 11){
            setErorFor2(parent_kebele2,'kebele is require maximum 10 letters!.');
            parent_kebele_check2 = false;
        }else{
            setSuccessFor2(parent_kebele2);
            parent_kebele_check2 = true;
        }
        if($("#parent_unit_id2").val().length === 0){
            setNormalFor2(parent_unit2);
            parent_unit_check2 = true;
        }else if($("#parent_unit_id2").val().length < 3){
            setErorFor2(parent_unit2,'Unit is require minmum 3 letters!.');
            parent_unit_check2 = false;
        }else{
            setSuccessFor2(parent_unit2);
            parent_unit_check2 = true;
        }
        if($("#parent_state_id2").val().length === 0){
            setNormalFor2(parent_state2);
            parent_state_check2 = true;
        }else if($("#parent_state_id2").val().length < 3){
            setErorFor2(parent_state2,'state is require minmum 3 letters!.');
            parent_state_check2 = false;
        }else{
            setSuccessFor2(parent_state2);
            parent_state_check2 = true;
        }
        if($("#parent_country_id2").val().length === 0){
            setNormalFor2(parent_country2);
            parent_country_check2 = true;
        }else if($("#parent_country_id2").val().length < 3){
            setErorFor2(parent_country2,'state is require minmum 3 letters!.');
            parent_country_check2 = false;
        }else{
            setSuccessFor2(parent_country2);
            parent_country_check2 = true;
        }
        if($("#parent_email_id2").val().length === 0){
            setNormalFor2(parent_email2);
            parent_email_check2 = true;
        }else if($("#parent_email_id2").val().length < 5){
            setErorFor2(parent_email2,'email is require minmum 5 letters!.');
            parent_email_check2 = false;
        }else{
            setSuccessFor2(parent_email2);
            parent_email_check2 = true;
        }
        if($( "#parent_p_o_box_id2" ).val().length === 0){
            setNormalFor2(parent_p_o_box2);
            parent_p_o_box_check2 = true;
        }else if($( "#parent_p_o_box_id2" ).val().length > 11 ){
            setErorFor2(parent_p_o_box2,'b.o.box is require maximum 6 digits!.');
            parent_p_o_box_check2 = false;
        }else{
            setSuccessFor2(parent_p_o_box2);
            parent_p_o_box_check2 = true;
        }
        if($("#parent_house_no_id2").val().length === 0){
            setNormalFor2(parent_house_no2);
            parent_house_no_check2 = true;
        }else if($("#parent_house_no_id2").val().length > 6 ){
            setErorFor2(parent_house_no2,'house number is require maximum 6 digits!.');
            parent_house_no_check2 = false;
        }else{
            setSuccessFor2(parent_house_no2);
            parent_house_no_check2 = true;
        }
        if($("#parent_home_phone_no_id2").val().length === 0){
            setNormalFor2(parent_home_phone_no2);
            parent_home_phone_no_check2 = true;
        }else if($("#parent_home_phone_no_id2").val().length != 13){
            setErorFor2(parent_home_phone_no2,'home phone number must be 13 digits!.');
            parent_home_phone_no_check2 = false;
        }else{
            setSuccessFor2(parent_home_phone_no2);
            parent_home_phone_no_check2 = true;
        }
        if($("#parent_mobile_phone_no_id2").val().length === 0){
            setNormalFor2(parent_mobile_phone_no2);
            parent_mobile_phone_no_check2 = true;
        }else if($("#parent_mobile_phone_no_id2").val().length != 10){
            setErorFor2(parent_mobile_phone_no2,'phone number must be 10 digits!.');
            parent_mobile_phone_no_check2 = false;
        }else{
            setSuccessFor2(parent_mobile_phone_no2);
            parent_mobile_phone_no_check2 = true;
        }
        if($("#parent_work_phone_no_id2").val().length === 0){
            setNormalFor2(parent_work_phone_no2);
            parent_work_phone_no_check2 = true;
        }else if($("#parent_work_phone_no_id2").val().length != 13 && $(this).val().length != 10){
            setErorFor2(parent_work_phone_no2,'phone number must be 10 0r 13 digits!.');
            parent_work_phone_no_check2 = false;
        }else{
            setSuccessFor2(parent_work_phone_no2);
            parent_work_phone_no_check2 = true;
        }


// Parent Three (3)


        if($("#parent_first_name_id3").val().length === 0){
            setNormalFor2(parent_first_name3);
            parent_first_name_check3 = true;
        }else if($("#parent_first_name_id3").val().length < 3){
            setErorFor2(parent_first_name3,'first name require at least 3 letters!.');
            parent_first_name_check3 = false;
        }else{
            setSuccessFor2(parent_first_name3);
            parent_first_name_check3 = true;
        }
        if($("#parent_middle_name_id3").val().length === 0){
            setNormalFor2(parent_middle_name3);
            parent_middle_name_check3 = true;
        }else if($("#parent_middle_name_id3").val().length < 3){
            setErorFor2(parent_middle_name3,'middle name require at least 3 letters!.');
            parent_middle_name_check3 = false;
        }else{
            setSuccessFor2(parent_middle_name3);
            parent_middle_name_check3 = true;
        }
        if($("#parent_last_name_id3").val().length === 0){
            setNormalFor2(parent_last_name3);
            parent_last_name_check3 = true;
        }else if($("#parent_last_name_id3").val().length < 3){
            setErorFor2(parent_last_name3,'last name require at least 3 letters!.');
            parent_last_name_check3 = false;
        }else{
            setSuccessFor2(parent_last_name3);
            parent_last_name_check3 = true;
        }
        if($('#parent_gender_id3').val().length === 0){
            parent_gender_check3 = true;
        }else{
            setSuccessForselect(parent_gender3);
            parent_gender_check3= true;
        }
        if($("#parent_relation_id3").val().length === 0){
            setNormalFor2(parent_relation3);
            parent_relation_check3 = true;
        }else if($("#parent_relation_id3").val().length < 3){
            setErorFor2(parent_relation3,'relation require at least 3 letters!.');
            parent_relation_check3 = false;
        }else{
            setSuccessFor2(parent_relation3);
            parent_relation_check3 = true;
        }
        if($("#parent_school_closure_priority_id3").val().length === 0){
            setNormalFor2(parent_schoolclosurepriority3);
            parent_schoolclosurepriority_check3 = true;
        }else if($("#parent_school_closure_priority_id3").val().length > 2){
            setErorFor2(parent_schoolclosurepriority3,'priority require maximum 2 digits!.');
            parent_schoolclosurepriority_check3 = false;
        }else{
            setSuccessFor2(parent_schoolclosurepriority3);
            parent_schoolclosurepriority_check3 = true;
        }
        if($("#parent_emeregency_contact_priority_id3").val().length === 0){
            setNormalFor2(parent_emeregency_contact_priority3);
            parent_emeregency_contact_priority_check3 = true;
        }else if($("#parent_emeregency_contact_priority_id3").val().length > 2){
            setErorFor2(parent_emeregency_contact_priority3,'priority require maximum 2 digits!.');
            parent_emeregency_contact_priority_check3 = false;
        }else{
            setSuccessFor2(parent_emeregency_contact_priority3);
            parent_emeregency_contact_priority_check3 = true;
        }
        if($("#parent_kebele_id3").val().length === 0){
            setNormalFor2(parent_kebele3);
            parent_kebele_check3 = true;
        }else if($("#parent_kebele_id3").val().length > 11){
            setErorFor2(parent_kebele3,'kebele is require maximum 10 letters!.');
            parent_kebele_check3 = false;
        }else{
            setSuccessFor2(parent_kebele3);
            parent_kebele_check3 = true;
        }
        if($("#parent_unit_id3").val().length === 0){
            setNormalFor2(parent_unit3);
            parent_unit_check3 = true;
        }else if($("#parent_unit_id3").val().length < 3){
            setErorFor2(parent_unit3,'Unit is require minmum 3 letters!.');
            parent_unit_check3 = false;
        }else{
            setSuccessFor2(parent_unit3);
            parent_unit_check3 = true;
        }
        if($("#parent_state_id3").val().length === 0){
            setNormalFor2(parent_state3);
            parent_state_check3 = true;
        }else if($("#parent_state_id3").val().length < 3){
            setErorFor2(parent_state3,'state is require minmum 3 letters!.');
            parent_state_check3 = false;
        }else{
            setSuccessFor2(parent_state3);
            parent_state_check3 = true;
        }
        if($("#parent_country_id3").val().length === 0){
            setNormalFor2(parent_country3);
            parent_country_check3 = true;
        }else if($("#parent_country_id3").val().length < 3){
            setErorFor2(parent_country3,'state is require minmum 3 letters!.');
            parent_country_check3 = false;
        }else{
            setSuccessFor2(parent_country3);
            parent_country_check3 = true;
        }
        if($("#parent_email_id3").val().length === 0){
            setNormalFor2(parent_email3);
            parent_email_check3 = true;
        }else if($("#parent_email_id3").val().length < 5){
            setErorFor2(parent_email3,'email is require minmum 5 letters!.');
            parent_email_check3 = false;
        }else{
            setSuccessFor2(parent_email3);
            parent_email_check3 = true;
        }
        if($( "#parent_p_o_box_id3" ).val().length === 0){
            setNormalFor2(parent_p_o_box3);
            parent_p_o_box_check3 = true;
        }else if($( "#parent_p_o_box_id3" ).val().length > 11 ){
            setErorFor2(parent_p_o_box3,'b.o.box is require maximum 6 digits!.');
            parent_p_o_box_check3 = false;
        }else{
            setSuccessFor2(parent_p_o_box3);
            parent_p_o_box_check3 = true;
        }
        if($("#parent_house_no_id3").val().length === 0){
            setNormalFor2(parent_house_no3);
            parent_house_no_check3 = true;
        }else if($("#parent_house_no_id3").val().length > 6 ){
            setErorFor2(parent_house_no3,'house number is require maximum 6 digits!.');
            parent_house_no_check3 = false;
        }else{
            setSuccessFor2(parent_house_no3);
            parent_house_no_check3 = true;
        }
        if($("#parent_home_phone_no_id3").val().length === 0){
            setNormalFor2(parent_home_phone_no3);
            parent_home_phone_no_check3 = true;
        }else if($("#parent_home_phone_no_id3").val().length != 13){
            setErorFor2(parent_home_phone_no3,'home phone number must be 13 digits!.');
            parent_home_phone_no_check3 = false;
        }else{
            setSuccessFor2(parent_home_phone_no3);
            parent_home_phone_no_check3 = true;
        }
        if($("#parent_mobile_phone_no_id3").val().length === 0){
            setNormalFor2(parent_mobile_phone_no3);
            parent_mobile_phone_no_check3 = true;
        }else if($("#parent_mobile_phone_no_id3").val().length != 10){
            setErorFor2(parent_mobile_phone_no3,'phone number must be 10 digits!.');
            parent_mobile_phone_no_check3 = false;
        }else{
            setSuccessFor2(parent_mobile_phone_no3);
            parent_mobile_phone_no_check3 = true;
        }
        if($("#parent_work_phone_no_id3").val().length === 0){
            setNormalFor2(parent_work_phone_no3);
            parent_work_phone_no_check3 = true;
        }else if($("#parent_work_phone_no_id3").val().length != 13 && $(this).val().length != 10){
            setErorFor2(parent_work_phone_no3,'phone number must be 10 0r 13 digits!.');
            parent_work_phone_no_check3 = false;
        }else{
            setSuccessFor2(parent_work_phone_no3);
            parent_work_phone_no_check3 = true;
        }
    }
});
$(document).ready(function () {
    $("#parent_relation_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_state_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_unit_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_country_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_home_phone_no_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_mobile_phone_no_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_work_phone_no_id").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });

    // Parent 2
    $("#parent_relation_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_state_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_unit_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_country_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_home_phone_no_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_mobile_phone_no_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_work_phone_no_id2").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    // Parent 3
    $("#parent_relation_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_state_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_unit_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_country_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 65 && input2 <= 120) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_home_phone_no_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_mobile_phone_no_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });
    $("#parent_work_phone_no_id3").keydown(function (e) {
        var input2 = e.which;
        if(!(input2 >= 46 && input2 <= 57) && (input2 != 32 && input2 !=0 && input2 !=8)){
            e.preventDefault();
        }
    });

});
