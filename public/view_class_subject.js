$('#modal_view_cls').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('view') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    modal.find('.modal-body #id_view').text("ID: "+data_array[0])
    modal.find('.modal-body #class_label_view').text("Class Label: "+data_array[1])
    modal.find('.modal-body #subject_view').text("Subject: "+data_array[2])
    modal.find('.modal-body #stream_view').text("Stream: "+data_array[3])
    var id = data_array[0];
    console.log(data_array[0]);
    
  })

  $('#modal_delete_cls').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('delete') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    console.log();
    modal.find('.modal-body #id_delete').text("ID: "+data_array[0])
    modal.find('.modal-body #class_label_delete').text("Class Label: "+data_array[1])
    modal.find('.modal-body #subject_delete').text("Subject: "+data_array[2])
    modal.find('.modal-body #stream_delete').text("Stream: "+data_array[3])
    modal.find('.modal-footer button').val(data_array[0]);
  })