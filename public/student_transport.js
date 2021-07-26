var stud_id = null;
var payment_load_id = null;
var student_table_id = null;
$("#search_transport").click(function () { 
     stud_id = $("#search_input_transport").val();
    

    $.ajax({
        type: 'GET', 
        url: 'fetchstudentTransportLoad/'+stud_id,
        dataType : 'json',
        
        success:function (data) {
           var rows = '';
           // console.log(data);
            var data1 = JSON.parse(JSON.stringify(data.student_data));
            var data2 = JSON.parse(JSON.stringify(data.payment_load));
            console.log(data1)
            console.log(data2)

            var insert = '';
            var student_id ='';

            data1.forEach(c =>{
                student_id = c.student_id;
                student_table_id = c.student_table_id;
                data2.forEach(d=>{
                  payment_load_id = d.payment_load_id;
                  insert = //'<div class="card" style="width: 28rem;">'+
                  //'<div class="card-body">'+
                  '<h5 class="text-info" id="stud_name">Name: '+c.first_name+' '+c.middle_name+' '+c.last_name+'</h3>'+
                  '<h5 class="text-info" id="stud_name">Class Label: '+c.class_label+'</h3>'+
                  '<h5 class="text-info" id="stud_name">Payment Type: '+d.payment_type+'</h3>'+
                  '<h5 class="text-info" id="stud_name">Amount: '+d.amount+'</h3><br>'
                  // '<button class="btn btn-sm btn-success" id="register_transport">Register</button>'+  
                  // '</div>'+
                  // '</div>'
                })
                // insert = '<h3 class="text-info" id="stud_name">'+c.first_name+' '+c.middle_name+' '+c.last_name+'</h3>'+
                //          '<h5 class="text-info" id="stud_name">'+c.class_label+'</h3>'

            });
            $('#card_register').prepend(insert)
            data2.forEach(d => {

                

                // rows += '<div class="card" style="width: 28rem;">'+
                //         '<div class="card-body">'+
                //         '<h5 class="card-title">Card title</h5>'+
                //         //'<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>'+
                //         '<h3 class="text-info" id="stud_name">'+c.first_name+' '+c.middle_name+' '+c.last_name+'</h3>'+
                //         '<h3 class="text-info" id="stud_name">'+c.class_label+'</h3>'+
                //         // '<p class="card-text">Some quick example e card</p>'+
                //         '<input type="button" class="btn btn-sm btn-success" value="Register">'+
                //         // '<a href="#" class="card-link">Card link</a>'+
                //         '<a href="#" class="card-link">Another link</a>'+
                //         '</div>'+
                //         '</div>'

                    
                 
                 
           });
        // $('#stud_card').html(rows);
           
        },
        error:function (data) {

        }
     })

  
    
});

$('#register_transport').click(function () { 
 //alert('student id: '+stud_id+' pay_id: '+payment_load_id);
    $.ajax({
      type: 'GET',
      url: 'registerForTransport/'+student_table_id+'/'+payment_load_id,
      dataType: 'json',
      success: function (data) {
        console.log(data);
        Swal.fire(
          'Registered Successfully!',
          
        );
       
        
        
      },

      error: function(data){

      }
    });
});

