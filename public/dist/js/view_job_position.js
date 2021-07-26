$('#view_position').on('show.bs.modal', function (event) {



    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('position') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    console.log("helloooooo");
    
    modal.find('.modal-body #position_id').text("position id: "+data_array[0])
    modal.find('.modal-body #position_name').text("position Name: "+data_array[1])
  })

  $('#delete_position').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('position_delete') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    data_array = recipient.split(",");
    
    modal.find('.modal-body #position_id_delete').text("position ident: "+data_array[0])
    modal.find('.modal-body #position_name_delete').text("position type: "+data_array[1])

    modal.find('.modal-footer #delete_position_btn').val(data_array[0])
  })