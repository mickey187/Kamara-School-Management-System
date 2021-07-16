$('#delete_employee').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal 
    var detail = button.data('delete_employee_data');
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
   var modal = $(this)
   
             var spit = detail.split(",");

    
    modal.find('.modal-body #ident').text("employee id: "+spit[0]);
    modal.find('.modal-body #employee_name').text("employee name: "+spit[1]);
    modal.find('.modal-body #employee_job_position').text("job position: "+spit[2]);
    modal.find('.modal-footer #delete_employee').val(spit[0])
    console.log('heloooooooooooooooooooooooooooooooooo');
   
  });

   $('#modal_view_employee').on('show.bs.modal', function (event) {
     var button_view = $(event.relatedTarget) // Button that triggered the modal 
     var view_detail = button_view.data('employee_data');
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
  //   modal.find('.modal-title').text('New message to ' + recipient)
              var spit = view_detail.split(",");
  
  //var table = ('#example1').DataTable();
    //modal.find('.modal-body p').text(detail)
     console.log('heyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy');
     modal.find('.modal-body #id').text("employee id: "+spit[0]);
    modal.find('.modal-body #full_name').text("employee name: "+spit[1]);
    modal.find('.modal-body #job_position_view').text("job position: "+spit[2]);
   // modal_view.find('.modal-body #subjectgroup_view').text("subject group: "+spit[2]);
    // modal_view.find('.modal-body #employeename_view').text("employee name: "+spit[2]);
   // modal.find('.modal-footer button').val(spit[0])
   
   });