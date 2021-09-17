$("#basicStudentInfoBtn").click(function (e) {
    e.preventDefault();
    $("#basic_student_info").hide();
    $("#address").hide();
    $("#parent_info").hide();
    $("#academnic_background").show();
});

$("#academicBackgroundBtn").click(function (e) {
    e.preventDefault();
    $("#basic_student_info").hide();
    $("#academnic_background").hide();
    $("#address").hide();
    $("#parent_info").show();
});

$("#parentInfoBtn").click(function (e) {
    e.preventDefault();
    $("#basic_student_info").hide();
    $("#academnic_background").hide();
    $("#parent_info").hide();
    $("#address").show();
});

$( document ).ready(function() {
    console.log( "ready!" );
 });
