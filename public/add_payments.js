$('#make_payment').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('payment_data') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    console.log("hhhhhhh");
    
    modal.find('.modal-body #student_id').text("Student ID: "+data_array[0])
    modal.find('.modal-body #student_name').text("Student Name: "+data_array[1]+' '+data_array[2]+' '+data_array[3])
  })