$( "#search" ).click(function() {

    var stud_id = $("#search_input").val();
    //alert(stud_id);
    $.ajax({
        type: 'GET', 
        url: 'fetchstudent/'+stud_id,
        dataType : 'json',
        
        success:function (data) {
           var rows = '';
            console.log(data);
            var data1 = JSON.parse(JSON.stringify(data.student_data));
            var data2 = JSON.parse(JSON.stringify(data.student_payment));
            console.log(data1)
            console.log(data2)

            var insert = '';
            var student_id ='';

            data1.forEach(c =>{
                student_id = c.student_id;
                insert = '<h3 class="text-info" id="stud_name">'+c.first_name+' '+c.middle_name+' '+c.last_name+'</h3>'

            });
            $('#stud_name').html(insert);
            data2.forEach(d => {

                

                rows += '<tr>'+
                        // '<td>'+d.first_name +' '+ d.middle_name+ ' ' +d.last_name+'</td>'
                        '<td>'+d.class_label+'</td>'+
                        '<td>'+d.payment_type+'</td>'+
                        '<td>'+d.amount+'</td>'+
                        '<td>'+
                        '<button class="btn btn-success btn-sm"  data-toggle="modal"'+
                        'data-target="#add_discount" data-disount_data="'+student_id+','+d.payment_load_id+','+d.payment_type+','+d.amount+'" >'+
                        '<i class="fas fa-percent"></i>'+
                        '</button>'+
                        '</td>'
                        '</tr>'

                    
                 
                 
           });
         $('#table_data').html(rows);
           
        },
        error:function (data) {

        }
     });

     $('#add_discount').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('disount_data') // Extract info from data-* attributes
       
        var modal = $(this)

        data_array = recipient.split(",");

        modal.find('.modal-title').text('Add Student Discount')
        modal.find('.modal-body #pay_type').text("Payment Type: "+data_array[2])
        modal.find('.modal-body #amount').text("Amount: "+data_array[3])
        modal.find('.modal-body #student_id').val(data_array[0])
        modal.find('.modal-body #load_id').val(data_array[1])
      })

  });



 