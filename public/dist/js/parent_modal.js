$('#modal-parent').on('show.bs.modal', function(event) {
    console.log('ccccccccccccccccccccc');
    var button = $(event.relatedTarget)
    var detail = button.data('detail2')
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1])
    modal.find('.modal-body #gender').text(split[2]);
    modal.find('.modal-body #relation').text(split[3]);
    modal.find('.modal-body #priority').text(split[4]);
    modal.find('.modal-body #phone').text(split[5]);
})