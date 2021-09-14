

$.ajax({
    type: "GET",
    url: "/getStudentGender",
    dataType: "json",
    success: function (data) {
        console.log(data);

        var ctx = $('#student_gender_chart');
        var pieChart = new Chart(ctx,
            {
                type: 'pie',
                data: {
                  labels: ["Male", "Female"],
                  datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: data
                  }]
                },
                options: {
                  title: {
                    display: true,
                    text: 'Number of Students based on their Gender'
                  }
                }
            }
            );
    }
});