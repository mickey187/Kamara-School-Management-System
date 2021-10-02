$('#view_assasment_type').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('view_assasment_type') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    
    modal.find('.modal-body #assasment_id').text("Assasment ID: "+data_array[0])
    modal.find('.modal-body #assasment_type').text("Assasment Type: "+data_array[1])
  })

  $('#delete_assasment').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('delete_assasment') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    modal.find('.modal-body #assasment_id_delete').text("assasment ID: "+data_array[0])
    modal.find('.modal-body #assasment_type_delete').text("assasment Type: "+data_array[1])

    modal.find('.modal-footer #delete_assasment_btn').val(data_array[0])
  })