$('#view_role').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('role') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    modal.find('.modal-body #role_id').text("Role ID: "+data_array[0])
    modal.find('.modal-body #role_name').text("Role Name: "+data_array[1])
  })

  $('#delete_role').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('role_delete') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    modal.find('.modal-body #role_id_delete').text("Role ID: "+data_array[0])
    modal.find('.modal-body #role_name_delete').text("Role Name: "+data_array[1])

    modal.find('.modal-footer #delete_role_btn').val(data_array[0])
  })