$('#modal-student').on('show.bs.modal', function(event) {
    console.log('bbbbbbbbbbbbbbbbbbbbbbbbbbbbb');
    var button = $(event.relatedTarget)
    var detail = button.data('detail1')
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1])
    modal.find('.modal-body #gender').text(split[2]);
    var img = (split[3].trim());
    modal.find('.modal-body #image').attr('src', (img));
    modal.find('.modal-footer button').val(detail);

})