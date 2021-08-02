





var add_button = document.getElementById('addClassBtn')
add_button.addEventListener("click",function(){
    var add_class = document.getElementById('addClass')
    var add_priority = document.getElementById('addPriority')

    if(add_class.value.trim() === ''){
       setEror()

    }else{
        onSuccess()
    }
    if(add_priority.value.trim() === ''){
       setEror()
    }

    if(
        add_class.value.trim() === '' ||
        add_priority.value.trim() === ''
    ){

    }else{
        onSuccess()
    }
})


 function setEror(){
     alert('religion can not be null')
 }
 function onSuccess(){
     alert('you are successfuly enter religion')
 }