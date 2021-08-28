


var year_month =  $('#current_year_month').data('year_month');

getHomeRoomAttendance(year_month);

function getHomeRoomAttendance(year_month) { 

    $.ajax({
        type: "GET",
        url: "/getHomeRoomAttendance/"+year_month,
        data: "data",
        dataType: "json",
        success: function (data) {
            
            console.log(data);
        }
    });
 }