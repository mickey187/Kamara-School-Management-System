
function deleteParent(){
    const id = document.getElementById('deleteParent').textContent;
    deleteStudent(id.trim());

}

function deleteStudent(id) {
    $.ajax({
        type: 'GET',
        url: 'deleteParent'+id,
        dataType : 'json',

        success:function (data) {
          alert('success');
        },
        error:function (data) {
            alert('fail');
        }
     });
  }
