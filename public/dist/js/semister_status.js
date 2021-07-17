var getSemister = document.getElementById('inputState');
getSemister.addEventListener('change',function(){
    var val = getSemister.value;
    $.ajax({
        type: 'GET',
        url: 'setCurrentSemister/'+val,
        dataType : 'json',
        success:function (data) {
            // alert(data + "from server");
            row = '';
            count = 1;
             console.log(data);
            data.forEach(d => {
                if(d.current_semister==true){
                    row+= '<tr class="bg-secondary "><td>'+count+' </td>'+' <td>'+d.semister+
                    '<td>'+d.term+'</td>'+
                    '</tr>'
                }else{
                    row+= '<tr><td>'+count+' </td>'+' <td>'+d.semister+
                    '<td>'+d.term+'</td>'+
                    '</tr>'
                }

                count = count + 1;
           });
            $('#semister_page').html(row);

        },
        error:function (data) {
            console.log("it is not works fine");
        }
     });
})
