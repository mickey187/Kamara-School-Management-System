$('#view_class_label').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('view_class_label') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    modal.find('.modal-body #class_label_id').text("Class Label ID: "+data_array[0])
    modal.find('.modal-body #class_label_name').text("Class Label Name: "+data_array[1])
  })

  $('#delete_class_label').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('delete_class_label') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    modal.find('.modal-body #class_label_id_delete').text("Class Label ID: "+data_array[0])
    modal.find('.modal-body #class_label_name_delete').text("Class Label Name: "+data_array[1])

    modal.find('.modal-footer #delete_class_label_btn').val(data_array[0])
  })