
     $('#modal-delete-parent').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget)
        var detail = button.data('delete')
        var modal = $(this)
        modal.find('.modal-body #id').text(detail)
        modal.find('.modal-footer button').val(detail);
    });

