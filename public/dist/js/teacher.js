$('#modal-teacher').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('teacher')
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1])
    modal.find('.modal-footer button').val(detail);
})
