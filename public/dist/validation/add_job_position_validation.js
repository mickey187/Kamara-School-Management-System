





var save_button = document.getElementById('saveBtn')
save_button.addEventListener("click",function(){

    var emp_jop_position = document.getElementById('employee_position2').value.trim()
    if(
        emp_jop_position === ''
    ){
        setEror()
    }else{
        document.location.href = 'addJobPosition/'+emp_jop_position+'';
        onSuccess()
    }
})
 function setEror(){
     alert('error')
 }
 function onSuccess(){
     alert('success')
 }