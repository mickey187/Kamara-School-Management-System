$("#select_stream_for_schedule").change(function () {
    clas = $("#select_class_for_schedule").val();
    str = $("#select_stream_for_schedule").val();
    sec = '';
    // alert(clas+" - "+str);
    $.ajax({
        type: "GET",
        url: "getSection/"+clas+"/"+str,
        dataType: "json",
        success: function (response) {

            console.log(response);

            response.forEach(element => {
                sec +=  '<label class="PillList-item">'+
                '<input id="selectedSection" type="checkbox" name="feature"   value="'+element.section_name+'">'+
                '<span class="PillList-label" > Section '+element.section_name+
                '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                '</span>'+
                '</label>'
            });
            $("#sectionList").html(sec);
        }
    });
});


$("#select_class_for_schedule").change(function () {
    clas = $("#select_class_for_schedule").val();

    $.ajax({
        type: "GET",
        url: "getSubjectGroup/"+clas,
        dataType: "json",
        success: function (response) {
            var htmlString = '<select id="select_subject_for_schedule" class="form-control">';
            htmlString += '<option value="">select subject</option>';
            response.forEach(element => {
                htmlString += '<option value="'+element.id+'">'+element.subject_name+'</option>';
            });
            htmlString += '</select>';
            $("#subject_list").html(htmlString);
            console.log(response);
        }
    });
});


$("#insertSchedule").click(function (e) {
    e.preventDefault();

    var clas = $("#select_class_for_schedule").val();
    var stream = $("#select_stream_for_schedule").val();
    var subject = $("#select_subject_for_schedule").val();
    var day = $("#select_day_for_schedule").val();
    var period = $("#select_period_for_schedule").val();
    var sectionLabel = [];

    $('input[name="feature"]:checked').each(function(){
        sectionLabel.push(this.value);
    });

    $.ajax({
        type: "GET",
        url: "addSchedule/"+clas+"/"+stream+"/"+subject+"/"+day+"/"+sectionLabel+"/"+period,
        dataType: "json",
        success: function (response) {
            swal.fire(response);
        }
    });
    // alert("class: "+clas+" stream: "+stream+" section: "+sectionLabel+" day: "+day+" Subject: "+subject+" period:"+period);
});

function generateScheduleModal(){
}
function viewSchedule(){
    $("#scheduleContainer").hide();
}
