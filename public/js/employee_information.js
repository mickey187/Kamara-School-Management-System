$('#position_btn').click(function(){
   
   
    var position_name = $('#position_name').val();
    
    $.ajax({
        type: "get",
        url:"/add_position/"+position_name,
        dataType:"json",
        success:function (data){
            console.log(data)
            if(data == "success"){
                Swal.fire({
                    icon: 'success',
                    title:'successful',
                    text:'Added'+position_name,
                });
            } else if(data == "failed"){
                Swal.fire({
                icon: 'danger',
                title: 'failed!',
                text:' please try again',
                
              });
            } else if(data == "failed"){
                Swal.fire({
                    icon:'error',
                    title: 'failde to add'+position_name,
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }              
     },
     error: function (data) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href="">Why do I have this issue?</a>'
    });
        }
});
});


$('#view_job_position_tab_link').click(function (){
    //alert ('sjs');
    $.ajax({
        type:"get",
        url:"/view_position",
        dataType:"json",
        success:function (data) {
            console.log(data);
            data.forEach(d =>{
                
                Object.assign(d,{action:'<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
                'data-target="#view_job_position_modal" '+
                'data-view_job_position_tab="'+d.id+','+d.position_name+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+

               '<button class="btn btn-info btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#edit_job_position_modal"'+
                'data-edit_job_position_modal="'+d.id+','+d.position_name+'">'+
                 '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+             
               '</button>'+' '+
              
              '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_position_modal"'+ 
                   'data-delete_position_modal="'+d.id+','+d.position_name+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>'
            });
            });

            $("#view_position_table").DataTable({
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "id" },
                    { "data": "position_name" },
                    { "data": "action" }
                    
              ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_position_table_wrapper .col-md-6:eq(0)');

        }
    });
});

$('#view_job_position_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('view_job_position_tab')
    var data = recipient.split(",");

    $('#position_id_view').text("id: "+[data[0]]);
    $('#position_name_view').text("position name: "+data[1]);
    var modal = $(this)

});

$('#edit_job_position_modal').on('show.bs.modal', function (event){
    
    var button = $(event.relatedTarget)
    var recipient = button.data('edit_job_position_modal') 
    var data = recipient.split(",");
  
    $('#job_position_edit').val(data[1]);

    $('#save_changes_position_name').click(function (){
        var id = data[0];
        var job_position_edit = $('#job_position_edit').val();

        $.ajax({
        type: "get",
        url: "/edit_job_position",
        data: {id,job_position_edit},
        dataType: "json",
        success: function (response){
           if (response == "success"){
               $('#cancel_edit_job_position_modal').click();
               $('#view_job_position_tab_link').click();

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
        $('#save_changes_position_name').off('click');
    });
});
  

$('#delete_position_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('delete_position_modal');
    var data = recipient.split(",");

    $('#position_id_delete').text("Id: "+[data[0]]);
    $('#position_name_delete').text("position name: "+data[1]);

    $('#delete_position').click(function (){
        var delete_posiition_id = data[0];

        $.ajax({
            type: "get",
            url: "/deleteJobPosition",
            data: {delete_posiition_id},
            dataType: "json",
            success: function(response){
                if(response == "success"){
                    $('#cancel_delete_position').click();
                    $('#view_job_position_tab_link').click();
                    Swal.fire({
                        icon: 'info',
                        title: 'deleted',
                        text:  'position deleted!',
                    });
                };
            }
        });
    });
})

// religion modal

$('#religion_btn').click(function(){
     var religion_name = $('#religion_name').val();
    
    $.ajax({
        type: "get",
        url:"/add_religion/"+religion_name,
        dataType:"json",
        success:function (data){
            console.log(data)
            if(data == "success"){
                Swal.fire({
                    icon: 'success',
                    title:'successful',
                    text:'Added'+religion_name,
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
                    title: 'failde to add'+religion_name,
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

$('#view_religion_tab_link').click(function (){
    $.ajax({
        type:"get",
        url:"/view_religion",
        dataType:"json",
        success:function (data) {
        data.forEach(d =>{
               
                Object.assign(d,{action:'<button class="btn btn-success btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#view_religion_modal" '+
                'data-view_religion_tab="'+d.id+','+d.religion_name+'">'+
                 '<i class="fa fa-eye" aria-hidden="true"></i>'+             
               '</button>'+' '+

               '<button class="btn btn-info btn-sm"'+
                'data-toggle="modal"'+ 
               'data-target="#edit_religion_modal"'+
                'data-edit_religion_modal="'+d.id+','+d.religion_name+'">'+
                 '<i class="fas fa-pencil-alt" aria-hidden="true"></i>'+             
               '</button>'+' '+
              
              '<button class="btn btn-danger btn-sm" data-toggle="modal"'+ 
                  'data-target="#delete_religion_modal"'+ 
                   'data-delete_religion_modal="'+d.id+','+d.religion_name+'">'+
                   '<i class="fa fa-trash" aria-hidden="true"></i>'+
                 '</button>'
            });
            });

            $("#view_religion_table").DataTable({
                "destroy":true,
                "data":data,
                "columns": [
                    { "data": "id" },
                    { "data": "religion_name" },
                    { "data": "action" }
                    
              ],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#view_religion_table_wrapper .col-md-6:eq(0)');

        }
    });
});

$('#view_religion_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('view_religion_tab')
    var data = recipient.split(",");

    $('#religion_id_view').text("id: "+[data[0]]);
    $('#religion_name_view').text("religion name: "+data[1]);
    var modal = $(this)

});

$('#edit_religion_modal').on('show.bs.modal', function (event){
    
    var button = $(event.relatedTarget)
    var recipient = button.data('edit_religion_modal') 
    var data = recipient.split(",");
  
    $('#religion_edit').val(data[1]);

    $('#save_changes_religion_name').click(function (){
        var id = data[0];
        var religion_edit = $('#religion_edit').val();

        $.ajax({
        type: "get",
        url: "/edit_religion",
        data: {id,religion_edit},
        dataType: "json",
        success: function (response){
           if (response == "success"){
               $('#cancel_edit_religion_modal').click();
               $('#view_religion_tab_link').click();

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
        $('#save_changes_religion_name').off('click');
    });
});

$('#delete_religion_modal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipient = button.data('delete_religion_modal');
    var data = recipient.split(",");

    $('#delete_religion_id').text("Id: "+[data[0]]);
    $('#delete_religion_name').text("religion name: "+data[1]);

    $('#delete_religion').click(function (){
        var delete_religion_id = data[0];

        $.ajax({
            type: "get",
            url: "/delete_religion",
            data: {delete_religion_id},
            dataType: "json",
            success: function(response){
                if(response == "success"){
                    $('#cancel_delete_religion_modal').click();
                    $('#view_religion_tab_link').click();
                    Swal.fire({
                        icon: 'info',
                        title: 'deleted',
                        text:  'religion deleted!',
                    });
                };
            }
        });
    });
})



