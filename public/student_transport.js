
$(window).on("load", function () {
  $("#student_tranport_div").hide();
});
$('#show_student_transport_list').click(function () { 
  $("#student_tranport_div").show();
  
});

var stud_id = null;
var payment_load_id = null;
var student_table_id = null;


$("#search_transport").click(function () { 
     stud_id = $("#search_input_transport").val();
     $('#inner_div').empty();
    

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
            //$('#card_register').prepend(insert)
            $('#inner_div').html(insert)
            data2.forEach(d => {

                

                

                    
                 
                 
           });
        
           
        },
        error:function (data) {

        }
     })

  
    
});

$('#register_transport').click(function () { 
 //alert('student id: '+stud_id+' pay_id: '+payment_load_id);
    $.ajax({
      type: 'GET',
      url: '/finance/registerForTransport/'+student_table_id+'/'+payment_load_id,
      dataType: 'json',
      success: function (data) {
        console.log(data);
        if (data == 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Registered Successfully!',
          
          })
        }
        else if(data == 'already exists'){
          Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: 'This student is already registered for Transportation',
            
          })
        }
        
       
        
        
      },

      error: function(data){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!',
          footer: '<a href="">Why do I have this issue?</a>'
        })
      }
    });
});

