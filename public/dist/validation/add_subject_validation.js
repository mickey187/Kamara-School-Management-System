




var save_button = document.getElementById('saveSubject')
save_button.addEventListener("click",function(){
    var addSubject = document.getElementById('subjectName').value.trim()
    if(
        addSubject === ''
    ){
        setEror()
    }else{
        document.location.href = 'addsubject/'+addSubject+'';
        onSuccess
    }
})

 function setEror(){
     alert('religion can not be null')
 }
 function onSuccess(){
     alert('you are successfuly enter religion')
 }