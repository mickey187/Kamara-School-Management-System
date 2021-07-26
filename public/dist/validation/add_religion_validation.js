




// var emp_employee_religion = document.getElementById('employee_religion')
var submit_button = document.getElementById('submit12')
 submit_button.addEventListener("click",function(){
var emp_employee_religion = document.getElementById('employee_religion').value.trim()
      if(
        emp_employee_religion === ''
      ){
         setEror()
      }else{
          document.location.href = 'addReligion/'+emp_employee_religion+'';
          onSuccess()
      }
 })
 function setEror(){
     alert('error')
 }
 function onSuccess(){
     alert('success')
 }
