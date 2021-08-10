$('#modal-student').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('detail1')
    var modal = $(this)
    var split = detail.split(",")
    modal.find('.modal-body #full_name').text(split[0])
    modal.find('.modal-body #id').text(split[1])
    modal.find('.modal-body #gender').text(split[2]);
    modal.find('.modal-body #stID').text(split[4]);
    modal.find('.modal-body #grade').text(split[5]);
    modal.find('.modal-body #disablity').text(split[6]);
    modal.find('.modal-body #medical_condtion').text(split[7]);
    modal.find('.modal-body #blood_type').text(split[8]);
    modal.find('.modal-body #transfer_reason').text(split[9]);
    modal.find('.modal-body #suspension_status').text(split[10]);
    modal.find('.modal-body #expulsion_status').text(split[11]);
    modal.find('.modal-body #edu_history').text(split[12]);
    modal.find('.modal-body #citizen').text(split[13]);
    modal.find('.modal-body #prev_school').text(split[14]);
    modal.find('.modal-body #language').text(split[15]);
    modal.find('.modal-body #birth_year').text(split[16]);

    var img = (split[3].trim());
    modal.find('.modal-body #image').attr('src', (img));
    modal.find('.modal-footer button').val(detail);
});
