$('#modal_default').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal 
    var detail = button.data('detail');
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
   var modal = $(this)
   
             var spit = detail.split(",");

    modal.find('.modal-body p').text(detail)
    
    modal.find('.modal-body #subjectid').text("subject id: "+spit[0]);
   
    modal.find('.modal-body #subjectname').text("subject name: "+spit[1]);
    modal.find('.modal-footer button').val(spit[0])
    console.log('heloooooooooooooooooooooooooooooooooo');
   
  });

   $('#modal_view').on('show.bs.modal', function (event) {
     var button_view = $(event.relatedTarget) // Button that triggered the modal 
     var view_detail = button_view.data('view');
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal_view = $(this)
  //   modal.find('.modal-title').text('New message to ' + recipient)
              var spit = view_detail.split(",");
  
  //var table = ('#example1').DataTable();
    //modal.find('.modal-body p').text(detail)
     console.log('heyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy');
     modal_view.find('.modal-body #subjectid_view').text("subject id: "+spit[0]);
    
   // modal_view.find('.modal-body #subjectgroup_view').text("subject group: "+spit[2]);
    modal_view.find('.modal-body #subjectname_view').text("subject name: "+spit[2]);
   // modal.find('.modal-footer button').val(spit[0])
   
   });