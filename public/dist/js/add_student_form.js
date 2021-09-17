$("#basicStudentInfoBtn").click(function (e) {
    e.preventDefault();
    $("list_basic_student_info").html('<a class="nav-link active_tab1 " style="border: 1px solid #ccc;" id="">Basic Student Information</a>');
    $("list_academnic_background").html('<a class="nav-link  bg-light" style="border: 1px solid #ccc;" id="">Academic Background</a>');
    $("list_parent_info").html('<a class="nav-link  bg-light" style="border: 1px solid #ccc;" id="">Parent Information</a>');
    $("list_address").html('<a class="nav-link  bg-light" style="border: 1px solid #ccc;" id="">Address</a>');
    $("#basic_student_info").hide();
    $("#address").hide();
    $("#parent_info").hide();
    $("#academnic_background").show();
});

$("#academnicBackgroundBtn").click(function (e) {
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

$(window).load(function() {
    alert("window is loaded");
});
