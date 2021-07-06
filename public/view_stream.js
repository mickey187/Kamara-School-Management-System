$('#view_stream').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('view_stream') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    
    modal.find('.modal-body #stream_id').text("Stream ID: "+data_array[0])
    modal.find('.modal-body #stream_type').text("Stream Type: "+data_array[1])
  })

  $('#delete_stream').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('delete_stream') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    modal.find('.modal-body #stream_id_delete').text("Stream ID: "+data_array[0])
    modal.find('.modal-body #stream_type_delete').text("Stream Type: "+data_array[1])

    modal.find('.modal-footer #delete_stream_id').val(data_array[0])
  })