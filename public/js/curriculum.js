$('#addClass').click(function(){
   
   
    var class_label = $('#class_label').val();
    var class_priority = $('#priority').val();
    
    $.ajax({
        type: "get",
        url:"/addClass/"+class_label+"/"+class_priority,
        dataType:"json",
        success:function (data){
            console.log(data)
            if(data == "success"){
                Swal.fire({
                    icon: 'success',
                    title:'successful',
                    text:'Added'+class_label,
                })
            } else if(data == "failed"){
                Swal.fire({
                icon: 'danger',
                title: 'failed!',
                text:' please try again',
                
              });
            } else if(data == "failed"){
                Swal.fire({
                    icon:'error',
                    title: 'failde to add'+class_label,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }              
        }, error: function (data) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
    });
        }
});
});


$('#view_class_label_tab_link').click(function (){
    $.ajax({
        type:"get",
        url:"/viewClass",
        dataType:"json",
        success:function (data) {

            data.forEach(d =>{
              
                Object.assign(d,{action:'<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_class_label_modal" '+
                'data-view_class_label_tab="'+d.id+','+d.class_label+','+d.priority+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+

               '<button class="btn btn-info btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#edit_class_label_modal"'+
                'data-edit_class_label_modal="'+d.id+','+d.class_label+','+d.priority+'">'+
                 '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+             
               '</button>'+' '+
              
              '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_class_label_modal"'+ 
                   'data-delete_class_label_modal="'+d.id+','+d.class_label+','+d.priority+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>'
            });
            });

            $("#view_class_table").DataTable({
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "id" },
                    { "data": "class_label" },
                    { "data": "priority" },
                    { "data": "action" }
                    
              ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_class_table_wrapper .col-md-6:eq(0)');

        }
    });
});

$('#view_class_label_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('view_class_label_tab')
    var data = recipient.split(",");

    $('#class_label_id_view').text("ID: "+[data[0]]);
    $('#class_label_name_view').text("class : "+data[1]);
    $('#class_priority_view').text("priority : "+data[2]);
    var modal = $(this)  
})

$('#edit_class_label_modal').on('show.bs.modal', function (event){
    
    var button = $(event.relatedTarget)
    var recipient = button.data('edit_class_label_modal') 
    var data = recipient.split(",");
  
    $('#class_label_edit').val(data[1]);
    $('#priority_edit').val(data[2]);

    $('#save_changes_class_label').click(function (){
        var id = data[0];
        var class_label_edit = $('#class_label_edit').val();
        var priority_edit = $('#priority_edit').val();

        $.ajax({
        type: "get",
        url: "/edit_class_label",
        data: {id,class_label_edit,priority_edit},
        dataType: "json",
        success: function (response){
           if (response == "success"){
               $('#cancel_class_label_modal').click();
               $('#view_class_label_tab_link').click();

                Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'edited successfuly',
                    });
           }
        }
            });

    });

    var modal = $(this);
    $(this).on('hide.bs.modal', function(){
        $('#save_changes_class_label').off('click');
    });
});

$('#delete_class_label_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('delete_class_label_modal');
    var data = recipient.split(",");

    $('#class_label_id_delete').text("Id: "+[data[0]]);
    $('#class_label_delete').text("class: "+data[1]);
    $('#class_priority_delete').text("priority: "+data[1]);

    $('#delete_class').click(function (){
        var delete_class_label_id = data[0];

        $.ajax({
            type: "get",
            url: "/delete_class_label",
            data: {delete_class_label_id},
            dataType: "json",
            success: function(response){
                if(response == "success"){
                    $('#cancel_delete_class_label').click();
                    $('#view_class_label_tab_link').click();
                    Swal.fire({
                        icon: 'info',
                        title: 'deleted',
                        text:  'class deleted!',
                    });
                };
            }
        });
    });
})

$('#saveAllSubject').click(function(){
     var subject_name = $('#subject_name').val();
    
    $.ajax({
        type: "get",
        url:"/indexAddSubject/"+subject_name,
        dataType:"json",
        success:function (data){
            console.log(data)
            if(data == "success"){
                Swal.fire({
                    icon: 'success',
                    title:'successful',
                    text:'Added'+subject_name,
                });

            } else if(data == "failed"){
                Swal.fire({
                icon: 'danger',
                title: 'failed!',
                text:' please try again',
                });

              }else if(data == "failed"){
                Swal.fire({
                    icon:'error',
                    title: 'failde to add'+subject_name,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }              
        }, error: function (data) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
    });
        }
});
});

$('#view_subject_tab_link').click(function (){
    $.ajax({
        type:"get",
        url:"/view_subject",
        dataType:"json",
        success:function (data) {

            data.forEach(d =>{
               
                Object.assign(d,{action:'<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_subject_modal" '+
                'data-view_subject_tab="'+d.id+','+d.subject_name+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+

               '<button class="btn btn-info btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#edit_subject_modal"'+
                'data-edit_subject_modal="'+d.id+','+d.subject_name+'">'+
                 '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+             
               '</button>'+' '+
              
              '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_subject_modal"'+ 
                   'data-delete_subject_modal="'+d.id+','+d.subject_name+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>'
            });
            });

            $("#view_subject_table").DataTable({
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "id" },
                    { "data": "subject_name" },
                    { "data": "action" }
                    
              ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_subject_table_wrapper .col-md-6:eq(0)');

        }
    });
});

$('#view_subject_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('view_subject_tab')
    var data = recipient.split(",");

    $('#subject_id_view').text("ID: "+[data[0]]);
    $('#subject_name_view').text("subject name: "+data[1]);
    var modal = $(this)

});

$('#edit_subject_modal').on('show.bs.modal', function (event){
    
    var button = $(event.relatedTarget)
    var recipient = button.data('edit_subject_modal') 
    var data = recipient.split(",");
  
    $('#edit_subject').val(data[1]);

    $('#save_changes_subject').click(function (){
        var id = data[0];
        var edit_subject = $('#edit_subject').val();

        $.ajax({
        type: "get",
        url: "/edit_subject",
        data: {id,edit_subject},
        dataType: "json",
        success: function (response){
           if (response == "success"){
               $('#cancel_edit_subject_modal').click();
               $('#view_subject_tab_link').click();

                Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'edited successfuly',
                    });
           }
        }
            });

    });

    var modal = $(this);
    $(this).on('hide.bs.modal', function(){
        $('#save_changes_subject').off('click');
    });
});

$('#delete_subject_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('delete_subject_modal');
    var data = recipient.split(",");

    $('#delete_subject_id').text("Id: "+[data[0]]);
    $('#delete_subject_name').text("subject name: "+data[1]);

    $('#delete_subject').click(function (){
        var delete_subject_id = data[0];

        $.ajax({
            type: "get",
            url: "/delete_subject",
            data: {delete_subject_id},
            dataType: "json",
            success: function(response){
                if(response == "success"){
                    $('#cancel_delete_subject_modal').click();
                    $('#view_subject_tab_link').click();
                    Swal.fire({
                        icon: 'info',
                        title: 'deleted',
                        text:  'subject deleted!',
                    });
                };
            }
        });
    });
})

$('#addStreames').click(function(){
     var stream_type = $('#stream_type').val();
    
    $.ajax({
        type: "get",
        url:"/indexaddStream/"+stream_type,
        dataType:"json",
        success:function (data){
            console.log(data)
            if(data == "success"){
                Swal.fire({
                    icon: 'success',
                    title:'successful',
                    text:'Added'+stream_type,
                });
            } else if(data == "failed"){
                Swal.fire({
                icon: 'danger',
                title: 'failed!',
                text:' please try again',
                
              });
            }

            else if(data == "failed"){
                Swal.fire({
                    icon:'error',
                    title: 'failde to add'+stream_type,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }              
        }, error: function (data) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
    });
        }
});
});



$('#view_stream_tab_link').click(function (){
    $.ajax({
        type:"get",
        url:"/view_stream",
        dataType:"json",
        success:function (data) {

            data.forEach(d =>{

                Object.assign(d,{action:'<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_streamm_modal" '+
                'data-view_subject_tab="'+d.id+','+d.stream_type+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+

               '<button class="btn btn-info btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#edit_stream_modal"'+
                'data-edit_stream_modal="'+d.id+','+d.stream_type+'">'+
                 '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+             
               '</button>'+' '+
              
              '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_stream_modal"'+ 
                   'data-delete_stream_modal="'+d.id+','+d.stream_type+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>'
            });
            });

            $("#view_stream_table").DataTable({
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "id" },
                    { "data": "stream_type" },
                    { "data": "action" }
                    
              ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_stream_table_wrapper .col-md-6:eq(0)');


        }
    })
})

$('#view_streamm_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('view_subject_tab')
    var data = recipient.split(",");

    $('#stream_id_view').text("ID: "+[data[0]]);
    $('#stream_name_view').text("stream name: "+data[1]);
    var modal = $(this)

});

$('#edit_stream_modal').on('show.bs.modal', function (event){
    
    var button = $(event.relatedTarget)
    var recipient = button.data('edit_stream_modal') 
    var data = recipient.split(",");
  
    $('#edit_stream').val(data[1]);

    $('#save_changes_stream').click(function (){
        var id = data[0];
        var edit_stream = $('#edit_stream').val();

        $.ajax({
        type: "get",
        url: "/edit_stream",
        data: {id,edit_stream},
        dataType: "json",
        success: function (response){
           if (response == "success"){
               $('#cancel_edit_stream_modal').click();
               $('#view_stream_tab_link').click();

                Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'edited successfuly',
                    });
           }
        }
            });

    });

    var modal = $(this);
    $(this).on('hide.bs.modal', function(){
        $('#save_changes_stream').off('click');
    });
});

$('#delete_stream_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('delete_stream_modal');
    var data = recipient.split(",");

    $('#delete_stream_id').text("ID: "+[data[0]]);
    $('#delete_stream_name').text("stream name: "+data[1]);

    $('#delete_stream').click(function (){
        var delete_stream_id = data[0];

        $.ajax({
            type: "get",
            url: "/delete_stream",
            data: {delete_stream_id},
            dataType: "json",
            success: function(response){
                if(response == "success"){
                    $('#cancel_delete_stream_modal').click();
                    $('#view_stream_tab_link').click();
                    Swal.fire({
                        icon: 'info',
                        title: 'deleted',
                        text:  'stream deleted!',
                    });
                };
            }
        });
    });
})