$('#modal-student-enroll').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('detail1')
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1])
    modal.find('.modal-body #gender').text(split[2]);
    var img = (split[3].trim());
     var from = split[4].split("-");
     var to = from[0]+'-'+(parseInt(from[1])+1);
    // var to2 = to[0]+'-'+to[1]+1;
    modal.find('.modal-body #image').attr('src', (img));
    modal.find('.modal-body #grade').text(split[4]);
    modal.find('.modal-body #stream_type').text(split[5]);
    modal.find('.modal-body #from').text(split[4]);
    modal.find('.modal-body #to').text(to);
    modal.find('.modal-footer button').val(detail);

})
