// const { split } = require("lodash");

var send_pay_total_detail = [];
var send_pay_for_individual_detail = [];
var student_id_for_payment = null;
// the below code launches make payment modal
$('#make_payment').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('payment_data') // Extract info from data-* attributes
    $('#payment_type').attr('selected', 'none');
    $('#payment_load').empty();
    $('#submit_payment').hide();
    $('#pay_total').hide();
  
    var modal = $(this)

    data_array = recipient.split(",");
    student_id_for_payment = data_array[3];

    modal.find('.modal-footer #submit_payment').val(data_array[3])

    $('#payment_type').on('change', function() {
      payment_type_id = $(this).find(":selected").val();

      if (payment_type_id == 'total') {

       
        fetchTotalPaymentLoad(data_array[1],data_array[3]);
        console.log("selected total");
        $('#pay_total').show();
        $('#submit_payment').hide();
        
      }

      else{
      
      console.log(data_array[3])
      var selected_individual_payment = $("#payment_type option:selected").text();
      //alert(selected_individual_payment);
      fetchPaymentLoad(data_array[1],payment_type_id,data_array[3],selected_individual_payment);
      $('#submit_payment').show();
      
      $('#pay_total').hide();
      }
      
      
      
  });
     // payment_type_id = $("#payment_type option").filter(":selected").val();

     
      
    

    
    modal.find('.modal-body #student_id').text("Student ID: "+data_array[0])
    modal.find('.modal-body #student_name').text("Student Name: "+data_array[2])
  })


  function fetchTotalPaymentLoad(class_id,stud_id){
    $.ajax({
      type: 'GET',
      url: 'fetchTotalPaymentLoad/'+class_id+'/'+stud_id,
      dataType: 'json',
      success: function (data) {
       // console.log(data);
        var rows = '';
        var rows2 = '';
        
        //console.log(data);
        var data1 = JSON.parse(JSON.stringify(data.result_load));
        //console.log(data1);
       
       send_pay_total_detail = data1.slice();
       console.log("ICEEEEEEEEEEE");
       console.log(send_pay_total_detail);

        
       
        data1.forEach(payment_load =>{

          if (payment_load.amount != 0) {
            rows2 += '<h5 class ="text-success">'+payment_load.payment_type+': '+payment_load.amount+' Birr</h3>';
            $('#individual_load').html(rows2);
          } else if(payment_load.amount == 0){
            rows2 += '<h5 class ="text-success">'+payment_load.payment_type+': Already Paid</h3>';
          }

          
          

        });
          
          $('#individual_load').html(rows2);
        
        var data2 = JSON.parse(JSON.stringify(data.total_load));
            
              rows = '<h3 class ="text-success">Total: '+data2+' Birr</h3>';
            
       
        
        $('#payment_load').html(rows);
        $('#individual_load').show();

       
        
      }
    });
  }


  function fetchPaymentLoad(class_id, pay_type, stud_id,selected_individual_payment) {
    $.ajax({
        type: 'GET', 
        url: 'fetchload/'+class_id+'/'+pay_type+'/'+stud_id+'/'+selected_individual_payment,
        dataType : 'json',
        
        success:function (data) {
           var rows = '';
            //console.log(data);
            send_pay_for_individual_detail = data.slice();
            console.log(send_pay_for_individual_detail);
            
            data.forEach(d => {
               
                // rows+= 
                if (d.amount == 'already payed') {
                  rows += '<h3 class ="text-success">'+d.payment_type+': '+d.amount+ '</h3>'+
                          '<input value="'+d.load_id+'" hidden name="load_id">' +
                          '<input value="'+d.amount+'" hidden name="amount">' 
                  
                }
                else{
                 rows += '<h3 class ="text-success">'+d.payment_type+': '+d.amount+' birr'+ '</h3>'
                          
                        }
           });
           $('#individual_load').hide();
          $('#payment_load').html(rows);
           
        },
        error:function (data) {
          console.log("Error");

        }
     }); 
  }



  $('#view_payment_history').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('payment_history') // Extract info from data-* attributes
    $('#unpaid_payment').empty();
    $('#payment_history').empty();

    
    
    var stud_id = recipient;
    fetchPaymentHistory(stud_id);
    var modal = $(this)
    modal.find('.modal-title').text("Payment History")
    modal.find('.modal-body input').val(recipient)



  });






 function fetchPaymentHistory(stud_id) {

    $.ajax({
      type: 'GET', 
      url: 'fetchpaymenthistory/'+stud_id,
      dataType : 'json',
      
      success:function (data) {
        var data1 = JSON.parse(JSON.stringify(data.result_history));
        var data2 = JSON.parse(JSON.stringify(data.unpaid_bill));
        var data3 = JSON.parse(JSON.stringify(data.compared));
        var data4 = JSON.parse(JSON.stringify(data.student_missing_payment_coll));
        var data5 = JSON.parse(JSON.stringify(data.sliced));
        console.log(data1);
       // datax = JSON.parse(JSON.stringify(data5));
         var rows = '';
         var counter = 0;
         var unpaid_bill_html_string = '';
          console.log(data1);
          console.log(data5);
          console.log(data4);
          data4.forEach(d => {

            var str = d.payment_month
             split = str.split('-');
             switch (split[1]) {
               case '01':
                split[1] = 'መስከረም';
                 
                 break;
                 case '02':
                   split[1] = 'ጥቅምት';
                   break;

                 case '03':
                  split[1] = 'ህዳር';
                   break;

                   case '04':
                    split[1] = 'ታህሳስ';
                    break;

                    case '05':
                      split[1] = 'ጥር';
                   break;

                   case '06':
                    split[1] = 'የካቲት';
                   break;

                   case '07':
                    split[1] = 'መጋቢት';
                   break;
                   case '08':
                    split[1] =  'ሚያዚያ';
                    
                   break;

                   case '09':
                    split[1] = 'ግንቦት';
                   break;

                   case '10':
                    split[1] = 'ሰኔ';
                   break;

                   case '11':
                    split[1] = 'ሃምሌ';
                   break;

                   case '12':
                    split[1] = 'ነሃሴ';
                   break;

                   case '13':
                    split[1] = 'ጷግሜ';
                   break;

             
               default:
                 break;
             }
            // console.log(split[1]+' '+split[0]);
             var month_year = split[1] +' '+split[0];
             d.payment_month = month_year;
            if (d.status == 'unpaid') {
              
            counter++;
            // unpaid_bill_html_string += '<h5 class="text-danger">payment type: '
            //                             +d.payment_type+
            //                             ' amount: '+d.amount_payed+' unpaid_month: '+d.payment_month+
            //                             ' status: '+d.status+' </h5>'

            unpaid_bill_html_string +=  '<tr>'+                                        
                                        '<td>'+d.payment_type +'</td>'+
                                        '<td>'+d.amount_payed +'</td>'+
                                        '<td>'+d.payment_month +'</td>'+
                                        '<td>'+d.status+'</td>'+
                                        '</tr>'
               }                          
           // unpaid_bill_html_string += '<h5 class="text-danger">payment type id'+d.payment_month+'</h5>'
            
          });
          $('#unpaid_payment').html(unpaid_bill_html_string);
          $('#num_of_unpaid_bill').text(counter)
          var split = null;
          data1.forEach(d => {
             var str = d.payment_month
             split = str.split('-');
             switch (split[1]) {
               case '01':
                split[1] = 'መስከረም';
                 
                 break;
                 case '02':
                   split[1] = 'ጥቅምት';
                   break;

                 case '03':
                  split[1] = 'ህዳር';
                   break;

                   case '04':
                    split[1] = 'ታህሳስ';
                    break;

                    case '05':
                      split[1] = 'ጥር';
                   break;

                   case '06':
                    split[1] = 'የካቲት';
                   break;

                   case '07':
                    split[1] = 'መጋቢት';
                   break;
                   case '08':
                    split[1] = 'ሚያዚያ';
                   break;

                   case '09':
                    split[1] = 'ግንቦት';
                   break;

                   case '10':
                    split[1] = 'ሰኔ';
                   break;

                   case '11':
                    split[1] = 'ሃምሌ';
                   break;

                   case '12':
                    split[1] = 'ነሃሴ';
                   break;

                   case '13':
                    split[1] = 'ጷግሜ';
                   break;

             
               default:
                 break;
             }
            // console.log(split[1]+' '+split[0]);
             var month_year = split[1] +' '+split[0];
             d.payment_month = month_year;
             //console.log(d.payment_month);
          });
           data1.forEach(d => {
             
              // rows+= 
               rows += '<tr>'+
                       '<td>'+d.first_name +' '+ d.middle_name +' '+ d.last_name +'</td>'+
                       '<td>'+d.payment_type +'</td>'+
                       '<td>'+d.amount_payed +'</td>'+
                       '<td>'+d.payment_month +'</td>'+
                       '</tr>'
                       
         });
        $('#payment_history').html(rows);
         
      },
      error:function (data) {

      }
   });
  }

 


  $('#pay_total').click(function () { 
    var month = $('#year_month').val();
    
    $.ajax({
      type: 'GET',
      url: 'makeTotalPayment/'+student_id_for_payment+'/'+month,
      data: {'detail':send_pay_total_detail},
      dataType:'json',
      cache: false,
      success: function (response) {
        console.log(response);
       
       if (response == "successful") {
        $('.close').click();
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Paid Successfully!',
        
        });
       }

       else if(response == "already paid"){
        $('.close').click();
        Swal.fire({
          icon: 'warning',
          title: 'Warning',
          text: 'This student has already paid for this month',
          
        });
      }

        else if(response == null){
          $('.close').click();
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
          });
        }
       
     }
    });
     
   });

   $('#submit_payment').click(function () { 
    var month = $('#year_month').val();
    $.ajax({
      type: 'GET',
      url: 'makeIndividualPayment/'+student_id_for_payment+'/'+month,
      data: {'detail':send_pay_for_individual_detail},
      dataType:'json',
      cache: false,
      success: function (response) {
       // console.log(response);
       
       
        if (response == "successful") {
          $('.close').click();
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Paid Successfully!',
          
          });
         }
  
         else if(response == "already paid"){
          $('.close').click();
          Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: 'This student has already paid for this month',
            
          });
        }
  
          else if(response == null){
            $('.close').click();
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href="">Why do I have this issue?</a>'
            });
          }
        // Swal.fire(
        //   'Payed Successfully!',
          
        // );
        // $('.close').click();
        
        //$('#view_payment_history').modal('show')
       // location.reload();
       
        
      }
    });
  });

  //ethio date picker

  // $('#month1').click(function () { 
    
  //   $('#month_year').prepend($('#month1').text()+", ");
    
  // });

$('#ehtio_month_picker').hide();
$('#calendar').click(function(){

  if ($('#ehtio_month_picker').is(":visible")) {
    $('#ehtio_month_picker').hide();
  }
  else{$('#ehtio_month_picker').show();
}
  
});

$('.btn').click(function(){

  
  var month_id = $(this).attr("id");
  var year_month = null;
  switch (month_id) {
    case 'month1':
      
      
      $('#month').text($(this).text());
      year_month = $('#year').text()+"-"+$(this).val();
      //$('#year_month').val($('#year').text()+"-"+$(this).val());
      $('#year_month').val(year_month);

      break;
    
      case 'month2':
        
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
        break;

      case 'month2':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month3':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month4':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month5':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month6':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month7':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month8':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month9':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month10':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;
  
      case 'month11':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month12':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'month13':
      
        $('#month').text($(this).text());
        $('#year_month').val($('#year').text()+"-"+$(this).val());
      break;

      case 'next_year':
      
        var next_year = parseInt($('#year').text()) + 1;
        var current_year = $('#year_month').val().slice(4);
        var concatenated = next_year + current_year;
        
        $('#year_month').val(concatenated);

        
        $('#year').text(next_year.toString());
       // $('#year').text($(this).text());
      break;

      case 'last_year':
      
        var next_year = parseInt($('#year').text()) - 1;
        var current_year = $('#year_month').val().slice(4);
        var concatenated = next_year + current_year;
        
        $('#year_month').val(concatenated);
        
        $('#year').text(next_year.toString());
      break;

    default:
      break;
  }
});